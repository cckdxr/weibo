<?php

namespace App\Http\Controllers\Home;

use App\Model\Home\Msg;
use App\Model\Home\Msg_disc;
use App\Model\Home\User_msg_index;
use App\Model\Home\Msg_jubao;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CollectController extends Controller
{

    //添加收藏方法
    public function addCollect(Request $request)
    {
        //
        $msg_id=$request['msg_id'];
        $res=User_msg_index::where(['msg_id'=>$msg_id,"user_id"=>session('homeUser')['user_id'],"msg_type"=>'4'])->first();
       if($res){
           return '已收藏';
       }
       $res=User_msg_index::create(['msg_id'=>$msg_id,'time'=>time(),"user_id"=>session('homeUser')['user_id'],"msg_type"=>'4']);

       if($res){
           Msg::where('msg_id','=',$msg_id)->increment('collect_count');
           $count=User_msg_index::where(['msg_id'=>$msg_id,"msg_type"=>'4'])->count();
           return $count;
       }else{
           return '存储失败';
       }
    }
    //添加点赞方法
    public function addLike(Request $request)
    {
        //
        $msg_id=$request['msg_id'];
        $res=User_msg_index::where(['msg_id'=>$msg_id,"user_id"=>session('homeUser')['user_id'],"msg_type"=>'3'])->first();
        if($res){
            return '已赞';
        }
        $res=User_msg_index::create(['msg_id'=>$msg_id,'time'=>time(),"user_id"=>session('homeUser')['user_id'],"msg_type"=>'3']);

        if($res){
            Msg::where('msg_id','=',$msg_id)->increment('praise_count');
            $count=User_msg_index::where(['msg_id'=>$msg_id,"msg_type"=>'3'])->count();
            return $count;
        }else{
            return '存储失败';
        }
    }

    //添加评论方法
    public function adddis(Request $request)
    {
        $data = [
            "dis_msg_id" => $request['msg_id'],
            "dis_time" => time(),
            "author_id" => session('homeUser')['user_id'],
            "dis_content" => $request['discontent'],
            "dis_id" => md5(time() + rand(1, 100))
        ];

        $res = Msg_disc::create($data);

        if ($res) {
            Msg::where('msg_id','=',$request['msg_id'])->increment('reply_count');
            return view("home.getdisc", ['dis' => $data]);
        } else {

        return "评论失败";
         }

    }

    //删除评论方法
    public function deldis(Request $request)
    {
        $dis_id=$request['dis_id'];
        $dis_userid=$request['dis_userid'];
        $msg_id=$request['msg_id'];
        //判断所要删除的评论是否本人评论
        if($dis_userid!=session('homeUser')['user_id']){
            return "删除失败";
        }

       $res=Msg_disc::where('dis_id',$dis_id)->delete();

        if($res){
            Msg::where('msg_id',$msg_id)->decrement('reply_count');
            return '1';

        }else{
            return '删除失败';
        }
    }

    //转发方法
    public function dotran(Request $request)
    {

        $data = [
            "msg_id"=>md5(time()+rand(1,100)),
            "author_id" => session('homeUser')['user_id'],
            "msg_title" => $request['msgtitle'],
            "msg_digest" => $request['msg_digest'],
            "time" => time(),
            "is_tran"=>1,
            "tran_msg_pid" => $request['msgpid']
        ];
        if(!empty($request['msg_topimg'])){

            $data["msg_topimg"]=$request['msg_topimg'];
            $data["pic_or_movie"]=1;
        }

        $res=Msg::create($data);
        if ($res) {
            Msg::where('msg_id','=',$request['msgpid'])->increment('tran_count');
            return '1';
        } else {

            return "转发失败";
        }
    }

    //举报微博方法
    public function jubao(Request $request)
    {
        $data = [
            "msg_id"=>$request['msgid'],
            "user_id" => session('homeUser')['user_id'],
            "time" => time()
        ];
       $res=Msg_jubao::create($data);
        if ($res) {
            return '1';
        } else {
            return "举报失败";
        }
    }
//删除微博方法
    public function delete(Request $request)
    {
        $msg_id=$request['msgid'];
        $user_id=Msg::where('msg_id',$msg_id)->first()['author_id'];
        //判断所要删除的评论是否本人评论

        if($user_id!=session('homeUser')['user_id']){
            return "删除微博失败";
        }

        $res=Msg::where('msg_id',$msg_id)->delete();
        if ($res) {

            return '1';
        } else {
            return "删除失败";
        }
    }

}
