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
            'id_currency_from' => rand(1,20),
            'id_currency_to' => rand(1,20),
            'rate' => $this->faker->randomFloat(4, 0.0001, 10.0000),
            
        ];
    }
}
