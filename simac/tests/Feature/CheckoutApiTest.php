<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckoutApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_checkout()
    {
        $formData = [
            'date' => '123.123.123',
        ];

        $this->post(route('checkout.store'), $formData)
             ->assertStatus(302);
    }

    public function test_can_update_checkout()
    {
        $checkout = \App\Models\Checkout::factory()->create();

        $updatedData = [
            'date' => '12',
        ];

        $this->put(route('checkout.update', $checkout), $updatedData)
             ->assertStatus(200);
    }

    public function test_can_show_checkout()
    {
        $checkout = \App\Models\Checkout::factory()->create();

        $this->get(route('checkout.show', $checkout->id))->assertStatus(200);
    }

    public function test_can_delete_checkout()
    {
        $checkout = \App\Models\Checkout::factory()->create();

        $this->delete(route('checkout.destroy', $checkout->id))->assertStatus(200);
    }

    public function test_can_list_checkout()
    {
        $checkout = \App\Models\Checkout::factory()->count(2)->create();

        $this->get(route('checkout.index'))
        ->assertStatus(200);
    }
}
