<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\General;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        parent::$data['activeMenu'] = 'dashboard';
    }

    public function Home()
    {
        /*
         * Count the customers and the transactions at the home page
         */
        parent::$data['customers_count'] = Cache::remember('customers_count', 60 * 60 * 24, function () {
            return Customer::count();
        });

        parent::$data['transactions_count'] = Cache::remember('transactions', 60 * 60 * 24, function () {
            return Transaction::count();
        });

        return view('home', parent::$data);
    }

    /**
     * * @OA\Get(
     *      path="dashboard/language/$languageCode",
     *      operationId="Change the dashboard layout language",
     *      tags={"Home"},
     *      summary="Change language",
     *      description="Change language",
     *      @OA\Parameter(
     *          name="languageCode",
     *          in="query",
     *          required=true,
     *      ),
     * )
     *
     * @return RedirectResponse
     *
     */
    public function ChangeLanguage($code)
    {
        /*
         * Put the language key in the cache to change the application locale
         */
        Cache::put(General::LANGUAGE_CACHE_KEY, $code);
        return redirect()->back();
    }

}
