<?php
/**
 * Auto generated from UpstreamReplicationAction.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers {
/**
 * UpstreamReplicationHealAction message
 */
class UpstreamReplicationHealAction extends \ProtobufMessage
{
    /* Field index constants */
    const ACCOUNT_ID = 1;
    const SHARD_ID = 2;
    const FORCE_HEAL = 3;
    const TARGET_TYPE = 4;
    const LAST_PROCESSED_ID = 5;
    const LOOKBACK_HOURS = 6;

    /* @var array Field descriptors */
    protected static $fields = array(
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
        self::FORCE_HEAL => array(
            'default' => false, 
            'name' => 'force_heal',
            'required' => false,
            'type' => 8,
        ),
        self::TARGET_TYPE => array(
            'name' => 'target_type',
            'required' => false,
            'type' => 7,
        ),
        self::LAST_PROCESSED_ID => array(
            'default' => 0, 
            'name' => 'last_processed_id',
            'required' => false,
            'type' => 5,
        ),
        self::LOOKBACK_HOURS => array(
            'default' => 24, 
            'name' => 'lookback_hours',
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
        $this->values[self::ACCOUNT_ID] = null;
        $this->values[self::SHARD_ID] = null;
        $this->values[self::FORCE_HEAL] = false;
        $this->values[self::TARGET_TYPE] = null;
        $this->values[self::LAST_PROCESSED_ID] = 0;
        $this->values[self::LOOKBACK_HOURS] = 24;
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
     * Sets value of 'force_heal' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setForceHeal($value)
    {
        return $this->set(self::FORCE_HEAL, $value);
    }

    /**
     * Returns value of 'force_heal' property
     *
     * @return bool
     */
    public function getForceHeal()
    {
        return $this->get(self::FORCE_HEAL);
    }

    /**
     * Sets value of 'target_type' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setTargetType($value)
    {
        return $this->set(self::TARGET_TYPE, $value);
    }

    /**
     * Returns value of 'target_type' property
     *
     * @return string
     */
    public function getTargetType()
    {
        return $this->get(self::TARGET_TYPE);
    }

    /**
     * Sets value of 'last_processed_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setLastProcessedId($value)
    {
        return $this->set(self::LAST_PROCESSED_ID, $value);
    }

    /**
     * Returns value of 'last_processed_id' property
     *
     * @return int
     */
    public function getLastProcessedId()
    {
        return $this->get(self::LAST_PROCESSED_ID);
    }

    /**
     * Sets value of 'lookback_hours' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setLookbackHours($value)
    {
        return $this->set(self::LOOKBACK_HOURS, $value);
    }

    /**
     * Returns value of 'lookback_hours' property
     *
     * @return int
     */
    public function getLookbackHours()
    {
        return $this->get(self::LOOKBACK_HOURS);
    }
}
}