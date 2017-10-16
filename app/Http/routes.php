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
Route::get('/login', "Home\IndexController@index");
Route::get('/test', function () {
    return view('home.register1');
});
//原灵步首页
Route::get('/test1', function () {
    return view('home.index2');
});
//后台登录路由
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
Route::get('/home/reg','Home\LoginController@register');
Route::post('/home/doregister','Home\LoginController@doregister');
//登录路由
Route::post('/home/dologin','Home\LoginController@dologin');



//头像上传
Route::post('/home/upload','Home\LoginController@upload');
//多图片上传
Route::post('/home/uploads','Home\LoginController@uploads');
//前台登录前路由
Route::get('/home/index',function(){
   return redirect('/home/index/0');
});
Route::get('/home/index/{field_id}','Home\IndexController@index');
//获取更多tips
Route::get('/home/more','Home\IndexController@moretips');


//前台登陆后路由
Route::group(['prefix'=>'home','namespace'=>'Home'],function(){
    //登录后用户主页
    Route::get('u/index','UserIndexController@index');
    //退出登录
    Route::get('logout','LoginController@logout');
    //发微博路由
    Route::post('u/postwb','MsgController@postwb');
    //收藏路由
    Route::get('u/docollect','CollectController@addCollect');

    //点赞路由
    Route::get('u/dolike','CollectController@addLike');


});

