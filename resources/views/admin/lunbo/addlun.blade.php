@section('title','轮播图添加')
@extends('layout.layout')
@extends('layout.content')
@section('content')
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        
         @if(session('error'))
                <div>
                <b style='color:red'>{{session('error')}}</b>
                </div>
               @endif
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>轮播图添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/dolun" method="post" enctype="multipart/form-data">
                    		<div class="mws-form-inline">
                    			
                                <div class="mws-form-row">
                                <input id='file_upload' type="file" name="img" multiple="true">
                                <img id='img1' width="300px">
                            </div>

                                 <div class="mws-form-row bordered">
                                    <label class="mws-form-label">权重值:</label>
                                    <div class="mws-form-item">
                                        <select class="small" name='pic_order'>
                                            <option value='0'>请选择</option>

                                            <option value='1'>1</option>
                                            <option value='2'>2</option>
                                            <option value="3">3</option>
                                            <option value='5'>5</option>
                                            <option value='6'>6</option>
                                            <option value='7'>7</option>
                                            <option value='8'>8</option>
                                            <option value='9'>9</option>
                                        </select>
                                    </div>
                                </div>
                
               
                     <div class="mws-form-row">
                        <label class="mws-form-label">图片标题名称:</label>
                                <div class="mws-form-item">
                                    <textarea cols="100px" rows="50px" name='pic_name'></textarea>
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