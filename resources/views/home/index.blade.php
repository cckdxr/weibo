<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="initial-scale=1,minimum-scale=1">
    <meta content="随时随地发现新鲜事！微博带你欣赏世界上每一个精彩瞬间，了解每一个幕后故事。分享你想表达的，让全世界都能听到你的心声！" name="description">
    <link rel="mask-icon" sizes="any" href="http://img.t.sinajs.cn/t6/style/images/apple/wbfont.svg" color="black">
    <link rel="shortcut icon" type="image/x-icon" href="http://www.weibo.com/favicon.ico">


    <title>微博-随时随地发现新鲜事</title>
    <link href="{{asset('home/indexsource/frame.css')}}" type="text/css" rel="stylesheet" charset="utf-8">
    <link href="{{asset('home/indexsource/login_v5.css')}}" type="text/css" rel="stylesheet" charset="utf-8">
    <link href="{{asset('home/indexsource/skin.css')}}" type="text/css" rel="stylesheet" id="skin_style">
    <script type="text/javascript" src="{{asset('admin/style/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/style/js/biaoqing.js')}}"></script>
    <script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
    <style>
        #js_style_css_module_global_WB_outframe{height:42px;}
        .UG_slider ul li {
            float:left;
        }
    </style>
    <script>
        $(function(){

            //载入模板时替换[]表情
            $(".W_replace").each(function () {
                var s = replace($(this).text());
                $(this).html(s);
            })
        })


    </script>
    <style></style><div style="position: absolute; top: -9999px;"><div id="js_style_css_module_global_WB_outframe"></div></div><style></style></head>

<body class="FRAME_login">
<!--传递field,search,message_len-->
<input  type="hidden" name="take_field_id" value="{{$field_id}}" >
<input  type="hidden" name="take_search" value="{{$search}}" >
<input  type="hidden" name="take_len" value="{{$len}}" >

<div class="B_unlog">

    <div class="WB_miniblog">
        <div class="WB_miniblog_fb">
            <div id="weibo_top_public"><!--spec start-->    <!--顶部导航-->
                <div class="WB_global_nav WB_global_nav_v2 " node-type="top_all">
                    <div class="gn_header clearfix">
                        <div class="gn_logo" node-type="logo" data-logotype="logo" data-logourl="//weibo.com?topnav=1&amp;mod=logo">
                            <a href="http://weibo.com/?topnav=1&amp;mod=logo" class="box" title="" node-type="logolink" suda-uatrack="key=topnav_tab&amp;value=weibologo" target="_top">
                                <span class="logo"></span>
                            </a>
                        </div>
                        <div class=" gn_search_v2">
                            <form action="{{url('/home/index/0')}}" method="get" id="searchform" >
                           <input type="text" placeholder="大家都在搜:90换90" value=""  class="W_input" name="f">
                            <a href="javascript:void(0);" title="搜索"  onclick="document.getElementById('searchform').submit();"  class="W_ficon ficon_search S_ficon"  target="_top">f</a>
                            </form>
                        </div>
                        <div class="gn_position">
                           
                            <div class="gn_login">
                                <ul class="gn_login_list">
                                    @if(empty(session('homeFlag')))
                                        <li><a href="{{url('home/reg')}}" class="S_txt1" target="_black">注册</a></li>
                                        <li class="W_vline S_line1"></li>
                                        <li><a node-type="loginBtn" href="javascript:void(0)" class="S_txt1" target="_top">登录</a></li>
                                    @else
                                        <li><a href="javascript:;"><em class="W_ficon ficon_home S_ficon">E</em><em class="S_txt1">首页</em></a></li>
                                        <li><a dot="pos55b9e0848171d" bpfilter="page_frame" href="{{url('home/u/index')}}"><em class="W_ficon ficon_user S_ficon">H</em><em class="S_txt1">{{session('homeUser')['user_name']}}</em></a></li>
                                        <li class="W_vline S_line1"></li>
                                        <li><a node-type="loginBtn" href="{{url('home/logout')}}" class="S_txt1" target="_top">退出登录</a></li>

                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--spec end--></div>
           
            <div class="WB_main clearfix" id="plc_frame">
                <div class="WB_frame">
                    <!-- 左导 -->
                    <div class="WB_main_l">
                        <div id="pl_unlogin_home_leftnav"><div class="UG_left_nav" node-type="UG_fixed_nav" style="position: fixed; top: 66px; bottom: auto;">

                                <ul>
                                    @foreach($res as $v)
                                    <div field_id="{{$v->field_id}}" >
                                        <li>
                                            <a href="/home/index/{{$v->field_id}}" filed_id="{{$v->field_id}}" class="nav_item @if($field_id==$v->field_id ) cur @endif ">{{$v->field_name}}</a>
                                        </li>
                                     </div>
                                    @endforeach

                                </ul>

                            </div></div>
                    </div>
                    <!-- ／左导 -->
                    <div id="plc_main">
                        <div id="plc_unlogin_home_main"><div class="WB_frame_c">
                                <div id="pl_unlogin_home_feed">    <!--榜单栏位置-->
                                    <!--/ card-->
                                    <div class="UG_slider">
                                        <ul  id="uls" action-type="header_slider" node-type="header_slider">
                                            @foreach($lunbo_pic  as $lv)
                                            <li>
                                                <a href="javascript:;" >
                                                    <img src="{{$lv['pic_add']}}" class="pic"><div class="pic_intro">{{$lv['pic_name']}}</div>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div id="ids" class="dot_box" node-type="dot_box" action-type="dot_box">
                                            <a href="javascript:void(0);" class="dot current" node-type="dot" action-type="dot"></a>
                                            @for($i=0;$i<count($lunbo_pic)-1;$i++)
                                            <a href="javascript:void(0);" class="dot" node-type="dot" action-type="dot"></a>
                                            @endfor
                                        </div>
                                    </div>
                                    <!-- card -->
                                    <div class="UG_tips" action-type="unread_feed_tip" style="display: none;">您有未读内容，点击查看<em class="W_ficon ficon_close S_ficon">X</em></div>

                                    <div  class="UG_contents" id="PCD_pictext_i_v5">
                                        <!--feed内容-->
                                        <ul id="feedbegin" class="pt_ul clearfix" pagenum="" node-type="feed_list">
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
                                            <!-- read_pos -->
                                            <!--/read_pos-->
                                        </ul>
                                        <!--/feed内容-->
                                        <div id="moretips" style="display:block" class="UG_tips"  action-type="unread_feed_tip">查看更多<em class="W_ficon ficon_close S_ficon">X</em></div>
                                    </div>
                                </div>
                            </div>

                            <div class="WB_main_r" fixed-box="true" >
                                <div id="pl_unlogin_home_login">
                                    <div style="visibility: hidden;"></div>
                                    <div style="z-index: 10; transform: translateZ(0px); position: relative; width: 340px;">

                                        @if(empty(session('homeFlag')))
                                            <div class="UG_box" fixed-inbox="true" fixed-id="2" style="display:block">
                                        @else
                                           <div class="UG_box" fixed-inbox="true" fixed-id="2" style="display:none">
                                       @endif

                                            <div class="W_unlogin_v4" >
                                                <div class="login_box" id="pl_login_form" >
                                                    <div class="login_innerwrap">
                                                        <div class="info_header">
                                                            <div class="tab clearfix">
                                                                <a href="javascript:void(0);" node-type="normal_tab" action-type="switchTab" action-data="type=normal" suda-uatrack="key=tblog_weibologin3&amp;value=ordinary_login" class="cur W_fb"><!-- <span class="W_icon_rec"><span class="W_icon_rec_txt">推荐</span><span class="W_arrow_bor W_arrow_bor_r"><i class="S_spetxt"></i></span></span>-->帐号登录</a>
                                                                <a href="javascript:void(0);" node-type="qrcode_tab" action-type="switchTab" action-data="type=qrcode" suda-uatrack="key=tblog_weibologin3&amp;value=qrcode_login">扫码登录</a>
                                                            </div>
                                                            <!-- qrcode_target  qrcode_phone 点击时相互切换 -->
                                                            <a href="javascript:void(0);" node-type="message_tab" action-type="switchTab" action-data="type=message" class="qrcode_target qrcode_phone"></a>
                                                        </div>
                                                        <!-- 登录框content -->
                                                        <!-- /result end -->



                                                        <div class="W_login_form" node-type="normal_form">
                                                            <form id="login_form" action="{{url('/home/dologin')}}"  method="post">
                                                            <!--<div class="info_list pre_info clearfix" node-type="prename_box" style="display:none"></div>-->
                                                            <div class="info_list username" node-type="username_box">
                                                                <div class="input_wrap">
                                                                    <input id="loginname" type="text" class="W_input" maxlength="128"  placeholder="邮箱/会员帐号/手机号" action-type="text_copy" name="log_name" node-type="username" tabindex="1">
                                                                </div>
                                                            </div>
                                                            <div class="info_list password" node-type="password_box">
                                                                <div class="input_wrap">
                                                                    <input type="password" placeholder="请输入密码" id="loginpasswd" class="W_input" maxlength="24" autocomplete="off" value="" action-type="text_copy" name="user_password" node-type="password" tabindex="2">

                                                                </div>
                                                            </div>
                                                            <!-- 输入验证码 -->
                                                            <div class="info_list verify clearfix"  node-type="verifycode_box">
                                                                <div class="input_wrap W_fl">
                                                                    <input type="text" class="W_input" maxlength="12" id="homeCode" autocomplete="off" placeholder="验证码" action-data=" action-type="text_copy" name="homeCode" node-type="verifycode" tabindex="3" >
                                                                </div>
                                                                <a class="code W_fl" href="javascript:void(0);"><img width="95" height="34"  onclick="this.src='http://www.cweibo.com/home/captcha/1?'+Math.random()"  src="{{url('/home/captcha/1')}}"></a>

                                                            </div>
                                                            <!-- /输入验证码 -->
                                                           {{csrf_field()}}

                                                            <div class="info_list login_btn">
                                                                <a href="javascript:void(0)" id="button" class="W_btn_a btn_32px" action-type="btn_submit" node-type="submitBtn" suda-data="key=tblog_weibologin3&amp;value=click_sign" tabindex="6"><span node-type="submitStates">登录</span></a>
                                                            </div>
                                                            <div class="info_list register">
                                                                <span class="S_txt2">还没有微博？</span><a target="_blank" href="{{url('home/reg')}}">立即注册!</a>
                                                            </div>
                                                          </form>

                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div><div style="height:1px;margin-top:-1px;visibility:hidden;"></div></div>
                                    <div class="bg" node-type="qr_help" style="position: absolute; top: 2px; left: -220px; width: 264px; height: 372px; background-position: -300px -150px; background-repeat: no-repeat; z-index: 999; background-image: url(&quot;//img.t.sinajs.cn/t6/style/images/growth/login/sprite_login.png&quot;); display: none;"></div></div>
                                <div id="pl_unlogin_home_adcontent"></div>
                                <div id="pl_unlogin_home_hots"><div class="UG_box_l">
                                        <h2 class="UG_box_title">微博新鲜事</h2>
                                        <div class="UG_contents">
                                            <div class="UG_list_d" action-type="feed_list_item" href="/a/hot/7545646887213057_1.html?type=new" suda-uatrack="key=www_unlogin_home&amp;value=hot01">
                                                <div class="list_nod clearfix">
                                                    <div class="pic W_piccut_v">
                                                        <a href="http://www.weibo.com/a/hot/7545646887213057_1.html?type=new" target="_blank">
                                                            <img src="{{asset('home/indexsource/90eb2137ly1fk8lbs8pv1j214w0n0wga.jpg')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="list_des">
                                                        <h3 class="list_title_s"><a href="http://www.weibo.com/a/hot/7545646887213057_1.html?type=new" class="S_txt1" target="_blank">官方通报"越野车追赶藏羚羊"：涉事7人被罚105000元</a></h3>
                                                        <div class="list_plus">
                                                            <span class="list_text">10月9日 16:45</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="UG_list_d" action-type="feed_list_item" href="/a/hot/7545603126466561_1.html?type=new" suda-uatrack="key=www_unlogin_home&amp;value=hot02">
                                                <div class="list_nod clearfix">
                                                    <div class="pic W_piccut_v">
                                                        <a href="http://www.weibo.com/a/hot/7545603126466561_1.html?type=new" target="_blank">
                                                            <img src="{{asset('home/indexsource/90eb2137ly1fk7hc25omij20xc0m7t8u.jpg')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="list_des">
                                                        <h3 class="list_title_s"><a href="http://www.weibo.com/a/hot/7545603126466561_1.html?type=new" class="S_txt1" target="_blank">中秋陨石：陨石去哪儿了？为何寻找它如大海捞针</a></h3>
                                                        <div class="list_plus">
                                                            <span class="list_text">今天 14:45</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="UG_list_d" action-type="feed_list_item" href="/a/hot/7545602650413057_1.html?type=new" suda-uatrack="key=www_unlogin_home&amp;value=hot03">
                                                <div class="list_nod clearfix">
                                                    <div class="pic W_piccut_v">
                                                        <a href="http://www.weibo.com/a/hot/7545602650413057_1.html?type=new" target="_blank">
                                                            <img src="{{asset('home/indexsource/90eb2137ly1fk8dcbxnusj21ag0q4tb2.jpg')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="list_des">
                                                        <h3 class="list_title_s"><a href="http://www.weibo.com/a/hot/7545602650413057_1.html?type=new" class="S_txt1" target="_blank">中国失事渔船搜救工作最新进展：12名船员遗体全部找到</a></h3>
                                                        <div class="list_plus">
                                                            <span class="list_text">10月7日 22:22</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="UG_list_d" action-type="feed_list_item" href="/a/hot/7545273896146945_1.html?type=new" suda-uatrack="key=www_unlogin_home&amp;value=hot04">
                                                <div class="list_nod clearfix">
                                                    <div class="pic W_piccut_v">
                                                        <a href="http://www.weibo.com/a/hot/7545273896146945_1.html?type=new" target="_blank">
                                                            <img src="{{asset('home/indexsource/90eb2137ly1fjzaqr80jaj20qo0hotb0.jpg')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="list_des">
                                                        <h3 class="list_title_s"><a href="http://www.weibo.com/a/hot/7545273896146945_1.html?type=new" class="S_txt1" target="_blank">奋斗在海外，我活的如此精彩</a></h3>
                                                        <div class="list_plus">
                                                            <span class="list_text">今天 14:57</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="UG_list_d" action-type="feed_list_item" href="/a/hot/7545236292638721_1.html?type=new" suda-uatrack="key=www_unlogin_home&amp;value=hot05">
                                                <div class="list_nod clearfix">
                                                    <div class="pic W_piccut_v">
                                                        <a href="http://www.weibo.com/a/hot/7545236292638721_1.html?type=new" target="_blank">
                                                            <img src="{{asset('home/indexsource/90eb2137ly1fk55ru6djyj20jr0b4dge.jpg')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="list_des">
                                                        <h3 class="list_title_s"><a href="http://www.weibo.com/a/hot/7545236292638721_1.html?type=new" class="S_txt1" target="_blank">诺贝尔经济学奖出炉 美国芝加哥大学理查德-塞勒获奖</a></h3>
                                                        <div class="list_plus">
                                                            <span class="list_text">10月9日 18:24</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="UG_box_foot">

                                        </div>
                                    </div>
                                    <div class="UG_box_l">
                                        <!--微博实时热点-->
                                        <h2 class="UG_box_title">微博实时热点</h2>
                                        <div class="UG_contents">
                                            <div class="UG_list_c" action-type="feed_list_item" href="/a/hot/55746cf6a5ec4e43_0.html?type=grab" suda-uatrack="key=www_unlogin_home&amp;value=hot01">
                                                <div class="pic W_piccut_v">
                                                    <a href="http://www.weibo.com/a/hot/55746cf6a5ec4e43_0.html?type=grab" target="_blank"><img src="{{asset('home/indexsource/61e7f4aaly1fkcumhrdd2j20d30gojwc.jpg')}}" alt=""></a>
                                                </div>
                                                <div class="list_des">
                                                    <h3 class="list_title_s"><a href="http://www.weibo.com/a/hot/55746cf6a5ec4e43_0.html?type=grab" class="S_txt1" target="_blank">金荷娜目前为怀孕初期</a></h3>
                                                    <div class="des_main S_txt2">#金荷娜#所属经纪公司10日向媒体公布了她怀孕的消息：“金荷娜目前为怀孕初期，她本人和家人知道后都非常开心。”39岁的准妈妈金荷娜接下来将暂停活动专心养胎。金荷娜于2016年3月结婚，男方是比其小一岁的企业家，外表帅气且多金。 ​​​​</div>
                                                </div>
                                            </div>
                                            <div class="UG_list_c" action-type="feed_list_item" href="/a/hot/5da3df26d615dd0a_0.html?type=grab" suda-uatrack="key=www_unlogin_home&amp;value=hot02">
                                                <div class="pic W_piccut_v">
                                                    <a href="http://www.weibo.com/a/hot/5da3df26d615dd0a_0.html?type=grab" target="_blank"><img src="{{asset('home/indexsource/49fa6dc0ly1fkcuh71tx0j21w02iob2e(1).jpg')}}" alt=""></a>
                                                </div>
                                                <div class="list_des">
                                                    <h3 class="list_title_s"><a href="http://www.weibo.com/a/hot/5da3df26d615dd0a_0.html?type=grab" class="S_txt1" target="_blank">张杰 蔓越莓饼干</a></h3>
                                                    <div class="des_main S_txt2">早餐随便吃一点自己做的蔓越莓饼干[坏笑] ​​​​</div>
                                                </div>
                                            </div>
                                            <div class="UG_list_c" action-type="feed_list_item" href="/a/hot/10dd066fb7aafed3_0.html?type=grab" suda-uatrack="key=www_unlogin_home&amp;value=hot03">
                                                <div class="pic W_piccut_v">
                                                    <a href="http://www.weibo.com/a/hot/10dd066fb7aafed3_0.html?type=grab" target="_blank"><img src="{{asset('home/indexsource/b62aa910d5c5bea3b63970750671bb88.jpg')}}" alt=""></a>
                                                </div>
                                                <div class="list_des">
                                                    <h3 class="list_title_s"><a href="http://www.weibo.com/a/hot/10dd066fb7aafed3_0.html?type=grab" class="S_txt1" target="_blank">偶遇赵丽颖</a></h3>
                                                    <div class="des_main S_txt2">【#赵丽颖#云南拍戏被偶遇 白T黑裤烈日下忙不停】10月9日下午，有网友分享了在云南西双版纳傣族园偶遇赵丽颖拍戏的照片。照片中赵丽颖将短发摆在耳后，露出额头，身穿一件白色短袖T恤和黑色修身长裤，脚穿一双白色运动鞋，整体搭配虽简单但不失自信和漂亮。http://t.cn/ROVC5W4 http://t.cn/ROV0GgO ​​​​</div>
                                                </div>
                                            </div>
                                            <div class="UG_list_c" action-type="feed_list_item" href="/a/hot/31e1ea49cc7fdded_0.html?type=grab" suda-uatrack="key=www_unlogin_home&amp;value=hot04">
                                                <div class="pic W_piccut_v">
                                                    <a href="http://www.weibo.com/a/hot/31e1ea49cc7fdded_0.html?type=grab" target="_blank"><img src="{{asset('home/indexsource/b2664ecdly1fkd6fkmzn5j20j60d5whx.jpg')}}" alt=""></a>
                                                </div>
                                                <div class="list_des">
                                                    <h3 class="list_title_s"><a href="http://www.weibo.com/a/hot/31e1ea49cc7fdded_0.html?type=grab" class="S_txt1" target="_blank">苏炳添大婚</a></h3>
                                                    <div class="des_main S_txt2">中国飞人苏炳添今日大婚，祝福！[心][心][心] ​​​​</div>
                                                </div>
                                            </div>
                                            <div class="UG_list_c" action-type="feed_list_item" href="/a/hot/f3bdf5cfb16c3bf3_0.html?type=grab" suda-uatrack="key=www_unlogin_home&amp;value=hot05">
                                                <div class="pic W_piccut_v">
                                                    <a href="http://www.weibo.com/a/hot/f3bdf5cfb16c3bf3_0.html?type=grab" target="_blank"><img src="{{asset('home/indexsource/61e04755ly1fkcyimqnwpj20gl0bbgm9.jpg')}}" alt=""></a>
                                                </div>
                                                <div class="list_des">
                                                    <h3 class="list_title_s"><a href="http://www.weibo.com/a/hot/f3bdf5cfb16c3bf3_0.html?type=grab" class="S_txt1" target="_blank">小学开学一个月没翻开过课本</a></h3>
                                                    <div class="des_main S_txt2">【杭州一小学开学一个月没翻开过课本：先培养孩子纪律团队意识】杭州钱塘实验小学，今年9月刚投入使用，一年级共有9个班近400名孩子。9月份开学一整月没上“正课”，昨天才开始上语文的“天地人”。开学第一周，孩子们上午军训，下午绘本阅读、游戏、绘画；第二周去了低碳科技馆看球幕电影；第三周去孔 ​​​​</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="UG_box_foot">

                                        </div>
                                    </div>
                                    </div>
                                <div id="pl_unlogin_home_hotsearchkeywords"></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="WB_footer S_bg2">
                    <div class="footer_link clearfix">
                        <dl class="list">
                            <dt>微博精彩</dt>
                            <dd><a class="col1 S_txt2" href="http://hot.plaza.weibo.com/?bottomnav=1&amp;wvr=6&amp;type=re&amp;act=day">热门微博</a><a class="col1 S_txt2" href="http://huati.weibo.com/?bottomnav=1&amp;wvr=6">热门话题</a></dd>
                            <dd><a class="col1 S_txt2" href="http://verified.weibo.com/?bottomnav=1&amp;wvr=6">名人堂</a><a class="col1 S_txt2" href="http://vip.weibo.com/home?bottomnav=1&amp;wvr=6">微博会员</a></dd>
                            <dd><a class="col1 S_txt2" href="http://photo.weibo.com/?bottomnav=1&amp;wvr=6">微相册</a><a class="col1 S_txt2" href="http://game.weibo.com/?bottomnav=1&amp;wvr=6">微游戏</a></dd>
                            <dd><a class="col1 S_txt2" href="http://data.weibo.com/index/?bottomnav=1&amp;wvr=6">微指数</a></dd>
                        </dl>
                        <dl class="list">
                            <dt>手机玩微博</dt>
                            <dd><span class="T_code col2">
                    <img src="../indexsource/footer_code.jpg" alt="二维码"></span>
                                <a class="T_txt S_txt2 " href="http://m.weibo.cn/client/guide/show">扫码下载，更多版本<br>戳这里</a>
                            </dd>
                        </dl>
                        <dl class="list">
                            <dt>认证&amp;合作</dt>
                            <dd><a class="col3 S_txt2" href="http://verified.weibo.com/verify?bottomnav=1&amp;wvr=6">申请认证</a><a class="col3 S_txt2" href="http://open.weibo.com/connect?bottomnav=1&amp;wvr=6">链接网站</a></dd>
                            <dd><a class="col3 S_txt2" href="http://e.weibo.com/introduce/introduce?bottomnav=1&amp;wvr=6">企业微博</a><a class="col3 S_txt2" href="http://tui.weibo.com/?bottomnav=1&amp;wvr=6">广告服务</a></dd>
                            <dd><a class="col3 S_txt2" href="http://weibo.com/static/logo?bottomnav=1&amp;wvr=6">微博标识</a><a class="col3 S_txt2" target="_blank" href="http://tui.weibo.com/intro/agent?bottomnav=1&amp;wvr=6">广告代理商</a></dd>
                            <dd><a class="col3 S_txt2" href="http://open.weibo.com/?bottomnav=1&amp;wvr=6">开放平台</a></dd>
                        </dl>
                        <dl class="list">
                            <dt>微博帮助</dt>
                            <dd><a class="col4 S_txt2" target="_blank" href="http://help.weibo.com/faq/q/358?bottomnav=1&amp;wvr=6">常见问题</a></dd>
                            <dd><a class="col4 S_txt2" target="_blank" href="http://help.weibo.com/selfservice?bottomnav=1&amp;wvr=6">自助服务</a></dd>
                        </dl>
                    </div>
                    <div class="other_link S_bg1 clearfix">
                        <p class="copy"><a target="_blank" href="http://help.weibo.com/?refer=didao&amp;bottomnav=1&amp;wvr=6" class="S_txt2"><i class="W_icon icon_weibo"></i>微博客服</a><a class="S_txt2" target="_blank" href="http://help.weibo.com/newtopic/suggest?bottomnav=1&amp;wvr=6">意见反馈</a><a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/report.html?_wv=6">舞弊举报</a><a class="S_txt2" target="_blank" href="http://open.weibo.com/?bottomnav=1&amp;wvr=6">开放平台</a><a class="S_txt2" target="_blank" href="http://hr.weibo.com/?bottomnav=1&amp;wvr=6">微博招聘</a><a class="S_txt2" target="_blank" href="http://news.sina.com.cn/guide/?bottomnav=1&amp;wvr=6">新浪网导航</a><a class="S_txt2" target="_blank" href="http://service.account.weibo.com/?bottomnav=1&amp;wvr=6">举报处理大厅</a>
                           
                        <p class="copy_v2"><a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/jicp.html?_wv=6">京ICP证100780号</a><a class="S_txt2" href="http://weibo.com/aj/static/medi_license.html?_wv=6" target="__blank">互联网药品服务许可证</a><a class="S_txt2" href="http://weibo.com/aj/static/medi_health_license.html?_wv=6" target="__blank">互联网医疗保健许可证</a><a class="S_txt2" href="http://weibo.com/aj/static/jww.html?_wv=6" target="__blank">京网文[2014]2046-296号</a> <a class="S_txt2" href="http://www.miibeian.gov.cn/" target="__blank">京ICP备12002058号</a> <a class="S_txt2" href="http://weibo.com/aj/static/license.html?_wv=6" target="__blank">增值电信业务经营许可证B2-20140447</a>
                        </p>
                        <p class="company"><span class="copy S_txt2">Copyright © 2009-2017 WEIBO 北京微梦创科网络技术有限公司</span><span><a class="S_txt2" target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11000002000019"><i class="icon_netsecurity"></i>京公网安备11000002000019号</a>
            </span></p>
                    </div>
                </div>
                <a class="W_gotop S_ficon_bg" id="base_scrollToTop" href="javascript:void(0);" style="visibility: hidden; transform: translateZ(0px); position: fixed; bottom: 40px; top: auto;"><em class="W_ficon ficon_backtop S_bg2_c">Ú</em></a>
                <a class="W_gotop S_ficon_bg  U_reload" id="base_reload" href="javascript:void(0);" style="visibility: visible; position: fixed; bottom: 90px; top: auto; transform: translateZ(0px);"><em class="W_ficon ficon_reload S_bg2_c">ù</em></a>
            </div>
        </div>
    </div>
    <div id="v6_pl_base"></div>


</div><div node-type="layer" class="layer_menu_list" style="display:none;">

</div>

<script type="text/javascript">
    //轮播图效果
    var ind = 1;
    var into = null;
    function moves(){
        into = setInterval(function(){
            shows(ind++);
            if(ind > 4){
                ind = 0;
            }
        },7000);
    }
    moves();
    function shows(i){
        var l = i * -660;
        $('#uls').animate({
            marginLeft:l+'px'
        },1000)

        //第四步
        $('#ids a').eq(i).addClass('current');
        $('#ids a').eq(i).siblings().removeClass('current');
    }
    shows(0)
    //鼠标以上去和移出来  第五步
    $('#ids a').hover(function(){
        //获取图片对应的索引
        ind = $(this).index();

        shows(ind++);

        //清除定时器
        clearInterval(into);

    },function(){
        //第六步
        moves();
        if(ind > 4){
            ind = 0;
        }
    })
</script>
<script>
    //获取更多
    var len=$(":input[name='take_len']").attr('value');
            if(len<10){
                    $('#moretips').css("display","none");
            }
    var field_id=$(":input[name='take_field_id']").attr('value');
    var search=$(":input[name='take_search']").attr('value');
    var n=1;
    $('#moretips').click(function(){

        $.get('/home/more',{n:n,id:field_id,f:search},function(data){
            if(data==''){
                $('#moretips').css("display","none");
            }else{
                $('#feedbegin').append(data);
            }

        });
        n++;
    });
</script>
<script>
    //登录框提交
    $('#button').click(function(){

        //获取用户输入的用户名和密码
        var name = $('#loginname').val();
        var passwd = $('#loginpasswd').val();
        var homeCode=$('#homeCode').val();
        if(name == '' || passwd =='')
        {
            // layer.tips('用户密码不能为空', {
            // 		  tips: [1, '#3595CC'],
            // 		  time: 4000
            // 		});
            layer.msg('用户名密码不能为空');
        }else{
            $.post("/home/dologin", {"_token":"{{csrf_token()}}",name: name,homeCode:homeCode,passwd:passwd },function(data){


                if(data == '用户名不存在'|| data=='密码不正确' || data=='验证码输入错误' )
                {
                    layer.msg(data);
                }else{

                    location.href=data;  //跳转页面
                }

            });
        }

    })
</script>



</body></html>