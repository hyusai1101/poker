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
        $handRanges = $handRange->where([['user_id', 1], ['table_type_id', 1], ['hand_preset_id', 1]])->get()->toArray();


        // ハンドレンジを整形
        foreach ($handRanges as $key => $handRange) {
            $data = [];
            foreach ($handRange['handInfo'] as $handInfo) {
                $data['"' . "{$handInfo['firstHand']}" . '"'][] = $handInfo;
            }
            $handRanges[$key]['handInfo'] = $data;
        }

        return ((new ApiResponse())
            ->setData($handRanges)->format());
    }

    /**
     * @param UpdateHandRangeRequest $request
     * @param HandRange $handRange
     * @return array
     */
    public function update(UpdateHandRangeRequest $request, HandRange $handRange)
    {
        $putBody = $request->json()->all();

        //TODO プリセット機能が実装されたらhand_preset_idの箇所を改修
        $handRange = $handRange->where([
            ['user_id',Auth::id()],
            ['table_type_id',$putBody['table_type_id']],
            ['position_id',$putBody['position_id']],
            ['hand_preset_id',1]
        ])->first();
        try {
            $handRange->handInfo = $putBody['hand_info'];
            $handRange->save();
        } catch (Exception $exception) {
            throw new RuntimeException('server error', 500);
        }
        return ((new ApiResponse())
            ->addData($handRange->toArray())->format());
    }
}
