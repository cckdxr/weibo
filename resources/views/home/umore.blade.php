@foreach($messages as $v)
    {{--第一个内容标签开始--}}

    <div  class="WB_cardwrap WB_feed_type S_bg2 WB_feed_like" >
        <div class="WB_feed_detail clearfix" >
            <div class="WB_screen W_fr" >
                <div class="screen_box" style="display: block" >

                    <a href="javascript:void(0);" action-id="show-list"><i class="W_ficon ficon_arrow_down S_ficon">c</i></a>
                    {{--屏蔽框--}}
                    <div class="layer_menu_list"  style="display:none; position: absolute; z-index: 999;">
                        <ul>
                            @if(session('homeUser')['user_id']==$v->author_id)
                                <li><a href="javascript:void(0)"   action-id="delect" action-data="{{$v->msg_id}}" >删除此微博</a></li>
                            @else
                                <li><a href="javascript:void(0);"  action-id="jubao" action-data="{{$v->msg_id}}" >举报此微博</a></li>
                            @endif
                            <li><a href="javascript:void(0);" action-id="quxiao">取消</a></li>
                        </ul>
                    </div>

                </div>
            </div>
            {{--头像--}}
            <div class="WB_face W_fl">
                <div class="face"><a target="_blank" class="W_face_radius"  href="{{url('/home/homepages/666666'.$v['author_id'])}}"><img alt="{{$v->user_name}}" width="50" height="50" src="{{$v->user_headpic}}" class="W_face_radius"></a></div>
            </div>
            <div class="WB_detail">
                <div class="WB_info">
                    <a target="_blank" class="W_f14 W_fb S_txt1" href="{{url('/home/homepages/666666'.$v['author_id'])}}" >{{$v['nick_name']}}</a>         </div>
                <div class="WB_from S_txt2">
                    <!-- minzheng add part 2 -->
                {{date('m月d日 H:i',$v->time)}}                                                    <!-- minzheng add part 2 -->
                </div>
                <div class="WB_text W_f14 W_replace"  node-type="feed_list_content">
                    {{$v->msg_title}}
                </div>

                @if($v->msg_digest !='')
                    <div class="WB_text W_f14 W_replace WB_expand S_bg1" node-type="feed_list_content">
                        {!! $v->msg_digest !!}
                    </div>
                    <div class="WB_media_wrap clearfix WB_expand S_bg1" node-type="feed_list_media_prev" style="margin-top: 0px">
                        @else
                            <div class="WB_media_wrap clearfix " node-type="feed_list_media_prev">
                                @endif
                                {{--正常框开始--}}
                                <div class="media_box">&gt;
                                    <!--图片个数等于1，只显示图片-->
                                    <!--picture_count ==  WB_media_a_m2是大图 WB_media_a_mn是多图  1-->
                                    {{--如图片有一张--}}
                                    @if(count($v->pics)>1)
                                        <ul class="WB_media_a WB_media_a_mn WB_media_a_m9 clearfix" >
                                            @foreach($v->pics as $vv)

                                                <li class="WB_pic li_1 S_bg1 S_line2 bigcursor li_n_mix_w" >
                                                    <img src="{{$vv['pic_add']}}">
                                                    <i class="W_loading" style="display:none;"></i>
                                                </li>

                                            @endforeach
                                        </ul>
                                    @elseif(count($v->pics)==1 or isset($v->msg_topimg))
                                        <ul class="WB_media_a WB_media_a_m1 clearfix" >
                                            <li class="WB_pic li_1 S_bg1 S_line2 bigcursor li_n_mix_w" >
                                                <img src="{{$v->msg_topimg}}">
                                                <i class="W_loading" style="display:none;"></i>
                                            </li>
                                        </ul>
                                        {{--如图片有多张--}}

                                    @endif
                                </div>
                            </div>
                            <!-- super topic card -->
                            <!-- feed区 大数据tag -->
                            <!-- /feed区 大数据tag -->
                    </div>

            </div>
            <!-- 评论收藏回复转发框 -->
            <div class="WB_feed_handle">
                <div class="WB_handle">
                    <ul class="WB_row_line WB_row_r4 clearfix S_line2">
                        {{--如果是本人微博不能收藏和转发--}}
                        @if(session('homeUser')['user_id']!=$v->author_id)
                            <li>
                                <a class="S_txt2" href="javascript:void(0);" msgtitle="{{$v->msg_id}}" action_id="collect_but" ><span class="pos"><span class="line S_line1" node-type="collect_status"><span>
                                                       @if($v->msg_index()->where(['user_id'=>session('homeUser')['user_id'],'msg_type'=>4])->first())
                                                    <em class="W_ficon ficon_favorite S_spetxt">û</em><em class="a">已收藏</em><em>{{$v->collect_count}}</em>
                                                @else
                                                    <em class="W_ficon ficon_favorite S_ficon">û</em><em class="a">收藏</em><em>{{$v->collect_count}}</em>

                                                @endif
                                                   </span></span></span></a>
                            </li>
                            <li>
                                <a class="S_txt2"  href="javascript:void(0);" msgtitle="{{$v['msg_id']}}" magname="{{$v['nick_name']}}" msgcontent="{{$v['msg_title']}}" msgtran="{{$v['msg_digest']}}" msgpic="{{$v->msg_topimg}}" action-id="tran_but" ><span class="pos"><span class="line S_line1" node-type="forward_btn_text"><span><em class="W_ficon ficon_forward S_ficon"></em><em>{{$v->tran_count}}</em></span></span></span></a>
                            </li>
                        @endif
                        <li>
                            <a class="S_txt2"  href="javascript:void(0);"   msgtitle="{{$v->msg_id}}"     action_id="reply_but"><span class="pos"><span class="line S_line1"><span><em class="W_ficon ficon_repeat S_ficon"></em><em>{{$v->reply_count}}</em></span></span></span></a>

                        </li>
                        <li>
                            <a href="javascript:void(0);" msgtitle="{{$v->msg_id}}"  action_id="like_but" class="S_txt2" ><span class="pos"><span class="line S_line1">
                                                   @if($v->msg_index()->where(['user_id'=>session('homeUser')['user_id'],'msg_type'=>3])->first())
                                            <span node-type="like_status" class="UI_ani_praised">
                                                   @else
                                                    <span node-type="like_status" class="">
                                                   @endif

                                                        <em class="W_ficon ficon_praised S_txt2">ñ</em><em>{{$v->praise_count}}</em></span>                    </span></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            {{--回复隐藏框位置--}}
            <div node-type="feed_list_repeat" class="WB_feed_repeat S_bg1 feed_list_repeat" style="display:none"><!-- 评论盖楼 -->
                <div class="WB_feed_repeat S_bg1 WB_feed_repeat_v3" node-type="need_approval_comment">
                    <div class="WB_repeat S_line1 WB_Repeat">
                        <!-- 评论-发表 -->

                        <div class="WB_feed_publish clearfix">
                            {{--当前用户头像--}}
                            <div class="WB_face W_fl"><img src="{{session('homeUser')['user_headpic']}}" alt="{{$v['nick_name']}}"></div>
                            <div class="WB_publish WB_Publish">
                                <div class="p_input">
                                    <textarea class="W_input W_Input" action-type="check" cols="" rows="" name="dis_textarea" node-type="textEl" range="3&amp;0" style="margin: 0px; padding: 5px 2px 0px 6px; border-style: solid; border-width: 1px; font-size: 12px; word-wrap: break-word; line-height: 18px; overflow: hidden; outline: none; height: 40px;"></textarea>
                                </div>
                                <div class="p_opt clearfix" node-type="widget">
                                    <div class="btn W_fr"><a class="W_btn_a btn_noloading" action-id="post_dismsg" dis-data="{{$v->msg_id}}" href="javascript:void(0);" onclick="return false" node-type="btnText">评论</a></div>
                                    {{--暂不支持评论表情--}}
                                    {{--<div class="opt clearfix">--}}
                                    {{--<span class="ico"><a href="javascript:;" node-type="smileyBtn" title="表情" alt="表情"><i class="W_ficon ficon_face">o</i></a>--}}

                                    {{--</span>--}}
                                    {{--</div>--}}

                                </div>

                            </div>
                        </div>
                        <!-- 评论-列表 -->
                        <div class="repeat_list" >
                            <!-- 列表-内容 -->
                            <div class="list_box">
                                <div class="list_ul" node-type="feed_list_commentList">
                                    {{--评论内容 循环--}}

                                    @foreach($v->discinfo()->orderBy('dis_time','desc')->get() as $dis)

                                        <div comment_id="{{$dis['dis_id']}}}" class="list_li S_line1 clearfix" node-type="root_comment">
                                            <div class="WB_face W_fl">
                                                <a target="_blank" href=""><img width="30" height="30" alt="" src="{{  \App\Model\Home\V_user::where('user_id',$dis['author_id'] )->first()['user_headpic'] }}" ></a>
                                            </div>
                                            <div class="list_con" node-type="replywrap">
                                                <div class="WB_text">
                                                    <a target="_blank" href="" >{{ \App\Model\Home\V_user::where('user_id',$dis['author_id'] )->first()['nick_name'] }}</a>：{{$dis['dis_content']}} </div>

                                                <div class="WB_func clearfix">
                                                    <div class="WB_handle W_fr">
                                                        <ul class="clearfix">
                                                            {{--是用户发送的则显示删除链接--}}
                                                            @if($dis['author_id']== session('homeUser')['user_id'])
                                                                <li class="hover"><span class="line S_line1"><a class="S_txt1" href="javascript:void(0);" onclick="return false" action-id="post_deldismsg" action-type="delete" action-disid="{{$dis['dis_id']}}" action-userid="{{$dis['author_id']}}" action-msgid="{{$v->msg_id}}" >删除</a></span></li>
                                                                <li>
                                                                    @endif

                                                                    <span class="line S_line1"><a href="javascript:void(0);" class="S_txt1 " onclick="return false" action-id="post_redismsg" action-disid="{{$dis['dis_id']}}" action-con="{{$dis['dis_content']}}" action-username="{{  \App\Model\Home\V_user::where('user_id',$dis['author_id'] )->first()['nick_name'] }}" title="">回复</a></span>
                                                                    <span class="arrow"><span class="W_arrow_bor W_arrow_bor_t"><i class="S_bg2_br"></i></span></span>
                                                                </li>

                                                        </ul>
                                                    </div>
                                                    <div class="WB_from S_txt2">{{date('m-d H:i',$dis['dis_time'])}} </div>
                                                </div>

                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                            <!-- 列表-内容 -->
                        </div>
                        <!-- 评论-列表 -->
                    </div>
                </div></div>
        </div>
    {{--第一个内容标签结束--}}

@endforeach