<?php

use Illuminate\Database\Seeder;
use App\Tag;
class genarete_pivot_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = Tag::create(['name' => 'phones']);
        $table = Tag::create(['name' => 'computers']);
        $table = Tag::create(['name' => 'tablets']);
        $table = Tag::create(['name' => 'tvs']);
    }
}
