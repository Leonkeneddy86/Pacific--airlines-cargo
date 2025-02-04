<?php

namespace Database\Seeders;
use App\Models\Planes;
use App\Models\Flight;

class DatabaseSeeder extends \Illuminate\Database\Seeder
{
    public function run(): void
    {
    
        $planes = Planes::factory()->count(10)->create();

        Flight::factory()->count(10)->create([
            'airplane_id' => $planes->random()->id,
        ]);
    }
}
