<?php
/**
 * Auto generated from ActionApplication.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers {
/**
 * ActionApplication message
 */
class ActionApplication extends \ProtobufMessage
{
    /* Field index constants */
    const TIMESTAMP = 1;
    const ACCOUNT_ID = 2;
    const PROSPECT_ID = 3;
    const WORKFLOW_ACTION_IDS = 4;

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
        self::WORKFLOW_ACTION_IDS => array(
            'name' => 'workflow_action_ids',
            'repeated' => true,
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
        $this->values[self::WORKFLOW_ACTION_IDS] = array();
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
     * Appends value to 'workflow_action_ids' list
     *
     * @param int $value Value to append
     *
     * @return null
     */
    public function appendWorkflowActionIds($value)
    {
        return $this->append(self::WORKFLOW_ACTION_IDS, $value);
    }

    /**
     * Clears 'workflow_action_ids' list
     *
     * @return null
     */
    public function clearWorkflowActionIds()
    {
        return $this->clear(self::WORKFLOW_ACTION_IDS);
    }

    /**
     * Returns 'workflow_action_ids' list
     *
     * @return int[]
     */
    public function getWorkflowActionIds()
    {
        return $this->get(self::WORKFLOW_ACTION_IDS);
    }

    /**
     * Returns 'workflow_action_ids' iterator
     *
     * @return ArrayIterator
     */
    public function getWorkflowActionIdsIterator()
    {
        return new \ArrayIterator($this->get(self::WORKFLOW_ACTION_IDS));
    }

    /**
     * Returns element from 'workflow_action_ids' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return int
     */
    public function getWorkflowActionIdsAt($offset)
    {
        return $this->get(self::WORKFLOW_ACTION_IDS, $offset);
    }

    /**
     * Returns count of 'workflow_action_ids' list
     *
     * @return int
     */
    public function getWorkflowActionIdsCount()
    {
        return $this->count(self::WORKFLOW_ACTION_IDS);
    }
}
}