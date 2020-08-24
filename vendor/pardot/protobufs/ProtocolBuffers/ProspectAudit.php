<?php
/**
 * Auto generated from ProspectAudit.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers {
/**
 * ProspectAudit message
 */
class ProspectAudit extends \ProtobufMessage
{
    /* Field index constants */
    const TIMESTAMP = 1;
    const ACCOUNT_ID = 2;
    const PROSPECT_ID = 3;
    const WORKFLOW__ID = 4;
    const MESSAGE_TYPE = 5;
    const WORKFLOW_NODE = 6;
    const WORKFLOW_STATE = 7;
    const STATE_TRANSITION = 8;
    const LOOP_COUNT = 9;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::TIMESTAMP => array(
            'name' => 'timestamp',
            'required' => false,
            'type' => 4,
        ),
        self::ACCOUNT_ID => array(
            'name' => 'account_id',
            'required' => false,
            'type' => 5,
        ),
        self::PROSPECT_ID => array(
            'name' => 'prospect_id',
            'required' => false,
            'type' => 5,
        ),
        self::WORKFLOW__ID => array(
            'name' => 'workflow__id',
            'required' => false,
            'type' => 5,
        ),
        self::MESSAGE_TYPE => array(
            'name' => 'message_type',
            'required' => false,
            'type' => 5,
        ),
        self::WORKFLOW_NODE => array(
            'name' => 'workflow_node',
            'required' => false,
            'type' => '\ProtocolBuffers\WorkflowNode'
        ),
        self::WORKFLOW_STATE => array(
            'name' => 'workflow_state',
            'required' => false,
            'type' => '\ProtocolBuffers\WorkflowState'
        ),
        self::STATE_TRANSITION => array(
            'name' => 'state_transition',
            'required' => false,
            'type' => '\ProtocolBuffers\StateTransition'
        ),
        self::LOOP_COUNT => array(
            'name' => 'loop_count',
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
        $this->values[self::TIMESTAMP] = null;
        $this->values[self::ACCOUNT_ID] = null;
        $this->values[self::PROSPECT_ID] = null;
        $this->values[self::WORKFLOW__ID] = null;
        $this->values[self::MESSAGE_TYPE] = null;
        $this->values[self::WORKFLOW_NODE] = null;
        $this->values[self::WORKFLOW_STATE] = null;
        $this->values[self::STATE_TRANSITION] = null;
        $this->values[self::LOOP_COUNT] = null;
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
     * Sets value of 'timestamp' property
     *
     * @param float $value Property value
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
     * @return float
     */
    public function getTimestamp()
    {
        return $this->get(self::TIMESTAMP);
    }

    /**
     * Sets value of 'account_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setAccountId($value)
    {
        return $this->set(self::ACCOUNT_ID, $value);
    }

    /**
     * Returns value of 'account_id' property
     *
     * @return int
     */
    public function getAccountId()
    {
        return $this->get(self::ACCOUNT_ID);
    }

    /**
     * Sets value of 'prospect_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setProspectId($value)
    {
        return $this->set(self::PROSPECT_ID, $value);
    }

    /**
     * Returns value of 'prospect_id' property
     *
     * @return int
     */
    public function getProspectId()
    {
        return $this->get(self::PROSPECT_ID);
    }

    /**
     * Sets value of 'workflow__id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setWorkflowId($value)
    {
        return $this->set(self::WORKFLOW__ID, $value);
    }

    /**
     * Returns value of 'workflow__id' property
     *
     * @return int
     */
    public function getWorkflowId()
    {
        return $this->get(self::WORKFLOW__ID);
    }

    /**
     * Sets value of 'message_type' property
     *
     * @param MessageType $value Property value
     *
     * @return null
     */
    public function setMessageType($value)
    {
        return $this->set(self::MESSAGE_TYPE, $value);
    }

    /**
     * Returns value of 'message_type' property
     *
     * @return MessageType
     */
    public function getMessageType()
    {
        return $this->get(self::MESSAGE_TYPE);
    }

    /**
     * Sets value of 'workflow_node' property
     *
     * @param \ProtocolBuffers\WorkflowNode $value Property value
     *
     * @return null
     */
    public function setWorkflowNode(\ProtocolBuffers\WorkflowNode $value)
    {
        return $this->set(self::WORKFLOW_NODE, $value);
    }

    /**
     * Returns value of 'workflow_node' property
     *
     * @return \ProtocolBuffers\WorkflowNode
     */
    public function getWorkflowNode()
    {
        return $this->get(self::WORKFLOW_NODE);
    }

    /**
     * Sets value of 'workflow_state' property
     *
     * @param \ProtocolBuffers\WorkflowState $value Property value
     *
     * @return null
     */
    public function setWorkflowState(\ProtocolBuffers\WorkflowState $value)
    {
        return $this->set(self::WORKFLOW_STATE, $value);
    }

    /**
     * Returns value of 'workflow_state' property
     *
     * @return \ProtocolBuffers\WorkflowState
     */
    public function getWorkflowState()
    {
        return $this->get(self::WORKFLOW_STATE);
    }

    /**
     * Sets value of 'state_transition' property
     *
     * @param \ProtocolBuffers\StateTransition $value Property value
     *
     * @return null
     */
    public function setStateTransition(\ProtocolBuffers\StateTransition $value)
    {
        return $this->set(self::STATE_TRANSITION, $value);
    }

    /**
     * Returns value of 'state_transition' property
     *
     * @return \ProtocolBuffers\StateTransition
     */
    public function getStateTransition()
    {
        return $this->get(self::STATE_TRANSITION);
    }

    /**
     * Sets value of 'loop_count' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setLoopCount($value)
    {
        return $this->set(self::LOOP_COUNT, $value);
    }

    /**
     * Returns value of 'loop_count' property
     *
     * @return int
     */
    public function getLoopCount()
    {
        return $this->get(self::LOOP_COUNT);
    }
}
}