<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OfficeApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_can_create_office()
    {
        $formData = [

        ];

        $this->post(route('offices.store'), $formData)
             ->assertStatus(302);
    }

    public function test_can_update_office()
    {
        $this->withoutExceptionHandling();

        $office = \App\Office::factory()->create();

        $updatedData = [

        ];

        $this->put(route('offices.update', $office), $updatedData)
             ->assertStatus(200);
    }

    public function test_can_show_office()
    {
        $office = \App\Office::factory()->create();

        $this->get(route('offices.show', $office->id))->assertStatus(200);
    }

    public function test_can_delete_office()
    {
        $office = \App\Office::factory()->create();

        $this->delete(route('offices.destroy', $office->id))->assertStatus(200);
    }

    public function test_can_list_offices()
    {
        $office = \App\Office::factory()->count(3)->create();

        $this->get(route('offices.index'))
        ->assertStatus(200);
    }
}
