<?php

namespace Database\Factories;

use App\Checkin;
use App\Visitor;
use App\Building;
use Illuminate\Database\Eloquent\Factories\Factory;

class CheckinFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Checkin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'visitor_id' => Visitor::factory(),
            'dateTime' => $this->faker->date(),
            'building_id' => Building::factory()
        ];
    }
}


