<?php

namespace Database\Factories;

use App\Models\Ue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ue>
 */
class UeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Ue::class;

    public function definition(): array
    {
        return [
            'code' => fake()->unique()->numberBetween(10, 99) ,
            'nom' => fake()->name() ,
            'credits_ects'=> fake()->numberBetween(1, 30) ,
            'semestre' => fake()->randomElement(['S1', 'S2', 'S3', 'S4', 'S5', 'S6']),
        ];
    }
}
