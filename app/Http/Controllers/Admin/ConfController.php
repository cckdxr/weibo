<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;

require(app_path().'\Http\Model\conf.php');
use App\Http\Model\conf;
class ConfController extends Controller
{
    
    function conf()
    {
       $data = conf::all();
       // echo '<pre>';
       // var_dump($data);
       // echo $data[0]->name;
        return view('admin.conf.config',['data'=>$data]);
    }
    function doconf(Request $request,$id)
    {

        $data = $request->except('_token');
        // echo '<pre>';
        // var_dump($data);
          $rule=[
            'name'=>'required',
            'keywords'=>'required',
            'description'=>'required',
            'reference'=>'required',
            'version'=>'required',
        ];

        $msg = [
            'name.required'=>'请重新输入网站名',
            'keywords.required'=>'请重新输入关键字',
            'description.required'=>'请重新描述',
            'reference.required'=>'请重新输入备案信息',
            'version.required'=>'请重新输入版本信息'
        ];
//        进行手工表单验证
        $validator = Validator::make($data,$rule,$msg);
//        如果验证失败
        if ($validator->fails()) {
            return redirect('admin/conf')
                ->withErrors($validator)
                ->withInput();
        }

        $res = conf::find($id);
        $data =$res->update($data);
        if(!$res)
        {
            echo '失败';
        }else{
            return redirect('admin/conf');
        }
    }
}
