<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserTableSeeder::class);
         $this->call(HandPresetTableSeeder::class);
         $this->call(TableTypeTableSeeder::class);
         $this->call(PositionTableSeeder::class);
         $this->call(TableTypePositionTableSeeder::class);
         $this->call(HandRangeTableSeeder::class);
    }
}
