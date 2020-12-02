<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_can_create_employee()
    {
        $formData = [
            'password' => '123',
            'first_name' => 'John',
            'last_name' => 'Test',
            'email' => 'example@example.com',
            'username' => 'johnUser',
        ];

        $this->post(route('employees.store'), $formData)
             ->assertStatus(302);
    }

    public function test_can_update_employee()
    {
        $this->withoutExceptionHandling();

        $employee = Employee::factory()->create();

        $updatedData = [
            'password' => '123',
            'first_name' => 'John',
            'last_name' => 'Test',
            'email' => 'example@example.com',
            'username' => 'johnUser',
        ];

        $this->put(route('employees.update', $employee), $updatedData)
             ->assertStatus(200);
    }

    public function test_can_show_employee()
    {
        $employee = Employee::factory()->create();

        $this->get(route('employees.show', $employee->id))->assertStatus(200);
    }

    public function test_can_delete_employee()
    {
        $employee = Employee::factory()->create();

        $this->delete(route('employees.destroy', $employee->id))->assertStatus(200);
    }

    public function test_can_list_employees()
    {
        $employee = Employee::factory()->count(3)->create();

        $this->get(route('employees.index'))
        ->assertStatus(200);
    }
}
