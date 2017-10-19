@section('title','后台用户-头像-签名')
@extends('layout.layout')
@extends('layout.content')
@section('content')


        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
            <div class="mws-panel grid_8">
                <div class="mws-panel-header">
                    <span><i class="icon-pencil"></i>上传头像</span>
                </div>
                <div class="mws-panel-body no-padding">
                    <form id='first' class="mws-form" action="/admin/zoom" enctype="multipart/form-data" method="post">
                        {{csrf_field()}}
                        <div class="mws-form-inline">
                            <div class="mws-form-row">
                                <input id='file_upload' type="file" name="upload" multiple="true">
                                <img id='img1' width="300px">
                            </div>
                        </div>
                        <div class="mws-button-row">
                            <input type="submit" class="btn btn-danger" value="提交">
                        </div>
                    </form>
                </div>
            </div>

            <div class="mws-panel grid_8">
                <div class="mws-panel-header">
                    <span><i class="icon-ok"></i>个性签名</span>
                </div>
                <div class="mws-panel-body no-padding">
                    <form id="mws-validate" class="mws-form" action="/admin/msg" method="post">
                        {{csrf_field()}}
                        <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                        <div class="mws-form-inline">
                            <div class="mws-form-row">
                                <div class="mws-form-item">
                                    <textarea cols="100px" rows="50px" name='mes'>{{session('user')['user_msg']}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mws-button-row">
                            <input type="submit" class="btn btn-danger" value="提交">
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

    <script src="jui/js/globalize/globalize.js"></script>
    <script src="jui/js/globalize/cultures/globalize.culture.en-US.js"></script>

    <!-- Plugin Scripts -->
    <script src="custom-plugins/picklist/picklist.min.js"></script>
    <script src="plugins/autosize/jquery.autosize.min.js"></script>
    <script src="plugins/select2/select2.min.js"></script>
    <script src="plugins/colorpicker/colorpicker-min.js"></script>
    <script src="plugins/validate/jquery.validate-min.js"></script>
    <script src="plugins/ibutton/jquery.ibutton.min.js"></script>
    <script src="plugins/cleditor/jquery.cleditor.min.js"></script>
    <script src="plugins/cleditor/jquery.cleditor.table.min.js"></script>
    <script src="plugins/cleditor/jquery.cleditor.xhtml.min.js"></script>
    <script src="plugins/cleditor/jquery.cleditor.icon.min.js"></script>

    <!-- Core Script -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="js/demo/demo.formelements.js"></script>
    <script>

 
 

            $("#file_upload").change(function () {
                uploadImage();
            })

        function uploadImage() {
//  判断是否有选择上传文件
            var imgPath = $("#file_upload").val();
            // alert(imgPath)
            if (imgPath == "") {
                alert("请选择上传图片！");
                return;
            }
            //判断上传文件的后缀名
            var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
            if (strExtension != 'jpg' && strExtension != 'gif'
                && strExtension != 'png' && strExtension != 'bmp') {
                alert("请选择图片文件");
                return;
            }

        var formData = new FormData($('#first')[0]);
        // alert(formData)
        $.ajax({
            type: "POST",
            url: "/admin/upload",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                $('#img1').attr('src','/'+data);
                alert(data)
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("图片加载失败，请检查网络后重试");
            }
        });
   
     

        // $.post{'/admin/douplod',{'_token':{{csrf_token()}},function }
     


    }
    </script>
@endsection