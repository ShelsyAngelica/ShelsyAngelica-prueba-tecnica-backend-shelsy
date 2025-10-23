<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\People>
 */
class PeopleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $positionIds = Position::pluck('id')->toArray();
        return [
            'name' => fake()->name(),
            'document_number' => fake()->unique()->randomNumber(8),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'percentage' => fake()->numberBetween(0, 100),
            'position_id' => $this->faker->randomElement($positionIds),
        ];
    }
}
