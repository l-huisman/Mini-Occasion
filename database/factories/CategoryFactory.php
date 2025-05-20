<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class CategoryFactory extends Factory
{
    protected static array $categoryNames = [
        'Bus', 'SUV', 'Person', 'Convertable', 'Luxury', 'Sport', 'Electric', 'Hybrid', 'Diesel', 'Petrol', 'Gasoline', 'Crossover', 'Pickup', 'Trekhaak'
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(self::$categoryNames),
        ];
    }

    /**
     * Get the predefined list of category names.
     *
     * @return array<string>
     */
    public static function getCategoryNames(): array
    {
        return self::$categoryNames;
    }
}
