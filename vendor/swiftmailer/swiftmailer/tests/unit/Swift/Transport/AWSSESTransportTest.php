<?php

// Swiftmailer uses SimpleTest for its test cases
require_once 'Swift/Tests/SwiftUnitTestCase.php';

// The AWS sdk is loaded by composer, and we need to be able to load it's classes
require_once(dirname(dirname(dirname(dirname(__DIR__)))) . '/vendor/autoload.php');

class Swift_Transport_AWSSESTransportTest extends Swift_Tests_SwiftUnitTestCase
{
	/**
	 * Make a message that we can pass onto our transport. No mocks here! We don't know what we don't know, so we're sticking
	 * with the actual implementing classes.
	 *
	 * @return Swift_Mime_SimpleMessage
	 */
	private function makeMessage()
	{
		$headerFactory = new Swift_Mime_SimpleHeaderFactory(
			new Swift_Mime_HeaderEncoder_Base64HeaderEncoder(),
			new Swift_Mime_ContentEncoder_Base64ContentEncoder(),
			new Swift_Mime_Grammar
		);

		$headers = new Swift_Mime_SimpleHeaderSet($headerFactory);

		$message = new Swift_Mime_SimpleMessage(
			$headers,
			new Swift_Mime_ContentEncoder_Base64ContentEncoder(),
			new Swift_KeyCache_NullKeyCache(),
			new Swift_Mime_Grammar
		);

		return $message;
	}

	/**
	 * Test that when an AwsException is thrown, such as a service specific exception like SesException we handle it
	 * properly and build a well formatted response.
	 */
	public function testTransportWithAwsException()
	{
		$awsCode = 666;
		$statusCode = 500;
		$message = "Something went wrong!";

		// This is basically Swift_Transport_AWSSESTransportTest except that we are overriding the getClient()
		// method in order to throw a very specific exception.
		$transport = new Swift_AWSSESTransport_withMockClient(
			"Secret",
			"Key"
		);
		$transport->withException(
			new \Aws\Ses\Exception\SesException(
				$message,
				new \Aws\Command("Test"),
				[
					'code' => $awsCode,
					'response' => new \GuzzleHttp\Psr7\Response($statusCode),
				]
			)
		);

		$failedRecipients = [];

		$result = $transport->send($this->makeMessage(), $failedRecipients);

		// 0 indicates the the send method failed
		$this->assertEqual(0, $result);

		$response = $transport->getResponse();

		$this->assertEqual(
			$statusCode,
			$response->code
		);

		$this->assertEqual(
			$message,
			$response->body
		);

		$this->assertEqual(
			$awsCode,
			$response->message
		);
	}

	/**
	 * Test that when a ParserException is thrown we catch it and return a properly formatted response.
	 */
	public function testTransportWithParserException()
	{
		$message = "A ParserException has been thrown!";

		// This is basically Swift_Transport_AWSSESTransportTest except that we are overriding the getClient()
		// method in order to throw a very specific exception.
		$transport = new Swift_AWSSESTransport_withMockClient(
			"Secret",
			"Key"
		);
		$transport->withException(
			new \Aws\Api\Parser\Exception\ParserException($message)
		);

		$failedRecipients = [];

		$result = $transport->send($this->makeMessage(), $failedRecipients);

		// 0 indicates the the send method failed
		$this->assertEqual(0, $result);

		$response = $transport->getResponse();

		// Code defaults to 0 when nothing else has been provided, as happens with a ParserException
		$this->assertEqual(0, $response->code);
		// ParserExceptions do not set a message, so this one should be empty
		$this->assertEqual('', $response->message);

		// The exception's message will be handed down as the response's body
		$this->assertEqual(
			$message,
			$response->body
		);
	}

	/***
	 * Test that we can properly parse and handle successful send responses.
	 */
	public function testTransportSendWithValidResponse()
	{
		$transport = new Swift_AWSSESTransport_withMockClient("Secret", "Key");
		$transport->withResult(new \Aws\Result([
			'@metadata' => ['statusCode' => 200],
			'MessageId' => 'i_am_not_a_real_message_id'
		]));
		$message = $this
			->makeMessage()
			->addTo('ses-recipient@example.com', 'Example Recpient');

		$numAcceptedRecipients = $transport->send($message, $failedRecipients);
		$this->assertEqual($numAcceptedRecipients, 1);
	}
}

/**
 * This class allows us to overwrite the client, which we will then use to throw exceptions inside of the transport
 * to validate that our exception handling works correctly.
 */
final class Swift_AWSSESTransport_withMockClient extends Swift_AWSSESTransport
{
	private $client;

	protected function getClient()
	{
		if ($this->client === null) {
			$this->client = new Swift_AWSSESTransport_MockClient();
		}
		return $this->client;
	}

	public function withException(\Exception $ex)
	{
		$this->getClient()->withException($ex);
	}

	public function withResult(\Aws\Result $result)
	{
		$this->getClient()->withResult($result);
	}
}

/**
 * A simple mock client for Ses that throws an exception when sending an email.
 */
final class Swift_AWSSESTransport_MockClient
{
	private $exception = null;
	private $result = null;

	/**
	 * Specify an exception to be thrown when sending an email
	 * @param Exception $ex exception to be thrown when sending an email
	 */
	public function withException(\Exception $ex)
	{
		$this->exception = $ex;
	}

	public function withResult(\Aws\Result $result)
	{
		$this->result = $result;
	}

	/**
	 * Check out SesClient->sendRawEmail()
	 *
	 * @throws \Exception
	 * @return \Aws\Result
	 */
	public function sendRawEmail() : \Aws\Result
	{
		if (isset($this->exception)) {
			throw $this->exception;
		}

		return $this->result;
	}
}
