<?php

namespace Database\Factories;

use App\Models\Qrcode;
use App\Models\Visitor;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Factories\Factory;

class QrcodeFactory extends Factory
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
            'first_name'    => $this->faker->firstName(),
            'last_name'     => $this->faker->lastName(),
            'email'         => $this->faker->email(),
            'floor'         => $this->faker->randomNumber($nbDigits = 3),
            'office' => $this->faker->name(),
            'phone'  => $this->faker->randomNumber($nbDigits = 8)
        ];
    }
}
