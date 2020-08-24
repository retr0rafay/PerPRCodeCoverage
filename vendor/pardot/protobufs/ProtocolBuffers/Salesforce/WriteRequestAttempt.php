<?php
/**
 * Auto generated from Salesforce.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers.Salesforce package
 */

namespace ProtocolBuffers\Salesforce {
/**
 * WriteRequestAttempt message
 */
class WriteRequestAttempt extends \ProtobufMessage
{
    /* Field index constants */
    const ATTEMPT_NUMBER = 1;
    const TIMESTAMP = 2;
    const MESSAGE = 4;
    const CODE = 5;
    const DETAILS = 6;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ATTEMPT_NUMBER => array(
            'name' => 'attempt_number',
            'required' => false,
            'type' => 5,
        ),
        self::TIMESTAMP => array(
            'name' => 'timestamp',
            'required' => false,
            'type' => 5,
        ),
        self::MESSAGE => array(
            'name' => 'message',
            'required' => false,
            'type' => 7,
        ),
        self::CODE => array(
            'name' => 'code',
            'required' => false,
            'type' => 5,
        ),
        self::DETAILS => array(
            'name' => 'details',
            'required' => false,
            'type' => 7,
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
        $this->values[self::ATTEMPT_NUMBER] = null;
        $this->values[self::TIMESTAMP] = null;
        $this->values[self::MESSAGE] = null;
        $this->values[self::CODE] = null;
        $this->values[self::DETAILS] = null;
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
     * Sets value of 'attempt_number' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setAttemptNumber($value)
    {
        return $this->set(self::ATTEMPT_NUMBER, $value);
    }

    /**
     * Returns value of 'attempt_number' property
     *
     * @return int
     */
    public function getAttemptNumber()
    {
        return $this->get(self::ATTEMPT_NUMBER);
    }

    /**
     * Sets value of 'timestamp' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setTimestamp($value)
    {
        return $this->set(self::TIMESTAMP, $value);
    }

    /**
     * Returns value of 'timestamp' property
     *
     * @return int
     */
    public function getTimestamp()
    {
        return $this->get(self::TIMESTAMP);
    }

    /**
     * Sets value of 'message' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setMessage($value)
    {
        return $this->set(self::MESSAGE, $value);
    }

    /**
     * Returns value of 'message' property
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->get(self::MESSAGE);
    }

    /**
     * Sets value of 'code' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setCode($value)
    {
        return $this->set(self::CODE, $value);
    }

    /**
     * Returns value of 'code' property
     *
     * @return int
     */
    public function getCode()
    {
        return $this->get(self::CODE);
    }

    /**
     * Sets value of 'details' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setDetails($value)
    {
        return $this->set(self::DETAILS, $value);
    }

    /**
     * Returns value of 'details' property
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->get(self::DETAILS);
    }
}
}