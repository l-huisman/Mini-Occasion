<?php

        namespace Database\Factories;

        use Illuminate\Database\Eloquent\Factories\Factory;
        use App\Models\Type;

        /**
         * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type>
         */
        class TypeFactory extends Factory
        {
            protected static array $typeNames = [
                'Sedan', 'Truck', 'Minivan', 'Coupe', 'Hatchback', 'Convertible', 'Wagon'
            ];

            /**
             * Define the model's default state.
             *
             * @return array<string, mixed>
             */
            public function definition(): array
            {
                return [
                    'name' => $this->faker->randomElement(self::$typeNames),
                ];
            }

            /**
             * Get the predefined list of type names.
             *
             * @return array<string>
             */
            public static function getTypeNames(): array
            {
                return self::$typeNames;
            }
        }
