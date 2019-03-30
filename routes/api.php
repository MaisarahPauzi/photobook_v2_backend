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
Route::get('/todo', 'todoController@index');
Route::get('/todo/{id}', 'todoController@show');
Route::post('/todo', 'todoController@store');
Route::put('/todo/{id}', 'todoController@update');
Route::delete('/todo/{id}', 'todoController@destroy');

Route::get('/photobook', 'photobookController@index');
Route::get('/photobook/{id}', 'photobookController@show');
Route::post('/photobook', 'photobookController@store');
Route::put('/photobook/{id}', 'photobookController@update');
Route::delete('/photobook/{id}', 'photobookController@destroy');

Route::post('/upload', 'photobookController@upload');
Route::delete('/delPhoto/{dfile}', 'photobookController@del');
