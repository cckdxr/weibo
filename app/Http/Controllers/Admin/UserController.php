<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


//model
require(app_path().'\Http\Model\adminuser.php');
use App\Http\Model\adminuser;
//引入Model的user表
require(app_path().'\Http\Model\user.php');
use App\Http\Model\user;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use App\Services\OSS;
class UserController extends Controller
{
//显示首页

    function index()
    {
        return view('admin.login.index');
    }
//前台用户列表
    function userlist()
    {
        //显示分页
        $res = user::paginate(1);
        // dd($res);
        // echo count($res); 数组元素个数
        return view('admin.user.userlist',['res'=>$res]);
    }

    //后台用户列表
     function users()
    {

        //显示分页
        $res = adminuser::paginate(3);
        // dd($res);
        // echo count($res); 数组元素个数
        return view('admin.user.users',['res'=>$res]);
    }

    function repwd()
    {
        return view('admin.user.repwd');
    }

    function dopwd(request $request)
    {
        $input = $request->except('_token');
//----------------------------------验证是否为空-------------------------------
        //后台模板默认有为空的判断
        $rule=[
            'passwd'=>'required',
            'repasswd'=>'required|between:6,16',
            'agrepwd'=>'required|same:repasswd'
        ];
        $msg = [  
            'passwd.required'=>'请输入密码',
            'repasswd.required'=>'请输入新密码',
            'repasswd.between'=>'新密码必须在6-16位之间',
            'agrepwd.required'=>'请输入确认密码',
            'agrepwd.same'=>'确认密码必须和新密码一致'
        ];
//        进行手工表单验证
        $validator = Validator::make($input,$rule,$msg);
//        如果验证失败
        if ($validator->fails()) {
            return redirect('admin/repwd')
                ->withErrors($validator)
                ->withInput();
        }
//验证原密码

        if(!Hash::check($input['passwd'],session('user')['user_password'])){
            return view('admin.user.repwd')->with('errors','密码不正确');
        }

        $repwd = Hash::make($input['repasswd']);
//        echo $repwd;
//通过id数据库一条信息
        $data = adminuser::find(session('user')['order']);
        $data->user_password=$repwd;
        $res = $data->save();
        if($res)
        {
            return view('admin.user.login');
        }else{
            return view('admin.user.repwd')->with('errors','修改失败');
        }
    }
//用户上传头像页,修改个性签名页
    function userInfo()
    {
        return view('admin.user.userInfo');
    }

//无刷新上传
    function upload()
    {
       // dd(123123123213213);
        //获取上传的文件对象
        $file = Input::file('upload');
        // return $file;
        //判断文件是否有效
        if($file->isValid()){
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            }
//这是本地上传
            $path = $file->move(public_path().'/uploads',$newName);
//存图片的目录
            $filepath = 'uploads/'.$newName;
            //返回文件的路径
//            dd($filepath); 
//把pic信息存入数据库
               
//            return $file;
        
            //获取图片临时文件的地址
            //存阿里云服务器(暂时不知道怎么缩放)
        // $pics=$file->getRealPath();
        // OSS::upload($newName,$pics);
        // $filepath=OSS::getUrl($newName);
        // //通过session存的值查数据库
        $pic = adminuser::find(session('user')['order']);
           
            $pic->photo=$filepath;
            $data = $pic->save();
            if($data)
            {
             $res = adminuser::find(session('user')['order']);
             $res = $res->toArray();
            session(['user'=>$res]);
            }
        return  $filepath;
    }
    
//这是有刷新滴
    // function doUserInfo(Request $request)
    // {
        // $file = $request->file('upload');
       //  echo '<pre>';
       // var_dump($_FILES);
     //给上传的图片一个唯一的名字
        // $fileName = time().md5($_FILES['upload']['name']).$_FILES['upload']['name'];
        // echo $fileName;
        // dd();
        // echo base_path();这个是项目所在路径
        //echo app_path(); C:\xampp\htdocs\lamp189\app
//上传文件
        // $request->file('upload')->move(base_path().'\public\admin\upload\\', $fileName);
        // $path = base_path().'\public\admin\upload\\'.$fileName;
        // return $path;
    // }
//上图片缩放(本地可以缩放,上传第三方不知道怎么缩放,我再想办法)
    function zoom()
    {   
// array(1) {
//   ["upload"]=>
//   array(5) {
//     ["name"]=>
//     string(13) "500153308.jpg"
//     ["type"]=>
//     string(10) "image/jpeg"
//     ["tmp_name"]=>
//     string(24) "C:\xampp\tmp\phpDA8B.tmp"
//     ["error"]=>
//     int(0)
//     ["size"]=>
//     int(417699)
// //   }
// // }
    //新图像的宽度
    $nWidth = 32;
    //新图像的高度
    $nHeight = 32;

    //创建新的图像资源

    //创建老图像的资源
    $oImg = imagecreatefromjpeg(session('user')['photo']);
    //老图像的宽度
    $oWidth = imagesx($oImg);
    //老图像的高度
    $oHeight = imagesy($oImg);

    //进行等比例缩放
    // if ($nWidth && ($oWidth < $oHeight)) {
    //     $nWidth = ($nHeight / $oHeight) * $oWidth;
    // } else {
    //     $nHeight = ($nWidth / $oWidth) * $oHeight;
    // }
     //创建新的图像资源
 $nImg = imagecreatetruecolor($nWidth, $nHeight);
    //进行处理
    imagecopyresampled($nImg,$oImg,0,0,0,0,$nWidth,$nHeight,$oWidth,$oHeight);

    // echo $nWidth.'========'.$nHeight;
    //保存
    imagejpeg($nImg,session('user')['photo']);

    //销毁资源
    imagedestroy($nImg);
    imagedestroy($oImg);

    return redirect('admin/userinfo');
       

    }

    function msg(Request $request)
    {
        $data = $request->except('_token');
        // dd($data);

         $msg = adminuser::find(session('user')['order']);
           
            $msg->user_msg=$data['mes'];
            $data = $msg->save();
            if($data)
            {
             $res = adminuser::find(session('user')['order']);
             $res = $res->toArray();
            session(['user'=>$res]);
            }
         return redirect('admin/userinfo');
    }

    // function filetest(){
    //  \Storage::disk("local")->put('file.txt','contents');   
    // }

    function useradd()
    {
        return view('admin.user.addAdminUser');
    }

    function douseradd(Request $request)
    {
        $data = $request->except('_token');

            $rule=[
            'user_name'=>'required',
            'user_password'=>'required',
            'user_level'=>'between:1,4',
        ];

        $msg = [
            'user_name.required'=>'用户名必须输入',
            'user_password.required'=>'密码必须输入',
            'user_level.between'=>'请赋予管理员权限'    
        ];
//        进行手工表单验证
        $validator = Validator::make($data,$rule,$msg);
//        如果验证失败
        if ($validator->fails()) {
            return redirect('/admin/useradd')
                ->withErrors($validator)
                ->withInput();
        }
        //密码加密
        $data['user_password']=Hash::make($data['user_password']); 
        //随机时间戳安全着想
        $data['user_id']=md5(time());

        // var_dump($data);

         $res = adminuser::create($data); 
         if(!$res)  
         {  
             return redirect('/admin/useradd')->with('error','添加失败');
         }else{  
             return redirect('/admin/users');
         }  


    }
}

