    @extends('layouts.head')
    @section('title','新增用户')
        @section('content')
       
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
                
                <!-- Panels Start -->
                
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>新增后台用户</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="{{URL('admin/user')}}" method="post">
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
                                    <label class="mws-form-label">用户名</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="user_name" onfocus="this.select()" value="{{old('user_name')}}" class="small">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">密码</label>
                                    <div class="mws-form-item">
                                        <input type="password" name="user_password" value="{{old('user_password')}}" onfocus="this.select()" class="small">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">再次输入密码</label>
                                    <div class="mws-form-item">
                                        <input type="password" name="repassword"  value="{{old('repassword')}}" onfocus="this.select()"  class="small">
                                    </div>
                                </div>
                    			
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">个性签名</label>
                    				<div class="mws-form-item">
                    					<textarea rows="" cols="" name="user_msg" onfocus="this.select()" class="large">{{old('user_mag')?old('user_mag'):'这个人很懒,没签名~~'}}</textarea>
                    				</div>
                    			</div>
                    		<!-- 	<div class="mws-form-row">
                    				<label class="mws-form-label">Dropdown List</label>
                    				<div class="mws-form-item">
                    					<select class="large">
                    						<option>Option 1</option>
                    						<option>Option 3</option>
                    						<option>Option 4</option>
                    						<option>Option 5</option>
                    					</select>
                    				</div>
                    			</div> -->
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">用户类型</label>
                    				<div class="mws-form-item clearfix">
                    					<ul class="mws-form-list inline">
                    						<li><input type="radio" name="user_level" @if(old('user_level')==1) checked @endif value="1"> <label>超级管理员</label></li>
                    						<li><input type="radio" name="user_level" @if(old('user_level')==2) checked @endif  value="2"> <label>广告维护员</label></li>
                    						<li><input type="radio" name="user_level" @if(old('user_level')==3) checked @endif value="3"> <label>话题维护员</label></li>
                    						<li><input type="radio" name="user_level" @if(old('user_level')==4) checked @endif   value="4"> <label>用户维护员</label></li>
                    					</ul>
                    				</div>
                    			</div>
                    		</div>
                    		<div class="mws-button-row">
                                {{ csrf_field() }}
                    			<input type="submit" value="确定" class="btn btn-danger">
                    			<input type="reset" value="重置" class="btn ">
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