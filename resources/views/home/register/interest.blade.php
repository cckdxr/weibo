<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="/home/css/interest/frame.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src='/home/css/index/lunbo/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='/layer/layer.js'></script>
    <link href="/home/css/interest/skin.css" type="text/css" rel="stylesheet">
    <link href="/home/css/interest/reg_guide.css" type="text/css" rel="stylesheet">
    <link href="/home/css/interest/register.css" type="text/css" rel="stylesheet">
<script src="about:blank" async="" charset="utf-8" type="text/javascript"></script><script type="text/javascript">/* Code removed by ScrapBook */</script>     
<title>兴趣推荐 微博-随时随地发现新鲜事</title>
</head><body class="B_fav_sel ">
	<div class="W_nologin"> 
  <!--顶导-->
  <div style="top: 0px;" class="WB_global_nav">
    <div class="gn_bg">
      <div class="gn_header">
        <div class="gn_logo"></div>
        <div class="gn_nav W_Yahei">
          <div class="gn_title step_bg">
              <a href="javascript:;" class="step_item">
                  <i class="W_f18">1.</i><i class="step">完善资料</i>
                </a>
            </div>
            <div class="gn_title step_bg cur">
                  <i class="step_ico step2 W_f18"></i><i class="step">兴趣推荐</i>
            </div>
          
        </div>
      </div>
    </div>
  </div>
  <!--/顶导-->
  <div class="nologo"></div>
  <div class="W_nologin_main main_single_bg">
    <div class="W_reg_info_single clearfix" id="pl_guide_front_interestTag">
      
      <div class="fav_tags_sel_v6">
        <div class="W_Yahei W_f18 W_tc info_tips">选择兴趣，找到您喜欢的微博</div>
        <div class="sel_list">
          <ul class="clearfix">
                              	          	          	          	          	          	          	          	          	          	          	          	     	

            @foreach($field as $v)  	          	          	          	          	          	          	          	          	          	          	     	
            <li class="sel_box " tag_id="1042015:tagCategory_016" uids="1774835215,2759348142,1401055392,2493955444,2698103312">
              <div class="pic pic_news" name='{{$v->field_id}}' style='background-image:url("{{$v->picadd}}")'></div>
              <div class="layer_bg layer_bg_news"><div class="layer_bg_in"></div></div>
              <div class="layer">
                <div class="checkbox"></div>
                <div class="line"></div>
                <div class="user">
                  <ul class="clearfix">
                                      <li><img src="69c9d60fjw1eozqx1cuk2j20yg1cq3zw.jpg" alt="央视影音" class="W_face_radius"><span class="W_autocut">央视影音</span></li>
                                      <li><img src="a4784faegw1ekdg48xtc7j2051050mxb.jpg" alt="武汉发布" class="W_face_radius"><span class="W_autocut">武汉发布</span></li>
                                      <li><img src="538268a0jw8fc4cjnh8pzj20yi0x5tbj.jpg" alt="王冲" class="W_face_radius"><span class="W_autocut">王冲</span></li>
                                      <li><img src="94a6bd74jw8fb907e43pfj20ay0acgm2.jpg" alt="掌上武汉" class="W_face_radius"><span class="W_autocut">掌上武汉</span></li>
                                      <li><img src="a0d1ca10jw1e8qgp5bmzyj2050050aa8.jpg" alt="海盐旅游" class="W_face_radius"><span class="W_autocut">海盐旅游</span></li>
                                    </ul>
                </div>
              </div>
              <div class="txt W_Yahei W_f18"><i></i>{{$v->field_name}}</div>
              <div class="bor"></div>
            </li>
                   	          	          	          	          	          	          	          	          	          	          	          	     	
         @endforeach                                                                                                 
         
                 	          	          	          	          	          	          	          	          	          	          	          	     	
         
        
                   	          	          	          	          	          	          	          	          	          	          	          	     	
           
                   </ul>
        </div>
        <div id='come' class="W_tc"><a class="W_btn_big" node-type="submit" suda-uatrack="key=tblog_register_nguide&amp;value=interest_next"><span>进入微博</span></a></div>
      </div>

    </div>
  </div>

		
<!--注册登录footer-->
<div class="nologin_footer clearfix">
  <div class="left_link"> <i class="footer_logo"></i><em class="company_name">北京微梦创科网络技术有限公司</em> <a href="http://weibo.com/aj/static/jww.html">京网文[2011]0398-130号</a> <a href="http://www.miibeian.gov.cn/">京ICP备12002058号</a></div>
  <div class="copy"> 
  		<span>Copyright © 2009-2017 WEIBO</span>
  		<select id="pl_content_changeLanguage" action-data="login=1">
			<option selected="selected" value="zh-cn">中文(简体)</option>
			<option value="zh-tw">中文(台湾)</option>
			<option value="zh-hk">中文(香港)</option>
			<option value="en">English</option>
		</select>
  </div>
</div>
<!--/注册登录footer--> 

</div>

	<script type="text/javascript">
 
    var id='';
   $('.sel_box').each(function(){


      

     $(this).click(function(){

        
        css = $(this).find('div').first().attr('title');


         if(css==1){     
           $(this).find('div').first().css('border','')
           $(this).find('div').first().removeAttr('title')
            a = $(this).find('div').first().attr('name');

            // id = id.trim(a+'/');
          id = id+'/'+substring(0, id.lastIndexOf(a));



       }else{ 

           $(this).find('div').first().css('border','1px solid red')
           $(this).find('div').first().attr('title',1)
            id += '/'+$(this).find('div').first().attr('name');


       }
     
     })
 })
     $('#come').click(function(){

        if(id =='')
        {
            return ;
        }else{

          $.post('/home/dointerest',{id:id,'_token':'{{csrf_token()}}'},function(data){

          

              if(data == 1)
              {

                     location.href='/home/u/index';
              }else{

                return 'oh no';
              }
          
          })
        }
       

        
     })


  </script>
</body>
</html>
