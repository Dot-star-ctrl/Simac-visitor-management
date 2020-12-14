<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VisitorTableSeeder::class);
        $this->call(VisitRequestTableSeeder::class);
        $this->call(AccountTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(HostTableSeeder::class);
        $this->call(OfficeTableSeeder::class);
        $this->call(QrcodeTableSeeder::class);
        $this->call(ScheduleTableSeeder::class);
    }
}
