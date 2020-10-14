<?php

namespace Database\Factories;

use App\Department;
use App\Company;
use App\Building;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Department::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => Company::factory(),
            'building_id' => Building::factory(),
            'department_name' => $this->faker->name(),
        ];
    }
}
