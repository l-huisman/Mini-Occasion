<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::factory(3)->create();

        $vehicles = Vehicle::factory(10)->create();

        foreach ($vehicles as $vehicle) {
            $vehicle->categories()->attach($categories->random());
        }
    }
}
