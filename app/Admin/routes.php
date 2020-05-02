<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');    
    $router->resource('categories', CategoryController::class);
    $router->get('continents/getContinents', 'ContinentController@getContinents');
    $router->resource('continents', ContinentController::class);
    $router->get('countries/getCountries', 'CountryController@getCountries');
    $router->resource('countries', CountryController::class);
    $router->resource('cities', CityController::class);
    $router->resource('users', UserController::class);

});
