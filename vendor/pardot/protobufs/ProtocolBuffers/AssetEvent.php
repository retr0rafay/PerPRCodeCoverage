<?php
/**
 * Auto generated from UpstreamReplicationAction.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers {
/**
 * AssetEvent message
 */
class AssetEvent extends \ProtobufMessage
{
    /* Field index constants */
    const EVENT_TYPE = 1;
    const ASSET = 2;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::EVENT_TYPE => array(
            'name' => 'event_type',
            'required' => false,
            'type' => 5,
        ),
        self::ASSET => array(
            'name' => 'asset',
            'required' => false,
            'type' => '\ProtocolBuffers\Asset'
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
        $this->values[self::EVENT_TYPE] = null;
        $this->values[self::ASSET] = null;
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
     * Sets value of 'event_type' property
     *
     * @param EventType $value Property value
     *
     * @return null
     */
    public function setEventType($value)
    {
        return $this->set(self::EVENT_TYPE, $value);
    }

    /**
     * Returns value of 'event_type' property
     *
     * @return EventType
     */
    public function getEventType()
    {
        return $this->get(self::EVENT_TYPE);
    }

    /**
     * Sets value of 'asset' property
     *
     * @param \ProtocolBuffers\Asset $value Property value
     *
     * @return null
     */
    public function setAsset(\ProtocolBuffers\Asset $value)
    {
        return $this->set(self::ASSET, $value);
    }

    /**
     * Returns value of 'asset' property
     *
     * @return \ProtocolBuffers\Asset
     */
    public function getAsset()
    {
        return $this->get(self::ASSET);
    }
}
}