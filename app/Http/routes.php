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

//测试中间件
//Route::group(['prefix'=>'home','namespace'=>'home','middleware'=>'homelog'],function(){
//    Route::get('/test','IndexController@test');
//});

////原灵步首页
//Route::get('/test1', function () {
//    return view('home.index2');
//});
//后台登录路由
//Route::get('/admin/login',"Admin\LoginController@login");
//Route::post('/admin/dologin',"Admin\LoginController@dologin");
//Route::get('/admin/logout',"Admin\LoginController@logout");
////后台验证码路由
//Route::get('/captcha/{tmp}', 'Admin\LoginController@captcha');
//
//Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
//	//后台首页
//	Route::get('/index',"IndexController@index");
//
//	//后台用户资源控制器路由
//	Route::resource('/user',"UserController");
//	//后台修改密码
//	Route::get('/repassword',"UserController@repassword");
//	Route::post('/dorepassword',"UserController@dorepassword");
//
//	//后台管理前台用户
//	Route::get('/homeuser',"UserController@homeusershow");
//});
//huang
//后台登录路由,'middleware'=>'islogin'
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'islogin'],function(){

//用户列表
    Route::get('userlist','UserController@userlist');
//后台首页
    Route::get('index','UserController@index');
//后台用户列表
    Route::get('users','UserController@users');
//后台修改密码页面
    Route::get('repwd','UserController@repwd');
//验证密码
    Route::post('dopwd','UserController@dopwd');
//上传头像,修改签名
    Route::get('userinfo','UserController@userInfo');
//更新数据库,存头像和签名
    Route::post('douserinfo','UserController@doUserInfo');
//上传图像
    Route::post('upload','UserController@upload');
    //图片缩放
    Route::post('zoom','UserController@zoom');
    //修改签名
    Route::post('msg','UserController@msg');
    //添加用户
    Route::get('useradd','UserController@useradd');
    //添加用户至数据库
    Route::post('douseradd','UserController@douseradd');
//网站配置
    Route::get('conf','ConfController@conf');
//网站配置修改
    Route::post('doconf/{id}','ConfController@doconf');
});
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
//登录及其验证码
    Route::get('login','LoginController@login');
    Route::get('yzm','LoginController@yzm');
    Route::post('dologin','LoginController@dologin');
//退出登录
    Route::get('outlogin','LoginController@outlogin');

});


//前台登陆后路由
Route::group(['prefix'=>'home','namespace'=>'Home',],function() {
//前台登录前
//验证码路由
    Route::get('captcha/{tmp}', 'LoginController@captcha');
    Route::post('doregister', 'LoginController@doregister');
//登录路由
    Route::post('dologin', 'LoginController@dologin');
//头像上传
//Route::post('/home/upload','Home\LoginController@upload');
//多图片上传
    Route::post('uploads', 'LoginController@uploads');
//前台登录前路由
    Route::get('index', function () {
        return redirect('/home/index/0');
    });
    Route::get('index/{field_id}', 'IndexController@index');
//获取更多tips
    Route::get('more', 'IndexController@moretips');


    //黄路由

//前台首页
//    Route::get('index','IndexController@index');
//分类微博
//    Route::get('headline/{id}','IndexController@headline');
//验证成功后显示页面
//    Route::get('loginafter','IndexController@loginafter');

//	注册完善资料!!!
    Route::post('fullinfo','FullinfoController@fullinfo');
//验证用户
    Route::post('dofullinfo','FullinfoController@dofullinfo');
//用户信息存数据库
    Route::post('insertinfo','FullinfoController@insertinfo');
//用户详情页的无刷新修改
    Route::post('reinfo','InfoController@reinfo');
//用户基本信息修改
    Route::post('dobaseinfo','InfoController@dobaseinfo');
//详情页中取消关注
    Route::post('doattention','homepageController@doattention');
//详情页中关注
    Route::post('att','homepageController@att');
//注册页兴趣
    Route::post('dointerest','FullinfoController@dointerest');
//修改兴趣页
    Route::get('changefield','FullinfoController@changefield');


});
//前台登陆后路由
Route::group(['prefix'=>'home','namespace'=>'Home','middleware'=>'homelog'],function(){
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
    //评论路由
    Route::get('u/dodis','CollectController@adddis');
    //删除评论路由
    Route::get('u/deldis','CollectController@deldis');
    //转发路由
    Route::get('u/dotran','CollectController@dotran');
    //user主页获取更多
    Route::get('u/more','UserIndexController@moretips');
    //他人主页获取更多
    Route::get('u/homemore','HomepageController@moretips');
    //我的收藏路由
    Route::get('u/mycollect','UserIndexController@mycollect');
    //我的点赞路由
    Route::get('u/mypraise','UserIndexController@mypraise');
    //我评论过路由
    Route::get('u/myreply','UserIndexController@myreply');
    //我发的微博
    Route::get('u/mywb','UserIndexController@mywb');
    //举报路由
    Route::post('jubao','CollectController@jubao');
    //删除路由
    Route::post('delete','CollectController@delete');


    //huang路由
//注册页面
    Route::get('reg','IndexController@register');
//手机号
    Route::get('donumber','IndexController@donumber');
//短信验证
    Route::post('doreg','IndexController@doreg');
//个人首页
    Route::get('homepage','InfoController@homepage');
//用户资料
    Route::get('myinfo','InfoController@myinfo');
//个人相册
    Route::get('mypic','InfoController@mypic');
//我的粉丝
    Route::get('myatt','InfoController@myatt');
//个人详情页面
    Route::get('info','InfoController@info');
//修改密码
    Route::get('repwd','InfoController@repwd');
//处理密码
    Route::post('dorepwd','InfoController@dorepwd');
//退出登录
    Route::get('out','IndexController@out');
//粉丝分组
    Route::get('fanstype/{id}','InfoController@fanstype');
//取消关注
    Route::post('doatt','InfoController@doatt');
//粉丝页
    Route::get('fans','InfoController@fans');
//移除粉丝
    Route::post('delfans','InfoController@delfans');
//关注粉丝
    Route::post('attfans','InfoController@attfans');
//背景图片
    Route::get('bgimg','BackGroundController@bgimg');
//操作背景图片
    Route::post('doimg','BackGroundController@doimg');
    //个人相册
    Route::get('picindex','PicController@picindex');
//照片处理
    Route::post('dopic','PicController@dopic');
//详情页
    Route::get('homepages/666666{id}','homepageController@homepages');


});


