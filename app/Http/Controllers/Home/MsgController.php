<?php

namespace App\Http\Controllers\Home;

use App\Model\Home\Msg;
use App\Model\Home\T_pic;
use App\Model\Home\Userinfo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MsgController extends Controller
{
   function postwb(Request $request)
   {

       if($request['msg_title']=='' && empty($request['file_upload'])){
           return redirect('home/u/index');
           die;
       }

       $res=[];


        $msg['msg_id']=md5(time());
        $msg['author_id']=session('homeUser')['user_id'];
        $msg['msg_title']=$request['msg_title'];
        $msg['time']=time();
       $msg['msg_field']=$request['field_id'];
       //如果有图片上传
       if(isset($request['file_upload'])){
           $msg['pic_or_movie']=1;
           $msg['msg_topimg']=$request['picname0'];
           $pic_name=[];

           for($i=0;$i<count($request['file_upload']);$i++){
               $pic_name[$i]['pic_add']=$request['picname'.$i];
               $pic_name[$i]['pid_msg_id']= $msg['msg_id'];
               $res[]=T_pic::create($pic_name[$i]);
           }


       }
       $res[]=Msg::create($msg);
       Userinfo::where("user_id",session('homeUser')['user_id'])->increment('msg_count');
        foreach ($res as $v){
            if(!$v){
                return '微博存储异常,请重试';
            }
        }
        return 'ok';

   }
}
