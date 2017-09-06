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

// for all to see
Route::get('hero', 'HeroesController@index');
Route::get('hero/{hero}', 'HeroesController@show');
Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::get('login', 'Auth\LoginController@login');

//TODO: Fix login bug
Route::post('logout', 'Auth\LoginController@logout');
Route::post('hero/{name}', 'HeroesController@create'); //Maybe name should go in the body?
Route::put('hero/{id}', 'HeroesController@update');
Route::delete('hero/{id}', 'HeroesController@delete');

//Only for the registered
//TODO: Fix login bug
/*
Route::group(['middleware' => 'auth:api'], function() {
  Route::post('hero/{name}', 'HeroesController@create'); //Maybe name should go in the body?
  Route::put('hero/{id}', 'HeroesController@update');
  Route::delete('hero/{id}', 'HeroesController@delete');
});
*/
