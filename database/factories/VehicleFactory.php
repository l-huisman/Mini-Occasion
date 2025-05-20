<?php

    namespace Database\Factories;

    use App\Models\Brand;
    use App\Models\Type;
    use App\Models\Vehicle;
    use Database\Factories\BrandFactory as BrandFactory;
    use Database\Factories\TypeFactory as TypeFactory;
    use Illuminate\Database\Eloquent\Factories\Factory;

    /**
     * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
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
                'license_plate' => $this->faker->regexify('/[A-Z]-[1-9]{3}-[A-Z]{2}/'),
                'brand_id' => function () {
                    $possibleNames = BrandFactory::getBrandNames();
                    $existingNames = Brand::pluck('name')->all();
                    $availableNewNames = array_diff($possibleNames, $existingNames);
                    if (!empty($availableNewNames)) {
                        $nameToCreate = $this->faker->randomElement($availableNewNames);
                        return Brand::firstOrCreate(['name' => $nameToCreate])->id;
                    } else {
                        return Brand::inRandomOrder()->firstOrFail()->id;
                    }
                },
                'type_id' => function () {
                    $possibleNames = TypeFactory::getTypeNames();
                    $existingNames = Type::pluck('name')->all();
                    $availableNewNames = array_diff($possibleNames, $existingNames);

                    if (!empty($availableNewNames)) {
                        $nameToCreate = $this->faker->randomElement($availableNewNames);
                        return Type::firstOrCreate(['name' => $nameToCreate])->id;
                    } else {
                        return Type::inRandomOrder()->firstOrFail()->id;
                    }
                },
                'build_date' => $this->faker->date(),
                'bought_at' => $this->faker->numberBetween(5000, 100000),
                'available_at' => $this->faker->numberBetween(15000, 150000),
                'url' => 'https://picsum.photos/id/' . $this->faker->numberBetween(1, 1000) . '/300/300/',
            ];
        }
    }
