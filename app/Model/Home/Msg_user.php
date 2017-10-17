<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Msg_user extends Model
{
    //查询v_msg_user视图model
    protected $table = 'v_msg_user';
    protected $fillable = [];

    //获取消息相关图片
    public function pics(){
        return $this->hasMany('App\Model\Home\Msg_pic','pid_msg_id','msg_id');
    }
    //获取消息用户关注msg_index
    public function msg_index(){
        return $this->hasMany('App\Model\Home\User_msg_index','msg_id','msg_id');
    }
    //获取消息相关评论
    public function discinfo(){
        return $this->hasMany('App\Model\Home\Msg_disc','dis_msg_id','msg_id');
    }
}
