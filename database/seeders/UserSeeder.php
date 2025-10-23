<?php

namespace Database\Seeders;

use App\Models\People;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Pruebas',
            'email' => 'admin@local.test',
            'password' => Hash::make('secret123'), 
            'person_id' => 1,
        ]);

        $barber = People::whereHas('position', function ($query) {
            $query->where('name', 'barbero');
        })->first();
        User::factory()->create([
            'name' => $barber->name,
            'email' => $barber->email,
            'password' => Hash::make('password'),
            'person_id' => $barber->id,
        ]);

        $client = People::whereHas('position', function ($query) {
            $query->where('name', 'cliente');
        })->first();
        User::factory()->create([
            'name' => $client->name,
            'email' => $client->email,
            'password' => Hash::make('password'),
            'person_id' => $client->id,
        ]);
    }
}
