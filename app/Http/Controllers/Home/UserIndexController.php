<?php

namespace App\Http\Controllers\Home;

use App\Model\Home\Field;
use App\Model\Home\Msg;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserIndexController extends Controller
{

    public function index()
    {
        //
        $user_field=session('homeUser')['user_field'];
        $fields=explode('/',$user_field);
        $messages=Msg::whereIn('msg_field', $fields  )->orderBy('time','desc')->take(10)->get();
        //获取的message条数

        $arrlen=count($messages,0);
        $res=Field::all();
       return view('home.userindex',['messages'=>$messages,'len'=>$arrlen,'res'=>$res]);
    }

}
