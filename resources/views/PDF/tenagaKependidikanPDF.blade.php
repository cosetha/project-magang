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
	<h5>Data Tenaga Kependidikan</h4>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Telepon</th>
        <th>Jabatan</th>
        <th>Gambar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tenaga as $t)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{$t->nama}}</td>
				<td>{{ $t->alamat}}</td>
        <td>{{$t->no_tlp}}</td>
				<td>{{ $t->nama_jabatan}}</td>
				<td><img height="200px" src="{{$t->gambar}}"/></td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
