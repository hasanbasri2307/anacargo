@extends("layouts.cms")
@section("css_plugins")
  <link rel="stylesheet" href="{{ asset("assets/plugins/iCheck/all.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/plugins/datepicker/datepicker3.css") }}">
  <link rel="stylesheet" href="{{ asset("assets/select2/css/select2.css") }}">
@endsection
@section("content")
<section class="content-header">
	<h1>
      CN-PIBK
      <small>Data CN-PIBK</small>
  </h1>
  <ol class="breadcrumb">
      <li><a href="{{ url("home") }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
      <li class="active">CN-PIBK</li>
  </ol>
	</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
       <div id="notif">

      </div>
			<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Update BC 1.1</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::model($cnpibk,['url'=>'#','id'=>"form-update-bc"]) !!}
            
             <div class="box-body">
                 <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">No Barang</label>
                  {!! Form::text("no_barang",old("no_barang"),['class'=>"form-control","placeholder"=>"Nomor Barang",'maxlength'=>13]) !!}
                  
                      <span class="help-block"></span>
                </div>
               <div class="form-group">
                  <label>Tanggal House Blawb</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    {{ Form::text("tgl_house_blawb",old("tgl_house_blawb"),['class'=>'form-control pull-right datepicker']) }}
                     
                  </div>
                  <span class="help-block"></span>
                  <!-- /.input group -->
                </div>
                 <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Kode Gudang</label>
                  {!! Form::text("kd_gudang",old("kd_gudang"),['class'=>"form-control","placeholder"=>"Kode Gudang",'maxlength'=>4]) !!}
                  
                      <span class="help-block"></span>
                </div>
               <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">No BC11</label>
                  {!! Form::text("no_bc11",old("no_bc11"),['class'=>"form-control","placeholder"=>"No BC11",'maxlength'=>29]) !!}
                  
                  <span class="help-block"></span>
                </div>
                
                <div class="form-group">
                  <label>Tanggal BC11</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    {{ Form::text("tgl_bc11",old("tgl_bc11"),['class'=>'form-control pull-right datepicker']) }}
                     
                  </div>
                  <span class="help-block"></span>
                  <!-- /.input group -->
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">No Pos BC11</label>
                  {!! Form::text("no_pos_bc11",old("no_pos_bc11"),['class'=>"form-control","placeholder"=>"No Pos BC11",'maxlength'=>4]) !!}
                  
                   <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">No Sub Pos BC11</label>
                  {!! Form::text("no_subpos_bc11",old("no_subpos_bc11"),['class'=>"form-control","placeholder"=>"No Sub Pos BC11",'maxlength'=>4]) !!}
                  
                   <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">No Sub Sub Pos BC11</label>
                  {!! Form::text("no_subsubpos_bc11",old("no_subsubpos_bc11"),['class'=>"form-control","placeholder"=>"No Sub Sub Pos BC11",'maxlength'=>4]) !!}
                  
                   <span class="help-block"></span>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="btn_simpan">Simpan</button>
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
  <script src="{{ asset("assets/plugins/datepicker/bootstrap-datepicker.js") }}"></script>
  <script src="{{ asset("assets/select2/js/select2.js") }}"></script>
@endsection
@section("js_custom")
  <script type="text/javascript">
    $(document).ready(function() {
        $("#form-update-bc").submit(function(e){
            e.preventDefault();
            var id = "{{ $id }}";
            $("#btn_simpan").text("Sedang Proses");
            $("#btn_simpan").prop("disabled",true);

            $.ajax({
              url: '{{ url("cnpibk/updatebc") }}/'+id,
              type: 'POST',
              dataType: 'json',
              data: $(this).serialize(),
            })
            .done(function(data) {
               $(".form-group").removeClass('has-error');
               $(".form-group").find(".help-block").text("");
               $("#notif").html("");

               if(data.status === false){
                  if(data.error){
                     if("no_barang" in data.error){
                         $("input[name='no_barang']").parent().addClass('has-error');
                         $("input[name='no_barang']").parent().find("span").text(data.error.no_barang[0]);
                     }

                     if("no_bc11" in data.error){
                         $("input[name='no_bc11']").parent().addClass('has-error');
                         $("input[name='no_bc11']").parent().find("span").text(data.error.no_bc11[0]);
                        
                     }

                     if("tgl_bc11" in data.error){
                         $("input[name='tgl_bc11']").parent().parent().addClass('has-error');
                         $("input[name='tgl_bc11']").parent().parent().find("span").text(data.error.tgl_bc11[0]);
                        
                     }

                     if("no_pos_bc11" in data.error){
                         $("input[name='no_pos_bc11']").parent().addClass('has-error');
                         $("input[name='no_pos_bc11']").parent().find("span").text(data.error.no_pos_bc11[0]);
                        
                     }

                     if("no_subpos_bc11" in data.error){
                         $("input[name='no_subpos_bc11']").parent().addClass('has-error');
                         $("input[name='no_subpos_bc11']").parent().find("span").text(data.error.no_subpos_bc11[0]);
                        
                     }

                     if("no_subsubpos_bc11" in data.error){
                         $("input[name='no_subsubpos_bc11']").parent().addClass('has-error');
                         $("input[name='no_subsubpos_bc11']").parent().find("span").text(data.error.no_subsubpos_bc11[0]);
                        
                     }

                     if("tgl_house_blawb" in data.error){
                         $("input[name='tgl_house_blawb']").parent().addClass('has-error');
                         $("input[name='tgl_house_blawb']").parent().find("span").text(data.error.tgl_house_blawb[0]);
                        
                     }

                     

                     $("#notif").html('<div class="alert alert-danger"><strong>Error!</strong> Silahkan Periksa Field yang masih error.</div>');

                     $('html, body')
                          .animate({
                              scrollTop: $("#form-update-bc").position().top
                          }, 'slow');
                  }else if(data.response){
                      $("#notif").html('<div class="alert alert-danger"><strong>Error!</strong> '+data.response+'</div>');

                     $('html, body')
                          .animate({
                              scrollTop: $("#form-update-bc").position().top
                          }, 'slow');
                  }
               }else{
                  $("#notif").html('<div class="alert alert-success"><strong>Sukses!</strong> Data BC 1.1 Berhasil Diupdate.</div>');
                  $('html, body')
                    .animate({
                        scrollTop: $("#form-update-bc").position().top
                    }, 'slow');

                    window.setTimeout(function() {
                        window.location.replace('{{ url("cnpibk") }}');
                    }, 1000);
               }

               $("#btn_simpan").text("Simpan");
               $("#btn_simpan").prop("disabled",false);
            })
            .fail(function() {
              console.log("error");
            });
        });
    });
  </script>
@endsection