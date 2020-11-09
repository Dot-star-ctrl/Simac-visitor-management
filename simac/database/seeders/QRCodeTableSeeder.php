<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QrcodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Qrcode::factory()->count(1)->create();
    }
}
