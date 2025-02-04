<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\HomeController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    public function testIndexReturnsHomeView()
    {
        $controller = new HomeController();
        $response = $controller->index();
        $this->assertInstanceOf(\Illuminate\View\View::class, $response);
    }

    public function testMiddlewareIsApplied()
    {
        $controller = new HomeController();
        $middleware = $controller->getMiddleware();

        $this->assertContains('auth', array_column($middleware, 'middleware'));
    }
}