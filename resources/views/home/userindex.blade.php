@extends("home.mineindex")


@section('left_lev')
    <div id="v6_pl_leftnav_group" style="position:fixed"  >    <div style="visibility: hidden;"></div><div style="z-index: 10; transform: translateZ(0px); position: relative; transition: margin-top 0.3s ease; will-change: margin-top, top; width: 150px;" class=" "><div class="WB_left_nav WB_left_nav_Atest" node-type="groupList" fixed-item="true" fixed-id="3">
                <div class="lev_Box lev_Box_noborder">
                    <h3 class="lev"><a href="{{url('home/u/index')}}" class="S_txt1 lev_curr" node-type="item" bpfilter="main" nm="status" suda-uatrack="key=V6update_leftnavigate&amp;value=homepage"><span class="levtxt">首页</span></a></h3>
                </div>
                <div class="lev_Box lev_Box_noborder">
                    <h3 class="lev"><a href="{{url('home/u/mycollect')}}" class="S_txt1" ><span class="levtxt">我的收藏</span></a></h3>
                </div>
                <div class="lev_Box lev_Box_noborder">
                    <h3 class="lev"><a href="{{url('home/u/mypraise')}}" class="S_txt1" node-type="item"><span class="levtxt">我的赞</span><i class="W_new" style="display:none;"></i></a></h3>
                </div>
                <div class="lev_Box lev_Box_noborder">
                    <h3 class="lev"><a href="{{url('home/u/myreply')}}" class="S_txt1" node-type="item"><span class="levtxt">评论过的</span><i class="W_new" style="display:none;"></i></a></h3>
                </div>
                <div class="lev_Box lev_Box_noborder">
                    <h3 class="lev"><a href="{{url('home/u/mywb')}}" class="S_txt1" node-type="item"><span class="levtxt">我的微博</span><i class="W_new" style="display:none;"></i></a></h3>
                </div>


                <div class="lev_line">
                    <fieldset><legend><a  href=""  class="W_ficon ficon_setup S_ficon" >J</a></legend></fieldset>
                </div>
                <div node-type="leftnav_scroll" class=" UI_scrollView"><div class="UI_scrollContainer">
                        <div class="UI_scrollContent" style="width: 167px;">
                            <div class="lev_Box">
                                <div node-type="system_list" specialgid="3795654872842947">
                                    <div class="lev"><a href="{{url('home/myatt')}}" class="S_txt1" ><span class="ico_block"><em  class="W_ficon ficon_p_interest S_ficon">æ</em></span><span class="levtxt">特别关注</span></a></div>
                                </div>
                                <div node-type="leftnav_grouplists">

                                    <div class="lev"><a href="{{url('home/fans')}}" class="S_txt1" ><span class="ico_block"><em class="W_ficon ficon_groupwb S_ficon">º</em></span><span class="levtxt">我的粉丝</span></a></div>

                                </div>
                                <div node-type="leftnav_grouplists">

                                    <div class="lev"><a href="{{url('home/changefield')}}" class="S_txt1" ><span class="ico_block"><em class="W_ficon ficon_groupwb S_ficon">â</em></span><span class="levtxt">兴趣频道</span></a></div>

                                </div>
                            </div>    </div>
                    </div><div class="UI_scrollBar W_scroll_y S_bg1" style="visibility: hidden;"><div class="bar S_txt2_bg" style="top: 0%; height: 100%;"></div></div></div>
            </div><div style="height:1px;margin-top:-1px;visibility:hidden;"></div></div></div>
@endsection

@section('postwb')
    <div id="v6_pl_content_publishertop"><div class="send_weibo S_bg2 clearfix send_weibo_long" node-type="wrap">
            <form  action="{{url('home/u/postwb')}}" method ="post" id="post_new_wb" enctype="multipart/form-data" >

                <div class="title_area clearfix">
                    <div class="title" node-type="publishTitle"><span class="txt">What’s new with you?</span><p class=" ficon_swtxt"><em class="spac1">有什么新鲜事想告诉大家</em><em class="spac4">?</em></p></div>
                    <div class="num S_txt2" node-type="num" style="display:none;"></div>

                </div>
                <div class="input" node-type="textElDiv">
                    <textarea class="W_input" id="textarea" title="微博输入框" name="msg_title" node-type="textEl" pic_split="1" range="0&amp;0" style="overflow: hidden; height: 68px;"></textarea>
                    <div class="send_succpic" id="send_succpic" style="display:none" node-type="successTip"><span class="W_icon icon_succB"></span><span class="txt">发布成功</span></div>


                </div>
                <div class="func_area clearfix" node-type="widget" layout-shell="true">
                    <div class="func">
                        <div class="limits">
                            <a id="field_change_but" class="S_txt1"  href="javascript:void(0)"  >频道<em class="W_ficon ficon_arrow_down S_ficon">c</em></a>
                        </div>
                        {{csrf_field()}}
                        <a href="javascript:fabu()"  id="form_fabu"  class="W_btn_a btn_30px " >发布</a>
                    </div>
                    <div class="kind">
                        <a class="S_txt1" id="face_but" href="javascript:void(0);"  title="表情"><em class="W_ficon ficon_face">o</em>表情</a>
                        <a class="S_txt1" id="image_but" href="javascript:void(0);" title="图片" ><em class="W_ficon ficon_image">p</em>图片</a>
                    </div>


                    <div id="pic_box" class="layer_pic_list clearfix" style="position:absolute;left:70px;top:30px;z-index:100; border:1px solid #ccc;   background: white ;display:none; " node-type="box"><div class="W_layer_con_tit"><h1 class="W_f14 W_fb">本地上传</h1></div>
                        <input id="file_upload" type="file" accept="image/png, image/jpeg, image/gif, image/jpg" name="file_upload[]" multiple="multiple"  >
                        <ul id="pic_insert" class="drag_pic_list clearfix">


                        </ul>
                    </div>


                    {{--发布频道默认0--}}
                    <input type="hidden" name="field_id" value="0"  />


                    <div id="field_select" style="position: absolute; display:none; z-index: 29999; outline: none; left: 376px; top: 35px;" class="layer_menu_list " >
                        <ul >
                            @foreach($res as $v)

                                <li ><a  class="field_selects" action_id="{{$v->field_id}}" action_name="{{$v->field_name}}" ><i class="W_ficon ficon_arrow_down S_ficon">o</i>{{$v->field_name}}</a></li>
                            @endforeach
                        </ul></div>
                    {{--表情弹出层--}}
                    <div class="W_layer W_layer_pop " style="display:none;" id="biaoqingxianshi" style="width: 408px; left: 4px; top: 40px;"><div class="content"><div class="W_layer_close"><a href="javascript:void(0);" node-type="close" class="W_ficon ficon_close S_ficon">X</a></div><div class="layer_faces"><div class="WB_minitab"><ul class="minitb_ul S_line1 S_bg1 clearfix">
                                        <li class="minitb_item S_line1 current" node-type="tab" title="默认"><a href="javascript:void(0);" class="minitb_lk S_txt1 S_bg2" action-type="tab" action-data="index=0">默认</a><span class="cur_block"></span></li>
                                        <li class="minitb_item S_line1 " node-type="tab" title="心情"><a href="javascript:void(0);" class="minitb_lk S_txt1" action-type="tab" action-data="index=1">心情</a><span class="cur_block"></span></li>
                                    </ul></div><div class="faces_list_box"><div class="faces_list UI_scrollView" node-type="scrollView"><div class="UI_scrollContainer">
                                            <div class="UI_scrollContent" style="width: 390px;"><div id="face_list_ul" node-type="list"><ul class="faces_list_hot clearfix" ><li action-type="select" action-data="insert=%5B%E5%B9%BF%E5%91%8A%5D" title="guanggao" suda="key=mainpub_default_expr&amp;value=first"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/60/ad_new0902_thumb.gif"></li><li action-type="select" action-data="insert=%5Bdoge%5D" title="doge" suda="key=mainpub_default_expr&amp;value=second"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/b6/doge_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%96%B5%E5%96%B5%5D" title="miaomiao" suda="key=mainpub_default_expr&amp;value=third"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/4a/mm_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E4%BA%8C%E5%93%88%5D" title="erha" suda="key=mainpub_default_expr&amp;value=fouth"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/74/moren_hashiqi_thumb.png"></li><li action-type="select" action-data="insert=%5B%E5%B0%8F%E9%BB%84%E4%BA%BA%E5%89%AA%E5%88%80%E6%89%8B%5D" title="xiaohuangrenjiandaoshou" suda="key=mainpub_default_expr&amp;value=fifth"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/ed/xiaohuangren_jiandaoshou_thumb.png"></li><li action-type="select" action-data="insert=%5B%E5%B0%8F%E9%BB%84%E4%BA%BA%E9%AB%98%E5%85%B4%5D" title="xiaohuangren" suda="key=mainpub_default_expr&amp;value=sixth"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/8d/xiaohuangren_gaoxing_thumb.png"></li><li action-type="select" action-data="insert=%5B%E7%AC%91cry%5D" title="xiaocry" suda="key=mainpub_default_expr&amp;value=seventh"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/34/xiaoku_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E6%91%8A%E6%89%8B%5D" title="tanshou" suda="key=mainpub_default_expr&amp;value=eighth"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/09/pcmoren_tanshou_thumb.png"></li><li action-type="select" action-data="insert=%5B%E6%8A%B1%E6%8A%B1%5D" title="baobao" suda="key=mainpub_default_expr&amp;value=ninth"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/70/pcmoren_baobao_thumb.png"></li><li action-type="select" action-data="insert=%5B%E8%B7%AA%E4%BA%86%5D" title="guille" suda="key=mainpub_default_expr&amp;value=tenth"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6c/pcmoren_guile_thumb.png"></li><li action-type="select" action-data="insert=%5B%E5%90%83%E7%93%9C%5D" title="chigua" suda="key=mainpub_default_expr&amp;value=eleventh"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/8a/moren_chiguaqunzhong_thumb.png"></li><li action-type="select" action-data="insert=%5B%E5%93%86%E5%95%A6A%E6%A2%A6%E5%90%83%E6%83%8A%5D" title="duolachijing" suda="key=mainpub_default_expr&amp;value=twelfth"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/f0/dorachijing_thumb.gif"></li></ul><ul>
                                                        <li action-type="select" action-data="insert=%5B%E5%9D%8F%E7%AC%91%5D" title="huaixiao" suda="key=mainpub_default_expr&amp;value=eighteen"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/50/pcmoren_huaixiao_thumb.png"></li>
                                                        <li action-type="select" action-data="insert=%5B%E8%88%94%E5%B1%8F%5D" title="tianping" suda="key=mainpub_default_expr&amp;value=nineteen"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/pcmoren_tian_thumb.png"></li>
                                                        <li action-type="select" action-data="insert=%5B%E6%B1%A1%5D" title="wu" suda="key=mainpub_default_expr&amp;value=twenty"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/3c/pcmoren_wu_thumb.png"></li>
                                                        <li action-type="select" action-data="insert=%5B%E5%85%81%E6%82%B2%5D" title="yunbei" suda="key=mainpub_default_expr&amp;value=twenty-one"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/2c/moren_yunbei_thumb.png"></li>
                                                        <li action-type="select" action-data="insert=%5B%E7%AC%91%E8%80%8C%E4%B8%8D%E8%AF%AD%5D" title="xiaoerbuyu" suda="key=mainpub_default_expr&amp;value=twenty-two"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/3a/moren_xiaoerbuyu_thumb.png"></li>
                                                        <li action-type="select" action-data="insert=%5B%E8%B4%B9%E8%A7%A3%5D" title="feijie" suda="key=mainpub_default_expr&amp;value=twenty-three"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/3c/moren_feijie_thumb.png"></li>
                                                        <li action-type="select" action-data="insert=%5B%E6%86%A7%E6%86%AC%5D" title="chongjing" suda="key=mainpub_default_expr&amp;value=twenty-four"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/37/moren_chongjing_thumb.png"></li>
                                                        <li action-type="select" action-data="insert=%5B%E5%B9%B6%E4%B8%8D%E7%AE%80%E5%8D%95%5D" title="bingbujiandan" suda="key=mainpub_default_expr&amp;value=twenty-five"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/fc/moren_bbjdnew_thumb.png"></li><li action-type="select" action-data="insert=%5B%E5%BE%AE%E7%AC%91%5D" title="weixiao" suda="key=mainpub_default_expr&amp;value=twenty-six"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/5c/huanglianwx_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E9%85%B7%5D" title="ku" suda="key=mainpub_default_expr&amp;value=twenty-seven"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/8a/pcmoren_cool2017_thumb.png"></li><li action-type="select" action-data="insert=%5B%E5%98%BB%E5%98%BB%5D" title="xixi" suda="key=mainpub_default_expr&amp;value=twenty-eight"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0b/tootha_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%93%88%E5%93%88%5D" title="haha" suda="key=mainpub_default_expr&amp;value=twenty-nine"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6a/laugh.gif"></li><li action-type="select" action-data="insert=%5B%E5%8F%AF%E7%88%B1%5D" title="keai" suda="key=mainpub_default_expr&amp;value=thirty"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/14/tza_thumb.gif"></li></ul></div></div>
                                        </div><div class="UI_scrollBar W_scroll_y S_bg1" style=""><div class="bar S_txt2_bg" style="top: 0%; height: 87.5502%;"></div></div></div></div></div><div class="W_layer_arrow"><span class="W_arrow_bor W_arrow_bor_t" node-type="arrow" style="left: 16px;"><i class="S_line3"></i><em class="S_bg2_br"></em></span></div></div></div>

                </div>
            </form>
        </div>
    </div>
@endsection

@section('changetitle')
    <div class="WB_tab_a" node-type="feed_nav" mblogsorttype="" dom_id="Pl_Content_HomeFeed" >
        <div class="tab_box tab_box_a tab_box_a_r6 clearfix">
            <ul class="tab W_fl clearfix">
                <li class="li_first S_bg2"></li>
                @if($type=='')  <li class="curr" > @else  <li class="S_bg2" > @endif
                    <a suda-data="" href="{{url('home/u/index')}}" class="S_txt1" action-data="type=0" action-type="search_type">
                        <span class="t S_bg2">全部</span>
                        <span class="b">
                <span class="b1">
                    <em class="l"><i class="S_bg2"></i></em>
                    <em class="r"><i class="S_bg2"></i></em>
                </span>
                <span class="W_arrow_bor W_arrow_bor_tno"><i class="S_bg2_br"></i></span>
            </span>
                    </a>
                </li>
                @if($type=='ori')  <li class="curr" > @else  <li class="S_bg2" > @endif
                    <a suda-data="" href="{{url('home/u/index?isori=1')}}" class="S_txt1"  action-type="search_type">
                        <span class="t S_bg2">原创</span>
                        <span class="b">
                <span class="b1">
                    <em class="l"><i class="S_bg2"></i></em>
                    <em class="r"><i class="S_bg2"></i></em>
                </span>
                <span class="W_arrow_bor W_arrow_bor_tno"><i class="S_bg2_br"></i></span>
            </span>
                    </a>
                </li>
                @if($type=='pic')  <li class="curr" > @else  <li class="S_bg2" > @endif
                    <a suda-data="" href="{{url('home/u/index?ispic=1')}}" class="S_txt1" action-type="search_type">
                        <span class="t S_bg2">图片</span>
                        <span class="b">
                <span class="b1">
                    <em class="l"><i class="S_bg2"></i></em>
                    <em class="r"><i class="S_bg2"></i></em>
                </span>
                <span class="W_arrow_bor W_arrow_bor_tno"><i class="S_bg2_br"></i></span>
            </span>
                    </a>
                </li>
                @if($type=='article')  <li class="curr" > @else  <li class="S_bg2" > @endif
                    <a suda-data="" href="{{url('home/u/index?isarticle=1')}}" class="S_txt1" action-type="search_type">
                        <span class="t S_bg2">文章</span>
                        <span class="b">
                <span class="b1">
                    <em class="l"><i class="S_bg2"></i></em>
                    <em class="r"><i class="S_bg2"></i></em>
                </span>
                <span class="W_arrow_bor W_arrow_bor_tno"><i class="S_bg2_br"></i></span>
            </span>
                    </a>
                </li>
                <li class="S_bg2">

                    <span class="t S_bg2"></span>
                    <span class="b">
                <span class="b1">
                    <em class="l"><i class="S_bg2"></i></em>
                    <em class="r"><i class="S_bg2"></i></em>
                </span>
                <span class="W_arrow_bor W_arrow_bor_tno"><i class="S_bg2_br"></i></span>
            </span>

                </li>
                <li class="S_bg2">

                    <span class="t S_bg2"></span>
                    <span class="b">
                <span class="b1">
                    <em class="l"><i class="S_bg2"></i></em>
                    <em class="r"><i class="S_bg2"></i></em>
                </span>
                <span class="W_arrow_bor W_arrow_bor_tno"><i class="S_bg2_br"></i></span>
            </span>

                </li>
                <li class="li_last S_bg2"></li>
            </ul>
            <div class="fr_box W_fr S_bg2">
                <div class="search_box W_fr">

                </div>

            </div>
        </div>
    </div>
@endsection