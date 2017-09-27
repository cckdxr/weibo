<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="css/login.css" media="screen">

<link rel="stylesheet" type="text/css" href="css/mws-theme.css" media="screen">

<title>微博-后台登录</title>

</head>
<style>
    .alert-danger ul li{
        color:red;
    }
</style>
<body>

    <div id="mws-login-wrapper">
        <div id="mws-login">
            <h1>Login</h1>
            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <div id="mws-login-form">
                <form class="mws-form" action="/admin/dologin" method="post">
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
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="text" name="user_name" class="mws-login-username required" value="{{old('user_name')}}" >
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="password" name="user_password" class="mws-login-password required" value="{{old('user_password')}}" >
                        </div>
                    </div>
                    <div class="mws-form-row">                    
                        <div class="mws-form-item">
                            <input type="text" name="adminCode" class="mws-login-code" style="width:150px" >
							<img src="{{url('/captcha/1')}}" onclick="this.src='{{url('/captcha/1')}}?'+Math.random()" alt="">
                        </div>
                    </div>
                    </div>
                    <div id="mws-login-remember" class="mws-form-row mws-inset">
                        <ul class="mws-form-list inline">
                            <li>
                                <input id="remember" type="checkbox"> 
                                <label for="remember">Remember me</label>
                            </li>
                        </ul>
                    </div>
                    <div class="mws-form-row">
                    	{{csrf_field()}}
                        <input type="submit" value="Login" class="btn btn-success mws-login-button">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Plugins -->
    <script src="js/libs/jquery-1.8.3.min.js"></script>
    <script src="js/libs/jquery.placeholder.min.js"></script>
    <script src="custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="jui/js/jquery-ui-effects.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="plugins/validate/jquery.validate-min.js"></script>

    <!-- Login Script -->
    <script src="js/core/login.js"></script>

</body>
</html>
