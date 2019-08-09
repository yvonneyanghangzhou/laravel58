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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

/**
 * 我们为路由添加了一个 prefix 属性方便我们后续管理 API 的版本
 * 同时为群组路由设置了中间件 auth:api，意味着该群组中的所有路由都需要用户认证后才能访问
 */
Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function(){
    Route::get('/user', function( Request $request ){
        return $request->user();
    });
    Route::get('/cafes', 'API\CafesController@getCafes');
    Route::get('/cafes/{id}', 'API\CafesController@getCafe');
    Route::post('/cafes', 'API\CafesController@postNewCafe');
});
