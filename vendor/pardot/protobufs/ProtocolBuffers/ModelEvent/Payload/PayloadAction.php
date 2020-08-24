<?php
/**
 * Auto generated from ModelEvent.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */
namespace ProtocolBuffers\ModelEvent\Payload {
/**
 * PayloadAction enum embedded in Payload/ModelEvent message
 */
final class PayloadAction
{
    const CREATE = 0;
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
            'CREATE' => self::CREATE,
            'UPDATE' => self::UPDATE,
            'DELETE' => self::DELETE,
        );
    }
}
}