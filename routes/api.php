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

Route::get('/posts', 'RESTfulController@index')->name('posts.all');
Route::get('/posts/{postId}', 'RESTfulController@show')->name('posts.show');
Route::post('/posts', 'RESTfulController@store')->name('posts.store');
Route::put('/posts/{postId}', 'RESTfulController@update')->name('posts.update');
Route::delete('/posts/{postId}', 'RESTfulController@destroy')->name('posts.destroy');
