<?php

namespace App\Http\Controllers\Home;

use App\Model\Home\Msg;
use App\Model\Home\User_msg_index;
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
}
