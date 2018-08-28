<?php

use Illuminate\Database\Seeder;
use App\Page;
use App\User;

class genarete_pages_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = Page::create(['owner' => 'root','hierarchy' => 'main','page_name' => 'wellcome','user_id' => rand(1, count(User::all())),'page_id' => null,'title' => 'wellcome to my my site','body' => 'this is the body of my page']);
        $table = Page::create(['owner' => 'root','hierarchy' => 'main','page_name' => 'web','user_id' => rand(1, count(User::all())),'page_id' => null,'title' => 'wellcome to my my site','body' => 'this is the body of my page']);
        $table = Page::create(['owner' => 'root','hierarchy' => 'main','page_name' => 'admin','user_id' => rand(1, count(User::all())),'page_id' => null,'title' => 'wellcome to my my site','body' => 'this is the body of my page']);
        $table = Page::create(['owner' => 'root','hierarchy' => 'main','page_name' => 'portfolio','user_id' => rand(1, count(User::all())),'page_id' => null,'title' => 'wellcome to my my site','body' => 'this is the body of my page']);
        $table = Page::create(['owner' => 'root','hierarchy' => 'main','page_name' => 'article','user_id' => rand(1, count(User::all())),'page_id' => null,'title' => 'wellcome to my my site','body' => 'this is the body of my page']);
        $table = Page::create(['owner' => 'root','hierarchy' => 'main','page_name' => 'about','user_id' => rand(1, count(User::all())),'page_id' => null,'title' => 'wellcome to my my site','body' => 'this is the body of my page']);
        $table = Page::create(['owner' => 'root','hierarchy' => 'main','page_name' => 'contact','user_id' => rand(1, count(User::all())),'page_id' => null,'title' => 'wellcome to my my site','body' => 'this is the body of my page']);
        $table = Page::create(['owner' => 'admin','hierarchy' => 'slave','page_name' => 'users','user_id' => rand(1, count(User::all())),'page_id' => null,'title' => 'wellcome to my my site','body' => 'this is the body of my page']);

    }
}
