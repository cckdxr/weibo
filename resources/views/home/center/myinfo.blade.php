<!DOCTYPE html>
<html>
<head><script src="about:blank" charset="UTF-8" type="text/javascript"></script>
<meta charset="UTF-8">
<meta content="人民网,新浪微博,微博,weibo" name="keywords">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<meta name="viewport" content="initial-scale=1,minimum-scale=1">

   <script type="text/javascript" src='/home/css/index/lunbo/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='/layer/layer.js'></script>
<link rel="mask-icon" sizes="any" href="https://img.t.sinajs.cn/t6/style/images/apple/wbfont.svg" color="black">
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

<title>{{ session('user')['user_name']}}的微博_微博</title>
<link type="text/css" rel="stylesheet" charset="utf-8" href="/home/css/info/frame.css" putoff="style/css/module/combination/extra.css?version=fff74502022899ed">
	<link type="text/css" rel="stylesheet" charset="utf-8" href="/home/css/info/skin.css">
	
<script src="about:blank" async="" charset="utf-8" type="text/javascript"></script><script src="about:blank" async="" charset="utf-8" type="text/javascript"></script><script type="text/javascript">/* Code removed by ScrapBook */</script>
<script type="text/javascript">/* Code removed by ScrapBook */</script>
<!-- $CONFIG -->
<script type="text/javascript">
    function show_setbox(){
        $("#user_set_box").css("display","block");
    }
    $(window).click(function(){
        $("#user_set_box").css("display","none");
    })
</script>
<!-- / $CONFIG -->
<link id="FM_15076932594244" href="/home/css/info/comb_webim.css" type="text/css" rel="stylesheet"><div style="position: absolute; top: -9999px;"></div><style>
/* Code tidied up by ScrapBook */
</style><div style="position: absolute; top: -9999px; left: -9999px;"></div><style>
/* Code tidied up by ScrapBook */
</style><link rel="stylesheet" type="text/css" href="/home/css/info/extra.css"><link href="/home/css/info/PCD_mplayer.css" charset="utf-8" type="text/css" rel="Stylesheet"><link id="skin_style" href="/home/css/info/skin_001.css" charset="utf-8" type="text/css" rel="stylesheet"><style media="screen" type="text/css">
/* Code tidied up by ScrapBook */
</style><link id="FM_150769325942488" href="/home/css/info/PCD_counter.css" type="text/css" rel="stylesheet"><link id="FM_1507693259424103" href="/home/css/info/PCD_pictext_a.css" type="text/css" rel="stylesheet"><link id="FM_1507693259424127" href="/home/css/info/PCD_person_detail.css" type="text/css" rel="stylesheet"><link id="FM_1507693259424129" href="/home/css/info/PCD_text_b.css" type="text/css" rel="stylesheet"><link id="FM_1507693259424132" href="/home/css/info/credit.css" type="text/css" rel="stylesheet"></head>
<body style="background-image: url('{{session('user')['bg']}}');width:100%;height:100%" class="FRAME_page B_page S_page">
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
						<div class="pf_photo " node-type="photo">
						<p class="photo_wrap">
						 						 	<a action-type="setPhoto" title="更换头像" suda-uatrack="key=profile_head&amp;value=head_host">
                            <img src="{{session('homeUser')['user_headpic']}}" alt="{{session('homeUser')['user_name']}}" class="photo">
							</a>
						 						
						</p>
													</div>
						
						<div class="pf_username">
						<h1 class="username">{{session('user')['user_name']}}</h1>
																																<span class="icon_bed"><a><i class="W_icon icon_pf_male"></i></a></span>												
						</div>
						
						
												<div class="pf_intro">
						{{session('userinfo')['info']}}					</div>
											</div>
					<div class="upcover"><a style="display: none;" class="W_btn_b " node-type="custom"><em class="W_ficon ficon_upload S_ficon">É</em>上传封面图</a></div>
														</div>
			</div>
<div node-type="moreList" class="layer_menu_list_b" style="position: absolute; top: 332px; left: 900px; z-index: 999; display: none;">	
	<div class="list_wrap">
		<div class="list_content W_f14">
  			<ul class="list_ul">
  			  			    		    			    			<li class="item"><a suda-data="key=tblog_otherprofile_v5&amp;value=whisper" action-type="addQuietFollow" action-data="fuid=5322078304&amp;fname=暗里着迷醉梦死&amp;action=add" class="tlink" suda-uatrack="key=tblog_profile_v6&amp;value=silently_concern">悄悄关注</a></li>
    			    		    		<li class="item"><a action-data="title=%E6%8A%8A%E6%9A%97%E9%87%8C%E7%9D%80%E8%BF%B7%E9%86%89%E6%A2%A6%E6%AD%BB%E6%8E%A8%E8%8D%90%E7%BB%99%E6%9C%8B%E5%8F%8B&amp;content=%E5%BF%AB%E6%9D%A5%E7%9C%8B%E7%9C%8B%E6%9A%97%E9%87%8C%E7%9D%80%E8%BF%B7%E9%86%89%E6%A2%A6%E6%AD%BB%20%E7%9A%84%E5%BE%AE%E5%8D%9Ahttps://weibo.com/u/5322078304" action-type="widget_publish" class="tlink" suda-uatrack="key=tblog_profile_v6&amp;value=suggest_to_friends">推荐给朋友</a></li>
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
							<td>
					<a bpfilter="page" href="/home/myinfo" node-type="nav_link" suda-uatrack="key=tblog_profile_new&amp;value=tab_profile" class="tab_link">
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
					<a bpfilter="page" href="" node-type="nav_link" suda-uatrack="key=tblog_profile_new&amp;value=tab_manage" class="tab_link">
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
					<div id="Pl_Core_T8CustomTriColumn__54" anchor="-50">	<div class="WB_cardwrap S_bg2">
						<div class="PCD_counter">
							<div class="WB_innerwrap">
								<table class="tb_counter" cellpadding="0" cellspacing="0">
									<tbody>
										<tr>
																					<td class="S_line1">
																						<a bpfilter="page_frame" class="t_link S_txt1" href="https://weibo.com/5322078304/follow?from=page_100505&amp;wvr=6&amp;mod=headfollow#place"><strong class="W_f18">45</strong><span class="S_txt2">关注</span></a></td>
																																<td class="S_line1">
																						<a bpfilter="page_frame" class="t_link S_txt1" href="https://weibo.com/5322078304/fans?from=100505&amp;wvr=6&amp;mod=headfans&amp;current=fans#place"><strong class="W_f18">91</strong><span class="S_txt2">粉丝</span></a></td>
																																<td class="S_line1">
																						<a bpfilter="page_frame" class="t_link S_txt1" href="https://weibo.com/p/1005055322078304/home?from=page_100505_profile&amp;wvr=6&amp;mod=data#place"><strong class="W_f18">1</strong><span class="S_txt2">微博</span></a></td>
																															</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
</div>

					<div id="Pl_Official_RightGrowNew__56" anchor="-50"><div class="PRF_modwrap S_line1 clearfix">
	<div class="prm_app S_line1">
		<div class="prm_app_pinfo">


														<div class="WB_cardwrap S_bg2">
								<div class="PCD_person_detail">
								<div class="WB_cardtitle_b S_line2">
									<div class="obj_name"><h2 class="main_title W_fb W_f14"><a class="S_txt1">勋章信息</a></h2></div>
								</div>
								<div class="WB_innerwrap">
									<div class="m_wrap">
										<ul class="bagde_list clearfix">
																			             								             <li class="bagde_item"><a href="http://badge.weibo.com/5322078304?mid=433&amp;source=7" title="微身份"><img alt="微身份" title="微身份" src="433_s.gif" medalcard="433" height="24" width="24"></a></li>

										</ul>
									</div>
								</div>
								</div>
								</div>


							<div class="WB_cardwrap S_bg2">
								<div class="PCD_person_detail">
									<div class="WB_cardtitle_b S_line2">
										<div class="obj_name"><h2 class="main_title W_fb W_f14"><a class="S_txt1">等级信息</a></h2></div>
									</div>
									<div class="WB_innerwrap">
										<div class="m_wrap">
											<div class="level_box S_txt2">
												<a class="W_icon_level icon_level_c2" title="微博等级9 升级有好礼" href="http://level.account.weibo.com/level/mylevel?from=profile11" target="_black"><span>Lv.9</span></a>												<p class="level_info"> <span class="info"> 当前等级： <span class="S_txt1">Lv.9</span> </span> <span class="info"> 经验值： <span class="S_txt1">779</span> </span> <br><span class="info"> 距离升级需经验值： <span class="S_txt1">91</span> </span> </p>
											</div>
										</div>
									</div>

								</div>
							</div>


							</div>
	</div>
</div>
</div>

			</div>
	<div class="WB_frame_c" fixed-box="true">
					<div id="Pl_Official_PersonalInfo__58" anchor="-50">	<div style="height:842px" class="WB_cardwrap S_bg2">
		<iframe scrolling="no" allowtransparency="true" src="/home/info" style="width: 560px; height: 930px; margin: 20px;" frameborder="0"></iframe>
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
              <dd><a class="col3 S_txt2" target="_blank" href="https://weibo.com/static/logo?bottomnav=1&amp;wvr=6">微博标识</a><a class="col3 S_txt2" target="_blank" href="http://tui.weibo.com/intro/agent?bottomnav=1&amp;wvr=6">广告代理商</a></dd>
              <dd><a class="col3 S_txt2" target="_blank" href="http://open.weibo.com/?bottomnav=1&amp;wvr=6">开放平台</a></dd>
          </dl>
          <dl class="list">
            <dt>微博帮助</dt>
            <dd><a class="col4 S_txt2" target="_blank" href="http://help.weibo.com/faq/q/358?bottomnav=1&amp;wvr=6">常见问题</a></dd>
            <dd><a class="col4 S_txt2" target="_blank" href="http://help.weibo.com/selfservice?bottomnav=1&amp;wvr=6">自助服务</a></dd>
          </dl>
        </div>
        <div class="other_link S_bg1 clearfix T_add_ser">
            <p class="copy"><a target="_blank" href="http://help.weibo.com/?refer=didao&amp;bottomnav=1&amp;wvr=6" class="S_txt2"><i class="W_icon icon_weibo"></i>微博客服</a><a class="S_txt2" target="_blank" href="http://help.weibo.com/newtopic/suggest?bottomnav=1&amp;wvr=6">意见反馈</a><a class="S_txt2" target="_blank" href="https://weibo.com/aj/static/report.html?_wv=6">舞弊举报</a><a class="S_txt2" target="_blank" href="http://ir.weibo.com/">About Weibo</a><a class="S_txt2" target="_blank" href="http://open.weibo.com/?bottomnav=1&amp;wvr=6">开放平台</a><a class="S_txt2" target="_blank" href="http://hr.weibo.com/?bottomnav=1&amp;wvr=6">微博招聘</a><a class="S_txt2" target="_blank" href="http://news.sina.com.cn/guide/?bottomnav=1&amp;wvr=6">新浪网导航</a><a class="S_txt2" target="_blank" href="http://service.account.weibo.com/?bottomnav=1&amp;wvr=6">举报处理大厅</a>
                <select class="lang_select" id="lang_select" node-type="changeLanguage">
                    <option value="zh-cn">中文(简体)</option>
                    <option value="zh-tw">中文(台灣)</option>
                    <option value="zh-hk">中文(香港)</option>
                                    </select></p>
            <p class="copy_v2"><a class="S_txt2" target="_blank" href="https://weibo.com/aj/static/jicp.html?_wv=6">京ICP证100780号</a><a class="S_txt2" target="_blank" href="https://weibo.com/aj/static/medi_license.html?_wv=6">互联网药品服务许可证</a><a class="S_txt2" target="_blank" href="https://weibo.com/aj/static/jww.html?_wv=6">京网文[2014]2046-296号</a> <a class="S_txt2" target="_blank" href="https://www.miibeian.gov.cn/">京ICP备12002058号</a> <a class="S_txt2" target="_blank" href="https://weibo.com/aj/static/license.html?_wv=6">增值电信业务经营许可证B2-20140447</a><a class="S_txt2" target="_blank" href="https://weibo.com/aj/static/map_license.html?_wv=6">乙测资字1111805</a></p>
            <p class="company"><span><a class="S_txt2" target="_blank" href="https://weibo.com/aj/static/tv_license.html?_wv=6">广播电视节目制作经营许可证（京）字第04005号</a></span><span class="copy S_txt2">Copyright © 2009-2017 WEIBO 北京微梦创科网络技术有限公司</span><span><a class="S_txt2" target="_blank" href="https://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11000002000019"><i class="icon_netsecurity"></i>京公网安备11000002000019号</a></span></p>
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
<textarea style="width: 509.6px; font-size: 12px; font-family: 'Arial','Microsoft YaHei'; line-height: 18px; padding: 5px 2px 0px 6px; top: -1000px; height: 0px; position: absolute; overflow: hidden;" id="_____textarea_____"></textarea><div style="display: none;"><div class="layer_menu_list"><ul node-type="suggestWrap"></ul></div></div><div node-type="wrap" style="left: 166px; top: 716px; height: 23px; margin: 0px; padding: 5px 2px 0px 6px; border-style: solid; border-width: 1px; font-size: 12px; word-wrap: break-word; line-height: 18px; overflow-y: auto; overflow-x: hidden; outline: medium none; position: absolute; opacity: 0; z-index: -1000; display: none;"><span node-type="before"></span><span node-type="flag"></span><span node-type="after"></span></div>
  <div style="position: fixed; bottom: 0px; right: 0px; z-index: 1024;" class="WB_webim" id="WB_webim"><iframe src="index_2.html" style="position: absolute; left: -100px; top: -100px; height: 1px; width: 1px; visibility: hidden; display: none;" id="cometd_imsdk_1">
          <iframe src="index_3.html"></iframe></iframe>
      </div>
  <div i-am-music-player="" node-type="box">
<div class="PCD_mplayer_layer" style="position: fixed; bottom: 90px; left: 30px; display: none;" node-type="confirm">
    <div class="content">
        <p class="main_txt"><span class="txt">确认要隐藏播放器吗？</span></p>
        <p class="sub_txt S_txt2">隐藏后点击页面任意播放按钮即可再次出现</p>
        <div class="btn">
            <a action-type="hide" class="btn_a" suda-data="key=tblog_musicpageplayer&amp;value=click_close">确认</a>
            <a action-type="hide_confirm" class="btn_b">取消</a>
        </div>
        <div class="layer_arrow"><span class="arrow_bor arrow_bor_b"><i class="arrow_a"></i><em class="arrow_b"></em></span></div>
    </div>
</div>


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
</body>
</html>
