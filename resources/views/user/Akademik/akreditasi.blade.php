@extends('layouts/userlayout')
@section('title', 'Akreditasi')

@section('content')


<div class="container-fluid background">
    <div class="row mt-4">
        <div class="col berita">
            Akreditasi
        </div>
    </div>
</div>

<div class="container my-5">
    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>    

    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Program Studi</th>
      <th scope="col">Akreditasi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
    </tr>
  </tbody>
</table>

</div>

@endsection