<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>商品管理 - 商家管理</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->

    <link rel="stylesheet" href="{{asset('/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('/admin/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/admin/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('/admin/dist/css/skins/_all-skins.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style type="text/css">
        th, td { white-space: nowrap; }
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
                        <li class="active">商家管理</li>
                    </ol>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <div class="box-footer clearfix no-border" >
                                    <!-- search form -->
                                    <form action="#" method="get" class="form-inline" id="supp_form">
                                        <div class="form-group">
                                            <input type="text" name="supp_id" id="supp_id" class="form-control" placeholder="请输入商家ID">&nbsp;
                                            <input type="text" name="supp_mcid" id="supp_mcid" class="form-control" placeholder="请输入商家MCID">&nbsp;
                                            <input type="text" name="supp_name" id="supp_name" class="form-control" placeholder="请输入商家名称">&nbsp;
                                            <select class="form-control select2" id="status" name="status">
                                                <option selected="selected" value="">&nbsp;商家状态&nbsp;</option>
                                                <option value="1">已上架</option>
                                                <option value="100">已下架</option>
                                            </select>&nbsp;
                                            <button type="button" class="btn btn-info" id="select_supp" onclick="subSelectSupp()"><i class="fa fa-search">查询</i> </button>&nbsp;
                                            <button type="button" class="btn btn-info" onclick="javascript:window.location.href='/supp/suppAdd'">新增</button>&nbsp;
                                            <button type="button" class="btn btn-info" onclick="updateSuppStatus(0)">下架</button>&nbsp;
                                            <button type="button" class="btn btn-info" onclick="updateSuppStatus(1)">上架</button>&nbsp;
                                            <button type="button" class="btn btn-info" onclick="exportSupp()">导出</button>
                                            <button type="button" class="btn btn-info" onclick="importSupp()">csv批量导入</button>

                                        </div>
                                    </form>
                                    <!-- /.search form -->
                                </div>


                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="table_list" class="table table-bordered table-hover table-sort">
                                    <thead>
                                        <tr>
                                            <th width="15">
                                                <input type="checkbox" class="checkall" />
                                            </th>
                                            <th>商家ID</th>
                                            <th>mcid</th>
                                            <th>商家名称</th>
                                            <th>英文名称</th>
                                            <th>中文名称</th>
                                            <th>官网</th>
                                            <th width="60">商家状态</th>
                                            <th width="100">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                    </div>
                    <!-- /.col -->
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
<!-- DataTables -->
<script src="{{asset('/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/admin/dist/js/adminlte.min.js')}}"></script>

<script src="{{asset('/layer/src/layer.js')}}"></script>
<script>
$(function () {

})
    var b = {
        'error1' : '对不起，一次只能选择一条数据！',
        'error2' : '对不起，请至少选择一条数据！',
        'error3' : '对不起，请勿重复点击！',
        'error4' : '对不起，网络异常，请刷新后重试！',
        'error5' : '对不起，请勿重复点击！',
        'error6' : '对不起，所选商家存在上架商家，请检查！',
        'error7' : '对不起，所选商家存在下架商家，请检查！',
        'message2' : '是',
        'message3' : '否'
    };

    var lang = {
        "sProcessing": "处理中...",
        "sLengthMenu": "每页 _MENU_ 项",
        "sZeroRecords": "没有匹配结果",
        "sInfo": "当前显示第 _START_ 至 _END_ 项，共 _TOTAL_ 项。",
        "sInfoEmpty": "当前显示第 0 至 0 项，共 0 项",
        "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
        "sInfoPostFix": "",
        "sSearch": "搜索:",
        "sUrl": "",
        "sEmptyTable": "表中数据为空",
        "sLoadingRecords": "载入中...",
        "sInfoThousands": ",",
        "oPaginate": {
            "sFirst": "首页",
            "sPrevious": "上页",
            "sNext": "下页",
            "sLast": "末页",
            "sJump": "跳转"
        },
        "oAria": {
            "sSortAscending": ": 以升序排列此列",
            "sSortDescending": ": 以降序排列此列"
        }
    };

    var table = $('#table_list').DataTable({
        paging        : true,
        iDisplayLength: 10,
        bLengthChange : false, //改变每页显示数据数量
        searching     : false,   ////禁用原生搜索

        scrollX       : true,   //是否支持滚动
        language      : lang,
        autoWidth     : false, //禁用自动调整列宽
        processing    : true, //隐藏加载提示,自行处理

        //orderMulti    : false, //启用多列排序
        //order         : [], //取消默认排序查询,否则复选框一列会出现小箭头
        ordering      : false,  //标题排序小箭头去除
        //renderer      : "bootstrap", //渲染样式：Bootstrap和jquery-ui
        //pagingType    : "simple_numbers", //分页样式：simple,simple_numbers,full,full_numbers
        // columnDefs    : [{
        //     "targets"   : 'nosort', //列的样式名
        //     "orderable" : false, //包含上样式名‘nosort'的禁止排序
        // }],

        serverSide    : true, //启用服务器端分页
        ajax: function (data, callback) {

            //封装请求参数
            // var param = {};
            // param.limit = data.length;//页面显示记录条数，在页面显示每页显示多少项的时候
            // param.start = data.start;//开始的记录序号
            data.page = (data.start / data.length)+1;//当前页码
            // param.draw = data.draw;
            //console.log(param);
            //ajax请求数据
            $.ajax({
                type     : "POST",
                url      : "/supp/getSuppList",
                cache    : false, //禁用缓存
                //async    : false,
                data     : data, //传入组装的参数
                dataType : "json",
                success  : function (result) {
                    console.log(result);

                    if (result.code != '0200') {
                        layer.msg(b.msg, {icon: 2, time: 2000});
                    }
                    //console.log(result);
                    //setTimeout仅为测试延迟效果
                    setTimeout(function () {
                        //封装返回数据
                        var returnData = {};
                        returnData.draw = data.draw;//这里直接自行返回了draw计数器,应该由后台返回
                        returnData.recordsTotal = result.recordsTotal;//返回数据全部记录
                        returnData.recordsFiltered = result.recordsTotal;//后台不实现过滤功能，每次查询均视作全部结果
                        returnData.data = result.data;//返回的数据列表
                        //console.log(returnData);
                        //调用DataTables提供的callback方法，代表数据已封装完成并传回DataTables进行渲染
                        //此时的数据需确保正确无误，异常判断应在执行此回调前自行处理完毕
                        callback(returnData);
                    }, 200);
                }
            });
        },
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],


        "columns" : [
            {
                "data": null,
                "bSortable": false,
                render:function(data, type,full,meta){
                    return '<input type="checkbox"  class="checkchild"  value="'+data.id+'" status="'+data.status+'"  supp_id="'+data.id+'"/>';
                }
            },
            {"data" : "id"     , "sClass": "text-center"},
            {"data" : "supp_mcid"     , "sClass": "text-center"},
            {"data" : "supp_name"     , "sClass": "text-center"},
            {"data" : "supp_name_en"  , "sClass": "text-center"},
            {"data" : "supp_name_cn"  , "sClass": "text-center"},
            {"data" : "supp_homepage" , "sClass": "text-center"},
            {
                "data": "status",
                "sClass": "text-center",
                "render": function ( status, type, full, meta ) {
                    if (status == 1) {
                        return '<span class="label label-success">已上架</span>';
                    } else if(status == 0) {
                        return '<span class="label label-danger">已下架</span>';
                    } else{
                        return '-';
                    }
                }
            },
            {
                "data": null,
                "sClass": "text-center",
                "bSortable": false,
                render:function(data, type,full,meta){
                    return '<button class="btn btn-sm btn-primary fa fa-edit" onclick="javascript:window.location.href=' + "'/supp/suppEdit?id=" +data.id + "'" + '"></button>&nbsp;&nbsp;';
                        // '<button class="btn btn-sm btn-danger fa fa-remove remove"></button>';
                },
            },
        ],
        "drawCallback": function( settings ) {
            appendSkipPage();
        },

    });

    //datatable全选
    $('.checkall').on('click', function () {
        if (this.checked) {
            $(this).attr('checked','checked')
            $('.checkchild').each(function () {
                this.checked = true;
            });
        } else {
            $(this).removeAttr('checked')
            $('.checkchild').each(function () {
                this.checked = false;
            });
        }
    });


    //商家上下架
    function updateSuppStatus($status) {
        var supp_id = [];
        if($(".checkchild:checked").length < 1){
            layer.msg(b.error2, {icon: 2, time: 1000});
            return false;
        }

        for(var i = 0; i < $(".checkchild:checked").length; i++){
            var v = $(".checkchild:checked").eq(i).val();
            var s = $(".checkchild:checked").eq(i).attr('status');
            if(s == $status){
                $error = (s==1) ? b.error6 : b.error7;
                layer.msg($error, {icon: 2, time: 1000});
                return false;
            }else{
                supp_id.push(v);
            }
        }

        var supp_id_length = supp_id.length;
        $status_msg = ($status==1) ? '上架' : '下架';
        layer.confirm('您共选择 '+supp_id_length+'个商家，确定'+$status_msg+'吗？', {
            btn: [b.message2,b.message3]
        },function(){
            $.ajax({
                url : '/supp/updateStatus',
                data : {
                    'supp_id_list' : supp_id,
                    'status'       : $status
                },
                type : 'post',
                dataType : 'json',
                success : function(data){
                    console.log(data);
                    if(data.code == '0200'){
                        layer.msg(data.msg, {icon: 1, time: 2000});
                        top.searthes_list(false);

                    }else{
                        layer.msg(data.msg, {icon: 2, time: 2000});
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
                }
            });
        });
    }

    //商家查询
    function subSelectSupp(){
        $('#select_supp').find('.fa-search').html('查询中...');
        $('#select_supp').attr("disabled",true);
        var index = layer.load(0, {shade: false});
        top.searthes_list(true);
    }

    top.searthes_list = function(param){
        var url = "/supp/getSuppList" + '?' + $("#supp_form").serialize();

        console.log(table);
        table.ajax.url(url);
        table.ajax.reload(function(){
            if(param){
                $('#select_supp').find('.fa-search').html('查询');
                $('#select_supp').attr("disabled",false);
                layer.closeAll('loading');
                return false;
            }
        },param);
    }

    function exportSupp() {
        var url = "/supp/export" + '?' + $("#supp_form").serialize();
        window.location.href=url;
    }



//导入商家csv
function importSupp() {
    layer.open({
        type: 2,
        title: 'xlsx批量导入商家数据',
        shadeClose: true,
        shade: 0.8,
        area: ['600px', '350px'],
        content: '/supp/importSupp', //iframe的url
    });
}


</script>
</body>