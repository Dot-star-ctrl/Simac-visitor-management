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
        factory(Visitor::class, 10)->create();
    }
}

