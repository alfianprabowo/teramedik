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

// $router->get('/hospitals', 'HospitalController@index');

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('hospitals',  ['uses' => 'HospitalController@index']);
  
    $router->get('hospitals/{id}', ['uses' => 'HospitalController@show']);
  
    $router->post('hospitals', ['uses' => 'HospitalController@create']);
   
  });