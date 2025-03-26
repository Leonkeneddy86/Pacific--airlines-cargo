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
        // Crear algunos registros de prueba
        $planes = Planes::factory(3)->create();

        // Realizar una solicitud GET al endpoint del método index
        $response = $this->getJson('/api/planes');

        // Verificar que el estado de la respuesta sea 200
        $response->assertStatus(200);

        // Verificar que los datos devueltos coincidan con los registros creados
        $response->assertJson($planes->toArray());
    }


    public function test_show(): void
    {
        // Crear un registro de prueba
        $plane = Planes::factory()->create();

        // Realizar una solicitud GET al endpoint del método show
        $response = $this->getJson("/api/plane/{$plane->id}");

        // Verificar que el estado de la respuesta sea 200
        $response->assertStatus(200);

        // Verificar que los datos devueltos coincidan con el registro creado
        $response->assertJson($plane->toArray());
    }

    public function test_store(): void
    {
        // Datos de prueba para crear un avión
        $planeData = [
            'name' => 'Boeing 747',
            'places' => 416,
        ];

        // Realizar una solicitud POST al endpoint del método store
        $response = $this->postJson('/api/plane', $planeData);

        // Verificar que el estado de la respuesta sea 200
        $response->assertStatus(200);

        // Verificar que los datos devueltos coincidan con los datos enviados
        $response->assertJson($planeData);

        // Verificar que los datos se hayan guardado en la base de datos
        $this->assertDatabaseHas('planes', $planeData);
    }

    public function test_update(): void
    {
        // Crear un registro de prueba
        $plane = Planes::factory()->create([
            'name' => 'Boeing 747',
            'places' => 416,
        ]);

        // Datos actualizados para el avión
        $updatedPlaneData = [
            'name' => 'Airbus A380',
            'places' => 525,
        ];

        // Realizar una solicitud PUT al endpoint del método update
        $response = $this->putJson("/api/plane/{$plane->id}", $updatedPlaneData);

        // Verificar que el estado de la respuesta sea 200
        $response->assertStatus(200);

        // Verificar que los datos devueltos coincidan con los datos actualizados
        $response->assertJson($updatedPlaneData);

        // Verificar que los datos se hayan actualizado en la base de datos
        $this->assertDatabaseHas('planes', $updatedPlaneData);
    }

    public function test_destroy(): void
    {
        // Crear un registro de prueba
        $plane = Planes::factory()->create();

        // Realizar una solicitud DELETE al endpoint del método destroy
        $response = $this->deleteJson("/api/plane/{$plane->id}");

        // Verificar que el estado de la respuesta sea 200
        $response->assertStatus(200);

        // Verificar que el registro ya no exista en la base de datos
        $this->assertDatabaseMissing('planes', ['id' => $plane->id]);
    }
}

