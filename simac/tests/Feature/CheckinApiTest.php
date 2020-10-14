<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckinApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;
     
    public function test_can_create_checkin()
    {
        $formData = [
            'date' => '123.123.123',
        ];

        $this->post(route('checkin.store'), $formData)
             ->assertStatus(302);
    }

    public function test_can_update_checkin()
    {
        $checkin = \App\Checkin::factory()->create();

        $updatedData = [
            'date' => '12',
        ];

        $this->put(route('checkin.update', $checkin), $updatedData)
             ->assertStatus(200);
    }

    public function test_can_show_checkin()
    {
        $checkin = \App\Checkin::factory()->create();

        $this->get(route('checkin.show', $checkin->id))->assertStatus(200);
    }

    public function test_can_delete_checkin()
    {
        $checkin = \App\Checkin::factory()->create();

        $this->delete(route('checkin.destroy', $checkin->id))->assertStatus(200);
    }

    public function test_can_list_checkin()
    {
        $checkin = \App\Checkin::factory()->count(3)->create();

        $this->get(route('checkin.index'))
        ->assertStatus(200);
    }
}
