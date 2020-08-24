<?php
/**
 * Auto generated from WorkflowNode.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers {
/**
 * WorkflowNode message
 */
class WorkflowNode extends \ProtobufMessage
{
    /* Field index constants */
    const ID = 1;
    const VALUE = 2;
    const TYPE = 3;
    const PARAMETERS = 4;
    const TIMEOUT = 5;
    const ACTIONORRULE = 6;

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
        self::PARAMETERS => array(
            'name' => 'parameters',
            'required' => false,
            'type' => 7,
        ),
        self::TIMEOUT => array(
            'name' => 'timeout',
            'required' => false,
            'type' => 5,
        ),
        self::ACTIONORRULE => array(
            'name' => 'actionOrRule',
            'required' => false,
            'type' => '\ProtocolBuffers\WorkflowNodeFunction'
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
        $this->values[self::PARAMETERS] = null;
        $this->values[self::TIMEOUT] = null;
        $this->values[self::ACTIONORRULE] = null;
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
     * Sets value of 'timeout' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setTimeout($value)
    {
        return $this->set(self::TIMEOUT, $value);
    }

    /**
     * Returns value of 'timeout' property
     *
     * @return int
     */
    public function getTimeout()
    {
        return $this->get(self::TIMEOUT);
    }

    /**
     * Sets value of 'actionOrRule' property
     *
     * @param \ProtocolBuffers\WorkflowNodeFunction $value Property value
     *
     * @return null
     */
    public function setActionOrRule(\ProtocolBuffers\WorkflowNodeFunction $value)
    {
        return $this->set(self::ACTIONORRULE, $value);
    }

    /**
     * Returns value of 'actionOrRule' property
     *
     * @return \ProtocolBuffers\WorkflowNodeFunction
     */
    public function getActionOrRule()
    {
        return $this->get(self::ACTIONORRULE);
    }
}
}