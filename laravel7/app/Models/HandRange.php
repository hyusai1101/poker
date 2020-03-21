<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class HandRange
 * @package App\Models
 * @method OfUser (int $userId)
 *
 * @property integer $id
 * @property integer $userId
 * @property integer $tableTypeId
 * @property string $firstHand
 * @property string $secondHand
 * @property string $action
 * @property boolean $suited
 * @property Carbon $createdAt
 * @property Carbon $updatedAt
 */
class HandRange extends CommonModel
{

    protected $fillable = ['action'];

    protected $casts = [
        'suited' => 'boolean'
    ];
    /**
     * @param Builder $query
     * @param int $userId
     * @return Builder
     */
    public function scopeOfUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
