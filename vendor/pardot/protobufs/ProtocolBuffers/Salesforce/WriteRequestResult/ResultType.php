<?php
/**
 * Auto generated from Salesforce.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers.Salesforce package
 */
namespace ProtocolBuffers\Salesforce\WriteRequestResult {
/**
 * ResultType enum embedded in WriteRequestResult message
 */
final class ResultType
{
    const FAILURE = 0;
    const SUCCESS = 1;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'FAILURE' => self::FAILURE,
            'SUCCESS' => self::SUCCESS,
        );
    }
}
}