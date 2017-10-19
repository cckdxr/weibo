@section('title','前台分类')
@extends('layout.layout')
@extends('layout.content')
@section('content')
        <!-- Main Container Start -->
     
<link rel="stylesheet" href="{{asset('css/app.css')}}">
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
            
            	
                <!-- Panels Start -->
                      @if(session('error'))

                <b style='color:red'>{{session('error')}}</b>

               @endif
<form action="/admin/edittype"  enctype="multipart/form-data" method='post'>
            	<div class="mws-panel grid_8" style='width:auto'>
                	<div class="mws-panel-header" style="width:1000px">
                    	<span><i class="icon-table"></i>微博用户</span>
                    </div>
                    <div class="mws-panel-body no-padding" style="width:1000px">

                        <table class="mws-table" style="width:1000px">
                        	{{csrf_field()}}
                            <thead>
                                <tr>
                                    <th>分类名称</th>
                                    <th>前台显示图片</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($field as $v)
                                <tr>
                                    <td>{{$v->field_name}}</td>
                                    <td><img src='{{$v->picadd}}' title='{{$v->field_id}}' style='width:168px;height:168;'></td>
                                    <td><a href='javascript:;' class='edit'>修改</a>
										<a href='javascript:;' class='del' name='{{$v->field_id}}'>删除</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Panels End -->
            </div>
      
</form>
  
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
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/colorpicker/colorpicker-min.js"></script>

    <!-- Core Script -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/core/mws.js"></script>
    <script src='/admin/bootstrap/css/bootstrap.min.css'></script>
    <script src='/admin/bootstrap/css/bootstrap.css'></script>
    <script src='/admin/bootstrap/css/bootstrap.min.css'></script>
    <script src='/admin/bootstrap/css/bootstrap-theme.css'></script>
    <script src='/admin/bootstrap/css/bootstrap-theme.min.css'></script>


    <!-- Themer Script (Remove if not needed) -->
    <script src="js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="js/demo/demo.table.js"></script>
    <script type="text/javascript">
    	
    	$('.del').each(function(){

    		$(this).click(function(){

    			id= $(this).attr('name');
    			$.post('/admin/deltype',{'_token':'{{csrf_token()}}',id:id},function(data){


    					// alert(data)
    					if(data == 1)
    					{
    						alert('此分类下有微博,不能删除');
    					}else if(data == 0){

	    						alert('空分类删除成功')
	    						location.href = location.href;
    					}else{

    						alert('未知错误');
    					}

    					
    			})
    		})
    	})
    	
    	$('.edit').each(function(){
    		$(this).click(function(){
    			
    			var title = $(this).attr('title')
    			if(title != 1)
    			{
    			id = $(this).parent().parent().find('img').attr('title');

    			hidden = $("<input type='hidden' name='field_id' value="+id+'>');

				input = $('<input type="file" name="img" >');
				//获取td里的文字
				vue = $(this).parent().parent().find('td').first().text();
				text= $("<input type='text' name='field_name' value="+vue+'>');
				button =$('<button type="submit">提交</button>');
				//找到以前的图片删掉节点
    			$(this).parent().parent().find('img').remove();
    			//找到fieldname清空
				vue = $(this).parent().parent().find('td').first().text('');//清空td中的text再添加

    			

    			$(this).parent().parent().find('td').first().append(text);
    			$(this).parent().parent().find('td').first().append(hidden);

    			

    			$(this).attr('title',1);
    			 $(this).parent().prev().append(input);
    			 $(this).parent().prev().append(button);


    			}
    			
    			 
    		})
    	})
// href='/admin/deltype/{{$v->field_id}}' 
    </script>
   <!-- <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">   -->
  <!-- <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script> -->
  <!-- <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

@endsection
