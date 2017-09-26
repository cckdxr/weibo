<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    
});
//登录路由
Route::get('/admin/login',"Admin\LoginController@login");
Route::post('/admin/dologin',"Admin\LoginController@dologin");
//验证码路由
Route::get('/captcha/{tmp}', 'Admin\LoginController@captcha');

//后台首页
Route::get('/admin/index',"Admin\IndexController@index");
Route::get('admin/info','Admin\IndexController@info');

