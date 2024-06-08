<?php

namespace Database\Seeders;

use App\Models\Communication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommunicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $communication = Communication::create();

        $communication->translateOrNew('en')->name = "SMS";
        $communication->translateOrNew('ar')->name = "رسائل SMS";
        $communication->save();

        $communication = Communication::create();

        $communication->translateOrNew('en')->name = "Email";
        $communication->translateOrNew('ar')->name = "البريد الالكتروني";
        $communication->save();
    }
}
