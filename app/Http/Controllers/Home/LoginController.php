<?php

namespace App\Http\Controllers\home;

use App\Model\Home\User;
use App\Model\Home\Userinfo;
use App\Model\Home\V_user;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//验证码
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

use Validator;
use Illuminate\Support\Facades\Hash;

use Session;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
   public function login()
   {
      return view('home.login');
   }

    public function dologin(Request $request)
    {
        $input=$request->except('_token');
        $user=V_user::where('user_name','=',$input['name'])->first();
        if(!$user){
            $user=V_user::where('email','=',$input['name'])->first();
            if(!$user){
                $user=V_user::where('phone','=',$input['name'])->first();
            }
        }
        //验证码判断,开发阶段不启用
//         if($input['homeCode']!=session('homeCode')){
//             return redirect('home/index/0')->with('errors','验证码输入错误')->withInput();
//         }

        if(!$user){
            return '用户名不存在';
        }

        if(!Hash::check($input['passwd'],$user->user_password)){
            return '密码不正确';
        }

        //登录成功,维护最后登录ip和时间,设置后台登录session
        $ip = $request->getClientIp();
        $time=date("Y-m-d",time());
        $user=$user->toArray();

        session(['homeUser'=>$user,'homeFlag'=>'true']);
        session(['user'=>$user,'userinfo'=>$user]);
        User::where('user_id','=',$user['user_id'])->update(['last_login_ip'=>$ip,'last_login_time'=>$time]);
        return '/home/u/index';
    }
    //退出登录
    public function logout()
    {
        session(['homeUser'=>'','homeFlag'=>'']);
        return redirect('home/index');
    }

   //注册
    function register()
    {
        return view('home.register.register');
    }

    //ajax上传头像
    public function upload(Request $request)
    {
        $file = Input::file('file_upload');
        if ($file->isValid()) {
            $entension = $file->getClientOriginalExtension();
            $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;

            $file->move(public_path() . '\uploads', $newName);
            $path = '/uploads/' . $newName;
            return $path;
        }
    }
    //ajax上传多头像
    public function uploads(Request $request)
    {
        $files = Input::file('file_upload');
        $path=[];
        foreach($files as $file){
            if ($file->isValid()) {
                $entension = $file->getClientOriginalExtension();
                $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;

                $file->move(public_path() . '\uploads', $newName);
                $path[] = '/uploads/' . $newName;

            }
        };
        return json_encode($path);

    }
    //注册信息上传服务器
    public function doregister(Request $request)
    {

        $input = $request->except(['_token','checkbox','button','file_upload']);
        $user=User::where('user_name','=',$input['user_name'])->first();
        //验证码判断,开发阶段不启用
        // if($input['homeCode']!=session('homeCode')){
        //     return redirect('home/login')->with('errors','验证码输入错误')->withInput();
        // }

        $rule=[
            'user_name'=>'required|unique:t_user|between:2,20',
            'nick_name'=>'required|between:2,20',
            'phone'=>'required|unique:t_user_info|regex:[1[34578]\d{9}]',
            'email'=>'required|unique:t_user_info|regex:[(([a-z0-9]*[-_]?[a-z0-9]+[-_.]?)+@([a-z0-9]*[-_]?[a-z]+)+[\.][a-z0-9]{2,3}([\.][a-z]{1,3})?)]',
            //'user_headpic'=>'required',
            'user_password'=>'required|between:6,20',
            'userRpass'=>'required|same:user_password',

        ];
        $msg = [
            'user_name.required'=>'必须输入用户名',
            'user_name.unique'=>'用户名已存在',
            'user_name.between'=>'用户名必须在4-20位之间',
            'nick_name.required'=>'必须输入昵称',
            'nick_name.between'=>'昵称必须在2-20位之间',
            'phone.required'=>'必须输入手机号',
            'phone.unique'=>'手机号已存在,如忘记账号请联系管理员找回',
            'phone.regex'=>'请输入正确的手机号',
            'email.required'=>'必须输入邮箱号',
            'email.unique'=>'邮箱号已存在,如忘记账号请联系管理员找回',
            'email.regex'=>'请输入正确的电子邮箱',
            //'user_headpic.required'=>'请上传头像',

            'user_password.required'=>'必须输入密码',
            'user_password.between'=>'密码应在6-20位之间',
            'userRpass.required'=>'必须再次输入密码',
            'userRpass.same'=>'两次密码必须相同'
        ];
        $validator = Validator::make($input,$rule,$msg);
        if ($validator->fails()) {
            return redirect('home/reg')->withErrors($validator)->withInput();
        }

        $user=array(
            'user_id'=>md5(time()+rand(1,100)),
            'user_name'=>$input['user_name'],
            'user_password'=>Hash::make($input['user_password']),
            'user_level'=>1
            );
        $birth=$input['year'].'-'.$input['month'].'-'.$input['date'];
        if(!isset($input['region3'])){
            $input['region3']='';
        }
        $userinfo=array(
            'user_id'=>$user['user_id'],
            'nick_name'=>$input['nick_name'],
            'user_headpic'=>$input['user_headpic'],
            'email'=>$input['email'],
            'phone'=>$input['phone'],
            'region1'=>$input['region1'],
            'region2'=>$input['region2'],
            'region3'=>$input['region3'],
            'user_birth'=>$birth
        );
        $res1=User::create($user);
        $res2=Userinfo::create($userinfo);
        if($res1 && $res2){
            return redirect('/');
        }else{
            return redirect('home/reg')->with('errors','添加失败')->withInput();
        }
    }




   public function captcha($tmp)
    {


        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(220, 210, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        session(['homeCode'=>$phrase]);
        // 生成图片
        header("Content-Type:image/jpeg");
        header("Cache-Control: no-cache, must-revalidate");

        $builder->output();
    }
}
