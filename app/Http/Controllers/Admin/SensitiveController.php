<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Model\sensitive;
use App\Http\Model\msg_field;

class sensitiveController extends Controller
{
   
   function stv()
   {


        $stvs = sensitive::paginate(10);
        // dd($stv);
// 
        return view('admin.sensitive.stv',compact('stvs'));
   }

   function addstv()
   {
        return view('admin.sensitive.addstv');
   }
   function doaddstv(request $request)
   {
        $stv= $request->except('_token');
       

        $stvs = new sensitive();

        $stvs->sen_name = $stv['stv'];

       $res= $stvs->save();

       if($res)
       {
            
        // dd($stv);
 
        return redirect('admin/stv');
       }else{

            return view('admin.sensitive.addstv')->with('errors','输入有误');
       }
   }
   function delstv($id)
   {

       $res= sensitive::where('sen_id',$id)->delete();
       if($res)
       {
            return redirect('admin/stv');
       }else{

            return redirect('admin/stv')->with('errors','输入有误');

       }

   }

  
}
