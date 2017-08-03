@extends("layouts.cms")
@section("css_plugins")
  <link rel="stylesheet" href="{{ asset("assets/plugins/iCheck/all.css") }}">
@endsection
@section("content")
    <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Profil User
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ url("/") }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
    <li class="active">Profil</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="{{ asset("assets/images/user1.png") }}" alt="User profile picture">

          <h3 class="profile-username text-center">{{ ucwords(Auth::user()->name) }}</h3>

          <p class="text-muted text-center">{{ ucwords(Auth::user()->type) }}</p>

          <ul class="list-group list-group-unbordered">
          	 <li class="list-group-item">
              <b>Status</b> <span class="pull-right">
              	  @if(Auth::user()->status == "active")
	                <span class="label label-primary">{{ ucwords(Auth::user()->status) }}</span>
	              @elseif(Auth::user()->status == "suspend")
	                <span class="label label-warning">{{ ucwords(Auth::user()->status) }}</span>
	              @elseif(Auth::user()->status == "deactive")
	                <span class="label label-danger">{{ ucwords(Auth::user()->status) }}</span>
	              @endif
              </span>
            </li>
            <li class="list-group-item">
              <b>Terakhir Login</b> <span class="pull-right"> {{ Auth::user()->last_login }}</span>
            </li>
            <li class="list-group-item">
              <b>Dibuat Tanggal</b> <span class="pull-right"> {{ Auth::user()->created_at }}</span>
            </li>
            <li class="list-group-item">
              <b>Terakhir Update</b> <span class="pull-right"> {{ Auth::user()->updated_at }}</span>
            </li>
          </ul>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#profil" data-toggle="tab">Profil</a></li>
          <li><a href="#ganti-password" data-toggle="tab">Ganti Password</a></li>
        </ul>
        <div class="tab-content">

          <div class="active tab-pane" id="profil">
          	<div id="notif-profile"></div> 

            {!! Form::model($user,['url'=>'user/profile','class'=>'form-horizontal','id'=>'form-profile']) !!}
              <div class="form-group has-feedback">
                <label for="inputName" class="col-sm-2 control-label">Nama</label>

                <div class="col-sm-10">
                  {!! Form::text("name",old("name"),['class'=>"form-control","placeholder"=>"Nama User"]) !!}
                  <span class="help-block"></span>
                </div>
              </div>
               <div class="form-group has-feedback">
                <label for="inputName" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                  {!! Form::email("email",old("email"),['class'=>"form-control","placeholder"=>"Email User",'disabled'=>true]) !!}
                 
                </div>
              </div>
             <div class="form-group has-feedback">
                <label for="inputName" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-10">
                  {!! Form::text("status",old("status"),['class'=>"form-control","placeholder"=>"Status",'disabled'=>true]) !!}
                 
                </div>
              </div>
             <div class="form-group has-feedback">
                <label for="inputName" class="col-sm-2 control-label">Tipe</label>

                <div class="col-sm-10">
                  {!! Form::text("type",old("type"),['class'=>"form-control","placeholder"=>"Tipe",'disabled'=>true]) !!}
                 
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary" id="submit-profile">Simpan</button>
                </div>
              </div>
            {!! Form::close() !!}
          </div>

          <div class="tab-pane" id="ganti-password">
          	<div id="notif-password"></div> 

            {!! Form::open(['url'=>'user/profile/change-password','class'=>'form-horizontal','id'=>'form-password']) !!}
              <div class="form-group has-feedback">
                <label for="inputName" class="col-sm-2 control-label">Password Lama</label>

                <div class="col-sm-10">
                  {!! Form::password("old_password",['class'=>"form-control","placeholder"=>"Password Lama"]) !!}
                   <span class="help-block"></span>
                </div>
              </div>
             <div class="form-group has-feedback">
                <label for="inputName" class="col-sm-2 control-label">Password Baru</label>

                <div class="col-sm-10">
                  {!! Form::password("password",['class'=>"form-control","placeholder"=>"Password Baru"]) !!}
                   <span class="help-block"></span>
                </div>
              </div><div class="form-group has-feedback">
                <label for="inputName" class="col-sm-2 control-label">Konfirmasi Password Baru</label>

                <div class="col-sm-10">
                  {!! Form::password("password_confirmation",['class'=>"form-control","placeholder"=>"Konfirmasi Password"]) !!}
                  <span class="help-block"></span>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary" id="submit-password">Simpan</button>
                </div>
              </div>
            {!! Form::close() !!}
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

</section>
<!-- /.content -->
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

        $("#form-profile").submit(function(e){
        	e.preventDefault();
        	$(this).find("#submit-profile").text("Sedang Proses");
        	$(this).find("#submit-profile").prop("disabled",true);

        	$.post('{{ url("user/profile") }}', $(this).serialize(), function(data, textStatus, xhr) {
        		if(data.status === false){
        			$("#form-profile").find("#submit-profile").text("Simpan");
        			$("#form-profile").find("#submit-profile").prop("disabled",false);

        			$("#form-profile").find("input[name='name']").parent().parent().addClass('has-error');
        			$("#form-profile").find("input[name='name']").parent().find(".help-block").text(data.error.name[0]);
        		}else{
        			$("#form-profile").find("#submit-profile").text("Simpan");
        			$("#form-profile").find("#submit-profile").prop("disabled",false);
        			$("#notif-profile").html('<div class="alert alert-success"><strong>Success!</strong> Berhasil ubah profil.</div>');
        		}
        	});
        });

        $("#form-password").submit(function(e){
        	e.preventDefault();
        	$(this).find("#submit-password").text("Sedang Proses");
        	$(this).find("#submit-password").prop("disabled",true);

        	$.post('{{ url("user/profile/change-password") }}', $(this).serialize(), function(data, textStatus, xhr) {
        		//reset
        		$("#form-password").find(".form-group").removeClass('has-error');
        		$("#form-password").find(".form-group").find(".help-block").text('');

        		if(data.status === false){
        			$("#form-password").find("#submit-password").text("Simpan");
        			$("#form-password").find("#submit-password").prop("disabled",false);

        			if("old_password" in data.error){
        				$("#form-password").find("input[name='old_password']").parent().parent().addClass('has-error');
        				$("#form-password").find("input[name='old_password']").parent().find(".help-block").text(data.error.old_password[0]);
        			}

        			if("password" in data.error){
        				$("#form-password").find("input[name='password']").parent().parent().addClass('has-error');
        				$("#form-password").find("input[name='password']").parent().find(".help-block").text(data.error.password[0]);
        			}

        			if("password_confirmation" in data.error){
        				$("#form-password").find("input[name='password_confirmation']").parent().parent().addClass('has-error');
        				$("#form-password").find("input[name='password_confirmation']").parent().find(".help-block").text(data.error.password_confirmation[0]);
        			}
        		}else{
        			$("#form-password").find("input[type='password']").val("");
        			$("#form-password").find("#submit-password").text("Simpan");
        			$("#form-password").find("#submit-password").prop("disabled",false);
        			$("#notif-password").html('<div class="alert alert-success"><strong>Success!</strong> Berhasil ubah password.</div>');
        		}
        	});
        });
    });

  </script>
@endsection