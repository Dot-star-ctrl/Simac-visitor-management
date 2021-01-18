<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VisitRequestApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_visit_request()
    {
        $visitRequest = (array)\App\Models\VisitRequest::factory()->create();

        $this->post(route('visitrequests.store'), $visitRequest)
             ->assertStatus(302);
    }

    public function test_can_update_visit_request()
    {
        $visitRequest = \App\Models\VisitRequest::factory()->create();

        $updatedData = [
            'note' => '123',
        ];

        $this->put(route('visitrequests.update', $visitRequest), $updatedData)
             ->assertStatus(204);
    }

    public function test_can_show_visit_request()
    {
        $visitRequest = \App\Models\VisitRequest::factory()->create();
        $id = $visitRequest->id;

        $visitRequest = (array)$visitRequest;
        $this->post(route('visitrequests.store'), $visitRequest);

        $this->get(route('visitrequests.show', $id))->assertStatus(200);
    }

    public function test_can_show_visit_request_sort_new()
    {
        $visitRequest = \App\Models\VisitRequest::factory()->create();
        $id = $visitRequest->id;

        $visitRequest = (array)$visitRequest;
        $this->post(route('visitrequests.store', ['key' => 'new']), $visitRequest);

        $this->get(route('visitrequests.show', $id))->assertStatus(200);
    }

    public function test_can_show_visit_request_sort_old()
    {
        $visitRequest = \App\Models\VisitRequest::factory()->create();
        $id = $visitRequest->id;

        $visitRequest = (array)$visitRequest;
        $this->post(route('visitrequests.store', ['key' => 'old']), $visitRequest);

        $this->get(route('visitrequests.show', $id))->assertStatus(200);
    }

    public function test_can_delete_visit_request()
    {
        $visitRequest = \App\Models\VisitRequest::factory()->create();
        $id = $visitRequest->id;

        $visitRequest = (array)$visitRequest;
        $this->post(route('visitrequests.store'), $visitRequest);

        $this->delete(route('visitrequests.destroy', $id))->assertStatus(204);
    }

    public function test_can_list_visit_requests()
    {
        $visitRequest = (array)\App\Models\VisitRequest::factory()->create();
        $this->post(route('visitrequests.store'), $visitRequest);

        $this->get(route('visitrequests.index'))
        ->assertStatus(200);
    }
}
