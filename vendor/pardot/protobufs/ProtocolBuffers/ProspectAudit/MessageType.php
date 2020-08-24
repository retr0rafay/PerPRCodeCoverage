<?php
/**
 * Auto generated from ProspectAudit.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */
namespace ProtocolBuffers\ProspectAudit {
/**
 * MessageType enum embedded in ProspectAudit message
 */
final class MessageType
{
    const UNKNOWN = 0;
    const STATE_TRANSITION_INITIATED = 1;
    const ACTION_PROCESSED = 2;
    const RULE_PROCESSED = 3;
    const STATE_TRANSITION_COMPLETE = 4;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'UNKNOWN' => self::UNKNOWN,
            'STATE_TRANSITION_INITIATED' => self::STATE_TRANSITION_INITIATED,
            'ACTION_PROCESSED' => self::ACTION_PROCESSED,
            'RULE_PROCESSED' => self::RULE_PROCESSED,
            'STATE_TRANSITION_COMPLETE' => self::STATE_TRANSITION_COMPLETE,
        );
    }
}
}