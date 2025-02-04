<?php

namespace Tests\Feature;

use Tests\TestCase; // Ensure this is the correct path to your TestCase class
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class ResetPasswordControllerTest extends TestCase
{
    use RefreshDatabase; // Ensure you are using the trait correctly

    public function test_user_can_view_reset_password_form()
    {
        $response = $this->get(route('password.reset', ['token' => 'dummy-token']));

        $response->assertStatus(200);
        $response->assertViewIs('auth.passwords.reset');
    }

    public function test_user_can_reset_password()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('old-password'),
        ]);

        $token = Password::createToken($user);

        $response = $this->post(route('password.update'), [
            'token' => $token,
            'email' => 'test@example.com',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

        $response->assertRedirect('/home');
        $this->assertCredentials([
            'email' => 'test@example.com',
            'password' => 'new-password',
        ]);
    }

    public function test_user_cannot_reset_password_with_invalid_token()
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('old-password'),
        ]);

        $response = $this->post(route('password.update'), [
            'token' => 'invalid-token',
            'email' => 'test@example.com',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

        $response->assertSessionHasErrors(['email']);
    }
}