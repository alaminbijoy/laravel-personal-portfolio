<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin | @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('admin_dist/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin_dist/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('admin_dist/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin_dist/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin_dist/dist/css/skins/_all-skins.min.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('admin_dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin_dist/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin_dist/bower_components/select2/dist/css/select2.min.css') }}">

    <!-- Bootstrap Select -->
    <link rel="stylesheet" href="{{ asset('admin_dist/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @yield('style')
    <!-- Custom style -->
    <link rel="stylesheet" href="{{ asset('admin_dist/dist/css/style.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{ route('home') }}" target="_blank" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>SS</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Spark Studio</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    @if(Auth::user()->user_role === 1)
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            @if($count > 0)
                                <span class="label label-success">{{$count}}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu">
                            @if($count > 0)
                            <li class="header">You have {{$count}} new messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">

                                    @foreach($email_notifications as $email_notification)
                                    <li><!-- start message -->
                                        <a href="{{ URL::to('/mail-inbox-read/'.$email_notification->id) }}">
                                            <div class="pull-left">
                                                <img src="{{ asset('admin_dist/dist/img/avatar5.png') }}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                {{$email_notification->name}}
                                                <small><i class="fa fa-clock-o"></i> {{$email_notification->created_at->diffForHumans()}}</small>
                                            </h4>
                                            <p>{{$email_notification->subject}}</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                    @endforeach

                                </ul>
                            </li>
                            @else
                                <li class="header">No new messages</li>
                            @endif
                            <li class="footer"><a href="{{ route('mailInbox') }}">See All Messages</a></li>
                        </ul>
                    </li>

                    @endif

                    <!-- Notifications: style can be found in dropdown.less -->
                    {{--<li class="dropdown notifications-menu">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="fa fa-bell-o"></i>--}}
                            {{--<span class="label label-warning">10</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li class="header">You have 10 notifications</li>--}}
                            {{--<li>--}}
                                {{--<!-- inner menu: contains the actual data -->--}}
                                {{--<ul class="menu">--}}
                                    {{--<li>--}}
                                        {{--<a href="#">--}}
                                            {{--<i class="fa fa-users text-aqua"></i> 5 new members joined today--}}
                                        {{--</a>--}}
                                    {{--</li>--}}

                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="footer"><a href="#">View all</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <!-- Tasks: style can be found in dropdown.less -->
                    {{--<li class="dropdown tasks-menu">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="fa fa-flag-o"></i>--}}
                            {{--<span class="label label-danger">9</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li class="header">You have 9 tasks</li>--}}
                            {{--<li>--}}
                                {{--<!-- inner menu: contains the actual data -->--}}
                                {{--<ul class="menu">--}}
                                    {{--<li><!-- Task item -->--}}
                                        {{--<a href="#">--}}
                                            {{--<h3>--}}
                                                {{--Design some buttons--}}
                                                {{--<small class="pull-right">20%</small>--}}
                                            {{--</h3>--}}
                                            {{--<div class="progress xs">--}}
                                                {{--<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"--}}
                                                     {{--aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
                                                    {{--<span class="sr-only">20% Complete</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<!-- end task item -->--}}
                                    {{----}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="footer">--}}
                                {{--<a href="#">View all tasks</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ isset(Auth::user()->user_image) ? asset(Auth::user()->media->path . Auth::user()->media->image_name) : asset('admin_dist/dist/img/avatar5.png') }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ isset(Auth::user()->user_image) ? asset(Auth::user()->media->path . Auth::user()->media->image_name) : asset('admin_dist/dist/img/avatar5.png') }}" class="img-circle" alt="User Image">
                                {{--Web Developer--}}
                                <p>
                                    {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }} - {{ isset(Auth::user()->user_occupation) ? Auth::user()->user_occupation : '' }}
                                    <small>{{Auth::user()->role->name}} since {{ isset(Auth::user()->created_at) ? date('d-M-Y', strtotime(Auth::user()->created_at))  : '' }}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ isset(Auth::user()->user_image) ? asset(Auth::user()->media->path . Auth::user()->media->image_name) : asset('admin_dist/dist/img/avatar5.png') }}" class="img-circle" alt="User Image">
                </div>
                
                <div class="pull-left info">
                    <p>{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            {{--<form action="#" method="get" class="sidebar-form">--}}
                {{--<div class="input-group">--}}
                    {{--<input type="text" name="q" class="form-control" placeholder="Search...">--}}
                    {{--<span class="input-group-btn">--}}
                {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
                {{--</button>--}}
              {{--</span>--}}
                {{--</div>--}}
            {{--</form>--}}
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li class="{{ Request::path() == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>


                @if(Auth::user()->user_role === 1)

                <li class="treeview {{ Request::path() == 'supper-admin' ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>Profiles</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::path() == 'supper-admin' ? 'active' : '' }}"><a href="{{ route('supperAdmin') }}"><i class="fa fa-circle-o"></i> Supper Admin</a></li>
                        <li class="{{ Request::path() == 'profile-edit' ? 'active' : '' }}"><a href=""><i class="fa fa-circle-o"></i> Edit Profile</a></li>
                    </ul>
                </li>

                <li class="treeview {{ Request::path() == 'add-new-portfolio' || Request::path() == 'manage-portfolio'  ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Portfolios</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::path() == 'add-new-portfolio' ? 'active' : '' }}"> <a href="{{ route('addNewPortfolio') }}"><i class="fa fa-circle-o"></i> Add Portfolio</a></li>
                        <li class="{{ Request::path() == 'manage-portfolio' ? 'active' : '' }}"><a href="{{ route('managePortfolio') }}"><i class="fa fa-circle-o"></i> Manage Portfolios</a></li>
                    </ul>
                </li>

                <li class="treeview {{ Request::path() == 'add-new-category' || Request::path() == 'manage-category' || Request::is('edit-category/*') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-th"></i> <span>Category</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::path() == 'add-new-category' ? 'active' : '' }}"><a href="{{ route('addCategory') }}"><i class="fa fa-circle-o"></i> Add New Category</a></li>
                        <li class="{{ Request::path() == 'manage-category' ? 'active' : '' }}"><a href="{{ route('manageCategory') }}"><i class="fa fa-circle-o"></i> Manage Category</a></li>
                    </ul>
                </li>

                <li class="treeview {{ Request::path() == 'add-social-media' || Request::path() == 'manage-social-media' || Request::is('edit-social-media/*') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fa fa-share"></i> <span>Social Media</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{ Request::path() == 'add-social-media' ? 'active' : '' }}"><a href="{{ route('socialIcon') }}"><i class="fa fa-circle-o"></i> Add Social Media</a></li>
                        <li class="{{ Request::path() == 'manage-social-media' ? 'active' : '' }}"><a href="{{ route('manageSocialMedia') }}"><i class="fa fa-circle-o"></i> Manage Social Media</a></li>
                    </ul>
                </li>

                <li class="{{ Request::path() == 'manage-users' || Request::path() == 'edit-user' ? 'active' : '' }}">
                    <a href="{{ route('manageUsers') }}">
                        <i class="fa fa-users"></i> <span>Manage Users</span>
                    </a>
                </li>

                <li class="{{ Request::path() == 'mail-inbox' || Request::path() == 'mail-compose' || Request::is('mail-inbox-read/*') ? 'active' : '' }}">
                    <a href="{{ route('mailInbox') }}">
                        <i class="fa fa-envelope"></i> <span>Mailbox</span>
                        <span class="pull-right-container">
                            @if($count > 0)
                                <small class="label pull-right bg-green">new</small>
                                <small class="label pull-right bg-green">{{$count}}</small>
                            @endif
                        </span>
                    </a>

                    </a>
                </li>
                @endif

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('title')
                <small>@yield('contentHeader')</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>@yield('breadcrumb')</li>
            </ol>
        </section>

        @if (count($errors) > 0)
            <div class="callout callout-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> {{session('message')}}</h4>
            </div>
        @endif

        @yield('adminContent')

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2016-2017 <a href="https://sparkitsolution.com/">Spark IT Solution</a>.</strong> All rights
        reserved.
    </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ asset('admin_dist/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin_dist/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin_dist/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin_dist/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin_dist/dist/js/demo.js') }}"></script>

<!-- CK Editor -->
<script src="{{ asset('admin_dist/bower_components/ckeditor/ckeditor.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('admin_dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('admin_dist/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_dist/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('admin_dist/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('admin_dist/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<!-- bootstrap-select -->
<script src="{{ asset('admin_dist/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

{{--<!-- InputMask -->--}}
{{--<script src="{{ asset('admin_dist/plugins/input-mask/jquery.inputmask.js') }}"></script>--}}
{{--<script src="{{ asset('admin_dist/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>--}}
{{--<script src="{{ asset('admin_dist/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>--}}

<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1')
        //bootstrap WYSIHTML5 - text editor
        $('.textarea').wysihtml5()
    })
</script>
<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
<script>
    $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
    })
</script>
@yield('script')
</body>
</html>
