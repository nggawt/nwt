<?php

use Illuminate\Database\Seeder;
use App\User;

class generate_users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::create([
            'first_name' => 'ngga', 
            'last_name' => 'WT', 
            'email' => 'ngga@gmail.com', 
            'password' => bcrypt("qweqwe"), 
            'is_admin' => 0
        ]);
        $users = App\User::create([
            'first_name' => 'נגה', 
            'last_name' => 'WTI', 
            'email' => 'buzzi@gmail.com', 
            'password' => bcrypt("qweqwe"), 
            'is_admin' => 0
        ]);
        $users = App\User::create([
            'first_name' => 'buzzi', 
            'last_name' => 'WTI', 
            'email' => 'ngga@example.com', 
            'password' => bcrypt("qweqwe"), 
            'is_admin' => 0
        ]);
        

    }
}
