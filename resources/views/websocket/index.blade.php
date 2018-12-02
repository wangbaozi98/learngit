<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | General Form Elements</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('/admin/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/admin/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('/admin/dist/css/skins/_all-skins.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style type="text/css">
        .form-group.required .control-label:after {
            content:"*";
            color:red;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12 center-block" style="float: none;">
                    <!-- general form elements -->
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">编辑</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" id="supp_edit">
                            <div class="box-body">

                                <input type="text"  style="display:none" name="room_id" id="room_id" class="form-control"  value="{{ $info['room_id'] }}">
                                <input type="text"  style="display:none" name="user_id" id="user_id" class="form-control"  value="{{ $info['user_id'] }}">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">内容</label>
                                    <div class="col-sm-4">
                                        <textarea name="supp_desc_cn" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="box-footer">
                                <button type="button" class="btn btn-info col-lg-offset-2" id="submit_btn"  onclick="submit_socket()">提交</button><br/><br/><br/><br/>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('layouts.footer')

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('/admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/admin/dist/js/demo.js')}}"></script>


<script src="{{asset('/layer/src/layer.js')}}"></script>
<!-- page script -->
<script>
    $(function () {
        var room_id = $('#room_id').val();
        var user_id = $('#user_id').val();

        ws = new WebSocket("ws://127.0.0.1:9502");
        ws.onopen = function (evt) {
//    发送房间号相关信息，以识别connect id
            var data = {
                room_id: room_id,
                user_id: user_id,
                type: 'connect'
            };
            ws.send(JSON.stringify(data));
        };
    });

    function submit_socket () {
        $('#submit_btn').attr('disabled',true);
        $.ajax({
            url : '/supp/suppEdit',
            data : $("#supp_edit").serialize(),
            type : 'post',
            dataType : 'json',
            success : function(result){
                if(result.code == '0200'){
                    layer.msg(result.msg, {icon: 1});
                    location.href = '/supp/suppList';
                }else{
                    layer.msg(result.msg, {icon: 2});
                    $('#submit_btn').attr('disabled',false);
                    return false;
                }
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                layer.closeAll('loading');
                console.log(XMLHttpRequest);
                console.log(textStatus);
                console.log(errorThrown);
                console.log('网络异常，请刷新后重试！');
                layer.msg('网络异常，请刷新后重试！', {icon: 2});
                $('#submit_btn').attr('disabled',false);
            }
        });
    }


    $(function () {
        //上传图片
        $('#fileUploader').change(function (event) {
            var uploadFiles = $(this).prop('files');
            var fileLen = uploadFiles.length;
            if (fileLen == 0) {
                return;
            }
            actUpload(uploadFiles[0]);
        });

        function actUpload(inputFile) {
            var exp = /.jpg$|.gif$|.png$|.jpeg$|.bmp$|.JPG$/;
            if (exp.exec(inputFile.name) === null) {
                layer.msg('图片格式不合法', {icon: 2});
                return;
            }
            insertImage(inputFile);
        }

        function insertImage(imgData) {
            var url = '/common/upload';
            var postData = new FormData();
            postData.append('imgFile', imgData);
            postData.append('file_type', 'supp');
            $.ajax({
                url: url,
                type: 'post',
                data: postData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    if (data.code == '0200') {
                        var imgUrl = data.payload;
                        $("#supp_logo").val(imgUrl);
                        $("#goods_img").attr("src", imgUrl);
                    } else {
                        layer.msg(data.msg, {icon: 2});
                    }
                }
            });
        }
    });
</script>

</body>