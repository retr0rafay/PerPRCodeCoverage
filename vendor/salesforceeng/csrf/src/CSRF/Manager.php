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
use \SalesforceEng\CSRF\Output\Cookie;

/**
 * Main manager class, used to create and validate generated CSRF tokens
 *
 * @package SalesforceEng
 * @license BSD-3-Clause
 */
class Manager
{
    /**
     * Define the generator type constants
     */
    const GENERATOR_OPENSSL = 'openssl';
    const GENERATOR_URANDOM = 'urandom';

    /**
     * Current generator type (constant value)
     * @var string
     */
    private $generatorType;

    /**
     * Current secret value
     * @var string
     */
    private $secret;

    /**
     * Current strength level setting, default is REGULAR
     * @var integer
     */
    private $level = 0;

    /**
     * Strength level definitions (REGULAR and LONG)
     *     Secret length is in bits
     * @var array
     */
    private $levels = array(
        array('nonce' => 32, 'hash' => 'SHA256', 'resultLength' => '64', 'secretLength' => 256),
        array('nonce' => 64, 'hash' => 'SHA512', 'resultLength' => '64', 'secretLength' => 512)
    );

    /**
     * Constant relating to REGULAR level definition
     */
    const LEVEL_REGULAR = 0;

    /**
     * Constant relating to LONG level definition
     */
    const LEVEL_LONG = 1;

    private $useCookie = false;

    private $failReason;

    const FAIL_HASH_MISMATCH = 'CSRF hash mismatch';
    const FAIL_COOKIE_NOTSET = 'verify cookie not set';
    const FAIL_COOKIE_HASH_MISMATCH = 'verify cookie hash does not match';
    const FAIL_WITH_COOKIE_HASH_MISMATCH = 'verify cookie valid but CSRF hash does not match';

    /**
     * Init the object with a secret value, optionally provide an alternative hashing method
     *     and randomized data source
     *
     * @param string $secret Secret value
     * @param integer $level Hashing level to use [optional]
     * @param string $generatorType Generator type (ex self::GENERATOR_OPENSSL) [optional]
     */
    public function __construct($secret, $useCookie = false, $level = null, $generatorType = null)
    {
        $this->setSecret($secret);

        // Default to OpenSSL
        $this->setGeneratorType(
            ($generatorType !== null) ? $generatorType : self::GENERATOR_OPENSSL
        );

        if ($level !== null) {
            $this->setlevel($level);
        }
        $this->useCookie = $useCookie;
    }

    /**
     * Get the configuration for the given level. If level is not provided,
     *     it will try to use the one currently set on the class
     *
     * @param integer $level Level setting [optional]
     * @return mixed Array of level configuration if found, null otherwise
     */
    public function getLevelConfig($level = null)
    {
        $level = ($level === null) ? $this->getLevel() : $level;
        return (isset($this->levels[$level])) ? $this->levels[$level] : null;
    }

    /**
     * Get the current level
     *
     * @return integer Level setting
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set the "level" of hashing/key length to use
     *
     * @param integer $level Hashing/key length level
     * @throws \InvalidArgumentException If the level provided is invalid
     */
    public function setLevel($level)
    {
        if (!is_int($level) || !array_key_exists($level, $this->levels)) {
            throw new \InvalidArgumentException('Invalid level '.$level);
        }
        $this->level = $level;
    }

    /**
     * Sets the failure reason for the false return on the verify call
     *
     * @param string $reason One of the "FAIL_*" constants
     */
    public function setFailure($reason)
    {
        $this->failReason = $reason;
    }

    /**
     * Return the current failure reason
     *
     * @return null|string Either null if no failure or a string with failure information
     */
    public function getFailure()
    {
        return $this->failReason;
    }

    /**
     * Generate the token randomized token from the data source and secret
     *
     * @throws \InvalidArgumentException If secret does not meet minimum requirements
     * @return string Hex version of the generated hash
     */
    public function generate(array $options = array())
    {
        $generatorType = $this->getGeneratorType();
        $generatorNs = '\\SalesforceEng\\CSRF\\Generator\\'.ucwords(strtolower($generatorType));
        $generator = new $generatorNs();

        $level = $this->getLevelConfig();
        $secret = $this->getSecret();
        if (!$this->validateSecretRequirements($secret)) {
            throw new \InvalidArgumentException('Secret does not meet minimim requirements for '.$level['hash']);
        }

        $nonce = $generator->generate($level['nonce']);
        $token = $nonce.hash_hmac($level['hash'], $secret, $nonce);

        if ($this->useCookie === true) {
            $cookie = new \SalesforceEng\CSRF\Output\Cookie($token);
            $cookie->execute($options);
        }
        return $token;
    }

    /**
     * Validate that the "secret" value matches minimum requirements for the hash
     * @param string $secret Secret string
     * @return boolean Pass/fail result of secret check
     */
    public function validateSecretRequirements($secret)
    {
        $level = $this->getLevelConfig();
        return ((strlen($secret)*8) >= $level['secretLength']);
    }

    /**
     * Verify the hash provided, comparing the HMAC hash for correctness
     *     based on secret and nonce information
     *
     * @param string $token Token to verify
     * @param string $secret Secret value [optional]
     * @throws \InvalidArgumentException If the secret value is invalid
     * @return boolean Pass/fail of hash evaluation
     */
    public function verify($token, $secret = null)
    {
        $secret = ($secret === null) ? $this->getSecret() : $secret;

        if ($secret === null) {
            throw new \InvalidArgumentException('Invalid secret value.');
        }

        // First verify it for the token given
        list($hmac, $verifyHash, $nonce, $addl) = $this->splitToken($token);
        $result = $this->verifyHash($hmac, $verifyHash);

        if ($result === false) {
            $this->setFailure(self::FAIL_HASH_MISMATCH);
            return false;
        }

        // Now see if we need to verify the cookie too
        if ($this->useCookie === true) {
            if (!isset($_COOKIE[Cookie::COOKIE_NAME])) {
                $this->setFailure(self::FAIL_COOKIE_NOTSET);
                throw new \InvalidArgumentException('Cannot verify cookie "'.Cookie::COOKIE_NAME.'" - not set!');
            }
            $cookieToken = $_COOKIE[Cookie::COOKIE_NAME];

            // If our token values don't match, fail
            if ($this->verifyHash($token, $cookieToken) === false) {
                $this->setFailure(self::FAIL_COOKIE_HASH_MISMATCH);
                return false;
            }

            list($hmac, $verifyHash) = $this->splitToken($cookieToken);
            $result = $this->verifyHash($hmac, $verifyHash);
            if ($result == false) {
                $this->setFailure(self::FAIL_WITH_COOKIE_HASH_MISMATCH);
            }
            return $result;
        } else {
            return $result;
        }
    }

    public function splitToken($token)
    {
        $level = $this->getLevelConfig();
        $nonce = substr($token, 0, $level['nonce']);
        $hmac = substr($token, $level['nonce'], $level['resultLength']);

        $verifyHash = hash_hmac($level['hash'], $this->getSecret(), $nonce);

        $parts = [
            $hmac,
            $verifyHash,
            $nonce
        ];

        // See if there's anything left
        $parts[] = str_replace(
            [$nonce, $hmac],
            '',
            $token
        );

        return $parts;
    }

    /**
     * Timing-safe hash verification function
     *     Falls back to "hash_equals" if avaialable
     *
     * @param string $hash1 Hash 1 to compare
     * @param string $hash2 Hash 2 to compare
     * @return boolean Match/no match
     */
    public function verifyHash($hash1, $hash2)
    {
        if (\function_exists('hash_equals')) {
            return \hash_equals($hash1, $hash2);
        }
        if (\strlen($hash1) !== \strlen($hash2)) {
            return false;
        }
        $res = 0;
        $len = \strlen($hash1);
        for ($i = 0; $i < $len; ++$i) {
            $res |= \ord($hash1[$i]) ^ \ord($hash2[$i]);
        }
        return $res === 0;
    }

    /**
     * Get the current generator type (ex: self::GENERATOR_OPENSSL)
     *
     * @return string Generator type constant
     */
    public function getGeneratorType()
    {
        return $this->generatorType;
    }

    /**
     * Set the current generator type
     *
     * @param string $type Geenrator type constant
     */
    public function setGeneratorType($type)
    {
        $this->generatorType = $type;
    }

    /**
     * Get the current secret value
     *
     * @return string Secret value
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * Set the secret value
     *
     * @param string $secret Secret value
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
    }
}
