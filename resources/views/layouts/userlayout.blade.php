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
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>

    <!-- Custom styles for this template-->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-baru.css')}}" rel="stylesheet">
     <link href="{{asset('css/style-baru2.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-baru.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
<nav class="navbar navbar-expand-lg nav-quick text-white navbar-color">
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav quick-margin font1">

    <li class="nav-item">
      <a class="nav-link" href="">UB Official</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="">Vokasi Official</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="">BITS</span></a>
    </li>


    </ul>
  </div>
</nav>

  
<div class="container-fluid background">
  <div class="row">
      <div class="col kotak1 mt-4">
        <img class="kotak1" src="{{ asset('img/teknologi informasi.png') }}" >
      </div>
  </div>



<section id="navbar">

<nav class="navbar navbar-expand-lg navbar-dark text-light margin-navbar">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarToggler">
  <ul class="navbar-nav mr-auto font2">
        <li class="nav-item">
            <a class="nav-link " href="{{ url('/') }}">Home</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Profile
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 250px;">
            <a class="dropdown-item" href="/dosen">Dosen dan Tenaga Kerja</a>
            <a class="dropdown-item" href="/prestasi">Prestasi</a>
            <a class="dropdown-item" href="/sejarah">Sejarah</a>
            <a class="dropdown-item" href="/struktur">Struktur</a>
            <a class="dropdown-item" href="/visimisi">visi Misi</a>
          </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/bk">Bidang Keahlian</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Akademik
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 250px;">
            <a class="dropdown-item" href="/akreditasi">Akreditasi</a>
            <a class="dropdown-item" href="/jadwalkuliah">Jadwal Kuliah</a>
            <a class="dropdown-item" href="/kalender">Kalender</a>
            <a class="dropdown-item" href="/mahasiswa">Mahasiswa</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Kemahasiswaan
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 250px;">
            <a class="dropdown-item" href="/alumni">Alumni</a>
            <a class="dropdown-item" href="/kegiatan">Kegiatan</a>
            <a class="dropdown-item" href="/loker">Lowongan Kerja</a>
            <a class="dropdown-item" href="/organisasi">Organisasi</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Riset
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 250px;">
            <a class="dropdown-item" href="/penelitian">penelitian</a>
            <a class="dropdown-item" href="/pengabdian">pengabdian</a>
            <a class="dropdown-item" href="/profilepeneliti">profilepeneliti</a>
          </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/fasilitas">Fasilitas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/kontak">Kontak</a>
        </li>
        </ul>
        <form class="form-inline my-2 my-lg-0  mr-5">


        <div class="search">
          <input class="search-text" type="text" name="" placeholder="Search">
          <a href="#" class="search-btn"><i class="fas fa-search"></i></a>
        </div>

        
        </form>
  </div>
</nav>

</section>
</div>

@yield('content')

<!-- Footer -->
<footer class=" container-fluid pt-4 background kotak-footer text-md-left footer-text mt-5">

  <!-- Footer Links -->


    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-3 mx-auto">

        <!-- Links -->
        <div class="mx-3">
        <img src="{{ asset('img/BKSI.png') }}" width=" 100%" height="100%">

        <ul class="list-unstyled mt-3">
          <li>
            <h5 class="font5">TEKNOLOGI INFORMASI</h5>
            <h3 class="font11">PENDIDIKAN VOKASI</h3>
            <h5 class="font5">UNIVERSITAS BRAWIJAYA</h5>
            <p class="font2">Jl. Veteran No.12-13 Malang Jawa Timur</p>
            <p class="font2">ti.vokasi@ub.ac.id</p>
          </li>
        </ul>
        </div>
      </div>
      <!-- Grid column -->

      <div class="col-md-3 mx-auto">
      <div class="mx-3">
        <!-- Links -->
        <h5 class="font-weight-bold font8 text-uppercase mt-3">Fasilitas Kampus</h5>
        <hr >

        <ul class="list-unstyled font2">
          <li>
            <p>BITS UB</p>
          </li>
          <li>
            <p>Digital Library</p>
          </li>
          <li>
            <p>Ebook Store</p>
          </li>
          <li>
            <p>E-complaint UBN</p>
          </li>
          <li>
            <p>E-edu</p>
          </li>
          <li>
            <p>School On The Internet</p>
          </li>
          <li>
            <p>Jurnal UB</p>
          </li>
          <li>
            <p>UB Forum</p>
          </li>
          <li>
            <p>UB TV</p>
          </li>
        </ul>
      </div>
      </div>

      <div class="col-md-3 mx-auto">
      <div class="mx-3">
        <!-- Links -->
        <h5 class="font-weight-bold font8 text-uppercase mt-3">Kemahasiswaan</h5>
        <hr >

        <ul class="list-unstyled font2">
          <li>
            <p>Email Mahasiswa</p>
          </li>
          <li>
            <p>Job Placements Center UB</p>
          </li>
          <li>
            <p>Online Schoolarship UB</p>
          </li>
          <li>
            <p>Pendaftaran</p>
          </li>
          <li>
            <p>SIAM Online</p>
          </li>
          <li>
            <p>BEM TI Vokasi UB</p>
          </li>
          <li>
            <p>HIMATIF Vokasi UB</p>
          </li>
        </ul>
      </div>
      </div>

      
      <div class="col-md-3 mx-auto">
      <div class="mx-3">
        <!-- Links -->
        <h5 class="font-weight-bold font8 text-uppercase mt-3">Blog</h5>
        <hr >

        <ul class="list-unstyled font2">
          <li>
            <p>UB Official Web</p>
          </li>
          <li>
            <p>Prasetya Online</p>
          </li>
          <li>
            <p>UB Web Mail</p>
          </li>
          <li>
            <p>Blog Dosen</p>
          </li>
          <li>
            <p>Blog Staff</p>
          </li>
          <li>
            <p>Blog Mahasiswa</p>
          </li>
        </ul>
      </div>
      </div>


    </div>
    <!-- Grid row -->


  
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>







<!-- <footer class="background">
  <div class="container-fluid padding">
    <div class="row">
      <div class="col-md-4">
        <h3>Layanan UB</h3>
        <hr class="background-sec">
          <p>Siam</p>
          <p>Siam</p>
          <p>Siam</p>
          <p>Siam</p>
      </div>

      <div class="col-md-4">
        <h3>Layanan UB</h3>
        <hr class="background-sec">
          <p>Siam</p>
          <p>Siam</p>
          <p>Siam</p>
          <p>Siam</p>
      </div>

      <div class="col-md-4">
        <h3>Layanan UB</h3>
        <hr class="background-sec">
          <p>Siam</p>
          <p>Siam</p>
          <p>Siam</p>
          <p>Siam</p>
      </div>
      <div class="col-md-12">
        <h3>Layanan UB</h3>
        <hr class="background-sec">
          <p>Siam</p>
          <p>Siam</p>
          <p>Siam</p>
          <p>Siam</p>
      </div>
    </div>

  </div>
</footer> -->