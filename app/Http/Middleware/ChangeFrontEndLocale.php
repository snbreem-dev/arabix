<?php

namespace App\Http\Middleware;

use App\Http\General;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class ChangeFrontEndLocale
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        /*
         * Check if the user change the language before
         * If he did not change it then store it in te cache an change the application locale
         */
        if (Cache::has(General::LANGUAGE_CACHE_KEY)) {
            App::setLocale(Cache::get(General::LANGUAGE_CACHE_KEY, 'en'));
        }

        return $next($request);
    }
}
