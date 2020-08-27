<html>
<head>
	<title>Export PDF</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<h5>Laporan Dosen</h4>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Deskripsi</th>
				<th>Foto</th>
			</tr>
		</thead>
		<tbody>
			@foreach($dosen as $d)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{$d->nama}}</td>
				<td>{!! $d->deskripsi !!}</td>
				<td><img height="200px" src="{{$d->gambar}}"/></td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
