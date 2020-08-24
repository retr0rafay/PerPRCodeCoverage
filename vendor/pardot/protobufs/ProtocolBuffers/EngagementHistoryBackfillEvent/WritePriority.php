<?php
/**
 * Auto generated from EngagementHistoryBackfillEvent.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */
namespace ProtocolBuffers\EngagementHistoryBackfillEvent {
/**
 * WritePriority enum embedded in EngagementHistoryBackfillEvent message
 */
final class WritePriority
{
    const HIGH_PRIORITY = 0;
    const LOW_PRIORITY = 1;
    const NO_WRITE = 2;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'HIGH_PRIORITY' => self::HIGH_PRIORITY,
            'LOW_PRIORITY' => self::LOW_PRIORITY,
            'NO_WRITE' => self::NO_WRITE,
        );
    }
}
}