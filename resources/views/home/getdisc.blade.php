<div comment_id="{{$dis['dis_id']}}}" class="list_li S_line1 clearfix" node-type="root_comment">
    <div class="WB_face W_fl">
        <a target="_blank" href=""><img width="30" height="30" alt="" src="{{  session("homeUser")['user_headpic'] }}" ></a>
    </div>
    <div class="list_con" node-type="replywrap">
        <div class="WB_text">
            <a target="_blank" href="" >{{  session("homeUser")['nick_name'] }}</a>：{{$dis['dis_content']}} </div>

        <div class="WB_func clearfix">
            <div class="WB_handle W_fr">
                <ul class="clearfix">
                    {{--是用户发送的则显示删除链接--}}

                        <li class="hover"><span class="line S_line1"><a class="S_txt1" href="javascript:void(0);" onclick="return false" action-type="delete" action-data="{{$dis['dis_id']}}">删除</a></span></li>
                        <li>

                            <span class="line S_line1"><a href="javascript:void(0);" class="S_txt1 " onclick="return false" action-id="post_redismsg" action-disid="{{$dis['dis_id']}}" action-con="{{$dis['dis_content']}}" action-username="{{session("homeUser")['nick_name'] }}" title="">回复</a></span>

                            <span class="arrow"><span class="W_arrow_bor W_arrow_bor_t"><i class="S_bg2_br"></i></span></span>
                        </li>

                </ul>
            </div>
            <div class="WB_from S_txt2">{{date('m-d H:i',$dis['dis_time'])}} </div>
        </div>

    </div>
</div>