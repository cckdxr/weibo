@foreach($messages as $v)
    <div class="UG_list_b"  action-type="feed_list_item" href="#" >
        @if(!empty($v->msg_topimg))
            <div class="pic W_piccut_v" >
                <img src="{{$v->msg_topimg}}" alt="">
            </div>
        @endif
        <div class="list_des" >
            <h3 class="list_title_s" style="  overflow: auto ;">
                @if(!empty($v->msg_digest))
                    <div class="W_replace">{{$v->msg_digest}}</div>
                @else
                    <div class="W_replace">{{$v->msg_title}}</div>
                @endif
            </h3>
            <div class="subinfo_box clearfix">
                <a href="{{url('/home/user/'.$v->user->user_id)}}" target="_blank"><span class="subinfo_face "><img src="{{$v->user->user_headpic}}" width="20" height="20" alt=""></span></a>
                <a href="{{url('/home/user/'.$v->user->user_id)}}" target="_blank"><span class="subinfo S_txt2">{{$v->user->user_name}}</span></a>
                <span class="subinfo S_txt2">{{date('m月d日 H:i',$v->time)}}</span>
                <span class="subinfo_rgt S_txt2"><em class="W_ficon ficon_praised S_ficon W_f16">ñ</em><em>{{$v->praise_count}}</em></span>
                <span class="rgt_line W_fr"></span>
                <span class="subinfo_rgt S_txt2"><em class="W_ficon ficon_repeat S_ficon W_f16"></em><em>{{$v->reply_count}}</em></span>
                <span class="rgt_line W_fr"></span>
                <span class="subinfo_rgt S_txt2"><em class="W_ficon ficon_forward S_ficon W_f16"></em><em>{{$v->tran_count}}</em></span>
            </div>
        </div>
    </div>
@endforeach