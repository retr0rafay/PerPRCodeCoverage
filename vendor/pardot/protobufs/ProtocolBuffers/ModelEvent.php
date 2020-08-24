<?php
/**
 * Auto generated from ModelEvent.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers {
/**
 * ModelEvent message
 */
class ModelEvent extends \ProtobufMessage
{
    /* Field index constants */
    const UUID = 1;
    const TIMESTAMP = 2;
    const ACCOUNT_ID = 3;
    const EVENT_TYPES = 6;
    const PAYLOADS = 7;
    const PROSPECT_ID = 8;
    const METADATA = 10;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::UUID => array(
            'name' => 'uuid',
            'required' => false,
            'type' => 7,
        ),
        self::TIMESTAMP => array(
            'name' => 'timestamp',
            'required' => false,
            'type' => 4,
        ),
        self::ACCOUNT_ID => array(
            'name' => 'account_id',
            'required' => false,
            'type' => 5,
        ),
        self::EVENT_TYPES => array(
            'name' => 'event_types',
            'repeated' => true,
            'type' => 7,
        ),
        self::PAYLOADS => array(
            'name' => 'payloads',
            'repeated' => true,
            'type' => '\ProtocolBuffers\ModelEvent\Payload'
        ),
        self::PROSPECT_ID => array(
            'name' => 'prospect_id',
            'required' => false,
            'type' => 5,
        ),
        self::METADATA => array(
            'name' => 'metadata',
            'required' => false,
            'type' => '\ProtocolBuffers\ModelEvent\Metadata'
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
        $this->values[self::UUID] = null;
        $this->values[self::TIMESTAMP] = null;
        $this->values[self::ACCOUNT_ID] = null;
        $this->values[self::EVENT_TYPES] = array();
        $this->values[self::PAYLOADS] = array();
        $this->values[self::PROSPECT_ID] = null;
        $this->values[self::METADATA] = null;
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
     * Sets value of 'uuid' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setUuid($value)
    {
        return $this->set(self::UUID, $value);
    }

    /**
     * Returns value of 'uuid' property
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->get(self::UUID);
    }

    /**
     * Sets value of 'timestamp' property
     *
     * @param float $value Property value
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
     * @return float
     */
    public function getTimestamp()
    {
        return $this->get(self::TIMESTAMP);
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
     * Appends value to 'event_types' list
     *
     * @param string $value Value to append
     *
     * @return null
     */
    public function appendEventTypes($value)
    {
        return $this->append(self::EVENT_TYPES, $value);
    }

    /**
     * Clears 'event_types' list
     *
     * @return null
     */
    public function clearEventTypes()
    {
        return $this->clear(self::EVENT_TYPES);
    }

    /**
     * Returns 'event_types' list
     *
     * @return string[]
     */
    public function getEventTypes()
    {
        return $this->get(self::EVENT_TYPES);
    }

    /**
     * Returns 'event_types' iterator
     *
     * @return ArrayIterator
     */
    public function getEventTypesIterator()
    {
        return new \ArrayIterator($this->get(self::EVENT_TYPES));
    }

    /**
     * Returns element from 'event_types' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return string
     */
    public function getEventTypesAt($offset)
    {
        return $this->get(self::EVENT_TYPES, $offset);
    }

    /**
     * Returns count of 'event_types' list
     *
     * @return int
     */
    public function getEventTypesCount()
    {
        return $this->count(self::EVENT_TYPES);
    }

    /**
     * Appends value to 'payloads' list
     *
     * @param \ProtocolBuffers\ModelEvent\Payload $value Value to append
     *
     * @return null
     */
    public function appendPayloads(\ProtocolBuffers\ModelEvent\Payload $value)
    {
        return $this->append(self::PAYLOADS, $value);
    }

    /**
     * Clears 'payloads' list
     *
     * @return null
     */
    public function clearPayloads()
    {
        return $this->clear(self::PAYLOADS);
    }

    /**
     * Returns 'payloads' list
     *
     * @return \ProtocolBuffers\ModelEvent\Payload[]
     */
    public function getPayloads()
    {
        return $this->get(self::PAYLOADS);
    }

    /**
     * Returns 'payloads' iterator
     *
     * @return ArrayIterator
     */
    public function getPayloadsIterator()
    {
        return new \ArrayIterator($this->get(self::PAYLOADS));
    }

    /**
     * Returns element from 'payloads' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \ProtocolBuffers\ModelEvent\Payload
     */
    public function getPayloadsAt($offset)
    {
        return $this->get(self::PAYLOADS, $offset);
    }

    /**
     * Returns count of 'payloads' list
     *
     * @return int
     */
    public function getPayloadsCount()
    {
        return $this->count(self::PAYLOADS);
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
     * Sets value of 'metadata' property
     *
     * @param \ProtocolBuffers\ModelEvent\Metadata $value Property value
     *
     * @return null
     */
    public function setMetadata(\ProtocolBuffers\ModelEvent\Metadata $value)
    {
        return $this->set(self::METADATA, $value);
    }

    /**
     * Returns value of 'metadata' property
     *
     * @return \ProtocolBuffers\ModelEvent\Metadata
     */
    public function getMetadata()
    {
        return $this->get(self::METADATA);
    }
}
}