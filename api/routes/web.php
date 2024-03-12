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

$router->get('/posts', 'PostsController@index');
$router->get('/posts/{id}', 'PostsController@show');
$router->post('/posts', 'PostsController@store');
$router->put('/posts/{id}', 'PostsController@update');
$router->delete('posts/{id}','PostsController@destroy');