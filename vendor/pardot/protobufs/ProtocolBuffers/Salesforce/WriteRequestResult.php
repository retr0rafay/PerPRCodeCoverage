<?php
/**
 * Auto generated from Salesforce.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers.Salesforce package
 */

namespace ProtocolBuffers\Salesforce {
/**
 * WriteRequestResult message
 */
class WriteRequestResult extends \ProtobufMessage
{
    /* Field index constants */
    const REQUESTUUID = 1;
    const REQUESTCONTEXT = 2;
    const OWNER = 3;
    const RESULT = 4;
    const CODE = 5;
    const MESSAGE = 6;
    const TIMESTAMP = 7;
    const ACCOUNTID = 8;
    const ORGID = 9;
    const OBJECTID = 10;
    const OBJECTTYPE = 11;
    const ATTEMPTS = 13;
    const SHARDID = 14;
    const PRIORITYMODE = 15;
    const OPERATION = 16;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::REQUESTUUID => array(
            'name' => 'requestUUID',
            'required' => false,
            'type' => 7,
        ),
        self::REQUESTCONTEXT => array(
            'name' => 'requestContext',
            'repeated' => true,
            'type' => '\ProtocolBuffers\Salesforce\RequestContext'
        ),
        self::OWNER => array(
            'name' => 'owner',
            'required' => false,
            'type' => 7,
        ),
        self::RESULT => array(
            'name' => 'result',
            'required' => false,
            'type' => 5,
        ),
        self::CODE => array(
            'name' => 'code',
            'required' => false,
            'type' => 5,
        ),
        self::MESSAGE => array(
            'name' => 'message',
            'required' => false,
            'type' => 7,
        ),
        self::TIMESTAMP => array(
            'name' => 'timestamp',
            'required' => false,
            'type' => 5,
        ),
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
        self::OBJECTID => array(
            'name' => 'objectId',
            'required' => false,
            'type' => 7,
        ),
        self::OBJECTTYPE => array(
            'name' => 'objectType',
            'required' => false,
            'type' => 7,
        ),
        self::ATTEMPTS => array(
            'name' => 'attempts',
            'repeated' => true,
            'type' => '\ProtocolBuffers\Salesforce\WriteRequestAttempt'
        ),
        self::SHARDID => array(
            'name' => 'shardId',
            'required' => false,
            'type' => 5,
        ),
        self::PRIORITYMODE => array(
            'name' => 'priorityMode',
            'required' => false,
            'type' => 5,
        ),
        self::OPERATION => array(
            'name' => 'operation',
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
        $this->values[self::REQUESTUUID] = null;
        $this->values[self::REQUESTCONTEXT] = array();
        $this->values[self::OWNER] = null;
        $this->values[self::RESULT] = null;
        $this->values[self::CODE] = null;
        $this->values[self::MESSAGE] = null;
        $this->values[self::TIMESTAMP] = null;
        $this->values[self::ACCOUNTID] = null;
        $this->values[self::ORGID] = null;
        $this->values[self::OBJECTID] = null;
        $this->values[self::OBJECTTYPE] = null;
        $this->values[self::ATTEMPTS] = array();
        $this->values[self::SHARDID] = null;
        $this->values[self::PRIORITYMODE] = null;
        $this->values[self::OPERATION] = null;
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
     * Sets value of 'requestUUID' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setRequestUUID($value)
    {
        return $this->set(self::REQUESTUUID, $value);
    }

    /**
     * Returns value of 'requestUUID' property
     *
     * @return string
     */
    public function getRequestUUID()
    {
        return $this->get(self::REQUESTUUID);
    }

    /**
     * Appends value to 'requestContext' list
     *
     * @param \ProtocolBuffers\Salesforce\RequestContext $value Value to append
     *
     * @return null
     */
    public function appendRequestContext(\ProtocolBuffers\Salesforce\RequestContext $value)
    {
        return $this->append(self::REQUESTCONTEXT, $value);
    }

    /**
     * Clears 'requestContext' list
     *
     * @return null
     */
    public function clearRequestContext()
    {
        return $this->clear(self::REQUESTCONTEXT);
    }

    /**
     * Returns 'requestContext' list
     *
     * @return \ProtocolBuffers\Salesforce\RequestContext[]
     */
    public function getRequestContext()
    {
        return $this->get(self::REQUESTCONTEXT);
    }

    /**
     * Returns 'requestContext' iterator
     *
     * @return ArrayIterator
     */
    public function getRequestContextIterator()
    {
        return new \ArrayIterator($this->get(self::REQUESTCONTEXT));
    }

    /**
     * Returns element from 'requestContext' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \ProtocolBuffers\Salesforce\RequestContext
     */
    public function getRequestContextAt($offset)
    {
        return $this->get(self::REQUESTCONTEXT, $offset);
    }

    /**
     * Returns count of 'requestContext' list
     *
     * @return int
     */
    public function getRequestContextCount()
    {
        return $this->count(self::REQUESTCONTEXT);
    }

    /**
     * Sets value of 'owner' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setOwner($value)
    {
        return $this->set(self::OWNER, $value);
    }

    /**
     * Returns value of 'owner' property
     *
     * @return string
     */
    public function getOwner()
    {
        return $this->get(self::OWNER);
    }

    /**
     * Sets value of 'result' property
     *
     * @param ResultType $value Property value
     *
     * @return null
     */
    public function setResult($value)
    {
        return $this->set(self::RESULT, $value);
    }

    /**
     * Returns value of 'result' property
     *
     * @return ResultType
     */
    public function getResult()
    {
        return $this->get(self::RESULT);
    }

    /**
     * Sets value of 'code' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setCode($value)
    {
        return $this->set(self::CODE, $value);
    }

    /**
     * Returns value of 'code' property
     *
     * @return int
     */
    public function getCode()
    {
        return $this->get(self::CODE);
    }

    /**
     * Sets value of 'message' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setMessage($value)
    {
        return $this->set(self::MESSAGE, $value);
    }

    /**
     * Returns value of 'message' property
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->get(self::MESSAGE);
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
     * Sets value of 'objectId' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setObjectId($value)
    {
        return $this->set(self::OBJECTID, $value);
    }

    /**
     * Returns value of 'objectId' property
     *
     * @return string
     */
    public function getObjectId()
    {
        return $this->get(self::OBJECTID);
    }

    /**
     * Sets value of 'objectType' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setObjectType($value)
    {
        return $this->set(self::OBJECTTYPE, $value);
    }

    /**
     * Returns value of 'objectType' property
     *
     * @return string
     */
    public function getObjectType()
    {
        return $this->get(self::OBJECTTYPE);
    }

    /**
     * Appends value to 'attempts' list
     *
     * @param \ProtocolBuffers\Salesforce\WriteRequestAttempt $value Value to append
     *
     * @return null
     */
    public function appendAttempts(\ProtocolBuffers\Salesforce\WriteRequestAttempt $value)
    {
        return $this->append(self::ATTEMPTS, $value);
    }

    /**
     * Clears 'attempts' list
     *
     * @return null
     */
    public function clearAttempts()
    {
        return $this->clear(self::ATTEMPTS);
    }

    /**
     * Returns 'attempts' list
     *
     * @return \ProtocolBuffers\Salesforce\WriteRequestAttempt[]
     */
    public function getAttempts()
    {
        return $this->get(self::ATTEMPTS);
    }

    /**
     * Returns 'attempts' iterator
     *
     * @return ArrayIterator
     */
    public function getAttemptsIterator()
    {
        return new \ArrayIterator($this->get(self::ATTEMPTS));
    }

    /**
     * Returns element from 'attempts' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \ProtocolBuffers\Salesforce\WriteRequestAttempt
     */
    public function getAttemptsAt($offset)
    {
        return $this->get(self::ATTEMPTS, $offset);
    }

    /**
     * Returns count of 'attempts' list
     *
     * @return int
     */
    public function getAttemptsCount()
    {
        return $this->count(self::ATTEMPTS);
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
     * Sets value of 'priorityMode' property
     *
     * @param PriorityMode $value Property value
     *
     * @return null
     */
    public function setPriorityMode($value)
    {
        return $this->set(self::PRIORITYMODE, $value);
    }

    /**
     * Returns value of 'priorityMode' property
     *
     * @return PriorityMode
     */
    public function getPriorityMode()
    {
        return $this->get(self::PRIORITYMODE);
    }

    /**
     * Sets value of 'operation' property
     *
     * @param Operation $value Property value
     *
     * @return null
     */
    public function setOperation($value)
    {
        return $this->set(self::OPERATION, $value);
    }

    /**
     * Returns value of 'operation' property
     *
     * @return Operation
     */
    public function getOperation()
    {
        return $this->get(self::OPERATION);
    }
}
}