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

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
	//后台首页
	Route::get('/index',"IndexController@index");

	//后台用户资源控制器路由
	Route::resource('/user',"UserController");

	//后台管理前台用户
	Route::get('/homeuser',"UserController@table");
});

