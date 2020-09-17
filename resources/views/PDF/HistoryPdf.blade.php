<html>
<head>
	<title>Export PDF</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
		p{
			font-size: 20pt;
		}
		span,
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
</head>
<body>
	<center><p>Aktivitas Terakhir Admin</p></center>
	<br>
	<div class="text-right">
		<span>{{now()->locale('id')->isoFormat('LLLL')}}</span>
	</div>

	<table class="table table-striped mt-1">
		<thead>
			<tr align="center">
				<td><b>No</b></td>
				<td><b>Admin</b></td>
				<td><b>Aksi</b></td>
				<td><b>Keterangan</b></td>
				<td><b>Tanggal</b></td>
			</tr>
		</thead>
		<tbody>
			@foreach($history as $h)
			<tr>
				<td align="center">{{ $loop->iteration }}</td>
				<td align="center">{{ $h->nama}}</td>
				<td align="center">{{ $h->aksi }}</td>
				<td>{{ $h->keterangan }}</td>
				<td align="center">{{ $h->created_at->format('d-m-y h:i:s') }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
