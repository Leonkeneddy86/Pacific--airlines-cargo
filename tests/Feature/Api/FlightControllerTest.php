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
    // Arrange: Crear un usuario autenticado y un avión
    $user = User::factory()->create(); // Crear el usuario
    $plane = Planes::factory()->create(); // Crear el avión

    // Datos del vuelo a crear
    $data = [
        'date' => now()->addDays(10)->toDateString(),
        'departure' => 'Madrid',
        'arrival' => 'Barcelona',
        'image' => 'http://example.com/image.jpg',
        'airplane_id' => $plane->id,
        'available' => true,
    ];

    // Act: Autenticar al usuario y realizar la solicitud POST
    $this->actingAs($user, 'sanctum')
        ->postJson('/api/flight', $data) // Cambié la ruta a '/api/flights' para que coincida con las convenciones RESTful
        ->assertStatus(200)
        ->assertJsonFragment([
            'departure' => 'Madrid',
            'arrival' => 'Barcelona',
        ]);

    // Assert: Verificar que los datos se hayan guardado en la base de datos
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
    // Arrange: Crear un usuario autenticado
    $user = User::factory()->create();

    // Datos inválidos del vuelo
    $data = [
        'date' => 'invalid-date',
        'departure' => '',
        'arrival' => '',
        'image' => 'not-a-valid-url',
        'airplane_id' => null,
        'available' => null,
    ];

    // Act: Autenticar al usuario y realizar la solicitud POST
    $this->actingAs($user, 'sanctum')
        ->postJson('/api/flight', $data)
        ->assertStatus(422) // Verificar que la validación falle
        ->assertJsonValidationErrors(['date', 'departure', 'arrival', 'image', 'airplane_id', 'available']);
}
public function test_update_flight_successfully()
{
    // Arrange: Crear un usuario autenticado, un avión y un vuelo
    $user = User::factory()->create(); // Crear el usuario
    $plane = Planes::factory()->create(); // Crear el avión
    $flight = Flight::factory()->create([
        'airplane_id' => $plane->id, // Asociar el vuelo al avión creado
        'date' => now()->addDays(5)->toDateString(),
        'departure' => 'Madrid',
        'arrival' => 'Barcelona',
        'image' => 'http://example.com/image.jpg',
        'available' => true,
    ]);

    // Datos actualizados del vuelo
    $updatedData = [
        'date' => now()->addDays(10)->toDateString(),
        'departure' => 'Valencia',
        'arrival' => 'Lisbon',
        'image' => 'http://example.com/new-image.jpg',
        'airplane_id' => $plane->id,
        'available' => false,
    ];

    // Act: Autenticar al usuario y realizar la solicitud PUT
    $this->actingAs($user, 'sanctum')
        ->putJson(route('apiiupdate', ['id' => $flight->id]), $updatedData) // Usar el nombre de la ruta
        ->assertStatus(200)
        ->assertJsonFragment([
            'departure' => 'Valencia',
            'arrival' => 'Lisbon',
        ]);

    // Assert: Verificar que los datos se hayan actualizado en la base de datos
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
    // Arrange: Crear un usuario administrador, un avión y un vuelo
    $admin = User::factory()->create(['admin' => true]); // Usuario administrador
    $plane = Planes::factory()->create(); // Crear el avión
    $flight = Flight::factory()->create(['airplane_id' => $plane->id]); // Crear el vuelo

    // Act: Autenticar al usuario administrador y realizar la solicitud DELETE
    $this->actingAs($admin, 'sanctum')
        ->deleteJson(route('apiidestroy', ['id' => $flight->id]))
        ->assertStatus(204); // Verificar que la respuesta sea 204 (No Content)

    // Assert: Verificar que el vuelo haya sido eliminado de la base de datos
    $this->assertDatabaseMissing('flights', ['id' => $flight->id]);
}

public function test_destroy_fails_for_non_admin_user()
{
    // Arrange: Crear un usuario no administrador, un avión y un vuelo
    $user = User::factory()->create(['admin' => false]); // Usuario no administrador
    $plane = Planes::factory()->create(); // Crear el avión
    $flight = Flight::factory()->create(['airplane_id' => $plane->id]); // Crear el vuelo

    // Act: Autenticar al usuario no administrador y realizar la solicitud DELETE
    $this->actingAs($user, 'sanctum')
        ->deleteJson(route('apiidestroy', ['id' => $flight->id]))
        ->assertStatus(401) // Verificar que la respuesta sea 401 (Unauthorized)
        ->assertJsonFragment(['error' => 'Unauthorized to delete a Flight, you are not admin']);

    // Assert: Verificar que el vuelo no haya sido eliminado de la base de datos
    $this->assertDatabaseHas('flights', ['id' => $flight->id]);
}
}