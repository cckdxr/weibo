@section('title','后台用户-修改密码')
@extends('layout.layout')
@extends('layout.content')
@section('content')


        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
           @if (count($errors) > 0)

                        @if(is_object($errors))
                                @foreach ($errors->all() as $error)
                                    <p style='color:red'>{{ $error }}</p>
                                @endforeach
                        @else
                                    <p style='color:red'>{{ $errors }}</p>
                        @endif

            @endif

            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>修改密码</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/dopwd" method='post'>
                            {{csrf_field()}}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">用户名:</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" value="{{session('user')['user_name']}}" name='username' disabled>
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                                    <label class="mws-form-label">原始密码:</label>
                                    <div class="mws-form-item">
                                        <input type="password" class="small" name='passwd'>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">新密码</label>
                                    <div class="mws-form-item">
                                        <input type="password" class="small" name='repasswd'>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">确认新密码</label>
                                    <div class="mws-form-item">
                                        <input type="password" class="small" name='agrepwd'>
                                    </div>
                                </div>
                              
                    		</div>
                 
                    		<div class="mws-button-row">
                    			<input type="submit" value="提交" onclick='rep()' class="btn btn-danger">
                    		</div>
                    	</form>
                    
                </div>    	
                
                </div>   
                <!-- Panels End -->
               
            </div>
            <!-- Inner Container End -->
      
            <!-- Footer -->
            <div id="mws-footer">
            	Copyright Your Website 2012. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="js/libs/jquery-1.8.3.min.js"></script>
    <script src="js/libs/jquery.mousewheel.min.js"></script>
    <script src="js/libs/jquery.placeholder.min.js"></script>
    <script src="custom-plugins/fileinput.js"></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script src="jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="jui/jquery-ui.custom.min.js"></script>
    <script src="jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="plugins/colorpicker/colorpicker-min.js"></script>
    <script src="plugins/validate/jquery.validate-min.js"></script>

    <!-- Core Script -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/core/mws.js"></script>
<script type="text/javascript" src="/layer/layer.js"></script>
    <!-- Themer Script (Remove if not needed) -->
    <script src="js/core/themer.js"></script>
<!--     <script >
        
        // function rep(){
        //         layer.confirm('您是如何看待前端开发？', {
        //   btn: ['重要','奇葩'] //按钮
        // }, function(){
        //   layer.msg('的确很重要', {icon: 1});
        // }, function(){
        //   layer.msg('也可以这样', {
        //     time: 20000, //20s后自动关闭
        //     btn: ['明白了', '知道了']
        //   });
        // });
        // }
    
    </script> -->
    <!-- Demo Scripts (remove if not needed) -->

@endsection