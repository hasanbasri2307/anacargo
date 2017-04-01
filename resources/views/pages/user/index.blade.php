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
                  <span class="title-action">Tambah User</span>

                  <div class="margin">
                    <a href="{{ url("user/create") }}"><button type="button" class="btn btn-primary"><i class="fa fa-fw fa-user"></i> User</button></a>
                  </div>
               </div>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Tipe</th>
                  <th>Status</th>
                  <th>Terakhir Login</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($users) > 0)
                    @foreach($users as $user)
                        <tr>
                          <td>{{ (!empty($user->name) ? $user->name : "-") }}</td>
                          <td>{{ (!empty($user->email) ? $user->email : "-") }}</td>
                          <td>{{ (!empty($user->type) ? ucfirst($user->type) : "-") }}</td>
                          <td>
                            @if(!empty($user->status))
                              @if($user->status == "active")
                                <span class="label label-primary">{{ $user->status }}</span>
                              @elseif($user->status == "suspend")
                                <span class="label label-warning">{{ $user->status }}</span>
                              @elseif($user->status == "deactive")
                                <span class="label label-danger">{{ $user->status }}</span>
                              @endif
                            @else
                              -
                            @endif
                          </td>
                          <td>{{ (!empty($user->last_login) ? $user->last_login : "-") }}</td>
                          <td>
                                <div class="btn-group">
                                  <button type="button" class="btn btn-primary">Aksi</button>
                                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="#" class="lihat-detail" data-id="{{ $user->id }}">Lihat Detail</a></li>
                                    <li><a href="{{ url("user/edit/".$user->id) }}">Ubah</a></li>
                                    <li><a href="{{ url("user/change-password/".$user->id) }}">Ganti Password</a></li>
                                    <li><a href="{{ url("user/delete/".$user->id) }}" data-method="delete" data-confirm="Hapus Data Ini?" data-token="{{ csrf_token() }}">Hapus</a></li>
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
                        <h4 class="modal-title">Detail User</h4>
                      </div>
                      <div class="modal-body">
                        <table class="table table-bordered" >
                        
                            <tbody id="user"></tbody>    
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
          var user_id = $(this).attr("data-id");
          $.get('{{ url("user/show/") }}/'+user_id, function(data) {
              if(data.status){
                    var name,email,type,status,last_login,created_at,updated_at,deleted_at;
                    var htmlOutput ="<tr>";

                    htmlOutput += "<th width='30%'>Nama</th>";
                    if(data.user.name === null){
                        name = "-"
                    }else{
                        name = data.user.name;
                    }
                    htmlOutput += "<td>"+name+"</td><tr>";

                    htmlOutput += "<tr><th>Email</th>";
                    if(data.user.email === null){
                        email = "-"
                    }else{
                        email = data.user.email;
                    }
                    htmlOutput += "<td>"+email+"</td></tr>";

                    htmlOutput += "<tr><th>Tipe</th>";
                    if(data.user.type === null){
                        type = "-"
                    }else{
                        type = data.user.type;
                    }
                    htmlOutput += "<td>"+type+"</td></tr>";

                    htmlOutput += "<tr><th>Status</th>";
                    if(data.user.status === null){
                        status = "-"
                    }else{
                        status = data.user.status;
                        if(status == "active"){
                           status = '<span class="label label-primary">'+data.user.status+'</span>';
                        }else if(status == "suspend"){
                           status = '<span class="label label-warning">'+data.user.status+'</span>';
                        }else if(status == "deactive"){
                           status = '<span class="label label-danger">'+data.user.status+'</span>';
                        }
                    }
                    htmlOutput += "<td>"+status+"</td></tr>";

                    htmlOutput += "<tr><th>Login Terakhir</th>";
                    if(data.user.last_login === null){
                        last_login = "-"
                    }else{
                        last_login = data.user.last_login;
                    }
                    htmlOutput += "<td>"+last_login+"</td></tr>";

                    htmlOutput += "<tr><th>Dibuat Tanggal</th>";
                    if(data.user.created_at === null){
                        created_at = "-"
                    }else{
                        created_at = data.user.created_at;
                    }
                    htmlOutput += "<td>"+created_at+"</td></tr>";

                    htmlOutput += "<tr><th>Terakhir Update</th>";
                    if(data.user.updated_at === null){
                        updated_at = "-"
                    }else{
                        updated_at = data.user.updated_at;
                    }
                    htmlOutput += "<td>"+updated_at+"</td></tr>";

                    htmlOutput += "<tr><th>Dihapus Tanggal</th>";
                    if(data.user.deleted_at ===null){
                        deleted_at = "-"
                    }else{
                        deleted_at = data.user.deleted_at;
                    }
                    htmlOutput += "<td>"+deleted_at+"</td></tr>";

                    $("#user").html(htmlOutput);
                    $("#myModal").modal("show");
              }
          });
      });
  });
</script>
@endsection