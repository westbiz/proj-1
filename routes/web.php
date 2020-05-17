<?php

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
// use GuzzleHttp\Pool;
use GuzzleHttp\Exception\GuzzleException; 
// use GuzzleHttp\Psr7\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// vue welcome test page
Route::get('/vuewelcome',function(){
    return view('vuewelcome');
});

Route::get('/testclient',function(){
    return view('testclient');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




// Route::get('/auth/callback', function (Request $request) {
//     print_r($request->code);
//     exit;
// });

Route::get('/redirect', function (Request $request) {
    $request->session()->put('state', $state = Str::random(40));

    $query = http_build_query([
        'client_id' => '6',
        'redirect_uri' => 'http://127.0.0.1:8000/auth/callback',
        'response_type' => 'code',
        'scope' => '',
        'state' => $state,
    ]);

    return redirect('http://127.0.0.1:8000/oauth/authorize?'.$query);
});


// Route::get('/auth/callback', function (\Illuminate\Http\Request $request){
//     if ($request->get('code')) {
//         return 'Login Success';
//     } else {
//         return 'Access Denied';
//     }
// });



Route::get('/auth/callback', function (Request $request) {
    $state = $request->session()->pull('state');

    throw_unless(
        strlen($state) > 0 && $state === $request->state,
        InvalidArgumentException::class
    );

    $http = new GuzzleHttp\Client;

    $response = $http->post('http://127.0.0.1:8000/oauth/token', [
            'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => '6',  // your client id
            'client_secret' => 'IPe9yXDTFr4IKbdwYmdprSxMjAz8JLzqVYGz1px4',   // your client secret
            'redirect_uri' => 'http://127.0.0.1:8000/auth/callback',
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});


