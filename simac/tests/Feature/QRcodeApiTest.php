<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QRcodeApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_can_create_qrcode()
    {
        $formData = [
            'first_name' => 'John'
        ];

        $this->post(route('qrcodes.store'), $formData)
             ->assertStatus(302);
    }

    public function test_can_update_qrcode()
    {
        $this->withoutExceptionHandling();

        $qrcode = \App\qrcode::factory()->create();

        $updatedData = [
            'first_name' => 'John'
        ];

        $this->put(route('qrcodes.update', $qrcode), $updatedData)
             ->assertStatus(200);
    }

    public function test_can_show_qrcode()
    {
        $qrcode = \App\qrcode::factory()->create();

        $this->get(route('qrcodes.show', $qrcode->id))->assertStatus(200);
    }

    public function test_can_delete_qrcode()
    {
        $qrcode = \App\qrcode::factory()->create();

        $this->delete(route('qrcodes.destroy', $qrcode->id))->assertStatus(200);
    }

    public function test_can_list_qrcodes()
    {
        $qrcode = \App\qrcode::factory()->count(3)->create();

        $this->get(route('qrcodes.index'))
        ->assertStatus(200);
    }
}
