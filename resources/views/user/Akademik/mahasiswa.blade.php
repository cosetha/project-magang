@extends('layouts/userlayout')
@section('title', 'Kalender Akademik')

@section('content')
<div class="container-fluid background">
    <div class="row mt-4">
        <div class="col berita">
            MAHASISWA
        </div>
    </div>
</div>
<div class="judul_bk"> 2020</div>
<select class="select-css">
  <option>Pilih Tahun</option>
  <option>2020</option>
  <option>2019</option>
</select>
<table class="table-style">
  <thead>
    <tr>
      <th class="thstyle">No</th>
      <th class="thstyle">Program Studi</th>
      <th class="thstyle">Jumlah</th>
    </tr>
  </thead>
 <tbody>
    <tr>
      <td class="tdstyle">1</td>
      <td class="tdstyle">Mark</td>
      <td class="tdstyle">Otto</td>
    </tr>
    <tr>
      <td class="tdstyle">2</td>
      <td class="tdstyle">Jacob</td>
      <td class="tdstyle">Thornton</td>
    </tr>
  </tbody>
</table>
</body>
<div class="batas"></div>
<div class="judul_bk"> PANDUAN </div>
<button class="button">Download File PDF</button>
</html>

@endsection