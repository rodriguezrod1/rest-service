<?php

/** @var \Laravel\Lumen\Routing\Router $router */
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


$router->post('api/register-client', 'SoapClientController@registerClient');
$router->post('api/load-wallet', 'SoapClientController@loadWallet');
$router->post('api/pay', 'SoapClientController@pay');
$router->post('api/confirm-payment', 'SoapClientController@confirmPayment');
$router->post('api/check-balance', 'SoapClientController@checkBalance');

