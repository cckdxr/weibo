<?php

namespace App\Http\Controllers\Home;

use App\Model\Home\Msg_user;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Http\Model\user_info;

use App\Http\Model\msg_field;

use App\Http\Model\user_relation;



use Illuminate\Support\Facades\Hash;

use App\Http\Model\user;

class InfoController extends Controller
{
    
    function homepage()
    {

        //个人中心
        $id = session('homeUser')['user_id'];
        $messages=Msg_user::where('author_id',$id)
            ->orderBy('time','desc')
            ->take(10)
            ->get();
        $arrlen=count($messages,0);
        return view('home.center.myhomepage',['len'=>$arrlen,'messages'=>$messages]);
    }

    function myinfo()
    {
        //个人详情iframe
        return view('home.center.myinfo');
    }

    function info()
    {
        //个人详情
        return view('home.center.info');
    }
    function myatt()
    {
       

        //遍历分组
        $data = msg_field::orderBy('field_id','asc')->take(5)->get();
        $res = msg_field::orderBy('field_id','desc')->take(4)->get();
        // dd($res);
        //从session中取当前id
        $userid = session('userinfo')['user_id'];
        //获取关注者   1是关注他的  2 是他关注的
        $attention = user_relation::where('user_id',$userid)->where('type',2)->get();
        //然后获取关注者信息
        $fans = user_relation::where('user_id',$userid)->where('type',1)->get();
        $array = [];
        for($i=0;$i<count($attention);$i++)
        {
            //获取所有的关注者
            $array[]=user_info::where('user_id',$attention[$i]->follow_id)->first();


        }

        return view('home.center.myatten',['data'=>$data,'res'=>$res,'attention'=>$array,'fans'=>$fans]);
    }
    //关注分类
    function fanstype($id)
    {
        //获取分类
        $data = msg_field::orderBy('field_id','asc')->take(5)->get();
        $res = msg_field::orderBy('field_id','desc')->take(4)->get();

        return view('home.center.fanstype',['data'=>$data,'res'=>$res]);
    }
    //取消关注
    function doatt()
    {
        //获取id从用户关系数据库中删除
        $res = user_relation::where('follow_id',$_POST['id'])
        ->where('user_id',session('userinfo')['user_id'])
        ->where('type',2)
        ->delete();

        if($res)
        {
            return 1;
        }else{
            return 0;
        }

    }
function fans()
{
        $data = msg_field::orderBy('field_id','asc')->take(5)->get();
        $res = msg_field::orderBy('field_id','desc')->take(4)->get();
        // dd($res);

        //获取关注者
       
        //从session中取当前id
        $userid = session('userinfo')['user_id'];
        //获取粉丝
        $fans = user_relation::where('user_id',$userid)->where('type',1)->get();
        //然后获取粉丝信息
        $attention = user_relation::where('user_id',$userid)->where('type',2)->get();
        $array = [];
        for($i=0;$i<count($fans);$i++)
        {
            $array[]=user_info::where('user_id',$fans[$i]->follow_id)->first();
        }
     
        return view('home.center.fans',['data'=>$data,'res'=>$res,'fans'=>$array,'attcount'=>$attention]);
}
//删除粉丝
function delfans()
{
    $data = user_relation::where('user_id',session('userinfo')['user_id'])
    ->where('follow_id',$_POST['id'])
    ->where('type',1)
    ->delete();
    if($data)
    {
        return 1;
    }else{
        return 0;
    }
}
//关注粉丝
function attfans()
{
    //粉丝id
    
    //用户userid
    $userid=session('userinfo')['user_id'];
    //先用户有没有关注该粉丝
    $datas = user_relation::where('user_id',$userid)
    ->where('type',2)->get();
    // 遍历
    for($i=0;$i<count($datas);$i++)
    {
        if($datas[$i]->follow_id == $_POST['id'])
        {
            return 0;
        }
        
    }

    $data = new user_relation();
    $data->follow_id=$_POST['id'];
    $data->user_id=$userid;
    
    $data->type=2;
    $res = $data->save();
    if($res)
    {
        return 1;
    }
}
    function mypic()
    {
        //我的相册
        return view('home.center.mypic');
    }

    function reinfo(request $request)
    {
        //修改详情页的数据
        $data = $request->except('_token');

        $res = user_info::find(session('userinfo')['user_id']);

        $res=$res->update($data);

        if($res)
        {
            $info = user_info::where('user_id',session('userinfo')['user_id'])->first();

            $info = $info->toArray();

            session(['userinfo'=>$info]);

            return 1;
        }else{

            return 0;
        }

    }
    function dobaseinfo()
    {

        $res = user_info::find(session('userinfo')['user_id']);

        $res->truename = $_POST['truename'];

        $res->sex = $_POST['sex'];

        $res->blood = $_POST['blood'];

        $res->blogaddress = $_POST['blog'];

        $res->info = $_POST['info'];

        $res->born = $_POST['birth'];

        $res->emotion = $_POST['love'];

        $result = $res->save();
        if($result)
        {
            $info = user_info::where('user_id',session('userinfo')['user_id'])->first();

            $info = $info->toArray();

            session(['userinfo'=>$info]);
            return 1;
        }else{
            return 0;
        }

    }

    function repwd()
    {
        return view('home.center.repwd');
    }
    //修改密码
    function dorepwd()
    {
        //接受客户端传来的原密码
        $oldpwd = $_POST['oldpwd'];
        //验证客户端传来的密码
        $old= Hash::check($oldpwd,session('user')['user_password']);

        //验证与数据库是否匹配
            if($old){

                    $npw = $_POST['nowpwd'];
                    //加密新密码

                    $npw = Hash::make($npw);
                    //通过id确认修改目标

                    $user = user::find(session('user')['user_id']);
                    $user->user_password = $npw;
                   $res = $user->save();
                    if($res)
                    {
                        return 1;
                    }else{
                        return 0;
                    }
            }else{

                return '密码不正确';
            }

    }
}
