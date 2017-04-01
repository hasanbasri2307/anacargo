@extends("layouts.cms")
@section("content")
<section class="content-header">
	<h1>
	    Customer
	    <small>Data Customer</small>
	</h1>
	<ol class="breadcrumb">
	    <li><a href="{{ url("home") }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
	    <li class="active">Customer</li>
	</ol>
	</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Edit Customer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($client,['url'=>'custmer/update/'.$client->id]) !!}
            
             <div class="box-body">
                <div class="form-group has-feedback {{ $errors->has('no_api') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">No API</label>
                   {!! Form::text("no_api",old("no_api"),['class'=>"form-control","placeholder"=>"No API"]) !!}
                   @if($errors->has("no_api"))
                      <span class="help-block">{{ $errors->first("no_api") }}</span>
                   @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Nama</label>
                  {!! Form::text("name",old("name"),['class'=>"form-control","placeholder"=>"Nama Klien"]) !!}
                  @if($errors->has("name"))
                   		<span class="help-block">{{ $errors->first("name") }}</span>
                   @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('npwp') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">NPWP</label>
                  {!! Form::text("npwp",old("npwp"),['class'=>"form-control","placeholder"=>"NPWP Klien"]) !!}
                  @if($errors->has("npwp"))
                   		<span class="help-block">{{ $errors->first("npwp") }}</span>
                  @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Email</label>
                  {!! Form::email("email",old("email"),['class'=>"form-control","placeholder"=>"Email Klien"]) !!}
                  @if($errors->has("email"))
                   		<span class="help-block">{{ $errors->first("email") }}</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Alamat</label>
                  {!! Form::textarea("address",old("address"),['class'=>"form-control","placeholder"=>"Alamat Klien",'rows'=>5]) !!}
                  @if($errors->has("address"))
                   		<span class="help-block">{{ $errors->first("address") }}</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('phone_1') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Telepon 1</label>
                  {!! Form::number("phone_1",old("phone_1"),['class'=>"form-control","placeholder"=>"Telepon 1 Klien"]) !!}
                  @if($errors->has("phone_1"))
                   		<span class="help-block">{{ $errors->first("phone_1") }}</span>
                  @endif
                </div>
                
                 <div class="form-group {{ $errors->has('fax') ? 'has-error' : '' }}">
                  <label for="exampleInputEmail1">Fax</label>
                  {!! Form::number("fax",old("fax"),['class'=>"form-control","placeholder"=>"Fax Klien"]) !!}
                  @if($errors->has("fax"))
                   		<span class="help-block">{{ $errors->first("fax") }}</span>
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