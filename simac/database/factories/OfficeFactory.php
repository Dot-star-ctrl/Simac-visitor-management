<?php

namespace Database\Factories;

use App\Models\Office;
use App\Models\Company;
use App\Models\Building;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfficeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Office::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => Company::factory(),
            'building_id' => Building::factory()
        ];
    }
}


