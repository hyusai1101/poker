<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            [
                'name' => 'SB',
                'full_name' => 'スモールブラインド',
            ],
            [
                'name' => 'BB',
                'full_name' => 'ビックブラインド'
            ],
            [
                'name' => 'UTG',
                'full_name' => 'アンダーザガン'
            ],
            [
                'name' => 'EP1',
                'full_name' => 'アーリーポジション1'
            ],
            [
                'name' => 'EP2',
                'full_name' => 'アーリーポジション2'
            ],
            [
                'name' => 'MP1',
                'full_name' => 'ミドルポジション1'
            ],
            [
                'name' => 'MP2',
                'full_name' => 'ミドルポジション2'
            ],
            [
                'name' => 'HJ',
                'full_name' => 'ハイジャック'
            ],
            [
                'name' => 'CO',
                'full_name' => 'カットオフ'
            ],
            [
                'name' => 'BTN',
                'full_name' => 'ディーラーボタン'
            ],
        ]);
    }
}
