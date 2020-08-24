<?php
/**
 * Auto generated from Salesforce.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers.Salesforce package
 */

namespace ProtocolBuffers\Salesforce {
/**
 * RetryContext message
 */
class RetryContext extends \ProtobufMessage
{
    /* Field index constants */
    const MAX_ATTEMPTS = 1;
    const PREVIOUS_ATTEMPTS = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::MAX_ATTEMPTS => array(
            'default' => 1, 
            'name' => 'max_attempts',
            'required' => false,
            'type' => 5,
        ),
        self::PREVIOUS_ATTEMPTS => array(
            'name' => 'previous_attempts',
            'repeated' => true,
            'type' => '\ProtocolBuffers\Salesforce\WriteRequestAttempt'
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::MAX_ATTEMPTS] = 1;
        $this->values[self::PREVIOUS_ATTEMPTS] = array();
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'max_attempts' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMaxAttempts($value)
    {
        return $this->set(self::MAX_ATTEMPTS, $value);
    }

    /**
     * Returns value of 'max_attempts' property
     *
     * @return int
     */
    public function getMaxAttempts()
    {
        return $this->get(self::MAX_ATTEMPTS);
    }

    /**
     * Appends value to 'previous_attempts' list
     *
     * @param \ProtocolBuffers\Salesforce\WriteRequestAttempt $value Value to append
     *
     * @return null
     */
    public function appendPreviousAttempts(\ProtocolBuffers\Salesforce\WriteRequestAttempt $value)
    {
        return $this->append(self::PREVIOUS_ATTEMPTS, $value);
    }

    /**
     * Clears 'previous_attempts' list
     *
     * @return null
     */
    public function clearPreviousAttempts()
    {
        return $this->clear(self::PREVIOUS_ATTEMPTS);
    }

    /**
     * Returns 'previous_attempts' list
     *
     * @return \ProtocolBuffers\Salesforce\WriteRequestAttempt[]
     */
    public function getPreviousAttempts()
    {
        return $this->get(self::PREVIOUS_ATTEMPTS);
    }

    /**
     * Returns 'previous_attempts' iterator
     *
     * @return ArrayIterator
     */
    public function getPreviousAttemptsIterator()
    {
        return new \ArrayIterator($this->get(self::PREVIOUS_ATTEMPTS));
    }

    /**
     * Returns element from 'previous_attempts' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \ProtocolBuffers\Salesforce\WriteRequestAttempt
     */
    public function getPreviousAttemptsAt($offset)
    {
        return $this->get(self::PREVIOUS_ATTEMPTS, $offset);
    }

    /**
     * Returns count of 'previous_attempts' list
     *
     * @return int
     */
    public function getPreviousAttemptsCount()
    {
        return $this->count(self::PREVIOUS_ATTEMPTS);
    }
}
}