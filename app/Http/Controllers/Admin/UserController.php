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
            echo "<script> alert('添加成功')</script>";
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
        echo 'shanchu';
    }

    public function homeusershow(){
        echo '前台用户管理qwdqwd';
    }
}
