<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OfficeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Office::factory()->count(1)->create();
    }
}
