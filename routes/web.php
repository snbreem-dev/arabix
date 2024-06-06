<?php

use App\Http\Controllers\Dashboard\CustomerController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard.home');
});

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('home', [HomeController::class, 'Home'])->name('home');
    Route::get('language/{code}', [HomeController::class, 'ChangeLanguage'])->name('change-language');

    Route::resource('customers', CustomerController::class);
    Route::resource('transactions', TransactionController::class);
});
