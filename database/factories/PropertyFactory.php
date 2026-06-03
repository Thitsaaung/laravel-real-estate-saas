<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(20) . 'Condo for Sale',
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 50000, 500000),
            'location' => $this->faker->city(),
            'type' => $this->faker->randomElement(['condo', 'villa', 'land']),
        ];
    }
}
