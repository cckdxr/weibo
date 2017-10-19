@section('title','轮播图列表')
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
                <div>
                <b style='color:red'>{{session('error')}}</b>
                </div>
               @endif
<form action="/admin/editlun"  enctype="multipart/form-data" method='post'>
            	<div class="mws-panel grid_8" style='width:auto'>
                	<div class="mws-panel-header" style="width:1000px">
                    	<span><i class="icon-table"></i>轮播图列表</span>
                    </div>
                    <div class="mws-panel-body no-padding" style="width:1000px">

                        <table class="mws-table" style="width:1000px">
                        	{{csrf_field()}}
                            <thead>
                                <tr>
                                    <th>图片名称</th>
                                    <th>轮播图</th>
                                    <th>权重</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($lun as $v)
                                <tr>
                                    <td>{{$v->pic_name}}</td>
                                    <td><img src='{{url($v->pic_add)}}' title='{{$v->pic_id}}' style='width:168px;height:168;'></td>
                                    <td>{{$v->pic_order}}</td>
                                    <td><a href='javascript:;' class='edit'>修改</a>
										<a href='javascript:;' class='del' name='{{$v->pic_id}}'>删除</a>
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
                // alert(id)
    			$.post('/admin/dellun',{'_token':'{{csrf_token()}}',id:id},function(data){


    					// alert(data)
    					if(data == 1)
    					{
    						alert('删除成功');
                            location.reload();
    					}else{
                            alert('删除失败')
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
num = $(this).parent().parent().find('td').eq(2).text();

    			hidden = $("<input type='hidden' name='pic_id' value="+id+'>');
                quan = $("<input type='text' name='pic_order'value="+num+'>')
				input = $('<input type="file" name="img" >');
				//获取td里的文字
				vue = $(this).parent().parent().find('td').first().text();
                //获取权重值
               
                
                $(this).parent().parent().find('td').eq(2).text('');//清空


				text= $("<textarea type='text' name='pic_name' cols='20' rows='10' style='resize:none;'>"+vue+'</textarea>');
				button =$('<button type="submit">提交</button>');
				//找到以前的图片删掉节点
    			$(this).parent().parent().find('img').remove();
    			//找到fieldname清空
				vue = $(this).parent().parent().find('td').first().text('');//清空td中的text再添加

    			

    			$(this).parent().parent().find('td').first().append(text);
    			$(this).parent().parent().find('td').first().append(hidden);

    			

    			$(this).attr('title',1);
    			 $(this).parent().prev().prev().append(input);
                 $(this).parent().prev().append(quan);


    			 $(this).parent().prev().append(button);


    			}
    			
    			 
    		})
    	})

    </script>
   <!-- <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">   -->
  <!-- <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script> -->
  <!-- <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

@endsection
