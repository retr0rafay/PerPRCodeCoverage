<?php
/**
 * Auto generated from Salesforce.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers.Salesforce package
 */

namespace ProtocolBuffers\Salesforce {
/**
 * Change message
 */
class Change extends \ProtobufMessage
{
    /* Field index constants */
    const ACCOUNTID = 1;
    const ORGID = 2;
    const OBJECT = 3;
    const SOURCE = 4;
    const EVENTTYPE = 5;
    const SHARDID = 6;
    const TIMESTAMP = 7;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ACCOUNTID => array(
            'name' => 'accountId',
            'required' => false,
            'type' => 5,
        ),
        self::ORGID => array(
            'name' => 'orgId',
            'required' => false,
            'type' => 7,
        ),
        self::OBJECT => array(
            'name' => 'object',
            'required' => false,
            'type' => '\ProtocolBuffers\Salesforce\SObject'
        ),
        self::SOURCE => array(
            'name' => 'source',
            'required' => false,
            'type' => 7,
        ),
        self::EVENTTYPE => array(
            'name' => 'eventType',
            'required' => false,
            'type' => 5,
        ),
        self::SHARDID => array(
            'name' => 'shardId',
            'required' => false,
            'type' => 5,
        ),
        self::TIMESTAMP => array(
            'name' => 'timestamp',
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
        $this->values[self::ACCOUNTID] = null;
        $this->values[self::ORGID] = null;
        $this->values[self::OBJECT] = null;
        $this->values[self::SOURCE] = null;
        $this->values[self::EVENTTYPE] = null;
        $this->values[self::SHARDID] = null;
        $this->values[self::TIMESTAMP] = null;
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
     * Sets value of 'accountId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setAccountId($value)
    {
        return $this->set(self::ACCOUNTID, $value);
    }

    /**
     * Returns value of 'accountId' property
     *
     * @return int
     */
    public function getAccountId()
    {
        return $this->get(self::ACCOUNTID);
    }

    /**
     * Sets value of 'orgId' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setOrgId($value)
    {
        return $this->set(self::ORGID, $value);
    }

    /**
     * Returns value of 'orgId' property
     *
     * @return string
     */
    public function getOrgId()
    {
        return $this->get(self::ORGID);
    }

    /**
     * Sets value of 'object' property
     *
     * @param \ProtocolBuffers\Salesforce\SObject $value Property value
     *
     * @return null
     */
    public function setObject(\ProtocolBuffers\Salesforce\SObject $value)
    {
        return $this->set(self::OBJECT, $value);
    }

    /**
     * Returns value of 'object' property
     *
     * @return \ProtocolBuffers\Salesforce\SObject
     */
    public function getObject()
    {
        return $this->get(self::OBJECT);
    }

    /**
     * Sets value of 'source' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setSource($value)
    {
        return $this->set(self::SOURCE, $value);
    }

    /**
     * Returns value of 'source' property
     *
     * @return string
     */
    public function getSource()
    {
        return $this->get(self::SOURCE);
    }

    /**
     * Sets value of 'eventType' property
     *
     * @param EventType $value Property value
     *
     * @return null
     */
    public function setEventType($value)
    {
        return $this->set(self::EVENTTYPE, $value);
    }

    /**
     * Returns value of 'eventType' property
     *
     * @return EventType
     */
    public function getEventType()
    {
        return $this->get(self::EVENTTYPE);
    }

    /**
     * Sets value of 'shardId' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setShardId($value)
    {
        return $this->set(self::SHARDID, $value);
    }

    /**
     * Returns value of 'shardId' property
     *
     * @return int
     */
    public function getShardId()
    {
        return $this->get(self::SHARDID);
    }

    /**
     * Sets value of 'timestamp' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setTimestamp($value)
    {
        return $this->set(self::TIMESTAMP, $value);
    }

    /**
     * Returns value of 'timestamp' property
     *
     * @return int
     */
    public function getTimestamp()
    {
        return $this->get(self::TIMESTAMP);
    }
}
}