<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'license_plate' => $this->faker->regexify('/[A-Z]-[1-9]{3}-[A-Z]{2}'),
            'brand' => $this->faker->randomElement(
                ['Mercedes', 'BMW', 'Ford', 'Toyota', 'Tesla', 'Volkswagen', 'NIO', 'Hyundai']
            ),
            'type' => $this->faker->randomElement(
                [
                    'Sedan', 'Truck', 'Minivan', 'Coupe', 'Hatchback', 'Convertible', 'Wagon'
                ]
            ),
            'build_date' => $this->faker->date(),
            'bought_at' => $this->faker->numberBetween(5000, 100000),
            'available_at' => $this->faker->numberBetween(15000, 150000),
            'url' => 'https://picsum.photos/id/111/300/300/',
        ];
    }
}
