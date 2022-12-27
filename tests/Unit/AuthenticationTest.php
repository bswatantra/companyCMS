<?php

namespace Tests\Unit;

use App\Models\Company;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function unauthenticated_users_cannot_create_a_new_company()
    {
        $task = factory(Company::class)->make();
        $this->post('/companies/create', $task->toArray())
            ->assertRedirect('/login');
    }

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);
        $this->assertGuest();

    }
}
