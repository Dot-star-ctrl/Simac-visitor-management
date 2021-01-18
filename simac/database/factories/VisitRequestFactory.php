<?php

namespace Database\Factories;

use App\Models\VisitRequest;
use App\Models\Company;
use App\Models\Department;
use App\Models\Visitor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $VisitRequest = VisitRequest::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'note' => $this->faker->catchPhrase(),
            'proposed_start_dateTime' => $this->faker->dateTime(),
            'proposed_end_dateTime' => $this->faker->dateTime(),
            'visitor_id' => Visitor::factory(),
            'host_id' => NULL,
            'company_id' => Company::factory(),
            'department_id' => Department::factory(),
        ];
    }
}