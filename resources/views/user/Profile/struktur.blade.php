@extends('layouts/userlayout')
@section('title', 'Fasilitas')

@section('content')

<div class="caption">
    <img src="{{ asset('img/rog.jpg') }}" class="img-full-width" />
    <h3>My Caption Goes Here</h3>
</div>


<div class="container">
        <h2>Struktur Organisasi</h2>
  </div>
<div class="batas"></div>

<div class="container">
    <!-- <h2>Pimpinan Prodi Teknologi Informasi</h2>
    <p>lorem ipsum</p>
    <br>

    <h2 align="center">Pimpinan Prodi Teknologi Informasi</h2>
    <hr> -->

    @foreach($data as $d)
        @if($loop->iteration % 2 == 0)

        <div class="card mb-3 mt-5 border-0" style="max-width: 100%;">
            <div class="row no-gutters">
                <div class="col-md-8">
                <div class="card-body">
                    <h5 align="center" class="card-title font-weight-bold">{{ $d->judul }}</h5>
                    <hr>
                    <p class="card-text">{!! $d->deskripsi !!}</p>
                </div>
                </div>
                <div class="col-md-4">
                <img src="{{ asset($d->gambar) }}" height="100%" width="150px" style="margin-left:150px;">
                </div>
            </div>
        </div>

        @else

        <div class="card mb-3 mt-5 border-0" style="max-width: 100%;">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="{{ asset($d->gambar) }}" height="100%" width="150px" style="margin-left:150px;">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 align="center" class="card-title font-weight-bold">{{ $d->judul }}</h5>
                    <hr>
                    <p class="card-text">{!! $d->deskripsi !!}</p>
                </div>
                </div>
            </div>
        </div>

        @endif

    @endforeach

</div>

@endsection
