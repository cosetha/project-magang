@extends('layout/userlayout')
@section('title', 'Fasilitas')

@section('content')

<div class="container-img">
  <img src="{{ asset('img/rog.jpg') }}" alt="Snow" style="width:100%; height:400px ;">
  <div class="bottom-left">Sistem Informasi</div>
  <div class="top-left">Top Left</div>
  <div class="top-right">Top Right</div>
  <div class="bottom-right">Bottom Right</div>
  <div class="centered">Centered</div>
</div>

<div class="container">
    <div class="row mt-4 mb-row">
            <div class="col mx-4 col-overflow">
                <h2>Visi</h2>
                
            </div>
            


             <div class="col mx-4 col-overflow">
                <h2>Misi</h2>
            </div>

        </div>
</div>

@endsection