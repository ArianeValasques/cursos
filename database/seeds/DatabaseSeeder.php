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
        $this->call(AlunosTableSeeder::class);
        $this->call(CursosTableSeeder::class);
        $this->call(MatriculasTableSeeder::class);
    }
}
