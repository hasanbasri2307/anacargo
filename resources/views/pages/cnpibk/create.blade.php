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
      <form method="post" id="form_cn">
      <div class="col-xs-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah CN-PIBK</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <div class="box-body">
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">No Barang</label>
                  {!! Form::text("no_barang",old("no_barang"),['class'=>"form-control","placeholder"=>"Nomor Barang",'maxlength'=>13]) !!}
                  
                      <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Kode Kantor</label>
                  {!! Form::text("kd_kantor",Config::get("sayapbiru.kd_kantor"),['class'=>"form-control","placeholder"=>"Kode Kantor",'maxlength'=>6,'readonly']) !!}
                  
                      <span class="help-block"></span>
                </div>
                
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">No Flight</label>
                  {!! Form::text("no_flight",old("no_flight"),['class'=>"form-control","placeholder"=>"No Flight",'maxlength'=>10]) !!}
                  
                      <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Kode Pelabuhan Muat</label>
                  {!! Form::text("kd_pel_muat",old("kd_pel_muat"),['class'=>"form-control","placeholder"=>"Kode Pelabuhan Muat",'maxlength'=>5]) !!}
                  
                      <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Kode Pelabuhan Bongkar</label>
                  {!! Form::text("kd_pel_bongkar",old("kd_pel_bongkar"),['class'=>"form-control","placeholder"=>"Kode Pelabuhan Bongkar",'maxlength'=>5]) !!}
                  
                      <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Kode Gudang</label>
                  {!! Form::text("kd_gudang",old("kd_gudang"),['class'=>"form-control","placeholder"=>"Kode Gudang",'maxlength'=>4]) !!}
                  
                      <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">No Invoice</label>
                  {!! Form::text("no_invoice",old("no_invoice"),['class'=>"form-control","placeholder"=>"Nomor Invoice",'maxlength'=>20]) !!}
                  
                      <span class="help-block"></span>
                </div>
                <div class="form-group">
                  <label>Tanggal Invoice</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    {{ Form::text("tgl_invoice",old("tgl_invoice"),['class'=>'form-control pull-right datepicker']) }}
                     
                  </div>
                  <span class="help-block"></span>
                  <!-- /.input group -->
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Kode Negara Asal</label>
                  {!! Form::text("kd_negara_asal",old("kd_negara_asal"),['class'=>"form-control","placeholder"=>"Kode Negara Asal",'maxlength'=>2]) !!}
                  
                      <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Jumlah Barang</label>
                  {!! Form::text("jml_barang",old("jml_barang"),['class'=>"form-control","placeholder"=>"Jumlah Barang",'maxlength'=>2]) !!}
                  
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
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">No Master Blawb</label>
                  {!! Form::text("no_master_blawb",old("no_master_blawb"),['class'=>"form-control","placeholder"=>"No Master Blawb",'maxlength'=>30]) !!}
                  
                   <span class="help-block"></span>
                </div>
                 <div class="form-group">
                  <label>Tanggal Master Blawb</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    {{ Form::text("tgl_master_blawb",old("tgl_master_blawb"),['class'=>'form-control pull-right datepicker']) }}
                     
                  </div>
                  <span class="help-block"></span>
                  <!-- /.input group -->
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">No House Blawb</label>
                  {!! Form::text("no_house_blawb",old("no_house_blawb"),['class'=>"form-control","placeholder"=>"No House Blawb",'maxlength'=>30]) !!}
                  
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
                  <label for="exampleInputEmail1">Kode Valas</label>
                  {!! Form::text("kd_valas",old("kd_valas"),['class'=>"form-control","placeholder"=>"Kode Valas",'maxlength'=>3]) !!}
                  
                   <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">NDPBM</label>
                  {!! Form::text("ndpbm",old("ndpbm"),['class'=>"form-control","placeholder"=>"NDPBM"]) !!}
                  
                   <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">FOB</label>
                  {!! Form::text("fob",old("fob"),['class'=>"form-control","placeholder"=>"FOB"]) !!}
                  
                   <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Asuransi</label>
                  {!! Form::text("asuransi",old("fob"),['class'=>"form-control","placeholder"=>"Asuransi"]) !!}
                  
                   <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Freight</label>
                  {!! Form::text("freight",old("freight"),['class'=>"form-control","placeholder"=>"Freight"]) !!}
                  
                   <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">CIF</label>
                  {!! Form::text("cif",old("cif"),['class'=>"form-control","placeholder"=>"CIF"]) !!}
                  
                   <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Netto</label>
                  {!! Form::text("netto",old("netto"),['class'=>"form-control","placeholder"=>"Netto"]) !!}
                  
                   <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Bruto</label>
                  {!! Form::text("bruto",old("bruto"),['class'=>"form-control","placeholder"=>"Bruto"]) !!}
                  
                   <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Total Dibayar</label>
                  {!! Form::text("tot_dibayar",old("tot_dibayar"),['class'=>"form-control","placeholder"=>"Total Dibayar"]) !!}
                  
                   <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">NPWP Billing</label>
                  {!! Form::text("npwp_billing",old("npwp_billing"),['class'=>"form-control","placeholder"=>"NPWP Billing",'maxlength'=>15]) !!}
                  
                   <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Nama Billing</label>
                  {!! Form::text("nama_billing",old("nama_billing"),['class'=>"form-control","placeholder"=>"Nama Billing",'maxlength'=>60]) !!}
                  
                   <span class="help-block"></span>
                </div>

            </div>
                
              <!-- /.box-body -->
            
        </div>
      </div>
      <div class="col-xs-4">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Jenis AJU</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
             <div class="box-body">
                <div class="form-group">
                  <label>Kode AJU</label>
                  {!! Form::select("jns_aju",$jenis_aju,null,['class'=>'form-control select2']) !!}
                </div>
               
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Jenis PIBK</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
             <div class="box-body">
                <div class="form-group">
                  <label>Kode PIBK</label>
                  {!! Form::select("kd_jns_pibk",$jenis_pibk,null,['class'=>'form-control select2']) !!}
                </div>
               
                
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Jenis Angkut</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
             <div class="box-body">
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Kode Jenis Angkut</label>
                  {!! Form::text("kd_jns_angkut",Config::get("sayapbiru.kd_jenis_angkut"),['class'=>"form-control","placeholder"=>"Kode Jenis Angkut",'readonly'=>true]) !!}
                  
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Nama Pengangkut</label>
                  {!! Form::text("nm_pengangkut",old("nm_pengangkut"),['class'=>"form-control","placeholder"=>"Nama Pengangkut",'maxlength'=>100]) !!}
                  
                      <span class="help-block"></span>
                </div>
                
            </div>
            
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pengirim</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
             <div class="box-body">
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Kode Negara Pengirim</label>
                  {!! Form::text("kd_negara_pengirim",old("kd_negara_pengirim"),['class'=>"form-control","placeholder"=>"Kode Negara Pengirim",'maxlength'=>2]) !!}
                  
                   <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Nama Pengirim</label>
                  {!! Form::text("nm_pengirim",old("nm_pengirim"),['class'=>"form-control","placeholder"=>"Nama Pengirim",'maxlength'=>60]) !!}
                  
                   <span class="help-block"></span>
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Alamat Pengirim</label>
                  {!! Form::textarea("al_pengirim",old("al_pengirim"),['class'=>"form-control","placeholder"=>"Alamat Pengirim",'rows'=>3]) !!}
                  
                   <span class="help-block"></span>
                </div>
                
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Penerima</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
             <div class="box-body">
                <div class="form-group">
                  <label>Jenis ID Penerima</label>
                  <select name="jns_id_penerima" class="form-control select2">
                      <option disabled selected value> -- Pilih -- </option>
                      @foreach($jenis_id as $item)
                        <option value="{{ $item->id }}">{{ $item->jns_id }} - {{ $item->nama }}</option>
                      @endforeach
                  </select> 
                  
                </div>
                <div class="form-group">
                  <label>Pilih Penerima</label>
                  <select name="customer_id" class="form-control select2">
                      <option disabled selected value> -- Pilih -- </option>
                      @foreach($customer as $key => $item)
                        <option value="{{ $key }}">{{ $item }}</option>
                      @endforeach
                  </select> 
                  
                 
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">No ID Penerima</label>
                  {!! Form::text("no_id_penerima",old("no_id_penerima"),['class'=>"form-control","placeholder"=>"No ID Penerima",'readonly'=>true]) !!}
                  
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Nama Penerima</label>
                  {!! Form::text("nm_penerima",old("nm_penerima"),['class'=>"form-control","placeholder"=>"Nama Penerima",'readonly'=>true]) !!}
                  
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Telepon Penerima</label>
                  {!! Form::text("telp_penerima",old("telp_penerima"),['class'=>"form-control","placeholder"=>"Telepon Penerima",'readonly'=>true]) !!}
                 
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Alamat Penerima</label>
                  {!! Form::textarea("al_penerima",old("al_penerima"),['class'=>"form-control","placeholder"=>"Alamat Penerima",'rows'=>3,'readonly'=>true]) !!}
                </div>
                
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pemberitahu</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
             <div class="box-body">
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Jenis ID Pemberitahu</label>
                  {!! Form::text("jns_id_pemberitahu",Config::get("sayapbiru.jenis_id_pemberitahu"),['class'=>"form-control","placeholder"=>"Jenis ID Pemberitahu",'readonly'=>true]) !!}
                  
                </div>
                
               
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">No ID Pemberitahu</label>
                  {!! Form::text("no_id_pemberitahu",Config::get("sayapbiru.no_id_pemberitahu"),['class'=>"form-control","placeholder"=>"No ID Pemberitahu",'readonly'=>true]) !!}
                  
                </div>
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Nama Pemberitahu</label>
                  {!! Form::text("nm_pemberitahu",Config::get("sayapbiru.nm_pemberitahu"),['class'=>"form-control","placeholder"=>"Nama Pemberitahu",'readonly'=>true]) !!}
                  
                </div>
              
                <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">Alamat Pemberitahu</label>
                  {!! Form::textarea("al_pemberitahu",Config::get("sayapbiru.alamat_pemberitahu"),['class'=>"form-control","placeholder"=>"Alamat Pemberitahu",'rows'=>3,'readonly'=>true]) !!}
                </div>
                 <div class="form-group has-feedback">
                  <label for="exampleInputEmail1">No Izin Pemberitahu</label>
                  {!! Form::text("no_izin_pemberitahu",Config::get("sayapbiru.no_izin_pemberitahu"),['class'=>"form-control","placeholder"=>"No Izin Pemberitahu",'readonly'=>true]) !!}
                 
                </div>
                <div class="form-group">
                  <label>Tanggal Izin Pemberitahu</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    {{ Form::text("tgl_izin_pemberitahu",Config::get("sayapbiru.tgl_izin_pemberitahu"),['class'=>'form-control pull-right','readonly'=>true]) }}
                     
                  </div>
                  <span class="help-block"></span>
                  <!-- /.input group -->
                </div>
                
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Header Pungutan</h3>
              <div class="col-xs-4 pull-right">
                    <button class="btn btn-primary pull-right" id="tambah_header" type="buton">Tambah Header</button>
              </div>
            </div>
            
            <!-- /.box-header -->
            <!-- form start -->
            
             <div class="box-body"> 
                <table class="table table-bordered" id="header_pungutan">
                  <tr>
                    <th>Kode Pungutan</th>

                    <th>Nilai</th>
                    <th></th>
                  </tr>
                  
               
              </table>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Detil Barang</h3>
              <div class="col-xs-4 pull-right">
                    <button class="btn btn-primary pull-right" id="tambah_barang" type="button">Tambah Barang</button>
              </div>
            </div>
            
            <!-- /.box-header -->
            <!-- form start -->
            
             <div class="box-body table-responsive"> 
                <table class="table table-bordered" id="detail_barang" style="width: 2000px;" >
                  <tr>

                    <th>Tambah Pungutan</th>
                    <th>Seri Brg</th>
                    <th>HS Kode</th>
                    <th>UR Brg</th>
                    <th>Kd Negara Asal</th>
                    <th>Jml Kms</th>
                    <th>Jns Kms</th>
                    <th>CIF</th>
                    <th>Kd Sat Hrg</th>
                    <th>Jml Sat Hrg</th>
                    <th>FL Bebas</th>
                    <th>No SKep</th>
                    <th>Tgl SKep</th>
                    <th></th>
                  </tr>
                  
               
              </table>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Detil Pungutan</h3>
             
            </div>
            
            <!-- /.box-header -->
            <!-- form start -->
            
             <div class="box-body table-responsive"> 
                <table class="table table-bordered" id="detail_pungutan" >
                  <tr>
                    <th>Seri Brg</th>
                    <th>HS Code</th>
                    <th>Kode Pungutan</th>
                    <th>Nilai</th>
                    <th>Jenis Tarif</th>
                    <th>Kd Tarif</th>
                    <th>Kd Sat Tarif</th>
                    <th>Jml Sat</th>
                    <th>Tarif</th>
                    <th></th>
                  </tr>
                  
               
              </table>
            </div>
        </div>
    </div>

    <div class="col-xs-12">
          <div class="box box-primary">
              <div class="box-footer">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary" id="btn_simpan">Simpan</button>
                <a href="{{ url()->previous() }}"><button type="button" class="btn btn-default">Batal</button></a>
              </div>
          </div>
    </div>
    {!! Form::close() !!}
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

    function check_seri(e){

        if($(e).val().length > 0 && $(e).parent().parent().find(".hs-code").val().length > 0){
          
            $(e).parent().parent().find(".tambah_pungutan").prop("disabled",false);
        }else{
           $(e).parent().parent().find(".tambah_pungutan").prop("disabled",true);
        }
    }

    function check_hs(e){
        if($(e).val().length > 0 && $(e).parent().parent().find(".seri-brg").val().length > 0){
          
            $(e).parent().parent().find(".tambah_pungutan").prop("disabled",false);
        }else{
           $(e).parent().parent().find(".tambah_pungutan").prop("disabled",true);
        }
    }

    function tambah_pungutan(e){
       
        var $headerpungutan = $("#header_pungutan");
        var count = $("#header_pungutan tr").length;

        for(var i=1;i<count;i++){
            var tr_start = i+1;
            var $detail_pungutan ='<tr>'+
                             '<td><input type="text" value="'+$(e).parent().parent().find('.seri-brg').val()+'" class="form-control seri-brg-detail" name="seri-brg-detail[]" readonly></td>'+
                             '<td><input type="text" value="'+$(e).parent().parent().find('.hs-code').val()+'" class="form-control hs-code-detail" name="hs-code-detail[]" readonly></td>'+
                             '<td><input type="hidden" name="kd_pungutan_detail[]" value="'+$('#header_pungutan tr:nth-child('+tr_start+')').find(".kd-pungutan").val()+'" class="kd_pungutan_detail"><input type="text" value="'+$('#header_pungutan tr:nth-child('+tr_start+')').find(".kd-pungutan :selected").text()+'" class="form-control" readonly></td>'+
                             '<td><input type="text" value="'+$('#header_pungutan tr:nth-child('+tr_start+')').find(".nilai").val()+'" class="form-control" name="nilai_detail[]" readonly></td>'+
                             '<td>{!! Form::text("jenis_tarif_detail[]",old("jenis_tarif_detail"),['class'=>"form-control","placeholder"=>"Jenis Tarif"]) !!}</td>'+
                             '<td>{!! Form::select("kd_tarif_detail[]",$jenis_tarif,null,['class'=>'form-control']) !!}</td>'+
                             '<td>{!! Form::text("kd_sat_tarif_detail[]",old("kd_sat_tarif_detail"),['class'=>"form-control","placeholder"=>"Kode Satuan Tarif"]) !!}</td>'+
                             '<td>{!! Form::text("jml_sat_detail[]",old("jml_sat_detail"),['class'=>"form-control","placeholder"=>"Jumlah Satuan"]) !!}</td>'+
                             '<td> {!! Form::text("tarif_detail[]",old("tarif_detail"),['class'=>"form-control","placeholder"=>"Tarif"]) !!}</td>'+
                             
                            '</tr>';
            $("#detail_pungutan").append($detail_pungutan);
        }
  
        $("#detail_pungutan").append(detail_pungutan);
    }

    function hapus_detail_barang(e){
        var conf = confirm("hapus data ini ?");
        if(conf){
            $("#detail_pungutan tr").each(function() {
                $this = $(this);
                if($this.find(".seri-brg-detail").val() == $(e).parent().parent().find(".seri-brg").val()){
                   $this.remove();
                }
            });

            $(e).parent().parent().remove();
        } 
    }

    function hapus_header_pungutan(e){
       var conf = confirm("hapus data ini ?");
        if(conf){
          $("#detail_pungutan tr").each(function() {
              $this = $(this);

              if($this.find(".kd_pungutan_detail").val() == $(e).parent().parent().find(".kd-pungutan").val()){
                 
                 $this.remove();
              }
          });

          $(e).parent().parent().remove();
            
        } 
    }

    $(document).ready(function() {
        $(".select2").select2();

        $('.datepicker').datepicker({
            format:"yyyy/mm/dd"
        });

        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        $("select[name='customer_id']").change(function(){
         
            $.get('{{ url("customer/get") }}/'+$(this).val(), function(data) {
             
                $("input[name='no_id_penerima']").val(data.data.npwp);
                $("input[name='nm_penerima']").val(data.data.name);
                $("input[name='telp_penerima'").val(data.data.phone_1);
                $("textarea[name='al_penerima'").val(data.data.address);
            });
        });

        $("select[name='kd_jns_angkut']").change(function(){
         
            $.get('{{ url("jenisAngkutan/get") }}/'+$(this).val(), function(data) {
             
                $("input[name='nm_jenis_angkut']").val(data.data.nama_angkutan);
            });
        });

        $("#tambah_header").click(function(e){
            e.preventDefault();
            // var $tr = $('#header_pungutan tr').eq(1).clone();
            var htmlTr = '<tr>'+
                            '<td>{!! Form::select('kd_pungutan[]',$jenis_pungutan,null,['class'=>'form-control kd-pungutan']) !!}</td>'+

                            '<td>{!! Form::text("nilai[]",old("nilai"),['class'=>'form-control nilai','placeholder'=>"Nilai"]) !!}</td>'+
                            '<td><button class="btn btn-danger hapus" type="button" onclick="hapus_header_pungutan(this)">Hapus</button></td>'+
                        '</tr>';
            
            $("#header_pungutan").append(htmlTr);
        });

        //  

        $("#tambah_barang").click(function(e){
            e.preventDefault();
            var $htmlTr = $('<tr>'+
                    '<td><button type="button" class="btn btn-primary tambah_pungutan" disabled="true" onclick="tambah_pungutan(this)">Tambah Pungutan</button></td>'+
                    '<td>{!! Form::text("seri_brg[]",old("seri_brg"),['class'=>"form-control seri-brg","placeholder"=>"Seri Barang",'maxlength'=>6,'onkeyup'=>'check_seri(this)']) !!}</td>'+
                    '<td>{!! Form::text("hs_code[]",old("hs_code"),['class'=>"form-control hs-code","placeholder"=>"HS Code",'maxlength'=>12,'onkeyup'=>'check_hs(this)']) !!}</td>'+
                    '<td>{!! Form::textarea("ur_brg[]",old("ur_brg"),['class'=>"form-control","placeholder"=>"Uraian Barang",'maxlength'=>140,'rows'=>3,'cols'=>20]) !!}</td>'+
                    '<td>{!! Form::text("kd_neg_asal[]",old("kd_neg_asal"),['class'=>"form-control","placeholder"=>"Kode Negara Asal",'maxlength'=>2]) !!}</td>'+
                    '<td>{!! Form::text("jml_kms[]",old("jml_kms"),['class'=>"form-control","placeholder"=>"Jumlah Kemasan"]) !!}</td>'+
                    '<td>{!! Form::text("jns_kms[]",old("jns_kms"),['class'=>"form-control","placeholder"=>"Jenis Kemasan",'maxlength'=>2]) !!}</td>'+
                    '<td>{!! Form::text("cif_detail[]",old("cif"),['class'=>"form-control","placeholder"=>"CIF"]) !!}</td>'+
                    '<td>{!! Form::text("kd_sat_hrg[]",old("kd_sat_hrg"),['class'=>"form-control","placeholder"=>"Kode Satuan Harga",'maxlength'=>3]) !!}</td>'+
                    '<td>{!! Form::text("jml_sat_hrg[]",old("jml_sat_hrg"),['class'=>"form-control","placeholder"=>"Jumlah Satuan Harga"]) !!}</td>'+
                    '<td>{!! Form::text("fl_bebas[]",old("fl_bebas"),['class'=>"form-control","placeholder"=>"FL Bebas",'maxlength'=>1]) !!}</td>'+
                    '<td>{!! Form::text("no_skep[]",old("no_skep"),['class'=>"form-control","placeholder"=>"No SKep",'maxlength'=>30]) !!}</td>'+
                    '<td>{!! Form::text("tgl_skep[]",old("tgl_skep"),['class'=>"form-control datepicker","placeholder"=>"Tgl SKep"]) !!}</td>'+
                    '<td><button class="btn btn-danger hapus" type="button" onclick="hapus_detail_barang(this)">Hapus</button></td>'+
                  '</tr>');

            $htmlTr.find(".datepicker").datepicker();
            $("#detail_barang").append($htmlTr);
        });

        $("#form_cn").submit(function(e){
            e.preventDefault();
            
            $("#btn_simpan").text("Sedang Proses");
            $("#btn_simpan").prop("disabled",true);

            $.ajax({
              url: '{{ url("cnpibk/store") }}',
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

                     if("kd_kantor" in data.error){
                         $("input[name='kd_kantor']").parent().addClass('has-error');
                         $("input[name='kd_kantor']").parent().find("span").text(data.error.kd_kantor[0]);
                         
                     }

                     if("nm_pengangkut" in data.error){
                         $("input[name='nm_pengangkut']").parent().addClass('has-error');
                         $("input[name='nm_pengangkut']").parent().find("span").text(data.error.nm_pengangkut[0]);
                         
                     }

                     if("no_flight" in data.error){
                         $("input[name='no_flight']").parent().addClass('has-error');
                         $("input[name='no_flight']").parent().find("span").text(data.error.no_flight[0]);
                        
                     }

                     if("kd_pel_muat" in data.error){
                         $("input[name='kd_pel_muat']").parent().addClass('has-error');
                         $("input[name='kd_pel_muat']").parent().find("span").text(data.error.kd_pel_muat[0]);
                         
                     }

                     if("kd_pel_bongkar" in data.error){
                         $("input[name='kd_pel_bongkar']").parent().addClass('has-error');
                         $("input[name='kd_pel_bongkar']").parent().find("span").text(data.error.kd_pel_bongkar[0]);
                       
                     }

                     if("kd_gudang" in data.error){
                         $("input[name='kd_gudang']").parent().addClass('has-error');
                         $("input[name='kd_gudang']").parent().find("span").text(data.error.kd_gudang[0]);
                        
                     }

                     if("kd_negara_asal" in data.error){
                         $("input[name='kd_negara_asal']").parent().addClass('has-error');
                         $("input[name='kd_negara_asal']").parent().find("span").text(data.error.kd_negara_asal[0]);
                        
                     }

                     if("jml_barang" in data.error){
                         $("input[name='jml_barang']").parent().addClass('has-error');
                         $("input[name='jml_barang']").parent().find("span").text(data.error.jml_barang[0]);
                        
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

                     if("kd_negara_pengirim" in data.error){
                         $("input[name='kd_negara_pengirim']").parent().addClass('has-error');
                         $("input[name='kd_negara_pengirim']").parent().find("span").text(data.error.kd_negara_pengirim[0]);
                        
                     }

                     if("nm_pengirim" in data.error){
                         $("input[name='nm_pengirim']").parent().addClass('has-error');
                         $("input[name='nm_pengirim']").parent().find("span").text(data.error.nm_pengirim[0]);
                        
                     }

                     if("al_pengirim" in data.error){
                         $("textarea[name='al_pengirim']").parent().addClass('has-error');
                         $("textarea[name='al_pengirim']").parent().find("span").text(data.error.al_pengirim[0]);
                        
                     }

                     if("nm_penerima" in data.error){
                         $("input[name='nm_penerima']").parent().addClass('has-error');
                         $("input[name='nm_penerima']").parent().find("span").text(data.error.nm_penerima[0]);
                        
                     }

                     if("al_penerima" in data.error){
                         $("textarea[name='al_penerima']").parent().addClass('has-error');
                         $("textarea[name='al_penerima']").parent().find("span").text(data.error.al_penerima[0]);
                        
                     }

                     if("jns_id_pemberitahu" in data.error){
                         $("input[name='jns_id_pemberitahu']").parent().addClass('has-error');
                         $("input[name='jns_id_pemberitahu']").parent().find("span").text(data.error.jns_id_pemberitahu[0]);
                        
                     }

                     if("kd_valas" in data.error){
                         $("input[name='kd_valas']").parent().addClass('has-error');
                         $("input[name='kd_valas']").parent().find("span").text(data.error.kd_valas[0]);
                        
                     }

                     if("cif" in data.error){
                         $("input[name='cif']").parent().addClass('has-error');
                         $("input[name='cif']").parent().find("span").text(data.error.cif[0]);
                        
                     }

                     if("netto" in data.error){
                         $("input[name='netto']").parent().addClass('has-error');
                         $("input[name='netto']").parent().find("span").text(data.error.netto[0]);
                        
                     }

                     if("bruto" in data.error){
                         $("input[name='bruto']").parent().addClass('has-error');
                         $("input[name='bruto']").parent().find("span").text(data.error.bruto[0]);
                        
                     }

                     if("npwp_billing" in data.error){
                         $("input[name='npwp_billing']").parent().addClass('has-error');
                         $("input[name='npwp_billing']").parent().find("span").text(data.error.npwp_billing[0]);
                        
                     }

                     $("#notif").html('<div class="alert alert-danger"><strong>Error!</strong> Silahkan Periksa Field yang masih error.</div>');

                     $('html, body')
                          .animate({
                              scrollTop: $("input[name='no_barang']").position().top
                          }, 'slow');
                  }
               }else{
                  $("#notif").html('<div class="alert alert-success"><strong>Sukses!</strong> Data Berhasil Dimasukkan.</div>');
                  $('html, body')
                    .animate({
                        scrollTop: $("input[name='no_barang']").position().top
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