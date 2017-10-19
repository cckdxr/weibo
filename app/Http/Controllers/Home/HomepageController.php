<?php

namespace App\Http\Controllers\Home;

use App\Model\Home\Msg_user;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\user;

use App\Http\Model\user_info;

use App\Http\Model\msg_field;

use App\Http\Model\user_relation;
use App\Http\Model\msg_info;
use App\Model\Home\V_user;

class HomepageController extends Controller
{
    //关注者首页
    function homepages($id){
        //遍历数据库取数据

        $data =V_user::where('user_id',$id)->first();
        //判断是否互相关注 获得id的用户 与session中的用户查询

        $a = session('userinfo')['user_id'];

        $attention = user_relation::where('user_id',$id)->where('type',2)->count();
        //然后获取关注者信息
        $fans = user_relation::where('user_id',$id)->where('type',1)->count();

        //获取微博条数
        $infos = msg_info::where('author_id',$id)->count();


        //已经关注了  就看此id是否关注他了
        $nowuser = user_relation::where('user_id',$a)
        ->where('follow_id',$id)
        ->where('type',2)
        ->first();
        // dd($nowuser);


        $messages=Msg_user::where('author_id',$id)
            ->orderBy('time','desc')
            ->take(10)
            ->get();
        $arrlen=count($messages,0);

        if($nowuser)
        {
          return view('home.homepage.homepage',['data'=>$data,'flag'=>1,'name'=>$id,'attention'=>$attention,'fans'=>$fans,'infos'=>$infos,'messages'=>$messages,'len'=>$arrlen]);//flag 1 是关注
        }else{
           return view('home.homepage.homepage',['data'=>$data,'flag'=>0,'name'=>$id,'attention'=>$attention,'fans'=>$fans,'infos'=>$infos,'messages'=>$messages,'len'=>$arrlen]);
        }

       
    }

    function doattention(request $request)
    {

        //取消已经关注的人的id
      
      $id = $_POST['id'];

    $a = session('userinfo')['user_id'];

    //删除两条记录
      user_relation::where('user_id',$a)
      ->where('follow_id',$id)
      ->where('type',2)
      ->delete();
//这一条数据库中不一定有,有的话必须删
      user_relation::where('user_id',$id)
      ->where('follow_id',$a)
      ->where('type',1)
      ->delete();

    $data = V_user::where('user_id',$id)->first();
     return '1';

    }

    //关注该用户
    function att()
    {
        $id = $_POST['id'];

        $a = session('userinfo')['user_id'];

        //数据库添加 该用户的一条记录
        $attener = new user_relation();

        $attener->user_id=$a;

        $attener->follow_id = $id;

        $attener->type = 2;

       $res = $attener->save();
       //数据库添加  id用户的一条记录 他被关注所以用户是他的粉丝

       $attener = new user_relation();

        $attener->user_id=$id;

        $attener->follow_id = $a;

        $attener->type = 1;

       $res = $attener->save();

        $data = V_user::where('user_id',$id)->first();
       if($res){
           return '1';
       }else{
           return '0';
       }


    }
    //获取更多
    public function moretips(Request $request)
    {
        $n=$request->input('n');
        $id=$request->input('userid');

        $messages=Msg_user::where('author_id',$id)
            ->orderBy('time','desc')
            ->skip($n*10)
            ->take(10)
            ->get();

        $arrlen=count($messages,0);
        return view('home.umore',['messages'=>$messages,'len'=>$arrlen]);
    }
   
}
