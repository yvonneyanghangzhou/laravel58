<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'Web\AppController@getApp')
    ->middleware('auth');

Route::get('/login', 'Web\AppController@getLogin' )
    ->name('login')
    ->middleware('guest');
//{social} 参数代表所使用的 OAuth 提供方，比如我们这里使用的是 github，Socialite 会根据这个参数值去 config/services.php 中获取对应的 OAuth 配置信息。
Route::get( '/auth/{social}', 'Web\AuthenticationController@getSocialRedirect' )
    ->middleware('guest');

Route::get( '/auth/{social}/callback', 'Web\AuthenticationController@getSocialCallback' )
    ->middleware('guest');