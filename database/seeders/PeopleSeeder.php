<?php

namespace Database\Seeders;

use App\Models\People;
use App\Models\Position;
use Illuminate\Database\Seeder;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $people = People::factory(10)->create();
    }
}
