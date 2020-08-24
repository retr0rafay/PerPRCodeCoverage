<?php
/**
 * Auto generated from Salesforce.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers.Salesforce package
 */

namespace ProtocolBuffers\Salesforce\SObject {
/**
 * Field message embedded in SObject message
 */
class Field extends \ProtobufMessage
{
    /* Field index constants */
    const NAME = 1;
    const TYPE = 2;
    const VALUE = 3;
    const NULLED = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::NAME => array(
            'name' => 'name',
            'required' => false,
            'type' => 7,
        ),
        self::TYPE => array(
            'name' => 'type',
            'required' => false,
            'type' => 5,
        ),
        self::VALUE => array(
            'name' => 'value',
            'required' => false,
            'type' => 7,
        ),
        self::NULLED => array(
            'default' => false, 
            'name' => 'nulled',
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
        $this->values[self::NAME] = null;
        $this->values[self::TYPE] = null;
        $this->values[self::VALUE] = null;
        $this->values[self::NULLED] = false;
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
     * Sets value of 'name' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setName($value)
    {
        return $this->set(self::NAME, $value);
    }

    /**
     * Returns value of 'name' property
     *
     * @return string
     */
    public function getName()
    {
        return $this->get(self::NAME);
    }

    /**
     * Sets value of 'type' property
     *
     * @param Type $value Property value
     *
     * @return null
     */
    public function setType($value)
    {
        return $this->set(self::TYPE, $value);
    }

    /**
     * Returns value of 'type' property
     *
     * @return Type
     */
    public function getType()
    {
        return $this->get(self::TYPE);
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

    /**
     * Sets value of 'nulled' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setNulled($value)
    {
        return $this->set(self::NULLED, $value);
    }

    /**
     * Returns value of 'nulled' property
     *
     * @return bool
     */
    public function getNulled()
    {
        return $this->get(self::NULLED);
    }
}
}