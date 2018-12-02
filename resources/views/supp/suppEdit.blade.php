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


    @include('layouts.header')

    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.left')

    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div>
                    <ol class="breadcrumb">
                        <li><a href="/supp/suppList">商品管理</a></li>
                        <li><a href="/supp/suppList">商家管理</a></li>
                        <li class="active">编辑商家</li>
                    </ol>
                </div>
            </section>

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
                                    <div class="form-group required">
                                        <label for="inputEmail3" class="col-sm-2 control-label">mcid</label>

                                        <div class="col-sm-4">
                                            <input type="text"  style="display:none" name="supp_id" class="form-control"  value="{{ $supp_info['supp_id'] }}">
                                            <input type="text" name="supp_mcid" class="form-control"  value="{{ $supp_info['supp_mcid'] }}">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="inputPassword3" class="col-sm-2 control-label">标准名</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="supp_name" class="form-control"  value="{{ $supp_info['supp_name'] }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="col-sm-2 control-label">中文名</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="supp_name_cn" class="form-control" id="exampleInputEmail1" value="{{ $supp_info['supp_name_cn'] }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="col-sm-2 control-label">英文名</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="supp_name_en" class="form-control" id="exampleInputPassword1" value="{{ $supp_info['supp_name_en'] }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">所属地区</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="supp_region" class="form-control" value="{{ $supp_info['supp_region'] }}">
                                        </div>
                                    </div>

                                    <div class="form-group required">
                                        <label for="exampleInputEmail1" class="col-sm-2 control-label">官网</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="supp_homepage" class="form-control" id="exampleInputEmail1" value="{{ $supp_info['supp_homepage'] }}">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label for="exampleInputPassword1" class="col-sm-2 control-label">佣金</label>
                                        <div class="col-sm-4">
                                            <input type="text" name="supp_aff_min" class="form-control" id="exampleInputPassword1" value="{{ $supp_info['supp_aff_min'] }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">中文描述</label>
                                        <div class="col-sm-4">
                                            <textarea name="supp_desc_cn" class="form-control" rows="3">{{ $supp_info['supp_desc_cn'] }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">英文描述</label>
                                        <div class="col-sm-4">
                                            <textarea name="supp_desc_en" class="form-control" rows="3">{{ $supp_info['supp_desc_en'] }}</textarea>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">商家logo:</label>
                                        <div class="col-sm-4 file-loading">
                                            <input type="file" id="fileUploader" >
                                            <input type="hidden" id="supp_logo" name="supp_logo" value="{{ $supp_info['supp_logo'] }}" class="input-max" ccept="image/png,image/jpg,image/jpeg,image/gif">
                                            <div id="img_div">
                                                <img id="goods_img" src="{{ $supp_info['supp_logo'] }}" width="200"/>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="button" class="btn btn-info col-lg-offset-2" id="submit_btn"  onclick="suppEdit()">提交</button><br/><br/><br/><br/>
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
    function suppEdit () {
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