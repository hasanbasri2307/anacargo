@extends("layouts.cms")
@section("css_plugins")
    <link rel="stylesheet" href="{{ asset("assets/plugins/datatables/dataTables.bootstrap.css") }}">
@endsection
@section("css_custom")
    <style type="text/css">
        .button-action {
            float:left;
            margin-left: 15px;
        }

        .title-action {
            margin-left: 10px;
        }
        
    </style>
@endsection
@section("content")
<section class="content-header">
    <h1>
        CN-PIBK
        <small>Data CN-PIBK</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ url("home") }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Tracking CN-PIBK</li>
    </ol>
</section>
<section class="content">
     <div class="row">
        <div class="col-xs-12">
            <div id="notif">
            </div>
            
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
          <div class="box">
            <div class="box-header">

            </div>
            <div class="box-body">
              <!-- Split button -->
              <div class="button-action">
                  <span class="title-action">Tracking Dokumen Ini <br>(No Barang : <b>{{ $cnpibk->no_barang }}</b>)</span>

                  <div class="margin">
                    <button type="button" class="btn btn-primary" id="tracking-data"><i class="fa fa-fw fa-edit"></i> Kirim Data</button>
                  </div>
               </div>

             
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">History Tracking Dokumen No Barang : <b>{{ $cnpibk->no_barang }}</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No Barang</th>
                  <th>Tgl House Blawb</th>
                  <th>Status Code</th>
                  <th>Keterangan Respon</th>
                  <th>Waktu Rekam</th>
                </tr>
                </thead>
                <tbody>
                @if(count($tracking) > 0)
                    @foreach($tracking as $item)
                        <tr>
                          <td>{{ $cnpibk->no_barang }}</td>
                          <td>{{ $cnpibk->tgl_house_blawb }}</td>
                          <td>{{ $item->status_code->kode }}</td>
                          <td>{{ $item->ket_respon }}</td>
                          <td>{{ $item->wk_rekam }}</td>
                          
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Data Masih Kosong</td>
                    </tr>
                @endif
                    
                </tbody>
              </table>
            </div>
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
</section>
@endsection
@section("js_plugins")
    <script src="{{ asset("assets/plugins/datatables/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset("assets/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
@endsection

@section("js_custom")
    <!-- page script -->
<script>

  function kirimBeaCukai(e){
      var conf = confirm("Kirim data ini ke bea cukai ?");
      if(conf){
          var cnpibk_id = $(e).attr("data-id");

          $(e).prop("disabled",true);
          $(e).text("Sedang Proses");

          $.post('{{ url("sendpibk") }}', {cnpibk_id: cnpibk_id,_token:"{{ csrf_token() }}"}, function(data, textStatus, xhr) {
              if(data.status ===true){
                  $("#notif").html('<div class="alert alert-success"><strong>Sukses!</strong> Data berhasil dikirim ke Bea Cukai.</div>');
                  $('html, body')
                    .animate({
                        scrollTop: $("#notif").position().top
                    }, 'slow');

                    window.setTimeout(function() {
                        window.location.replace('{{ url("cnpibk") }}');
                    }, 1000);
              }else{
                  $("#notif").html('<div class="alert alert-error"><strong>Erro!</strong> Ada Kesalahan, silahkan coba lagi nanti.</div>');
                  $('html, body')
                    .animate({
                        scrollTop: $("#notif").position().top
                    }, 'slow');

                    window.setTimeout(function() {
                        window.location.replace('{{ url("cnpibk") }}');
                    }, 1000);
              }
          });
      }
      
  }


  $(document).ready(function() {
      $("#tracking-data").click(function(e){
          e.preventDefault();
          $(this).prop("disabled",true);
          $(this).text("Sedang Proses");

          $.post('{{ url("cnpibk/cekstatus") }}', {no_barang: '{{ $cnpibk->no_barang }}',tgl_house_blawb:'{{ $cnpibk->tgl_house_blawb }}',_token:"{{ csrf_token() }}",id:'{{ $cnpibk->id }}'}, function(data, textStatus, xhr) {
             if(data.status ===true){
                  $("#notif").html('<div class="alert alert-success"><strong>Sukses!</strong> Data berhasil dikirim ke Bea Cukai.</div>');
                  $('html, body')
                    .animate({
                        scrollTop: $("#notif").position().top
                    }, 'slow');

                    window.setTimeout(function() {
                        window.location.reload();
                    }, 1000);
              }else{
                  $("#notif").html('<div class="alert alert-error"><strong>Erro!</strong> Ada Kesalahan, silahkan coba lagi nanti.</div>');
                  $('html, body')
                    .animate({
                        scrollTop: $("#notif").position().top
                    }, 'slow');

                    window.setTimeout(function() {
                        window.location.reload();
                    }, 1000);
              }
          });
      });
  });
</script>
@endsection