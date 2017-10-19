@section('title','后台用户-添加')
@extends('layout.layout')
@extends('layout.content')
@section('content')
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        
                
                <!-- Panels Start -->
  @if (count($errors) > 0)  
      <div class="alert alert-danger">  
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

            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>用户添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/douseradd" method="post">
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">用户名:</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name='user_name'>
                    				</div>
                    			</div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">密码:</label>
                                    <div class="mws-form-item">
                                        <input type="password" class="small" name='user_password'>
                                    </div>
                                </div>

                                 <div class="mws-form-row bordered">
                                    <label class="mws-form-label">权限:</label>
                                    <div class="mws-form-item">
                                        <select class="small" name='user_level'>
                                            <option value='0'>请选择</option>

                                            <option value='1'>超级管理员</option>
                                            <option value='2'>用户认证管理员</option>
                                            <option value="3">发帖管理员</option>
                                            <option value='4'>广告管理员</option>
                                        </select>
                                    </div>
                                </div>
                
               
                     <div class="mws-form-row">
                        <label class="mws-form-label">个性签名:</label>
                                <div class="mws-form-item">
                                    <textarea cols="100px" rows="50px" name='user_msg'></textarea>
                                </div>
                    </div>
               

                    			</div>
                    			
                    		{{ csrf_field() }}
                    		<div class="mws-button-row">
                    			<input type="submit" value="提交" class="btn btn-danger">
                    			
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

    <!-- Themer Script (Remove if not needed) -->
    <script src="js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->

@endsection