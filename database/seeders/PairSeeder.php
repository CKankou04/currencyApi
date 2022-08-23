<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PairSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private const Currencies = [
        ['currency_code' => 'USD', 'name' => 'US Dollar', 'symbol' => '$'],
    ];

    public function run()
    {
        //
    }
}
