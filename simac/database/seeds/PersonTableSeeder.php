<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Person::factory()->count(10)->create(); 
    }
}
