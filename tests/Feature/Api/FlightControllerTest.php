<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\User;
use App\Models\Flight;
use App\Models\Planes;
use Illuminate\Foundation\Testing\RefreshDatabase;



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

    public function test_show()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user, 'api')->get('/api/flight/1');
        $collection = $response->json();
        $response->assertStatus(200);
    }

    public function test_store_creates_flight()
{
    
    $user = User::factory()->create(); 
    $plane = Planes::factory()->create(); 

   
    $data = [
        'date' => now()->addDays(10)->toDateString(),
        'departure' => 'Madrid',
        'arrival' => 'Barcelona',
        'image' => 'http://example.com/image.jpg',
        'airplane_id' => $plane->id,
        'available' => true,
    ];

    
    $this->actingAs($user, 'sanctum')
        ->postJson('/api/flight', $data) 
        ->assertStatus(200)
        ->assertJsonFragment([
            'departure' => 'Madrid',
            'arrival' => 'Barcelona',
        ]);

    
    $this->assertDatabaseHas('flights', [
        'date' => now()->addDays(10)->toDateString(),
        'departure' => 'Madrid',
        'arrival' => 'Barcelona',
        'image' => 'http://example.com/image.jpg',
        'airplane_id' => $plane->id,
        'available' => true,
    ]);
}

public function test_store_fails_with_invalid_data()
{
   
    $user = User::factory()->create();

    
    $data = [
        'date' => 'invalid-date',
        'departure' => '',
        'arrival' => '',
        'image' => 'not-a-valid-url',
        'airplane_id' => null,
        'available' => null,
    ];

    
    $this->actingAs($user, 'sanctum')
        ->postJson('/api/flight', $data)
        ->assertStatus(422) 
        ->assertJsonValidationErrors(['date', 'departure', 'arrival', 'image', 'airplane_id', 'available']);
}
public function test_update_flight_successfully()
{
    
    $user = User::factory()->create(); 
    $plane = Planes::factory()->create(); 
    $flight = Flight::factory()->create([
        'airplane_id' => $plane->id, 
        'date' => now()->addDays(5)->toDateString(),
        'departure' => 'Madrid',
        'arrival' => 'Barcelona',
        'image' => 'http://example.com/image.jpg',
        'available' => true,
    ]);

    
    $updatedData = [
        'date' => now()->addDays(10)->toDateString(),
        'departure' => 'Valencia',
        'arrival' => 'Lisbon',
        'image' => 'http://example.com/new-image.jpg',
        'airplane_id' => $plane->id,
        'available' => false,
    ];

    
    $this->actingAs($user, 'sanctum')
        ->putJson(route('apiiupdate', ['id' => $flight->id]), $updatedData) // Usar el nombre de la ruta
        ->assertStatus(200)
        ->assertJsonFragment([
            'departure' => 'Valencia',
            'arrival' => 'Lisbon',
        ]);

  
    $this->assertDatabaseHas('flights', [
        'id' => $flight->id,
        'date' => now()->addDays(10)->toDateString(),
        'departure' => 'Valencia',
        'arrival' => 'Lisbon',
        'image' => 'http://example.com/new-image.jpg',
        'airplane_id' => $plane->id,
        'available' => false,
    ]);
}
public function test_destroy_deletes_flight_for_admin_user()
{
    
    $admin = User::factory()->create(['admin' => true]); 
    $plane = Planes::factory()->create(); 
    $flight = Flight::factory()->create(['airplane_id' => $plane->id]); 

    
    $this->actingAs($admin, 'sanctum')
        ->deleteJson(route('apiidestroy', ['id' => $flight->id]))
        ->assertStatus(204); 

   
    $this->assertDatabaseMissing('flights', ['id' => $flight->id]);
}

public function test_destroy_fails_for_non_admin_user()
{
    
    $user = User::factory()->create(['admin' => false]); 
    $plane = Planes::factory()->create(); 
    $flight = Flight::factory()->create(['airplane_id' => $plane->id]); 

    
    $this->actingAs($user, 'sanctum')
        ->deleteJson(route('apiidestroy', ['id' => $flight->id]))
        ->assertStatus(401) 
        ->assertJsonFragment(['error' => 'Unauthorized to delete a Flight, you are not admin']);

    
    $this->assertDatabaseHas('flights', ['id' => $flight->id]);
}
}