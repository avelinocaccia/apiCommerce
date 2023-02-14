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


$router->group(['prefix' => 'api/clientes'], function () use ($router){

    $router->post('crear','ClientController@store');
    $router->post('/services','ClientController@attach');
    $router->post('/services/dettach','ClientController@dettach');
    $router->get('ver','ClientController@index');
    $router->get('{id}','ClientController@show');
    $router->put('{id}','ClientController@update');
    $router->delete('{id}','ClientController@destroy');

});


$router->group(['prefix' => 'api/servicios'], function () use ($router){

    $router->post('crear','ServiceController@store');
    $router->get('ver','ServiceController@index');
    $router->get('/filtrar/{query}','ServiceController@getQueryByName');
    $router->get('{id}','ServiceController@show');
    $router->put('{id}','ServiceController@update');
    $router->delete('{id}','ServiceController@destroy');

});

