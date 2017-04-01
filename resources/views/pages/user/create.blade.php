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
              <h3 class="box-title">Form Tambah User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(['url'=>'user/store']) !!}
            
             <div class="box-body">
                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Nama</label>
                  {!! Form::text("name",old("name"),['class'=>"form-control","placeholder"=>"Nama User"]) !!}
                  @if($errors->has("name"))
                   		<span class="help-block">{{ $errors->first("name") }}</span>
                   @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Email</label>
                  {!! Form::email("email",old("email"),['class'=>"form-control","placeholder"=>"Email User"]) !!}
                  @if($errors->has("email"))
                   		<span class="help-block">{{ $errors->first("email") }}</span>
                  @endif
                </div>
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
                <div class="form-group has-feedback {{ $errors->has('type') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Tipe User</label>
                    <br />
                    <label>
                      {!! Form::radio("type","admin",old("type"),['class'=>'flat-red']) !!} Admin
                    </label>
                     <label>
                      {!! Form::radio("type","staff",old("type"),['class'=>'flat-red']) !!} Staff
                    </label>

                  @if($errors->has("type"))
                      <span class="help-block">{{ $errors->first("type") }}</span>
                  @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('status') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Status</label>
                  {!! Form::select("status",["active"=>"Active","suspend"=>"Suspend","deactive"=>"Deactive"],old("status"),['class'=>'form-control']) !!}

                  @if($errors->has("status"))
                      <span class="help-block">{{ $errors->first("status") }}</span>
                  @endif
                </div>
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