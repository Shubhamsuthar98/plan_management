<?php

namespace Database\Factories;

use App\Models\ComboPlan;
use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\comboPlan>
 */
class ComboPlanFactory extends Factory
{
    protected $model = ComboPlan::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 50, 500),
            'plan_id' => Plan::inRandomOrder()->first()->id
        ];
    }
}
