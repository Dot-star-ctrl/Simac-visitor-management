<?php

namespace Database\Factories;

use App\Models\Checkout;
use App\Models\Visitor;
use App\Models\Building;
use Illuminate\Database\Eloquent\Factories\Factory;

class CheckoutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Checkout::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'visitor_id' => Visitor::factory(),
            'dateTime' => $this->faker->dateTimeBetween('-12 months', '+1 week'),
            'building_id' => Building::factory()
        ];
    }
}

