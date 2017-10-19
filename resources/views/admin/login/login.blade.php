@section('title','后台登录')
@extends('layout.layout') {{--继承head--}}

@section('content')

    <div id="mws-login-wrapper">
        <div id="mws-login">
            @if (count($errors) > 0)
                <div>
                    <ul>
                        @if(is_object($errors))
                                @foreach ($errors->all() as $error)
                                    <li style='color:red'>{{ $error }}</li>
                                @endforeach
                        @else
                                    <li style='color:red'>{{ $errors }}</li>
                        @endif
                    </ul>
                </div>
            @endif
            <h1>后台登录</h1>
            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <div id="mws-login-form">
                <form class="mws-form" action="/admin/dologin" method="post">
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="text" name="username" class="mws-login-username required" placeholder="用户名">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="password" name="passwd" class="mws-login-password required" placeholder="密码">
                        </div>
                    </div>
                      <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="text" name="yzm" placeholder="验证码" style='width:130px'>
                            <img src="{{url('admin/captcha/1')}}" onclick="this.src='{{url('admin/captcha/1')}}?'+Math.random()" alt="">
                        </div>
                    </div>
                    <div class="mws-form-row">
                            {{csrf_field()}}
                        <input type="submit" value="登录" class="btn btn-success mws-login-button">
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

@endsection