<?php

namespace SalesforceEng\Crumb\Cookie;

/**
 * Methods for the special handling of the recent history cookies
 *
 * transform() and translate() are special methods used in the
 * get/set process to transform the given values according to the needs
 * of the History cookie type
 */
class History extends \SalesforceEng\Crumb\Cookie
{
    /**
     * Set the value, transforming it if it's not a string
     *
     * @param mixed $value Value to set
     */
    public function setValue($value)
    {
        if (!is_string($value)) {
            $value = $this->transform($value);
        }
        $this->value = $value;
    }

    /**
     * Transform the data from current state into an encoded version
     *
     * @param mixed $value Data to encode
     * @return string Encoded version ready to put in a cookie
     */
    public function transform($value = null)
    {
        $value = ($value === null) ? $this->getValue() : $value;

        // If the value is a string, it's already encoded
        if (is_string($value)) {
            return $value;
        }

        // From now on, encode them as JSON
        $value = json_encode($value); // serialize($value)
        return urlencode(base64_encode($value));
    }

    /**
     * Translate from the value back to the original data format
     *
     * @param string $value Encoded string to reverse
     * @return mixed Data resulting from decoding
     */
    public function translate($value = null)
    {
        $value = ($value === null) ? $this->getValue() : $value;
        $value = urldecode($value);
        $result = json_decode(base64_decode($value), JSON_OBJECT_AS_ARRAY);

        return $result;
    }
}
