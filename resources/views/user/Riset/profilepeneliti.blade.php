@extends('layouts/userlayout')
@section('title', 'Riset')

@section('content')

<div class="container-fluid background">
        <div class="row mt-4">
            <div class="col berita">
                Profile Peneliti
            </div>
        </div>
    </div>

<div class="container">


<div class="card border-0">
        <div class="row">
            <div class="col-4">
                <img src="{{ asset('img/rog.jpg') }}" alt="Avatar" class="image"/> 
            </div>
           
            <div class="col-8">
                <h5 class="card-title font-weight-bold">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>


    <div class="card border-0">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('img/rog.jpg') }}" alt="Avatar" class="image "/> 
            </div>
           
            <div class="col-md-8">
                <h5 class="card-title font-weight-bold">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>

    <div class="card border-0">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('img/rog.jpg') }}" alt="Avatar" class="image"/> 
            </div>
           
            <div class="col-md-8">
                <h5 class="card-title font-weight-bold">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
        </div>
    </div>
    
</div>

@endsection