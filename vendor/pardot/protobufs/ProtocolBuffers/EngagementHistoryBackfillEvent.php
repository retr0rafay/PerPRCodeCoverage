<?php
/**
 * Auto generated from EngagementHistoryBackfillEvent.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers {
/**
 * EngagementHistoryBackfillEvent message
 */
class EngagementHistoryBackfillEvent extends \ProtobufMessage
{
    /* Field index constants */
    const VISITOR_ACTIVITY_ID = 1;
    const VISITOR_ACTIVITY_TYPE = 2;
    const CREATED_AT = 3;
    const ACCOUNT_ID = 4;
    const SHARD_ID = 5;
    const PROSPECT_ID = 6;
    const OPPORTUNITY_ID = 7;
    const FORM_ID = 8;
    const FORM_HANDLER_ID = 9;
    const EMAIL_ID = 10;
    const TRACKER_ID = 11;
    const CUSTOM_URL_ID = 12;
    const LANDING_PAGE_ID = 17;
    const FILEX_ID = 18;
    const ASSET_FID = 13;
    const PROSPECT_FID = 14;
    const PROSPECT_IS_DELETED = 15;
    const WRITE_PRIORITY = 16;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::VISITOR_ACTIVITY_ID => array(
            'name' => 'visitor_activity_id',
            'required' => false,
            'type' => 5,
        ),
        self::VISITOR_ACTIVITY_TYPE => array(
            'name' => 'visitor_activity_type',
            'required' => false,
            'type' => 5,
        ),
        self::CREATED_AT => array(
            'name' => 'created_at',
            'required' => false,
            'type' => 5,
        ),
        self::ACCOUNT_ID => array(
            'name' => 'account_id',
            'required' => false,
            'type' => 5,
        ),
        self::SHARD_ID => array(
            'name' => 'shard_id',
            'required' => false,
            'type' => 5,
        ),
        self::PROSPECT_ID => array(
            'name' => 'prospect_id',
            'required' => false,
            'type' => 5,
        ),
        self::OPPORTUNITY_ID => array(
            'name' => 'opportunity_id',
            'required' => false,
            'type' => 5,
        ),
        self::FORM_ID => array(
            'name' => 'form_id',
            'required' => false,
            'type' => 5,
        ),
        self::FORM_HANDLER_ID => array(
            'name' => 'form_handler_id',
            'required' => false,
            'type' => 5,
        ),
        self::EMAIL_ID => array(
            'name' => 'email_id',
            'required' => false,
            'type' => 5,
        ),
        self::TRACKER_ID => array(
            'name' => 'tracker_id',
            'required' => false,
            'type' => 5,
        ),
        self::CUSTOM_URL_ID => array(
            'name' => 'custom_url_id',
            'required' => false,
            'type' => 5,
        ),
        self::LANDING_PAGE_ID => array(
            'name' => 'landing_page_id',
            'required' => false,
            'type' => 5,
        ),
        self::FILEX_ID => array(
            'name' => 'filex_id',
            'required' => false,
            'type' => 5,
        ),
        self::ASSET_FID => array(
            'name' => 'asset_fid',
            'required' => false,
            'type' => 7,
        ),
        self::PROSPECT_FID => array(
            'name' => 'prospect_fid',
            'required' => false,
            'type' => 7,
        ),
        self::PROSPECT_IS_DELETED => array(
            'name' => 'prospect_is_deleted',
            'required' => false,
            'type' => 8,
        ),
        self::WRITE_PRIORITY => array(
            'name' => 'write_priority',
            'required' => false,
            'type' => 5,
        ),
    );

    /**
     * Constructs new message container and clears its internal state
     *
     * @return null
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Clears message values and sets default ones
     *
     * @return null
     */
    public function reset()
    {
        $this->values[self::VISITOR_ACTIVITY_ID] = null;
        $this->values[self::VISITOR_ACTIVITY_TYPE] = null;
        $this->values[self::CREATED_AT] = null;
        $this->values[self::ACCOUNT_ID] = null;
        $this->values[self::SHARD_ID] = null;
        $this->values[self::PROSPECT_ID] = null;
        $this->values[self::OPPORTUNITY_ID] = null;
        $this->values[self::FORM_ID] = null;
        $this->values[self::FORM_HANDLER_ID] = null;
        $this->values[self::EMAIL_ID] = null;
        $this->values[self::TRACKER_ID] = null;
        $this->values[self::CUSTOM_URL_ID] = null;
        $this->values[self::LANDING_PAGE_ID] = null;
        $this->values[self::FILEX_ID] = null;
        $this->values[self::ASSET_FID] = null;
        $this->values[self::PROSPECT_FID] = null;
        $this->values[self::PROSPECT_IS_DELETED] = null;
        $this->values[self::WRITE_PRIORITY] = null;
    }

    /**
     * Returns field descriptors
     *
     * @return array
     */
    public function fields()
    {
        return self::$fields;
    }

    /**
     * Sets value of 'visitor_activity_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setVisitorActivityId($value)
    {
        return $this->set(self::VISITOR_ACTIVITY_ID, $value);
    }

    /**
     * Returns value of 'visitor_activity_id' property
     *
     * @return int
     */
    public function getVisitorActivityId()
    {
        return $this->get(self::VISITOR_ACTIVITY_ID);
    }

    /**
     * Sets value of 'visitor_activity_type' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setVisitorActivityType($value)
    {
        return $this->set(self::VISITOR_ACTIVITY_TYPE, $value);
    }

    /**
     * Returns value of 'visitor_activity_type' property
     *
     * @return int
     */
    public function getVisitorActivityType()
    {
        return $this->get(self::VISITOR_ACTIVITY_TYPE);
    }

    /**
     * Sets value of 'created_at' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setCreatedAt($value)
    {
        return $this->set(self::CREATED_AT, $value);
    }

    /**
     * Returns value of 'created_at' property
     *
     * @return int
     */
    public function getCreatedAt()
    {
        return $this->get(self::CREATED_AT);
    }

    /**
     * Sets value of 'account_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setAccountId($value)
    {
        return $this->set(self::ACCOUNT_ID, $value);
    }

    /**
     * Returns value of 'account_id' property
     *
     * @return int
     */
    public function getAccountId()
    {
        return $this->get(self::ACCOUNT_ID);
    }

    /**
     * Sets value of 'shard_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setShardId($value)
    {
        return $this->set(self::SHARD_ID, $value);
    }

    /**
     * Returns value of 'shard_id' property
     *
     * @return int
     */
    public function getShardId()
    {
        return $this->get(self::SHARD_ID);
    }

    /**
     * Sets value of 'prospect_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setProspectId($value)
    {
        return $this->set(self::PROSPECT_ID, $value);
    }

    /**
     * Returns value of 'prospect_id' property
     *
     * @return int
     */
    public function getProspectId()
    {
        return $this->get(self::PROSPECT_ID);
    }

    /**
     * Sets value of 'opportunity_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setOpportunityId($value)
    {
        return $this->set(self::OPPORTUNITY_ID, $value);
    }

    /**
     * Returns value of 'opportunity_id' property
     *
     * @return int
     */
    public function getOpportunityId()
    {
        return $this->get(self::OPPORTUNITY_ID);
    }

    /**
     * Sets value of 'form_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setFormId($value)
    {
        return $this->set(self::FORM_ID, $value);
    }

    /**
     * Returns value of 'form_id' property
     *
     * @return int
     */
    public function getFormId()
    {
        return $this->get(self::FORM_ID);
    }

    /**
     * Sets value of 'form_handler_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setFormHandlerId($value)
    {
        return $this->set(self::FORM_HANDLER_ID, $value);
    }

    /**
     * Returns value of 'form_handler_id' property
     *
     * @return int
     */
    public function getFormHandlerId()
    {
        return $this->get(self::FORM_HANDLER_ID);
    }

    /**
     * Sets value of 'email_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setEmailId($value)
    {
        return $this->set(self::EMAIL_ID, $value);
    }

    /**
     * Returns value of 'email_id' property
     *
     * @return int
     */
    public function getEmailId()
    {
        return $this->get(self::EMAIL_ID);
    }

    /**
     * Sets value of 'tracker_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setTrackerId($value)
    {
        return $this->set(self::TRACKER_ID, $value);
    }

    /**
     * Returns value of 'tracker_id' property
     *
     * @return int
     */
    public function getTrackerId()
    {
        return $this->get(self::TRACKER_ID);
    }

    /**
     * Sets value of 'custom_url_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setCustomUrlId($value)
    {
        return $this->set(self::CUSTOM_URL_ID, $value);
    }

    /**
     * Returns value of 'custom_url_id' property
     *
     * @return int
     */
    public function getCustomUrlId()
    {
        return $this->get(self::CUSTOM_URL_ID);
    }

    /**
     * Sets value of 'landing_page_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setLandingPageId($value)
    {
        return $this->set(self::LANDING_PAGE_ID, $value);
    }

    /**
     * Returns value of 'landing_page_id' property
     *
     * @return int
     */
    public function getLandingPageId()
    {
        return $this->get(self::LANDING_PAGE_ID);
    }

    /**
     * Sets value of 'filex_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setFilexId($value)
    {
        return $this->set(self::FILEX_ID, $value);
    }

    /**
     * Returns value of 'filex_id' property
     *
     * @return int
     */
    public function getFilexId()
    {
        return $this->get(self::FILEX_ID);
    }

    /**
     * Sets value of 'asset_fid' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setAssetFid($value)
    {
        return $this->set(self::ASSET_FID, $value);
    }

    /**
     * Returns value of 'asset_fid' property
     *
     * @return string
     */
    public function getAssetFid()
    {
        return $this->get(self::ASSET_FID);
    }

    /**
     * Sets value of 'prospect_fid' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setProspectFid($value)
    {
        return $this->set(self::PROSPECT_FID, $value);
    }

    /**
     * Returns value of 'prospect_fid' property
     *
     * @return string
     */
    public function getProspectFid()
    {
        return $this->get(self::PROSPECT_FID);
    }

    /**
     * Sets value of 'prospect_is_deleted' property
     *
     * @param bool $value Property value
     *
     * @return null
     */
    public function setProspectIsDeleted($value)
    {
        return $this->set(self::PROSPECT_IS_DELETED, $value);
    }

    /**
     * Returns value of 'prospect_is_deleted' property
     *
     * @return bool
     */
    public function getProspectIsDeleted()
    {
        return $this->get(self::PROSPECT_IS_DELETED);
    }

    /**
     * Sets value of 'write_priority' property
     *
     * @param WritePriority $value Property value
     *
     * @return null
     */
    public function setWritePriority($value)
    {
        return $this->set(self::WRITE_PRIORITY, $value);
    }

    /**
     * Returns value of 'write_priority' property
     *
     * @return WritePriority
     */
    public function getWritePriority()
    {
        return $this->get(self::WRITE_PRIORITY);
    }
}
}