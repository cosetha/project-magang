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
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="{{asset('css/profile.css')}}" rel="stylesheet">
        <link href="{{asset('css/style-baru2.css')}}" rel="stylesheet">
        <link href="{{asset('css/font-baru.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg nav-quick text-black navbar-color">
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav quick-margin">

                    <li class="nav-item">
                        <a class="nav-link" href="https://selma.ub.ac.id/">UB Official</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="https://vokasi.ub.ac.id/">Vokasi Official</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Quick Menu
                        </a>
                        <div class="dropdown-menu fade-up" aria-labelledby="navbarDropdown" style="width: 250px;">
                            <a class="dropdown-item" href="/gakreditasi">Akreditasi</a>
                            <a class="dropdown-item" href="/gjadwalkuliah">Jadwal Kuliah</a>
                            <a class="dropdown-item" href="/gkalender">Kalender</a>
                            <a class="dropdown-item" href="/gmahasiswa">Mahasiswa</a>
                        </div>
                    </li>


                </ul>
            </div>
        </nav>


        <div class="container-fluid background">
            <div class="row">
                <div class="col mt-4">
                    <img src="{{ asset('img/teknologi informasi.png') }}" class="kotak">
                </div>
            </div>



            <section id="navbar">

                <nav class="navbar navbar-expand-lg navbar-dark text-light margin-navbar">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarToggler">
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


                            <ul class="search">
                                <input class="search-text" type="text" name="" placeholder="Search">
                                <a href="/" style="text-decoration:none;" class="search-btn"><i class="fas fa-search"></i></a>
                            </ul>

                        </form>
                    </div>
                </nav>

            </section>
        </div>

        @yield('content')

        <!-- Footer -->
        <footer class=" container-fluid pt-4 background kotak-footer text-md-left footer-text mt-5">



            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-3 mx-auto">

                    <!-- Links -->
                    <div class="mt-4">
                        <img src="{{ asset('img/vokasi UB.png') }}" class="logo-footer">
                    </div>

                    <ul class="list-unstyled mt-3">
                        <li>
                            <p class="font5">TEKNOLOGI INFORMASI</p>
                            <p>PENDIDIKAN VOKASI</p>
                            <p class="font5">UNIVERSITAS BRAWIJAYA</p>
                            <p class="font-roboto-14-pt">Jl. Veteran No.12-13 Malang Jawa Timur</p>
                            <p class="font-roboto-14-pt">ti.vokasi@ub.ac.id</p>
                        </li>
                    </ul>

                </div>
                <!-- Grid column -->

                <div class="col-md-3 mx-auto">
                    <div class="">
                        <!-- Links -->
                        <p class="font-roboto-16-pt-bold text-uppercase mt-3">Fasilitas Kampus</p>
                        <hr class="hr-footer">

                        <ul class="list-unstyled font-roboto-14-pt margin-column">
                            <div id="fasilitas_kampus">

                            </div>
                        </ul>
                    </div>
                </div>


                <div class="col-md-3 mx-auto">
                    <!-- Links -->
                    <p class="font-roboto-16-pt-bold text-uppercase mt-3">Blog</p>
                    <hr class="hr-footer">

                    <ul class="list-unstyled font-roboto-14-pt margin-column">
                            <div id="blog">

                            </div>
                    </ul>


                    <p class="font-roboto-16-pt-bold text-uppercase mt-5">FAQ</p>
                    <hr class="hr-footer">

                    <ul class="list-unstyled font-roboto-14-pt margin-column">
                        <div id="faq">

                        </div>
                    </ul>
                </div>






            </div>
            <!-- Grid row -->



        </footer>

        <div class="copy-right">
            <div class="font-copyright font-roboto-14-pt">Copyright 2020.Allrights Reserved. Teknologi Informasi Pendidikan Vokasi UB</div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="{{asset('js/javascript.js')}}"></script>


    </body>
    </html>
