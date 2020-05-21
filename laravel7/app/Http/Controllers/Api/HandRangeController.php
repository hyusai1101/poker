<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateHandRangeRequest;
use App\Libraries\ApiResponse;
use App\Models\HandRange;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use RuntimeException;

class HandRangeController extends Controller
{
    /**
     * @param $positionId
     * @param HandRange $handRange
     * @return array
     */
    public function index($positionId, HandRange $handRange)
    {
        /**
         * fixme テーブルタイプとログインユーザーの処理が必要
         */
        $handRanges = $handRange->where([['user_id', 1], ['table_type_id', 1], ['position_id', $positionId]])->get()->toArray();
        $data = [];
        foreach ($handRanges as $handRange) {
            $data['"' . "{$handRange['firstHand']}" . '"'][] = $handRange;
        }
        return ((new ApiResponse())
            ->setData($data)->format());
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
