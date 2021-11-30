<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->namespace('Api\v1')->group(function (){
    Route::get('/courses','CourseController@index');
    Route::get('/courses/{course}','CourseController@single');
    Route::post('/courses','CourseController@store');

    Route::post('/login','UserController@login');
    Route::post('/register','UserController@register');

    Route::middleware('auth:api')->group(function (){
        Route::get('/user',function (){
            return auth()->user();
        });

        Route::post('/comment','CommentController@store');

        Route::post('upload/image','UploadController@image');
        Route::post('upload/file','UploadController@file');
    });
});

Route::prefix('v2')->namespace('Api\v2')->group(function (){
    Route::get('/courses','CourseController@index');
    Route::get('/courses/{course}','CourseController@single');

    Route::middleware('auth:api')->group(function (){
        Route::post('/courses/buy/{course}','BuyController@buy');
        Route::get('courses/buy/callback','BuyController@callback');
    });
});

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
