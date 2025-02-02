<?php

namespace Database\Seeders;
use App\Models\Planes;
use App\Models\Flight;

class DatabaseSeeder extends \Illuminate\Database\Seeder
{
    public function run(): void
    {
        // Crea algunos aviones
        $planes = Planes::factory()->count(10)->create();

        // Luego crea algunos vuelos, asegurándote de usar IDs de aviones existentes
        Flight::factory()->count(10)->create([
            'airplane_id' => $planes->random()->id, // Usa un ID aleatorio de los aviones creados
        ]);
    }
}
