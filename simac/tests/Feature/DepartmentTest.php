<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DepartmentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_department()
    {
        $formData = [
            'company_id' => '1',
            'building_id' => '2',
            'department_name' => 'HR'
        ];

        $this->post(route('departments.store'), $formData)
            ->assertStatus(201);
    }

    public function test_can_update_department()
    {
        $department = \App\Department::factory()->create();

        $updatedData = [
            'company_id' => '1',
            'building_id' => '3',
            'department_name' => 'Administration'
        ];

        $this->put(route('departments.update', $department), $updatedData)
            ->assertStatus(200);
    }

    public function test_can_show_department()
    {
        $department = \App\Department::factory()->create();

        $this->get(route('departments.show', $department->id))->assertStatus(200);
    }

    public function test_can_delete_department()
    {
        $department = \App\Department::factory()->create();

        $this->delete(route('departments.destroy', $department->id))->assertStatus(200);
    }

    public function test_can_list_departments()
    {
        $department = \App\Department::factory()->count(3)->create();

        $this->get(route('departments.index'))
            ->assertStatus(200);
    }
}
