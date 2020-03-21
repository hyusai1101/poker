<?php

namespace App\Http\Controllers\Api;

use App\Libraries\ApiResponse;
use App\Models\Position;
use RuntimeException;

class PositionController extends CommonController
{
    /**
     * @param Position $position
     * @return array
     */
    public function index(Position $position)
    {
        return ((new ApiResponse())
            ->addData($position->all())->format());
    }

    /**
     * @param $positionId
     * @param Position $position
     * @return array
     */
    public function show($positionId, Position $position)
    {
        $positionModel = $this->_findTableTypeByTableId($positionId, $position);
        return ((new ApiResponse())
            ->addData($positionModel->toArray())->format());
    }

    /**
     * @param $positionId
     * @param Position $position
     * @return mixed
     */
    private function _findTableTypeByTableId($positionId, $position)
    {
        $positionModel = $position->find($positionId);
        if (empty($positionModel)) {
            throw new RuntimeException('not found position', 400);
        }
        return $positionModel;
    }
}
