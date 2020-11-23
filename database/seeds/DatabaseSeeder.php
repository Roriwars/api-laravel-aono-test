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
        $this->call(EquipeTableSeeder::class);
        $this->call(MatchTableSeeder::class);
        // $this->call(UserSeeder::class);
    }
}
