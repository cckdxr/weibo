    @extends('layout.head')
    @section('title','修改用户')
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
                    	<form class="mws-form" action="{{URL('admin/user/'.$res['user_id'])}}" method="post">
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
                                        <input type="text" name="user_name" disabled="disabled" value="{{$res['user_name']}}" class="small">
                                    </div>
                                </div>
                               
                    			
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">个性签名</label>
                    				<div class="mws-form-item">
                    					<textarea rows="" cols="" name="user_msg" class="large">{{$res['user_msg']}}</textarea>
                    				</div>
                    			</div>                    		
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">用户类型</label>
                    				<div class="mws-form-item clearfix">
                    					<ul class="mws-form-list inline">
                    						<li><input type="radio" name="user_level" <?php if($res['user_level']==1){echo 'checked';} ?> value="1"> <label>超级管理员</label></li>
                    						<li><input type="radio" name="user_level" <?php if($res['user_level']==2){echo 'checked';} ?>  value="2"> <label>广告维护员</label></li>
                    						<li><input type="radio" name="user_level" <?php if($res['user_level']==3){echo 'checked';} ?>  value="3"> <label>话题维护员</label></li>
                    						<li><input type="radio" name="user_level" <?php if($res['user_level']==4){echo 'checked';} ?>  value="4"> <label>用户维护员</label></li>
                    					</ul>
                    				</div>
                    			</div>
                    		</div>
                    		<div class="mws-button-row">
                                {{ csrf_field() }}
                                {{ method_field('put')}}
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