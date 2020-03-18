<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'develop_user';
        $user->email = 'yusuke14121412@gmail.com';
        $user->password = Hash::make('secret');
        $user->save();
    }
}
