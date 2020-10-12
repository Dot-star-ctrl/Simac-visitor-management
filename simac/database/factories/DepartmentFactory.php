<?php

namespace Database\Factories;

use App\Department;
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
            'company_id' => $this->faker->numberBetween($min = 1, $max = 3),
            'building_id' => $this->faker->numberBetween($min = 1, $max = 3),
            'department_name' => $this->faker->companySuffix()
        ];
    }
}
