<?php

namespace App\Http\Controllers\Home;

use App\Model\Home\Field;
use App\Model\Home\Msg;
use App\Model\Home\Msg_user;
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
                ->take(15)->get();

        }else if(isset($_GET['ispic'])){
            //只有图
            $type='pic';

            $messages=Msg_user::whereIn('author_id',$follows)
                ->orWhereIn('msg_field', $fields )
                ->orWhere('author_id',$user_id)
                ->orderBy('time','desc')
                ->having('pic_or_movie','=',1)
                ->take(15)->get();

        }else if(isset($_GET['isarticle'])){
            //文章 无图
            $type='article';
            $messages=Msg_user::whereIn('author_id',$follows)
                ->orWhereIn('msg_field', $fields )
                ->orWhere('author_id',$user_id)
                ->orderBy('time','desc')
                ->having('pic_or_movie','=',0)
                ->take(15)->get();
        }else{
            //默认的
            $type='';
            $messages=Msg_user::whereIn('author_id',$follows)
                ->orWhereIn('msg_field', $fields )
                ->orWhere('author_id',$user_id)
                ->orderBy('time','desc')
                ->take(15)->get();

        }

        $arrlen=count($messages,0);
        $res=Field::all();

       return view('home.userindex',['messages'=>$messages,'len'=>$arrlen,'res'=>$res,'type'=>$type]);
    }

}
