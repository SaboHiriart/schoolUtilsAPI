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

//Routes for UsersController methods

$router->post('/users', ['middleware' => 'auth', 'uses' => 'UsersController@newUser']);

$router->get('/users/{username}', ['middleware' => 'auth', 'uses' => 'UsersController@userLogIn']);

$router->delete('/usuarios/{id}', ['middleware' => 'auth', 'uses' => 'UsuarioController@eliminar' ]);
