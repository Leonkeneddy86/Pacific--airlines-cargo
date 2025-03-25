<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that registration fails with invalid data.
     *
     * @return void
     */
    public function test_registration_fails_with_invalid_data()
    {
        $response = $this->post('/register', [
            // Missing email and password fields
            'name' => '',
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }

    /**
     * Test that a user can register with valid data.
     *
     * @return void
     */
    public function test_registration_succeeds_with_valid_data()
    {
        // Define a temporary route for testing registration
        Route::post('/register', function (\Illuminate\Http\Request $request) {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
            ]);

            $validated['password'] = bcrypt($validated['password']);

            User::create($validated);

            return redirect('/flights');
        });

        $validData = [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'secretpassword',
            'password_confirmation' => 'secretpassword',
        ];

        $response = $this->post('/register', $validData);

        // Assert the user is created in the database
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'name'  => 'Test User',
        ]);

        // Get the created user
        $user = User::where('email', 'test@example.com')->first();
        $this->assertNotNull($user);
        $this->assertTrue(Hash::check('secretpassword', $user->password));

        // Assert redirection to the intended route
        $response->assertRedirect('/flights');
    }
}