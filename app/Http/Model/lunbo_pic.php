<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class lunbo_pic extends Model
{
     public $table = 't_lunbo_pic';
    // public $fillable =['user_name','user_password'];
    // //这个是定义主键的,跟数据库一致,默认find是找id的,我草....
    public $primaryKey='pic_id';

    // public $fillable = ['photo','user_name','user_password','user_level','user_id','user_msg'];
 //是否不允许 , 为空的话允许所有
  public $guarded =[];
}
