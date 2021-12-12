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
Route::get('/question' , 'QuestionController@index');
Route::get('/question/{id}' , 'QuestionController@show');
Route::delete('/question/{id}' , 'QuestionController@destroy');
Route::post('/question' , 'QuestionController@store');
Route::patch('/question/{id}' , 'QuestionController@update');
Route::get('/category' , 'CategoryController@index');
Route::post('/category' , 'CategoryController@store');
Route::delete('/category' , 'CategoryController@destroy');
Route::patch('/category/{id}' , 'CategoryController@update');
Route::get('/question/{id}/reply' , 'ReplyController@index');
Route::get('/question/reply/{rid}' , 'ReplyController@show');
Route::post('/question/reply' , 'ReplyController@store');
Route::delete('/question/reply/{id}' , 'ReplyController@destroy');
Route::patch('/question/reply/{id}' , 'ReplyController@update');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
