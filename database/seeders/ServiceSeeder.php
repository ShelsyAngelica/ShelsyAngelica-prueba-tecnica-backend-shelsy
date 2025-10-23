<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::insert([            
            [
                'name' => 'Peinado',
                'price' => 10000,
            ],
            [
                'name' => 'Barba',
                'price' => 15000,
            ],
            [
                'name' => 'Corte de pelo',
                'price' => 20000,
            ],
        ]);
    }
}
