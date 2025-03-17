<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Flight;
use App\Models\Planes;

class DatabaseSeeder extends \Illuminate\Database\Seeder
{
    public function run(): void
    {
    
        $planes = Planes::factory()->count(10)->create();

        Flight::factory()->count(10)->create([
            'airplane_id' => $planes->random()->id,
        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'admin' => true
        ]);
        User::factory()->create([
            'name' => 'user1',
            'email' => 'user1@user1.com',
            'admin' => false
        ]);
    }
}
