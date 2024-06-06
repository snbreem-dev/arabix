<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Support\Facades\Cache;

abstract class Controller
{
    public static $data = [];
    public static $LANGUAGE_CACHE_KEY = 'front-locale';
    public function __construct()
    {
        self::$data['front_languages'] = Cache::remember('front_languages', 60*60*24, function () {
           return Language::select('name','code','flag')->get()->toArray();
        });
    }
}
