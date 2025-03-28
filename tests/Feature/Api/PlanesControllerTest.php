<?php

namespace Tests\Feature\Api;

use App\Models\Planes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlanesControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index(): void
    {
        
        $planes = Planes::factory(3)->create();

        
        $response = $this->getJson('/api/planes');

    
        $response->assertStatus(200);

        
        $response->assertJson($planes->toArray());
    }


    public function test_show(): void
    {
        
        $plane = Planes::factory()->create();

       
        $response = $this->getJson("/api/plane/{$plane->id}");

   
        $response->assertStatus(200);

        
        $response->assertJson($plane->toArray());
    }

    public function test_store(): void
    {
        
        $planeData = [
            'name' => 'Boeing 747',
            'places' => 416,
        ];

       
        $response = $this->postJson('/api/plane', $planeData);

       
        $response->assertStatus(200);

       
        $response->assertJson($planeData);

       
        $this->assertDatabaseHas('planes', $planeData);
    }

    public function test_update(): void
    {
        
        $plane = Planes::factory()->create([
            'name' => 'Boeing 747',
            'places' => 416,
        ]);

        
        $updatedPlaneData = [
            'name' => 'Airbus A380',
            'places' => 525,
        ];

        
        $response = $this->putJson("/api/plane/{$plane->id}", $updatedPlaneData);

        
        $response->assertStatus(200);

        
        $response->assertJson($updatedPlaneData);

        
        $this->assertDatabaseHas('planes', $updatedPlaneData);
    }

    public function test_destroy(): void
    {
       
        $plane = Planes::factory()->create();

        
        $response = $this->deleteJson("/api/plane/{$plane->id}");

        
        $response->assertStatus(200);

        
        $this->assertDatabaseMissing('planes', ['id' => $plane->id]);
    }
}

