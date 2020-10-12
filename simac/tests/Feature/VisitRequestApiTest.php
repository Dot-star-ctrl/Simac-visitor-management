<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VisitRequestApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_visit_request()
    {
        $formData = [
            'visitor_id'     => '8',
            'company_id'     => '1',
            'department_id'  => '1',
            'dateTime'       => '2020-10-20T14:37',
        ];

        $this->post(route('visitrequests.store'), $formData)
            ->assertStatus(201);
    }

    public function test_can_update_visit_request()
    {
        $visitRequest = \App\VisitRequest::factory()->create();

        $updatedData = [
            'visitor_id'     => '9',
            'company_id'     => '2',
            'department_id'  => '2',
            'dateTime'       => '2020-10-20T14:37',
        ];

        $this->put(route('visitrequests.update', $visitRequest), $updatedData)
            ->assertStatus(200);
    }

    public function test_can_show_visit_request()
    {
        $visitRequest = \App\VisitRequest::factory()->create();

        $this->get(route('visitrequests.show', $visitRequest->id))->assertStatus(200);
    }

    public function test_can_delete_visitor()
    {
        $visitRequest = \App\VisitRequest::factory()->create();

        $this->delete(route('visitrequests.destroy', $visitRequest->id))->assertStatus(200);
    }

    public function test_can_list_visitors()
    {
        $visitRequest = \App\VisitRequest::factory()->count(3)->create();

        $this->get(route('visitrequests.index'))
            ->assertStatus(200);
    }
}
