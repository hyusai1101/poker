<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Hash;
use App\Models\User;

class HandPresetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('hand_presets')->insert([
            [
                'id' => 1,
                'name' => 'テストプリセット',
            ],
            ]);
    }
}
