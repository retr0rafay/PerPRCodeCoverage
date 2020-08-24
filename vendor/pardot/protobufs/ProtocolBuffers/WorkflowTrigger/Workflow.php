<?php
/**
 * Auto generated from WorkflowTrigger.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers\WorkflowTrigger {
/**
 * Workflow message embedded in WorkflowTrigger message
 */
class Workflow extends \ProtobufMessage
{
    /* Field index constants */
    const WORKFLOW_ID = 1;
    const WORKFLOW_NODE_ID = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::WORKFLOW_ID => array(
            'name' => 'workflow_id',
            'required' => false,
            'type' => 5,
        ),
        self::WORKFLOW_NODE_ID => array(
            'name' => 'workflow_node_id',
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
        $this->values[self::WORKFLOW_ID] = null;
        $this->values[self::WORKFLOW_NODE_ID] = null;
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
     * Sets value of 'workflow_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setWorkflowId($value)
    {
        return $this->set(self::WORKFLOW_ID, $value);
    }

    /**
     * Returns value of 'workflow_id' property
     *
     * @return int
     */
    public function getWorkflowId()
    {
        return $this->get(self::WORKFLOW_ID);
    }

    /**
     * Sets value of 'workflow_node_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setWorkflowNodeId($value)
    {
        return $this->set(self::WORKFLOW_NODE_ID, $value);
    }

    /**
     * Returns value of 'workflow_node_id' property
     *
     * @return int
     */
    public function getWorkflowNodeId()
    {
        return $this->get(self::WORKFLOW_NODE_ID);
    }
}
}