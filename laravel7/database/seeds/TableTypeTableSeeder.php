<?php

use Illuminate\Database\Seeder;
use App\Models\TableType;

class TableTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableType = new TableType();
        $tableType->name = '6max';
        $tableType->save();
    }
}
