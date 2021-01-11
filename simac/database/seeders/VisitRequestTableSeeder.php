<?php

namespace Database\Seeders;

use App\Models\VisitRequest;
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
        $companies = DB::table('companies')->select('id')->get();

        for ($j = 0; $j < 2; $j++) {
            for ($i = 0; $i < 15; $i++) {
                VisitRequest::factory()->count(1)->create([
                    'company_id' => $companies[$i]->id,
                ]);
            }
        }
    }
}
