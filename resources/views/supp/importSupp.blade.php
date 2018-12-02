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

</head>
<body class="hold-transition skin-blue sidebar-mini">

<!-- Content Wrapper. Contains page content -->

<section class="content">
    <table id="example2" class="table table-bordered table-hover table-sort">

        <tbody>
            <tr>
                <td>
                    <input type="file" id="supp_csv" name="supp_csv" accept=".xlsx" />
                </td>
            </tr>

            <tr>
                <td colspan="3">注意：请上传xlsx文件。<br />标题依次：supp_name_cn、supp_name_en、supp_desc_cn、supp_desc_en、supp_region、supp_logo</td>
            </tr>
        </tbody>
        <tfoot>
        </tfoot>
    </table>



</section>

<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal" id="closeBtn">关闭</button>
    <button type="button" class="btn btn-primary" id="saveBtn">保存</button>
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
    //点击保存
    $("#saveBtn").click(function () {

        var uploadFiles = document.getElementById('supp_csv').files[0];

        console.log(uploadFiles.name);

        var exp = /.xlsx$/;
        if (exp.exec(uploadFiles.name) === null) {
            layer.msg('请上传商家slsx文件', {icon: 2});
            return;
        }

        var postData = new FormData();
        postData.append('supp_csv_file', uploadFiles);

        console.log(postData);
        $.ajax({
            url: '/excel/importSupp',
            type: 'post',
            data: postData,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                if (data.code == '0200') {
                    layer.msg(data.msg, {icon: 1, time: 2000},function () {
                        var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
                        parent.layer.close(index);
                        // window.location.reload();
                        window.parent.location.reload();
                    });
                } else {
                    layer.msg(data.msg, {icon: 2});
                }
            }
        });


    });






    //关闭按钮
    $("#closeBtn").on('click',function () {
        var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
        parent.layer.close(index);

    });
});


</script>

</body>