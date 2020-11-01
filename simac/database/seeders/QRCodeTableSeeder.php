<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QRCodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\QrCode::factory()->count(1)->create();
    }
}
