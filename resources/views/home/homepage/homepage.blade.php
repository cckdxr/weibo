<!DOCTYPE html>
<html>
<head><script src="about:blank" async="" charset="utf-8" type="text/javascript"></script><script src="about:blank" async="" charset="utf-8" type="text/javascript"></script><script src="about:blank" charset="UTF-8" type="text/javascript"></script>
<meta charset="UTF-8">
<meta content="ifree的马甲，ifree的马甲的微博，微博，新浪微博，weibo" name="keywords">
<meta content="ifree的马甲。ifree的马甲的微博主页、个人资料、相册。新浪微博，随时随地分享身边的新鲜事儿。" name="description">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="viewport" content="initial-scale=1,minimum-scale=1">
<link rel="dns-prefetch" href="http://img.t.sinajs.cn/">
<link rel="dns-prefetch" href="http://img1.t.sinajs.cn/">
<link rel="dns-prefetch" href="http://js.t.sinajs.cn/">
<link rel="dns-prefetch" href="http://js1.t.sinajs.cn/">
<link rel="dns-prefetch" href="http://js2.t.sinajs.cn/">
<link rel="dns-prefetch" href="http://biz.weibo.com/">
<link rel="dns-prefetch" href="http://beacon.sina.com.cn/">
<link rel="dns-prefetch" href="http://rs.sinajs.cn/">
<link rel="dns-prefetch" href="http://tp1.sinaimg.cn/">
<link rel="dns-prefetch" href="http://tp2.sinaimg.cn/">
<link rel="dns-prefetch" href="http://tp3.sinaimg.cn/">
<link rel="dns-prefetch" href="http://tp4.sinaimg.cn/">
<link rel="dns-prefetch" href="http://ww1.sinaimg.cn/">
<link rel="dns-prefetch" href="http://ww2.sinaimg.cn/">
<link rel="dns-prefetch" href="http://ww3.sinaimg.cn/">
<link rel="dns-prefetch" href="http://ww4.sinaimg.cn/">
   <script type="text/javascript" src='/home/css/index/lunbo/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='/layer/layer.js'></script>
<link rel="mask-icon" sizes="any" href="http://img.t.sinajs.cn/t6/style/images/apple/wbfont.svg" color="black">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link href="{{asset('home/userindexsource/frame.css')}}" type="text/css" rel="stylesheet" charset="utf-8">
<link href="{{asset('home/userindexsource/home_A.css')}}" type="text/css" rel="stylesheet" charset="utf-8">
<link id="skin_style" href="{{asset('home/userindexsource/skin.css')}}" type="text/css" rel="stylesheet" charset="utf-8">

<title>{{session('userinfo')['nick_name']}}的微博_微博</title>
<link type="text/css" rel="stylesheet" charset="utf-8" href="/home/css/homepage/frame.css" putoff="style/css/module/combination/extra.css?version=6544d51df12824cf">
<link type="text/css" rel="stylesheet" charset="utf-8" href="/home/css/homepage/PCD_profile_home_A.css" includes="style/css/module/pagecard/PCD_counter.css?version=6544d51df12824cf|style/css/module/pagecard/PCD_person_info.css?version=6544d51df12824cf|style/css/module/pagecard/PCD_user_a.css?version=6544d51df12824cf|style/css/module/pagecard/PCD_pictext_a.css?version=6544d51df12824cf|style/css/module/pagecard/PCD_piclist_a.css?version=6544d51df12824cf|style/css/module/pagecard/PCD_mydata.css?version=6544d51df12824cf|style/css/module/pagecard/PCD_photolist.css?version=6544d51df12824cf|style/css/module/list/comb_WB_feed_profile.css?version=6544d51df12824cf|style/css/module/global/WB_timeline.css?version=6544d51df12824cf|style/css/module/pagecard/PCD_profileme.css?version=6544d51df12824cf|style/css/module/tab/comb_WB_tab_profile.css?version=6544d51df12824cf|style/css/module/list/comb_webim.css?version=6544d51df12824cf">
		<link type="text/css" rel="stylesheet" charset="utf-8" href="/home/css/homepage/skin.css" id="skin_style">
	<script type="text/javascript">/* Code removed by ScrapBook */</script>
<script type="text/javascript">
    function show_setbox(){
        $("#user_set_box").css("display","block");
    }
    $(window).live('click',function(){
        $("#user_set_box").css("display","none");
    })


    $(function(){
        //单击收藏
        $("a[action_id='collect_but']").each(function () {
            var msg_id = $(this).attr('msgtitle');
            var e=$(this);
            $(this).live('click',function () {
                $(this).find('em:eq(0)').removeClass("S_ficon").addClass('S_spetxt');
                $(this).find('em:eq(1)').html("已收藏");
                $.ajax({
                    type: "get",
                    url: "../u/docollect",
                    data: "msg_id="+msg_id,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if(data!='已收藏'&& data!='存储失败'){
                            e.find('em:eq(2)').html(data);
                        }else{
                            alert(data);
                        }

                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("收藏失败，请检查网络后重试");
                    }
                })
            })
        })
    //单击点赞
        $("a[action_id='like_but']").each(function () {
            var msg_id = $(this).attr('msgtitle');
            var e=$(this);
            $(this).live('click',function () {
                $(this).find("span[node-type='like_status']").addClass('UI_ani_praised');

                $.ajax({
                    type: "get",
                    url: "../u/dolike",
                    data: "msg_id="+msg_id,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if(data!='已赞'&& data!='存储失败'){
                            e.find('em:eq(1)').html(data);
                        }else{
                            alert(data);
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("收藏失败，请检查网络后重试");
                    }
                })
            })
        })

        //单击评论
        $("a[action_id='reply_but']").each(function () {
            $(this).live('click',function(){

                $(this).parents(".WB_feed_like").children(".feed_list_repeat").css("display",'block');
                $(this).parents(".WB_feed_like").children(".feed_list_repeat")
            })

        })

        //单击发布微博评论
        $("a[action-id='post_dismsg']").each(function(){
            $(this).live('click',function(){
                var e=$(this);
                var discontent= $(this).parents(".WB_Publish").find(".W_Input").val();
                var msg_id=$(this).attr('dis-data');

                if( discontent !='' ){

                    $.ajax({
                        type: "get",
                        url: "../u/dodis",
                        data: {'msg_id':msg_id,'discontent':discontent},
                        contentType: false,
                        success: function (data) {
                            if(data!='评论失败'){
                                e.parents(".WB_feed_repeat_v3").find("div[node-type='feed_list_commentList']").prepend(data);
                                e.parents(".WB_Publish").find(".W_Input").val('');
                            }else{
                                alert(data);
                            }

                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert("评论失败，请检查网络后重试");
                        }
                    })
                }

            })
        })
        //单击回复微博
        $("a[action-id='post_redismsg']").each(function(){
            $(this).live('click',function(){
                var con=$(this).attr('action-con');
                var username=$(this).attr('action-username');
                console.log(username);
                var dis_id=$(this).attr('action-disid');
                var old= $(this).parents(".WB_Repeat").find(".W_Input").val();
                var new1=old+'回复@'+username+':'+con+':';
                console.log(new1);
                $(this).parents(".WB_Repeat").find(".W_Input").val(new1);

            })
        })
        //单击删除微博评论
        $("a[action-id='post_deldismsg']").each(function(){
            $(this).live('click',function(){
                var e=$(this);
                var msg_id=$(this).attr('action-msgid');
                var dis_id=$(this).attr('action-disid');
                var dis_userid=$(this).attr('action-userid');
                $.ajax({
                    type: "get",
                    url: "../u/deldis",
                    data:{'msg_id':msg_id,'dis_id':dis_id,'dis_userid':dis_userid},
                    contentType: false,

                    success: function (data) {
                        if(data!='删除失败'){
                            e.parents("div[comment_id]").remove();
                        }else{
                            alert(data);
                        }

                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("删除评论失败，请检查网络后重试");
                    }
                })

            })
        })
        //单击转发
        $("a[action-id='tran_but']").each(function(){
            $(this).live('click',function(){

                $('#layer_150779').css('display','block');
                //父msgid
                var msgpid=$(this).attr('msgtitle');


                var username=$(this).attr('magname');
                var content=$(this).attr('msgcontent');
                //记录转发过程
                var msgtran=$(this).attr('msgtran');
                //组装
                var str ='转发自<a href="" class="S_txt1">@'+username+'</a>:'+content+msgtran;
                //组装字符串放入转发框
                $('#layer_150779').find('.content_text').html(str);
                //记录转发原图片
                var msgpic=$(this).attr('msgpic');

                layer.open({
                    type: 1,
                    title: false ,
                    closeBtn: true,
                    shadeClose: true,
                    area: ['580','270'],
                    shade: 0.8,
                    id: 'LAY_layuipro' ,
                    btnAlign: 'c',
                    moveType: 1,
                    content:$('#layer_150779'),
                    success: function (layero) {

                    }
                })

                $('#layer_150779').find(".W_btn_a").live('click',function(){
                    var msgtitle= $('#layer_150779').find("textarea").val();

                    $.ajax({
                        type: "get",
                        url: "../u/dotran",
                        data: {'msgpid':msgpid,'msg_title':str,'msgtitle':msgtitle,'msg_topimg':msgpic,'msg_digest':str},
                        contentType: false,
                        success: function (data) {
                            if(data!='转发失败'){
                                $('#layer_150779').find('.send_succpic').css('display','block');
                                window.location.reload();
                            }else{
                                alert(data);
                            }

                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert("评论失败，请检查网络后重试");
                        }
                    })

                })
            })
        })

        //查看更多
        var len=$(":input[name='take_len']").attr('value');
        var userid=$(":input[name='take_user']").attr('value');

        if(len<10){
            $('#moretips').css("display","none");
        }
        var n=1;
        $('#moretips').live('click',function(){

            $.get('/home/u/homemore',{n:n,userid:userid},function(data){
                if(data==''){
                    $('#moretips').css("display","none");
                }else{
                    $('#feedbegin').append(data);
                }

            });
            n++;
        });

        //单击显示举报删除微博框
        $('a[action-id="show-list"]').each(function(){
            $(this).live('click',function(){
                $(this).next().css('display','block');
            })
        })
        //单击取消显示
        $('a[action-id="quxiao"]').each(function(){
            $(this).live('click',function(){
                $(this).parents(".layer_menu_list").css('display','none');
            })
        })
        //单击举报
        $('a[action-id="jubao"]').each(function(){
            $(this).live('click',function(){
                var e=$(this);
                layer.msg('是否举报此微博<br>请谨慎使用举报功能', {
                    time: 5000, //5s后自动关闭
                    btn: ['是的', '取消'],
                    yes: function(){
                        //发送ajax举报
                        msgid=e.attr('action-data');
                        $.post("/home/jubao",{msgid:msgid},function(data){
                            if(data!='举报失败'){
                                layer.open({
                                    type: 1
                                    ,offset: 'auto'
                                    ,id: 'layerDemo'+'auto'
                                    ,content: '<div style="padding: 20px 100px;">'+ '举报成功'+'</div>'
                                    ,btn: '关闭全部'
                                    ,btnAlign: 'c' //按钮居中
                                    ,shade: 1 //不显示遮罩
                                    ,yes: function(){
                                        layer.closeAll();
                                    }
                                });
                                e.parents(".layer_menu_list").css('display','none');
                            }else {
                                alert(data);
                            }
                        });
                    },
                    btn2:function () {
                        e.parents(".layer_menu_list").css('display','none');
                    }
                })


            });
        })
        //单击删除微博
        $('a[action-id="delect"]').each(function(){
            $(this).live('click',function(){
                var e=$(this);
                layer.msg('是否删除此微博<br>删除后不可恢复', {
                    time: 5000, //5s后自动关闭
                    btn: ['是的', '取消'],
                    yes: function(){
                        //发送ajax删除
                        msgid=e.attr('action-data');
                        $.post("/home/delete",{msgid:msgid},function(data){
                            if(data!='删除失败'){
                                layer.open({
                                    type: 1
                                    ,offset: 'auto'
                                    ,id: 'layerDemo'+'auto'
                                    ,content: '<div style="padding: 20px 100px;">'+ '删除成功'+'</div>'
                                    ,btn: '关闭全部'
                                    ,btnAlign: 'c' //按钮居中
                                    ,shade: 1 //不显示遮罩
                                    ,yes: function(){
                                        layer.closeAll();
                                        setTimeout(function(){
                                            location.reload(true);
                                        },1000);
                                    }
                                });
                                e.parents(".layer_menu_list").css('display','none');
                            }else {
                                alert(data);
                            }
                        });
                    },
                    btn2:function () {
                        e.parents(".layer_menu_list").css('display','none');
                    }
                })


            });
        })
    })





</script>
<!-- $CONFIG -->
<script type="text/javascript">/* Code removed by ScrapBook */</script>
<!-- / $CONFIG -->
<link id="FM_150822705446018" href="/home/css/homepage/PCD_pictext_f.css" type="text/css" rel="stylesheet"><div style="position: absolute; top: -9999px;"><div id="js_http:__img.t.sinajs.cn_t6_style_css_apps_PCD_event_WB_feed_spec_red2017"></div><div id="js_http:__img.t.sinajs.cn_t4_appstyle_vip_v2_css_apps_PRF_v6fansclub_Pl_Third_RightClub"></div></div><style>
/* Code tidied up by ScrapBook */
.UI_scrollView .UI_scrollContent { position: relative; height: 100%; width: 100%; overflow-y: scroll; overflow-x: hidden; margin-right: -30px; padding-right: 30px; }
.UI_scrollView .UI_scrollContainer { overflow: hidden; width: 100%; height: 100%; position: relative; }
</style><link id="FM_150822705446023" href="/home/css/homepage/WB_feed_spec_red2017.css" type="text/css" rel="stylesheet"><link id="FM_150822705446025" href="/home/css/homepage/PCD_pictext_h.css" type="text/css" rel="stylesheet"><link id="FM_150822705446030" href="/home/css/homepage/PCD_ut_a.css" type="text/css" rel="stylesheet"><style>
/* Code tidied up by ScrapBook */
.UI_scrollView .UI_scrollContent { position: relative; height: 100%; width: 100%; overflow-y: scroll; overflow-x: hidden; margin-right: -30px; padding-right: 30px; }
.UI_scrollView .UI_scrollContainer { overflow: hidden; width: 100%; height: 100%; position: relative; }
</style><link id="FM_150822705446033" href="/home/css/homepage/Pl_Third_RightClub.css" type="text/css" rel="stylesheet"><link id="FM_150822705446036" href="/home/css/homepage/PCD_feed.css" type="text/css" rel="stylesheet"><link rel="stylesheet" type="text/css" href="/home/css/homepage/extra.css"><link href="/home/css/homepage/PCD_mplayer.css" charset="utf-8" type="text/css" rel="Stylesheet"><div style="position: absolute; top: -9999px; left: -9999px;"></div></head>
<body class="FRAME_page B_page S_page">
<input  type="hidden" name="take_len" value="{{$len}}" >
<input  type="hidden" name="take_user" value="{{$name}}" >


  <div class="WB_miniblog">
    <div class="WB_miniblog_fb">
        <div id="plc_top"><!--简易顶部导航拼页面用-->
            <div class="WB_global_nav WB_global_nav_v2 UI_top_hidden " node-type="top_all" action-data="publish2000=1">
                <div class="gn_header clearfix">
                    <!-- logo -->
                    <div class="gn_logo" node-type="logo" data-logotype="logo" data-logourl="//weibo.com?topnav=1&amp;mod=logo">
                        <a href="http://weibo.com/u/5462231537/home?topnav=1&amp;wvr=6&amp;mod=logo" class="box" title="" node-type="logolink" bpfilter="main" suda-uatrack="key=topnav_tab&amp;value=weibologo">
                            <span class="logo"></span>
                        </a>
                    </div>
                    <!-- logo -->

                    <div class="gn_position">
                        <div class="gn_nav">
                            <ul class="gn_nav_list">
                                <li><a href="{{url('home/index')}}"><em class="W_ficon ficon_home S_ficon">E</em><em class="S_txt1">首页</em></a></li>

                                <li><a dot="pos55b9e0848171d" bpfilter="page_frame" href="{{url('home/u/index')}}"><em class="W_ficon ficon_user S_ficon">H</em><em class="S_txt1">{{session('homeUser')['nick_name']}}</em></a></li>
                                <li><a node-type="loginBtn" href="{{url('home/logout')}}" class="S_txt1" target="_top">退出登录</a></li>
                            </ul>
                        </div>
                        <div class="gn_set S_line1">

                            <div class="gn_set_list"><a href="javascript:show_setbox();" id="show_setbox"><em class="W_ficon ficon_set S_ficon">*</em></a>
                                <div class="gn_topmenulist gn_topmenulist_set" id="user_set_box" node-type="accountLayer" style="display:none"><!--data start-->
                                    <ul>
                                        <li><a href="{{url('/home/homepage')}}" suda-data="key=account_setup&amp;value=account_setup">会员中心</a></li>
                                        <li><a href="{{url('/home/myinfo')}}" suda-data="key=account_setup&amp;value=account_setup">个人信息</a></li>
                                        <li><a href="{{url('/home/fans')}}" suda-data="key=account_setup&amp;value=account_setup">我的粉丝</a></li>
                                        <li><a href="{{url('/home/myatt')}}" suda-data="key=account_setup&amp;value=account_setup">我的关注</a></li>
                                        <li class="line S_line1"></li>
                                        <li class="gn_func"><a target="_top" suda-data="key=account_setup&amp;value=quit" href="{{url('/home/logout')}}">退出</a></li></ul><div class="W_layer_arrow"><span class="W_arrow_bor W_arrow_bor_t"><i class="S_line3"></i><em class="S_bg2_br"></em></span></div></div>
                            </div>

                            <!--下拉层-->

                            <!--/下拉层-->
                        </div>
                    </div>
                </div>
            </div>
            <!--/简易顶部导航拼页面用-->
        </div>
            <div class="WB_main clearfix" id="plc_frame"><div class="WB_frame">

        	<div class="WB_frame_a">
            	<div id="Pl_Official_Headerv6__1"><div class="PCD_header">
				<div class="pf_wrap" layout-shell="false" node-type="cover_wrap">
				<div class="cover_wrap banner_transition" node-type="cover" cover-type="3">
				</div>
				<div class="shadow " layout-shell="false">
						<div class="pf_photo" node-type="photo">
						<p class="photo_wrap">
						 						 	<img src="{{$data['user_headpic']}}" alt="ifree的马甲" class="photo">

						</p>
													</div>

						<div class="pf_username">
						<h1 class="username">{{$data['user_name']}}</h1>
																																<span class="icon_bed"><a><i class="W_icon icon_pf_male"></i></a></span>
						</div>


												<div class="pf_intro">
						他还没有填写个人简介						</div>
												<div class="pf_opt" diss-data="wforce=1&amp;refer_sort=profile&amp;refer_flag=profile_head">
							<div class="opt_box clearfix">

						@if($flag ==1)

						<div class="btn_bed W_fl"><a href='javascript:;'  id='already_att' title='取消关注' class="W_btn_d btn_34px" name='{{$name}}' >已经关注</a></div>

                                @else
								<div class="btn_bed W_fl" node-type="focusLink" >
																<a href='javascript:;' id='no_att' name='{{$name}}'  class="W_btn_c btn_34px"><em class="W_ficon ficon_right S_ficon">Y</em><em class="W_vline S_line1"></em><em class="W_ficon ficon_add" >+</em>关注</a>
																</div>

						@endif

								<div class="btn_bed W_fl"><a action-type="webim.conversation" action-data="uid=5462231537&amp;nick=ifree的马甲" class="W_btn_d btn_34px" suda-uatrack="key=tblog_profile_v6&amp;value=private_letter">私信</a></div>
								<div class="btn_bed W_fl"><a node-type="more" class="W_btn_d W_btn_pf_menu btn_34px"><em class="W_ficon ficon_menu S_ficon">=</em></a></div>
							</div>
						</div>
											</div>
																																			</div>
			</div>

</div>
                    	<div id="Pl_Official_Nav__2" name="place" anchor="-50"><div class="PCD_tab S_bg2">
	<div class="tab_wrap" style="width: 60%;">
		<table class="tb_tab" cellpadding="0" cellspacing="0">
			<tbody><tr>
							<td class="current">
					<a otherhref="http://weibo.com/u/5462231537?refer_flag=1005050005_" bpfilter="page" href="http://weibo.com/p/1005055462231537/home?from=page_100505&amp;mod=TAB#place" node-type="nav_link" suda-uatrack="key=tblog_profile_new&amp;value=tab_profile" class="tab_link">
						<span class="S_txt1 t_link">他的主页</span>
						<span class="ani_border"></span>
					</a>
				</td>
							<td>
					<a bpfilter="page" href="" node-type="nav_link" suda-uatrack="key=tblog_profile_new&amp;value=tab_photos" class="tab_link">
						<span class="S_txt1 t_link"></span>
						<span class="ani_border"></span>
					</a>
				</td>
						</tr>
		</tbody></table>
	</div>
</div>
</div>
    	    </div>
    		<div id="plc_main" >		<div class="WB_frame_b" fixed-box="true" fixed-random="false">
					<div id="Pl_Core_T8CustomTriColumn__3" anchor="-50">	<div class="WB_cardwrap S_bg2">
						<div class="PCD_counter">
							<div class="WB_innerwrap">
								<table class="tb_counter" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
																					<td class="S_line1">
																						<a bpfilter="page_frame" class="t_link S_txt1" href="javascript:;"><strong class="W_f18">{{@$attention}}</strong><span class="S_txt2">关注</span></a></td>
																																<td class="S_line1">
																						<a bpfilter="page_frame" class="t_link S_txt1" href="javascript:;"><strong class="W_f18">{{$fans}}</strong><span class="S_txt2">粉丝</span></a></td>
																																<td class="S_line1">
																						<a bpfilter="page_frame" class="t_link S_txt1" href="javascript:;"><strong class="W_f18">{{$infos}}</strong><span class="S_txt2">微博</span></a></td>
																															</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
</div>
					<div id="Pl_Core_ThirdHtmlData__4" anchor="-50"></div>
					<div id="Pl_Third_Inline__5" anchor="-50"></div>
					<div id="Pl_Core_UserInfo__6" anchor="-50"><div class="WB_cardwrap S_bg2" fixed-inbox="true" node-type="sigleProfileUsrinfo" fixed-mutex="false">
    <!-- v6 card 通用标题 -->
	<div class="PCD_person_info">

		<div class="WB_innerwrap">
			<div class="m_wrap">
							<div class="detail">
					<ul class="ul_detail">
											<li class="item S_line2 clearfix">
									<span class="item_ico W_fl"><em class="W_ficon ficon_starmark S_ficon">Û</em></span>
									<span class="item_text W_fl"><a class="W_icon_level icon_level_c2" title="微博等级6" href="javascript:;" target="_black"><span>{{$data['user_level']}}</span></a></span>
						</li>
										    					    						<li class="item S_line2 clearfix">
						        						<span class="item_ico W_fl"><em class="W_ficon ficon_cd_place S_ficon">2</em></span>
    						    						<span class="item_text W_fl">
    						    						    						    							{{$data['city']}} 						    						</span>
						</li>
																	    						<li class="item S_line2 clearfix">
						        						<span class="item_ico W_fl"><em class="W_ficon ficon_constellation S_ficon">ö</em></span>
    						    						<span class="item_text W_fl">
    						    						    						    							{{$data['born']}}  						    						</span>
						</li>
																	    						<li class="item S_line2 clearfix">
						        						<span class="item_ico W_fl"><em class="W_ficon ficon_cd_coupon S_ficon">T</em></span>
    						    						<span class="item_text W_fl">
    						    						<span class="S_txt2">标签</span>
    						    						    						    						    						    							<a target="_blank" href="http://s.weibo.com/user/&amp;tag=%E5%85%AB%E5%8D%A6%E6%9D%82%E8%B0%88&amp;from=profile&amp;wvr=6">八卦杂谈</a>
    						    						    						</span>
						</li>
																	</ul>
				</div>
						</div>
		</div>
		<a class="WB_cardmore S_txt1 S_line1 clearfix" href="http://weibo.com/p/1005055462231537/info?mod=pedit_more" bpfilter="page_frame">
	<span class="more_txt">查看更多&nbsp;<em class="W_ficon ficon_arrow_right S_ficon">a</em></span>
</a>

	</div>
</div>
</div>
					<div id="Pl_Third_Inline__7" anchor="-50"></div>
					<div id="Pl_Core_UserGrid__8" anchor="-50"></div>
					<div id="Pl_Core_Pt13PicText__9" anchor="-50"></div>

					<div id="Pl_Core_Pt6Rank__11" anchor="-50">			</div>
					<div id="Pl_Core_UserGrid__12" anchor="-50"><div class="WB_cardwrap S_bg2">
<div class="PCD_user_a PCD_user_a1"></div>
</div>
</div>
					<div id="Pl_Core_PicText__13" anchor="-50"></div>
					<div id="Pl_Core_Ut1UserList__14" anchor="-50"></div>
					<div id="Pl_Official_LikeMerge__15" anchor="-50">
<div class="WB_cardwrap S_bg2">
				<div class="PCD_pictext_f"></div>
			</div>
</div>
					<div id="Pl_Official_MyPopularity__16" anchor="-50"></div>
					<div id="Pl_Guide_Bigday__17" anchor="-50"></div>
					<div id="Pl_Official_SeoInfo__18" anchor="-50"></div>
					<div id="Pl_Core_RecommendFeed__19" anchor="-50">        <!--模块-->

<div style="visibility: hidden;"></div><div style="z-index: 10; transform: translateZ(0px); position: relative; transition: margin-top 0.3s ease 0s; width: 300px;"></div>


</div>
			</div>
	<div class="WB_frame_c" fixed-box="true">
					<div id="Pl_Official_ProfileFeedNav__20" anchor="-50">     <div style="visibility: hidden;"></div><div class=" " style="z-index: 10; transform: translateZ(0px); position: relative; transition: margin-top 0.3s ease 0s; width: 600px;"><div fixed-id="5" class="WB_tab_a" node-type="feed_nav" fixed-item="true" style="position: relative; box-shadow: none;">
        <div class="tab_box tab_box_c S_bg1 clearfix">
            <ul class="tab W_fl">

                <li class="tab_li curr S_bg2" node-type="tab_hot" action-type="search_type" action-data="profile_ftype=1&amp;is_hot=1">
                    <a suda-uatrack="key=tblog_profile_v6&amp;value=topnav" class="S_txt1 S_line1"><em class="W_ficon ficon_hot S_ficon">ì</em>他的微博</a>
                    <span class="ani_border"></span>
                </li>

            </ul>
            <div class="fr_box W_fr" node-type="search_adv_rightbar">
                <div style="display: none;" class="search_box W_fr" node-type="input_search">
                    <span class="WB_search_s">
                    <form method="get" action="" node-type="singleForm">
                        <input node-type="keyword" name="key_word" class="W_input" value="搜索他的微博" notice="搜索他的微博" type="text"><span class="pos"><a action-type="search_key" title="搜索" class="W_ficon ficon_search S_ficon S_ficon_dis" suda-uatrack="key=tblog_profile_v6&amp;value=search">f</a><a class="W_ficon ficon_arrow_down_lite S_ficon" suda-data="key=tblog_otherprofile_v4&amp;value=advanced_search" action-type="search_adv" action-data="type=0" title="高级搜索">g</a></span>
                    </form>
                    </span>
                </div>
            </div>
            <div class="layer_menu_list" style="position: absolute; top: 810px; left: 820px; z-index: 99; display: none;" node-type="feed_nav_adv">
            <ul>
              <li action-type="search_type" filter-type-inlayer="ori" node-type="search_type" action-data="profile_ftype=1&amp;is_ori=1" suda-uatrack="key=tblog_profile_v6&amp;value=orig"><a>原创</a></li>
              <li action-type="search_type" filter-type-inlayer="pic" node-type="search_type" action-data="profile_ftype=1&amp;is_pic=1" suda-data="key=tblog_profile_new&amp;value=weibo_pic"><a>图片</a></li>
              <li action-type="search_type" filter-type-inlayer="video" node-type="search_type" action-data="profile_ftype=1&amp;is_video=1" suda-uatrack="key=tblog_profile_v6&amp;value=video"><a>视频</a></li>
              <li action-type="search_type" filter-type-inlayer="music" node-type="search_type" action-data="profile_ftype=1&amp;is_music=1" suda-uatrack="key=tblog_profile_v6&amp;value=music"><a>音乐</a></li>
              <li action-type="search_type" filter-type-inlayer="article" node-type="search_type" action-data="profile_ftype=1&amp;is_article=1" suda-uatrack="key=tblog_profile_v6&amp;value=article"><a>文章</a></li>
              <li action-type="search_type" filter-type-inlayer="tag" node-type="search_type" action-data="profile_ftype=1&amp;is_tag=1" suda-uatrack="key=tblog_profile_v6&amp;value=tag"><a>标签</a></li>
                          </ul>
            </div>
        </div>
    </div><div style="height: 1px; margin-top: -1px; visibility: hidden;"></div></div>
    <div style="display: none;" class="WB_cardwrap S_bg2 feed_pop_search" node-type="search">
        <div class="WB_cardtitle_b S_line2">
            <div class="obj_name"><h2 class="main_title W_fb W_f14">高级搜索</h2></div>
            <div class="opt_box">
                <a action-type="search_adv" action-data="type=1" class="W_ficon ficon_close S_ficon">X</a>
            </div>
        </div>
        <div class="WB_innerwrap">
            <div class="m_wrap">
            <div class="form_table_s">
                <form method="get" action="" node-type="searchForm">
                    <dl class="f_normal clearfix">
                    <dt class="f_tit">类　型：</dt>
                    <dd class="f_con">
                        <span class="f_ipt">
                            <label for="is_ori" class="W_label"><input name="is_ori" value="1" id="is_ori" checked="checked" class="W_checkbox" suda-data="key=tblog_otherprofile_page&amp;value=check_original" type="checkbox"><span>原创</span></label>
                            <label for="is_forward" class="W_label"><input name="is_forward" value="1" id="is_ori" checked="checked" class="W_checkbox" suda-data="key=tblog_otherprofile_page&amp;value=check_transfer" type="checkbox"><span>转发</span></label>
                            <label for="is_text" class="W_label"><input name="is_text" value="1" id="is_text" checked="checked" class="W_checkbox" suda-data="key=tblog_otherprofile_page&amp;value=check_text" type="checkbox"><span>纯文字</span></label>
                            <label for="is_pic" class="W_label"><input name="is_pic" value="1" id="is_pic" checked="checked" class="W_checkbox" suda-data="key=tblog_otherprofile_page&amp;value=check_picture" type="checkbox"><span>含图片</span></label>
                            <label for="is_video" class="W_label"><input name="is_video" value="1" id="is_video" checked="checked" class="W_checkbox" suda-data="key=tblog_otherprofile_page&amp;value=check_video" type="checkbox"><span>含视频</span></label>
                            <label for="is_music" class="W_label"><input name="is_music" value="1" id="is_music" checked="checked" class="W_checkbox" suda-data="key=tblog_otherprofile_page&amp;value=check_music" type="checkbox"><span>含音乐</span></label>
                            <label for="is_article" class="W_label"><input name="is_article" value="1" id="is_article" checked="checked" class="W_checkbox" suda-data="key=zhuzhan_advance_search&amp;value=profile_article" type="checkbox"><span>含文章</span></label>
                        </span>
                    </dd>
                    </dl>
                    <dl class="f_normal clearfix">
                        <dt class="f_tit">关键字：</dt>
                        <dd class="f_con"><span class="f_ipt"><input node-type="keyword" class="W_input w1" value="搜他的微博" id="key_word" notice="搜他的微博" name="key_word" type="text"></span></dd>
                    </dl>
                    <dl class="f_normal clearfix">
                        <dt class="f_tit">时　间：</dt>
                        <dd class="f_con"><span class="f_ipt"><input action-type="search_date" action-data="type=1" value="" class="W_input w2" id="start_time" def="点击选择日期" name="start_time" readonly="true" type="text"><i class="t1">到</i><input class="W_input w2" action-type="search_date" action-data="type=2" value="2017-10-17" def="点击选择日期" id="end_time" name="end_time" readonly="true" type="text"></span></dd>
                    </dl>
                    <dl class="f_btn">
                        <dd class="f_con"><a class="W_btn_a" action-type="search_button" suda-uatrack="key=tblog_profile_v6&amp;value=senior_search">搜索</a></dd>
                    </dl>
                </form>
            </div>
            </div>
        </div>
    </div>
    <div style="display: none;" class="WB_cardwrap WB_result S_bg1" node-type="search_ranks">
        <span class="tab_s">
            <a action-type="search_rank" node-type="search_rank" action-data="rank=1" class="S_txt1 ">公开</a>
            <a action-type="search_rank" node-type="search_rank" action-data="rank=2" class="S_txt1 ">私密</a>
            <a action-type="search_rank" node-type="search_rank" action-data="rank=4" class="S_txt1 ">定向分组</a>
        </span>
    </div>
    <div style="display: none;" node-type="feed_tag_list" class="WB_cardwrap S_bg2 feed_pop_tag"></div>

</div>
					<div id="Pl_Official_MyProfileFeed__21" anchor="-50">                <div class="WB_feed WB_feed_v3 WB_feed_v4" pagenum="" node-type="feed_list" module-type="feed">
        <div style="position: relative;" node-type="feedconfig" data-queryfix="is_hot=1">
            <div style="position: absolute; top: -110px; left: 0px; width: 0px; height: 0px;" id="feedtop" name="feedtop"></div>
        </div>

	 <div id="feedbegin" tbinfo="ouid=5462231537&amp;rouid=5462231537" action-type="feed_list_item"  class="WB_cardwrap WB_feed_type S_bg2 WB_feed_like ">
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


    <!--翻页-->

    <!--/翻页-->
</div>
             {{--加载更多页--}}
             <div class="WB_cardwrap S_bg2" id="moretips"  style="style:block;cursor:pointer;"  >
                 <div class="WB_empty WB_empty_narrow" action-data="page_id=v6_content_home">
                     <div class="WB_innerwrap">
                         <div class="empty_con clearfix">
                             <p  class="text">加载更多</p>
                         </div>
                     </div>
                 </div>
             </div>
    </div>
					<div style="visibility: hidden;" id="Pl_Official_TimeBase__22" anchor="-50">    <div class="WB_timeline" node-type="box" style="top: 420px; position: absolute;">
      <ul>
                                            <li><a class="current S" action-type="select_now" suda-uatrack="key=Profile_V6_Timeline&amp;value=latestweibo"><em>最近</em></a></li>
                                        <li class="none" node-type="year"><a class="S" action-type="select_year" suda-uatrack="key=Profile_V6_Timeline&amp;value=year"><em>2017</em></a>
                                                                <ul class="month"><li><a class="S" action-type="select" action-data="is_all=1&amp;stat_date=201710" suda-uatrack="key=Profile_V6_Timeline&amp;value=month"><em class="bor_t"></em><em class="S_dot"></em><em class="bor_b"></em><span>10月</span></a></li></ul>
                                            <ul class="month"><li><a class="S" action-type="select" action-data="is_all=1&amp;stat_date=201709" suda-uatrack="key=Profile_V6_Timeline&amp;value=month"><em class="bor_t"></em><em class="S_dot"></em><em class="bor_b"></em><span>9月</span></a></li></ul>
                                                        </li>
                                                                        <li class="none" node-type="year"><a class="S" action-type="select_year" suda-uatrack="key=Profile_V6_Timeline&amp;value=year"><em>2015</em></a>
                                                                <ul class="month"><li><a class="S" action-type="select" action-data="is_all=1&amp;stat_date=201504" suda-uatrack="key=Profile_V6_Timeline&amp;value=month"><em class="bor_t"></em><em class="S_dot"></em><em class="bor_b"></em><span>4月</span></a></li></ul>
                                            <ul class="month"><li><a class="S" action-type="select" action-data="is_all=1&amp;stat_date=201501" suda-uatrack="key=Profile_V6_Timeline&amp;value=month"><em class="bor_t"></em><em class="S_dot"></em><em class="bor_b"></em><span>1月</span></a></li></ul>
                                                        </li>
                                                                                                                                    <li class="last"><a action-type="select" count="1" action-data="is_all=1&amp;firstfeed=1&amp;stat_date=201501&amp;page=1" class="S" suda-uatrack="key=Profile_V6_Timeline&amp;value=firstweibo"><em class="S_dot"></em><span class="clearfix">第一条微博</span></a></li>
                                                                          </ul>
    </div>
</div>
			</div>
	</div>
	</div></div>
            <div class="WB_footer S_bg2" id="pl_common_footer"><div class="WB_footer S_bg2">
        <div class="footer_link clearfix">
           <dl class="list">
            <dt>微博精彩</dt>
            <dd><a class="col1 S_txt2" target="_blank" href="http://hot.plaza.weibo.com/?bottomnav=1&amp;wvr=6&amp;type=re&amp;act=day">热门微博</a><a class="col1 S_txt2" target="_blank" href="http://huati.weibo.com/?bottomnav=1&amp;wvr=6">热门话题</a></dd>
            <dd><a class="col1 S_txt2" target="_blank" href="http://verified.weibo.com/?bottomnav=1&amp;wvr=6">名人堂</a><a class="col1 S_txt2" target="_blank" href="http://vip.weibo.com/home?bottomnav=1&amp;wvr=6">微博会员</a></dd>
            <dd><a class="col1 S_txt2" target="_blank" href="http://photo.weibo.com/?bottomnav=1&amp;wvr=6">微相册</a><a class="col1 S_txt2" target="_blank" href="http://game.weibo.com/?bottomnav=1&amp;wvr=6">微游戏</a></dd>
            <dd><a class="col1 S_txt2" target="_blank" href="http://data.weibo.com/index/?bottomnav=1&amp;wvr=6">微指数</a></dd>
          </dl>
          <dl class="list">
            <dt>手机玩微博</dt>
            <dd><span class="T_code col2">
                    <img src="footer_code.jpg" alt="二维码">
                </span>
                <a class="T_txt S_txt2 " href="http://m.weibo.cn/client/guide/show">扫码下载，更多版本<br>戳这里</a>
            </dd>
          </dl>
          <dl class="list">
            <dt>认证&amp;合作</dt>
              <dd><a class="col3 S_txt2" target="_blank" href="http://verified.weibo.com/verify?bottomnav=1&amp;wvr=6">申请认证</a><a class="col3 S_txt2" target="_blank" href="http://open.weibo.com/connect?bottomnav=1&amp;wvr=6">链接网站</a></dd>
              <dd><a class="col3 S_txt2" target="_blank" href="http://e.weibo.com/introduce/introduce?bottomnav=1&amp;wvr=6">企业微博</a><a class="col3 S_txt2" target="_blank" href="http://tui.weibo.com/?bottomnav=1&amp;wvr=6">广告服务</a></dd>
              <dd><a class="col3 S_txt2" target="_blank" href="http://weibo.com/static/logo?bottomnav=1&amp;wvr=6">微博标识</a><a class="col3 S_txt2" target="_blank" href="http://tui.weibo.com/intro/agent?bottomnav=1&amp;wvr=6">广告代理商</a></dd>
              <dd><a class="col3 S_txt2" target="_blank" href="http://open.weibo.com/?bottomnav=1&amp;wvr=6">开放平台</a></dd>
          </dl>
          <dl class="list">
            <dt>微博帮助</dt>
            <dd><a class="col4 S_txt2" target="_blank" href="http://help.weibo.com/faq/q/358?bottomnav=1&amp;wvr=6">常见问题</a></dd>
            <dd><a class="col4 S_txt2" target="_blank" href="http://help.weibo.com/selfservice?bottomnav=1&amp;wvr=6">自助服务</a></dd>
          </dl>
        </div>
        <div class="other_link S_bg1 clearfix T_add_ser">
            <p class="copy"><a target="_blank" href="http://help.weibo.com/?refer=didao&amp;bottomnav=1&amp;wvr=6" class="S_txt2"><i class="W_icon icon_weibo"></i>微博客服</a><a class="S_txt2" target="_blank" href="http://help.weibo.com/newtopic/suggest?bottomnav=1&amp;wvr=6">意见反馈</a><a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/report.html?_wv=6">舞弊举报</a><a class="S_txt2" target="_blank" href="http://ir.weibo.com/">About Weibo</a><a class="S_txt2" target="_blank" href="http://open.weibo.com/?bottomnav=1&amp;wvr=6">开放平台</a><a class="S_txt2" target="_blank" href="http://hr.weibo.com/?bottomnav=1&amp;wvr=6">微博招聘</a><a class="S_txt2" target="_blank" href="http://news.sina.com.cn/guide/?bottomnav=1&amp;wvr=6">新浪网导航</a><a class="S_txt2" target="_blank" href="http://service.account.weibo.com/?bottomnav=1&amp;wvr=6">举报处理大厅</a>
                <select class="lang_select" id="lang_select" node-type="changeLanguage">
                    <option value="zh-cn">中文(简体)</option>
                    <option value="zh-tw">中文(台灣)</option>
                    <option value="zh-hk">中文(香港)</option>
                                    </select></p>
            <p class="copy_v2"><a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/jicp.html?_wv=6">京ICP证100780号</a><a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/medi_license.html?_wv=6">互联网药品服务许可证</a><a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/jww.html?_wv=6">京网文[2014]2046-296号</a> <a class="S_txt2" target="_blank" href="http://www.miibeian.gov.cn/">京ICP备12002058号</a> <a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/license.html?_wv=6">增值电信业务经营许可证B2-20140447</a><a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/map_license.html?_wv=6">乙测资字1111805</a></p>
            <p class="company"><span><a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/tv_license.html?_wv=6">广播电视节目制作经营许可证（京）字第04005号</a></span><span class="copy S_txt2">Copyright © 2009-2017 WEIBO 北京微梦创科网络技术有限公司</span><span><a class="S_txt2" target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11000002000019"><i class="icon_netsecurity"></i>京公网安备11000002000019号</a></span></p>
        </div>
      </div>
      <div class="W_fold"><a><em class="W_ficon ficon_arrow_right S_ficon">b</em></a></div><a class="W_gotop" id="base_scrollToTop" style="visibility: hidden; transform: translateZ(0px); position: fixed; bottom: 40px; top: auto;"><em class="W_ficon ficon_backtop">Ú</em></a></div>
    </div>
  </div>
<div id="pl_common_base"></div>
<div id="pl_common_forword"></div>
<div id="pl_common_dynamicskin"></div>
<div id="pl_lib"></div>
<div id="pl_common_webim"></div>

<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script><textarea style="width: 264px; font-size: 12px; font-family: 'Arial','Microsoft YaHei'; line-height: 18px; padding: 5px 0px 0px 2px; top: -1000px; height: 0px; position: absolute; overflow: hidden;" id="_____textarea_____"></textarea>

<script type="text/javascript">


	$('#already_att').live('click',function(){

	id = $(this).attr('name');
		//点击之后发送ajax 取消关注

			$.post('/home/doattention',{id:id,'_token':'{{csrf_token()}}'},function(data){

                location.reload();
			})
	})

		$('#no_att').live('click',function(){

		id = $(this).attr('name')
		//点击之后发送ajax 添加关注

			$.post('/home/att',{id:id,'_token':'{{csrf_token()}}'},function(data){

					location.reload();
					
			})
	})



</script>

        {{--转发框--}}
        <div class="W_layer " style="position:relative; top: 0px; left: 0px;display: none" id="layer_150779" stk-mask-key="150779826654133"><div tabindex="0"></div>
            <div node-type="autoHeight" class="content">
                <div class="W_layer_title" node-type="title" style="cursor: move;">转发微博</div>
                <div node-type="inner" class="layer_forward"><!--userlist start--><div class="froward_wrap"><div class="WB_minitab clearfix" node-type="forward_tab"><span class="txt">转发到：</span><span class="txt">我的微博</span></div><div node-type="forward_client"><!--userlist start--><div node-type="toMicroblog_client"><div node-type="content" class="WB_text S_bg1"><span class="con S_txt2 content_text"><a href="" class="S_txt1">@name</a>:content</span></div><div class="WB_feed_repeat forward_rpt1"><div class="WB_repeat"><div class="WB_feed_publish clearfix"><div class="WB_publish"><div class="p_input p_textarea"><textarea pubtype="forward" node-type="textEl" title="转发微博内容" cols="" rows="" name="" class="W_input" style="margin: 0px; padding: 5px 6px 25px; border-style: solid; border-width: 1px; font-size: 12px; word-wrap: break-word; line-height: 18px; overflow: hidden; outline: medium none; height: 48px;" range="0&amp;0"></textarea><span node-type="num" class="tips S_txt2"><span>140</span></span>
                                                    <div style="display:none" class="send_succpic"><span class="W_icon icon_succB"></span><span class="txt">发布成功</span></div>
                                                </div><div class="p_opt clearfix"><div class="btn W_fr"><div layout-shell="true" style="position:relative;" class="limits"></div><a class="W_btn_a" node-type="submit" href="javascript:void(0)">转发</a></div></div></div></div></div></div><!--userlist end--></div></div></div></div>
            </div>
        </div>
</body>
</html>
