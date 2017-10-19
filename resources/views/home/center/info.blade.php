<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="/home/css/info/frame_001.css" type="text/css" rel="stylesheet">
<link href="/home/css/info/profile_pinfo.css" type="text/css" rel="stylesheet">
<link href="/home/css/info/layer_form_tips.css" type="text/css" rel="stylesheet">
<link href="/home/css/info/skin_002.css" type="text/css" rel="stylesheet">
<title>个人资料页个人信息</title>
<link href="/home/css/info/layer_search_school.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src='/home/css/index/lunbo/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='/layer/layer.js'></script>
</head>
<body style="background: none repeat scroll 0% 0% transparent;">
<!--个人信息-->
<div class="profile_pinfo" id="pl_content_account"> 
	<div class="infoblock" node-type="base_out">
	<form class="info_title"><fieldset class="S_line2"><legend class="tit S_txt1">基本信息</legend>
<div class="btns" id='views' style='display:none'><a  class="W_btn_round"  action-type="edit" node-type="edit" action-data="edit=0"><span>保存</span></a></div>
		<div class="btns"><a id='reinfo' class="W_btn_round" action-type="edit" node-type="edit" action-data="edit=0"><span>编辑</span></a></div></fieldset></form>



	<div node-type="base_view" id="baseview">
		<div class="pf_item clearfix">
		<div class="label S_txt2">登录名</div>
		<div class="con">{{session('userinfo')['phone']}} <a href="/home/repwd" target="_blank">修改密码</a></div>
	</div>
	<div class="pf_item clearfix">
		<div class="label S_txt2">昵&nbsp;&nbsp;称</div>
		<div class="con" node-type="nickname_view">{{session('user')['user_name']}}</div>
	</div>
	<div class="pf_item clearfix">
		<div class="label S_txt2">真实姓名</div>
		<div class="con" node-type="realname_view">{{session('userinfo')['truename']}}</div>
	</div>
	<div class="pf_item clearfix">
		<div class="label S_txt2"></div>
		<div class="con" node-type="city_view"></div>
	</div>
	<div class="pf_item clearfix">
		<div class="label S_txt2"> 性&nbsp;&nbsp;别</div>
		<div class="con" node-type="sex_view">
			
			{{session('userinfo')['sex']}}
		</div>
	</div>

	<div class="pf_item clearfix">
		<div class="label S_txt2">感情状况</div>
		<div class="con" node-type="love_view">{{session('userinfo')['emotion']}}
		 	 		 
	   	   	 	    	    	    	    	    	    	    </div>
		
	</div>
	<div class="pf_item clearfix">
		<div class="label S_txt2">生日</div>
		<div class="con" node-type="birth_view">{{ session('userinfo')['born']}}</div>
	</div>
	<div class="pf_item clearfix">
		<div class="label S_txt2">血型</div>
		<div class="con" node-type="blood_view">{{session('userinfo')['blood']}}</div>
	</div>
	<div class="pf_item clearfix">
		<div class="label S_txt2">简介</div>
		<div class="con" node-type="desc_view">{{session('userinfo')['info']}}</div>
	</div>
		<div class="pf_item clearfix">
		<div class="label S_txt2">注册时间</div>
		<div class="con" node-type="desc_view">{{ session('userinfo')['created_at']}}</div>
	</div>
		</div>
	<div node-type="base" style="display: none;" id='base'>
	<div node-type="base_info">
	<div class="pf_item clearfix">
		<div class="label S_txt2">登录名</div>
		<div class="con">{{session('userinfo')['phone']}}<a href="/home/repwd" target="_blank">修改密码</a></div>
	</div>
	<div class="pf_item clearfix">
		<div class="label S_txt2"><span class="W_error">*</span>昵&nbsp;&nbsp;称</div>
		<input value="IYiyj2FGFo3gUr-D-QaLbdkiGbk=" name="setting_rid" type="hidden">
		<input value="暗里着迷醉梦死" name="oldnick" node-type="oldnick" type="hidden">
		<div class="con"><input node-type="nickname" action-type="text_copy" action-data="text=请输入昵称" name="nickname" class="W_input" value="{{session('userinfo')['nick_name']}}" disabled></div>
		<div class="status" node-type="nickname_tip"><div style="display: none;" class="W_tips tips_del clearfix"></div>
		</div>
	</div>
		<div class="pf_item clearfix">
		<div class="label S_txt2" node-type="realname_label"></div>
		</div>
	<div class="pf_item clearfix">

		<div class="label S_txt2" node-type="realname_label">真实姓名</div>
		<div class="con"><input class="W_input" node-type="realname" action-type="text_copy" action-data="text=请输入真实姓名&amp;must=false" name="truename" value="{{session('userinfo')['truename']}}" type=""></div>
		
		<div class="status" node-type="realname_tip"><div style="display: none;" class="W_tips tips_del clearfix"></div>
		</div>
	</div>
	<div class="pf_item clearfix">
		<div class="label S_txt2"><span class="W_error">*</span>所在地</div>
		<div class="con"><div class="input_sel" node-type="cityselector"><span><select name="province" id="province" node-type="province" init_value="41"><option value="34">安徽</option><option value="11">北京</option><option value="50">重庆</option><option value="35">福建</option><option value="62">甘肃</option><option value="44">广东</option><option value="45">广西</option><option value="52">贵州</option><option value="46">海南</option><option value="13">河北</option><option value="23">黑龙江</option><option value="41">河南</option><option value="42">湖北</option><option value="43">湖南</option><option value="15">内蒙古</option><option value="32">江苏</option><option value="36">江西</option><option value="22">吉林</option><option value="21">辽宁</option><option value="64">宁夏</option><option value="63">青海</option><option value="14">山西</option><option value="37">山东</option><option value="31">上海</option><option value="51">四川</option><option value="12">天津</option><option value="54">西藏</option><option value="65">新疆</option><option value="53">云南</option><option value="33">浙江</option><option value="61">陕西</option><option value="71">台湾</option><option value="81">香港</option><option value="82">澳门</option><option value="400">海外</option><option value="100">其他</option></select> 
    &nbsp;</span><span> <select node-type="city" name="city" id="city" init_value="1"><option value="1">郑州</option><option value="2">开封</option><option value="3">洛阳</option><option value="4">平顶山</option><option value="5">安阳</option><option value="6">鹤壁</option><option value="7">新乡</option><option value="8">焦作</option><option value="9">濮阳</option><option value="10">许昌</option><option value="11">漯河</option><option value="12">三门峡</option><option value="13">南阳</option><option value="14">商丘</option><option value="15">信阳</option><option value="16">周口</option><option value="17">驻马店</option><option value="18">济源</option></select>&nbsp;</span></div></div>
		<div class="status"><div style="display: none;" class="W_tips clearfix"><p class="icon"><span class="icon_succS"></span></p></div></div>
	</div>
	<div class="pf_item clearfix">
		<div class="label S_txt2"><span class="W_error">*</span>性&nbsp;&nbsp;别</div>
		<div class="con"><div class="input_check" node-type="gender_selector"><span class="rsp"><label for="man_radio"><input @if(session('userinfo')['sex']=='m') checked @endif id="man_radio" name="gender" value="m" class="W_radio" checked="checked" type="radio">男</label></span><span class="rsp"><label for="woman_radio"><input @if(session('userinfo')['sex']=='w') checked @endif  id="woman_radio" name="gender" value="w" class="W_radio" type="radio">女</label></span><div class="status" node-type="gender_tip"></div></div></div>
	</div>
	
	<div class="pf_item clearfix">

		<div class="label S_txt2" node-type="love_label">感情状况</div>
		<div class="con"><div class="input_sel">
		<select name="love" node-type="love" init_value="1">
	    <option value=""> </option>
	    <option @if(session('userinfo')['emotion']=='单身') selected @endif value="单身">单身</option>
	    <option @if(session('userinfo')['emotion']=='求交往') selected @endif value="求交往">求交往</option>
	    <option @if(session('userinfo')['emotion']=='暗恋中') selected @endif value="暗恋中">暗恋中</option>
	    <option @if(session('userinfo')['emotion']=='暧昧中') selected @endif value="暧昧中">暧昧中</option>
	    <option @if(session('userinfo')['emotion']=='恋爱中') selected @endif value="恋爱中">恋爱中</option>
	    <option @if(session('userinfo')['emotion']=='订婚') selected @endif value="订婚">订婚</option>
	    <option @if(session('userinfo')['emotion']=='已婚') selected @endif value="已婚">已婚</option>
	    <option @if(session('userinfo')['emotion']=='分居') selected @endif value="分居">分居</option>
	    <option @if(session('userinfo')['emotion']=='离异') selected @endif value="离异">离异</option>
	    <option @if(session('userinfo')['emotion']=='丧偶') selected @endif value="丧偶">丧偶</option>
	    </select>&nbsp;</div></div>
	
	</div>
	<div class="pf_item clearfix">

		<div class="label S_txt2" node-type="birth_label">生日</div>
		<div class="con"><div class="input_sel">
		  <select name="birth" node-type="yy">
    <option value="1">-----</option>
  <option label="2017" value="2017">2017</option>
 <option label="2016" value="2016">2016</option>
 <option label="2015" value="2015">2015</option>
 <option label="2014" value="2014">2014</option>
 <option label="2013" value="2013">2013</option>
 <option label="2012" value="2012">2012</option>
 <option label="2011" value="2011">2011</option>
 <option label="2010" value="2010">2010</option>
 <option label="2009" value="2009">2009</option>
 <option label="2008" value="2008">2008</option>
 <option label="2007" value="2007">2007</option>
 <option label="2006" value="2006">2006</option>
 <option label="2005" value="2005">2005</option>
 <option label="2004" value="2004">2004</option>
 <option label="2003" value="2003">2003</option>
 <option label="2002" value="2002">2002</option>
 <option label="2001" value="2001">2001</option>
 <option label="2000" value="2000">2000</option>
 <option label="1999" value="1999">1999</option>
 <option label="1998" value="1998">1998</option>
 <option label="1997" value="1997">1997</option>
 <option label="1996" value="1996">1996</option>
 <option label="1995" value="1995">1995</option>
 <option label="1994" value="1994">1994</option>
 <option label="1993" value="1993">1993</option>
 <option label="1992" value="1992">1992</option>
 <option label="1991" value="1991">1991</option>
 <option label="1990" value="1990" selected="">1990</option>
 <option label="1989" value="1989">1989</option>
 <option label="1988" value="1988">1988</option>
 <option label="1987" value="1987">1987</option>
 <option label="1986" value="1986">1986</option>
 <option label="1985" value="1985">1985</option>
 <option label="1984" value="1984">1984</option>
 <option label="1983" value="1983">1983</option>
 <option label="1982" value="1982">1982</option>
 <option label="1981" value="1981">1981</option>
 <option label="1980" value="1980">1980</option>
 <option label="1979" value="1979">1979</option>
 <option label="1978" value="1978">1978</option>
 <option label="1977" value="1977">1977</option>
 <option label="1976" value="1976">1976</option>
 <option label="1975" value="1975">1975</option>
 <option label="1974" value="1974">1974</option>
 <option label="1973" value="1973">1973</option>
 <option label="1972" value="1972">1972</option>
 <option label="1971" value="1971">1971</option>
 <option label="1970" value="1970">1970</option>
 <option label="1969" value="1969">1969</option>
 <option label="1968" value="1968">1968</option>
 <option label="1967" value="1967">1967</option>
 <option label="1966" value="1966">1966</option>
 <option label="1965" value="1965">1965</option>
 <option label="1964" value="1964">1964</option>
 <option label="1963" value="1963">1963</option>
 <option label="1962" value="1962">1962</option>
 <option label="1961" value="1961">1961</option>
 <option label="1960" value="1960">1960</option>
 <option label="1959" value="1959">1959</option>
 <option label="1958" value="1958">1958</option>
 <option label="1957" value="1957">1957</option>
 <option label="1956" value="1956">1956</option>
 <option label="1955" value="1955">1955</option>
 <option label="1954" value="1954">1954</option>
 <option label="1953" value="1953">1953</option>
 <option label="1952" value="1952">1952</option>
 <option label="1951" value="1951">1951</option>
 <option label="1950" value="1950">1950</option>
 <option label="1949" value="1949">1949</option>
 <option label="1948" value="1948">1948</option>
 <option label="1947" value="1947">1947</option>
 <option label="1946" value="1946">1946</option>
 <option label="1945" value="1945">1945</option>
 <option label="1944" value="1944">1944</option>
 <option label="1943" value="1943">1943</option>
 <option label="1942" value="1942">1942</option>
 <option label="1941" value="1941">1941</option>
 <option label="1940" value="1940">1940</option>
 <option label="1939" value="1939">1939</option>
 <option label="1938" value="1938">1938</option>
 <option label="1937" value="1937">1937</option>
 <option label="1936" value="1936">1936</option>
 <option label="1935" value="1935">1935</option>
 <option label="1934" value="1934">1934</option>
 <option label="1933" value="1933">1933</option>
 <option label="1932" value="1932">1932</option>
 <option label="1931" value="1931">1931</option>
 <option label="1930" value="1930">1930</option>
 <option label="1929" value="1929">1929</option>
 <option label="1928" value="1928">1928</option>
 <option label="1927" value="1927">1927</option>
 <option label="1926" value="1926">1926</option>
 <option label="1925" value="1925">1925</option>
 <option label="1924" value="1924">1924</option>
 <option label="1923" value="1923">1923</option>
 <option label="1922" value="1922">1922</option>
 <option label="1921" value="1921">1921</option>
 <option label="1920" value="1920">1920</option>
 <option label="1919" value="1919">1919</option>
 <option label="1918" value="1918">1918</option>
 <option label="1917" value="1917">1917</option>
 <option label="1916" value="1916">1916</option>
 <option label="1915" value="1915">1915</option>
 <option label="1914" value="1914">1914</option>
 <option label="1913" value="1913">1913</option>
 <option label="1912" value="1912">1912</option>
 <option label="1911" value="1911">1911</option>
 <option label="1910" value="1910">1910</option>
 <option label="1909" value="1909">1909</option>
 <option label="1908" value="1908">1908</option>
 <option label="1907" value="1907">1907</option>
 <option label="1906" value="1906">1906</option>
 <option label="1905" value="1905">1905</option>
 <option label="1904" value="1904">1904</option>
 <option label="1903" value="1903">1903</option>
 <option label="1902" value="1902">1902</option>
 <option label="1901" value="1901">1901</option>
 <option label="1900" value="1900">1900</option>
  </select><span class="input_sel_text">年</span>
    <select name="month" init_value="01" node-type="mm">
    
    
    
    
    
    
    
    
    
    
    
    
    
    <option value="0">---</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select>
    <span class="input_sel_text">月</span>
    <select name="day" node-type="dd" value="03" init_value="03"><option value="0">---</option><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option><option value="05">05</option><option value="06">06</option><option value="07">07</option><option value="08">08</option><option value="09">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select><span class="input_sel_text">日</span></div>
   </div>
		<div class="status" node-type="birthday_tip"><div style="display: none;" class="W_tips tips_del clearfix"></div>
		</div>
	</div>
	<div class="pf_item clearfix">

		<div class="label S_txt2" node-type="blood_label">血型</div>
		<div class="con"><div class="input_sel">  <select name="blood" init_value="A">
	    <option value=""> </option>
	    <option selected="" value="A">A型</option>
	    <option value="B">B型</option>
	    <option value="AB">AB型</option>
	<option value="O">O型</option>
	    </select>&nbsp;</div></div>
		
	
	</div>
	<div class="pf_item clearfix">

		<div class="label S_txt2" node-type="blog_label">博客地址</div>
		<div class="con"><input node-type="blog" action-type="text_copy" name="blog" action-data="text=请输入正确的博客地址&amp;must=false" class="W_input" value=""></div>
		<div class="status" node-type="blog_tip"><div style="display: none;" class="W_tips tips_del clearfix"></div>
		</div>
		
	</div>
	<div class="pf_item clearfix">
		<div class="label S_txt2" node-type="desc_label">简介</div>
		<div class="con"><textarea name="info" node-type="desc" action-type="text_copy" action-data="text=请输入个人简介&amp;must=false" cols="30" rows="10" class="W_input">{{session('userinfo')['info']}}</textarea></div>
		<div class="status" node-type="desc_tip"><div class="W_tips tips_del clearfix" style="display: none;"></div></div>
	</div>
	</div>
		</div>
	</div>
	<div class="infoblock" node-type="com_out">
	<form class="info_title"><fieldset class="S_line2"><legend class="tit S_txt1">联系信息</legend><div class="btns"><a class="W_btn_round" action-type="edit" node-type="edit" action-data="edit=0" id='reemail'><span>编辑</span></a></div>

<div class="btns" style='display: none' id='baocun'><a class="W_btn_round" action-type="edit" node-type="edit" action-data="edit=0" ><span>保存</span></a></div>
	</fieldset></form>

	<div node-type="com_view" id='emails'>
	<div class="pf_item clearfix">
		<div class="label S_txt2">邮箱</div>
		@if(session('userinfo')['email']=='')
		<div class="con" node-type="email_view" id='nowemail'><a action-type="quickedit" action-data="type=qq"><i class="W_ico16 icon_edit"></i>马上填写</a>你的邮箱信息</div>
		
		@else
		<div class="con" node-type="email_view" id='emailview'>{{session('userinfo')['email']}}</div>
		@endif
	</div>
	<div class="pf_item clearfix">
		<div class="label S_txt2">QQ</div>
		<div class="con" node-type="qq_view">
		<p id='qqview'>{{session('userinfo')['qq']}}</p>
		</div>
	</div>

	</div>
	<div node-type="com" style="display: none;" id='email'>
	<div class="pf_item clearfix">
		<div class="permission"><a value="1" name="pub_email" class="W_btn_c W_btn_c_hov" action-type="secrecy"><span><em node-type="secrecy_title">
		 我关注的人可见    </em><i class="W_arrow"><em class="down">◆</em></i></span></a></div>
		<div class="label S_txt2" node-type="email_label">邮箱</div>
		<div class="con"><input name="user_email" node-type="email" action-type="text_copy" action-data="text=请输入邮箱地址&amp;must=false" class="W_input" value="" type=""></div>
		<div class="status" node-type="email_tip"><div style="display: none;" class="W_tips tips_del clearfix" id='ds'><p class='icon' ><span id='yemail'></span></p><p class='txt'></p></div></div>
	
		
	</div>
	<div class="pf_item clearfix">
		<div class="label S_txt2" node-type="qq_label">QQ</div>
		<div class="con"><input name="qq" node-type="qq" action-type="text_copy" action-data="text=请输入QQ号&amp;must=false" class="W_input" value="" type=""></div>
		<div class="status" node-type="qq_tip"><div id='dq' style="display: none;" class="W_tips tips_del clearfix"><p class='icon' ><span id='yqq'></span></p><p class='txts'></p></div>
		</div>
		
		
	</div>

	
	 </div>
	</div>

<!--/个人信息-->



</div>

<script type="text/javascript">
//-----------------------------邮箱-----------------------------	
	$('#reemail').click(function(){
		//修改框显示
		$('#email').css('display','block');
		//资料隐藏
		$('#emails').css('display','none');
		//把编辑去掉
		$('#reemail').css('display','none');
		//把保存打开
		$('#baocun').css('display','block');
	})
//验证邮箱
	$('input[name=user_email]').blur(function(){

		email = $('input[name=user_email]').val();
		var reg = /^\w+@[0-9A-Za-z]+\.com|cn|org|top|edu$/;
		var check = reg.test(email);
		if(check)
		{

			$('#ds').css('display','block');

			
			$('#ds').removeClass('tips_del');
			$('#yemail').addClass('icon_succS');
			$('.txt').text('');


			one = true;
		}else{
			 $('#yemail').removeClass('icon_succS');
			$('#ds').css('display','block');
			$('#ds').addClass('tips_del');

		
			$('.txt').text('请输入正确的邮箱信息');

		}

	})
//验证QQ
	$('input[name=qq]').blur(function(){
		qq = $('input[name=qq]').val();
		var reg = /^[1-9]\d{4,11}$/;//匹配qq		
		var check = reg.test(qq);
		if(check)
		{

			$('#dq').css('display','block');

			
			$('#dq').removeClass('tips_del');
			$('#yqq').addClass('icon_succS');
			$('.txts').text('');


			two = true;
		}else{
			 $('#yqq').removeClass('icon_succS');
			$('#dq').css('display','block');
			$('#dq').addClass('tips_del');

		
			$('.txts').text('请输入正确qq');

		}
	})
//保存,发送ajax,修改数据,再取数据,然后存session

	$('#baocun').click(function(){
		//获取用户输入的邮箱
		email = $('input[name=user_email]').val();
		//获取QQ
		QQ = $('input[name=qq]').val();
if(one && two){
				$.post("/home/reinfo", {"_token":"{{csrf_token()}}",qq:QQ, email:email },function(data){

					if(data == 1)
					{
						//显示资料
						$('#emails').css('display','block');
						$('#nowemail').css('display','none');
						$('#email').css('display','none');
						$('#reemail').css('display','block');
						$('#baocun').css('display','none');
						location.href = location.href;
					}
			
					

   			});
		}

	})
//-----------------------------------基本信息----------------------
$('#reinfo').click(function(){
	//让信息隐藏
	$('#baseview').css('display','none');
	//让表单显示
	$('#base').css('display','block');
	//让编辑隐藏.
	$(this).css('display','none');
	//让保存显示
	$('#views').css('display','block');
})


//保存info
$('#views').click(function(){

	


	truename = $('input[name=truename]').val();
	sex = $('input[name=gender]').val();
	love = $('select[name=love]').val();

	year = $('select[name=birth]').val();
	month = $('select[name=month]').val();
	day = $('select[name=day]').val();
	birth = year+'-'+month+'-'+day;

	blood = $('select[name=blood]').val();
	blog = $('input[name=blog]').val();
	info = $('textarea[name=info]').val();


		$.post('/home/dobaseinfo',{sex:sex,truename:truename,love:love,birth:birth,blood:blood,blog:blog,info:info,'_token':'{{csrf_token()}}'},function(data){

				
						if(data == 1)
						{

						//隐藏表单
						$('#base').css('display','none');
						//显示资料
						$('#baseview').css('display','block');
						// //隐藏保存
						$('#views').css('display','none');
						// //显示编辑
						$('#reinfo').css('display','block');
						
						location.href = location.href;
					}
				
			})

}) 	
</script>
</body>
</html>
