<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase; // Ensure this is correctly imported
use App\Models\User;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test login page is accessible.
     */
    public function test_login_page_is_accessible(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /**
     * Test user can login with correct credentials.
     */
    public function test_user_can_login_with_correct_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt($password = 'password123'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Test user cannot login with incorrect credentials.
     */
    public function test_user_cannot_login_with_incorrect_credentials(): void
{
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password123'),
    ]);

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrongpassword',
    ]);

    // Verifica que hay errores en la sesión
    $response->assertSessionHasErrors(['email']);
    $this->assertGuest();
}

    /**
     * Test user can logout.
     */
    public function test_user_can_logout(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post('/logout');

        $response->assertRedirect('/');
        $this->assertGuest();
    }
}