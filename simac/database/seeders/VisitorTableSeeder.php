<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VisitorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Visitor::factory()->count(1)->create();
    }
}

