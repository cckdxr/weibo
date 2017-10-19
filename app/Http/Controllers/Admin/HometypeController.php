<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\msg_field;

use App\Http\Model\msg_info;

use Illuminate\Support\Facades\Input;

class HometypeController extends Controller
{
     function hometype()
   {

        //不等于 1;
          // $field = msg_field::orderBy('field_id')->where('field_id','<>','1')->get();

          $field = msg_field::orderBy('field_id')->where('field_id','<>','9')->get();

            // dd($field);
             


         return view('admin.hometype.type',compact('field'));
   }
   
   function deltype()
   {

        //判断msg_info下面有没有消息 有的话保留  没消息删除  不影响前台

        $a = msg_info::where('msg_field',$_POST['id'])->count();

        // return $a;

        if($a != 0)
        {

            return 1;

        }else{
            //没有消息
            //删除

            $res = msg_field::where('field_id',$_POST['id'])->delete();

            if($res)
            {
                 return 0;
            }

           
        }

   }

   function addtype()
   {
        return view('admin.hometype.addtype');
   }

   function upload()
   {
         
       // dd(123123123213213);
        //获取上传的文件对象
      // return 1;
        $file = Input::file('upload');
        // return $file;
        //判断文件是否有效
        if($file->isValid()){
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            }
//这是本地上传
            $path = $file->move(public_path().'/home/css/interest/cssStyle/',$newName);
//存图片的目录
            $filepath = 'home/css/interest/cssStyle/'.$newName;
            //返回文件的路径
//            dd($filepath); 
//把pic信息存入数据库
               
//            return $file;
        
            //获取图片临时文件的地址
            //存阿里云服务器(暂时不知道怎么缩放)
        // $pics=$file->getRealPath();
        // OSS::upload($newName,$pics);
        // $filepath=OSS::getUrl($newName);
        // //通过session存的值查数据库
        
        //上传成功存数据库添加
       
           

            return  $filepath;
   

  

        

   }

   function doupload()
   {

         $field = new msg_field();

        $field->picadd =$_POST['picadd'];
        $field->field_name=$_POST['field_name'];
       $res = $field->save();
       if($res)
       {
            return redirect('/admin/hometype');
       }else{

            return redirect('/admin/addtype')->with('error','添加失败');
       }
       
   }

   function edittype(request $request)
   {
       
        $file = $request->file('img');
        
        if($file ==null)
        {
            return redirect('admin/hometype')->with('error','修改失败');
        }
       //  echo '<pre>';
       // var_dump($_FILES);
    // 给上传的图片一个唯一的名字
        $fileName = time().md5($_FILES['img']['name']).$_FILES['img']['name'];
        // echo $fileName;
        // dd();
        // echo base_path();//这个是项目所在路径
        // echo app_path();// C:\xampp\htdocs\lamp189\app
//上传文件
        $request->file('img')->move(public_path().'\home\css\interest\cssStyle\\', $fileName);
        $path = '\home\css\interest\cssStyle\\'.$fileName;
       
    $a =  $request->file('img')->getClientOriginalExtension();   //获取后缀
       $field= msg_field::find($_POST['field_id']);
       $field->field_name=$_POST['field_name'];
       $field->picadd = $path;
       $res =$field->save();
       if($res)
        {
            return redirect('admin/hometype');
        }else{
            return redirect('admin/hometype')->with('error','修改失败');
        }
   }
}
