<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'provider' => $this->faker->company,
            'receiver_address' => $this->faker->address,
            'receiver_name' => $this->faker->name,
            'weight' => $this->faker->randomFloat(2, 0, 100),
            'measurements' => "0x0x0",
            'status' => $this->faker->randomElement(['Aangemeld', 'Uitgeprint', 'Afgeleverd', "Sorteercentrum", "Onderweg"]),
        ];
    }
}
