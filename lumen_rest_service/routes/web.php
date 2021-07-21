<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/clients', 'ClientController@index');
$router->get('/client/{id}', 'ClientController@show');
$router->get('/contracts', 'ContractController@index');
$router->get('/client/{id}/contracts', 'ContractController@ContractsByClient');
$router->get('/contract/{id}', 'ContractController@showContractById');
$router->put('/update', 'ContractController@update');

