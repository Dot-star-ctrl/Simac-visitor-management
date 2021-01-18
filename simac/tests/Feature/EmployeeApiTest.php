<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_can_create_visitor()
    {
        $formData = [
            'first_name' => 'Johny',
            'last_name' => 'Test',
            'user_id' => 1,
            'email' => 'example@example.com',
            'company_id' => \App\Models\Company::factory()->create(),
            'department_id' => \App\Models\Department::factory()->create(),
        ];

        $this->post(route('visitors.store'), $formData)
             ->assertStatus(201);
    }
}
