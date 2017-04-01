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
          <div class="box">
            <div class="box-header">

            </div>
            <div class="box-body">
              <!-- Split button -->
              <div class="button-action">
                  <span class="title-action">Tambah Customer</span>

                  <div class="margin">
                    <a href="{{ url("customer/create") }}"><button type="button" class="btn btn-primary"><i class="fa fa-fw fa-users"></i> Customer</button></a>
                  </div>
               </div>

              <div class="button-action">
                  <span class="title-action">Import Customer</span>

                  <div class="margin">
                    <a href="{{ url("customer/import") }}"><button type="button" class="btn btn-warning"><i class="fa fa-fw fa-download"></i>Import</button></a>
                  </div>
               </div>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Customer</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>NPWP</th>
                  <th>No Telepon</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($clients) > 0)
                    @foreach($clients as $client)
                        <tr>
                          <td>{{ (!empty($client->name) ? $client->name : "-") }}</td>
                          <td>{{ (!empty($client->email) ? $client->email : "-") }}</td>
                          <td>{{ (!empty($client->npwp) ? $client->npwp : "-") }}</td>
                          <td>{{ (!empty($client->phone_1) ? $client->phone_1 : "-") }}
                          <td>
                                <div class="btn-group">
                                  <button type="button" class="btn btn-primary">Aksi</button>
                                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="#" class="lihat-detail" data-id="{{ $client->id }}">Lihat Detail</a></li>
                                    <li><a href="{{ url("customer/edit/".$client->id) }}">Ubah</a></li>
                                    <li><a href="{{ url("customer/delete/".$client->id) }}" data-method="delete" data-confirm="Hapus Data Ini?" data-token="{{ csrf_token() }}">Hapus</a></li>
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
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Detail Klien</h4>
                      </div>
                      <div class="modal-body">
                        <table class="table table-bordered" >
                        
                            <tbody id="klien"></tbody>    
                        </table>
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
  $(function () { 
    $('#example2').DataTable();
  });

  $(document).ready(function() {
      $(".lihat-detail").click(function(){
          var client_id = $(this).attr("data-id");
          $.get('{{ url("customer/show/") }}/'+client_id, function(data) {
              if(data.status){
                    var name,address,phone_1,no_api,npwp,email,fax;
                    var htmlOutput ="<tr>";

                    htmlOutput += "<th width='30%'>Nama</th>";
                    if(data.client.name === null){
                        name = "-"
                    }else{
                        name = data.client.name;
                    }
                    htmlOutput += "<td>"+name+"</td><tr>";

                    htmlOutput += "<tr><th>No API</th>";
                    if(data.client.no_api === null){
                        no_api = "-"
                    }else{
                        no_api = data.client.no_api;
                    }
                    htmlOutput += "<td>"+no_api+"</td></tr>";

                    htmlOutput += "<tr><th>NPWP</th>";
                    if(data.client.npwp === null){
                        npwp = "-"
                    }else{
                        npwp = data.client.npwp;
                    }
                    htmlOutput += "<td>"+npwp+"</td></tr>";

                    htmlOutput += "<tr><th>Email</th>";
                    if(data.client.email === null){
                        email = "-"
                    }else{
                        email = data.client.email;
                    }
                    htmlOutput += "<td>"+email+"</td></tr>";

                    htmlOutput += "<tr><th>Alamat</th>";
                    if(data.client.address === null){
                        address = "-"
                    }else{
                        address = data.client.address;
                    }
                    htmlOutput += "<td>"+address+"</td></tr>";

                    htmlOutput += "<tr><th>Telepon 1</th>";
                    if(data.client.phone_1 === null){
                        phone_1 = "-"
                    }else{
                        phone_1 = data.client.phone_1;
                    }
                    htmlOutput += "<td>"+phone_1+"</td></tr>";

                    htmlOutput += "<tr><th>Fax</th>";
                    if(data.client.fax ===null){
                        fax = "-"
                    }else{
                        fax = data.client.fax;
                    }
                    htmlOutput += "<td>"+fax+"</td></tr>";

                    $("#klien").html(htmlOutput);
                    $("#myModal").modal("show");
              }
          });
      });
  });
</script>
@endsection