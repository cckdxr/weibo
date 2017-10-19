@section('title','敏感词')
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

            	<div class="mws-panel grid_8" style='width:auto'>
                	<div class="mws-panel-header" style="width:1000px">
                    	<span><i class="icon-table"></i>敏感词列表</span>
                    </div>
                    <div class="mws-panel-body no-padding" style="width:1000px">
                        <table class="mws-table" style="width:1000px">
                            <thead>
                                <tr>
                                    <th>sen_id</th>
                                    <th>sen_name</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($stvs as $v)
                                <tr>
                                    <td>{{$v->sen_id}}</td>
                                    <td>{{$v->sen_name}}</td>
                                    <td>
                                        <a href='/admin/delstv/{{$v->sen_id}}'>删除</a>
                                    
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Panels End -->
            </div>
            <!-- Inner Container End -->          
         {{csrf_field()}}
            {!!$stvs->render()!!}

  
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
   <!-- <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">   -->
  <!-- <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script> -->
  <!-- <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

@endsection
