<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    protected static array $brandNames = [
        'Mercedes', 'BMW', 'Ford', 'Toyota', 'Tesla', 'Volkswagen', 'NIO', 'Hyundai'
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(self::$brandNames),
        ];
    }

    /**
     * Get the predefined list of brand names.
     *
     * @return array<string>
     */
    public static function getBrandNames(): array
    {
        return self::$brandNames;
    }
}
