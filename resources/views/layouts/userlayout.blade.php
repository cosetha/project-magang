<!DOCTYPE html>
<html lang="en">
<head>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/Login-image.png') }}">

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-baru.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
<nav class="navbar navbar-expand-lg nav-quick text-dark background-sec">
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Quick Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 250px;">
        </div>
      </li>

      <li class="nav-item">
            <a class="nav-link" href="">Official UB</span></a>
        </li>
    </ul>
  </div>
</nav>

  
<div class="container-fluid background">
  <div class="row">
      <div class="col kotak mt-4">
        <img src="{{ asset('img/teknologi informasi.png') }}" class="kotak">
      </div>
  </div>
</div>


<section id="navbar" class="sticky-top">
<nav class="navbar navbar-expand-lg navbar-dark text-light background">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
  <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Home</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Profile
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 250px;">
            <a class="dropdown-item" href="/gdosen">Dosen dan Tenaga Kerja</a>
            <a class="dropdown-item" href="/gprestasi">Prestasi</a>
            <a class="dropdown-item" href="/gsejarah">Sejarah</a>
            <a class="dropdown-item" href="/gstruktur">Struktur</a>
            <a class="dropdown-item" href="/gvisimisi">visi Misi</a>
          </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/gbk">Bidang Keahlian</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Akademik
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 250px;">
            <a class="dropdown-item" href="/gakreditasi">Akreditasi</a>
            <a class="dropdown-item" href="/gjadwalkuliah">Jadwal Kuliah</a>
            <a class="dropdown-item" href="/gkalender">Kalender</a>
            <a class="dropdown-item" href="/gmahasiswa">Mahasiswa</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Kemahasiswaan
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 250px;">
            <a class="dropdown-item" href="/galumni">Alumni</a>
            <a class="dropdown-item" href="/gkegiatan">Kegiatan</a>
            <a class="dropdown-item" href="/gloker">Lowongan Kerja</a>
            <a class="dropdown-item" href="/gorganisasi">Organisasi</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Riset
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 250px;">
            <a class="dropdown-item" href="/gpenelitian">penelitian</a>
            <a class="dropdown-item" href="/gpengabdian">pengabdian</a>
            <a class="dropdown-item" href="/gprofilepeneliti">profilepeneliti</a>
          </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/gfasilitas">Fasilitas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/gkontak">Kontak</a>
        </li>
        </ul>
        <form class="form-inline my-2 my-lg-0  mr-5">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        </form>
  </div>
</nav>
</section>


@yield('content')

<!-- Footer -->
<footer class="pt-4 background footer-text mt-5">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-4 mx-auto">

        <!-- Content -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Layanan Ub</h5>
         <ul class="list-unstyled">
          <li>
            <p>Link 1</p>
          </li>
          <li>
            <p>Link 1</p>
          </li>
          <li>
            <p>Link 1</p>
          </li>
          <li>
           <p>Link 1</p>
          </li>
          <li>
           <p>Link 1</p>
          </li>
          <li>
           <p>Link 1</p>
          </li>
          <li>
           <p>Link 1</p>
          </li>
          <li>
           <p>Link 1</p>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Blog</h5>

        <ul class="list-unstyled">
          <li>
            <p>Link 1</p>
          </li>
          <li>
            <p>Link 1</p>
          </li>
        </ul>

        <br>
        <h5 class="font-weight-bold text-uppercase mb-4">Faq</h5>

        <ul class="list-unstyled">
          <li>
            <p>Link 1</p>
          </li>
          <li>
            <p>Link 1</p>
          </li>
          <li>
            <p>Link 1</p>
          </li>
          <li>
           <p>Link 1</p>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->
  </div>


  <!-- Social buttons -->
  <div class="social text-center mb-3">
      <a href="#" style="text-decoration:none;">
        <i class="fab fa-facebook-f"> </i>
      </a>
      <a href="#">
        <i class="fab fa-twitter"> </i>
      </a>
      <a href="#" >
        <i class="fab fa-google-plus-g"> </i>
      </a>
      <a href="#">
        <i class="fab fa-instagram"> </i>
      </a>
  </div>

  <!-- Copyright -->
  <div class=" background-sec copy-text">
    Teknologi Informasi & Komputer
  </div>


  
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>