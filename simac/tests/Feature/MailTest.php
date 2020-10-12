<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MailTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_send_mail()
    {
        $formData = [
            'companyName'  => 'Simac',
            'departmentName'     => 'Administration',
            'dateTime'  => '2020-10-20T14:37',
            'email'       => 'gminchev2000@gmail.com'
        ];

        $this->post(route('send.store'), $formData)
            ->assertStatus(200);
    }
}
