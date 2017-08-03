<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ Config::get("sayapbiru.company_name") }} | {{ $title }} </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{ asset("assets/bootstrap/css/bootstrap.min.css") }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset("assets/font-awesome/css/font-awesome.min.css") }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset("assets/ionicons/css/ionicons.min.css") }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset("assets/dist/css/AdminLTE.min.css") }}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset("assets/dist/css/skins/_all-skins.min.css") }}">

        @yield("css_plugins")

        @yield("css_custom")
        <style type="text/css">
            input[type=number]::-webkit-inner-spin-button {
              -webkit-appearance: none;

            }

            input[type='number'] {
                -moz-appearance:textfield;
            }
        </style>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="{{ url("/") }}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>BARANG</b> KIRIMAN</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                           
                          
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset("assets/images/user1.png") }}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="{{ asset("assets/images/user1.png") }}" class="img-circle" alt="User Image">
                                        <p>
                                            {{ Auth::user()->name }} - {{ Auth::user()->type }}
                                            <small>Login terakhir, {{ Auth::user()->last_login }}</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="{{ url("user/profile") }}" class="btn btn-default btn-flat">Profil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{ route('logout') }}" class="btn btn-default btn-flat" 
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                           
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            
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
                       
                    </div>
                    <img src="{{ asset("assets/images/logo2.png") }}" width="180px;" style="margin-left: 23px;">
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="{{ (Request::is("home") ? "active" : "") }}"><a href="{{ url("/") }}"><i class="fa fa-dashboard"></i><span>Beranda</span></a></li>
                        <li class="{{ (Request::is("customers") || Request::is("customer/*") ? "active" :"") }}"><a href="{{ url("customers") }}"><i class="fa fa-users"></i> <span>Customer</span></a></li>
                        
                        @if(Auth::user()->type =="admin")
                            <li class="{{ (Request::is("users") || Request::is("user/*") ? "active" :"") }}"><a href="{{ url("users") }}"><i class="fa fa-user"></i> <span>User</span></a></li>
                        @endif
                        
                        <li class="{{ (Request::is("cnpibk") || Request::is("tracking") || Request::is("cnpibk/*") ? "active" :"") }} treeview">
                            <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>Form</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ (Request::is("cnpibk") || Request::is("cnpibk/*") ? "active" : "") }}"><a href="{{ url("cnpibk") }}"><i class="fa fa-circle-o"></i> CN / PIBK</a></li>
                               {{--  <li class="{{ (Request::is("tracking") || Request::is("tracking/*") ? "active" : "") }}"><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Tracking</a></li> --}}
                            </ul>
                        </li>
                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" >
                <!-- Content Header (Page header) -->
                @yield("content")
                
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0.0
                </div>
                <strong>Copyright &copy; {{ date("Y") }} PT. TATA HARMONI SARANATAMA.</strong> All rights
                reserved.
            </footer>
            <!-- Control Sidebar -->
           
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        <!-- jQuery 2.2.3 -->
        <script src="{{ asset("assets/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset("assets/jquery-ui.min.js") }}"></script>
        <script src="{{ asset("assets/laravel.js") }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

        <!-- Bootstrap 3.3.6 -->
        <script src="{{ asset("assets/bootstrap/js/bootstrap.min.js") }}"></script>
          <!-- AdminLTE App -->
        <script src="{{ asset("assets/dist/js/app.min.js") }}"></script>
        @yield("js_plugins")

        
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset("assets/dist/js/demo.js") }}"></script>
        @yield("js_custom")
    </body>
</html>