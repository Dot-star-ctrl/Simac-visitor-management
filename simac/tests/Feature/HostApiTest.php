<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HostApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_can_create_host()
    {
        $formData = [
            'first_name' => 'John',
            'last_name' => 'Test',
            'email' => 'email@example.com',
        ];

        $this->post(route('hosts.store'), $formData)
             ->assertStatus(302);
    }

    public function test_can_update_host()
    {
        $this->withoutExceptionHandling();

        $host = Host::factory()->create();

        $updatedData = [
            'first_name' => 'Johny',
            'last_name' => 'Test 2',
            'email' => 'email@example.com',
        ];

        $this->put(route('hosts.update', $host), $updatedData)
             ->assertStatus(200);
    }

    public function test_can_show_host()
    {
        $host = Host::factory()->create();

        $this->get(route('hosts.show', $host->id))->assertStatus(200);
    }

    public function test_can_delete_host()
    {
        $host = Host::factory()->create();

        $this->delete(route('hosts.destroy', $host->id))->assertStatus(200);
    }

    public function test_can_list_hosts()
    {
        $host = Host::factory()->count(3)->create();

        $this->get(route('hosts.index'))
        ->assertStatus(200);
    }
}
