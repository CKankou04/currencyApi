<?php

namespace Database\Factories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Countries\Models\Country;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Currency>
 */
class CurrencyFactory extends Factory
{
   
    protected $model = Currency::class;

    public function definition()
    {

        return [
            'name' => $this->faker ->sentence(),
            'currency_code' => $this->faker ->currency_code,
            'symbol' => $this->faker->unique()->randomLetter,
        ];
    }
}
