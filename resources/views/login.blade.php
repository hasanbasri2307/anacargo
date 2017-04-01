<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ Config::get("sayapbiru.company_name") }} | Login </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{ asset("assets/bootstrap/css/bootstrap.min.css") }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset("assets/font-awesome.min.css") }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset("assets/ionicons.min.css") }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset("assets/dist/css/AdminLTE.min.css") }}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset("assets/plugins/iCheck/square/blue.css") }}">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                
            <img src="{{ asset("assets/images/logo.jpg") }}" width="360px">
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Selamat datang di Tracking System Goods</p>
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                      <strong>Error!</strong> {{ Session::get('error') }}
                    </div>
                @endif

                @if(Session::has('success'))
                    <div class="alert alert-success">
                      <strong>Success!</strong> {{ Session::get('success') }}
                    </div>
                @endif
                {!! Form::open(['url'=>'login']) !!}
                    <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                        {!! Form::email("email",old("email"),['class'=>'form-control','placeholder'=>'Email']) !!}
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                        {!! Form::password("password",['class'=>'form-control','placeholder'=>'Password']) !!}
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                         @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                {!! Form::checkbox("rememberme",1,false) !!}
                                    Ingatkan saya
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                {!! Form::close() !!}
               
                <!-- /.social-auth-links -->
               {{--  <a href="#">Lupa Password</a><br> --}}
                
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
        <!-- jQuery 2.2.3 -->
        <script src="{{ asset("assets/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="{{ asset("assets/bootstrap/js/bootstrap.min.js") }}"></script>
        <!-- iCheck -->
        <script src="{{ asset("assets/plugins/iCheck/icheck.min.js") }}"></script>
        <script>
            $(function () {
              $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
              });
            });
        </script>
    </body>
</html>