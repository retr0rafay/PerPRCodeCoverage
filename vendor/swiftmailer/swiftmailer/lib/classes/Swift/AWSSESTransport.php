<?php

use Aws\Ses\SesClient;
/**
 * Sends Messages over AWS.
 * @package Swift
 * @subpackage Transport
 */
class Swift_AWSSESTransport extends Swift_Transport_AWSTransport {

	/** the service access key */
	private $AWSAccessKeyId;
	/** the service secret key */
	private $AWSSecretKey;
	/** the service endpoint */
	private $region;
	/** proxy host */
	private $proxyHost;
	/** proxy port */
	private $proxyPort;

	/**
	 * Debugging helper.
	 *
	 * If false, no debugging will be done.
	 * If true, debugging will be done with error_log.
	 * Otherwise, this should be a callable, and will recieve the debug message as the first argument.
	 *
	 * @seealso Swift_AWSSESTransport::setDebug()
	 */
	private $debug;
	/** the response */
	private $response;

	/**
	 * Create a new AWSSESTransport.
	 * @param string $AWSAccessKeyId Your access key.
	 * @param string $AWSSecretKey Your secret key.
	 * @param string $proxyHost
	 * @param string $proxyPort
	 * @param boolean $debug Set to true to enable debug messages in error log.
	 * @param string $region The AWS endpoint to use.
	 */
	public function __construct($AWSAccessKeyId = null , $AWSSecretKey = null, $proxyHost = null, $proxyPort = null,
								$debug = false, $region = 'us-west-2') {
		call_user_func_array(
			array($this, 'Swift_Transport_AWSTransport::__construct'),
			Swift_DependencyContainer::getInstance()
				->createDependenciesFor('transport.aws')
		);

		$this->AWSAccessKeyId = $AWSAccessKeyId;
		$this->AWSSecretKey = $AWSSecretKey;
		$this->proxyHost = $proxyHost;
		$this->proxyPort = $proxyPort;
		$this->region = $region;
		$this->debug = $debug;
	}

	/**
	 * Create a new AWSSESTransport.
	 * @param string $AWSAccessKeyId Your access key.
	 * @param string $AWSSecretKey Your secret key.
	 * @param string $proxyHost
	 * @param string $proxyPort
	 * @return Swift_AWSSESTransport
	 */
	public static function newInstance( $AWSAccessKeyId , $AWSSecretKey , $proxyHost , $proxyPort) {
		return new Swift_AWSSESTransport( $AWSAccessKeyId , $AWSSecretKey , $proxyHost , $proxyPort);
	}

	public function setAccessKeyId($val) {
		$this->AWSAccessKeyId = $val;
	}

	public function setSecretKey($val) {
		$this->AWSSecretKey = $val;
	}

	public function setDebug($val) {
		$this->debug = $val;
	}

	public function setRegion($val) {
		$this->region = $val;
	}

	public function getResponse() {
		return $this->response;
	}

	protected function _debug ( $message ) {
		if ( true === $this->debug ) {
			error_log( $message );
		} elseif ( is_callable($this->debug) ) {
			call_user_func( $this->debug, $message );
		}
	}

	/**
	 * Send the given Message.
	 *
	 * Recipient/sender data will be retreived from the Message API.
	 * The return value is the number of recipients who were accepted for delivery.
	 *
	 * @param Swift_Mime_Message $message
	 * @param string[] &$failedRecipients to collect failures by-reference
	 * @return int
	 * @throws AWSConnectionError
	 */
	public function send( Swift_Mime_Message $message, &$failedRecipients = null ) {

		if ($evt = $this->_eventDispatcher->createSendEvent($this, $message))
		{
			$this->_eventDispatcher->dispatchEvent($evt, 'beforeSendPerformed');
			if ($evt->bubbleCancelled())
			{
				return 0;
			}
		}

		$this->response = $this->_doSend($message, $failedRecipients);

		$this->_debug("=== Start AWS Response ===");
		$this->_debug($this->response->body);
		$this->_debug("=== End AWS Response ===");

		$success = (200 == $this->response->code);

		if ($evt)
		{
			$evt->setResult($success ? Swift_Events_SendEvent::RESULT_SUCCESS : Swift_Events_SendEvent::RESULT_FAILED);
			$this->_eventDispatcher->dispatchEvent($evt, 'sendPerformed');
		}

		if( $success ) {
			return count((array) $message->getTo());
		}
		else {
			return 0;
		}
	}

	protected function getClient()
	{
		$client = SesClient::factory(array(
			'credentials' => array(
				'key'    => $this->AWSAccessKeyId,
				'secret' => $this->AWSSecretKey
			),
			'region' => $this->region,
			'version' => 'latest',
			'http' => array(
				'proxy' => "{$this->proxyHost}:{$this->proxyPort}"
			)
		));
		return $client;
	}

	/**
	 * do send through the API
	 *
	 * @param Swift_Mime_Message $message
	 * @param string[] &$failedRecipients to collect failures by-reference
	 * @return AWSResponse
	 */
	protected function _doSend( Swift_Mime_Message $message, &$failedRecipients = null )
	{
		$response = new AWSResponse();

		try{
			$client = $this->getClient();
			$result = $client->sendRawEmail(array(
				'RawMessage' => array(
					'Data' => $message,
				),
			));
			
			$response->createResponse($result);
		} catch (\Aws\Exception\AwsException $e) {
			//An error happened and the email did not get sent
			$response->code = $e->getStatusCode();
			$response->message = $e->getAwsErrorCode();
			$response->body = $e->getMessage();
		} catch (Exception $e) {
			$response->code = $e->getCode();
			$response->body = $e->getMessage();
		}
		
		return $response;
	}

	public function isStarted() {}
	public function start() {}
	public function stop() {}

	/**
	 * Register a plugin.
	 *
	 * @param Swift_Events_EventListener $plugin
	 */
	public function registerPlugin(Swift_Events_EventListener $plugin)
	{
		$this->_eventDispatcher->bindEventListener($plugin);
	}

} // SESTransport


/**
 * A wrapper to parse an AWS HTTP response
 */
class AWSResponse {

	public $headers = array();
	public $code = 0;
	public $message = '';
	public $body = '';
	public $xml = null;

	const STATE_EMPTY = 0;
	const STATE_HEADERS = 1;
	const STATE_BODY = 2;

	protected $state = self::STATE_EMPTY;

	public function createResponse ( $result ) {
		$messageId = $result->get('MessageId');
		$data = $result->get('@metadata');
		$this->code = $data['statusCode'];
		$this->state = self::STATE_BODY;
		$this->body = $messageId;
	}

}

class AWSConnectionError extends Exception {}
class InvalidOperationException extends Exception {}
class InvalidHeaderException extends Exception {}
class AWSEmptyResponseException extends Exception {}
