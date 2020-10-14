<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BuildingApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_can_create_building()
    {
        $formData = [
            'name' => 'Building 1',
            'address' => 'Street 1',
        ];

        $this->post(route('buildings.store'), $formData)
             ->assertStatus(302);
    }

    public function test_can_update_building()
    {
        $building = \App\Building::factory()->create();

        $updatedData = [
            'name' => 'Building 2',
            'address' => 'Street 2',
        ];

        $this->put(route('buildings.update', $building), $updatedData)
             ->assertStatus(200);
    }

    public function test_can_show_building()
    {
        $building = \App\Building::factory()->create();

        $this->get(route('buildings.show', $building->id))->assertStatus(200);
    }

    public function test_can_delete_building()
    {
        $building = \App\Building::factory()->create();

        $this->delete(route('buildings.destroy', $building->id))->assertStatus(200);
    }

    public function test_can_list_buildings()
    {
        $building = \App\Building::factory()->count(3)->create();

        $this->get(route('buildings.index'))
        ->assertStatus(200);
    }
}
