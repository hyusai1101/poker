<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateHandRangeRequest;
use App\Libraries\ApiResponse;
use App\Models\HandRange;
use Exception;
use RuntimeException;

class HandRangeController extends Controller
{
    /**
     * @param HandRange $handRange
     * @return array
     */
    public function index(HandRange $handRange)
    {
        /**
         * fixme テーブルタイプとログインユーザーの処理が必要
         */
        $handRanges = $handRange->where([['user_id', 1], ['table_type_id', 1]])->get()->toArray();
        return ((new ApiResponse())
            ->addData($handRanges)->format());
    }

    /**
     * @param UpdateHandRangeRequest $request
     * @param HandRange $handRange
     * @return array
     */
    public function update(UpdateHandRangeRequest $request, HandRange $handRange)
    {
        $putBody = $request->json()->all();

        $handRange = $handRange->find($putBody['id']);
        try {
            $handRange->fill($putBody)->save();
        } catch (Exception $exception) {
            throw new RuntimeException('server error', 500);
        }
        return ((new ApiResponse())
            ->addData($handRange->toArray())->format());
    }
}
