<?php
/**
 * Auto generated from BlueSteelMetric.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers package
 */

namespace ProtocolBuffers {
/**
 * BlueSteelMetric message
 */
class BlueSteelMetric extends \ProtobufMessage
{
    /* Field index constants */
    const ACCOUNT_ID = 1;
    const METRIC_TYPE = 2;
    const METRIC_DATA = 3;
    const UUID = 4;
    const DATE = 5;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ACCOUNT_ID => array(
            'name' => 'account_id',
            'required' => false,
            'type' => 5,
        ),
        self::METRIC_TYPE => array(
            'name' => 'metric_type',
            'required' => false,
            'type' => 7,
        ),
        self::METRIC_DATA => array(
            'name' => 'metric_data',
            'required' => false,
            'type' => 7,
        ),
        self::UUID => array(
            'name' => 'UUID',
            'required' => false,
            'type' => 7,
        ),
        self::DATE => array(
            'name' => 'date',
            'required' => false,
            'type' => 7,
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
        $this->values[self::METRIC_TYPE] = null;
        $this->values[self::METRIC_DATA] = null;
        $this->values[self::UUID] = null;
        $this->values[self::DATE] = null;
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
     * Sets value of 'metric_type' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setMetricType($value)
    {
        return $this->set(self::METRIC_TYPE, $value);
    }

    /**
     * Returns value of 'metric_type' property
     *
     * @return string
     */
    public function getMetricType()
    {
        return $this->get(self::METRIC_TYPE);
    }

    /**
     * Sets value of 'metric_data' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setMetricData($value)
    {
        return $this->set(self::METRIC_DATA, $value);
    }

    /**
     * Returns value of 'metric_data' property
     *
     * @return string
     */
    public function getMetricData()
    {
        return $this->get(self::METRIC_DATA);
    }

    /**
     * Sets value of 'UUID' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setUUID($value)
    {
        return $this->set(self::UUID, $value);
    }

    /**
     * Returns value of 'UUID' property
     *
     * @return string
     */
    public function getUUID()
    {
        return $this->get(self::UUID);
    }

    /**
     * Sets value of 'date' property
     *
     * @param string $value Property value
     *
     * @return null
     */
    public function setDate($value)
    {
        return $this->set(self::DATE, $value);
    }

    /**
     * Returns value of 'date' property
     *
     * @return string
     */
    public function getDate()
    {
        return $this->get(self::DATE);
    }
}
}