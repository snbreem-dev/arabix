<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Language::create([
            'name' => 'العربية',
            'code' => 'ar',
            'flag' => 'ar.png',
            'direction' => 'rtl',
        ]);

        Language::create([
            'name' => 'English',
            'code' => 'en',
            'flag' => 'en.png',
        ]);
    }
}
