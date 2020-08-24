@extends('layout/userlayout')
@section('title', 'Fasilitas')

@section('content')

<div class="container-fluid background">
        <div class="row mt-4">
            <div class="col berita">
                Pengabdian
            </div>
        </div>
    </div>

<div class="pengabdian-con">
    <div class="card mb-3 mt-5 border-0" style="max-width: 100%;">
        <div class="row no-gutters">
            <div class="col-md-4">
            <img src="{{ asset('img/rog.jpg') }}" class="card-img">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title font-weight-bold">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            </div>
        </div>
    </div>


    <div class="card mb-3 mt-5 border-0" style="max-width: 100%;">
        <div class="row no-gutters">
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('img/rog.jpg') }}" class="card-img">
            </div>
        </div>
    </div>
</div>


@endsection