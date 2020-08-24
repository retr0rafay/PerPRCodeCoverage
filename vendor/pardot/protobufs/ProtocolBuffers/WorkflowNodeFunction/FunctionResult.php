<?php
/**
 * Auto generated from WorkflowNodeFunction.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */
namespace ProtocolBuffers\WorkflowNodeFunction {
/**
 * FunctionResult enum embedded in WorkflowNodeFunction message
 */
final class FunctionResult
{
    const UNKNOWN = 0;
    const YES = 1;
    const NO = 2;
    const SUCCESS = 3;
    const FAIL = 4;
    const SKIP = 5;
    const RETRY = 6;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'UNKNOWN' => self::UNKNOWN,
            'YES' => self::YES,
            'NO' => self::NO,
            'SUCCESS' => self::SUCCESS,
            'FAIL' => self::FAIL,
            'SKIP' => self::SKIP,
            'RETRY' => self::RETRY,
        );
    }
}
}