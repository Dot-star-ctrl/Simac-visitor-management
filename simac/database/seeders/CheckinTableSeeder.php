<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CheckinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Checkin::factory()->count(60)->create();
    }
}