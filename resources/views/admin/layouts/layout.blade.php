<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        control website
        {{--{{getSetting()}}--}}
        |

        @yield('title')
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->

    {!! Html::style('admin/bootstrap/css/bootstrap.min.css') !!}
     {{--{!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.css')!!}--}}
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.css" rel="stylesheet">

    <!-- Font Awesome -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->

    {!! Html::style('admin/dist/css/AdminLTE.min.css') !!}

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    {!! Html::style('admin/dist/css/skins/_all-skins.min.css') !!}

    <!-- iCheck -->
    {!! Html::style('admin/plugins/iCheck/flat/blue.css') !!}

    <!-- Morris chart -->
    {!! Html::style('admin/plugins/morris/morris.css') !!}

    <!-- jvectormap -->
    {!! Html::style('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}


    <!-- Date Picker -->
    {!! Html::style('admin/plugins/datepicker/datepicker3.css') !!}

    <!-- Daterange picker -->
    {!! Html::style('admin/plugins/daterangepicker/daterangepicker.css') !!}

    <!-- bootstrap wysihtml5 - text editor -->
    {!! Html::style('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}


    @yield('header')

</head>
<body class="hold-transition skin-blue sidebar-mini">


<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{url('/adminpanel')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                            page and may cause design problems
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-red"></i> 5 new members joined
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-red"></i> You changed your username
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">
                                You have {{ countunreadMessage() }}  New Message</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    @foreach(unreadMessage() as $keymessages => $valueMessage)
                                    <li><!-- Task item -->
                                        <a href="{{ url('/adminpanel/contact/'.$valueMessage->id.'/edit') }}">
                                            <h3>
                                                {{ $valueMessage->contact_name }}
                                                <small class="pull-right"> {{ $valueMessage->created_at }}</small>
                                            </h3>

                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    @endforeach

                                </ul>
                            </li>
                            <li class="footer">
                                <a href="{{ url('/adminpanel/contact') }}">Show all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                            <img src="{{ checkIfImageExists(Auth::user()->image)  }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{Auth::user()->fullName()}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{ checkIfImageExists(Auth::user()->image)  }}" class="img-circle" alt="User Image">

                                <p>
                                    {{Auth::user()->fullName()}}
                                    <small>{{Auth::user()->created_at}}</small>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{url('/adminpanel/users/'.Auth::user()->id.'/edit')}}" class="btn btn-default btn-flat">My Profile</a>
                                </div>
                                <div class="pull-right">

                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
                    <img src="{{ checkIfImageExists(Auth::user()->image)  }}"  class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->fullName()}}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>

             @include('/admin/layouts/nav')

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        @yield('content')
    </div>
    <footer class="main-footer">
        {{--<div class="pull-right hidden-xs">--}}
            {{--<b>Version</b> 2.3.8--}}
        {{--</div>--}}
        {{--<strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Fatima Web</a>.</strong> All rights--}}
        {{--reserved.--}}
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdons Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-user bg-yellow"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Other sets of options are available
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div>
                    <!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div>
                    <!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebars background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>

<!-- jQuery 2.2.3 -->

{!! Html::script('admin/plugins/jQuery/jquery-2.2.3.min.js') !!}

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);


</script>
<!-- Bootstrap 3.3.6 -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.7/summernote.js"></script>
{!! Html::script('admin/bootstrap/js/bootstrap.min.js') !!}
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
{!! Html::script('admin/plugins/morris/morris.min.js') !!}
<!-- Sparkline -->
{!! Html::script('admin/plugins/sparkline/jquery.sparkline.min.js') !!}
<!-- jvectormap -->
{!! Html::script('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
<!-- jQuery Knob Chart -->
{!! Html::script('admin/plugins/knob/jquery.knob.js') !!}
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
{!! Html::script('admin/plugins/daterangepicker/daterangepicker.js') !!}
<!-- datepicker -->
{!! Html::script('admin/plugins/datepicker/bootstrap-datepicker.js') !!}
<!-- Bootstrap WYSIHTML5 -->
{!! Html::script('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
{!! Html::script('admin/plugins/slimScroll/jquery.slimscroll.min.js') !!}
{!! Html::script('admin/plugins/chartjs/Chart.min.js') !!}
{!! Html::script('admin/plugins/fastclick/fastclick.js') !!}
{!! Html::script('admin/dist/js/app.min.js') !!}
<!-- AdminLTE App -->
<!-- AdminLTE App -->
<!-- AdminLTE App -->
<!-- AdminLTE App -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{!! Html::script('admin/dist/js/pages/dashboard2.js') !!}
<!-- AdminLTE for demo purposes -->
{!! Html::script('admin/dist/js/demo.js') !!}
{{--{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.0.1/min/dropzone.min.js')!!}--}}
<script src="{{ asset('js/sweetalert2.all.js') }}" type="text/javascript"></script>
@include('/admin/layouts/alert_message')


@yield('footer')
</body>
</html>
