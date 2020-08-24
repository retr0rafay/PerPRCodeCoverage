<?php
/**
 * Auto generated from Salesforce.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers.Salesforce package
 */

namespace ProtocolBuffers\Salesforce {
/**
 * WriteRequest message
 */
class WriteRequest extends \ProtobufMessage
{
    /* Field index constants */
    const REQUESTUUID = 1;
    const OWNER = 2;
    const ACCOUNTID = 3;
    const OPERATION = 4;
    const NOTIFICATIONS = 5;
    const OBJECTS = 6;
    const APIVERSION = 7;
    const UPSERTKEYFIELDID = 8;
    const TIMESTAMP = 9;
    const RETRY_CONTEXT = 10;
    const SHARDID = 11;
    const PRIORITYMODE = 12;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::REQUESTUUID => array(
            'name' => 'requestUUID',
            'required' => false,
            'type' => 7,
        ),
        self::OWNER => array(
            'name' => 'owner',
            'required' => false,
            'type' => 7,
        ),
        self::ACCOUNTID => array(
            'name' => 'accountId',
            'required' => false,
            'type' => 5,
        ),
        self::OPERATION => array(
            'name' => 'operation',
            'required' => false,
            'type' => 5,
        ),
        self::NOTIFICATIONS => array(
            'default' => \ProtocolBuffers\Salesforce\WriteRequest\NotificationType::ERRORS_ONLY, 
            'name' => 'notifications',
            'required' => false,
            'type' => 5,
        ),
        self::OBJECTS => array(
            'name' => 'objects',
            'repeated' => true,
            'type' => '\ProtocolBuffers\Salesforce\SObject'
        ),
        self::APIVERSION => array(
            'name' => 'apiVersion',
            'required' => false,
            'type' => 7,
        ),
        self::UPSERTKEYFIELDID => array(
            'name' => 'upsertKeyFieldId',
            'required' => false,
            'type' => 7,
        ),
        self::TIMESTAMP => array(
            'name' => 'timestamp',
            'required' => false,
            'type' => 5,
        ),
        self::RETRY_CONTEXT => array(
            'name' => 'retry_context',
            'required' => false,
            'type' => '\ProtocolBuffers\Salesforce\RetryContext'
        ),
        self::SHARDID => array(
            'name' => 'shardId',
            'required' => false,
            'type' => 5,
        ),
        self::PRIORITYMODE => array(
            'default' => \ProtocolBuffers\Salesforce\PriorityMode::HIGH, 
            'name' => 'priorityMode',
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
        $this->values[self::OWNER] = null;
        $this->values[self::ACCOUNTID] = null;
        $this->values[self::OPERATION] = null;
        $this->values[self::NOTIFICATIONS] = \ProtocolBuffers\Salesforce\WriteRequest\NotificationType::ERRORS_ONLY;
        $this->values[self::OBJECTS] = array();
        $this->values[self::APIVERSION] = null;
        $this->values[self::UPSERTKEYFIELDID] = null;
        $this->values[self::TIMESTAMP] = null;
        $this->values[self::RETRY_CONTEXT] = null;
        $this->values[self::SHARDID] = null;
        $this->values[self::PRIORITYMODE] = \ProtocolBuffers\Salesforce\PriorityMode::HIGH;
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

    /**
     * Sets value of 'notifications' property
     *
     * @param NotificationType $value Property value
     *
     * @return null
     */
    public function setNotifications($value)
    {
        return $this->set(self::NOTIFICATIONS, $value);
    }

    /**
     * Returns value of 'notifications' property
     *
     * @return NotificationType
     */
    public function getNotifications()
    {
        return $this->get(self::NOTIFICATIONS);
    }

    /**
     * Appends value to 'objects' list
     *
     * @param \ProtocolBuffers\Salesforce\SObject $value Value to append
     *
     * @return null
     */
    public function appendObjects(\ProtocolBuffers\Salesforce\SObject $value)
    {
        return $this->append(self::OBJECTS, $value);
    }

    /**
     * Clears 'objects' list
     *
     * @return null
     */
    public function clearObjects()
    {
        return $this->clear(self::OBJECTS);
    }

    /**
     * Returns 'objects' list
     *
     * @return \ProtocolBuffers\Salesforce\SObject[]
     */
    public function getObjects()
    {
        return $this->get(self::OBJECTS);
    }

    /**
     * Returns 'objects' iterator
     *
     * @return ArrayIterator
     */
    public function getObjectsIterator()
    {
        return new \ArrayIterator($this->get(self::OBJECTS));
    }

    /**
     * Returns element from 'objects' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \ProtocolBuffers\Salesforce\SObject
     */
    public function getObjectsAt($offset)
    {
        return $this->get(self::OBJECTS, $offset);
    }

    /**
     * Returns count of 'objects' list
     *
     * @return int
     */
    public function getObjectsCount()
    {
        return $this->count(self::OBJECTS);
    }

    /**
     * Sets value of 'apiVersion' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setApiVersion($value)
    {
        return $this->set(self::APIVERSION, $value);
    }

    /**
     * Returns value of 'apiVersion' property
     *
     * @return string
     */
    public function getApiVersion()
    {
        return $this->get(self::APIVERSION);
    }

    /**
     * Sets value of 'upsertKeyFieldId' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setUpsertKeyFieldId($value)
    {
        return $this->set(self::UPSERTKEYFIELDID, $value);
    }

    /**
     * Returns value of 'upsertKeyFieldId' property
     *
     * @return string
     */
    public function getUpsertKeyFieldId()
    {
        return $this->get(self::UPSERTKEYFIELDID);
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
     * Sets value of 'retry_context' property
     *
     * @param \ProtocolBuffers\Salesforce\RetryContext $value Property value
     *
     * @return null
     */
    public function setRetryContext(\ProtocolBuffers\Salesforce\RetryContext $value)
    {
        return $this->set(self::RETRY_CONTEXT, $value);
    }

    /**
     * Returns value of 'retry_context' property
     *
     * @return \ProtocolBuffers\Salesforce\RetryContext
     */
    public function getRetryContext()
    {
        return $this->get(self::RETRY_CONTEXT);
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
}
}