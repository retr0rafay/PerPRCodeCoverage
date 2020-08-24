<?php
/**
 * Auto generated from WorkflowTrigger.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers {
/**
 * WorkflowTrigger message
 */
class WorkflowTrigger extends \ProtobufMessage
{
    /* Field index constants */
    const TIMESTAMP = 1;
    const ACCOUNT_ID = 2;
    const SHARD_ID = 3;
    const PROSPECT_IDS = 4;
    const TRIGGER = 5;
    const WORKFLOWS = 6;
    const SOURCEEVENTS = 7;

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
        self::SHARD_ID => array(
            'name' => 'shard_id',
            'required' => false,
            'type' => 5,
        ),
        self::PROSPECT_IDS => array(
            'name' => 'prospect_ids',
            'repeated' => true,
            'type' => 5,
        ),
        self::TRIGGER => array(
            'name' => 'trigger',
            'required' => false,
            'type' => 5,
        ),
        self::WORKFLOWS => array(
            'name' => 'workflows',
            'repeated' => true,
            'type' => '\ProtocolBuffers\WorkflowTrigger\Workflow'
        ),
        self::SOURCEEVENTS => array(
            'name' => 'sourceEvents',
            'repeated' => true,
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
        $this->values[self::TIMESTAMP] = null;
        $this->values[self::ACCOUNT_ID] = null;
        $this->values[self::SHARD_ID] = null;
        $this->values[self::PROSPECT_IDS] = array();
        $this->values[self::TRIGGER] = null;
        $this->values[self::WORKFLOWS] = array();
        $this->values[self::SOURCEEVENTS] = array();
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
     * Appends value to 'prospect_ids' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendProspectIds($value)
    {
        return $this->append(self::PROSPECT_IDS, $value);
    }

    /**
     * Clears 'prospect_ids' list
     *
     * @return null
     */
    public function clearProspectIds()
    {
        return $this->clear(self::PROSPECT_IDS);
    }

    /**
     * Returns 'prospect_ids' list
     *
     * @return int[]
     */
    public function getProspectIds()
    {
        return $this->get(self::PROSPECT_IDS);
    }

    /**
     * Returns 'prospect_ids' iterator
     *
     * @return ArrayIterator
     */
    public function getProspectIdsIterator()
    {
        return new \ArrayIterator($this->get(self::PROSPECT_IDS));
    }

    /**
     * Returns element from 'prospect_ids' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getProspectIdsAt($offset)
    {
        return $this->get(self::PROSPECT_IDS, $offset);
    }

    /**
     * Returns count of 'prospect_ids' list
     *
     * @return int
     */
    public function getProspectIdsCount()
    {
        return $this->count(self::PROSPECT_IDS);
    }

    /**
     * Sets value of 'trigger' property
     *
     * @param TriggerType $value Property value
     *
     * @return null
     */
    public function setTrigger($value)
    {
        return $this->set(self::TRIGGER, $value);
    }

    /**
     * Returns value of 'trigger' property
     *
     * @return TriggerType
     */
    public function getTrigger()
    {
        return $this->get(self::TRIGGER);
    }

    /**
     * Appends value to 'workflows' list
     *
     * @param \ProtocolBuffers\WorkflowTrigger\Workflow $value Value to append
     *
     * @return null
     */
    public function appendWorkflows(\ProtocolBuffers\WorkflowTrigger\Workflow $value)
    {
        return $this->append(self::WORKFLOWS, $value);
    }

    /**
     * Clears 'workflows' list
     *
     * @return null
     */
    public function clearWorkflows()
    {
        return $this->clear(self::WORKFLOWS);
    }

    /**
     * Returns 'workflows' list
     *
     * @return \ProtocolBuffers\WorkflowTrigger\Workflow[]
     */
    public function getWorkflows()
    {
        return $this->get(self::WORKFLOWS);
    }

    /**
     * Returns 'workflows' iterator
     *
     * @return ArrayIterator
     */
    public function getWorkflowsIterator()
    {
        return new \ArrayIterator($this->get(self::WORKFLOWS));
    }

    /**
     * Returns element from 'workflows' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \ProtocolBuffers\WorkflowTrigger\Workflow
     */
    public function getWorkflowsAt($offset)
    {
        return $this->get(self::WORKFLOWS, $offset);
    }

    /**
     * Returns count of 'workflows' list
     *
     * @return int
     */
    public function getWorkflowsCount()
    {
        return $this->count(self::WORKFLOWS);
    }

    /**
     * Appends value to 'sourceEvents' list
     *
     * @param \ProtocolBuffers\ModelEvent $value Value to append
     *
     * @return null
     */
    public function appendSourceEvents(\ProtocolBuffers\ModelEvent $value)
    {
        return $this->append(self::SOURCEEVENTS, $value);
    }

    /**
     * Clears 'sourceEvents' list
     *
     * @return null
     */
    public function clearSourceEvents()
    {
        return $this->clear(self::SOURCEEVENTS);
    }

    /**
     * Returns 'sourceEvents' list
     *
     * @return \ProtocolBuffers\ModelEvent[]
     */
    public function getSourceEvents()
    {
        return $this->get(self::SOURCEEVENTS);
    }

    /**
     * Returns 'sourceEvents' iterator
     *
     * @return ArrayIterator
     */
    public function getSourceEventsIterator()
    {
        return new \ArrayIterator($this->get(self::SOURCEEVENTS));
    }

    /**
     * Returns element from 'sourceEvents' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \ProtocolBuffers\ModelEvent
     */
    public function getSourceEventsAt($offset)
    {
        return $this->get(self::SOURCEEVENTS, $offset);
    }

    /**
     * Returns count of 'sourceEvents' list
     *
     * @return int
     */
    public function getSourceEventsCount()
    {
        return $this->count(self::SOURCEEVENTS);
    }
}
}