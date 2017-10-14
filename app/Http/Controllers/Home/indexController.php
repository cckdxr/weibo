<?php

namespace App\Http\Controllers\Home;

use App\Model\Home\Msg;
use Illuminate\Http\Request;
use App\model\home\Field;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    //

    public function index($field_id=0){
        $search='';
        if(!empty($_GET['f'])){
            $search = $_GET['f'];
        }

        //所有的频道
        $res=Field::all();
        //热门应该在最近一周内热门,受限于数据暂定为1506268800,实际改为time()-7*24*3600
        if($field_id==0){
            $messages=Msg::where('time','>',1506268800)->where('msg_title','like','%'.$search.'%')->orderBy('reply_count','desc')->take(10)->get();
        }else{
            $messages=Msg::where('msg_field','=',$field_id)->where('msg_title','like','%'.$search.'%')->orderBy('time','desc')->take(10)->get();
        }
        //获取的message条数
        $arrlen=count($messages,0);

        return view('home.index',['res'=>$res,'field_id'=>$field_id,'messages'=>$messages,'search'=>$search,'len'=>$arrlen]);
    }

    public function moretips(Request $request)
    {

       $n=$request->input('n');
       $field_id=$request->input('id');
       $search=$request->input('f');
        if($field_id==0){
            $messages=Msg::where('time','>',1506268800)->where('msg_title','like','%'.$search.'%')->orderBy('reply_count','desc')->skip($n*10)->take(10)->get();
        }else{
            $messages=Msg::where('msg_field',$field_id)->where('msg_title','like','%'.$search.'%')->orderBy('time','desc')->skip($n*10)->take(10)->get();
        }
        $arrlen=count($messages,0);
        return view('home.more',['messages'=>$messages,'len'=>$arrlen]);
    }
}
