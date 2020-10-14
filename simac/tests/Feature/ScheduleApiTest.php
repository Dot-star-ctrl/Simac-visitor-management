<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ScheduleApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_can_create_schedule()
    {
        $formData = [
            'dateTime' => date('2020-01-14 02:11:55'),
            'host_message' => 'HAHAHAH',
        ];

        $this->post(route('schedules.store'), $formData)
             ->assertStatus(302);
    }

    public function test_can_update_schedule()
    {
        $this->withoutExceptionHandling();

        $schedule = \App\Schedule::factory()->create();

        $updatedData = [
            'dateTime' => date('2020-01-14 02:11:55'),
            'host_message' => 'HAHAHAH',
        ];

        $this->put(route('schedules.update', $schedule), $updatedData)
             ->assertStatus(200);
    }

    public function test_can_show_schedule()
    {
        $schedule = \App\Schedule::factory()->create();

        $this->get(route('schedules.show', $schedule->id))->assertStatus(200);
    }

    public function test_can_delete_schedule()
    {
        $schedule = \App\Schedule::factory()->create();

        $this->delete(route('schedules.destroy', $schedule->id))->assertStatus(200);
    }

    public function test_can_list_schedules()
    {
        $schedule = \App\Schedule::factory()->count(3)->create();

        $this->get(route('schedules.index'))
        ->assertStatus(200);
    }
}
