<?php
/**
 * Auto generated from Salesforce.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers.Salesforce package
 */
namespace ProtocolBuffers\Salesforce\WriteRequest {
/**
 * NotificationType enum embedded in WriteRequest message
 */
final class NotificationType
{
    const NONE = 0;
    const ALL = 1;
    const ERRORS_ONLY = 2;
    const SUCCESSES_ONLY = 3;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'NONE' => self::NONE,
            'ALL' => self::ALL,
            'ERRORS_ONLY' => self::ERRORS_ONLY,
            'SUCCESSES_ONLY' => self::SUCCESSES_ONLY,
        );
    }
}
}