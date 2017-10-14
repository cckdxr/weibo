<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="initial-scale=1,minimum-scale=1">

    <title>我的首页 微博-随时随地发现新鲜事</title>
    <link putoff="style/css/module/combination/extra.css?version=195be0ed22185743" href="{{asset('home/userindexsource/frame.css')}}" type="text/css" rel="stylesheet" charset="utf-8">	<link href="{{asset('home/userindexsource/home_A.css')}}" type="text/css" rel="stylesheet" charset="utf-8">
    <link id="skin_style" href="{{asset('home/userindexsource/skin.css')}}" type="text/css" rel="stylesheet" charset="utf-8">
    <script type="text/javascript" src="{{asset('admin/style/js/jquery.js')}}"></script>

	<script>
		
		function show_setbox(){
			$("#user_set_box").css("display","block");
		}
		$(window).click(function(){
			$("#user_set_box").css("display","none");
		})

        //单击发布
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
        $(function(){
            //点击更改领域名
            $(".field_selects").each(function(n){
				var id=$(this).attr("action_id");
				var name=$(this).attr("action_name");
                $(this).click(function(){
						$("input[name='field_id']").attr("value",id);
						$("#field_select").css('display','none');
                         $("#field_change_but").html(name+"<em class='W_ficon ficon_arrow_down S_ficon'>c</em>");
                })
            })

            //点击添加表情图标
            $("#face_list_ul>ul>li").each(function(){
                var name='['+$(this).attr("title")+']';
               $(this).click(function(){
                  var old= $("#textarea").val();
                   $("#textarea").val(old+name);
                   $("#biaoqingxianshi").css('display','none');

               })

            })


            //点击显示图片选择框
            $("#image_but").click(function( ){
                $("#pic_box").css('display','block');
            })
            //点击显示表情选择框
            $("#face_but").click(function( ){
                $("#biaoqingxianshi").css('display','block');
            })
            //点击显示发布频道
            $("#field_change_but").click(function(){

                $("#field_select").attr("style","position: absolute; display:block; z-index: 29999; outline: none; left: 376px; top: 35px;");
            })

            //无刷新上传文件
            var upfilenames='';
            $("#file_upload").change(function (){
               upfilenames= uploadImage();

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
                var upfilename='';
                $.ajax({
                    type: "POST",
                    url: "/home/uploads",
                    data: formData,
                    dataType:"json",
                    contentType: false,
                    processData: false,
                    success: function(data) {

                        var str='';
                        data.forEach(function(value,index,array){
                            str+= "<li class='pic' ><div style="+'"'+"background:url('../.."+value+"') center center;width:80px;height:80px;"+'"'+"></div></li>"+"<input type='hidden' value ='"+value+"' name='picname"+index+"'>";
                        })

                        $("#pic_insert").html(str);

                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("上传失败，请检查网络后重试");
                    }
                });

            }

        })



		
	</script>
    <style>
		
	</style>
	
	<style></style><link href="{{asset('home/userindexsource/extra.css')}}" type="text/css" rel="stylesheet"><link rel="Stylesheet" type="text/css" charset="utf-8" href="{{asset('home/userindexsource/PCD_mplayer.css')}}"><div style="position: absolute; top: -9999px; left: -9999px;"></div></head>
<body class="FRAME_main B_index">
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

                                <li><a dot="pos55b9e0848171d" bpfilter="page_frame" href="javascript:;"><em class="W_ficon ficon_user S_ficon">H</em><em class="S_txt1">{{session('homeUser')['user_name']}}</em></a></li>
                                <li><a node-type="loginBtn" href="{{url('home/logout')}}" class="S_txt1" target="_top">退出登录</a></li>
                            </ul>
                        </div>
                        <div class="gn_set S_line1">

                            <div class="gn_set_list"><a href="javascript:show_setbox();" id="show_setbox"><em class="W_ficon ficon_set S_ficon">*</em></a>
                                <div class="gn_topmenulist gn_topmenulist_set" id="user_set_box" node-type="accountLayer" style="display:none"><!--data start--><ul><li><a dot="pos55b99b65482fe" href="http://account.weibo.com/set/index?topnav=1&amp;wvr=6" suda-data="key=account_setup&amp;value=account_setup">帐号设置</a></li><li><a dot="pos55b99bf4bba8f" target="_top" href="http://vip.weibo.com/?topnav=1&amp;wvr=6" suda-data="top_account&amp;value=member_center">会员中心</a></li><li><a dot="pos55b9df2cc0557" target="_top" href="http://verified.weibo.com/verify?topnav=1&amp;wvr=6" suda-data="key=pc_apply_entry&amp;value=home_top_entrance">V认证</a></li> <li><a dot="pos55b9df5d53f10" target="_top" href="http://security.weibo.com/account/security?topnav=1&amp;wvr=6" suda-data="key=account_setup&amp;value=account_safe">帐号安全</a></li> <li><a dot="pos55b9df9b80cae" target="_top" href="http://account.weibo.com/set/privacy?topnav=1&amp;wvr=6" suda-data="key=account_setup&amp;value=privacy_setup">隐私设置</a></li><li><a target="_top" href="http://account.weibo.com/set/shield?topnav=1&amp;wvr=6">屏蔽设置</a></li><li><a dot="pos55b9dfb6dd2f7" href="http://account.weibo.com/set/message?topnav=1&amp;wvr=6" suda-data="key=account_setup&amp;value=notice_setup">消息设置</a></li><li><a dot="pos55b9dfda375ef" href="http://help.weibo.com/?topnav=1&amp;wvr=6" suda-data="key=account_setup&amp;value=helpcenter">帮助中心</a></li><li class="line S_line1"></li><li class="gn_func"><a target="_top" suda-data="key=account_setup&amp;value=quit" href="http://weibo.com/logout.php?backurl=%2F">退出</a></li></ul><div class="W_layer_arrow"><span class="W_arrow_bor W_arrow_bor_t"><i class="S_line3"></i><em class="S_bg2_br"></em></span></div></div>
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
                    <div id="v6_pl_leftnav_group" style="position:fixed"  >    <div style="visibility: hidden;"></div><div style="z-index: 10; transform: translateZ(0px); position: relative; transition: margin-top 0.3s ease; will-change: margin-top, top; width: 150px;" class=" "><div class="WB_left_nav WB_left_nav_Atest" node-type="groupList" fixed-item="true" fixed-id="3">
                                <div class="lev_Box lev_Box_noborder">
                                    <h3 class="lev"><a href="http://weibo.com/u/5462231537/home?leftnav=1" class="S_txt1" node-type="item" bpfilter="main" nm="status" suda-uatrack="key=V6update_leftnavigate&amp;value=homepage"><span class="levtxt">首页</span></a></h3>
                                </div>
                                <div class="lev_Box lev_Box_noborder">
                                    <h3 class="lev"><a href="" class="S_txt1" ><span class="levtxt">我的收藏</span></a></h3>
                                </div>
                                <div class="lev_Box lev_Box_noborder">
                                    <h3 class="lev"><a href="" class="S_txt1" node-type="item"><span class="levtxt">我的赞</span><i class="W_new" style="display:none;"></i></a></h3>
                                </div>
                                <div class="lev_Box lev_Box_noborder">
                                    <h3 class="lev"><a href="" class="S_txt1" node-type="item"><span class="levtxt">评论过的</span><i class="W_new" style="display:none;"></i></a></h3>
                                </div>


                                <div class="lev_line">
                                    <fieldset><legend><a  href=""  class="W_ficon ficon_setup S_ficon" >J</a></legend></fieldset>
                                </div>
                                <div node-type="leftnav_scroll" class=" UI_scrollView"><div class="UI_scrollContainer">
                                        <div class="UI_scrollContent" style="width: 167px;">
                                            <div class="lev_Box">
                                                <div node-type="system_list" specialgid="3795654872842947">
                                                    <div class="lev"><a href="{{url('home/u/interest')}}" class="S_txt1" ><span class="ico_block"><em  class="W_ficon ficon_p_interest S_ficon">æ</em></span><span class="levtxt">特别关注</span></a></div>
                                                </div>
                                                <div node-type="leftnav_grouplists">

                                                    <div class="lev"><a href="{{url('home/u/fieldset')}}" class="S_txt1" ><span class="ico_block"><em class="W_ficon ficon_groupwb S_ficon">º</em></span><span class="levtxt">订阅频道</span></a></div>

                                                </div>
                                            </div>    </div>
                                    </div><div class="UI_scrollBar W_scroll_y S_bg1" style="visibility: hidden;"><div class="bar S_txt2_bg" style="top: 0%; height: 100%;"></div></div></div>
                            </div><div style="height:1px;margin-top:-1px;visibility:hidden;"></div></div></div>
                </div><div id="plc_main">

                    <div class="WB_main_c">

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
                              <input id="file_upload" type="file" name="file_upload[]" multiple="multiple"  >
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
                                    <div class="W_layer W_layer_pop " style="display:none;" id="biaoqingxianshi" style="width: 408px; left: 4px; top: 40px;"><div class="content"><div class="W_layer_close"><a href="javascript:void(0);" node-type="close" class="W_ficon ficon_close S_ficon">X</a></div><div class="layer_faces"><div class="WB_minitab"><ul class="minitb_ul S_line1 S_bg1 clearfix">
                                                        <li class="minitb_item S_line1 current" node-type="tab" title="默认"><a href="javascript:void(0);" class="minitb_lk S_txt1 S_bg2" action-type="tab" action-data="index=0">默认</a><span class="cur_block"></span></li>
                                                        <li class="minitb_item S_line1 " node-type="tab" title="心情"><a href="javascript:void(0);" class="minitb_lk S_txt1" action-type="tab" action-data="index=1">心情</a><span class="cur_block"></span></li>
                                                    </ul></div><div class="faces_list_box"><div class="faces_list UI_scrollView" node-type="scrollView"><div class="UI_scrollContainer">
                                                            <div class="UI_scrollContent" style="width: 390px;"><div id="face_list_ul" node-type="list"><ul class="faces_list_hot clearfix" ><li action-type="select" action-data="insert=%5B%E5%B9%BF%E5%91%8A%5D" title="广告" suda="key=mainpub_default_expr&amp;value=first"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/60/ad_new0902_thumb.gif"></li><li action-type="select" action-data="insert=%5Bdoge%5D" title="doge" suda="key=mainpub_default_expr&amp;value=second"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/b6/doge_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%96%B5%E5%96%B5%5D" title="喵喵" suda="key=mainpub_default_expr&amp;value=third"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/4a/mm_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E4%BA%8C%E5%93%88%5D" title="二哈" suda="key=mainpub_default_expr&amp;value=fouth"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/74/moren_hashiqi_thumb.png"></li><li action-type="select" action-data="insert=%5B%E5%B0%8F%E9%BB%84%E4%BA%BA%E5%89%AA%E5%88%80%E6%89%8B%5D" title="小黄人剪刀手" suda="key=mainpub_default_expr&amp;value=fifth"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/ed/xiaohuangren_jiandaoshou_thumb.png"></li><li action-type="select" action-data="insert=%5B%E5%B0%8F%E9%BB%84%E4%BA%BA%E9%AB%98%E5%85%B4%5D" title="小黄人高兴" suda="key=mainpub_default_expr&amp;value=sixth"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/8d/xiaohuangren_gaoxing_thumb.png"></li><li action-type="select" action-data="insert=%5B%E7%AC%91cry%5D" title="笑cry" suda="key=mainpub_default_expr&amp;value=seventh"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/34/xiaoku_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E6%91%8A%E6%89%8B%5D" title="摊手" suda="key=mainpub_default_expr&amp;value=eighth"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/09/pcmoren_tanshou_thumb.png"></li><li action-type="select" action-data="insert=%5B%E6%8A%B1%E6%8A%B1%5D" title="抱抱" suda="key=mainpub_default_expr&amp;value=ninth"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/70/pcmoren_baobao_thumb.png"></li><li action-type="select" action-data="insert=%5B%E8%B7%AA%E4%BA%86%5D" title="跪了" suda="key=mainpub_default_expr&amp;value=tenth"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6c/pcmoren_guile_thumb.png"></li><li action-type="select" action-data="insert=%5B%E5%90%83%E7%93%9C%5D" title="吃瓜" suda="key=mainpub_default_expr&amp;value=eleventh"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/8a/moren_chiguaqunzhong_thumb.png"></li><li action-type="select" action-data="insert=%5B%E5%93%86%E5%95%A6A%E6%A2%A6%E5%90%83%E6%83%8A%5D" title="哆啦A梦吃惊" suda="key=mainpub_default_expr&amp;value=twelfth"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/f0/dorachijing_thumb.gif"></li></ul><ul>
                                                                        <li action-type="select" action-data="insert=%5B%E5%9D%8F%E7%AC%91%5D" title="坏笑" suda="key=mainpub_default_expr&amp;value=eighteen"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/50/pcmoren_huaixiao_thumb.png"></li>
                                                                        <li action-type="select" action-data="insert=%5B%E8%88%94%E5%B1%8F%5D" title="舔屏" suda="key=mainpub_default_expr&amp;value=nineteen"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/pcmoren_tian_thumb.png"></li>
                                                                        <li action-type="select" action-data="insert=%5B%E6%B1%A1%5D" title="污" suda="key=mainpub_default_expr&amp;value=twenty"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/3c/pcmoren_wu_thumb.png"></li>
                                                                        <li action-type="select" action-data="insert=%5B%E5%85%81%E6%82%B2%5D" title="允悲" suda="key=mainpub_default_expr&amp;value=twenty-one"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/2c/moren_yunbei_thumb.png"></li>
                                                                        <li action-type="select" action-data="insert=%5B%E7%AC%91%E8%80%8C%E4%B8%8D%E8%AF%AD%5D" title="笑而不语" suda="key=mainpub_default_expr&amp;value=twenty-two"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/3a/moren_xiaoerbuyu_thumb.png"></li>
                                                                        <li action-type="select" action-data="insert=%5B%E8%B4%B9%E8%A7%A3%5D" title="费解" suda="key=mainpub_default_expr&amp;value=twenty-three"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/3c/moren_feijie_thumb.png"></li>
                                                                        <li action-type="select" action-data="insert=%5B%E6%86%A7%E6%86%AC%5D" title="憧憬" suda="key=mainpub_default_expr&amp;value=twenty-four"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/37/moren_chongjing_thumb.png"></li>
                                                                        <li action-type="select" action-data="insert=%5B%E5%B9%B6%E4%B8%8D%E7%AE%80%E5%8D%95%5D" title="并不简单" suda="key=mainpub_default_expr&amp;value=twenty-five"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/fc/moren_bbjdnew_thumb.png"></li><li action-type="select" action-data="insert=%5B%E5%BE%AE%E7%AC%91%5D" title="微笑" suda="key=mainpub_default_expr&amp;value=twenty-six"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/5c/huanglianwx_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E9%85%B7%5D" title="酷" suda="key=mainpub_default_expr&amp;value=twenty-seven"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/8a/pcmoren_cool2017_thumb.png"></li><li action-type="select" action-data="insert=%5B%E5%98%BB%E5%98%BB%5D" title="嘻嘻" suda="key=mainpub_default_expr&amp;value=twenty-eight"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0b/tootha_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%93%88%E5%93%88%5D" title="哈哈" suda="key=mainpub_default_expr&amp;value=twenty-nine"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6a/laugh.gif"></li><li action-type="select" action-data="insert=%5B%E5%8F%AF%E7%88%B1%5D" title="可爱" suda="key=mainpub_default_expr&amp;value=thirty"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/14/tza_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%8F%AF%E6%80%9C%5D" title="可怜" suda="key=mainpub_default_expr&amp;value=thirty-one"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/af/kl_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E6%8C%96%E9%BC%BB%5D" title="挖鼻" suda="key=mainpub_default_expr&amp;value=thirty-two"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0b/wabi_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%90%83%E6%83%8A%5D" title="吃惊" suda="key=mainpub_default_expr&amp;value=thirty-three"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/f4/cj_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%AE%B3%E7%BE%9E%5D" title="害羞" suda="key=mainpub_default_expr&amp;value=thirty-four"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6e/shamea_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E6%8C%A4%E7%9C%BC%5D" title="挤眼" suda="key=mainpub_default_expr&amp;value=thirty-five"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/c3/zy_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E9%97%AD%E5%98%B4%5D" title="闭嘴" suda="key=mainpub_default_expr&amp;value=thirty-six"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/29/bz_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E9%84%99%E8%A7%86%5D" title="鄙视" suda="key=mainpub_default_expr&amp;value=thirty-seven"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/71/bs2_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E7%88%B1%E4%BD%A0%5D" title="爱你" suda="key=mainpub_default_expr&amp;value=thirty-eight"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6d/lovea_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E6%B3%AA%5D" title="泪" suda="key=mainpub_default_expr&amp;value=thirty-nine"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/9d/sada_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%81%B7%E7%AC%91%5D" title="偷笑" suda="key=mainpub_default_expr&amp;value=forty"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/19/heia_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E4%BA%B2%E4%BA%B2%5D" title="亲亲" suda="key=mainpub_default_expr&amp;value=forty-one"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/8f/qq_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E7%94%9F%E7%97%85%5D" title="生病" suda="key=mainpub_default_expr&amp;value=forty-two"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/b6/sb_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%A4%AA%E5%BC%80%E5%BF%83%5D" title="太开心" suda="key=mainpub_default_expr&amp;value=forty-three"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/58/mb_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E7%99%BD%E7%9C%BC%5D" title="白眼" suda="key=mainpub_default_expr&amp;value=forty-four"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d9/landeln_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%8F%B3%E5%93%BC%E5%93%BC%5D" title="右哼哼" suda="key=mainpub_default_expr&amp;value=forty-five"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/98/yhh_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%B7%A6%E5%93%BC%E5%93%BC%5D" title="左哼哼" suda="key=mainpub_default_expr&amp;value=forty-six"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6d/zhh_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%98%98%5D" title="嘘" suda="key=mainpub_default_expr&amp;value=forty-seven"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/a6/x_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E8%A1%B0%5D" title="衰" suda="key=mainpub_default_expr&amp;value=forty-eight"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/af/cry.gif"></li><li action-type="select" action-data="insert=%5B%E5%A7%94%E5%B1%88%5D" title="委屈" suda="key=mainpub_default_expr&amp;value=forty-nine"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/73/wq_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%90%90%5D" title="吐" suda="key=mainpub_default_expr&amp;value=fifty"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/9e/t_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%93%88%E6%AC%A0%5D" title="哈欠" suda="key=mainpub_default_expr&amp;value=fifty-one"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/cc/haqianv2_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E6%8A%B1%E6%8A%B1_%E6%97%A7%5D" title="抱抱_旧" suda="key=mainpub_default_expr&amp;value=fifty-two"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/27/bba_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E6%80%92%5D" title="怒" suda="key=mainpub_default_expr&amp;value=fifty-three"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/7c/angrya_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E7%96%91%E9%97%AE%5D" title="疑问" suda="key=mainpub_default_expr&amp;value=fifty-four"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/5c/yw_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E9%A6%8B%E5%98%B4%5D" title="馋嘴" suda="key=mainpub_default_expr&amp;value=fifty-five"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/a5/cza_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E6%8B%9C%E6%8B%9C%5D" title="拜拜" suda="key=mainpub_default_expr&amp;value=fifty-six"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/70/88_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E6%80%9D%E8%80%83%5D" title="思考" suda="key=mainpub_default_expr&amp;value=fifty-seven"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/e9/sk_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E6%B1%97%5D" title="汗" suda="key=mainpub_default_expr&amp;value=fifty-eight"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/24/sweata_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%9B%B0%5D" title="困" suda="key=mainpub_default_expr&amp;value=fifty-nine"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/kunv2_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E7%9D%A1%5D" title="睡" suda="key=mainpub_default_expr&amp;value=sixty"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/96/huangliansj_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E9%92%B1%5D" title="钱" suda="key=mainpub_default_expr&amp;value=sixty-one"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/90/money_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%A4%B1%E6%9C%9B%5D" title="失望" suda="key=mainpub_default_expr&amp;value=sixty-two"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0c/sw_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E8%89%B2%5D" title="色" suda="key=mainpub_default_expr&amp;value=sixty-three"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/20/huanglianse_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%93%BC%5D" title="哼" suda="key=mainpub_default_expr&amp;value=sixty-four"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/49/hatea_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E9%BC%93%E6%8E%8C%5D" title="鼓掌" suda="key=mainpub_default_expr&amp;value=sixty-five"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/36/gza_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E6%99%95%5D" title="晕" suda="key=mainpub_default_expr&amp;value=sixty-six"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d9/dizzya_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E6%82%B2%E4%BC%A4%5D" title="悲伤" suda="key=mainpub_default_expr&amp;value=sixty-seven"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/1a/bs_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E6%8A%93%E7%8B%82%5D" title="抓狂" suda="key=mainpub_default_expr&amp;value=sixty-eight"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/62/crazya_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E9%BB%91%E7%BA%BF%5D" title="黑线" suda="key=mainpub_default_expr&amp;value=sixty-nine"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/91/h_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E9%98%B4%E9%99%A9%5D" title="阴险" suda="key=mainpub_default_expr&amp;value=seventy"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6d/yx_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E6%80%92%E9%AA%82%5D" title="怒骂" suda="key=mainpub_default_expr&amp;value=seventy-one"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/60/numav2_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E4%BA%92%E7%B2%89%5D" title="互粉" suda="key=mainpub_default_expr&amp;value=seventy-two"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/89/hufen_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%BF%83%5D" title="心" suda="key=mainpub_default_expr&amp;value=seventy-three"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/hearta_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E4%BC%A4%E5%BF%83%5D" title="伤心" suda="key=mainpub_default_expr&amp;value=seventy-four"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/ea/unheart.gif"></li><li action-type="select" action-data="insert=%5B%E7%8C%AA%E5%A4%B4%5D" title="猪头" suda="key=mainpub_default_expr&amp;value=seventy-five"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/58/pig.gif"></li><li action-type="select" action-data="insert=%5B%E7%86%8A%E7%8C%AB%5D" title="熊猫" suda="key=mainpub_default_expr&amp;value=seventy-six"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/6e/panda_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%85%94%E5%AD%90%5D" title="兔子" suda="key=mainpub_default_expr&amp;value=seventy-seven"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/81/rabbit_thumb.gif"></li><li action-type="select" action-data="insert=%5Bok%5D" title="ok" suda="key=mainpub_default_expr&amp;value=seventy-eight"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d6/ok_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E8%80%B6%5D" title="耶" suda="key=mainpub_default_expr&amp;value=seventy-nine"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d9/ye_thumb.gif"></li><li action-type="select" action-data="insert=%5Bgood%5D" title="good" suda="key=mainpub_default_expr&amp;value=eighty"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d8/good_thumb.gif"></li><li action-type="select" action-data="insert=%5BNO%5D" title="NO" suda="key=mainpub_default_expr&amp;value=eighty-one"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/ae/buyao_org.gif"></li><li action-type="select" action-data="insert=%5B%E8%B5%9E%5D" title="赞" suda="key=mainpub_default_expr&amp;value=eighty-two"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d0/z2_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E6%9D%A5%5D" title="来" suda="key=mainpub_default_expr&amp;value=eighty-three"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/40/come_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%BC%B1%5D" title="弱" suda="key=mainpub_default_expr&amp;value=eighty-four"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d8/sad_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E8%8D%89%E6%B3%A5%E9%A9%AC%5D" title="草泥马" suda="key=mainpub_default_expr&amp;value=thirteen"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/7a/shenshou_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E7%A5%9E%E9%A9%AC%5D" title="神马" suda="key=mainpub_default_expr&amp;value=fourteen"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/60/horse2_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E5%9B%A7%5D" title="囧" suda="key=mainpub_default_expr&amp;value=fifteen"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/15/j_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E6%B5%AE%E4%BA%91%5D" title="浮云" suda="key=mainpub_default_expr&amp;value=sixteen"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/bc/fuyun_thumb.gif"></li><li action-type="select" action-data="insert=%5B%E7%BB%99%E5%8A%9B%5D" title="给力" suda="key=mainpub_default_expr&amp;value=seventeen"><img src="//img.t.sinajs.cn/t4/appstyle/expression/ext/normal/1e/geiliv2_thumb.gif"></li></ul></div></div>
                                                        </div><div class="UI_scrollBar W_scroll_y S_bg1" style=""><div class="bar S_txt2_bg" style="top: 0%; height: 87.5502%;"></div></div></div></div></div><div class="W_layer_arrow"><span class="W_arrow_bor W_arrow_bor_t" node-type="arrow" style="left: 16px;"><i class="S_line3"></i><em class="S_bg2_br"></em></span></div></div></div>

                                </div>
                             </form>
                            </div>
                        </div>
                        <div id="v6_pl_content_biztips"><div suda-uatrack="key=zymo&amp;value=wbv5~10~m~none" suda-urls="" ad-data="id=ads_top&amp;url=//wbpctips.uve.weibo.com/adfront/deliver.php&amp;posid=pos525904036078b&amp;psid=PDPS000000052321&amp;wbVersion=v6&amp;uid=5462231537&amp;cip=121.69.21.82&amp;spr=www.cweibo.com" cache="true"></div>
                        </div>

                        <div id="v6_pl_content_homefeed"><div node-type="homefeed">
                                <div class="WB_tab_a" node-type="feed_nav" mblogsorttype="" dom_id="Pl_Content_HomeFeed">
                                    <div class="tab_box tab_box_a tab_box_a_r6 clearfix">
                                        <ul class="tab W_fl clearfix">
                                            <li class="li_first S_bg2"></li>
                                            <li class="curr">
                                                <a suda-data="key=tblog_home_tab&amp;value=all" href="http://weibo.com/u/5462231537/home" class="S_txt1" action-data="type=0" action-type="search_type">
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
                                            <li class="S_bg2">
                                                <a suda-data="key=tblog_home_tab&amp;value=org" href="http://weibo.com/u/5462231537/home?is_ori=1" class="S_txt1" action-data="type=1" action-type="search_type">
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
                                            <li class="S_bg2">
                                                <a suda-data="key=tblog_home_tab&amp;value=pic" href="http://weibo.com/u/5462231537/home?is_pic=1" class="S_txt1" action-type="search_type">
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
                                            <li class="S_bg2">
                                                <a suda-data="key=tblog_home_tab&amp;value=video" href="http://weibo.com/u/5462231537/home?is_video=1" class="S_txt1" action-type="search_type">
                                                    <span class="t S_bg2">视频</span>
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
                                                <a suda-data="key=tblog_home_tab&amp;value=music" href="http://weibo.com/u/5462231537/home?is_music=1" class="S_txt1" action-type="search_type">
                                                    <span class="t S_bg2">音乐</span>
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
                                                <a suda-data="key=tblog_home_tab&amp;value=article" href="http://weibo.com/u/5462231537/home?is_article=1" class="S_txt1" action-type="search_type">
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
                                            <li class="li_last S_bg2"></li>
                                        </ul>
                                        <div class="fr_box W_fr S_bg2">
                                            <div class="search_box W_fr">

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!--feed list-->
                               <div class="WB_feed WB_feed_v3 WB_feed_v4" pagenum="1" node-type="feed_list" unread_mode="1">


                                   {{--第一个内容标签开始--}}
                                    <div class="WB_cardwrap WB_feed_type S_bg2 WB_feed_like" >
                                        <div class="WB_feed_detail clearfix" node-type="feed_content">
                                            <div class="WB_screen W_fr">
                                                {{--操作标签开始--}}
                                                <div class="screen_box" style="display:none; ">
                                                    <a href="javascript:void(0);" class="fl_menu"><i class="W_ficon ficon_arrow_down S_ficon">c</i></a>

                                                    <div class="layer_menu_list_" node-type="fl_menu_right" style="display:none; position: absolute; z-index: 999;">
                                                        <ul>
                                                            <li><a href="javascript:void(0)" >取消关注交通北京</a></li>
                                                            <li><a href="javascript:void(0);" id="jubao">举报</a></li>
                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                            {{--头像--}}
                                            <div class="WB_face W_fl">
                                                <div class="face"><a target="_blank" class="W_face_radius"  href="http://weibo.com/bjsjtw?refer_flag=0000015010" ><img  alt="" width="50" height="50" src="../userindexsource/9012a0c7jw1e8qgp5bmzyj2050050aa8.jpg" class="W_face_radius"></a></div>
                                            </div>
                                            {{--名字--}}
                                            <div class="WB_detail">
                                                <div class="WB_info">
                                                    <a nick-name="交通北京" class="W_f14 W_fb S_txt1" target="_blank" href="http://weibo.com/bjsjtw?refer_flag=0000015010">交通北京</a>   </div>
                                                {{--时间--}}
                                                <div class="WB_from S_txt2">
                                                    <!-- minzheng add part 2 -->
                                                    今天 19:34  来自 360安全浏览器                                                   <!-- minzheng add part 2 -->
                                                </div>
                                                <div class="WB_text W_f14" >
                                                    明天白天阴，大部地区有小雨转多云，北风二三级，最高气温13℃。                            </div>
                                                {{--转发框开始--}}
                                                <div class="WB_feed_expand">
                                                    <div class="W_arrow_bor W_arrow_bor_t"><i class="S_bg1_br"></i></div>
                                                    <div class="WB_expand S_bg1" node-type="feed_list_forwardContent">
                                                        <div class="WB_info">
                                                            <a target="_blank" class="W_fb S_txt1" href="http://weibo.com/qixiangbj?refer_flag=0000015010"">@气象北京</a> </div>
                                                        <div class="WB_text" node-type="feed_list_reason">
                                                            【明日出行防雨需添衣】今天夜间多云转阴，西部山区有小雨，北风一二级，最低气温6℃；明天白天阴，大部地区有小雨转多云，北风二三级，最高气温13℃。早晚气温较低，外出需注意添衣保暖。明天白天本市大部地区将受小雨天气影响，出行请注意防雨。市气象台11日17时发布 ​​​​                                                            </div>

                                                        <!-- 微博心情，独立于标准的ul节点 -->

                                                        <div class="WB_media_wrap clearfix" node-type="feed_list_media_prev">
                                                            <div class="media_box">
                                                                <!--图片个数等于1，只显示图片-->
                                                                <!--picture_count == 1-->
                                                                <ul class="WB_media_a  WB_media_a_m1 clearfix" action-data="isPrivate=0&amp;relation=0&amp;clear_picSrc=%2F%2Fwx1.sinaimg.cn%2Fmw690%2F9bab7467ly1fkef44n2kig20dw0abwra.gif">
                                                                    <li class="WB_pic li_1 S_bg1 S_line2 bigcursor " >
                                                                        <img src="../userindexsource/9bab7467ly1fkef44n2kig20dw0abwra.gif">

                                                                        <i class="W_icon_tag_v2">大图/动图/长图</i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <!-- super topic card -->
                                                        <div class="WB_func clearfix">
                                                            <div class="WB_handle W_fr" mid="4161711856015303">
                                                                <ul class="clearfix">
                                                                    <li><span class="line S_line1">
                                            <span><em class="W_ficon ficon_forward S_ficon"></em><em>25</em></span></span></li>
                                                                    <li><span class="line S_line1">
                                            <span><em class="W_ficon ficon_repeat S_ficon"></em><em>14</em></span>
                                        </span></li>
                                                                    <li><span class="line S_line1"> <span node-type="like_status" class=""><em class="W_ficon ficon_praised S_txt2">ñ</em><em>7</em></span></span></li>
                                                                </ul>
                                                            </div>
                                                            <div class="WB_from S_txt2">
                                                                今天 17:08 来自 微博 weibo.com </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- feed区 大数据tag -->
                                                <!-- /feed区 大数据tag -->                    </div>

                                        </div>
                                        <!-- minzheng add part 3 -->
                                        <div class="WB_feed_handle">
                                            <div class="WB_handle">
                                                <ul class="WB_row_line WB_row_r4 clearfix S_line2">
                                                    <li>
                                                        <a class="S_txt2" href="javascript:void(0);" ><span class="pos"><span class="line S_line1" node-type="favorite_btn_text"><span><em class="W_ficon ficon_favorite S_ficon">û</em><em>收藏</em></span></span></span></a>
                                                    </li>
                                                    <li>
                                                        <a class="S_txt2"  href="javascript:void(0);" ><span class="pos"><span class="line S_line1" node-type="forward_btn_text"><span><em class="W_ficon ficon_forward S_ficon"></em><em>1</em></span></span></span></a>
                                                    </li>
                                                    <li>
                                                        <a class="S_txt2"  href="javascript:void(0);" ><span class="pos"><span class="line S_line1"><span><em class="W_ficon ficon_repeat S_ficon"></em><em>评论</em></span></span></span></a>

                                                    </li>
                                                    <li>
                                                        <!--cuslike用于前端判断是否显示个性赞，1:显示-->
                                                        <a href="javascript:void(0);" class="S_txt2" ><span class="pos"><span class="line S_line1">
                                                                                                                                                                                            <span node-type="like_status" class=""><em class="W_ficon ficon_praised S_txt2">ñ</em><em>1</em></span>                    </span></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div node-type="feed_list_repeat" class="WB_feed_repeat S_bg1" style="display:none;"></div>
                                    </div>
                            {{--第一个内容标签结束--}}





                                    <div class="WB_cardwrap S_bg2" id="userindex_getmore">
                                        <div class="WB_empty WB_empty_narrow" action-data="page_id=v6_content_home">
                                            <div class="WB_innerwrap">
                                                <div class="empty_con clearfix">
                                                    <p  class="text"><i class="W_loading"></i>加载更多</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div></div>
                    </div>
                    <div class="WB_main_r" style="position:fixed">

                        <div id="v6_pl_rightmod_myinfo"><div class="WB_cardwrap S_bg2">
                                <div class="W_person_info">
                                    <div class="cover" id="skin_cover_s" style="background-image:url(//img.t.sinajs.cn/t6/skin/skin048/images/profile_cover_s.jpg?version=195be0ed22185743)">
                                        <div class="headpic"> <a bpfilter="page_frame" href="http://weibo.com/5462231537/profile?rightmod=1&amp;wvr=6&amp;mod=personinfo" title="ifree的马甲"><img src="{{url(session('homeUser')['user_headpic'])}}" width="60" height="60" alt="ifree的马甲"></a></div>
                                    </div>
                                    <div class="WB_innerwrap">
                                        <div class="nameBox"><a >{{session('homeUser')['user_name']}}</a><a action-type="ignore_list" title="微博会员" target="_blank" href="http://vip.weibo.com/"><i class="W_icon icon_member_dis"></i></a><a action-type="" suda-data="key=tblog_grade_float&amp;value=grade_icon_click" target="_blank" href="http://level.account.weibo.com/level/mylevel?from=front"><span node-type="levelBox" levelup="0" action-data="level=6" class="W_icon_level icon_level_c2"><span class="txt_out"><span class="txt_in"><span node-type="levelNum" >Lv.{{session('homeUser')['user_level']}}</span></span></span></span></a></div>
                                        <ul class="user_atten clearfix W_f18">
                                            <li class="S_line1"><a bpfilter="page_frame" href="http://weibo.com/5462231537/follow?rightmod=1&amp;wvr=6" class="S_txt1"><strong node-type="follow">{{session('homeUser')['follow_count']}}</strong><span class="S_txt2">关注</span></a></li>
                                            <li class="S_line1"><a bpfilter="page_frame" href="http://weibo.com/5462231537/fans?rightmod=1&amp;wvr=6" class="S_txt1"><strong node-type="fans">{{session('homeUser')['fans_count']}}</strong><span class="S_txt2">粉丝</span></a></li>
                                            <li class="S_line1"><a bpfilter="page_frame" href="http://weibo.com/5462231537/profile?rightmod=1&amp;wvr=6&amp;mod=personnumber" class="S_txt1"><strong node-type="weibo">{{session('homeUser')['msg_count']}}</strong><span class="S_txt2">微博</span></a></li>
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
    {{--转发框--}}
    <div class="W_layer " style="position:absolute; display: none;" id="layer_15077982665411" style="top: 60px; left: 376.5px;" stk-mask-key="150779826654133"><div tabindex="0"></div>
        <div node-type="autoHeight" class="content">
            <div class="W_layer_title" node-type="title" style="cursor: move;">转发微博</div>
            <div class="W_layer_close"><a class="W_ficon ficon_close S_ficon" href="javascript:void(0);" node-type="close">X</a></div>
            <div node-type="inner" class="layer_forward"><!--userlist start--><div class="froward_wrap"><div class="WB_minitab clearfix" node-type="forward_tab"><span class="txt">转发到：</span><span class="txt">我的微博</span></div><div node-type="forward_client"><!--userlist start--><div node-type="toMicroblog_client"><div node-type="content" class="WB_text S_bg1"><a class="W_ficon ficon_arrow_down_lite S_ficon" action-type="origin_all" href="javascript:void(0);">g</a><span class="con S_txt2"><a target="_blank" href="//weibo.com/beijingguanzhong" class="S_txt1">@聚焦北京城</a>:#北京身边事# 【北大第六医院成功启动“阳光心晴...</span></div><div class="WB_feed_repeat forward_rpt1"><div class="WB_repeat"><div class="WB_feed_publish clearfix"><div class="WB_publish"><div class="p_input p_textarea"><textarea pubtype="forward" node-type="textEl" title="转发微博内容" cols="" rows="" name="" class="W_input" style="margin: 0px; padding: 5px 6px 25px; border-style: solid; border-width: 1px; font-size: 12px; word-wrap: break-word; line-height: 18px; overflow: hidden; outline: medium none; height: 48px;" range="0&amp;0"></textarea><span node-type="num" class="tips S_txt2"><span>140</span></span>
                                                <div style="display:display" node-type="success_tip" class="send_succpic"><span class="W_icon icon_succB"></span><span class="txt">发布成功</span></div>
                                            </div><div class="p_opt clearfix"><div class="btn W_fr"><div layout-shell="true" style="position:relative;" class="limits"></div><a class="W_btn_a" node-type="submit" href="javascript:void(0)">转发</a></div><div node-type="widget" test="1" class="opt clearfix"><span class="ico"><a node-type="smileyBtn" title="表情" href="javascript:void(0)"><i class="W_ficon ficon_face">o</i></a></span><ul node-type="cmtopts" class="ipt"><li class="W_autocut" node-type="originLi"></li></ul></div></div></div></div></div></div><!--userlist end--></div></div></div></div>
        </div>
    </div>

</div>
</body></html>