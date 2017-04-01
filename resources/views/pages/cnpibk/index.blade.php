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
        <li class="active">CN-PIBK</li>
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
                  <span class="title-action">Tambah CN-PIBK</span>

                  <div class="margin">
                    <a href="{{ url("cnpibk/create") }}"><button type="button" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> CN-PIBK</button></a>
                  </div>

               </div>
               <div class="button-action">
                  <span class="title-action">Ambil Semua Respon</span>

                  <div class="margin">
                    <button type="button" class="btn btn-primary" id="ambil-semua-respon"><i class="fa fa-fw fa-edit"></i> Ambil Data</button>
                  </div>
                  
               </div>
             
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">CN-PIBK</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
              <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Jenis AJU</th>
                  <th>Kode Jenis PIBK</th>
                  <th>No Barang</th>
                  <th>Data BC</th>
                  <th>Status Dokumen</th>
                  <th>Kirim Ke BC</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($cn) > 0)
                    @foreach($cn as $item)
                        <tr>
                          <td>{{ (!empty($item->jns_aju) ? $item->aju->kode_aju.' ('.$item->aju->nama_aju.')' : "-") }}</td>
                          <td>{{ (!empty($item->kd_jns_pibk) ? $item->pibk->kode_pibk.' ('.$item->pibk->nama_pibk.')' : "-") }}</td>
                          <td>{{ (!empty($item->no_barang) ? $item->no_barang : "-") }}</td>
                          <td>
                              @if(!empty($item->no_bc11) and !empty($item->tgl_bc11) and !empty($item->no_pos_bc11) and !empty($item->no_subpos_bc11) and !empty($item->no_subsubpos_bc11))
                                  <span class="label label-success">Data BC Lengkap</span>
                              @else
                                  <span class="label label-warning">Data BC Belum Lengkap</span>
                              @endif
                          </td>

                          <td>
                              <?php
                              $history = App\StatusHistory::where(['status_code_id'=>$item->status_code_id,'cnpibk_id'=>$item->id])->first();
                              ?>
                              Status Code : {{ $item->status_code->kode }}<br> Uraian : {{ $item->status_code->uraian }}<br> Ket: {{ !empty($history->ket_respon) ? $history->ket_respon : "-" }}
                              
                          </td>
                          <td>
                            @if($item->tipe_dokumen == "cn")
                              @if($item->status_code->kode != 203)
                                <button type="button" data-id="{{ $item->id }}" class="btn btn-sm btn-danger kirim-bea-cukai" onclick="kirimBeaCukai(this)">Kirim Ke Bea Cukai</button>
                              @else
                                -
                              @endif
                            @elseif($item->tipe_dokumen == "pibk")
                              @if($item->status_code->kode != 303)
                                <button type="button" data-id="{{ $item->id }}" class="btn btn-sm btn-danger kirim-bea-cukai" onclick="kirimBeaCukai(this)">Kirim Ke Bea Cukai</button>
                              @else
                                -
                              @endif
                            @endif
                          </td>
                          <td>
                                <div class="btn-group">
                                  <button type="button" class="btn btn-primary">Aksi</button>
                                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="#" class="lihat-detail" data-id="{{ $item->id }}">Lihat Detail</a></li>
                                    <li><a href="{{ url("cnpibk/edit/".$item->id) }}">Ubah</a></li>
                                    <li><a href="{{ url("cnpibk/editbc11/".$item->id) }}">Update BC 1.1</a></li>
                                    <li><a href="{{ url("cnpibk/tracking/".$item->id) }}">Tracking</a></li>
                                    <li><a href="{{ url("cnpibk/delete/".$item->id) }}" data-method="delete" data-confirm="Hapus Data Ini?" data-token="{{ csrf_token() }}">Hapus</a></li>
                                  </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Data Masih Kosong</td>
                    </tr>
                @endif
                    
                </tbody>
              </table>

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog">
                    <div class="modal-content" style="width: 1000px;margin-left: -205px;">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Detail CNPIBK</h4>
                      </div>
                      <div class="modal-body">
                        <div id="cnpibk">
                        </div>
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Tutup</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
            <div class="box-footer clearfix">
              {{ $cn->links() }}
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
      $(".lihat-detail").click(function(){
          var cnpibk_id = $(this).attr("data-id");
          $.get('{{ url("cnpibk/show/") }}/'+cnpibk_id, function(data) {
              if(data.status){

                    $("#cnpibk").html(data.html);
                    $("#myModal").modal("show");
              }
          });
      });

      $('#ambil-semua-respon').click(function(e){
          e.preventDefault();

          $(this).prop("disabled",true);
          $(this).text("Sedang Proses");

          $.get('{{ url("cnpibk/getallresponse") }}', function(data) {
            /*optional stuff to do after success */
              if(data.status ===true){
                  $("#notif").html('<div class="alert alert-success"><strong>Sukses!</strong> Permintaan Data berhasil dikirim ke Bea Cukai.</div>');
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
      });
  });
</script>
@endsection