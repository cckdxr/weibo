<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\user;

class BackGroundController extends Controller
{
    function bgimg()
    {
        return view('home.background.bg');
    }

    function doimg()
    {


        $res=user::where('user_id',session('homeUser')['user_id'])->update(['bg'=>$_POST['src']]);


        if($res)
        {
        $data = user::where('user_id',session('homeUser')['user_id'])->first();
        $user = $data->toArray();
        session(['user'=>$user]);
            return 1;
        }else{
            return 0;
        }
    }
}
