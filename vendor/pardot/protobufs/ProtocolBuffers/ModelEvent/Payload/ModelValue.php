<?php
/**
 * Auto generated from ModelEvent.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers\ModelEvent\Payload {
/**
 * ModelValue message embedded in Payload/ModelEvent message
 */
class ModelValue extends \ProtobufMessage
{
    /* Field index constants */
    const FIELD_NAME = 1;
    const FIELD_VALUE = 2;
    const TRUNCATED = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::FIELD_NAME => array(
            'name' => 'field_name',
            'required' => false,
            'type' => 7,
        ),
        self::FIELD_VALUE => array(
            'name' => 'field_value',
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
        $this->values[self::FIELD_NAME] = null;
        $this->values[self::FIELD_VALUE] = null;
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
     * Sets value of 'field_name' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setFieldName($value)
    {
        return $this->set(self::FIELD_NAME, $value);
    }

    /**
     * Returns value of 'field_name' property
     *
     * @return string
     */
    public function getFieldName()
    {
        return $this->get(self::FIELD_NAME);
    }

    /**
     * Sets value of 'field_value' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setFieldValue($value)
    {
        return $this->set(self::FIELD_VALUE, $value);
    }

    /**
     * Returns value of 'field_value' property
     *
     * @return string
     */
    public function getFieldValue()
    {
        return $this->get(self::FIELD_VALUE);
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