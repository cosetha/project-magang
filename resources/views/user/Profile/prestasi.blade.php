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


<!-- Prestasi Bagian SI -->
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
  </ul>
  
  <!-- The slideshow -->
  <div class="container carousel-inner no-padding text-center ">
    <section id="team">
    <div class="carousel-item active">
        <div class="card-deck" style="margin-top:70px;">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>
        </div> 
    </div>

    
    <div class="carousel-item">
    <div class="card-deck" style="margin-top:70px;">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
    </div> 
    </div>
  </section>
  
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<!-- Selesai Bagian SI -->


<!-- Prestasi Bagian TI -->
<div class="container-fluid background">
    <div class="row mt-4">
        <div class="col berita">
            Teknologi Informasi & Komputer
        </div>
    </div>
</div>

<div id="demo2" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="container carousel-inner no-padding text-center ">
    <section id="team">
    <div class="carousel-item active">
        <div class="card-deck" style="margin-top:70px;">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>
        </div> 
    </div>

    
    <div class="carousel-item">
    <div class="card-deck" style="margin-top:70px;">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
    </div> 
    </div>
  </section>
  
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo2" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo2" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<!-- Selesai Bagian SI -->



<!-- Prestasi Bagian Bisnis -->
<div class="container-fluid background">
    <div class="row mt-4">
        <div class="col berita">
            Bisnis Digital dan E-Commerce
        </div>
    </div>
</div>


<div id="demo3" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="container carousel-inner no-padding text-center ">
    <section id="team">
    <div class="carousel-item active">
        <div class="card-deck" style="margin-top:70px;">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>
        </div> 
    </div>

    
    <div class="carousel-item">
    <div class="card-deck" style="margin-top:70px;">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
    </div> 
    </div>
  </section>
  
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo3" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo3" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<!-- Selesai Bagian Bisnis -->




<!-- Prestasi Bagian FTV -->
<div class="container-fluid background">
    <div class="row mt-4">
        <div class="col berita">
            Film dan Televisi
        </div>
    </div>
</div>


<div id="demo4" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="container carousel-inner no-padding text-center ">
    <section id="team">
    <div class="carousel-item active">
        <div class="card-deck" style="margin-top:70px;">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>
        </div> 
    </div>

    
    <div class="carousel-item">
    <div class="card-deck" style="margin-top:70px;">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('img/profile.jpg') }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
        </div>
    </div> 
    </div>
  </section>
  
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo4" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo4" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<!-- Selesai Bagian FTV -->
@endsection