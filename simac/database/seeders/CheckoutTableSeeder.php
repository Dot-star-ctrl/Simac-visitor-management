<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CheckoutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Checkout::factory()->count(60)->create();
    }
}