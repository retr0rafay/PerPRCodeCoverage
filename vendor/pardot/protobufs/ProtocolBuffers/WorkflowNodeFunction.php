<?php
/**
 * Auto generated from WorkflowNodeFunction.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers {
/**
 * WorkflowNodeFunction message
 */
class WorkflowNodeFunction extends \ProtobufMessage
{
    /* Field index constants */
    const ID = 1;
    const VALUE = 2;
    const TYPE = 3;
    const SUBTYPE = 4;
    const MATCH_TYPE = 5;
    const OPERATOR = 6;
    const OBJECT_TYPE = 7;
    const OBJECT_ID = 8;
    const PARAMETERS = 9;
    const SORT_ORDER = 10;
    const PROSPECT_VALUE = 11;
    const RESULT = 12;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ID => array(
            'name' => 'id',
            'required' => false,
            'type' => 5,
        ),
        self::VALUE => array(
            'name' => 'value',
            'required' => false,
            'type' => 7,
        ),
        self::TYPE => array(
            'name' => 'type',
            'required' => false,
            'type' => 5,
        ),
        self::SUBTYPE => array(
            'name' => 'subtype',
            'required' => false,
            'type' => 5,
        ),
        self::MATCH_TYPE => array(
            'name' => 'match_type',
            'required' => false,
            'type' => 5,
        ),
        self::OPERATOR => array(
            'name' => 'operator',
            'required' => false,
            'type' => 5,
        ),
        self::OBJECT_TYPE => array(
            'name' => 'object_type',
            'required' => false,
            'type' => 7,
        ),
        self::OBJECT_ID => array(
            'name' => 'object_id',
            'required' => false,
            'type' => 7,
        ),
        self::PARAMETERS => array(
            'name' => 'parameters',
            'required' => false,
            'type' => 7,
        ),
        self::SORT_ORDER => array(
            'name' => 'sort_order',
            'required' => false,
            'type' => 5,
        ),
        self::PROSPECT_VALUE => array(
            'name' => 'prospect_value',
            'required' => false,
            'type' => 7,
        ),
        self::RESULT => array(
            'name' => 'result',
            'required' => false,
            'type' => 5,
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
        $this->values[self::ID] = null;
        $this->values[self::VALUE] = null;
        $this->values[self::TYPE] = null;
        $this->values[self::SUBTYPE] = null;
        $this->values[self::MATCH_TYPE] = null;
        $this->values[self::OPERATOR] = null;
        $this->values[self::OBJECT_TYPE] = null;
        $this->values[self::OBJECT_ID] = null;
        $this->values[self::PARAMETERS] = null;
        $this->values[self::SORT_ORDER] = null;
        $this->values[self::PROSPECT_VALUE] = null;
        $this->values[self::RESULT] = null;
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
     * Sets value of 'id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setId($value)
    {
        return $this->set(self::ID, $value);
    }

    /**
     * Returns value of 'id' property
     *
     * @return int
     */
    public function getId()
    {
        return $this->get(self::ID);
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
     * Sets value of 'type' property
     *
     * @param int $value Property value
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
     * @return int
     */
    public function getType()
    {
        return $this->get(self::TYPE);
    }

    /**
     * Sets value of 'subtype' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setSubtype($value)
    {
        return $this->set(self::SUBTYPE, $value);
    }

    /**
     * Returns value of 'subtype' property
     *
     * @return int
     */
    public function getSubtype()
    {
        return $this->get(self::SUBTYPE);
    }

    /**
     * Sets value of 'match_type' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setMatchType($value)
    {
        return $this->set(self::MATCH_TYPE, $value);
    }

    /**
     * Returns value of 'match_type' property
     *
     * @return int
     */
    public function getMatchType()
    {
        return $this->get(self::MATCH_TYPE);
    }

    /**
     * Sets value of 'operator' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setOperator($value)
    {
        return $this->set(self::OPERATOR, $value);
    }

    /**
     * Returns value of 'operator' property
     *
     * @return int
     */
    public function getOperator()
    {
        return $this->get(self::OPERATOR);
    }

    /**
     * Sets value of 'object_type' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setObjectType($value)
    {
        return $this->set(self::OBJECT_TYPE, $value);
    }

    /**
     * Returns value of 'object_type' property
     *
     * @return string
     */
    public function getObjectType()
    {
        return $this->get(self::OBJECT_TYPE);
    }

    /**
     * Sets value of 'object_id' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setObjectId($value)
    {
        return $this->set(self::OBJECT_ID, $value);
    }

    /**
     * Returns value of 'object_id' property
     *
     * @return string
     */
    public function getObjectId()
    {
        return $this->get(self::OBJECT_ID);
    }

    /**
     * Sets value of 'parameters' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setParameters($value)
    {
        return $this->set(self::PARAMETERS, $value);
    }

    /**
     * Returns value of 'parameters' property
     *
     * @return string
     */
    public function getParameters()
    {
        return $this->get(self::PARAMETERS);
    }

    /**
     * Sets value of 'sort_order' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setSortOrder($value)
    {
        return $this->set(self::SORT_ORDER, $value);
    }

    /**
     * Returns value of 'sort_order' property
     *
     * @return int
     */
    public function getSortOrder()
    {
        return $this->get(self::SORT_ORDER);
    }

    /**
     * Sets value of 'prospect_value' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setProspectValue($value)
    {
        return $this->set(self::PROSPECT_VALUE, $value);
    }

    /**
     * Returns value of 'prospect_value' property
     *
     * @return string
     */
    public function getProspectValue()
    {
        return $this->get(self::PROSPECT_VALUE);
    }

    /**
     * Sets value of 'result' property
     *
     * @param FunctionResult $value Property value
     *
     * @return null
     */
    public function setResult($value)
    {
        return $this->set(self::RESULT, $value);
    }

    /**
     * Returns value of 'result' property
     *
     * @return FunctionResult
     */
    public function getResult()
    {
        return $this->get(self::RESULT);
    }
}
}