<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/Login-image.png') }}">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css')}}">

    <script type="text/javascript" src="{{ asset('sweetalert/dist/sweetalert2.all.min.js') }}"></script>

    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('dashboard') }}">
                <div>
                    <img src="{{ asset('img/Login-image.png') }}" style="width: 50px !important; height: 50px !important;">
                </div>
                <div class="sidebar-brand-text mx-3">Admin Prodi TI</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item" id="dashboard">
                <a class="nav-link" href="{{ url('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>

                @if(auth()->user()->id_role == 1)
                <!-- Nav Item - Data Pengguna -->
                <li class="nav-item" id="datapengguna">
                    <a class="nav-link" href="{{ url('datapengguna') }}">
                        <i class="fas fa-fw fa-users"></i>
                        <span>Data Pengguna</span></a>
                    </li>
                    @endif

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item" id="MasterData">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMasterData" aria-expanded="true" aria-controls="collapseMasterData">
                            <i class="fas fa-database"></i>
                            <span>Master Data</span>
                        </a>
                        <div id="collapseMasterData" class="collapse" aria-labelledby="headingMasterData" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Master Data</h6>
                                <a class="collapse-item" href="{{ url('semester') }}">Semester</a>
                                <a class="collapse-item" href="{{ url('jabatan') }}">Jabatan</a>
                                <a class="collapse-item" href="{{ url('bk') }}">Bidang Keahlian</a>
                            </div>
                        </div>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading text-gray-100">
                        Management Konten
                    </div>


                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item" id="mininavbar">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMiniNavbar" aria-expanded="true" aria-controls="collapseMiniNavbar">
                            <i class="fas fa-fw fa-location-arrow"></i>
                            <span>Mini Navbar</span>
                        </a>
                        <div id="collapseMiniNavbar" class="collapse" aria-labelledby="headingMiniNavbar" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Mini Navbar</h6>
                                <a class="collapse-item" href="{{ url('sosmed') }}">Social Media</a>
                                <a class="collapse-item" href="{{ url('quick-menu') }}">Quick Menu</a>
                            </div>
                        </div>
                    </li>

                    <!-- Nav Item - Home Menu -->
                    <li class="nav-item" id="home">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHome" aria-expanded="true" aria-controls="collapseHome">
                            <i class="fas fa-fw fa-home"></i>
                            <span>Home</span>
                        </a>
                        <div id="collapseHome" class="collapse" aria-labelledby="headingHome" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Home</h6>
                                <a class="collapse-item" href="{{ url('headline') }}">Headline</a>
                                <a class="collapse-item" href="{{ url('berita') }}">Berita</a>
                                <a class="collapse-item" href="{{ url('pengumuman') }}">Pengumuman</a>
                                <a class="collapse-item" href="{{ url('agenda') }}">Agenda</a>
                                <a class="collapse-item" href="{{ url('kerjasama') }}">Kerja Sama</a>
                            </div>
                        </div>
                    </li>

                    <!-- Nav Item - Profile Menu -->
                    <li class="nav-item" id="profile">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProfile" aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-fw fa-user"></i>
                            <span>Profile</span>
                        </a>
                        <div id="collapseProfile" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Profile</h6>
                                <a class="collapse-item" href="{{ url('sejarah') }}">Sejarah</a>
                                <a class="collapse-item" href="{{ url('visimisi') }}">Visi dan Misi</a>
                                <a class="collapse-item" href="{{ url('struktur') }}">Struktur Organisasi</a>
                                <a class="collapse-item" href="{{ url('prestasi') }}">Prestasi</a>
                                <a class="collapse-item" href="{{ url('dosen') }}">Dosen</a>
                                <a class="collapse-item" href="{{ url('tenaga') }}">Tenaga Kerja</a>
                            </div>
                        </div>
                    </li>

                    <!-- Nav Item - Akademik Menu -->
                    <li class="nav-item" id="akademik">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkademik" aria-expanded="true" aria-controls="collapseAkademik">
                            <i class="fas fa-fw fa-graduation-cap"></i>
                            <span>Akademik</span>
                        </a>
                        <div id="collapseAkademik" class="collapse" aria-labelledby="headingAkademik" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Akademik</h6>
                                <a class="collapse-item" href="{{ url('akreditasi') }}">Akreditasi</a>
                                <a class="collapse-item" href="{{ url('mahasiswa') }}">Mahasiswa</a>
                                <a class="collapse-item" href="{{ url('kalender') }}">Kalender Akademik</a>
                                <a class="collapse-item" href="{{ url('jadwal') }}">Jadwal Kuliah</a>
                                <a class="collapse-item" href="{{ url('dokumen') }}">Dokumen</a>
                                <a class="collapse-item" href="{{ url('ojt') }}">OJT</a>
                                <a class="collapse-item" href="{{ url('tugasakhir') }}">Tugas Akhir</a>
                                <a class="collapse-item" href="{{ url('kegiatan') }}">Kegiatan Akademik</a>
                                <a class="collapse-item" href="{{ url('form') }}">Form</a>
                            </div>
                        </div>
                    </li>

                    <!-- Nav Item - Kemahasiswaan Menu -->
                    <li class="nav-item" id="kemahasiswaan">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKemahasiswaan" aria-expanded="true" aria-controls="collapseKemahasiswaan">
                            <i class="fas fa-fw fa-user-graduate"></i>
                            <span>Kemahasiswaan</span>
                        </a>
                        <div id="collapseKemahasiswaan" class="collapse" aria-labelledby="headingKemahasiswaan" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Kemahasiswaan</h6>
                                <a class="collapse-item" href="{{ url('organisasi') }}">Organisasi</a>
                                <a class="collapse-item" href="{{ url('lomba-seminar') }}">Info Lomba / Seminar</a>
                                <a class="collapse-item" href="{{ url('kegiatanProdi') }}">Kegiatan Prodi</a>
                                <a class="collapse-item" href="{{ url('lowongan') }}">Lowongan</a>
                                <a class="collapse-item" href="{{ url('alumni') }}">Data Alumni</a>
                            </div>
                        </div>
                    </li>

                    <!-- Nav Item - Riset Menu -->
                    <li class="nav-item" id="riset">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRiset" aria-expanded="true" aria-controls="collapseRiset">
                            <i class="fas fa-fw fa-journal-whills"></i>
                            <span>Riset</span>
                        </a>
                        <div id="collapseRiset" class="collapse" aria-labelledby="headingRiset" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Riset</h6>
                                <a class="collapse-item" href="{{ url('penelitian') }}">Penelitian</a>
                                <a class="collapse-item" href="{{ url('pengabdian') }}">Pengabdian</a>
                            </div>
                        </div>
                    </li>

                    <!-- Nav Item - Fasilitas -->
                    <li class="nav-item" id="fasilitas">
                        <a class="nav-link" href="{{ url('fasilitas') }}">
                            <i class="fab fa-chromecast"></i>
                            <span>Fasilitas</span></a>
                        </li>

                        <!-- Nav Item - Footer Menu -->
                        <li class="nav-item" id="footer">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFooter" aria-expanded="true" aria-controls="collapseFooter">
                                <i class="fas fa-fw fa-shoe-prints"></i>
                                <span>Footer</span>
                            </a>
                            <div id="collapseFooter" class="collapse" aria-labelledby="headingFooter" data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">Footer</h6>
                                    <a class="collapse-item" href="{{ url('layanan') }}">Layanan UB</a>
                                    <a class="collapse-item" href="{{ url('faq') }}">FAQ</a>
                                    <a class="collapse-item" href="{{ url('blog') }}">Blog</a>
                                </div>
                            </div>
                        </li>



                        <!-- Sidebar Toggler (Sidebar) -->
                        <div class="text-center d-none d-md-inline">
                            <button class="rounded-circle border-0" id="sidebarToggle"></button>
                        </div>

                    </ul>
                    <!-- End of Sidebar -->

                    <!-- Content Wrapper -->
                    <div id="content-wrapper" class="d-flex flex-column">

                        <!-- Main Content -->
                        <div id="content">

                            <!-- Topbar -->
                            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                                <!-- Sidebar Toggle (Topbar) -->
                                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                    <i class="fa fa-bars"></i>
                                </button>

                                <!-- Topbar Search -->
                                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <!-- Topbar Navbar -->
                                <ul class="navbar-nav ml-auto">

                                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                    <li class="nav-item dropdown no-arrow d-sm-none">
                                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-search fa-fw"></i>
                                        </a>
                                        <!-- Dropdown - Messages -->
                                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                            <form class="form-inline mr-auto w-100 navbar-search">
                                                <div class="input-group">
                                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button">
                                                            <i class="fas fa-search fa-sm"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </li>

                                    <!-- Nav Item - Alerts -->
                                    <li class="nav-item dropdown no-arrow mx-1">
                                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-bell fa-fw"></i>
                                            <!-- Counter - Alerts -->
                                            <span class="badge badge-danger badge-counter">3+</span>
                                        </a>
                                        <!-- Dropdown - Alerts -->
                                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                            <h6 class="dropdown-header">
                                                Alerts Center
                                            </h6>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="mr-3">
                                                    <div class="icon-circle bg-primary">
                                                        <i class="fas fa-file-alt text-white"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="small text-gray-500">December 12, 2019</div>
                                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                                </div>
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="mr-3">
                                                    <div class="icon-circle bg-success">
                                                        <i class="fas fa-donate text-white"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="small text-gray-500">December 7, 2019</div>
                                                    $290.29 has been deposited into your account!
                                                </div>
                                            </a>
                                            <a class="dropdown-item d-flex align-items-center" href="#">
                                                <div class="mr-3">
                                                    <div class="icon-circle bg-warning">
                                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="small text-gray-500">December 2, 2019</div>
                                                    Spending Alert: We've noticed unusually high spending for your account.
                                                </div>
                                            </a>
                                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                        </div>
                                    </li>

                                    <!-- Nav Item - User Information -->
                                    <li class="nav-item dropdown no-arrow">
                                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                                            @if(auth()->user()->gambar == !NULL)
                                                <img class="img-profile rounded-circle" src="{{ asset('img/profile') }}/{{ auth()->user()->gambar }}">
                                            @else
                                                <img class="img-profile rounded-circle" src="{{ asset('img/Login-image.png') }}">
                                            @endif
                                        </a>
                                        <!-- Dropdown - User Information -->
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                            <a class="dropdown-item" href="{{ url('editprofile') }}">
                                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Edit Profile
                                            </a>
                                            <a class="dropdown-item" href="{{ url('editpassword') }}">
                                                <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Edit Password
                                            </a>

                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Logout
                                            </a>
                                        </div>
                                    </li>

                                </ul>

                            </nav>
                            <!-- End of Topbar -->

                            @yield('content')

                            <!-- Footer -->
                            <footer class="sticky-footer bg-white">
                                <div class="container my-auto">
                                    <div class="copyright text-center my-auto">
                                        <span>Copyright &copy; <a href="https://raw.githubusercontent.com/StartBootstrap/startbootstrap-sb-admin-2/master/LICENSE">SB Admin 2</a></span>
                                    </div>
                                </div>
                            </footer>
                            <!-- End of Footer -->

                        </div>
                        <!-- End of Content Wrapper -->

                    </div>
                    <!-- End of Page Wrapper -->

                    <!-- Scroll to Top Button-->
                    <a class="scroll-to-top rounded" href="#page-top">
                        <i class="fas fa-angle-up"></i>
                    </a>

                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-primary" href="{{ url('logout') }}">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bootstrap core JavaScript-->
                    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
                    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
                    <script src="{{asset('vendor/bootstrap/js/bootstrap-show-password.js')}}"></script>

                    <!-- Core plugin JavaScript-->
                    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

                    <!-- Custom scripts for all pages-->
                    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
                    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>

                    <!-- Page level plugins -->
                    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

                    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
                    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

                    <!-- Page level custom scripts -->
                    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
                    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
                    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
                    <script src="{{ asset('js/script.js') }}"></script>


                    <!-- script ajax -->
                    @yield('js-ajax')


                    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
                    <script src="{{ asset('js/tinymcs.js') }}"></script>

                </body>
                </html>
