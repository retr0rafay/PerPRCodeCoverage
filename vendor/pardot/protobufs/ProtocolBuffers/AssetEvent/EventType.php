<?php
/**
 * Auto generated from UpstreamReplicationAction.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */
namespace ProtocolBuffers\AssetEvent {
/**
 * EventType enum embedded in AssetEvent message
 */
final class EventType
{
    const UPDATE = 0;
    const CREATE = 1;
    const DELETED = 2;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'UPDATE' => self::UPDATE,
            'CREATE' => self::CREATE,
            'DELETED' => self::DELETED,
        );
    }
}
}