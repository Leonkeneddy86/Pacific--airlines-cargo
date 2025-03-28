<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Auth\ResetPasswordController;

class ResetPasswordControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_redirect_to_property_is_set_to_home()
    {
        $this->assertEquals('/home', (new ResetPasswordController())->redirectPath());
    }

    public function test_user_can_reset_password_with_valid_token()
    {
        
        $user = User::factory()->create([
            'password' => Hash::make('oldpassword'),
        ]);

        
        $token = Password::broker()->createToken($user);
        $newPassword = 'newsecurepassword';

       
        $response = $this->post(route('password.update'), [
            'token'                 => $token,
            'email'                 => $user->email,
            'password'              => $newPassword,
            'password_confirmation' => $newPassword,
        ]);

        
        $response->assertRedirect('/home');

        
        $this->assertTrue(Hash::check($newPassword, $user->fresh()->password));
    }
}