<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//测试
Route::get('/test/index','Test\TestController@index');

//用户页面
Route::get('/user/index','User\UserController@index');

//注册
Route::get('/user/register','User\UserController@regview');
Route::post('/user/register','User\UserController@reg');

//登录
Route::get('/user/login','User\UserController@loginview');
Route::post('/user/login','User\UserController@login');

//个人中心
Route::get('/user/center','User\UserController@center');

//退出登录
Route::get('/user/quit','User\UserController@quit');
