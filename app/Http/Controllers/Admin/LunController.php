<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\msg_field;

use App\Http\Model\msg_info;

use App\Http\Model\lunbo_pic;


use Illuminate\Support\Facades\Input;
class LunController extends Controller
{
   
   function lunlist()
   {
        $lun = lunbo_pic::orderBy('pic_order','desc')->get();

        return view('admin.lunbo.lunlist',compact('lun'));
   }

   function editlun()
   {
    // var_dump($_POST);
    
        $file = Input::file('img');
        // dd($file);
        // return $file;
         if($file ==null)
        {
            return redirect('admin/lunlist')->with('error','请上传图片');
        }
        //判断文件是否有效
        if($file->isValid()){
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            }
//这是本地上传
            $path = $file->move(public_path().'/uploads/',$newName);
//存图片的目录
            $filepath = '/uploads/'.$newName;
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
      
        $lun = lunbo_pic::find($_POST['pic_id']);
        $lun->pic_name = $_POST['pic_name'];
        $lun->pic_order = $_POST['pic_order'];
        $lun->pic_add = $filepath;
          $res = $lun->save(); 
            if($res)
            {
            return redirect('admin/lunlist');
         }else{
            return redirect('admin/lunlist')->with('error','修改失败');
        }

   
   }
   function dellun()
   {
       $res = lunbo_pic::where('pic_id',$_POST['id'])->delete();
       if($res)
       {
            return 1;
       }else{
        return 0;
       }

   }

   function addlun()
   {
        return view('admin.lunbo.addlun');
   }

   function dolun(request $request)
   {

    // var_dump($_POST);
    // dd();

        $file = $request->file('img');

        
        if($file ==null)
        {
            return redirect('admin/addlun')->with('errors','添加失败');
        }
        if($_POST['pic_name']=='')
        {
            return redirect('admin/addlun')->with('errors','添加失败');
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
        $request->file('img')->move(public_path().'\uploads\\', $fileName);
        $path = '\uploads\\'.$fileName;

        $lun = new lunbo_pic();
        $lun->pic_name = $_POST['pic_name'];
        $lun->pic_add = $path;
        $lun->pic_order=$_POST['pic_order'];
        $res =$lun->save();
        if($res)
        {
            return redirect('/admin/lunlist');
        }else{

            return redirect('/admin/addlun')->with('添加失败');
        }
   }
}
