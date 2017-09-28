<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Session;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users=User::all();
       $type=['未知','超级管理员','广告维护员','话题维护员','用户维护员'];
        return view('admin.userindex',['users'=>$users,'type'=>$type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.useradd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $input = $request->except('_token');

         $rule=[
            'user_name'=>'required|between:4,18',
            'user_password'=>'required|between:4,18',
            'repassword'=>'same:user_password',
            'user_msg'=>'between:0,255',
        ];
        $msg = [
            'user_name.required'=>'用户名必须输入',
            'user_name.between'=>'用户名必须在4-18位之间',
            'user_password.required'=>'密码必须输入',
            'user_password.between'=>'密码必须在4-18位之间',
            'repassword.same'=>'两次输入密码必须相同',
            'user_msg.between'=>'个性签名不能超过255位'
        ];
//        进行手工表单验证
        $validator = Validator::make($input,$rule,$msg);
//        如果验证失败
        if ($validator->fails()) {
            return redirect('admin/user/create')
                ->withErrors($validator)
                ->withInput();
        }
//       
//        用户名是否存在
         $user = User::where('user_name','=',$input['user_name'])->first();
         if($user){
             return redirect('admin/user/create')->with('errors','此用户已存在')->withInput();
         }
//       
         unset($input['repassword']);
         $input['user_id']=md5(time());
         $input['user_password']=Hash::make($input['user_password']);
         $res=User::create($input);
         if($res){
            return redirect('admin/user');
         }else{
            return redirect('admin/user/create')->with('errors','添加失败')->withInput();
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $res=User::where('user_id','=',$id)->first();
        return view('admin/useredit',['res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user=$request->except(['_token','_method']);

        $res=User::where('user_id',$id)->update($user);
        if($res){
            return redirect('admin/user');
        }else{
            return redirect('admin/user/'.$id.'/edit')->with('errors','用户修改失败');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //
       $res = User::where('user_id',$id)->delete();
       //执行删除操作
        
        if($res){
          $data=['status'=>0,'msg'=>'删除成功'];
        }else{
            $data=['status'=>1,'msg'=>'删除失败'];
        }
        return $data;
    }

    //额外修改密码
    public function repassword(){
        return view('admin/userrepassword');
    }
    //额外修改
    public function dorepassword(Request $request){
        $user_id=Session::get('adminUser')['user_id'];
        $pass=$request->except('_token');

        //验证原密码是否正确
         if(!Hash::check($pass['old_password'],Session::get('adminUser')['user_password'])){
            return redirect('admin/repassword')->with('errors','原密码错误');
        }
        //新密码输入验证
        $rule=[
            'new_password'=>'required|between:4,18',
            'renew_password'=>'same:new_password'
        ];
        $msg = [
            'new_password.required'=>'必须输入新密码',
            'new_password.between'=>'密码必须在4-18位之间',
            'renew_password.same'=>'两次输入密码必须相同'
        ];
//        进行手工表单验证
        $validator = Validator::make($pass,$rule,$msg);
//        如果验证失败
        if ($validator->fails()) {
            return redirect('admin/repassword')
                ->withErrors($validator);
        }

         $input=array('user_password'=>Hash::make($pass['new_password']));
         $res=User::where('user_id',$user_id)->update($input);
         if($res){
            return redirect('admin/index');
         }else{
            return redirect('admin/repassword')->with('errors','密码修改失败');
         }

    }

    //额外 前台用户方法
    public function homeusershow(){
        echo '前台用户管理qwdqwd';
    }
}
