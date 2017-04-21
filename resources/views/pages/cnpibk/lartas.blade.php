<table class="table table-bordered">
	<tr>
		<th>Seri Barang</th>
		<th>Uraian Barang</th>
		<th>Ket. Lartas</th>
	</tr>
	@if(count($lartas) > 0)
		@foreach($lartas as $item)
			<tr>
				<td>{{ $item->seri_brg }}</td>
				<td>{{ $item->ur_brg }}</td>
				<td>{{ $item->ket_lartas }}</td>
			</tr>
		@endforeach
	@else
		<tr>
			<td colspan="2">Data Masih Kosong</td>
		</tr>
	@endif
</table>