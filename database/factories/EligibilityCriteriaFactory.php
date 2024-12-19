<?php

namespace Database\Factories;

use App\Models\EligibilityCriteria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EligibilityCriteria>
 */
class EligibilityCriteriaFactory extends Factory
{
    protected $model = EligibilityCriteria::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->sentence(3),
            'age_less_than' => $this->faker->numberBetween(23, 60),
            'age_greater_than' => $this->faker->numberBetween(10, 24),
            'last_login_days_ago' => $this->faker->numberBetween(1, 300),
            'income_less_than' => $this->faker->randomFloat(2, 5000),
            'income_greater_than' => $this->faker->randomFloat(2, 5000)
        ];
    }
}
