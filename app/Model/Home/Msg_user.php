<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Msg_user extends Model
{
    //查询v_msg_user视图model
    protected $table = 'v_msg_user';
    protected $fillable = [];

    public function pics(){
        return $this->hasMany('App\Model\Home\Msg_pic','pid_msg_id','msg_id');
    }
    public function msg_index(){
        return $this->hasMany('App\Model\Home\User_msg_index','msg_id','msg_id');
    }
}
