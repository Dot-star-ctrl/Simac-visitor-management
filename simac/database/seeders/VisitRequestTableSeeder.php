<?php

namespace Database\Seeders;

use App\VisitRequest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisitRequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VisitRequest::factory()->count(1)->create();
    }
}
