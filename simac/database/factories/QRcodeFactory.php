<?php

namespace Database\Factories;

use App\QRcode;
use App\Visitor;
use App\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class QRcodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QRcode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'schedule_id' => Schedule::factory(),
            'visitor_id' => Visitor::factory(),
            'code' => $this->faker->password(),
        ];
    }
}


