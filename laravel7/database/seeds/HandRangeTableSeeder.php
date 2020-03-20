<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HandRangeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hand_ranges')->insert([
                'user_id' => 1,
                'table_type_id' => 1,
                'first_hand' => 'A',
                'second_hand' => 'A',
                'action' => 'fold',
                'suited' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
