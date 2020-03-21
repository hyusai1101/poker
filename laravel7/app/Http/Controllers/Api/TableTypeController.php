<?php

namespace App\Http\Controllers\Api;

use App\Libraries\ApiResponse;
use App\Models\TableType;
use Illuminate\Database\Eloquent\Model;
use RuntimeException;

class TableTypeController extends CommonController
{
    /**
     * @param TableType $tableType
     * @return array
     */
    public function index(TableType $tableType)
    {
        return ((new ApiResponse())
            ->addData($tableType->all())->format());
    }

    /**
     * @param $tableTypeId
     * @param TableType $tableType
     * @return array
     */
    public function show($tableTypeId, TableType $tableType)
    {
        $tableTypeModel = $this->_findTableTypeByTableId($tableTypeId, $tableType);
        return ((new ApiResponse())
            ->addData($tableTypeModel->toArray())->format());
    }

    /**
     * @param $tableTypeId
     * @param TableType $tableType
     * @return Model $tableTypeModel
     */
    private function _findTableTypeByTableId($tableTypeId, $tableType)
    {
        $tableTypeModel = $tableType->find($tableTypeId);
        if (empty($tableTypeModel)) {
            throw new RuntimeException('not fount tableType', 400);
        }
        return $tableTypeModel;
    }
}
