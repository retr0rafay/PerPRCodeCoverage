<?php
/**
 * Auto generated from UpstreamReplicationAction.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers {
/**
 * UpstreamReplicationCascadeAction message
 */
class UpstreamReplicationCascadeAction extends \ProtobufMessage
{
    /* Field index constants */
    const ASSET_EVENT = 1;
    const CASCADE_TARGET_TYPE = 2;
    const LAST_PROCESSED_ID = 3;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ASSET_EVENT => array(
            'name' => 'asset_event',
            'required' => false,
            'type' => '\ProtocolBuffers\AssetEvent'
        ),
        self::CASCADE_TARGET_TYPE => array(
            'name' => 'cascade_target_type',
            'required' => false,
            'type' => 7,
        ),
        self::LAST_PROCESSED_ID => array(
            'default' => 0, 
            'name' => 'last_processed_id',
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
        $this->values[self::ASSET_EVENT] = null;
        $this->values[self::CASCADE_TARGET_TYPE] = null;
        $this->values[self::LAST_PROCESSED_ID] = 0;
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
     * Sets value of 'asset_event' property
     *
     * @param \ProtocolBuffers\AssetEvent $value Property value
     *
     * @return null
     */
    public function setAssetEvent(\ProtocolBuffers\AssetEvent $value)
    {
        return $this->set(self::ASSET_EVENT, $value);
    }

    /**
     * Returns value of 'asset_event' property
     *
     * @return \ProtocolBuffers\AssetEvent
     */
    public function getAssetEvent()
    {
        return $this->get(self::ASSET_EVENT);
    }

    /**
     * Sets value of 'cascade_target_type' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setCascadeTargetType($value)
    {
        return $this->set(self::CASCADE_TARGET_TYPE, $value);
    }

    /**
     * Returns value of 'cascade_target_type' property
     *
     * @return string
     */
    public function getCascadeTargetType()
    {
        return $this->get(self::CASCADE_TARGET_TYPE);
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
}
}