<?php
/**
 * Auto generated from ModelEvent.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers\ModelEvent\Payload {
/**
 * Change message embedded in Payload/ModelEvent message
 */
class Change extends \ProtobufMessage
{
    /* Field index constants */
    const FIELD = 1;
    const FROM = 2;
    const TO = 3;
    const TRUNCATED = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::FIELD => array(
            'name' => 'field',
            'required' => false,
            'type' => 7,
        ),
        self::FROM => array(
            'name' => 'from',
            'required' => false,
            'type' => 7,
        ),
        self::TO => array(
            'name' => 'to',
            'required' => false,
            'type' => 7,
        ),
        self::TRUNCATED => array(
            'name' => 'truncated',
            'required' => false,
            'type' => 8,
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
        $this->values[self::FIELD] = null;
        $this->values[self::FROM] = null;
        $this->values[self::TO] = null;
        $this->values[self::TRUNCATED] = null;
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
     * Sets value of 'field' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setField($value)
    {
        return $this->set(self::FIELD, $value);
    }

    /**
     * Returns value of 'field' property
     *
     * @return string
     */
    public function getField()
    {
        return $this->get(self::FIELD);
    }

    /**
     * Sets value of 'from' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setFrom($value)
    {
        return $this->set(self::FROM, $value);
    }

    /**
     * Returns value of 'from' property
     *
     * @return string
     */
    public function getFrom()
    {
        return $this->get(self::FROM);
    }

    /**
     * Sets value of 'to' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setTo($value)
    {
        return $this->set(self::TO, $value);
    }

    /**
     * Returns value of 'to' property
     *
     * @return string
     */
    public function getTo()
    {
        return $this->get(self::TO);
    }

    /**
     * Sets value of 'truncated' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setTruncated($value)
    {
        return $this->set(self::TRUNCATED, $value);
    }

    /**
     * Returns value of 'truncated' property
     *
     * @return bool
     */
    public function getTruncated()
    {
        return $this->get(self::TRUNCATED);
    }
}
}