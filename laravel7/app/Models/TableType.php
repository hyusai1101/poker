<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class TableType
 * @package App\Models
 *
 * @mixin Builder
 * @mixin Collection
 * @property integer $id
 * @property string $name
 */
class TableType extends CommonModel
{
    protected $fillable = ['name'];

    protected $table = 'table_types';

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
