<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PreRegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_show_departments_by_company_id()
    {
        $departments = \App\Department::factory()->count(10)->create();

        $this->get(route('pre-register.show', 5))->assertStatus(200);
    }
}
