@extends("layouts.cms")
@section("css_plugins")
  <link rel="stylesheet" href="{{ asset("assets/plugins/iCheck/all.css") }}">
@endsection
@section("content")
<section class="content-header">
  <h1>
      User
      <small>Data User</small>
  </h1>
  <ol class="breadcrumb">
      <li><a href="{{ url("home") }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active">User</li>
  </ol>
  </section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Ganti Password User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($user,['url'=>'user/change-password/'.$user->id]) !!}
            
             <div class="box-body">
                
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Password</label>
                  {!! Form::password("password",['class'=>"form-control","placeholder"=>"Password"]) !!}
                  @if($errors->has("password"))
                      <span class="help-block">{{ $errors->first("password") }}</span>
                  @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Konfirmasi Password</label>
                  {!! Form::password("password_confirmation",['class'=>"form-control","placeholder"=>"Konfirmasi Password"]) !!}
                  @if($errors->has("password_confirmation"))
                      <span class="help-block">{{ $errors->first("password_confirmation") }}</span>
                  @endif
                </div>
                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url()->previous() }}"><button type="button" class="btn btn-default">Batal</button></a>
              </div>
            {!! Form::close() !!}
          </div>
    </div>
  </div>
</section>
@endsection
@section("js_plugins")
  <script src="{{ asset("assets/plugins/iCheck/icheck.min.js") }}"></script>
@endsection

@section("js_custom")
  <script type="text/javascript">
    $(document).ready(function() {
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });
    });

  </script>
@endsection