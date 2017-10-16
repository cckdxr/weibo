<?php

namespace App\Http\Controllers\Home;

use App\Model\Home\Field;
use App\Model\Home\Msg;
use App\Model\Home\Msg_user;
use App\Model\Home\User_relation;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserIndexController extends Controller
{

    public function index()
    {

        $user_field=session('homeUser')['user_field'];
        $fields=explode('/',$user_field);
       // $messages=Msg::whereIn('msg_field', $fields  )->orderBy('time','desc')->take(10)->get();
        //获取的message条数

        //获取关注者
        $user_id=session('homeUser')['user_id'];
        $follows=User_relation::where('user_id',$user_id)->get(['follow_id']);
        $messages=Msg_user::whereIn('author_id',$follows)->orWhereIn('msg_field', $fields )->orWhere('author_id',$user_id)->orderBy('time','desc')->take(10)->get();

        $arrlen=count($messages,0);
        $res=Field::all();

       return view('home.userindex',['messages'=>$messages,'len'=>$arrlen,'res'=>$res]);
    }

}
