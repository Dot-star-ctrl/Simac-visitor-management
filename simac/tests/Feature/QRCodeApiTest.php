<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QRCodeApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_can_create_qr_code()
    {
        $formData = [
            'first_name' => 'John',
        ];

        $this->post(route('qrcodes.store'), $formData)
             ->assertStatus(302);
    }

    public function test_can_update_qr_code()
    {
        $qrcode = \App\Models\Qrcode::factory()->create();

        $updatedData = [
            'first_name' => 'Company',
        ];

        $this->put(route('qrcodes.update', $qrcode), $updatedData)
             ->assertStatus(200);
    }

    public function test_can_show_qrcode()
    {
        $qrcode = \App\Models\Qrcode::factory()->create();

        $this->get(route('qrcodes.show', $qrcode->id))->assertStatus(200);
    }

    public function test_can_delete_qr_code()
    {
        $qrcode = \App\Models\Qrcode::factory()->create();

        $this->delete(route('qrcodes.destroy', $qrcode->id))->assertStatus(200);
    }

    public function test_can_list_qr_code()
    {
        $qrcode = \App\Models\Qrcode::factory()->count(3)->create();

        $this->get(route('qrcodes.index'))
        ->assertStatus(200);
    }
}
