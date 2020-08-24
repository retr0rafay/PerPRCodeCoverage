<?php
/**
 * Auto generated from UpstreamReplicationAction.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers {
/**
 * FieldValue message
 */
class FieldValue extends \ProtobufMessage
{
    /* Field index constants */
    const FIELD = 1;
    const VALUE = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::FIELD => array(
            'name' => 'field',
            'required' => false,
            'type' => 7,
        ),
        self::VALUE => array(
            'name' => 'value',
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
        $this->values[self::FIELD] = null;
        $this->values[self::VALUE] = null;
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
     * Sets value of 'value' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setValue($value)
    {
        return $this->set(self::VALUE, $value);
    }

    /**
     * Returns value of 'value' property
     *
     * @return string
     */
    public function getValue()
    {
        return $this->get(self::VALUE);
    }
}
}