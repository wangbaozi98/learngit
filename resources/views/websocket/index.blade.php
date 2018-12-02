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
                                        <textarea name="supp_desc_cn" class="form-control wait-send" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="button" class="btn btn-info col-lg-offset-2" id="send"  onclick="websocket_send()">提交</button><br/><br/><br/><br/>
                                <div class="content">
                                </div>
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

        ws = new WebSocket("ws://118.25.22.231:9502");
        ws.onopen = function (evt) {


//    发送房间号相关信息，以识别connect id
            var data = {
                room_id: room_id,
                user_id: user_id,
                type: 'connect'
            };
            console.log(data);
            ws.send(JSON.stringify(data));
        };

        ws.onclose = function () {
            //    发送房间号相关信息，以识别connect id
            var data = {
                room_id: room_id,
                user_id: user_id,
                type: 'close'
            };
            ws.send(JSON.stringify(data));
        };


        // 当有消息时根据消息类型显示不同信息
        ws.onmessage = function (evt) {
            console.log(evt);
            var data = JSON.parse(evt.data);
            console.log(data);
            // //判断是join还是message
            // if (data.type == 'message') {
            //     if (data.user.id == currUser) {
            //         $('.content').append('<div class="clearfix"></div> <div class="chat-right"> <img src="' + default_avatar + '" alt="" class="avatar pull-right"> <div class="pull-right"> <span class="username username-right">' + data.user.name + '</span> <br> <div class="content-span">' + data.message + '</div> </div> </div>');
            //     } else {
            //         $('.content').append('<div class="clearfix"></div> <div class="chat-left"> <img src="' + default_avatar + '" alt="" class="avatar pull-left"> <div class="pull-left"> <span class="username username-left">' + data.user.name + '</span> <br> <div class="content-span">' + data.message + '</div> </div> </div>');
            //     }
            // } else if (data.type == 'join') {
            //     $('.all').text(data.message.all);
            //     $('.online').text(data.message.online);
            //     $('.content').append('<span class="joined">' + data.user.name + '加入了房间</span>');
            // } else if (data.type == 'leave') {
            //     $('.all').text(data.message.all);
            //     $('.online').text(data.message.online);
            //     $('.content').append('<span class="joined">' + data.user.name + '离开了房间</span>');
            // }
            //
            // //滚到底部
            // setTimeout("changeHight()", 5);
        };


        ws.onerror = function () {
            console.log("出现错误");
        };


        //发送信息
        $('#send').click(function () {
            var data = {
                'message': $('#wait-send').val(),
                'user_id': $('#user_id').val(),
                'room_id': $('#room_id').val(),
                'type': 'message'
            };
            ws.send(JSON.stringify(data));
            //清空数据
            $('#wait-send').val('');
        });


    });



</script>

</body>