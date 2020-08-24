<?php
/**
 * Auto generated from ModelEvent.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers\ModelEvent {
/**
 * Payload message embedded in ModelEvent message
 */
class Payload extends \ProtobufMessage
{
    /* Field index constants */
    const PAYLOAD_TYPE = 1;
    const ID = 2;
    const ACTION = 3;
    const CHANGES = 4;
    const AFTER_ROW = 5;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::PAYLOAD_TYPE => array(
            'name' => 'payload_type',
            'required' => false,
            'type' => 7,
        ),
        self::ID => array(
            'name' => 'id',
            'required' => false,
            'type' => 5,
        ),
        self::ACTION => array(
            'name' => 'action',
            'required' => false,
            'type' => 5,
        ),
        self::CHANGES => array(
            'name' => 'changes',
            'repeated' => true,
            'type' => '\ProtocolBuffers\ModelEvent\Payload\Change'
        ),
        self::AFTER_ROW => array(
            'name' => 'after_row',
            'repeated' => true,
            'type' => '\ProtocolBuffers\ModelEvent\Payload\ModelValue'
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
        $this->values[self::PAYLOAD_TYPE] = null;
        $this->values[self::ID] = null;
        $this->values[self::ACTION] = null;
        $this->values[self::CHANGES] = array();
        $this->values[self::AFTER_ROW] = array();
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
     * Sets value of 'payload_type' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setPayloadType($value)
    {
        return $this->set(self::PAYLOAD_TYPE, $value);
    }

    /**
     * Returns value of 'payload_type' property
     *
     * @return string
     */
    public function getPayloadType()
    {
        return $this->get(self::PAYLOAD_TYPE);
    }

    /**
     * Sets value of 'id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setId($value)
    {
        return $this->set(self::ID, $value);
    }

    /**
     * Returns value of 'id' property
     *
     * @return int
     */
    public function getId()
    {
        return $this->get(self::ID);
    }

    /**
     * Sets value of 'action' property
     *
     * @param PayloadAction $value Property value
     *
     * @return null
     */
    public function setAction($value)
    {
        return $this->set(self::ACTION, $value);
    }

    /**
     * Returns value of 'action' property
     *
     * @return PayloadAction
     */
    public function getAction()
    {
        return $this->get(self::ACTION);
    }

    /**
     * Appends value to 'changes' list
     *
     * @param \ProtocolBuffers\ModelEvent\Payload\Change $value Value to append
     *
     * @return null
     */
    public function appendChanges(\ProtocolBuffers\ModelEvent\Payload\Change $value)
    {
        return $this->append(self::CHANGES, $value);
    }

    /**
     * Clears 'changes' list
     *
     * @return null
     */
    public function clearChanges()
    {
        return $this->clear(self::CHANGES);
    }

    /**
     * Returns 'changes' list
     *
     * @return \ProtocolBuffers\ModelEvent\Payload\Change[]
     */
    public function getChanges()
    {
        return $this->get(self::CHANGES);
    }

    /**
     * Returns 'changes' iterator
     *
     * @return ArrayIterator
     */
    public function getChangesIterator()
    {
        return new \ArrayIterator($this->get(self::CHANGES));
    }

    /**
     * Returns element from 'changes' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \ProtocolBuffers\ModelEvent\Payload\Change
     */
    public function getChangesAt($offset)
    {
        return $this->get(self::CHANGES, $offset);
    }

    /**
     * Returns count of 'changes' list
     *
     * @return int
     */
    public function getChangesCount()
    {
        return $this->count(self::CHANGES);
    }

    /**
     * Appends value to 'after_row' list
     *
     * @param \ProtocolBuffers\ModelEvent\Payload\ModelValue $value Value to append
     *
     * @return null
     */
    public function appendAfterRow(\ProtocolBuffers\ModelEvent\Payload\ModelValue $value)
    {
        return $this->append(self::AFTER_ROW, $value);
    }

    /**
     * Clears 'after_row' list
     *
     * @return null
     */
    public function clearAfterRow()
    {
        return $this->clear(self::AFTER_ROW);
    }

    /**
     * Returns 'after_row' list
     *
     * @return \ProtocolBuffers\ModelEvent\Payload\ModelValue[]
     */
    public function getAfterRow()
    {
        return $this->get(self::AFTER_ROW);
    }

    /**
     * Returns 'after_row' iterator
     *
     * @return ArrayIterator
     */
    public function getAfterRowIterator()
    {
        return new \ArrayIterator($this->get(self::AFTER_ROW));
    }

    /**
     * Returns element from 'after_row' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \ProtocolBuffers\ModelEvent\Payload\ModelValue
     */
    public function getAfterRowAt($offset)
    {
        return $this->get(self::AFTER_ROW, $offset);
    }

    /**
     * Returns count of 'after_row' list
     *
     * @return int
     */
    public function getAfterRowCount()
    {
        return $this->count(self::AFTER_ROW);
    }
}
}