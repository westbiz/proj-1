<?php

use Illuminate\Http\Request;
// use App\Http\Resources\CountryCollection;
// use App\Http\Resources\CountryResource;
use App\Models\City;
use App\Http\Resources\CityResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// api rootlist
Route::get('/',function(){
	return response()->json([
        'title' => 'list of roots',
        'type'  =>  'application/vnd.yourformat+json',
		'rel'   => 'collection http:/localhost/api/v1/continents/{id}/countries',
		'search' => 'collection http:/localhost/api/v1/countries/search?=keywords',
        'continents'  => url('api/v1/continents'),
        'countries'  => url('api/v1/countries'),
        'cities'  => url('api/v1/cities'),
    ]);
});



// Route::group(['middleware'=>'auth:api'], function () {

    // countries
    Route::get('countries/search', 'API\CountryController@search')->name('countries.search');
    Route::get('countries/{country}/cities', 'API\CountryController@getCities')->name('countries.getCities');
    Route::get('countries/{country}', 'API\CountryController@show')->name('countries.show');
    Route::get('countries', 'API\CountryController@index')->name('countries.index');


    // continents
    Route::get('continents/{continent}/countries', 'API\ContinentController@getCountries')->name('continents.getCountries');
    Route::get('continents/{continent}', 'API\ContinentController@show')->name('continents.show');
    Route::get('continents', 'API\ContinentController@index')->name('continents.index');

    // cities
    Route::get('cities/{city}', 'API\CityController@show')->name('cities.show');
    Route::get('cities', 'API\CityController@index')->name('cities.index');

// });


// Route::get('/updateapitoken','API\ApiTokenController@update');


Route::get('response/error', function () {
    return response('出错了！', 500)
        ->header('header_name', 'header_value')
        ->cookie('cookie_name', 'cookie_value');
});




// 兜底路由应该总是放到应用注册的所有路由的最后。
// Route::fallback(function () {
//     //
//     return response($content = 'error', $status = 200,);
// });