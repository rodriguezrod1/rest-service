<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoapClientController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


Route::group(['prefix' => 'api'], function () {
    Route::post('/register-client', [SoapClientController::class, 'registerClient']);
    Route::post('/load-wallet', [SoapClientController::class, 'loadWallet']);
    Route::post('/pay', [SoapClientController::class, 'pay']);
    Route::post('/confirm-payment', [SoapClientController::class, 'confirmPayment']);
    Route::post('/check-balance', [SoapClientController::class, 'checkBalance']);
});
