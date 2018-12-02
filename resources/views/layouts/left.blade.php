<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">


            <li class="header">概要</li>

            @if(in_array($tree_menu, ['home','category', 'supp', 'brand', 'brandRela'])) <li class="active treeview">  @else  <li class=" treeview">  @endif
                <a href="#">
                    <i class="fa fa-table"></i> <span>商品管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @if($tree_menu=='home')  <li class="active">  @else  <li>  @endif
                        <a href="/home"><i class="fa fa-circle-o"></i> 商品管理</a>
                    </li>
                    @if($tree_menu=='category')  <li class="active">  @else  <li>  @endif
                        <a href="/category/categoryList"><i class="fa fa-circle-o"></i> 品类管理</a>
                    </li>
                    @if($tree_menu=='brand')  <li class="active">  @else  <li>  @endif
                        <a href="/brand/brandList"><i class="fa fa-circle-o"></i> 品牌管理</a>
                    </li>
                    @if($tree_menu=='brandRela')  <li class="active">  @else  <li>  @endif
                        <a href="/brandRela/brandRelaList"><i class="fa fa-circle-o"></i> 标准品牌管理</a>
                    </li>
                    @if($tree_menu=='supp')  <li class="active">  @else  <li>  @endif
                        <a href="/supp/suppList"><i class="fa fa-circle-o"></i> 商家管理</a>
                    </li>
                </ul>
            </li>

            @if(in_array($tree_menu, ['account', 'cronSetup', 'template', 'download','host'])) <li class="active treeview">  @else  <li class=" treeview">  @endif
                <a href="#">
                    <i class="fa fa-table"></i> <span>商家包管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @if($tree_menu=='account')  <li class="active">  @else  <li>  @endif
                        <a href="/account/accountList"><i class="fa fa-circle-o"></i> 账户管理</a>
                    </li>
                    @if($tree_menu=='template')  <li class="active">  @else  <li>  @endif
                        <a href="/template/templateList"><i class="fa fa-circle-o"></i> 映射模板管理</a>
                    </li>
                    @if($tree_menu=='cronSetup')  <li class="active">  @else  <li>  @endif
                        <a href="/cronSetup/cronSetupList"><i class="fa fa-circle-o"></i> 执行文件管理</a>
                    </li>
                    </li>
                    @if($tree_menu=='download')  <li class="active">  @else  <li>  @endif
                        <a href="/download/downList"><i class="fa fa-circle-o"></i> 文件下载管理</a>
                    </li>
                    @if($tree_menu=='host')  <li class="active">  @else  <li>  @endif
                        <a href="/host/hostList"><i class="fa fa-circle-o"></i> 域名管理</a>
                    </li>
                </ul>
            </li>


            @if(in_array($tree_menu, ['download_fail'])) <li class="active treeview">  @else  <li class=" treeview">  @endif
                <a href="#">
                    <i class="fa fa-table"></i> <span>异常管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @if($tree_menu=='download_fail')  <li class="active">  @else  <li>  @endif
                        <a href="/download/failList"><i class="fa fa-circle-o"></i> 文件下载异常</a>
                    </li>
                </ul>
            </li>

            @if(in_array($tree_menu, ['role', 'permission','admin'])) <li class="active treeview">  @else  <li class=" treeview">  @endif
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>管理员管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @if($tree_menu=='role')  <li class="active">  @else  <li>  @endif
                        <a href="/manager/roleList"><i class="fa fa-circle-o"></i> 角色管理</a>
                    </li>
                    @if($tree_menu=='permission')  <li class="active">  @else  <li>  @endif
                        <a href="/manager/permissionGroupList"><i class="fa fa-circle-o"></i> 权限管理</a>
                    </li>
                    @if($tree_menu=='admin')  <li class="active">  @else  <li>  @endif
                        <a href="/manager/adminList"><i class="fa fa-circle-o"></i> 管理员管理</a>
                    </li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>