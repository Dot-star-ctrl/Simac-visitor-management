<?php

namespace Database\Factories;

use App\TestPerson;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestPersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TestPerson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->text(50),
            'last_name' => $this->faker->text(200),
            'email' => $this->faker->text(200)
        ];
    }
}
