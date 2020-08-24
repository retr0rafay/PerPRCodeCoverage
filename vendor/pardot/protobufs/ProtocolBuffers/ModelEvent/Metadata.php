<?php
/**
 * Auto generated from ModelEvent.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers\ModelEvent {
/**
 * Metadata message embedded in ModelEvent message
 */
class Metadata extends \ProtobufMessage
{
    /* Field index constants */
    const SOURCE_HOST = 1;
    const CONTEXT = 2;
    const SHARD_ID = 3;
    const USER_ID = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::SOURCE_HOST => array(
            'name' => 'source_host',
            'required' => false,
            'type' => 7,
        ),
        self::CONTEXT => array(
            'name' => 'context',
            'required' => false,
            'type' => 7,
        ),
        self::SHARD_ID => array(
            'name' => 'shard_id',
            'required' => false,
            'type' => 5,
        ),
        self::USER_ID => array(
            'name' => 'user_id',
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
        $this->values[self::SOURCE_HOST] = null;
        $this->values[self::CONTEXT] = null;
        $this->values[self::SHARD_ID] = null;
        $this->values[self::USER_ID] = null;
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
     * Sets value of 'source_host' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setSourceHost($value)
    {
        return $this->set(self::SOURCE_HOST, $value);
    }

    /**
     * Returns value of 'source_host' property
     *
     * @return string
     */
    public function getSourceHost()
    {
        return $this->get(self::SOURCE_HOST);
    }

    /**
     * Sets value of 'context' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setContext($value)
    {
        return $this->set(self::CONTEXT, $value);
    }

    /**
     * Returns value of 'context' property
     *
     * @return string
     */
    public function getContext()
    {
        return $this->get(self::CONTEXT);
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
     * Sets value of 'user_id' property
     *
     * @param int $value Property value
     *
     * @return null
     */
    public function setUserId($value)
    {
        return $this->set(self::USER_ID, $value);
    }

    /**
     * Returns value of 'user_id' property
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->get(self::USER_ID);
    }
}
}