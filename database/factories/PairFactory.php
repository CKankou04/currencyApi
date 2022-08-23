<?php

namespace Database\Factories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pair>
 */
class PairFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_currency_from' => fn () => Currency::factory(),
            'id_currency_to' => fn () => Currency::factory(),
            'name' => $this->faker->sentence(),
            'rate' => $this->faker->randomFloat(4, 0.0001, 10.0000),
            
        ];
    }
}
