@extends("layouts.cms")
@section("css_plugins")
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset("assets/plugins/iCheck/flat/blue.css") }}">
    <!-- Morris chart -->
    <link rel="stylesheet" href="{{ asset("assets/plugins/morris/morris.css") }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset("assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css") }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset("assets/plugins/datepicker/datepicker3.css") }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset("assets/plugins/daterangepicker/daterangepicker.css") }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset("assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") }}">
@endsection
@section("content")
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">
    <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{ $count_clients }}</h3>
                        <p>Jumlah Klien</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ url("clients") }}" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{ $count_users }}</h3>
                        <p>Jumlah User</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ url("users") }}" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
           
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
</section>
@endsection
@section("js_plugins")
    <!-- Morris.js charts -->
    <script src="{{ asset("assets/raphael-min.js") }}"></script>
    <script src="{{ asset("assets/plugins/morris/morris.min.js") }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset("assets/plugins/sparkline/jquery.sparkline.min.js") }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset("assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js") }}"></script>
    <script src="{{ asset("assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js") }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset("assets/plugins/knob/jquery.knob.js") }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset("assets/moment.min.js") }}"></script>
    <script src="{{ asset("assets/plugins/daterangepicker/daterangepicker.js") }}"></script>
    <!-- datepicker -->
    <script src="{{ asset("assets/plugins/datepicker/bootstrap-datepicker.js") }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset("assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset("assets/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
    <!-- FastClick -->
    <script src="{{ asset("assets/plugins/fastclick/fastclick.js") }}"></script>
  
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset("assets/dist/js/pages/dashboard.js") }}"></script>
@endsection