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


$router->post('register-client', 'SoapClientController@registerClient');
$router->post('load-wallet', 'SoapClientController@loadWallet');
$router->post('pay', 'SoapClientController@pay');
$router->post('confirm-payment', 'SoapClientController@confirmPayment');
$router->post('check-balance', 'SoapClientController@checkBalance');

