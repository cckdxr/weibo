<?php

namespace App\Http\Controllers\Home;

use App\Model\Home\Field;
use App\Model\Home\Msg;
use App\Model\Home\Msg_disc;
use App\Model\Home\Msg_user;
use App\Model\Home\User_msg_index;
use App\Model\Home\User_relation;
use App\Model\Home\V_user;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserIndexController extends Controller
{

    public function index()
    {
        //初始化用户id 订阅领域
        $user_field=session('homeUser')['user_field'];
        $fields=explode('/',$user_field);
        $user_id=session('homeUser')['user_id'];
        //获取关注者
        $follows=User_relation::where('user_id',$user_id)->get(['follow_id']);

        //判断原创等
        if(isset($_GET['isori'])){
            //原创
            $type='ori';
            $messages=Msg_user::whereIn('author_id',$follows)
                ->orWhereIn('msg_field', $fields )
                ->orWhere('author_id',$user_id)
                ->orderBy('time','desc')
                ->having('is_tran','=',0)
                ->take(10)->get();

        }else if(isset($_GET['ispic'])){
            //只有图
            $type='pic';

            $messages=Msg_user::whereIn('author_id',$follows)
                ->orWhereIn('msg_field', $fields )
                ->orWhere('author_id',$user_id)
                ->orderBy('time','desc')
                ->having('pic_or_movie','=',1)
                ->take(10)->get();

        }else if(isset($_GET['isarticle'])){
            //文章 无图
            $type='article';
            $messages=Msg_user::whereIn('author_id',$follows)
                ->orWhereIn('msg_field', $fields )
                ->orWhere('author_id',$user_id)
                ->orderBy('time','desc')
                ->having('pic_or_movie','=',0)
                ->take(10)->get();
        }else{
            //默认的
            $type='';
            $messages=Msg_user::whereIn('author_id',$follows)
                ->orWhereIn('msg_field', $fields )
                ->orWhere('author_id',$user_id)
                ->orderBy('time','desc')
                ->take(10)->get();

        }

        $arrlen=count($messages,0);
        $res=Field::all();

       return view('home.userindex',['messages'=>$messages,'len'=>$arrlen,'res'=>$res,'type'=>$type]);
    }

    public function moretips(Request $request)
    {
        $n=$request->input('n');
        $type=$request->input('type');

        //跟上步一样
        //初始化用户id 订阅领域
        $user_field=session('homeUser')['user_field'];
        $fields=explode('/',$user_field);
        $user_id=session('homeUser')['user_id'];

        //获取关注者
        $follows=User_relation::where('user_id',$user_id)->get(['follow_id']);

        //判断原创等
        if($type=='ori'){
            //原创
            $messages=Msg_user::whereIn('author_id',$follows)
                ->orWhereIn('msg_field', $fields )
                ->orWhere('author_id',$user_id)
                ->orderBy('time','desc')
                ->having('is_tran','=',0)
                ->skip(10*$n)->take(10)->get();

        }else if($type=='pic'){
            //只有图
            $messages=Msg_user::whereIn('author_id',$follows)
                ->orWhereIn('msg_field', $fields )
                ->orWhere('author_id',$user_id)
                ->orderBy('time','desc')
                ->having('pic_or_movie','=',1)
                ->skip(10*$n)->take(10)->get();

        }else if($type=='article'){
            //文章 无图
            $messages=Msg_user::whereIn('author_id',$follows)
                ->orWhereIn('msg_field', $fields )
                ->orWhere('author_id',$user_id)
                ->orderBy('time','desc')
                ->having('pic_or_movie','=',0)
                ->skip(10*$n)->take(10)->get();
        }else if($type=='mycollect'){
            //收藏的更多
            $messageids=User_msg_index::where(['user_id'=>$user_id,'msg_type'=>4])->get(['msg_id']);
            $messages=Msg_user::whereIn('msg_id',$messageids)
                ->orderBy('time','desc')
                ->skip(10*$n)
                ->take(10)
                ->get();
        }else if($type=='mypraise'){
            //点赞的更多
            $messageids=User_msg_index::where(['user_id'=>$user_id,'msg_type'=>3])->get(['msg_id']);
            $messages=Msg_user::whereIn('msg_id',$messageids)
                ->orderBy('time','desc')
                ->skip(10*$n)
                ->take(10)
                ->get();
        }else if($type=='myreply'){
            //回复的更多
            $messageids=Msg_disc::where(['author_id'=>$user_id])->get(['dis_msg_id']);
            $messages=Msg_user::whereIn('msg_id',$messageids)
                ->orderBy('time','desc')
                ->skip(10*$n)
                ->take(10)
                ->get();
        }else if($type=='mywb'){
            //我的微博更多
            $messages=Msg_user::where('author_id',$user_id)
                ->orderBy('time','desc')
                ->skip(10*$n)
                ->take(10)
                ->get();
        }else{
            $messages=Msg_user::whereIn('author_id',$follows)
                ->orWhereIn('msg_field', $fields )
                ->orWhere('author_id',$user_id)
                ->orderBy('time','desc')
                ->skip(10*$n)->take(10)->get();

        }
        $arrlen=count($messages,0);
        return view('home.umore',['messages'=>$messages,'len'=>$arrlen,'type'=>$type]);
    }

    public function mycollect()
    {

        $user_id=session('homeUser')['user_id'];
        $messageids=User_msg_index::where(['user_id'=>$user_id,'msg_type'=>4])->get(['msg_id']);

        $messages=Msg_user::whereIn('msg_id',$messageids)
            ->orderBy('time','desc')
            ->take(10)
            ->get();
        $arrlen=count($messages,0);
        $res=Field::all();
        $type='mycollect';
        return view('home.mycollect',['messages'=>$messages,'len'=>$arrlen,'res'=>$res,'type'=>$type]);
    }
    public function mypraise()
    {
        $user_id=session('homeUser')['user_id'];
        $messageids=User_msg_index::where(['user_id'=>$user_id,'msg_type'=>3])->get(['msg_id']);

        $messages=Msg_user::whereIn('msg_id',$messageids)
            ->orderBy('time','desc')
            ->take(10)
            ->get();
        $arrlen=count($messages,0);
        $res=Field::all();
        $type='mypraise';
        return view('home.mypraise',['messages'=>$messages,'len'=>$arrlen,'res'=>$res,'type'=>$type]);
    }
    public function myreply()
    {
        $user_id=session('homeUser')['user_id'];

        $messageids=Msg_disc::where(['author_id'=>$user_id])->get(['dis_msg_id']);

        $messages=Msg_user::whereIn('msg_id',$messageids)
            ->orderBy('time','desc')
            ->take(10)
            ->get();
        $arrlen=count($messages,0);
        $res=Field::all();
        $type='myreply';
        return view('home.myreply',['messages'=>$messages,'len'=>$arrlen,'res'=>$res,'type'=>$type]);
    }

    public function mywb()
    {
        $user_id=session('homeUser')['user_id'];

        $messages=Msg_user::where('author_id',$user_id)
            ->orderBy('time','desc')
            ->take(10)
            ->get();
        $arrlen=count($messages,0);
        $res=Field::all();
        $type='mywb';
        return view('home.mywb',['messages'=>$messages,'len'=>$arrlen,'res'=>$res,'type'=>$type]);
    }
}
