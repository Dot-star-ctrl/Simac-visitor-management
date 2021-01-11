<?php

namespace Database\Factories;

use App\Models\Schedule;
use App\Models\Host;
use App\Models\Company;
use App\Models\Department;
use App\Models\Office;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Schedule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => Company::factory(),
            'department_id' => Department::factory(),
            'office_id' => Office::factory(),
            'host_id' => Host::factory(),
            'dateTime' => $this->faker->date(),
            'host_message' => $this->faker->name()
        ];
    }
}


