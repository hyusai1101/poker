<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * モデルの共通処理
 * Class CommonModel
 *
 * @mixin Builder
 * @mixin Collection
 * @package App\Models
 */
abstract class CommonModel extends Model
{
    /**
     * Get an attribute from the model.
     *
     * @param  string  $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        $key = Str::snake($key);
        return parent::getAttribute($key);
    }
    /**
     * Set a given attribute on the model.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    public function setAttribute($key, $value)
    {
        $key = Str::snake($key);
        // "EFBD9E" を "E3809C" に変換する
        if (is_string($value)) {
            $value = str_replace('～', '〜', $value);
        }
        return parent::setAttribute($key, $value);
    }

    public function toArray()
    {
        $baseArray = parent::toArray();
        $newArray = [];
        foreach ($baseArray as $key => $value) {
            $newArray[Str::camel($key)] = $value;
        }
        return $newArray;
    }
}
