<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <!--注册登录header-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="home/register/frame.css" type="text/css" rel="stylesheet">
    <link href="home/register/layer_login_v5.css" type="text/css" rel="stylesheet">
    <link href="home/register/register.css" type="text/css" rel="stylesheet">
    <link href="home/register/register_002.css" type="text/css" rel="stylesheet">

    <script src="home/register/suda.js" async="" charset="utf-8" type="text/javascript"></script><script type="text/javascript">
        var $CONFIG = {};
        $CONFIG['lang'] = "zh-cn";
    </script>
    <!--/注册登录header-->
    <title>微博注册</title>

<body class="B_register B_reg_tel ">
<script type="text/javascript">
    $CONFIG.key = 'BD325CE52FC6BA090AC0C7A2039236587F99C30FA518F601F2AD33019514EE5A4340A964853E1BDF5374AB4AC22F5CFF3288E5DB94E6752B4999972DF4E23DACACAE4E4DCFB6CBAE256F1B19C4BA892D54C7A3E068F93AB47EC50635556FC223F02CB1F520631E2F03E5509B6C1E24DFB7962BCD6DC74159BF0E5AFC03D9A00D';
    $CONFIG.key_plus = '10001';
    $CONFIG.province = '11';
    $CONFIG.city = '';
    $CONFIG.closeSendsms = '1';
    $CONFIG.page = 'mobile';
</script>
<div class="W_nologin">
    <div class="W_header_line"></div>
    <div class="W_reg_header W_logo_wave">
        <div class="W_nologin_logo_big"></div>
    </div>
    <div class="W_nologin_main main_radius_bg">
        <div class="main_tab_line">
            <a class="W_f22 W_Yahei cur" href="javascript:void(0);">个人注册</a>
            <span class="vline">|</span>
            <a class="W_f22 W_Yahei " href="javascript:void(0);">官方注册</a>
        </div>
        <div class="W_reg_info clearfix" id="pl_account_regmobile">
            <div class="W_reg_form">
                <div class="info_list clearfix" node-type="mobilesea_wrapper">
                    <div class="tit"><span class="mobile_ico"></span><i>*</i>邮箱：</div>
                    <div class="inp">
                        <div class="flag_tel clearfix">
                            <!-- 获得焦点时增加  -->


                            <div class="W_input foreign_tel">
                                <input node-type="newmobilesea" action-data=" action-type="text_copy" name="username" class="tel_num" placehoder="请输入您的邮箱" autocomplete="off" type="text">
                                <div style="position:absolute; top:320px; left:100px; z-index:99;display:none;" class="layer_menu_list msg_set_select layer_set_country" node-type="mobilesea_selectlayer">
                                    <!-- 选中态 select, a内增加 em -->

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tips" node-type="mobilesea_tip"></div>
                </div>
                <div class="info_list clearfix">
                    <div class="tit"><i>*</i>设置密码：</div>
                    <div class="inp">
                        <input node-type="password" action-data="" action-type="text_copy" name="passwd" class="W_input" value="" type="password">
                    </div>
                    <div node-type="password_tip" class="tips"></div>
                </div>

                <div node-type="activation_wrapper" class="info_list clearfix" >
                    <div class="tit"><i>*</i>激活码：</div>
                    <div class="inp active">
                        <a href="javascript:void(0);" class="W_btn_e" action-type="btn_sms_activation" node-type="btn_sms_activation" action-data="type=sendsms"><span>免费获取邮箱激活码</span></a>
                        <a href="javascript:void(0);" class="W_btn_e_disable" style="display:none" node-type="btn_sms_activation_disable"><span><em node-type="sms_timer">180</em>秒后重新获取</span></a>
                        <input disabled="disabled" node-type="activation" name="pincode" class="W_input" maxlength="6" type="text">
                        <div class="attachment"><a href="http://help.weibo.com/faq/q/2375/20136#20136" target="_blank">收不到验证码？</a></div>
                    </div>
                    <div class="tips" node-type="activation_tip">
                    </div>
                </div>

                <div class="info_submit clearfix">
                    <div class="inp">
                        <a action-type="btn_check_pincode" class="W_btn_big" suda-uatrack="key=tblog_register_page&amp;value=register_now_button" href="javascript:void(0);" refake-type="submit" node-type="btn_check_pincode"><span>立即注册</span></a>
                        <a style="display:none;" action-type="btn_submit" class="W_btn_big" suda-uatrack="key=tblog_register_page&amp;value=register_now_button" href="javascript:void(0);" refake-type="submit" node-type="btn_submit"><span>立即注册</span></a>
                    </div>
                </div>
                <div class="info_list clearfix">
                    <div class="inp verify">
                        <p class="agreement"><a href="javascript:void(0)" >微博服务使用协议</a></p>
                        <p class="agreement"><a href="javascript:void(0)" >微博个人信息保护政策</a></p>
                        <p class="agreement"><a href="http://news.sina.com.cn/c/2012-12-29/051425921660.shtml" target="_blank">全国人大常委会关于加强网络信息保护的决定</a></p>
                    </div>
                </div>
            </div>
            <div class="W_reg_sidebar">
                <p class="p1 line">已有帐号，<a href="/login">直接登录»</a></p>
                <p>微博注册帮助</p>
                <div class="reg_help">
                    <ul class="help_list">
                        <li><i>1</i><a  href="javascript:void(0)">微博注册操作指南</a></li>
                        <li><i>2</i><a  href="javascript:void(0)">手机注册时提示手机号码已被绑定怎么办?</a></li>
                        <li><i>3</i><a  href="javascript:void(0)">注册微博时昵称显示“已经被注册”如何处理?</a></li>
                        <li><i>4</i><a  href="javascript:void(0)">注册时提示"你所使用的IP地址异常",该怎么办?</a></li>
                    </ul>
                    <a href="javascript:void(0)" class="help_more">更多帮助»</a>
                </div>
            </div>
        </div>
    </div>
    <!--注册登录footer-->
    <div class="nologin_footer clearfix">
        <div class="left_link">
            <i class="footer_logo"></i>
            <em class="company_name">北京微梦创科网络技术有限公司</em>
            <a href="javascript:void(0)">京网文[2011]0398-130号</a>
            <a href="javascript:void(0)">京ICP备12002058号</a>
        </div>


    </div>
    <!-- SUDA_CODE_START -->
    <noscript> <img width="0" height="0" src="//beacon.sina.com.cn/a.gif?noScript" border="0" alt="" /> </noscript>
    <script type="text/javascript" charset="utf-8">
        (function() {
            var doc = document,
                wa = doc.createElement('script'),
                s = doc.getElementsByTagName('script')[0];
            wa.type = 'text/javascript';
            wa.charset = 'utf-8';
            wa.async = true;
            wa.src = 'http://js.t.sinajs.cn/open/analytics/js/suda.js?version=1844f177002b1566';
            s.parentNode.insertBefore(wa, s);
        })();
    </script>
    <!-- SUDA_CODE_END -->        <!--/注册登录footer-->
</div>
<img src="home/register/arrivelog.htm" style="height:1px;width:1px;filter:alpha(Opacity=0);-moz-opacity:0;opacity:0;">

<script src="home/register/registerSSO.js" type="text/javascript"></script>
<script src="home/register/mobile.js" type="text/javascript"></script>

</body></html>