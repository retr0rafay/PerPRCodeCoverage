<?php
/**
 * Auto generated from WorkflowTrigger.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */
namespace ProtocolBuffers\WorkflowTrigger {
/**
 * TriggerType enum embedded in WorkflowTrigger message
 */
final class TriggerType
{
    const UNKNOWN = 0;
    const TIME = 1;
    const ACTION = 2;
    const START = 3;
    const PROSPECT_MERGE = 4;
    const FEEDER = 5;
    const ACTION_ADD_TO_PROGRAM = 6;
    const ACTION_FEEDBACK = 7;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'UNKNOWN' => self::UNKNOWN,
            'TIME' => self::TIME,
            'ACTION' => self::ACTION,
            'START' => self::START,
            'PROSPECT_MERGE' => self::PROSPECT_MERGE,
            'FEEDER' => self::FEEDER,
            'ACTION_ADD_TO_PROGRAM' => self::ACTION_ADD_TO_PROGRAM,
            'ACTION_FEEDBACK' => self::ACTION_FEEDBACK,
        );
    }
}
}