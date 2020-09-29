<?php

use Illuminate\Database\Seeder;
use App\Visitor;

class VisitorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Visitor::factory()->count(10)->create(); 
    }
}
