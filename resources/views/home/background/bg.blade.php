<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/home/css/bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="/home/css/bs/css/bootstrap-theme.min.css">
	<script type="text/javascript" src="/home/css/bs/js/jquery.js"></script>
	<script type="text/javascript" src="/home/css/bs/js/bootstrap.min.js"></script>
   <script type="text/javascript" src='/home/css/index/lunbo/jquery-1.8.3.min.js'></script>

</head>


<style>
*{padding:0px; margin:0px}
	#one{
		
		width:auto;
		background-color: rgba(51,51,51,.9);
		height:500px;
	}
	#two{
		border:1px solid white;
		width:auto;
		height:50px;
		text-align: center;
		line-height:50px;
		color:white;

	}
	#three{
		/*border:1px solid red;*/
		width:auto;
		height:450px;
	}
	.img{
		/*border:1px solid yellow;*/
		width:200px;
		height:200px;
		float:left;
		margin-left:40px;
		margin-top:60px;
	}
	.img img{
		width:200px;
		height:200px;
	}
</style>
<body>

	<div id='one'>
		<div id='two'>
			<b><span>寒酸模板</span></b>
		</div>
		<div id='three'>
			<div class='img'>
				<a href="javascript:;"><img src='/home/css/bs/img/1.jpg'></a>
			</div>
			<div class='img'>
				<a href="javascript:;"><img src='/home/css/bs/img/7.jpg'></a>
				
			</div>
			<div class='img'>
				<a href="javascript:;"><img src='/home/css/bs/img/5.jpg'></a>
				
			</div>
			<div class='img'>
				<a href="javascript:;"><img src='/home/css/bs/img/4.jpg'></a>
				
			</div>
			
			<div>
			
			<button type="button" class="btn btn-warning" style='margin-left:450px;margin-top:50px'>提交</button>
			</div>
		</div>
		
	</div>

<script type="text/javascript">
	
	$(".img a").each(function(){

		$(this).click(function(){

			a = $(this).parent().css('border','2px solid white')

			//获取img的地址
			
			src = a.find('img').attr('src');

		})
		// 这tm移动之后不取消边框.....
		$(this).mouseout(function(){

			$(this).parent().removeAttr('border');
		})
		
	})

	$('button').click(function(){

		$.post('/home/doimg',{'_token':'{{csrf_token()}}',src:src},function(data){


				if(data == 1)
				{
					alert('背景更换成功,请刷新')
				}else{
					alert('哎呀服务器出错了')
				}
		})

	})

</script>
</body>
</html>