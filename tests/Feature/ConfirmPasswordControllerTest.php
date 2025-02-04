<?php

namespace Tests\Unit\Http\Controllers\Auth;

use Tests\TestCase;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;

class ConfirmPasswordControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test if the controller can be instantiated.
     *
     * @return void
     */
    public function testControllerCanBeInstantiated()
    {
        $controller = new ConfirmPasswordController();

        $this->assertInstanceOf(ConfirmPasswordController::class, $controller);
    }

    /**
     * Test if the controller uses the 'auth' middleware.
     *
     * @return void
     */
    public function testMiddleware()
    {
        $controller = new ConfirmPasswordController();
        $middleware = collect($controller->getMiddleware())->pluck('middleware')->flatten()->toArray();

        $this->assertContains('auth', $middleware);
    }

    /**
     * Test if the redirectTo property is set correctly.
     *
     * @return void
     */
    public function testRedirectToProperty()
    {
        $controller = new ConfirmPasswordController();

        $this->assertEquals('/home', $controller->redirectPath());
    }
}