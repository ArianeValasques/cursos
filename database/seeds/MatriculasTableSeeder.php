<?php

use Illuminate\Database\Seeder;

class MatriculasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Matricula::class, 30)->create();
    }
}
