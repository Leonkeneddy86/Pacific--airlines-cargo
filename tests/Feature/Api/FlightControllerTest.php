<?php

namespace Tests\Feature\Api;

use App\Models\Planes;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FlightControllerTest extends TestCase
{
    use RefreshDatabase;
    public function test_index()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user, 'api')->get('/api/flights');
        $collection = $response->json();
        $response->assertStatus(200);
    }
}