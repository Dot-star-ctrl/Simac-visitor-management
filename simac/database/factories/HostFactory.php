<?php

namespace Database\Factories;

use App\Host;
use App\Office;
use Illuminate\Database\Eloquent\Factories\Factory;

class HostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Host::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'office_id' => Office::factory(),
        ];
    }
}


