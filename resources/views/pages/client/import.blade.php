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
			<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Import Customer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(['url'=>'customer/import','files' => true]) !!}
            
             <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputFile">Download Template EXCEL</label>
                  (<a href="{{ asset("assets/import.xlsx") }}">Download template</a>)
                </div>

                <div class="form-group has-feedback {{ $errors->has('file') ? 'has-error' : '' }}">
                  <label for="exampleInputFile">Pilih file untuk di upload</label>
                  {!! Form::file("file") !!}

                  @if($errors->has("file"))
                      <span class="help-block">{{ $errors->first("file") }}</span>
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