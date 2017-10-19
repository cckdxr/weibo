<?php

namespace App\Http\Controllers\Home;

use App\Model\Home\Msg_user;
use App\Model\Home\V_user;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Http\Model\msg_field;


use App\Http\Model\user;

use App\Http\Model\user_info;

use Illuminate\Support\Facades\Hash;
class FullinfoController extends Controller
{
    
    function fullinfo(request $request)
    {
    	// echo $num,$pwd;

    //判断验证码是否正确

    if($_POST['code']!=session('code'))
    {
        return view('home.register.register')->with('error','* 验证码输入错误');
    }else{
      //   $data = user::all();
      //   foreach ($data as $key => $value) {

      //       if($value->user_phone == $num)
      //       {
      //           return view('home.register.fullinfo');
      //       }
      //   }
      //   //数据库不存在时存入数据库Hash::make($_POST['passwd']);

       $tel = Hash::make($_POST['passwd']);
       $user_id=md5(time()+rand(1,100));
	      $user = new User();
	      $user->user_id= $user_id;
          $user->user_phone = $_POST['number'];
         $user->user_password = $tel;
         $res = $user->save();
//创建一个用户的同时,创建一个用户信息
         $userinfo = new user_info();
         $userinfo->user_id= $user_id;
         $userinfo->phone= $_POST['number'];
         //用户注册首先默认随机一个头像
        $randpic=[
            '/uploads/201710161532173630.png',
            '/uploads/201710161532178500.png',
            '/uploads/201710161246201277.png',
            '/uploads/201710160946302154.png',
            '/uploads/201710161000148227.png'
            ];
         $userinfo->user_headpic=$randpic[array_rand($randpic)];

         $userinfo->save();

         return view('home.register.fullinfo');
     }

    	// 
    }

    function dofullinfo()
    {
        //查询数据库与用户填写的用户名进行匹配


        $data = user::all();


        foreach ($data as $key => $value) {

            if($_POST['nick'] == $value->user_name)
            {
                return 1;
            }
        }
        return 0;

    }

    function insertinfo(Request $request)
    {
        //array(7) { ["nickname"]=> string(10) "huangyuxin" ["year"]=> string(4) "2007" ["month"]=> string(1) "1" ["day"]=> string(1) "1" ["gender"]=> string(1) "m" ["province"]=> string(2) "34" ["city"]=> string(1) "1" }
        // $data = $request->except('_token');

        // $user = user::where('user_phone',session('phone'))->first();

        //     $user->user_name = 1234567;
        //     $res = $user->save();
        // echo session('phone');
        //获取用户生日信息  进行拼接

        $born = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
        //user表中添加一个加一个昵称即可
        $user = user::where('user_phone',session('phone'))->update(['user_name'=>$_POST['nickname']]);
        //info表中存用户输入的信息
        $info = user_info::where('phone',session('phone'))->update(['nick_name'=>$_POST['nickname'],'born'=>$born,'sex'=>$_POST['gender']]);





        $homeUser=V_user::where('phone',session('phone'))->first();
        $reguser = $homeUser->toArray();
        session(['homeUser'=>$reguser,'user'=>$reguser]);



        if($user && $info) {

            //显示首页的时候遍历导航栏
            //  $data = msg_field::orderBy('field_id','asc')->get();
            // return view('home.index.loginbefore',['data'=>$data]);
            // echo '注册成功,请登录.......';
            // header('refresh:2,url=/home/index');

            $field = msg_field::orderBy('field_id')->take(9)->skip(1)->get();

            return view('home.register.interest',['field'=>$field]);
        } else {
            return view('home.register.fullinfo');
        }


    }


    function dointerest()
    {


        $user = session('user')['user_id'];

        $field= $_POST['id'];


        $a=ltrim($field,'/');

        $info=user_info::where('user_id',$user)->update(['user_field' =>$a]);

        if($info)
        {
            return 1;
        }else{
            return 0;
        }
    }

    public function changefield()
    {
        $field = msg_field::orderBy('field_id')->take(9)->skip(1)->get();

        return view('home.register.interest',['field'=>$field]);
    }
}
