<?php
/**
 * Copyright (c) 2015, Salesforce.com, Inc.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice,
 * this list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 * this list of conditions and the following disclaimer in the documentation
 * and/or other materials provided with the distribution.
 *
 * 3. Neither the name of Salesforce.com nor the names of its contributors may
 * be used to endorse or promote products derived from this software without
 * specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

namespace SalesforceEng\CSRF;

class ManagerTest extends \PHPUnit_Framework_TestCase
{
    private $manager;
    private $secret = 'th1si5S3cr3t!';

    public function setUp()
    {
        $this->manager = new Manager($this->secret);
    }
    public function tearDown()
    {
        unset($this->manager);
    }

    /**
     * Testing the getting/setting of levels
     */
    public function testGetSetLevel()
    {
        $this->manager->setLevel(Manager::LEVEL_REGULAR);

        $level = $this->manager->getLevel();
        $this->assertEquals($level, Manager::LEVEL_REGULAR);
    }

    /**
     * Test the setting of the level to an invalid value (string)
     *
     * @expectedException \InvalidArgumentException
     */
    public function testSetLevelInvalid()
    {
        $this->manager->setLevel('regular');
    }

    /**
     * Test the settings for the "REGULAR" version
     */
    public function testGetLevelRegular()
    {
        $levelConfig = $this->manager->getLevelConfig(Manager::LEVEL_REGULAR);
        $this->assertEquals(
            $levelConfig,
            array('nonce' => 32, 'hash' => 'SHA256', 'secretLength' => 256)
        );
    }

    /**
     * Test the settings for the "LONG" version
     */
    public function testGetLevelLong()
    {
        $levelConfig = $this->manager->getLevelConfig(Manager::LEVEL_LONG);
        $this->assertEquals(
            $levelConfig,
            array('nonce' => 64, 'hash' => 'SHA512', 'secretLength' => 512)
        );
    }

    /**
     * Assert that a valid token is generated for the REGULAR level
     */
    public function testGenerateValidRandomTokenRegular()
    {
        $secret = 'puV9vyJl0VqAqfenzaeQ2biH9AVWcFbZ6s1O3XZK2xYzPQcXqzRRDlqsCm4rI1o2Vekl'
            .'thIogBC8HxwezSwCp7POhLYoVQ2tpD1F82oTiR7gVXXZMDgLUAzHFUiopl10PnqZtDijl8vlV'
            .'YYjvTlJIfI4MGztHibpwHpQfQVQYGh0hmh33SaaIKaKXf0EUmjrRXmk2xO3P7MZVzln0NblAO'
            .'xeReR1b4uqtmx83EHrcSB0OJlPcw3RlNmKf8MabRet';

        $this->manager->setSecret($secret);
        $token = $this->manager->generate();

        $this->assertRegExp('/[a-zA-Z0-9]+/', $token);
        $this->assertEquals(strlen($token), 96);
    }

    /**
     * Assert that a valid token is generated for the REGULAR level
     */
    public function testGenerateValidRandomTokenLong()
    {
        $secret = 'Pk8l9w3yQ9WwbvyAqJ9y5Jywtohw5hR4kysSifZeNo3J8CGcBhpe1MSXbnqgBaHmei4BV'
            .'raEPh6taQ7cn2mmMikchuFjx66iw8a49DiDYWuevHHfGW1rJYxWzuu06LN9sfZrRD2491C4oNx'
            .'c3CeMDioRHg6MbD1BXV36AHtA0ic3SyRJOBCE85QGs707oHX24XTNN9kZvEL5A1MQ8XqHoaEwV'
            .'eKZv85xx1fypz0JBwL1jYD03VfoTqBr6IUrMbPIJfps3YUhCrXDSEoGZYKp9PMrSCsta4LycpL'
            .'hQXCI2TEUYWmppeoTMAOF2qcJ2O0JPfAi2iHcc3f6IzvlSOVxUgcyaM5la3BOcAgHmY8UZcwiv'
            .'lsM581i0v6B041K2FTlqaJIxFIggi5BQg7gaA4EB3ZUb9tcJerpsxwssiaqmZjAeaD9S2ilhGw'
            .'FNl1SFuR1SfZp3p8hsIFqKC0GQlKSmZ6aSmJiXhN9SQkn22ZB2cOVX3jrXvZupgjoCQYQnAwa';

        $this->manager->setLevel(Manager::LEVEL_LONG);
        $this->manager->setSecret($secret);
        $token = $this->manager->generate();

        $this->assertRegExp('/[a-zA-Z0-9]+/', $token);
        $this->assertEquals(strlen($token), 192);
    }

    /**
     * Test that the exception is thrown when the secret isn't the correct length
     *     In this case, it was set in setUp as *way* too short
     *
     * @expectedException \InvalidArgumentException
     */
    public function testGenerateRandomTokenBadSecret()
    {
        $token = $this->manager->generate();
    }

    /**
     * Test that the hash verification function is working correctly
     */
    public function testVerifyHashMatch()
    {
        // First make a hash to compare
        $secret = 'puV9vyJl0VqAqfenzaeQ2biH9AVWcFbZ6s1O3XZK2xYzPQcXqzRRDlqsCm4rI1o2Vekl'
            .'thIogBC8HxwezSwCp7POhLYoVQ2tpD1F82oTiR7gVXXZMDgLUAzHFUiopl10PnqZtDijl8vlV'
            .'YYjvTlJIfI4MGztHibpwHpQfQVQYGh0hmh33SaaIKaKXf0EUmjrRXmk2xO3P7MZVzln0NblAO'
            .'xeReR1b4uqtmx83EHrcSB0OJlPcw3RlNmKf8MabRet';

        $this->manager->setSecret($secret);
        $token = $this->manager->generate();

        // Now compare them
        $this->assertTrue($this->manager->verifyHash($token, $token));
    }

    /**
     * Test that, when given two different hash values, the verification fails
     */
    public function testVerifyHashNoMatch()
    {
        // First make a hash to compare
        $secret = 'puV9vyJl0VqAqfenzaeQ2biH9AVWcFbZ6s1O3XZK2xYzPQcXqzRRDlqsCm4rI1o2Vekl'
            .'thIogBC8HxwezSwCp7POhLYoVQ2tpD1F82oTiR7gVXXZMDgLUAzHFUiopl10PnqZtDijl8vlV'
            .'YYjvTlJIfI4MGztHibpwHpQfQVQYGh0hmh33SaaIKaKXf0EUmjrRXmk2xO3P7MZVzln0NblAO'
            .'xeReR1b4uqtmx83EHrcSB0OJlPcw3RlNmKf8MabRet';

        $this->manager->setSecret($secret);
        $token = $this->manager->generate();

        // Now compare them
        $this->assertFalse($this->manager->verifyHash($token, md5('badtokenvalue')));
    }

    /**
     * Test that the hash provided (generated) is valid given the secret
     */
    public function testVerifyHashValid()
    {
        // First make a token
        $secret = 'puV9vyJl0VqAqfenzaeQ2biH9AVWcFbZ6s1O3XZK2xYzPQcXqzRRDlqsCm4rI1o2Vekl'
            .'thIogBC8HxwezSwCp7POhLYoVQ2tpD1F82oTiR7gVXXZMDgLUAzHFUiopl10PnqZtDijl8vlV'
            .'YYjvTlJIfI4MGztHibpwHpQfQVQYGh0hmh33SaaIKaKXf0EUmjrRXmk2xO3P7MZVzln0NblAO'
            .'xeReR1b4uqtmx83EHrcSB0OJlPcw3RlNmKf8MabRet';

        $this->manager->setSecret($secret);
        $token = $this->manager->generate();

        // Now we verify this token
        $this->assertTrue($this->manager->verify($token));
    }

    /**
     * Test that an exception is thrown when the secret is null in token verification
     *
     * @expectedException \InvalidArgumentException
     */
    public function testVerifyHashNullSecret()
    {
        // First make a token
        $secret = 'puV9vyJl0VqAqfenzaeQ2biH9AVWcFbZ6s1O3XZK2xYzPQcXqzRRDlqsCm4rI1o2Vekl'
            .'thIogBC8HxwezSwCp7POhLYoVQ2tpD1F82oTiR7gVXXZMDgLUAzHFUiopl10PnqZtDijl8vlV'
            .'YYjvTlJIfI4MGztHibpwHpQfQVQYGh0hmh33SaaIKaKXf0EUmjrRXmk2xO3P7MZVzln0NblAO'
            .'xeReR1b4uqtmx83EHrcSB0OJlPcw3RlNmKf8MabRet';

        $this->manager->setSecret($secret);
        $token = $this->manager->generate();

        $this->manager->setSecret(null);
        $this->manager->verify($token);
    }
}
