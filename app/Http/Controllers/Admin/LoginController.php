<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
//控制器
use App\Http\Controllers\Controller;
//哈希
use Illuminate\Support\Facades\Hash;
//model
require(app_path().'\Http\Model\adminuser.php');
use App\Http\Model\adminuser;
//引入前台user表
require(app_path().'\Http\Model\user.php');
use App\Http\Model\user;
//引入表单验证
use Illuminate\Support\Facades\Validator;
//引入验证码
require(app_path().'\Http\Org\Code\code.php');
use App\Http\Org\Code\code;

//引入Session
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    function login()
    {
        // session(['user'=>'adfad']);
        return view('admin.login.login');
       // echo session('user');

//      dd(session('user')['user_name']);
        // return Hash::make('admin');

    }

    function yzm()
    {
        $_vc = new code();      //实例化一个对象
        $_vc->doimg();
    }
    
    function dologin(Request $request)
    {
        //获取登录表单的值

        $input = $request->except('_token');

//----------------------------------验证是否为空-------------------------------
        //后台模板默认有为空的判断
        $rule=[
            'username'=>'required',
            'passwd'=>'required',
        ];

        $msg = [
            'username.required'=>'用户名必须输入',
            'passwd.required'=>'密码必须输入'
        ];
//        进行手工表单验证
        $validator = Validator::make($input,$rule,$msg);
//        如果验证失败
        if ($validator->fails()) {
            return redirect('admin/login/login')
                ->withErrors($validator)
                ->withInput();
        }
//----------------------------------验证-------------------------------
        //获取相对应的用户信息
       $res = adminuser::where('user_name',$input['username'])->first();

     

       //  echo '<pre>';
       //  var_dump($res);
       // //取数据
        // echo $res->user_name;
       if(!$res)
       {
            return view('admin.login.login')->with('errors','用户不存在');
       }

       //验证密码
        if(!Hash::check($input['passwd'],$res->user_password)) {
            return view('admin.login.login')->with('errors','密码输入错误');
        }
        
        //验证码验证
        if(strtolower($input['yzm'])!=strtolower(session('code')))
        {
            return view('admin.login.login')->with('errors','验证码错误');
        }
        //记录登录的后台用户名
//      session(['user'=>$input['username']]);存一个登录用户名
          //把用户最后登录的时间写入
        

        $user = adminuser::find($res->order);

        $user->last_login_time= time();
        $user->last_login_ip=$_SERVER['REMOTE_ADDR'];
        $data = $user->save();
//        session存model数组
        $res = $res->toArray();
        session(['user'=>$res]);
//        dd(session('user')['user_name']);取

//验证通过后显示后台首页
//       header('refresh:1,url=/admin/index');
//        echo '正在登陆中......';
         return view('admin.login.index');
      
    }

    function outlogin(Request $request)
    {
        $request->session()->flush();
        header('refresh:1,url=/admin/login');
        echo '正在退出登录......'; 
    }







    


}
