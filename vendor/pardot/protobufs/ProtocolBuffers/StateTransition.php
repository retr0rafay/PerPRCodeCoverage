<?php
/**
 * Auto generated from StateTransition.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers {
/**
 * StateTransition message
 */
class StateTransition extends \ProtobufMessage
{
    /* Field index constants */
    const WORKFLOW_NODE_FROM_ID = 1;
    const WORKFLOW_NODE_TO_ID = 2;
    const SORT_ORDER_FOLLOWED = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::WORKFLOW_NODE_FROM_ID => array(
            'name' => 'workflow_node_from_id',
            'required' => false,
            'type' => 5,
        ),
        self::WORKFLOW_NODE_TO_ID => array(
            'name' => 'workflow_node_to_id',
            'required' => false,
            'type' => 5,
        ),
        self::SORT_ORDER_FOLLOWED => array(
            'name' => 'sort_order_followed',
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
        $this->values[self::WORKFLOW_NODE_FROM_ID] = null;
        $this->values[self::WORKFLOW_NODE_TO_ID] = null;
        $this->values[self::SORT_ORDER_FOLLOWED] = null;
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
     * Sets value of 'workflow_node_from_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setWorkflowNodeFromId($value)
    {
        return $this->set(self::WORKFLOW_NODE_FROM_ID, $value);
    }

    /**
     * Returns value of 'workflow_node_from_id' property
     *
     * @return int
     */
    public function getWorkflowNodeFromId()
    {
        return $this->get(self::WORKFLOW_NODE_FROM_ID);
    }

    /**
     * Sets value of 'workflow_node_to_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setWorkflowNodeToId($value)
    {
        return $this->set(self::WORKFLOW_NODE_TO_ID, $value);
    }

    /**
     * Returns value of 'workflow_node_to_id' property
     *
     * @return int
     */
    public function getWorkflowNodeToId()
    {
        return $this->get(self::WORKFLOW_NODE_TO_ID);
    }

    /**
     * Sets value of 'sort_order_followed' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setSortOrderFollowed($value)
    {
        return $this->set(self::SORT_ORDER_FOLLOWED, $value);
    }

    /**
     * Returns value of 'sort_order_followed' property
     *
     * @return int
     */
    public function getSortOrderFollowed()
    {
        return $this->get(self::SORT_ORDER_FOLLOWED);
    }
}
}