<?php
/**
 * Auto generated from Salesforce.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers.Salesforce package
 */
namespace ProtocolBuffers\Salesforce\SObject\Field {
/**
 * Type enum embedded in Field/SObject message
 */
final class Type
{
    const AUTO_NUMBER = 0;
    const CHECKBOX = 1;
    const CURRENCY = 2;
    const DATE = 3;
    const DATE_TIME = 4;
    const EMAIL = 5;
    const EXTERNAL_LOOKUP_RELATIONSHIP = 6;
    const FORMULA = 7;
    const GEO_LOCATION = 8;
    const HIERARCHICAL_RELATIONSHIP = 9;
    const INDIRECT_LOOKUP_RELATIONSHIP = 10;
    const LOOKUP_RELATIONSHIP = 11;
    const MASTER_DETAIL_RELATIONSHIP = 12;
    const NUMBER = 13;
    const PERCENT = 14;
    const PHONE = 15;
    const PICKLIST = 16;
    const PICKLIST_MULTI_SELECT = 17;
    const ROLL_UP_SUMMARY = 18;
    const TEXT = 19;
    const TEXT_ENCRYPTED = 20;
    const TEXT_AREA = 21;
    const TEXT_AREA_LONG = 22;
    const TEXT_AREA_RICH = 23;
    const URL = 24;

    /**
     * Returns defined enum values
     *
     * @return int[]
     */
    public function getEnumValues()
    {
        return array(
            'AUTO_NUMBER' => self::AUTO_NUMBER,
            'CHECKBOX' => self::CHECKBOX,
            'CURRENCY' => self::CURRENCY,
            'DATE' => self::DATE,
            'DATE_TIME' => self::DATE_TIME,
            'EMAIL' => self::EMAIL,
            'EXTERNAL_LOOKUP_RELATIONSHIP' => self::EXTERNAL_LOOKUP_RELATIONSHIP,
            'FORMULA' => self::FORMULA,
            'GEO_LOCATION' => self::GEO_LOCATION,
            'HIERARCHICAL_RELATIONSHIP' => self::HIERARCHICAL_RELATIONSHIP,
            'INDIRECT_LOOKUP_RELATIONSHIP' => self::INDIRECT_LOOKUP_RELATIONSHIP,
            'LOOKUP_RELATIONSHIP' => self::LOOKUP_RELATIONSHIP,
            'MASTER_DETAIL_RELATIONSHIP' => self::MASTER_DETAIL_RELATIONSHIP,
            'NUMBER' => self::NUMBER,
            'PERCENT' => self::PERCENT,
            'PHONE' => self::PHONE,
            'PICKLIST' => self::PICKLIST,
            'PICKLIST_MULTI_SELECT' => self::PICKLIST_MULTI_SELECT,
            'ROLL_UP_SUMMARY' => self::ROLL_UP_SUMMARY,
            'TEXT' => self::TEXT,
            'TEXT_ENCRYPTED' => self::TEXT_ENCRYPTED,
            'TEXT_AREA' => self::TEXT_AREA,
            'TEXT_AREA_LONG' => self::TEXT_AREA_LONG,
            'TEXT_AREA_RICH' => self::TEXT_AREA_RICH,
            'URL' => self::URL,
        );
    }
}
}