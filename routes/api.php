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


Route::group(['middleware' => ['api_token']], function () {

    Route::get('articles/{id}', 'article_controller@index');

});



Route::post('create/article', 'article_controller@store');   


Route::post('/login', 'LoginController@show');


Route::post('/register', 'LoginController@store');