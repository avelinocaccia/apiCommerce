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


$router->post('clientes/crear','ClientController@store');
$router->get('/clientes/ver','ClientController@index');
$router->get('/clientes/{id}','ClientController@show');
$router->put('/clientes/{id}','ClientController@update');
$router->delete('/clientes/{id}','ClientController@destroy');