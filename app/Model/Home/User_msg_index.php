<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class User_msg_index extends Model
{
    //
    protected $table = 't_user_msg_index';
    protected $guarded = [];

    public function getmsgs()
    {
        return $this->belongsTo('App\Model\Home\Msg_user', 'msg_id','msg_id');
    }
}
