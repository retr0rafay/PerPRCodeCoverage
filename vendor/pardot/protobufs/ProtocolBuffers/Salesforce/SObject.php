<?php
/**
 * Auto generated from Salesforce.proto at 2018-07-24 20:08:15
 *
 * ProtocolBuffers.Salesforce package
 */

namespace ProtocolBuffers\Salesforce {
/**
 * SObject message
 */
class SObject extends \ProtobufMessage
{
    /* Field index constants */
    const ID = 1;
    const OBJECTTYPE = 2;
    const FIELDS = 3;
    const REQUESTCONTEXT = 4;

    /* @var array Field descriptors */
    protected static $fields = array(
        self::ID => array(
            'name' => 'id',
            'required' => false,
            'type' => 7,
        ),
        self::OBJECTTYPE => array(
            'name' => 'objectType',
            'required' => false,
            'type' => 7,
        ),
        self::FIELDS => array(
            'name' => 'fields',
            'repeated' => true,
            'type' => '\ProtocolBuffers\Salesforce\SObject\Field'
        ),
        self::REQUESTCONTEXT => array(
            'name' => 'requestContext',
            'repeated' => true,
            'type' => '\ProtocolBuffers\Salesforce\RequestContext'
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
        $this->values[self::ID] = null;
        $this->values[self::OBJECTTYPE] = null;
        $this->values[self::FIELDS] = array();
        $this->values[self::REQUESTCONTEXT] = array();
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
     * Sets value of 'id' property
     *
     * @param string $value Property value
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
     * @return string
     */
    public function getId()
    {
        return $this->get(self::ID);
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
     * Appends value to 'fields' list
     *
     * @param \ProtocolBuffers\Salesforce\SObject\Field $value Value to append
     *
     * @return null
     */
    public function appendFields(\ProtocolBuffers\Salesforce\SObject\Field $value)
    {
        return $this->append(self::FIELDS, $value);
    }

    /**
     * Clears 'fields' list
     *
     * @return null
     */
    public function clearFields()
    {
        return $this->clear(self::FIELDS);
    }

    /**
     * Returns 'fields' list
     *
     * @return \ProtocolBuffers\Salesforce\SObject\Field[]
     */
    public function getFields()
    {
        return $this->get(self::FIELDS);
    }

    /**
     * Returns 'fields' iterator
     *
     * @return ArrayIterator
     */
    public function getFieldsIterator()
    {
        return new \ArrayIterator($this->get(self::FIELDS));
    }

    /**
     * Returns element from 'fields' list at given offset
     *
     * @param int $offset Position in list
     *
     * @return \ProtocolBuffers\Salesforce\SObject\Field
     */
    public function getFieldsAt($offset)
    {
        return $this->get(self::FIELDS, $offset);
    }

    /**
     * Returns count of 'fields' list
     *
     * @return int
     */
    public function getFieldsCount()
    {
        return $this->count(self::FIELDS);
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
}
}