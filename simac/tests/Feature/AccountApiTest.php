<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Modules\Account;

class AccountApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_can_create_account()
    {
        $formData = [
            'password' => '123',
        ];

        $this->post(route('accounts.store'), $formData)
             ->assertStatus(302);
    }

    public function test_can_update_account()
    {
        $this->withoutExceptionHandling();

        $account = \App\Modules\Account::factory()->create();

        $updatedData = [
            'password' => 'example@example.com',
        ];

        $this->put(route('accounts.update', $account), $updatedData)
             ->assertStatus(200);
    }

    public function test_can_show_account()
    {
        $account = Account::factory()->create();

        $this->get(route('accounts.show', $account->id))->assertStatus(200);
    }

    public function test_can_delete_account()
    {
        $account = Account::factory()->create();

        $this->delete(route('accounts.destroy', $account->id))->assertStatus(200);
    }

    public function test_can_list_accounts()
    {
        $account = Account::factory()->count(3)->create();

        $this->get(route('accounts.index'))
        ->assertStatus(200);
    }
}
