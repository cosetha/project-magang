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
	<h5>List Mahasiswa</h4>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Nim</th>
				<th>Bidang Keahlian</th>
				<th>Angkatan</th>
			</tr>
		</thead>
		<tbody>
			@foreach($mhs as $d)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $d->nama}}</td>
				<td>{{ $d->nim }}</td>
				<td>{{ $d->bidangKeahlian->first()->nama_bk }}</td>
				<td>{{ $d->angkatan }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
