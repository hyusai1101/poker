<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableTypePositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('table_type_position')->insert([
            [
                'table_type_id' => 1,
                'position_id' => 3,
            ],
            [
                'table_type_id' => 1,
                'position_id' => 6,
            ],
            [
                'table_type_id' => 1,
                'position_id' => 9,
            ],
            [
                'table_type_id' => 1,
                'position_id' => 10,
            ],
            [
                'table_type_id' => 1,
                'position_id' => 1,
            ],
            [
                'table_type_id' => 1,
                'position_id' => 2,
            ],
        ]);
    }
}
