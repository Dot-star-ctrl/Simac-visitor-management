<?php

namespace Database\Factories;

use App\VisitRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VisitRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'visitor_id' => $this->faker->randomDigit,
            'company_id' => $this->faker->randomDigit,
            'department_id' => $this->faker->randomDigit,
            'dateTime' => $this->faker->dateTime
        ];
    }
}
