<?php

namespace App\Libraries;

use Illuminate\Support\Str;
use RuntimeException;

class ApiResponse
{
    /** @var null|array $meta */
    private $meta = null;
    /** @var null|array $data */
    private $data = null;
    /** @var null|array $errors */
    private $errors = null;

    /**
     * @return array
     */
    public function format()
    {
        if (!isset($this->meta['returnCount']) && isset($this->data[0])) {
            $this->meta['returnCount'] = count($this->data);
        }
        $ret = ['meta' => $this->meta];
        if ($this->data !== null) {
            $ret['data'] = $this->data;
        }
        if ($this->errors) {
            $ret['errors'] = $this->errors;
        }
        return $ret;
    }

    /**
     * @param int $count
     * @return $this
     */
    public function appendTotalCount($count)
    {
        $this->meta['totalCount'] = (int)$count;
        return $this;
    }

    /**
     * @param int $count
     * @return $this
     */
    public function appendReturnCount($count)
    {
        $this->meta['returnCount'] = (int)$count;
        return $this;
    }

    /**
     * @param mixed $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = self::toCamelCase($data);
        return $this;
    }

    /**
     * @param mixed $eachData
     * @return $this
     */
    public function addData($eachData)
    {
        if (empty($this->data)) {
            $this->data = [];
        }
        $this->data[] = self::toCamelCase($eachData);
        return $this;
    }

    /**
     * @param string $message
     * @param null|int $code
     * @return $this
     */
    public function addError($message, $code = null)
    {
        if (empty($this->errors)) {
            $this->errors = [];
        }
        $error = ['message' => $message];
        if ($code) {
            $error['code'] = (int)$code;
        }
        $this->errors[] = $error;
        return $this;
    }

    /**
     * @return bool
     */
    public function existErrors()
    {
        return !empty($this->errors);
    }

    /**
     * @return array|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param array $inputArray
     * @return array
     */
    public static function toCamelCase($inputArray)
    {
        $outputArray = [];
        foreach ($inputArray as $key => $value) {
            $camel = Str::camel($key);
            if (isset($outputArray[$camel])) {
                throw new RuntimeException('data is duplicated on snake_case to camelCase function', 500008, 'server error');
            }
            $outputArray[$camel] = $value;
        }
        return $outputArray;
    }
}
