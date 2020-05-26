<?php

use Illuminate\Database\Seeder;
use App\Libraries\Setup;

class HandRangeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setup = new Setup();
        $setup->defaultSeeding(1);
    }
}
