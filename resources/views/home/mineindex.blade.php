<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="initial-scale=1,minimum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{session('homeUser')['user_name']}}的首页 微博-随时随地发现新鲜事</title>
    <link href="{{asset('home/userindexsource/frame.css')}}" type="text/css" rel="stylesheet" charset="utf-8">
    <link href="{{asset('home/userindexsource/home_A.css')}}" type="text/css" rel="stylesheet" charset="utf-8">
    <link id="skin_style" href="{{asset('home/userindexsource/skin.css')}}" type="text/css" rel="stylesheet" charset="utf-8">
    <script type="text/javascript" src="{{asset('admin/style/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/style/js/biaoqing.js')}}"></script>
	<script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

		function show_setbox(){
			$("#user_set_box").css("display","block");
		}
		$(window).click(function(){
			$("#user_set_box").css("display","none");
		})
        //单击发布微博
        function fabu(){
            var formData = new FormData($('#post_new_wb')[0]);
            $.ajax({
                type: "POST",
                url: "/home/u/postwb",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    if(data=='ok'){
                        $('#send_succpic').css('display','block');
                    }else{
                        alert(data);
                    }
                    //发布微博成功或失败后 1秒刷新页面
                    setTimeout(function(){
                        location.reload(true);
                    },1000);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("微博发布失败，请检查网络后重试");
                }
            });


        }
        //		单击选择发布频道
        $(function() {
            //点击更改领域名
            $(".field_selects").each(function (n) {
                var id = $(this).attr("action_id");
                var name = $(this).attr("action_name");
                $(this).click(function () {
                    $("input[name='field_id']").attr("value", id);
                    $("#field_select").css('display', 'none');
                    $("#field_change_but").html(name + "<em class='W_ficon ficon_arrow_down S_ficon'>c</em>");
                })
            })
            //点击添加表情图标
            $("#face_list_ul>ul>li").each(function () {
                var name = '[' + $(this).attr("title") + ']';
                $(this).click(function () {
                    var old = $("#textarea").val();
                    $("#textarea").val(old + name);
                    $("#biaoqingxianshi").css('display', 'none');

                })

            })
            //点击显示图片选择框
            $("#image_but").click(function () {
                $("#pic_box").css('display', 'block');
            })
            //点击显示表情选择框
            $("#face_but").click(function () {
                $("#biaoqingxianshi").css('display', 'block');
            })
            //点击显示发布频道
            $("#field_change_but").click(function () {

                $("#field_select").attr("style", "position: absolute; display:block; z-index: 29999; outline: none; left: 376px; top: 35px;");
            })
            //无刷新上传文件
            var upfilenames = '';
            $("#file_upload").change(function () {
                upfilenames = uploadImage();

            })

            function uploadImage() {
                var imgPath = $("#file_upload").val();
                if (imgPath == "") {
                    alert("请选择上传图片！");
                    return;
                }
                var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                if (strExtension != 'jpg' && strExtension != 'gif'
                    && strExtension != 'png' && strExtension != 'bmp') {
                    alert("请选择图片文件");
                    return;
                }
                var formData = new FormData($('#post_new_wb')[0]);
                var upfilename = '';
                $.ajax({
                    type: "POST",
                    url: "/home/uploads",
                    data: formData,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    success: function (data) {

                        var str = '';
                        data.forEach(function (value, index, array) {
                            str += "<li class='pic' ><div style=" + '"' + "background:url('../.." + value + "') center center;width:80px;height:80px;" + '"' + "></div></li>" + "<input type='hidden' value ='" + value + "' name='picname" + index + "'>";
                        })

                        $("#pic_insert").html(str);

                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert("上传失败，请检查网络后重试");
                    }
                });

            }
//            载入模板时替换[]表情
            $(".W_replace").each(function () {
                var s = replace($(this).text());

                $(this).html(s);
            })
            //单击收藏
            $("a[action_id='collect_but']").each(function () {
                var msg_id = $(this).attr('msgtitle');
                var e=$(this);
                $(this).click(function () {
                    $(this).find('em:eq(0)').removeClass("S_ficon").addClass('S_spetxt');
                    $(this).find('em:eq(1)').html("已收藏");
                    $.ajax({
                        type: "get",
                        url: "docollect",
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

            //单击赞
            $("a[action_id='like_but']").each(function () {
                var msg_id = $(this).attr('msgtitle');
                var e=$(this);
                $(this).click(function () {
                    $(this).find("span[node-type='like_status']").addClass('UI_ani_praised');

                    $.ajax({
                        type: "get",
                        url: "dolike",
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
                    $(this).click(function(){

                        $(this).parents(".WB_feed_like").children(".feed_list_repeat").css("display",'block');
                        $(this).parents(".WB_feed_like").children(".feed_list_repeat")
                    })

            })

            //单击发布微博评论
            $("a[action-id='post_dismsg']").each(function(){
                $(this).click(function(){
                    var e=$(this);
                   var discontent= $(this).parents(".WB_Publish").find(".W_Input").val();
                   var msg_id=$(this).attr('dis-data');

                    if( discontent !='' ){

                        $.ajax({
                            type: "get",
                            url: "dodis",
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
                $(this).click(function(){
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
                $(this).click(function(){
                    var e=$(this);
                    var msg_id=$(this).attr('action-msgid');
                    var dis_id=$(this).attr('action-disid');
                    var dis_userid=$(this).attr('action-userid');
                    $.ajax({
                        type: "get",
                        url: "deldis",
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
                $(this).click(function(){

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

                    $('#layer_150779').find(".W_btn_a").click(function(){
                       var msgtitle= $('#layer_150779').find("textarea").val();

                       $.ajax({
                            type: "get",
                            url: "dotran",
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
            var type=$(":input[name='take_type']").attr('value');

            if(len<10){
                $('#moretips').css("display","none");
            }
            var n=1;
            $('#moretips').click(function(){

                $.get('/home/u/more',{n:n,type:type},function(data){
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
                $(this).click(function(){
                    $(this).next().css('display','block');
                })
            })
            //单击取消显示
            $('a[action-id="quxiao"]').each(function(){
                $(this).click(function(){
                    $(this).parents(".layer_menu_list").css('display','none');
                })
            })
            //单击举报
            $('a[action-id="jubao"]').each(function(){
                $(this).click(function(){
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
                $(this).click(function(){
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
	</style>
	<style></style>
    <link href="{{asset('home/userindexsource/extra.css')}}" type="text/css" rel="stylesheet">
    <link rel="Stylesheet" type="text/css" charset="utf-8" href="{{asset('home/userindexsource/PCD_mplayer.css')}}">
    <div style="position: absolute; top: -9999px; left: -9999px;"></div>
</head>
<body class="FRAME_main B_index">

<!--传递message_len,-->
<input  type="hidden" name="take_len" value="{{$len}}" >
<input  type="hidden" name="take_type" value="{{$type}}" >

<div class="WB_miniblog">
    <div class="WB_miniblog_fb"><div id="plc_top"><!--简易顶部导航拼页面用-->
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

                                <li><a dot="pos55b9e0848171d" bpfilter="page_frame" href="javascript:;"><em class="W_ficon ficon_user S_ficon">H</em><em class="S_txt1">{{session('homeUser')['nick_name']}}</em></a></li>
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
        <div class="WB_main clearfix" id="plc_frame">

            <div id="v6_pl_guide_bubbletip"></div>
            <div id="v6_pl_content_hometip"></div>
            <div class="WB_frame">
                <div class="WB_main_l" fixed-box="true">
            @section('left_lev')

             @show


                </div><div id="plc_main">

                    <div class="WB_main_c">

                @section('postwb')

                @show
                        <div id="v6_pl_content_biztips"><div suda-uatrack="key=zymo&amp;value=wbv5~10~m~none" suda-urls="" ad-data="id=ads_top&amp;url=//wbpctips.uve.weibo.com/adfront/deliver.php&amp;posid=pos525904036078b&amp;psid=PDPS000000052321&amp;wbVersion=v6&amp;uid=5462231537&amp;cip=121.69.21.82&amp;spr=www.cweibo.com" cache="true"></div>
                        </div>

                        <div id="v6_pl_content_homefeed"><div node-type="homefeed">

                  @section('changetitle')

                  @show
                                <!--feed list-->
                               <div class="WB_feed WB_feed_v3 WB_feed_v4" pagenum="1" id="feedbegin" node-type="feed_list" unread_mode="1">

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
                                                       <p  class="text"><i class="W_loading"></i>加载更多</p>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                            </div>
						</div>
                    </div>
                    <div class="WB_main_r" style="position:fixed">

                        <div id="v6_pl_rightmod_myinfo"><div class="WB_cardwrap S_bg2">
                                <div class="W_person_info">
                                    <div class="cover" id="skin_cover_s" style="background-image:url(//img.t.sinajs.cn/t6/skin/skin048/images/profile_cover_s.jpg?version=195be0ed22185743)">
                                        <div class="headpic"> <a bpfilter="page_frame" href="" ><img src="{{url(session('homeUser')['user_headpic'])}}" width="60" height="60" alt="{{session('homeUser')['nick_name']}}"></a></div>
                                    </div>
                                    <div class="WB_innerwrap">
                                        <div class="nameBox"><a >{{session('homeUser')['nick_name']}}</a><a action-type="ignore_list" title="微博会员" target="_blank" href="http://vip.weibo.com/"><i class="W_icon icon_member_dis"></i></a><a action-type="" suda-data="key=tblog_grade_float&amp;value=grade_icon_click" target="_blank" href="http://level.account.weibo.com/level/mylevel?from=front"><span node-type="levelBox" levelup="0" action-data="level=6" class="W_icon_level icon_level_c2"><span class="txt_out"><span class="txt_in"><span node-type="levelNum" >Lv.{{session('homeUser')['user_level']}}</span></span></span></span></a></div>
                                        <ul class="user_atten clearfix W_f18">
                                            <li class="S_line1"><a bpfilter="page_frame" href="" class="S_txt1"><strong node-type="follow">{{session('homeUser')['follow_count']}}</strong><span class="S_txt2">关注</span></a></li>
                                            <li class="S_line1"><a bpfilter="page_frame" href="" class="S_txt1"><strong node-type="fans">{{session('homeUser')['fans_count']}}</strong><span class="S_txt2">粉丝</span></a></li>
                                            <li class="S_line1"><a bpfilter="page_frame" href="{{url('home/u/mywb')}}" class="S_txt1"><strong node-type="weibo">{{session('homeUser')['msg_count']}}</strong><span class="S_txt2">微博</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="v6_pl_rightmod_recominfo"><!-- notice -->

                            <div style="visibility: hidden;"></div><div style="z-index: 10; transform: translateZ(0px); position: relative; transition: margin-top 0.3s ease; will-change: margin-top, top; width: 230px;" class=" "><div class="WB_cardwrap S_bg2" right-module="true" fixed-inbox="true" fixed-id="5">


                                <div id="v6_pl_rightmod_ads35">
                                    <div ucardconf="type=1" ad-data="id=ads_35&amp;url=//biz.weibo.com/adfront/deliver&amp;psid=PDPS000000037694&amp;wbVersion=v6&amp;uid=5462231537"><div class="WB_cardwrap S_bg2" pbc-refresh="true"><div class="WB_right_module M_sc_right"><div class="WB_innerwrap"><div class="m_wrap"><div class="scr_iframe_wrap"><iframe id="sc_37694" src="../userindexsource/sax.html" width="186" height="250" frameborder="0" scrolling="no"></iframe></div></div></div></div></div></div>
                                </div>

                                <div style="height:1px;margin-top:-1px;visibility:hidden;"></div></div>
                        </div>



            <div class="WB_frame WB_frame_bottom">
                <div id="pl_common_base"></div>
                <div id="v6_pl_guide_homeguide">    <div node-type="no-guide"></div>
                </div>
                <div id="v6_pl_ad_bottomtip"><div ucardconf="type=1" ad-data="id=ads_bottom&amp;url=//biz.weibo.com/adfront/deliver&amp;psid=PDPS000000037700&amp;wbVersion=v6&amp;uid="></div></div>
            </div></div></div></div></div>

        <div id="plc_bot"><!--footer-->
            <div class="WB_footer S_bg2">
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
                    <img src="../userindexsource/footer_code.jpg" alt="二维码"></span>
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

                    <p class="copy_v2"><a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/jicp.html?_wv=6">京ICP证100780号</a><a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/medi_license.html?_wv=6">互联网药品服务许可证</a><a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/jww.html?_wv=6">京网文[2014]2046-296号</a> <a class="S_txt2" target="_blank" href="http://www.miibeian.gov.cn/">京ICP备12002058号</a> <a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/license.html?_wv=6">增值电信业务经营许可证B2-20140447</a><a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/map_license.html?_wv=6">乙测资字1111805</a></p>
                    <p class="company"><span><a class="S_txt2" target="_blank" href="http://weibo.com/aj/static/tv_license.html?_wv=6">广播电视节目制作经营许可证（京）字第04005号</a></span><span class="copy S_txt2">Copyright © 2009-2017 WEIBO 北京微梦创科网络技术有限公司</span><span><a class="S_txt2" target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11000002000019"><i class="icon_netsecurity"></i>京公网安备11000002000019号</a></span></p>
                </div>
            </div>

            <div class="W_fold"><a href="javascript:void(0);"><em class="W_ficon ficon_arrow_right S_ficon">b</em></a></div><a class="W_gotop" id="base_scrollToTop" href="javascript:void(0);" style="visibility: hidden; transform: translateZ(0px); position: fixed; bottom: 40px; top: auto;"><em class="W_ficon ficon_backtop">Ú</em></a>
            <!--/footer-->
        </div>
    </div>
</div>

        {{--转发框--}}
        <div class="W_layer " style="position:relative; top: 0px; left: 0px;display: none" id="layer_150779" stk-mask-key="150779826654133"><div tabindex="0"></div>
            <div node-type="autoHeight" class="content">
                <div class="W_layer_title" node-type="title" style="cursor: move;">转发微博</div>
                <div node-type="inner" class="layer_forward"><!--userlist start--><div class="froward_wrap"><div class="WB_minitab clearfix" node-type="forward_tab"><span class="txt">转发到：</span><span class="txt">我的微博</span></div><div node-type="forward_client"><!--userlist start--><div node-type="toMicroblog_client"><div node-type="content" class="WB_text S_bg1"><span class="con S_txt2 content_text"><a href="" class="S_txt1">@name</a>:content</span></div><div class="WB_feed_repeat forward_rpt1"><div class="WB_repeat"><div class="WB_feed_publish clearfix"><div class="WB_publish"><div class="p_input p_textarea"><textarea pubtype="forward" node-type="textEl" title="转发微博内容" cols="" rows="" name="" class="W_input" style="margin: 0px; padding: 5px 6px 25px; border-style: solid; border-width: 1px; font-size: 12px; word-wrap: break-word; line-height: 18px; overflow: hidden; outline: medium none; height: 48px;" range="0&amp;0"></textarea><span node-type="num" class="tips S_txt2"><span>140</span></span>
                                                    <div style="display:none" class="send_succpic"><span class="W_icon icon_succB"></span><span class="txt">发布成功</span></div>
                                                </div><div class="p_opt clearfix"><div class="btn W_fr"><div layout-shell="true" style="position:relative;" class="limits"></div><a class="W_btn_a" node-type="submit" href="javascript:void(0)">转发</a></div></div></div></div></div></div><!--userlist end--></div></div></div></div>
            </div>
        </div>
</body></html>