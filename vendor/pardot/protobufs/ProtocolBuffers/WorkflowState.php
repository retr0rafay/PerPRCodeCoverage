<?php
/**
 * Auto generated from WorkflowState.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers {
/**
 * WorkflowState message
 */
class WorkflowState extends \ProtobufMessage
{
    /* Field index constants */
    const WORKFLOW_NODE_ID = 1;
    const STARTED_AT = 2;
    const CREATED_AT = 3;
    const EXPIRES_AT = 4;
    const IS_ACTIVE = 5;
    const NEEDS_PREPARE = 6;
    const WORKFLOW_VERSION_ID = 7;
    const WORKFLOW_NODE_STATUS = 8;
    const LOOP_COUNT = 9;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::WORKFLOW_NODE_ID => array(
            'name' => 'workflow_node_id',
            'required' => false,
            'type' => 5,
        ),
        self::STARTED_AT => array(
            'name' => 'started_at',
            'required' => false,
            'type' => 4,
        ),
        self::CREATED_AT => array(
            'name' => 'created_at',
            'required' => false,
            'type' => 4,
        ),
        self::EXPIRES_AT => array(
            'name' => 'expires_at',
            'required' => false,
            'type' => 4,
        ),
        self::IS_ACTIVE => array(
            'name' => 'is_active',
            'required' => false,
            'type' => 8,
        ),
        self::NEEDS_PREPARE => array(
            'name' => 'needs_prepare',
            'required' => false,
            'type' => 8,
        ),
        self::WORKFLOW_VERSION_ID => array(
            'name' => 'workflow_version_id',
            'required' => false,
            'type' => 5,
        ),
        self::WORKFLOW_NODE_STATUS => array(
            'name' => 'workflow_node_status',
            'required' => false,
            'type' => 5,
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
        $this->values[self::WORKFLOW_NODE_ID] = null;
        $this->values[self::STARTED_AT] = null;
        $this->values[self::CREATED_AT] = null;
        $this->values[self::EXPIRES_AT] = null;
        $this->values[self::IS_ACTIVE] = null;
        $this->values[self::NEEDS_PREPARE] = null;
        $this->values[self::WORKFLOW_VERSION_ID] = null;
        $this->values[self::WORKFLOW_NODE_STATUS] = null;
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

    /**
     * Sets value of 'started_at' property
     *
     * @param float $value Property value
     *
     * @return null
     */
    public function setStartedAt($value)
    {
        return $this->set(self::STARTED_AT, $value);
    }

    /**
     * Returns value of 'started_at' property
     *
     * @return float
     */
    public function getStartedAt()
    {
        return $this->get(self::STARTED_AT);
    }

    /**
     * Sets value of 'created_at' property
     *
     * @param float $value Property value
     *
     * @return null
     */
    public function setCreatedAt($value)
    {
        return $this->set(self::CREATED_AT, $value);
    }

    /**
     * Returns value of 'created_at' property
     *
     * @return float
     */
    public function getCreatedAt()
    {
        return $this->get(self::CREATED_AT);
    }

    /**
     * Sets value of 'expires_at' property
     *
     * @param float $value Property value
     *
     * @return null
     */
    public function setExpiresAt($value)
    {
        return $this->set(self::EXPIRES_AT, $value);
    }

    /**
     * Returns value of 'expires_at' property
     *
     * @return float
     */
    public function getExpiresAt()
    {
        return $this->get(self::EXPIRES_AT);
    }

    /**
     * Sets value of 'is_active' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setIsActive($value)
    {
        return $this->set(self::IS_ACTIVE, $value);
    }

    /**
     * Returns value of 'is_active' property
     *
     * @return bool
     */
    public function getIsActive()
    {
        return $this->get(self::IS_ACTIVE);
    }

    /**
     * Sets value of 'needs_prepare' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setNeedsPrepare($value)
    {
        return $this->set(self::NEEDS_PREPARE, $value);
    }

    /**
     * Returns value of 'needs_prepare' property
     *
     * @return bool
     */
    public function getNeedsPrepare()
    {
        return $this->get(self::NEEDS_PREPARE);
    }

    /**
     * Sets value of 'workflow_version_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setWorkflowVersionId($value)
    {
        return $this->set(self::WORKFLOW_VERSION_ID, $value);
    }

    /**
     * Returns value of 'workflow_version_id' property
     *
     * @return int
     */
    public function getWorkflowVersionId()
    {
        return $this->get(self::WORKFLOW_VERSION_ID);
    }

    /**
     * Sets value of 'workflow_node_status' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setWorkflowNodeStatus($value)
    {
        return $this->set(self::WORKFLOW_NODE_STATUS, $value);
    }

    /**
     * Returns value of 'workflow_node_status' property
     *
     * @return int
     */
    public function getWorkflowNodeStatus()
    {
        return $this->get(self::WORKFLOW_NODE_STATUS);
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