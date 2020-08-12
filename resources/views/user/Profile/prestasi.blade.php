@extends('layouts/userlayout')
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

<div class="container-fluid background">
    <div class="row mt-4">
        <div class="col berita">
            Sistem Informasi
        </div>
    </div>
</div>

<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="container carousel-inner no-padding">
    <div class="carousel-item active">
        <div class="card-deck mt-3">
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>

            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel-item">
      <div class="card-deck mt-3">
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>

            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel-item">
      <div class="card-deck mt-3">
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>

            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>


<div class="container-fluid background">
    <div class="row mt-4">
        <div class="col berita">
            Teknologi Informasi & Komputer
        </div>
    </div>
</div>



<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="container carousel-inner no-padding">
    <div class="carousel-item active">
        <div class="card-deck mt-3">
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>

            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel-item">
      <div class="card-deck mt-3">
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>

            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel-item">
      <div class="card-deck mt-3">
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>

            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>


<div class="container-fluid background">
    <div class="row mt-4">
        <div class="col berita">
            Bisnis Digital dan E-Commerce
        </div>
    </div>
</div>


<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="container carousel-inner no-padding">
    <div class="carousel-item active">
        <div class="card-deck mt-3">
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>

            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel-item">
      <div class="card-deck mt-3">
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>

            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel-item">
      <div class="card-deck mt-3">
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>

            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<div class="container-fluid background">
    <div class="row mt-4">
        <div class="col berita">
            Film dan Televisi
        </div>
    </div>
</div>

<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="container carousel-inner no-padding">
    <div class="carousel-item active">
        <div class="card-deck mt-3">
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>

            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel-item">
      <div class="card-deck mt-3">
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>

            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="carousel-item">
      <div class="card-deck mt-3">
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>

            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
            <div class="card" style="align-items: center;">
                <img src = "{{ asset('img/rog.jpg') }}" class = "rounded-circle mt-2" alt = "Rounded Image" width = "100" height = "100">
                <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
@endsection
