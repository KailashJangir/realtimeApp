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
Route::group([
    'prefix' => 'auth'
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');

});


Route::get('/question' , 'QuestionController@index');
Route::get('/question/{question}' , 'QuestionController@show');
Route::delete('/question/{question}' , 'QuestionController@destroy');
Route::post('/question' , 'QuestionController@store');
Route::patch('/question/{question}' , 'QuestionController@update');
Route::get('/category' , 'CategoryController@index');
Route::get('/category/{category}' , 'CategoryController@show');
Route::post('/category' , 'CategoryController@store');
Route::delete('/category/{category}' , 'CategoryController@destroy');
Route::patch('/category/{category}' , 'CategoryController@update');
Route::get('/question/{question}/reply' , 'ReplyController@index');
Route::get('/question/{question}/reply' , 'ReplyController@show');
Route::post('/question/{question}/reply' , 'ReplyController@store');
Route::delete('/question/{question}/reply/{reply}' , 'ReplyController@destroy');
Route::patch('/question/{question}/reply/{reply}' , 'ReplyController@update');
Route::post('/like/{reply}' , 'LikeController@likeIt');
Route::delete('/like/{reply}' , 'LikeController@unLikeIt');
Route::post('/notifications' , 'NotificationController@index');
Route::post('/markAsRead' , 'NotificationController@markAsRead');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
