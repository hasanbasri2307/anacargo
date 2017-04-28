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
			<th colspan="4"><h3 align="center">{{ Config::get("sayapbiru.company_name") }}</h3></th>
		</tr>
		<tr>
			<th colspan="4">INFORMASI CN-PIBK</th>
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
			<th width='20%'>KODE KANTOR</th>
			<td>{{ $cnpibk->kd_kantor }}</td>
		</tr>
		<tr>
			<th width='20%'>JENIS ANGKUT</th>
			<td>{{ $cnpibk->jenis_angkut->kode_angkutan }} ({{ $cnpibk->jenis_angkut->nama_angkutan }})</td>
			<th width='20%'>Nm Pengangkut</th>
			<td>{{ $cnpibk->nm_pengangkut }}</td>
		</tr>
		<tr>
			<th width='20%'>NO FLIGHT</th>
			<td>{{ $cnpibk->no_flight }}</td>
			<th width='20%'>KD PEL MUAT</th>
			<td>{{ $cnpibk->kd_pel_muat }}</td>
		</tr>

		<tr>
			<th width='20%'>KD PEL BONGKAR</th>
			<td>{{ $cnpibk->kd_pel_bongkar }}</td>
			<th width='20%'>KD GUDANG</th>
			<td>{{ $cnpibk->kd_gudang }}</td>
		</tr>
		<tr>
			<th width='20%'>NO INVOICE</th>
			<td>{{ !empty($cnpibk->no_invoice) ? $cnpibk->no_invoice : "-" }}</td>
			<th width='20%'>TGL INVOICE</th>
			<td>{{ !empty($cnpibk->tgl_invoice) ? $cnpibk->tgl_invoice : "-" }}</td>
		</tr>
		<tr>
			<th width='20%'>KD NEG ASAL</th>
			<td>{{ $cnpibk->kd_negara_asal }}</td>
			<th width='20%'>JML BARANG</th>
			<td>{{ $cnpibk->jml_barang }}</td>
		</tr>
		<tr>
			<th width='20%'>NO BC 1.1</th>
			<td>{{ !empty($cnpibk->no_bc11) ? $cnpibk->no_bc11 : "-" }}</td>
			<th width='20%'>TGL BC 1.1</th>
			<td>{{ !empty($cnpibk->tgl_bc11) ? $cnpibk->tgl_bc11 : "-" }}</td>
		</tr>
		<tr>
			<th width='20%'>NO POS BC 1.1</th>
			<td>{{ !empty($cnpibk->no_pos_bc11) ? $cnpibk->no_pos_bc11 : "-" }}</td>
			<th width='20%'>NO SUB POS BC 1.1</th>
			<td>{{ !empty($cnpibk->no_subpos_bc11) ? $cnpibk->no_subpos_bc11 : "-" }}</td>
		</tr>
		<tr>
			<th width='20%'>NO SUB SUB POS BC 1.1</th>
			<td>{{ !empty($cnpibk->no_subsubpos_bc11) ? $cnpibk->no_subsubpos_bc11 : "-" }}</td>
			<th width='20%'>NO MASTER BLAWB</th>
			<td>{{ !empty($cnpibk->no_master_blawb) ? $cnpibk->no_master_blawb : "-" }}</td>
		</tr>
		<tr>
			<th width='20%'>TGL MASTER BLAWB</th>
			<td>{{ !empty($cnpibk->tgl_master_blawb) ? $cnpibk->tgl_master_blawb : "-" }}</td>
			<th width='20%'>NO HOUSE BLAWB</th>
			<td>{{ !empty($cnpibk->no_house_blawb) ? $cnpibk->no_house_blawb : "-" }}</td>
		</tr>
		<tr>
			<th width='20%'>TGL HOUSE BLAWB</th>
			<td>{{ !empty($cnpibk->tgl_house_blawb) ? $cnpibk->tgl_house_blawb : "-" }}</td>
			<th width='20%'>KD NEG PENGIRIM</th>
			<td>{{ $cnpibk->kd_negara_pengirim }}</td>
		</tr>
		<tr>
			<th width='20%'>NM PENGIRIM</th>
			<td>{{ $cnpibk->nm_pengirim }}</td>
			<th width='20%'>AL PENGIRIM</th>
			<td>{{ $cnpibk->al_pengirim }}</td>
		</tr>
		<tr>
			<th width='20%'>JNS ID PENERIMA</th>
			<td>{{ $cnpibk->id_penerima->jns_id }} ({{ $cnpibk->id_penerima->nama }})</td>
			<th width='20%'>NO ID PENERIMA</th>
			<td>{{ $cnpibk->customer->npwp }}</td>
		</tr>
		<tr>
			<th width='20%'>NM PENERIMA</th>
			<td>{{ $cnpibk->customer->name }}</td>
			<th width='20%'>AL PENERIMA</th>
			<td>{{ $cnpibk->customer->address }}</td>
		</tr>
		<tr>
			<th width='20%'>TELP PENERIMA</th>
			<td>{{ $cnpibk->customer->phone_1 }}</td>
			<th width='20%'>JNS ID PEMBERITAHU</th>
			<td>{{ $cnpibk->id_pemberitahu->jns_id }} ({{ $cnpibk->id_pemberitahu->nama }})</td>
		</tr>
		<tr>
			<th width='20%'>NM PEMBERITAHU</th>
			<td>{{ $cnpibk->nm_pemberitahu }}</td>
			<th width='20%'>AL PEMBERITAHU</th>
			<td>{{ $cnpibk->al_pemberitahu }}</td>
		</tr>
		<tr>
			<th width='20%'>NO IZIN PEMBERITAHU</th>
			<td>{{ $cnpibk->no_izin_pemberitahu }}</td>
			<th width='20%'>TGL IZIN PEMBERITAHU</th>
			<td>{{ $cnpibk->tgl_izin_pemberitahu }}</td>
		</tr>
		<tr>
			<th width='20%'>KD VALAS</th>
			<td>{{ $cnpibk->kd_valas }}</td>
			<th width='20%'>NDPBM</th>
			<td>{{ !empty($cnpibk->ndpbm) ? $cnpibk->ndpbm : "-" }}</td>
		</tr>
		<tr>
			<th width='20%'>FOB</th>
			<td>{{ !empty($cnpibk->fob) ? $cnpibk->fob : "-" }}</td>
			<th width='20%'>ASURANSI</th>
			<td>{{ !empty($cnpibk->asuransi) ? $cnpibk->asuransi : "-" }}</td>
		</tr>
		<tr>
			<th width='20%'>FREIGHT</th>
			<td>{{ !empty($cnpibk->freight) ? $cnpibk->freight : "-" }}</td>
			<th width='20%'>CIF</th>
			<td>{{ !empty($cnpibk->cif) ? $cnpibk->cif : "-" }}</td>
		</tr>
		<tr>
			<th width='20%'>NETTO</th>
			<td>{{ !empty($cnpibk->netto) ? $cnpibk->netto : "-" }}</td>
			<th width='20%'>BRUTO</th>
			<td>{{ !empty($cnpibk->bruto) ? $cnpibk->bruto : "-" }}</td>
		</tr>
		<tr>
			<th width='20%'>TOTAL DIBAYAR</th>
			<td>{{ !empty($cnpibk->tot_dibayar) ? $cnpibk->tot_dibayar : "-" }}</td>
			<th width='20%'>NPWP BILLING</th>
			<td>{{ !empty($cnpibk->npwp_billing) ? $cnpibk->npwp_billing : "-" }}</td>
		</tr>
		<tr>
			<th width='20%'>NAMA BILLING</th>
			<td>{{ !empty($cnpibk->nama_billing) ? $cnpibk->nama_billing : "-" }}</td>
			<th width='20%'></th>
			<td></td>
		</tr>
	</table>

	<table class="table table-bordered">
		<tr>
			<th colspan="12">DETAIL BARANG</th>
		</tr>
		<tr>
			<td>SERI BRG</td>
			<td>HS CODE</td>
			<td>UR BRG</td>
			<td>KD NEG ASAL</td>
			<td>JML KMS</td>
			<td>JNS KMS</td>
			<td>CIF</td>
			<td>KD SAT HRG</td>
			<td>JML SAT HRG</td>
			<td>FL BEBAS</td>
			<td>NO SKEP</td>
			<td>TGL SKEP</td>
		</tr>
		@foreach($cnpibk->detail_barang as $item)
			<tr>
				<td>{{ !empty($item->seri_brg) ? $item->seri_brg : "-" }}</td>
				<td>{{ !empty($item->hs_code) ? $item->hs_code : "-" }}</td>
				<td>{{ !empty($item->ur_brg) ? $item->ur_brg : "-" }}</td>
				<td>{{ !empty($item->kd_neg_asal) ? $item->kd_neg_asal : "-" }}</td>
				<td>{{ !empty($item->jml_kms) ? $item->jml_kms : "-" }}</td>
				<td>{{ !empty($item->jns_kms) ? $item->jns_kms : "-" }}</td>
				<td>{{ !empty($item->cif) ? $item->cif : "-" }}</td>
				<td>{{ !empty($item->kd_sat_hrg) ? $item->kd_sat_hrg : "-" }}</td>
				<td>{{ !empty($item->jml_sat_hrg) ? $item->jml_sat_hrg : "-" }}</td>
				<td>{{ !empty($item->fl_bebas) ? $item->fl_bebas : "-" }}</td>
				<td>{{ !empty($item->no_skep) ? $item->no_skep : "-" }}</td>
				<td>{{ !empty($item->tgl_skep) ? $item->tgl_skep : "-" }}</td>
			</tr>
		@endforeach
		
	</table>

	<table class="table table-bordered">
		<tr>
			<th colspan="12">DETAIL PUNGUTAN</th>
		</tr>
		<tr>
			<td>KD PUNGUTAN</td>
			<td>NILAI</td>
			<td>JNS TARIF</td>
			<td>KD TARIF</td>
			<td>KD SAT TARIF</td>
			<td>JML SAT</td>
			<td>TARIF</td>

		</tr>
		@foreach($detail_pungutan as $item)
			<tr>
				<td>{{ !empty($item->kd_pungutan) ? $item->kode_pungutan.'-'.$item->nama_pungutan : "-" }}</td>
				<td>{{ !empty($item->nilai) ? $item->nilai : "-" }}</td>
				<td>{{ !empty($item->jns_tarif) ? $item->jns_tarif : "-" }}</td>
				<td>{{ !empty($item->kd_tarif) ? $item->kode_tarif.'-'.$item->nama_tarif : "-" }}</td>
				<td>{{ !empty($item->kd_sat_tarif) ? $item->kd_sat_tarif : "-" }}</td>
				<td>{{ !empty($item->jml_sat) ? $item->jml_sat : "-" }}</td>
				<td>{{ !empty($item->tarif) ? $item->tarif : "-" }}</td>
			</tr>
		@endforeach
		
	</table>
</body>
</html>
