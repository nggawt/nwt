<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(generate_users::class);
        $this->call(generete_article_table::class);
        $this->call(genarete_pivot_table::class);
    }
}
