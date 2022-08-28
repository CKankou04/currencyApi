<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\Pair;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
     //Remplissage de la table avec quelques devise
        private const Currencies = [
            ['currency_code' => 'USD', 'name' => 'US Dollar', 'symbol' => '$'],
            ['currency_code' => 'EUR', 'name' => 'Euro', 'symbol' => '€'],
            ['currency_code' => 'GBP', 'name' => 'GB Pound', 'symbol' => '£'],
            ['currency_code' => 'RON', 'name' => 'Romanian Leu', 'symbol' => 'lei'],
            ['currency_code' => 'AUD', 'name' => 'Australian dollar', 'symbol' => '$'],
            ['currency_code' => 'CZK', 'name' => 'Czech koruna', 'symbol' => 'Kč'],
            ['currency_code' => 'DKK', 'name' => 'Danish krone', 'symbol' => 'kr'],
            ['currency_code' => 'HUF', 'name' => 'forint', 'symbol' => 'Ft'],
            ['currency_code' => 'HRK', 'name' => 'kuna', 'symbol' => 'kn'],
            ['currency_code' => 'ILS', 'name' => 'shekel', 'symbol' => '₪'],
            ['currency_code' => 'MYR', 'name' => 'ringgit', 'symbol' => 'RM'],
            ['currency_code' => 'NZD', 'name' => 'New Zealand dollar', 'symbol' => '$'],
            ['currency_code' => 'NOK', 'name' => 'Norwegian krone', 'symbol' => 'kr'],
            ['currency_code' => 'PLN', 'name' => 'zloty', 'symbol' => 'zł'],
            ['currency_code' => 'RSD', 'name' => 'Serbian dinar', 'symbol' => ''],
            ['currency_code' => 'SGD', 'name' => 'Singapore dollar', 'symbol' => '$'],
            ['currency_code' => 'SEK', 'name' => 'krona', 'symbol' => 'kr'],
            ['currency_code' => 'CHF', 'name' => 'Swiss franc', 'symbol' => 'CHF'],
            ['currency_code' => 'UAH', 'name' => 'hryvnia', 'symbol' => '₴'],
            ['currency_code' => 'AED', 'name' => 'UAE dirham', 'symbol' => 'AED'],
            ['currency_code' => 'GNF', 'name' => 'Franc Guinéen', 'symbol' => 'G'],
        ];

        public function run()
        {
            (new Collection(self::Currencies))
                ->when(! App::environment('testing'), fn ($currencies) => $currencies
                    ->each(fn ($currency) => Currency::create($currency)));
             Pair::factory(15)->create();

        }
}

