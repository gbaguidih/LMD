<?php

namespace Database\Factories;
use App\Models\Ec;
use App\Models\Ue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ec>
 */
class EcFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Ec::class;

    public function definition(): array
    {
        $ue = Ue::factory()->create();
        return [
            'code' => fake()->unique()->numberBetween(10, 99) ,
            'nom' => fake()->name() ,
            'coefficient'=> fake()->numberBetween(1, 30) ,
            'ue_id' => $ue->id,
        
        ];
    }

}
