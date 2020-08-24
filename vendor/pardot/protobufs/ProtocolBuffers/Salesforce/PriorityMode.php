<?php
/**
 * Auto generated from Salesforce.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers.Salesforce package
 */
namespace ProtocolBuffers\Salesforce {
/**
 * PriorityMode enum
 */
final class PriorityMode
{
    const LOW = 0;
    const HIGH = 1;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'LOW' => self::LOW,
            'HIGH' => self::HIGH,
        );
    }
}
}