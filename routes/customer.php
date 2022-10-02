<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(
    [
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:customer']
    ], function () {

    //==============================dashboard============================
    Route::get('/customer/dashboard', function () {
        return view('customer.dashboard');
        // return view('customer.dashboard')->middleware(['auth:customer']);
    });

});
