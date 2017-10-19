<!DOCTYPE html>
<html>
<head><script src="about:blank" charset="UTF-8" type="text/javascript"></script><script src="about:blank" async="" charset="utf-8" type="text/javascript"></script><script src="about:blank" async="" charset="utf-8" type="text/javascript"></script><script src="about:blank" charset="UTF-8" type="text/javascript"></script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="viewport" content="initial-scale=1,minimum-scale=1">
   <script type="text/javascript" src='/home/css/index/lunbo/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='/layer/layer.js'></script>
<link rel="mask-icon" sizes="any" href="https://img.t.sinajs.cn/t6/style/images/apple/wbfont.svg" color="black">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link title="微博" href="https://weibo.com/aj/static/opensearch.xml" type="application/opensearchdescription+xml" rel="search">
   <script type="text/javascript" src='/home/css/index/lunbo/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='/layer/layer.js'></script>
<script type="text/javascript">/* Code removed by ScrapBook */</script> 
<script type="text/javascript">/* Code removed by ScrapBook */</script> 
<title>{{ session('user')['user_name']}}的微博</title>
<link putoff="style/css/module/combination/extra.css?version=195be0ed22185743" href="/home/css/center/frame.css" type="text/css" rel="stylesheet" charset="utf-8">	<link href="/home/css/center/home_A.css" type="text/css" rel="stylesheet" charset="utf-8">
    <link href="{{asset('home/userindexsource/frame.css')}}" type="text/css" rel="stylesheet" charset="utf-8">
    <link href="{{asset('home/userindexsource/home_A.css')}}" type="text/css" rel="stylesheet" charset="utf-8">
    <link id="skin_style" href="{{asset('home/userindexsource/skin.css')}}" type="text/css" rel="stylesheet" charset="utf-8">

<script type="text/javascript">
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
                    url: "u/docollect",
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
                    url: "u/dolike",
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
                        alert("点赞失败，请检查网络后重试");
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
                        url: "u/dodis",
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
                    url: "u/deldis",
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
                        url: "u/dotran",
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
<style>
/* Code tidied up by ScrapBook */
</style><style>
/* Code tidied up by ScrapBook */
</style><link rel="stylesheet" type="text/css" href="/home/css/center/extra.css"><link href="/home/css/center/PCD_mplayer.css" charset="utf-8" type="text/css" rel="Stylesheet"><div style="position: absolute; top: -9999px; left: -9999px;"></div><link id="skin_style" href="/home/css/center/skin.css" charset="utf-8" type="text/css" rel="stylesheet"><link id="FM_150768420998035" href="/home/css/center/PCD_mydata.css" type="text/css" rel="stylesheet"><div style="position: absolute; top: -9999px;"><div id="js_http:__img.t.sinajs.cn_t6_style_css_apps_PCD_event_WB_feed_spec_red2017"></div><div id="js_http:__img.t.sinajs.cn_t4_appstyle_vip_v2_css_apps_PRF_v6fansclub_Pl_Third_RightClub"></div></div><link id="FM_150768420998040" href="/home/css/center/PCD_pictext_a.css" type="text/css" rel="stylesheet"><link id="FM_150768420998042" href="/home/css/center/PCD_pictext_f.css" type="text/css" rel="stylesheet"><link id="FM_150768420998044" href="/home/css/center/WB_feed_spec_red2017.css" type="text/css" rel="stylesheet"><link id="FM_150768420998046" href="/home/css/center/PCD_person_info.css" type="text/css" rel="stylesheet"><link id="FM_150768420998048" href="/home/css/center/PCD_user_a.css" type="text/css" rel="stylesheet"><link id="FM_150768420998051" href="/home/css/center/PCD_pictext_h.css" type="text/css" rel="stylesheet"><link id="FM_150768420998055" href="/home/css/center/Pl_Third_RightClub.css" type="text/css" rel="stylesheet"><link id="FM_150768420998057" href="/home/css/center/PCD_photolist.css" type="text/css" rel="stylesheet"><link id="FM_150768420998059" href="/home/css/center/PCD_feed.css" type="text/css" rel="stylesheet"><link id="FM_150768420998061" href="/home/css/center/comb_WB_tab_profile.css" type="text/css" rel="stylesheet"><link id="FM_150768420998063" href="/home/css/center/comb_WB_feed_profile.css" type="text/css" rel="stylesheet"><link id="FM_150768420998065" href="/home/css/center/PCD_counter.css" type="text/css" rel="stylesheet"><link id="FM_150768420998067" href="/home/css/center/PCD_ut_a.css" type="text/css" rel="stylesheet"><link id="FM_150768420998069" href="/home/css/center/WB_timeline.css" type="text/css" rel="stylesheet"><style media="screen" type="text/css">
/* Code tidied up by ScrapBook */
#lineFlash { visibility: hidden; }


/*-----------------------------css----------------------------------------------------------*/


</style></head>
<body style="background-image: url('{{session('user')['bg']}}');width:100%;height:100%;background-repeat: repeat;" class="FRAME_page B_page S_page">
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
</div>
<div class="WB_main clearfix" id="plc_frame"><div class="WB_frame" style="min-height: 400px">
        
        	<div class="WB_frame_a">
            	<div id="Pl_Official_Headerv6__1"><div class="PCD_header">
				<div class="pf_wrap" layout-shell="false" node-type="cover_wrap">
				<div class="cover_wrap banner_transition" node-type="cover" cover-type="3">
				</div>
				<div class="shadow " layout-shell="false" style="height: 250px">
						<div class="pf_photo " node-type="photo">
						<p class="photo_wrap">
						 						 	<a action-type="setPhoto" title="更换头像" suda-uatrack="key=profile_head&amp;value=head_host">
							<img src="{{session('homeUser')['user_headpic']}}" alt="{{session('homeUser')['user_name']}}" class="photo">
							</a>
						 						
						</p>
													</div>
						
						<div class="pf_username">
						<h1 class="username">{{session('homeUser')['user_name']}}</h1>
																																<span class="icon_bed"><a><i class="W_icon icon_pf_male"></i></a></span>												
						</div>
						
						
												<div class="pf_intro" title="有故事有酒.">
						有故事有酒.						</div>
											</div>
					<div class="upcover"><a style="display: none;" class="W_btn_b " node-type="custom"><em class="W_ficon ficon_upload S_ficon">É</em>上传封面图</a></div>																<a suda-data="key=tblog_mode_cover&amp;value=profile_home_tear" action-data="is_guilderBubble=" node-type="set_skin" title="模板设置" class="W_icon icon_setskin UI_top_hidden W_fixed_top" id='background'></a>
														</div>
			</div>
<div node-type="moreList" class="layer_menu_list_b" style="position: absolute; top: 332px; left: 900px; z-index: 999; display: none;">	
	<div class="list_wrap">
		<div class="list_content W_f14">
  			<ul class="list_ul">
  			  			    		    			    			<li class="item"><a suda-data="key=tblog_otherprofile_v5&amp;value=whisper" action-type="addQuietFollow" action-data="fuid=5322078304&amp;fname=暗里着迷醉梦死&amp;action=add" class="tlink" suda-uatrack="key=tblog_profile_v6&amp;value=silently_concern">悄悄关注</a></li>
    			    		    		<li class="item"><a action-data="title=%E6%8A%8A%E6%9A%97%E9%87%8C%E7%9D%80%E8%BF%B7%E9%86%89%E6%A2%A6%E6%AD%BB%E6%8E%A8%E8%8D%90%E7%BB%99%E6%9C%8B%E5%8F%8B&amp;content=%E5%BF%AB%E6%9D%A5%E7%9C%8B%E7%9C%8B%E6%9A%97%E9%87%8C%E7%9D%80%E8%BF%B7%E9%86%89%E6%A2%A6%E6%AD%BB%20%E7%9A%84%E5%BE%AE%E5%8D%9Ahttp://weibo.com/u/5322078304" action-type="widget_publish" class="tlink" suda-uatrack="key=tblog_profile_v6&amp;value=suggest_to_friends">推荐给朋友</a></li>
  			</ul>
  						<ul class="list_ul">
										<li class="item"><a suda-data="key=tblog_otherprofile_v5&amp;value=join_blacklist" action-type="block" class="tlink" suda-uatrack="key=tblog_profile_v6&amp;value=in_black_list">加入黑名单</a></li>
									<li class="item"><a suda-data="key=tblog_otherprofile_v5&amp;value=report" class="tlink" suda-uatrack="key=tblog_profile_v6&amp;value=report">举报他</a></li>
  			  			</ul>
  					</div>
  </div>
</div>
</div>
                    	<div id="Pl_Official_Nav__2" name="place" anchor="-50"><div class="PCD_tab S_bg2">
	<div class="tab_wrap" style="width: 60%;">
		<table class="tb_tab" cellpadding="0" cellspacing="0">
			<tbody><tr>
							<td class="current">
					<a otherhref="http://weibo.com/5322078304/profile?topnav=1&amp;wvr=6" bpfilter="page" href="http://weibo.com/p/1005055322078304/home?from=page_100505&amp;mod=TAB#place" node-type="nav_link" suda-uatrack="key=tblog_profile_new&amp;value=tab_profile" class="tab_link">
						<span class="S_txt1 t_link">我的主页</span>
						<span class="ani_border"></span>
					</a>
				</td>
							<td>
					<a bpfilter="page" href="/home/mypic" node-type="nav_link" suda-uatrack="key=tblog_profile_new&amp;value=tab_photos" class="tab_link">
						<span class="S_txt1 t_link">我的相册</span>
						<span class="ani_border"></span>
					</a>
				</td>
							<td>
					<a bpfilter="page" href="Javascript:;" node-type="nav_link" suda-uatrack="key=tblog_profile_new&amp;value=tab_manage" class="tab_link">
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
    		<div id="plc_main">		<div class="WB_frame_b" fixed-box="true" fixed-random="false">
					<div id="Pl_Core_T8CustomTriColumn__3" anchor="-50">	<div class="WB_cardwrap S_bg2" >
						<div class="PCD_counter">
							<div class="WB_innerwrap">
								<table class="tb_counter" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
                                        <td class="S_line1">
                                            <a bpfilter="page_frame" class="t_link S_txt1" href="/home/myatt"><strong class="W_f18">{{session('homeUser')['follow_count']}}</strong><span class="S_txt2">关注</span></a></td>
                                                                                    <td class="S_line1">
                                            <a bpfilter="page_frame" class="t_link S_txt1" href='/home/fans'><strong class="W_f18" >{{session('homeUser')['fans_count']}}</strong><span class="S_txt2">粉丝</span></a></td>
                                                                                    <td class="S_line1">
                                            <a bpfilter="page_frame" class="t_link S_txt1" href="/home/homepage"><strong class="W_f18">{{session('homeUser')['msg_count']}}</strong><span class="S_txt2">微博</span></a></td>
                                                                                </tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
</div>
					<div id="Pl_Core_ThirdHtmlData__4" anchor="-50"></div>
					<div id="Pl_Third_Inline__5" anchor="-50"></div>
					<div id="Pl_Core_UserInfo__6" anchor="-50"><div style="visibility: hidden;"></div><div style="z-index: 10; transform: translateZ(0px); position: relative; transition: margin-top 0.3s ease 0s; width: 300px;"><div fixed-id="8" class="WB_cardwrap S_bg2" fixed-inbox="true" node-type="sigleProfileUsrinfo" fixed-mutex="false">
    <!-- v6 card 通用标题 -->
	<div class="PCD_person_info">
				<div class="verify_area W_tog_hover S_line2">
		<p class="verify clearfix">
								<span class="icon_bed W_fl"><a suda-data="key=pc_apply_entry&amp;value=profile_apply_certification" class="apply_link W_fl S_txt1" href="http://verified.weibo.com/verify">申请认证</a></span>
								<span class="icon_group S_line1 W_fl"><a class="W_icon_level icon_level_c2" title="微博等级9 升级有好礼" href="http://level.account.weibo.com/level/mylevel?from=profile1" target="_black"><span>Lv.9</span></a>&nbsp;</span>
							</p>		 		 	<p class="info"><span></span></p>
			</div>
		
		<div class="WB_innerwrap">
			<div class="m_wrap">
						<div class="bars_box">
								<p class="bar_title">个人资料完成度<span class="num">65%</span></p>
								<div class="bar_box S_bg1">
									<div class="bar" style="width: 65%;"></div>
								</div>
							</div>
						</div>
		</div>
		<a class="WB_cardmore S_txt1 S_line1 clearfix" href="/home/myinfo" bpfilter="page_frame">
	<span class="more_txt">编辑个人资料&nbsp;<em class="W_ficon ficon_arrow_right S_ficon">a</em></span>
</a>
		
	</div>
</div><div style="height: 1px; margin-top: -1px; visibility: hidden;"></div></div>
</div>
					<div id="Pl_Third_Inline__7" anchor="-50"></div>
					<div id="Pl_Core_UserGrid__8" anchor="-50"></div>
					<div id="Pl_Core_Pt13PicText__9" anchor="-50"></div>
					<div id="Pl_Third_Inline__10" anchor="-50"></div>
					<div id="Pl_Core_Pt6Rank__11" anchor="-50">			</div>

					<div id="Pl_Core_PicText__13" anchor="-50"></div>
					<div id="Pl_Core_Ut1UserList__14" anchor="-50"></div>
					<div id="Pl_Official_LikeMerge__15" anchor="-50">
<div class="WB_cardwrap S_bg2">
			
			</div>
</div>
					<div id="Pl_Official_MyPopularity__16" anchor="-50"><div class="WB_cardwrap S_bg2">

</div>
</div>
					<div id="Pl_Guide_Bigday__17" anchor="-50"></div>
					<div id="Pl_Official_SeoInfo__18" anchor="-50"></div>
					<div id="Pl_Core_RecommendFeed__19" anchor="-50"></div>
			</div>
	<div class="WB_frame_c" fixed-box="true">
					<div id="Pl_Official_ProfileFeedNav__20" anchor="-50">     <div style="visibility: hidden;"></div><div style="z-index: 10; transform: translateZ(0px); position: relative; transition: margin-top 0.3s ease 0s; width: 600px;"><div fixed-id="11" class="WB_tab_a" node-type="feed_nav" fixed-item="true" style="position: relative;">
        <div class="tab_box tab_box_c S_bg1 clearfix">
            <ul class="tab W_fl">
                <li class="tab_li tab_li_first curr S_bg2" node-type="tab_all" action-type="search_type" action-data="profile_ftype=1&amp;is_all=1">
                    <a suda-data="key=tblog_profile_new&amp;value=weibo_all" class="S_txt1 S_line1">全部</a>
                    <span class="ani_border"></span>
                </li>
                <li class="tab_li" node-type="tab_hot" action-type="search_type" action-data="profile_ftype=1&amp;is_hot=1" style="display: none;">
                    <a suda-uatrack="key=tblog_profile_v6&amp;value=topnav" class="S_txt1"><em class="W_ficon ficon_hot S_ficon">ì</em>热门</a>
                    <span class="ani_border"></span>
                </li>
                <li class="tab_li" node-type="tab_other" action-type="search_type">
                    <a class="S_txt1">
                        <span class="txt" node-type="menutext">

                                                                                                                </span>

                    </a>
                    <span class="ani_border"></span>
                </li>
            </ul>


        </div>
    </div><div style="height: 1px; margin-top: -1px; visibility: hidden;"></div></div>



       
</div>
					<div id="Pl_Official_MyProfileFeed__21" anchor="-50">                <div class="WB_feed WB_feed_v3 WB_feed_v4" pagenum="" node-type="feed_list" module-type="feed">
        <div style="position: relative;" node-type="feedconfig" data-queryfix="is_all=1">
            <div style="position: absolute; top: -110px; left: 0px; width: 0px; height: 0px;" id="feedtop" name="feedtop"></div>
        </div>
     <div minfo="ru=5120638966&amp;rm=4103803848348088" tbinfo="ouid=5322078304&amp;rouid=5120638966" action-type="feed_list_item" diss-data="" mid="4104167117068112" isforward="1" omid="4103803848348088" class="WB_cardwrap WB_feed_type S_bg2 WB_feed_like ">
        <div class="WB_feed_detail clearfix" id="feedbegin" node-type="feed_content" >
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


    <!--翻页-->

    <!--/翻页-->
</div>
    </div>
					<div style="" id="Pl_Official_TimeBase__22" anchor="-50">    <div class="WB_timeline" node-type="box" style="top: 420px; position: absolute;">

    </div>
</div>
			</div>
	</div>
	</div></div>
<div id="plc_bot"><!--footer-->
      <div class="WB_footer S_bg2">
       
        <div class="other_link S_bg1 clearfix T_add_ser">

            <p class="copy_v2"><a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/jicp.html?_wv=6">京ICP证100780号</a><a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/medi_license.html?_wv=6">互联网药品服务许可证</a><a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/jww.html?_wv=6">京网文[2014]2046-296号</a> <a class="S_txt2" target="_blank" href="http://www.miibeian.gov.cn/">京ICP备12002058号</a> <a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/license.html?_wv=6">增值电信业务经营许可证B2-20140447</a><a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/map_license.html?_wv=6">乙测资字1111805</a></p>
            <p class="company"><span><a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/tv_license.html?_wv=6">广播电视节目制作经营许可证（京）字第04005号</a></span><span class="copy S_txt2">Copyright © 2009-2017 WEIBO 北京微梦创科网络技术有限公司</span><span><a class="S_txt2" target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11000002000019"><i class="icon_netsecurity"></i>京公网安备11000002000019号</a></span></p>
        </div>
      </div>

<div class="W_fold"><a><em class="W_ficon ficon_arrow_right S_ficon">b</em></a></div>
<!--/footer-->
</div>
</div>
</div>

<script>/* Code removed by ScrapBook */</script>
 <script>/* Code removed by ScrapBook */</script><div id="pl_common_webim"></div>
<script>/* Code removed by ScrapBook */</script><script>/* Code removed by ScrapBook */</script>
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
<div style="display: none; position: absolute;" node-type="morePlugin" class="layer_menu_list ">
			        <ul>
<li><a href="http://live.weibo.com/admin" target="_blank" title="直播" suda-uatrack="key=tblog_home_edit&amp;value=live_button"><em class="W_ficon ficon_live_v2"></em>直播</a></li>
<li><a action-type="review" action-data="type=512&amp;action=1&amp;log=dianping&amp;cate=1" title="点评" suda-uatrack="key=mainpub_dianping&amp;value=main_dianping_button"><em class="W_ficon ficon_remark">ï</em>点评</a></li>
<li><a action-type="settime" action-data="type=511&amp;action=1&amp;log=&amp;cate=1" title="定时发" suda-uatrack="key=tblog_home_edit&amp;value=chick_autopub"><em class="W_ficon ficon_timesend">t</em>定时发</a></li>
<li><a action-type="plugin" action-data="interactivetype=2&amp;type=503&amp;action=1&amp;log=music&amp;cate=1" title="音乐" suda-uatrack="key=tblog_home_edit&amp;value=music_button"><em class="W_ficon ficon_music">u</em>音乐</a></li>
<li><a action-type="plugin" action-data="interactivetype=2&amp;type=5&amp;action=1&amp;log=vote&amp;cate=1" title="投票" suda-uatrack="key=tblog_home_edit&amp;value=vote_button"><em class="W_ficon ficon_vote">v</em>投票</a></li>
<li><a action-type="plugin" action-data="type=14&amp;action=1&amp;log=weigongyi&amp;cate=1" title="微公益" suda-uatrack="key=tblog_home_edit&amp;value=gongyi_button"><em class="W_ficon ficon_public">w</em>微公益</a></li>
			        			        </ul>
			    </div><div style="display: none;"><div class="layer_menu_list"><ul node-type="suggestWrap"></ul></div></div><textarea style="width: 568px; font-size: 14px; font-family: 'Arial','Microsoft YaHei'; line-height: 18px; padding: 0px; top: -1000px; height: 0px; position: absolute; overflow: hidden;" id="_____textarea_____"></textarea><script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>
<script>/* Code removed by ScrapBook */</script>



</div>
<script type="text/javascript">
	
	   $('#set').mouseenter(function(){

          $(this).addClass('gn_onmouse w_arrow_turn');
          $('#setlist').css('display','block');
      })
      $('#setlist').mouseleave(function(){

        $(this).removeClass('gn_onmouse w_arrow_turn');
          $('#setlist').css('display','none');

      })
</script>
<script type="text/javascript">

	     $('#background').click(function(){

           //iframe层
        layer.open({
            type: 2,
            title: '修改背景图片',
            shadeClose: true,
            shade: 0.8,
            area: ['1000px', '80%'],
            content: '/home/bgimg' //iframe的url
        }); 
  
      })
         function show_setbox(){
             $("#user_set_box").css("display","block");
         }
         $(window).click(function(){
             $("#user_set_box").css("display","none");
         })
</script>
</body>
</html>
