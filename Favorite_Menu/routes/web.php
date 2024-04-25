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

// Get Favorit Menu by ID User
$router->get('/favorite/{id_user}', 'FavoriteController@getFavorite');

// Post Tambah Favorit Menu by ID User
$router->post('/favorite/{id_user}/{id_menu}', 'FavoriteController@addFavorite');

// Post Delete Favorit Menu by ID User
$router->post('/favorite/delete/{id_user}/{id_menu}', 'FavoriteController@deleteFavorite');

$router->get('/', function () use ($router) {
    return $router->app->version();
});
