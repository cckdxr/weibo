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

Route::get('/', "Home\IndexController@index");
Route::get('/test', function () {
  return view('home.add');
});
//登录路由
Route::get('/admin/login',"Admin\LoginController@login");
Route::post('/admin/dologin',"Admin\LoginController@dologin");
Route::get('/admin/logout',"Admin\LoginController@logout");
//后台验证码路由
Route::get('/captcha/{tmp}', 'Admin\LoginController@captcha');

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
	//后台首页
	Route::get('/index',"IndexController@index");

	//后台用户资源控制器路由
	Route::resource('/user',"UserController");
	//后台修改密码
	Route::get('/repassword',"UserController@repassword");
	Route::post('/dorepassword',"UserController@dorepassword");	

	//后台管理前台用户
	Route::get('/homeuser',"UserController@homeusershow");
});

//前台
//验证码路由
Route::get('/home/captcha/{tmp}', 'Home\LoginController@captcha');
//注册路由
Route::get('/home/register','Home\LoginController@register');
Route::post('/home/doregister','Home\LoginController@doregister');

//头像上传
Route::post('/home/upload','Home\LoginController@upload');


//前台登陆后路由
Route::group(['prefix'=>'home','namespace'=>'Home'],function(){

	Route::get('/index','IndexController@index');
});

