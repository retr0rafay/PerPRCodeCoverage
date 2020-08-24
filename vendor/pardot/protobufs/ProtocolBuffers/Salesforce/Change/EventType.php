<?php
/**
 * Auto generated from Salesforce.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers.Salesforce package
 */
namespace ProtocolBuffers\Salesforce\Change {
/**
 * EventType enum embedded in Change message
 */
final class EventType
{
    const INSERT = 0;
    const UPDATE = 1;
    const DELETE = 2;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'INSERT' => self::INSERT,
            'UPDATE' => self::UPDATE,
            'DELETE' => self::DELETE,
        );
    }
}
}