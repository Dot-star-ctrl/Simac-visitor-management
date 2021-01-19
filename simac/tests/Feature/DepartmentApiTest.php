<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DepartmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_department()
    {
        $dep = (array)\App\Models\Department::factory()->create();

        $this->post(route('departments.store'), $dep)
             ->assertStatus(302);
    }

    public function test_can_update_department()
    {
        $dep = \App\Models\Department::factory()->create();
        $id = $dep->id;

        $dep = (array)$dep;
        $updatedData = [
            'department_name' => 'test',
        ];

        $this->put(route('departments.update', $id), $updatedData)
             ->assertStatus(200);
    }

    public function test_can_show_department()
    {
        $dep = \App\Models\Department::factory()->create();
        $id = $dep->id;

        $dep = (array)$dep;
        $this->post(route('departments.store'), $dep);

        $this->get(route('departments.show', $id))->assertStatus(200);
    }

    public function test_can_delete_department()
    {
        $dep = \App\Models\Department::factory()->create();
        $id = $dep->id;

        $dep = (array)$dep;
        $this->post(route('departments.store'), $dep);

        $this->delete(route('departments.destroy', $id))->assertStatus(200);
    }

    public function test_can_list_departments()
    {
        $office = \App\Models\Department::factory()->count(3)->create();

        $this->get(route('departments.index'))
        ->assertStatus(200);
    }
}
