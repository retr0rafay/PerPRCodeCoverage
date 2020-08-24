<?php
/**
 * Auto generated from UpstreamReplicationAction.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers {
/**
 * UpstreamForceReplication message
 */
class UpstreamForceReplication extends \ProtobufMessage
{
    /* Field index constants */
    const ASSET_EVENT = 1;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ASSET_EVENT => array(
            'name' => 'asset_event',
            'required' => false,
            'type' => '\ProtocolBuffers\AssetEvent'
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
}
}