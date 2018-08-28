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
        $users = User::create([
            'first_name' => 'ngga', 
            'last_name' => 'WT', 
            'email' => 'ngga@gmail.com', 
            'password' => bcrypt("qweqwe"), 
            'permission' => 'admin'
        ]);
        $users = User::create([
            'first_name' => 'נגה', 
            'last_name' => 'WTI', 
            'email' => 'buzzi@gmail.com', 
            'password' => bcrypt("qweqwe"), 
            'permission' => 'custom'
        ]);
        $users = User::create([
            'first_name' => 'buzzi', 
            'last_name' => 'WTI', 
            'email' => 'ngga@example.com', 
            'password' => bcrypt("qweqwe"), 
            'permission' => 'root'
        ]);
        $users = User::create([
            'first_name' => 'dan',
            'last_name' => 'dani',
            'email' => 'dan@gmile.com',
            'password' => bcrypt("qweqwe"), 
            'permission' => 'author'
        ]);
        

    }
}
