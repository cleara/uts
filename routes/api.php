<?php

use Illuminate\Http\Request;

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

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@login');

//Route::get('mobil', 'MobilController@mobil');
//Route::get('mobilAll', 'MobilController@mobilAuth')->middleware('jwt.verify');
//Route::get('user', 'UserController@getAuthenticatedUser')->middleware('jwt.verify');

Route::middleware(['jwt.verify'])->group(function(){
    Route::get('/mobil', 'MobilController@index');
    Route::get('/mobil/{id}', 'MobilController@show');
    Route::post('/mobil', 'MobilController@store');
    Route::put('/mobil/{id}', 'MobilController@update');
    Route::delete('/mobil/{id}', 'MobilController@destroy');
});