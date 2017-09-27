    @extends('layouts.head')
    @section('title','后台用户列表')
        @section('content')
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
            
            	
                
                <!-- Panels Start -->
               

                <div class="mws-panel grid_8 mws-collapsible">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i>后台用户列表</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table mws-datatable" style="table-layout: fixed;">
                            <thead>
                                <tr>
                                    <th>用户名</th>
                                    <th>注册时间</th>
                                    <th>最近登录</th>
                                    <th>登录IP</th>
                                    <th>用户类型</th>
                                    <th>个性签名</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $k=>$v)
                                <tr>
                                    <td>{{$v['user_name']}}</td>
                                    <td>{{$v['created_at']}}</td>
                                    <td>{{$v['last_login_time']}}</td>
                                    <td>{{$v['last_login_ip']}}</td>
                                    <td><span class="badge badge-info">X</span>{{$type[$v['user_level']]}}</td>
                                    <td class="overflow" >{{$v['user_msg']}}</td>
                                    <td>
                                        <span class="btn-group">
                                            <a href="{{ url('admin/user/'.$v['user_id'].'/edit')}}" class="btn btn-small" ><i class="icon-pencil" ></i></a>
                                            
                                            <form action="{{url('admin/user/'.$v['user_id'])}}" method="post" style="float: right;">
                                             {{ csrf_field()}}
                                             {{ method_field('DELETE')}}
                                             <button class="btn btn-small"><i class="icon-trash"></i></button>
                                            </form>  
                                        </span>
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
                       
            <!-- Footer -->
            <div id="mws-footer">
            	Copyright Your Website 2012. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        @endsection