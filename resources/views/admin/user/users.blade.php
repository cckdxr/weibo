@section('title','后台用户列表')
@extends('layout.layout')
@extends('layout.content')
@section('content')
        <!-- Main Container Start -->
     
<link rel="stylesheet" href="{{asset('css/app.css')}}">

        <div id="mws-container" class="clearfix">
        
            <!-- Inner Container Start -->
            <div class="container">
            
                
                <!-- Panels Start -->
                
                <div class="mws-panel grid_8" style='width:auto'>
                    <div class="mws-panel-header" style="width:1000px">
                        <span><i class="icon-table"></i>微博用户</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table">
                            <thead>
                                <tr>
                                    <th>用户名</th>
                                    <th>个性签名</th>
                                    <th>最后登录时间</th>
                                    <th>登录IP</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i=0;$i<count($res);$i++)
                                <tr>
                                    <td>{{$res[$i]->user_name}}</td>
                                    <td>{{$res[$i]->user_msg}}</td>
                                    <td>{{ date('Y-m-d H:i:s',$res[$i]->last_login_time) }}</td>
                                    <td>{{$res[$i]->last_login_ip }}</td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Panels End -->
            </div>
            <!-- Inner Container End -->          
         
            {!!$res->render()!!}

  
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
