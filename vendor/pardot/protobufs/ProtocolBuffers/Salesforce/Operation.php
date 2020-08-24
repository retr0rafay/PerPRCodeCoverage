<?php
/**
 * Auto generated from Salesforce.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers.Salesforce package
 */
namespace ProtocolBuffers\Salesforce {
/**
 * Operation enum
 */
final class Operation
{
    const INSERT = 0;
    const UPSERT = 1;
    const DELETE = 2;
    const UNDELETE = 3;
    const DELETE_BY_EXAMPLE = 4;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'INSERT' => self::INSERT,
            'UPSERT' => self::UPSERT,
            'DELETE' => self::DELETE,
            'UNDELETE' => self::UNDELETE,
            'DELETE_BY_EXAMPLE' => self::DELETE_BY_EXAMPLE,
        );
    }
}
}