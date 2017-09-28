    @extends('layouts.head')
    @section('title','修改密码')
        @section('content')
       
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
                
                <!-- Panels Start -->
                
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>用户修改</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="{{URL('admin/dorepassword/')}}" method="post">
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
                    		<div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">原密码</label>
                                    <div class="mws-form-item">
                                        <input type="password" name="old_password"  value="" class="small">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">新密码</label>
                                    <div class="mws-form-item">
                                        <input type="password" name="new_password" value="" class="small">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">确认密码</label>
                                    <div class="mws-form-item">
                                        <input type="password" name="renew_password"  value="" class="small">
                                    </div>
                                </div>
                               
                    			
                    		<div class="mws-button-row">
                                {{ csrf_field() }}
                    			<input type="submit" value="确定" class="btn btn-danger">
                    			<input type="reset" value="重置" class="btn ">
                                <input type="button" onclick="history.go(-1)" value="返回" class="btn ">
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
        @endsection