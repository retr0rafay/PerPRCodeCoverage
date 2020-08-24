<?php
/**
 * Auto generated from UpstreamReplicationAction.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers {
/**
 * Asset message
 */
class Asset extends \ProtobufMessage
{
    /* Field index constants */
    const ACCOUNT_ID = 1;
    const SHARD_ID = 2;
    const ASSET_ID = 3;
    const ASSET_TYPE = 4;
    const FIELD_VALUES = 5;

    /* @var array Field descriptors */
    protected static $fields = array(
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
        self::ASSET_ID => array(
            'name' => 'asset_id',
            'required' => false,
            'type' => 5,
        ),
        self::ASSET_TYPE => array(
            'name' => 'asset_type',
            'required' => false,
            'type' => 7,
        ),
        self::FIELD_VALUES => array(
            'name' => 'field_values',
            'repeated' => true,
            'type' => '\ProtocolBuffers\FieldValue'
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
        $this->values[self::ACCOUNT_ID] = null;
        $this->values[self::SHARD_ID] = null;
        $this->values[self::ASSET_ID] = null;
        $this->values[self::ASSET_TYPE] = null;
        $this->values[self::FIELD_VALUES] = array();
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
     * Sets value of 'asset_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setAssetId($value)
    {
        return $this->set(self::ASSET_ID, $value);
    }

    /**
     * Returns value of 'asset_id' property
     *
     * @return int
     */
    public function getAssetId()
    {
        return $this->get(self::ASSET_ID);
    }

    /**
     * Sets value of 'asset_type' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setAssetType($value)
    {
        return $this->set(self::ASSET_TYPE, $value);
    }

    /**
     * Returns value of 'asset_type' property
     *
     * @return string
     */
    public function getAssetType()
    {
        return $this->get(self::ASSET_TYPE);
    }

    /**
     * Appends value to 'field_values' list
     *
     * @param \ProtocolBuffers\FieldValue $value Value to append
     *
     * @return null
     */
    public function appendFieldValues(\ProtocolBuffers\FieldValue $value)
    {
        return $this->append(self::FIELD_VALUES, $value);
    }

    /**
     * Clears 'field_values' list
     *
     * @return null
     */
    public function clearFieldValues()
    {
        return $this->clear(self::FIELD_VALUES);
    }

    /**
     * Returns 'field_values' list
     *
     * @return \ProtocolBuffers\FieldValue[]
     */
    public function getFieldValues()
    {
        return $this->get(self::FIELD_VALUES);
    }

    /**
     * Returns 'field_values' iterator
     *
     * @return ArrayIterator
     */
    public function getFieldValuesIterator()
    {
        return new \ArrayIterator($this->get(self::FIELD_VALUES));
    }

    /**
     * Returns element from 'field_values' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \ProtocolBuffers\FieldValue
     */
    public function getFieldValuesAt($offset)
    {
        return $this->get(self::FIELD_VALUES, $offset);
    }

    /**
     * Returns count of 'field_values' list
     *
     * @return int
     */
    public function getFieldValuesCount()
    {
        return $this->count(self::FIELD_VALUES);
    }
}
}