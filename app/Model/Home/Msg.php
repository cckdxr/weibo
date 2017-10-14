<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Msg extends Model
{
    //
    protected $table = 't_msg_info';
    protected $guarded = [];
    public function user ()
    {
        return $this->belongsTo('App\Model\Home\V_user', 'author_id','user_id');
    }
}
