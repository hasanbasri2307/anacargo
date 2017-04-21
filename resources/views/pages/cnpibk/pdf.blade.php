<table class="table table-bordered">
	<tr>
		<th width="20%">Status Code</th>
		<th width="70%">PDF</th>
	</tr>
	@if(count($pdf) > 0)
		@foreach($pdf as $item)
			<tr>
				<td width="20%">{{ $item->status_code }}</td>
				<td width="70%"><a href="{{ url("cnpibk/download/pdf/".$item->pdf) }}" target="_blank">{{ $item->pdf }}</a></td>
			</tr>
		@endforeach
	@else
		<tr>
			<td colspan="2">Data Masih Kosong</td>
		</tr>
	@endif
</table>