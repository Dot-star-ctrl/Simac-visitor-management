<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VisitorApiTest extends TestCase
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
            'email' => 'example@example.com',
        ];

        $this->post(route('visitors.store'), $formData)
             ->assertStatus(201);
    }

    public function test_can_update_visitor()
    {
        $visitor = Visitor::factory()->create();

        $updatedData = [
            'first_name' => 'Johny Second',
            'last_name' => 'Test',
            'email' => 'example@example.com',
        ];

        $this->put(route('visitors.update', $visitor), $updatedData)
             ->assertStatus(200);
    }

    public function test_can_show_visitor()
    {
        $visitor = Visitor::factory()->create();

        $this->get(route('visitors.show', $visitor->id))->assertStatus(200);
    }

    public function test_can_delete_visitor()
    {
        $visitor = Visitor::factory()->create();

        $this->delete(route('visitors.destroy', $visitor->id))->assertStatus(200);
    }

    public function test_can_list_visitors()
    {
        $visitor = Visitor::factory()->count(3)->create();

        $this->get(route('visitors.index'))
        ->assertStatus(200);
    }
}
