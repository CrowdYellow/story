<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->get('users', 'UsersController@index');
    $router->get('articles', 'ArticlesController@index');
    $router->get('articles/create', 'ArticlesController@create');
    $router->post('articles', 'ArticlesController@store');
    $router->get('articles/{id}/edit', 'ArticlesController@edit');
    $router->put('articles/{id}', 'ArticlesController@update');
    $router->delete('articles/{id}', 'ArticlesController@destroy');
    $router->get('images', 'ImagesController@index');
    $router->get('images/create', 'ImagesController@create');
    $router->post('images', 'ImagesController@store');
    $router->get('images/{id}/edit', 'ImagesController@edit');
    $router->put('images/{id}', 'ImagesController@update');
    $router->delete('images/{id}', 'ImagesController@destroy');
});
