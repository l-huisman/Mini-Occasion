<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Vehicle;
use Database\Factories\CategoryFactory as AppCategoryFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import DB facade if clearing pivot table

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Optional: Create users
        // \App\Models\User::factory(10)->create();

        $categoryNames = AppCategoryFactory::getCategoryNames();
        $createdCategories = [];
        foreach ($categoryNames as $name) {
            $createdCategories[] = Category::firstOrCreate(['name' => $name]);
        }

        $vehicles = Vehicle::factory(50)->create();
        if (!empty($createdCategories)) {
            $categoryIds = collect($createdCategories)->pluck('id');
            $vehicles->each(function (Vehicle $vehicle) use ($categoryIds) {
                if ($categoryIds->isNotEmpty()) {
                    $vehicle->categories()->attach(
                        $categoryIds->random(rand(1, min($categoryIds->count(), 3)))->all()
                    );
                }
            });
        }
    }
}
