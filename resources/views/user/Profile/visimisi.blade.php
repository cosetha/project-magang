@extends('layout/userlayout')
@section('title', 'Fasilitas')

@section('content')

<div class="caption">
    <img src="{{ asset('img/rog.jpg') }}" class="img-full-width" />
    <h3>My Caption Goes Here</h3>
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