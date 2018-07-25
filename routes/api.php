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

Route::apiResource('task', 'TaskController');

Route::group(['prefix' => 'auth'], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');
});
    Route::post('register_user', 'AuthController@register');

    Route::get('/task_comments/{id}', 'TaskController@getTasksAndComments');


/*
* Social route
*/
Route::group(['middleware' => ['web']], function () {
    //facebook
    Route::get('auth/facebook', 'AuthController@redirectToProvider');
    Route::get('auth/facebook/callback', 'AuthController@handleProviderCallback');
    //Twitter
//    Route::get('auth/twitter', 'Auth\LoginController@redirectToTwitterProvider');
//    Route::get('auth/twitter/callback', 'Auth\LoginController@handleProviderTwitterCallback');
});