<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册 灵步网微博-点滴生活，精彩每一天</title>
<link href="styles/register.css" type="text/css" rel="stylesheet">
<link href="styles/global.css" type="text/css" rel="stylesheet">
<script src="script/sitedata_bas.js" language="javascript"></script>
<script src="script/datecreate.js" language="javascript"></script>
<script src="script/trim.js" language="javascript"></script>
<script src="script/register.js" language="javascript"></script>
<script src="{{asset('/admin/js/libs/jquery-1.8.3.min.js')}}"></script>
</head>
<body>
<div id="container">
  <!-- top部分DIV -->
	<div id="top">
    	<!-- top部分的LogoDIV -->
    	<div id="topLogo">
        	<!-- topLogo部分的icoDIV -->
            <div id="topLogoIco"> <a href="index.html"><img src="images/logo_ipad.png" width="72" height="72" alt="" /></a>
        </div>
            <!-- topLogo部分的icoDIV结束 -->
            
            <!-- topLogo部分的wordDIV -->
            <div id="topLogoWord"> <a href="index.html"><img src="images/LogoMaker.gif" width="128" height="60" alt="" /></a>
          </div>
            <!-- topLogo部分的wordDIV -->
        </div>
        <!-- top部分的LogoDIV结束 -->
        
        <!-- top部分的文字导航 -->
        <div id="topWordMenu">
        	<ul>
            	<li>已有灵步账号，<a href="/home/login">请登录</a></li>
                <li><a href="/home/index">随便逛逛</a></li>
                <li><a href="#">手机</a></li>
                <li><a href="#">帮助</a></li>
            </ul>
        </div>
        <!-- top部分的文字导航结束 -->
    </div>
    <!-- top部分结束 -->
  <div id="banner">
    <div id="bannerTop">
      <div id="bannerWord1">加入灵步微博</div>
      <div id="bannerWord2">如果你已经是灵步网注册用户，请直接<a href="login.html">登陆微博</a></div>
      <div id="bannerWord3">已经是灵步微博用户？<a href="login.html">登陆微博</a></div>
    </div>
    <div id="main">
      <form action="/home/doregister" id="art_form" method="post" onsubmit="return checkForm()">
      <table width="765" border="0" cellpadding="0" cellspacing="0">
        @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @if(is_object($errors))
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              @else
                <li>{{ $errors }}</li>
              @endif
            </ul>
          </div>
        @endif
        <tr>
          <td width="71">&nbsp;</td>
          <td width="86" align="center" valign="middle" class="wordleft">用 &nbsp;户&nbsp; 名</td>
          <td width="189" align="center" valign="middle"><input name="user_name" value="{{old('user_name')}}" type="text" class="form" id="userID" onblur="checkUserId(img1,this)" onfocus="getfocus(this,img1);this.select();" /></td>
          <td width="419" align="left" valign="middle" class="wordright"><img name="img1" width="16" height="16" id="img1" /><div class="registertip" id="userIDtip">请输入您的微博用户名(2至20位)</div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">昵 &nbsp; &nbsp;&nbsp;&nbsp;称</td>
          <td align="center" valign="middle"><input name="nick_name" value="{{old('nick_name')}}" type="text" class="form" id="userName" onfocus="getfocus(this,img2);this.select();" onblur="checkUserName(img2,this)" maxlength="20" /></td>
          <td align="left" valign="middle" class="wordright"><img name="img2" width="16" height="16" id="img2" /><div class="registertip" id="userNametip">请输入4到20位数字、字符、中文，一旦注册，不得修改</div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">手 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机</td>
          <td align="center" valign="middle" class="a"><input name="phone" value="{{old('phone')}}" type="text" class="form" id="userTel" onblur="checkUserTel(img3,this)" onfocus="getfocus(this,img3);this.select();" /></td>
          <td align="left" valign="middle" class="wordright"><img name="img3" width="16" height="16" id="img3" /><div class="registertip" id="userTeltip">请输入您的手机号码，之后可以用手机及时发布信息</div></td>
        </tr>


        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">电子邮箱</td>
          <td align="center" valign="middle"><input name="email" type="text" value="{{old('email')}}" class="form" id="userMail" onblur="checkUserMail(img4,this)" onfocus="getfocus(this,img4);this.select();" /></td>
          <td align="left" valign="middle" class="wordright"><img name="img4" width="16" height="16" id="img4" /><div class="registertip" id="userMailtip">找回账户和密码用，如123@163.com</div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">头像</td>
          <td ><input name="file_upload" type="file"  id="file_upload" multiple="true" style="border:none" /></td>
          <td align="left" valign="middle" class="wordright" >
            {{--<img name="img4" width="16" height="16" id="img4" /><div class="registertip" id="userMailtip">请选择头像</div>--}}
            <img id="abcd" alt="上传后显示图片"  style="max-width:100px;max-height:100px;" />
            <input type="hidden" name="user_headpic" value="" id="filename" />
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">创建密码</td>
          <td align="center" valign="middle"><input name="user_password" type="password" value="{{old('user_password')}}" class="form" id="userPass" onfocus="getfocus(this,img5);this.select();" onblur="checkUserPass(img5,this)" maxlength="20" /></td>
          <td align="left" valign="middle" class="wordright"><img name="img5" width="16" height="16" id="img5" /><div class="registertip" id="userPasstip">密码由6到20个字母、数字、特殊符号组成，字母区分大小写</div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">密码确认</td>
          <td align="center" valign="middle"><input name="userRpass" type="password" value="{{old('userRpass')}}" class="form" id="userRpass" onblur="checkUserRpass(img6,this)" onfocus="getfocus(this,img6);this.select();" maxlength="20" /></td>
          <td align="left" valign="middle" class="wordright"><img name="img6" width="16" height="16" id="img6" /><div class="registertip" id="userRpasstip">请再次输入密码</div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">所在城市</td>
          <td colspan="2" valign="middle"><select name="region1" class="form1" id="region1">
            </select>
            <select name="region2" class="form4" id="region2">
              </select>
            <select name="region3" class="form4" id="region3">
            </select>            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">出生年月</td>
          <td align="left" valign="middle"><select name="year"  class="form2" id="year" style="width:70px">
          </select>   <select name="month" class="form3" id="month">
          </select>
          <select name="date" class="form3" id="date">
          </select></td>
          <td align="left" valign="middle" class="wordright">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="registertip">请选择你的出身年月日</div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">验 &nbsp;证 &nbsp;码</td>
          <td align="center" valign="middle"><input name="homeCode" type="text" class="form" id="verify"  onfocus="getfocus(this,img7);this.select();" maxlength="4" /></td>
          <td align="left" valign="middle" class="verifyword"> <span class="wordright">
          <div id="yanzhengma1"><img src="/home/captcha/1"  onclick="this.src='http://www.cweibo.com/captcha/1?'+Math.random()" width="100" height="25"  /></div></span>

          </td>
        </tr>
        <tr>
          <td height="35" colspan="4" align="center">
            {{csrf_field() }}
            <input name="checkbox" type="checkbox" id="checkbox" onclick="deal(this,button)" />
            我已经看过
          ，并同意<a href="#">《灵步网使用协议》</a></td>
          </tr>
        <tr>
          <td colspan="4" align="center" valign="middle"><input type="submit" disabled="disabled" name="button" id="button" value="立即注册" class="button"/></td>
          </tr>
      </table>
    </form>
    </div>
    <!-- footer部分 -->
    <div id="footer">
    	<!-- footer网站链接部分 -->
    	<div id="footerLink">
        	<ul>
            	<li><a href="#">灵步网介绍</a></li>
                <li><a href="#">广告服务</a></li>
                <li><a href="#">API</a></li>
                <li><a href="#">诚征英才</a></li>
                <li><a href="#">保护隐私权</a></li>
                <li><a href="#">免责条款</a></li>
                <li><a href="#">法律顾问</a></li>
                <li><a href="#">意见反馈</a></li>
            </ul>
        </div>
        <!-- footer网站链接部分结束 -->
        <!-- footer网站版权信息 -->
        <div id="footerCopy">
        	Copyright&copy;2011-2012 灵步小组 版权所有
        </div>
        <!-- footer网站版权信息结束 -->
    </div>
    <!-- footer部分结束 -->
</div>
</div>
<script type="text/javascript">
    $(function () {
        $("#file_upload").change(function () {
            uploadImage();
        })
    })
    function uploadImage() {
//  判断是否有选择上传文件
        var imgPath = $("#file_upload").val();
        if (imgPath == "") {
            alert("请选择上传图片！");
            return;
        }
        //判断上传文件的后缀名
        var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
        if (strExtension != 'jpg' && strExtension != 'gif'
            && strExtension != 'png' && strExtension != 'bmp') {
            alert("请选择图片文件");
            return;
        }
        var formData = new FormData($('#art_form')[0]);

        $.ajax({
            type: "POST",
            url: "/home/upload",
            data: formData,

            success: function(data) {
                $('#abcd').attr('src',data);
                $('#filename').attr('value',data)
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("上传失败，请检查网络后重试");
            }
        });
    }
</script>
</body>
</html>
