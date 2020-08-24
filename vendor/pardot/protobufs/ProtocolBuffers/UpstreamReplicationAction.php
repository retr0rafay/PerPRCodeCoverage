<?php
/**
 * Auto generated from UpstreamReplicationAction.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers {
/**
 * UpstreamReplicationAction message
 */
class UpstreamReplicationAction extends \ProtobufMessage
{
    /* Field index constants */
    const CASCADE_ACTION = 1;
    const HEAL_ACTION = 2;
    const FORCE_REPLICATION_ACTION = 3;
    const TIMESTAMP = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::CASCADE_ACTION => array(
            'name' => 'cascade_action',
            'required' => false,
            'type' => '\ProtocolBuffers\UpstreamReplicationCascadeAction'
        ),
        self::HEAL_ACTION => array(
            'name' => 'heal_action',
            'required' => false,
            'type' => '\ProtocolBuffers\UpstreamReplicationHealAction'
        ),
        self::FORCE_REPLICATION_ACTION => array(
            'name' => 'force_replication_action',
            'required' => false,
            'type' => '\ProtocolBuffers\UpstreamForceReplication'
        ),
        self::TIMESTAMP => array(
            'name' => 'timestamp',
            'required' => false,
            'type' => 4,
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
        $this->values[self::CASCADE_ACTION] = null;
        $this->values[self::HEAL_ACTION] = null;
        $this->values[self::FORCE_REPLICATION_ACTION] = null;
        $this->values[self::TIMESTAMP] = null;
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
     * Sets value of 'cascade_action' property
     *
     * @param \ProtocolBuffers\UpstreamReplicationCascadeAction $value Property value
     *
     * @return null
     */
    public function setCascadeAction(\ProtocolBuffers\UpstreamReplicationCascadeAction $value)
    {
        return $this->set(self::CASCADE_ACTION, $value);
    }

    /**
     * Returns value of 'cascade_action' property
     *
     * @return \ProtocolBuffers\UpstreamReplicationCascadeAction
     */
    public function getCascadeAction()
    {
        return $this->get(self::CASCADE_ACTION);
    }

    /**
     * Sets value of 'heal_action' property
     *
     * @param \ProtocolBuffers\UpstreamReplicationHealAction $value Property value
     *
     * @return null
     */
    public function setHealAction(\ProtocolBuffers\UpstreamReplicationHealAction $value)
    {
        return $this->set(self::HEAL_ACTION, $value);
    }

    /**
     * Returns value of 'heal_action' property
     *
     * @return \ProtocolBuffers\UpstreamReplicationHealAction
     */
    public function getHealAction()
    {
        return $this->get(self::HEAL_ACTION);
    }

    /**
     * Sets value of 'force_replication_action' property
     *
     * @param \ProtocolBuffers\UpstreamForceReplication $value Property value
     *
     * @return null
     */
    public function setForceReplicationAction(\ProtocolBuffers\UpstreamForceReplication $value)
    {
        return $this->set(self::FORCE_REPLICATION_ACTION, $value);
    }

    /**
     * Returns value of 'force_replication_action' property
     *
     * @return \ProtocolBuffers\UpstreamForceReplication
     */
    public function getForceReplicationAction()
    {
        return $this->get(self::FORCE_REPLICATION_ACTION);
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
}
}