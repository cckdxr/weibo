@extends('layouts.head')
@section('content')
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>Blog</h1>
		<h2>欢迎使用博客管理平台</h2>
		<div class="form">
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
			
			<form action="/admin/dologin" method="post">
				<ul>
					<li>
					<input type="text" name="user_name" value="{{old('user_name')}}" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="user_password" name="user_password" value="{{old('user_password')}}" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="{{url('/captcha/1')}}" onclick = "this.src = this.src+'?1'" style='cursor:pointer' alt="验证码">
					</li>
					<li>
						{{csrf_field()}}
						<input type="submit" value="立即登陆"/>						
					</li>
				</ul>
			</form>
			<p><a href="#">返回首页</a> &copy; 2016 Powered by <a href="http://www.itxdl.cn" target="_blank">http://www.itxdl.cn</a></p>
		</div>
	</div>
</body>
@endsection
