<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'activity' => fake()->word(),
            'location' => fake()->word(),
            'date' => Carbon::now()->addYears(2),
            'resourse' => fake()->word(),
            'status'=> fake()->word(),
            'obs' => fake()->word(),
            
        ];
    }
}
