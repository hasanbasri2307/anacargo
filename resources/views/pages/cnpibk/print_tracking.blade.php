<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<link rel="stylesheet" href="{{ asset("assets/bootstrap/css/bootstrap.min.css") }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset("assets/font-awesome/css/font-awesome.min.css") }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset("assets/ionicons/css/ionicons.min.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("assets/dist/css/AdminLTE.min.css") }}">
</head>
<body>
	<table class="table table-bordered">
		<tr>
			<th colspan="4"><h3 align="center">PT SAYAP BIRU EKSPRESS</h3></th>
		</tr>
		<tr>
			<th colspan="4">INFORMASI TRACKING DOKUMEN CNPIBK</th>
		</tr>
		<tr>
			<th width='20%'>JENIS AJU</th>
			<td width="25%">{{ $cnpibk->aju->kode_aju }} ({{ $cnpibk->aju->nama_aju }})</td>
			<th width='20%'>JENIS PIBK</th>
			<td>{{ $cnpibk->pibk->kode_pibk }} ({{ $cnpibk->pibk->nama_pibk }})</td>
		</tr>
		<tr>
			<th width='20%'>NO BARANG</th>
			<td>{{ $cnpibk->no_barang }}</td>
			<th width='20%'>TGL MASTER BLAWB</th>
			<td>{{ !empty($cnpibk->tgl_master_blawb) ? $cnpibk->tgl_master_blawb : "-" }}</td>
		</tr>
		
	</table>

	<table class="table table-bordered">
		<tr>
			<th colspan="12">DETAIL TRACKING</th>
		</tr>
		<tr>
            <th>No Barang</th>
            <th>Tgl House Blawb</th>
            <th>Status Code</th>
            <th>Keterangan Respon</th>
            <th>Waktu Rekam</th>
        </tr>
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
		
	</table>
</body>
</html>
