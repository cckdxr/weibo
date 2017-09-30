<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

//验证码
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
//model类
use App\Model\Admin\User;
use Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function dologin(Request $Request)
    {
        $input=$Request->except('_token');        
        
        $user=User::where('user_name','=',$input['user_name'])->first();
       //验证码判断,开发阶段不启用
        // if($input['adminCode']!=session('adminCode')){
        //     return redirect('admin/login')->with('errors','验证码输入错误')->withInput();
        // }

        if(!$user){
            return redirect('admin/login')->with('errors','此用户不存在')->withInput();
        }

        if(!Hash::check($input['user_password'],$user->user_password)){
            return redirect('admin/login')->with('errors','密码错误')->withInput();
        }
        
        //登录成功,维护最后登录ip和时间,设置后台登录session
        $ip = $Request->getClientIp();
        $time=date("Y-m-d",time());
        $user=$user->toArray();
        session(['adminUser'=>$user,'adminFlag'=>'true']);
        User::where('user_name','=',$input['user_name'])->update(['last_login_ip'=>$ip,'last_login_time'=>$time]);
        return redirect('admin/index');

    }
    //退出登录
    public function logout(){
        session(['adminUser'=>'','adminFlag'=>'false']);
        return redirect('admin/login');
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
        Session::flash('adminCode', $phrase);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }
}
