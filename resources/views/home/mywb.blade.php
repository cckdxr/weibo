@extends("home.mineindex")



@section('left_lev')
    <div id="v6_pl_leftnav_group" style="position:fixed"  >    <div style="visibility: hidden;"></div><div style="z-index: 10; transform: translateZ(0px); position: relative; transition: margin-top 0.3s ease; will-change: margin-top, top; width: 150px;" class=" "><div class="WB_left_nav WB_left_nav_Atest" node-type="groupList" fixed-item="true" fixed-id="3">
                <div class="lev_Box lev_Box_noborder">
                    <h3 class="lev"><a href="{{url('home/u/index')}}" class="S_txt1 " node-type="item" bpfilter="main" nm="status" suda-uatrack="key=V6update_leftnavigate&amp;value=homepage"><span class="levtxt">首页</span></a></h3>
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
                    <h3 class="lev"><a href="{{url('home/u/mywb')}}" class="S_txt1 lev_curr" node-type="item"><span class="levtxt">我的微博</span><i class="W_new" style="display:none;"></i></a></h3>
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
@endsection



@section('changetitle')
@endsection