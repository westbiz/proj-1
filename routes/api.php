<?php

use Illuminate\Http\Request;
use App\Http\Resources\TypeResource;
use App\Models\Type;

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
    Route::get('countries/{id}/cities', 'API\CountryController@getCities')->name('countries.getCities');
    Route::get('countries/{id}', 'API\CountryController@show')->name('countries.show');
    Route::get('countries', 'API\CountryController@index')->name('countries.index');


    // continents
    Route::get('continents/{id}/countries', 'API\ContinentController@getCountries')->name('continents.getCountries');
    Route::get('continents/{id}', 'API\ContinentController@show')->name('continents.show');
    Route::get('continents', 'API\ContinentController@index')->name('continents.index');

    // cities
    Route::get('cities/{id}', 'API\CityController@show')->name('cities.show');
    Route::get('cities', 'API\CityController@index')->name('cities.index');


    // types
    Route::get('types', function(){
        return TypeResource::collection(Type::all());
    });
    Route::get('types/{id}', function($id){
        return new TypeResource(Type::find($id));
    });

// });


// Route::get('/updateapitoken','API\ApiTokenController@update');


Route::get('response/error', function () {
    return response('出错了！', 500)
        ->header('header_name', 'header_value')
        ->cookie('cookie_name', 'cookie_value');
});




// vue 路由

// Route::get('continents', 'API\ContinentController@index')->name('continents.index');
// Route::get('continents/{id}', 'API\ContinentController@show')->name('continents.show');
// Route::post('continents', 'API\ContinentController@store')->name('continents.store');

// 兜底路由应该总是放到应用注册的所有路由的最后。
// Route::fallback(function () {
//     //
//     return response($content = 'error', $status = 200,);
// });