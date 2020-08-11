<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><i class="fab fa-instagram"></i></a>
        <a class="navbar-brand" href="#"><i class="fab fa-instagram"></i></a>
        <a class="navbar-brand" href="#"><i class="fab fa-instagram"></i></a>
        <a class="navbar-brand" href="#"><i class="fab fa-instagram"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"> </ul>
            <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav> -->


    <div class="container-fluid background">
        <div class="row">
            <div class="col col-image">
            <img src="{{ asset('img/teknologi informasi.png') }}" class="d-block w-25">
            <nav class="navbar navbar-expand-lg background mt-3 text-white">
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto ml-5">
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
                      <a class="nav-link" href="#">Kontak</a>
                  </li>
                  <!-- <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Dropdown
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                  </li> -->
                  </ul>
                  <form class="form-inline my-2 my-lg-0  mr-5">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  </form>
              </div>
            </nav>
            </div>
        </div>
    </div>


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
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

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
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Faq</h5>

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
  <!-- Footer Links -->


  <!-- Social buttons -->
  <ul class="list-unstyled list-inline text-center mt-5">
    <li class="list-inline-item">
      <a class="btn-floating btn-fb mx-1">
        <i class="fab fa-facebook-f"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a class="btn-floating btn-tw mx-1">
        <i class="fab fa-twitter"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a class="btn-floating btn-gplus mx-1">
        <i class="fab fa-google-plus-g"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a class="btn-floating btn-li mx-1">
        <i class="fab fa-linkedin-in"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a class="btn-floating btn-dribbble mx-1">
        <i class="fab fa-dribbble"> </i>
      </a>
    </li>
  </ul>
  <!-- Social buttons -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3 copy-background">© 2020 Copyright:
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
