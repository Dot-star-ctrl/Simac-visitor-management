<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_can_create_company()
    {
        $formData = [
            'name' => 'Company 1',
        ];

        $this->post(route('companies.store'), $formData)
             ->assertStatus(201);
    }

    public function test_can_update_company()
    {
        $company = \App\Models\Company::factory()->create();

        $updatedData = [
            'name' => 'Company 2',
        ];

        $this->put(route('companies.update', $company), $updatedData)
             ->assertStatus(200);
    }

    public function test_can_show_company()
    {
        $company = \App\Models\Company::factory()->create();

        $this->get(route('companies.show', $company->id))->assertStatus(200);
    }

    public function test_can_delete_company()
    {
        $company = \App\Models\Company::factory()->create();

        $this->delete(route('companies.destroy', $company->id))->assertStatus(200);
    }

    public function test_can_list_companies()
    {
        $company = \App\Models\Company::factory()->count(3)->create();

        $this->get(route('companies.index'))
        ->assertStatus(200);
    }
}
