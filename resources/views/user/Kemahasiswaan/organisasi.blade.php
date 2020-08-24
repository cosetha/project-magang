@extends('layout/userlayout')
@section('title', 'Fasilitas')

@section('content')

<div class="container-fluid background">
    <div class="row mt-4">
        <div class="col berita">
            Organisasi
        </div>
    </div>
</div>


<div class="container ">
    <div class="row row-cols-1 row-cols-md-3 mt-3">
        <div class="col-sm">
            <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2 mx-auto d-block" alt = "Rounded Image" width = "100" height = "100">
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
        </div>
        
        <div class="col-sm">
            <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2 mx-auto d-block" alt = "Rounded Image" width = "100" height = "100">
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
        </div>

       <div class="col-sm">
            <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2 mx-auto d-block" alt = "Rounded Image" width = "100" height = "100">
                <div class="card mt-5">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
        </div>

        <!-- "<div class="col mb-3">
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>" -->
        
    </div>
</div>

@endsection