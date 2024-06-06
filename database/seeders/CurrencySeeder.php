<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currency = Currency::create([
           'code' => 'USD',
            'icon' =>  'usd.png'
        ]);

        $currency->translateOrNew('en')->name = "US Dollar";
        $currency->translateOrNew('ar')->name = "دولار امريكي";
        $currency->save();


        $currency = Currency::create([
            'code' => 'SAR',
            'icon' =>  'sar.png'
        ]);

        $currency->translateOrNew('en')->name = "Saudi Riyal";
        $currency->translateOrNew('ar')->name = "ريال سعودي";

        $currency->save();
    }
}
