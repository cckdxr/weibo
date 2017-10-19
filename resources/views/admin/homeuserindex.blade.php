    @extends('layouts.head')
    @section('title','后台用户列表')
        @section('content')
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
            
                <div class="mws-panel grid_5">
                    <div class="mws-panel-header">
                        <span><i class="icon-graph"></i> Charts</span>
                    </div>
                    <div class="mws-panel-body">
                        <div id="mws-dashboard-chart" style="height: 222px;"></div>
                    </div>
                </div>
                
                <div class="mws-panel grid_3">
                    <div class="mws-panel-header">
                        <span><i class="icon-book"></i> Website Summary</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <ul class="mws-summary clearfix">
                            <li>
                                <span class="key"><i class="icon-support"></i> Support Tickets</span>
                                <span class="val">
                                    <span class="text-nowrap">332</span>
                                </span>
                            </li>
                            <li>
                                <span class="key"><i class="icon-certificate"></i> Commision</span>
                                <span class="val">
                                    <span class="text-nowrap">71% <i class="up icon-arrow-up"></i></span>
                                </span>
                            </li>
                            <li>
                                <span class="key"><i class="icon-shopping-cart"></i> This Week Sales</span>
                                <span class="val">
                                    <span class="text-nowrap">144 <i class="down icon-arrow-down"></i></span>
                                </span>
                            </li>
                            <li>
                                <span class="key"><i class="icon-install"></i> Cash Deposit</span>
                                <span class="val">
                                    <span class="text-nowrap">$6,421</span>
                                </span>
                            </li>
                            <li>
                                <span class="key"><i class="icon-key"></i> Last Sign In</span>
                                <span class="val">
                                    <span class="text-nowrap">September 21, 2012</span>
                                </span>
                            </li>
                            <li>
                                <span class="key"><i class="icon-windows"></i> Operating System</span>
                                <span class="val">
                                    <span class="text-nowrap">Debian Linux</span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
        	<!-- Inner Container Start -->
            <div class="container">
                <div class="mws-panel grid_8 mws-collapsible">
                    <div class="mws-panel-header">
                        <span><i class="icon-table"></i> 前台用户管理</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table mws-datatable">
                            <thead>
                                <tr>
                                    <th>用户名</th>
                                    <th>注册时间</th>
                                    <th>最近登录</th>
                                    <th>登录IP</th>
                                    <th>用户类型</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($users as $k=>$v)
                                <tr>
                                    <td>{{$v['nick_name']}}</td>
                                    <td>{{$v['created_at']}}</td>
                                    <td>{{$v['last_login_time']}}</td>
                                    <td>{{$v['last_login_ip']}}</td>
                                    <td><span class="badge badge-info">X</span>{{@$type[$v['user_level']]}}</td>
                                    <td>
                                        <span class="btn-group">
                                            <a href="{{ url('admin/user/'.$v['user_id'].'/edit')}}" class="btn btn-small" ><i class="icon-pencil" ></i></a>
                                            <!-- <a href="javascript:;" onclick=" delUser({{$v['user_id']}})" class="btn btn-small" ><i class="icon-trash" ></i></a> -->
                                            <a href="javascript:;" onclick=" delUser('{{$v->user_id}}')" class="btn btn-small"><i class="icon-trash" ></i></a>
                                        </span>
                                    </td>
                                </tr>
                               @endforeach 

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
                Copyright Your Website 2012. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->          
         
        <script type="text/javascript">
            function delUser(id){
                  layer.confirm('确认删除？', {
                btn: ['确认','取消'] //按钮
            }, function(){
//       
                $.post("{{url('admin/user/')}}/"+id,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
//   
                  
                    if(data.status == 0){
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 6});
                    }else{
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 5});
                    }


                })
//

            });
        }

        </script>
        @endsection