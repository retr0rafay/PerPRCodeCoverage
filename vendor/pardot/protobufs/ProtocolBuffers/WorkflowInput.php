<?php
/**
 * Auto generated from WorkflowInput.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers {
/**
 * WorkflowInput message
 */
class WorkflowInput extends \ProtobufMessage
{
    /* Field index constants */
    const UUID = 1;
    const TIMESTAMP = 2;
    const ACCOUNT_ID = 3;
    const SHARD_ID = 4;
    const PROSPECT_ID = 5;
    const OBJECT_TYPE = 6;
    const OBJECT_ID = 7;
    const WORKFLOW_IDS = 8;
    const EVENT_MODEL = 9;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::UUID => array(
            'name' => 'uuid',
            'required' => false,
            'type' => 7,
        ),
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
        self::SHARD_ID => array(
            'name' => 'shard_id',
            'required' => false,
            'type' => 5,
        ),
        self::PROSPECT_ID => array(
            'name' => 'prospect_id',
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
            'type' => 5,
        ),
        self::WORKFLOW_IDS => array(
            'name' => 'workflow_ids',
            'repeated' => true,
            'type' => 5,
        ),
        self::EVENT_MODEL => array(
            'name' => 'event_model',
            'required' => false,
            'type' => '\ProtocolBuffers\ModelEvent'
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
        $this->values[self::UUID] = null;
        $this->values[self::TIMESTAMP] = null;
        $this->values[self::ACCOUNT_ID] = null;
        $this->values[self::SHARD_ID] = null;
        $this->values[self::PROSPECT_ID] = null;
        $this->values[self::OBJECT_TYPE] = null;
        $this->values[self::OBJECT_ID] = null;
        $this->values[self::WORKFLOW_IDS] = array();
        $this->values[self::EVENT_MODEL] = null;
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
     * Sets value of 'uuid' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setUuid($value)
    {
        return $this->set(self::UUID, $value);
    }

    /**
     * Returns value of 'uuid' property
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->get(self::UUID);
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
     * Sets value of 'shard_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setShardId($value)
    {
        return $this->set(self::SHARD_ID, $value);
    }

    /**
     * Returns value of 'shard_id' property
     *
     * @return int
     */
    public function getShardId()
    {
        return $this->get(self::SHARD_ID);
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
     * @param int $value Property value
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
     * @return int
     */
    public function getObjectId()
    {
        return $this->get(self::OBJECT_ID);
    }

    /**
     * Appends value to 'workflow_ids' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendWorkflowIds($value)
    {
        return $this->append(self::WORKFLOW_IDS, $value);
    }

    /**
     * Clears 'workflow_ids' list
     *
     * @return null
     */
    public function clearWorkflowIds()
    {
        return $this->clear(self::WORKFLOW_IDS);
    }

    /**
     * Returns 'workflow_ids' list
     *
     * @return int[]
     */
    public function getWorkflowIds()
    {
        return $this->get(self::WORKFLOW_IDS);
    }

    /**
     * Returns 'workflow_ids' iterator
     *
     * @return ArrayIterator
     */
    public function getWorkflowIdsIterator()
    {
        return new \ArrayIterator($this->get(self::WORKFLOW_IDS));
    }

    /**
     * Returns element from 'workflow_ids' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getWorkflowIdsAt($offset)
    {
        return $this->get(self::WORKFLOW_IDS, $offset);
    }

    /**
     * Returns count of 'workflow_ids' list
     *
     * @return int
     */
    public function getWorkflowIdsCount()
    {
        return $this->count(self::WORKFLOW_IDS);
    }

    /**
     * Sets value of 'event_model' property
     *
     * @param \ProtocolBuffers\ModelEvent $value Property value
     *
     * @return null
     */
    public function setEventModel(\ProtocolBuffers\ModelEvent $value)
    {
        return $this->set(self::EVENT_MODEL, $value);
    }

    /**
     * Returns value of 'event_model' property
     *
     * @return \ProtocolBuffers\ModelEvent
     */
    public function getEventModel()
    {
        return $this->get(self::EVENT_MODEL);
    }
}
}