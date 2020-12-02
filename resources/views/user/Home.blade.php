@extends('layouts/userlayout')
@section('title', 'Home')

@section('content')

<div class="box_slide">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="box_slide" src="{{ asset('img/maxresdefault (1).jpg') }}" >
                <div class="carousel-caption">
                    <h1>First slide label</h1>
                    <h3>Nulla vitae elit libero, a pharetra augue mollis interdum.</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img class="box_slide" src="{{ asset('img/gambar 2.jpg') }}" >
                <div class="carousel-caption">
                    <h1>First slide label</h1>
                    <h3>Nulla vitae elit libero, a pharetra augue mollis interdum.</h3>
                </div>
            </div>
            <div class="carousel-item">
                <img class="box_slide" src="{{ asset('img/rog.jpg') }}" >
                <div class="carousel-caption">
                    <h1>First slide label</h1>
                    <h3>Nulla vitae elit libero, a pharetra augue mollis interdum.</h3>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="box_content">
    <div class="row">
        <div class="col-md-12">
            <div class="judul_bagian font3">
                Bidang Keahlian
            </div>
            <div class="hr">
            </div>

            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('img/BKSI.png') }}" width=" 100%" height="100%">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('img/BKTI.png') }}" width=" 100%" height="100%">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('img/BKTV.png') }}" width=" 100%" height="100%">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('img/BKBD.png') }}" width=" 100%" height="100%">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="box_content">
    <div class="row">
        <div class="col-md-8">
            <div class="judul_bagian font3">
                Berita Terbaru
            </div>
            <div class="hr"></div>
            <div class="row ">
                <div class="col-md-6 mb-row">
                    <img class="bg_image" src="{{ asset('img/gambar 1.jpg') }}" width=" 100%" height="100%">
                    <div class="box">
                        <div class="tgl_berita font6">
                            <i class="far fa-clock mr-2"></i>12 September 2020 </div>
                            <div class="judul_berita font8"> Berita terkini Universitas Brawijaya </div>
                            <div class="isi_berita font2"> <p class="overflow-ellipsis"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 150 0s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum </p></div>
                            <br>
                            <P class="isi_berita font5"><a href=""> Read More ... </a></P>
                        </div>

                    </div>

                    <div class="col-md-6 mb-row">
                        <img class="bg_image" src="{{ asset('img/gambar 1.jpg') }}" width=" 100%" height="100%">
                        <div class="box">
                            <div class="tgl_berita font6">
                                <i class="far fa-clock mr-2"></i>12 September 2020 </div>
                                <div class="judul_berita font8"> Berita terkini Universitas Brawijaya </div>
                                <div class="isi_berita font2"> <p class="overflow-ellipsis"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 150 0s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum </p></div>
                                <br>
                                <P class="isi_berita font5"><a href=""> Read More ... </a></P>
                            </div>
                        </div>
                        <div class="col-md-6 mt-row margin_berita">
                            <img class="bg_image" src="{{ asset('img/gambar 1.jpg') }}" width=" 100%" height="100%">
                            <div class="box">
                                <div class="tgl_berita font6">
                                    <i class="far fa-clock mr-2"></i>12 September 2020 </div>
                                    <div class="judul_berita font8"> Berita terkini Universitas Brawijaya </div>
                                    <div class="isi_berita font2"> <p class="overflow-ellipsis"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 150 0s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum </p></div>
                                    <br>
                                    <P class="isi_berita font5"><a href=""> Read More ... </a></P>
                                </div>
                            </div>
                            <div class="col-md-6 mt-row margin_berita">
                                <img class="bg_image" src="{{ asset('img/gambar 1.jpg') }}" width=" 100%" height="100%">
                                <div class="box">
                                    <div class="tgl_berita font6">
                                        <i class="far fa-clock mr-2"></i>12 September 2020 </div>
                                        <div class="judul_berita font8"> Berita terkini Universitas Brawijaya </div>
                                        <div class="isi_berita font2"> <p class="overflow-ellipsis"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 150 0s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum </p></div>
                                        <br>
                                        <P class="isi_berita font5"><a href="#"> Read More ... </a></P>
                                    </div>
                                </div>

                                <div class="col-md-12 margin_lihat">
                                    <button type="button text_lihat text-nowrap background-sec font6" class="btn btn-dark float-right margin-button">Primary <i class="fas fa-chevron-circle-right"></i></button>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="judul_bagian font3">
                                Pengumuman
                            </div>
                            <div class="hr"></div>

                            <div class="row mt-1">
                                <div class="col-md-12">
                                    <a href="#">
                                        <div class="box_pengumuman">
                                            <div class="tgl_pengumuman font4"> 12 September 2020  </div>
                                            <div class="judul_pengumuman font5"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 150 0s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  </div>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="box_pengumuman">
                                            <div class="tgl_pengumuman font4"> 12 September 2020  </div>
                                            <div class="judul_pengumuman font5"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 150 0s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  </div>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="box_pengumuman">
                                            <div class="tgl_pengumuman font4"> 12 September 2020  </div>
                                            <div class="judul_pengumuman font5"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 150 0s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  </div>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="box_pengumuman">
                                            <div class="tgl_pengumuman font4"> 12 September 2020  </div>
                                            <div class="judul_pengumuman font5"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 150 0s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  </div>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="box_pengumuman">
                                            <div class="tgl_pengumuman font4"> 12 September 2020  </div>
                                            <div class="judul_pengumuman font5"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 150 0s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  </div>
                                        </div>
                                    </a>

                                    <a href=""><div class="buttonlink font6">More</div></a>
                                </div>
                            </div>

                            <div class="judul_bagian font3">
                                Agenda
                            </div>

                            <div class="hr"></div>

                            <div class="row margin_agenda">
                                <div class="col-md-12 ">
                                    <a href="#">
                                        <div class="box_agenda">
                                            <div class="tanggal_agenda">
                                                <div class="font-roboto-12-pt-bold mt-3"> 29 </div>
                                                <div class="font-roboto-12-pt-bold"> October </div>
                                            </div>
                                            <div class="judul_agenda font9"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 150 0s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  </div>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="box_agenda">
                                            <div class="tanggal_agenda">
                                                <div class="font-roboto-12-pt-bold mt-3"> 29 </div>
                                                <div class="font-roboto-12-pt-bold"> October </div>
                                            </div>
                                            <div class="judul_agenda font9"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 150 0s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  </div>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="box_agenda">
                                            <div class="tanggal_agenda">
                                                <div class="font-roboto-12-pt-bold mt-3"> 29 </div>
                                                <div class="font-roboto-12-pt-bold"> September </div>
                                            </div>
                                            <div class="judul_agenda font9"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 150 0s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  </div>
                                        </div>
                                    </a>

                                    <a href="#">
                                        <div class="box_agenda">
                                            <div class="tanggal_agenda">
                                                <div class="font-roboto-12-pt-bold mt-3"> 29 </div>
                                                <div class="font-roboto-12-pt-bold"> October </div>
                                            </div>
                                            <div class="judul_agenda font9"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 150 0s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  </div>
                                        </div>
                                    </a>

                                    <a href=""><div class="buttonlink font6">More</div></a>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>



                <div class="box_content">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="kotak-jumlah">
                                        <div class="isi-jumlah">
                                            <i class="fas fa-user-friends fa-5x"></i>
                                            <div class="font4 mt-3">2000</div>
                                            <div class="font2">Mahasiswa Aktif</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="kotak-jumlah">
                                        <div class="isi-jumlah">
                                            <i class="fas fa-chalkboard-teacher fa-5x"></i>
                                            <div class="font4 mt-3">34</div>
                                            <div class="font2">Dosen & Staff</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="kotak-jumlah">
                                        <div class="isi-jumlah">
                                            <i class="fas fa-laptop-code fa-5x"></i>
                                            <div class="font4 mt-3">4</div>
                                            <div class="font2">Bidang Keahlian</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="kotak-jumlah">
                                        <div class="isi-jumlah">
                                            <i class="fas fa-user-graduate fa-5x"></i>
                                            <div class="font4 mt-3">40.000</div>
                                            <div class="font2">Alumni / Lulusan</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="banner-prestasi mt-5 mb-5">
                    <div class="card">
                        <img id="background-banner" src="{{ asset('img/web-banner-2.jpg') }}" alt="">
                        <div class="card-img-overlay">
                            <div class="card card-title" id="card-title">
                                <h3 class="card-title"><b>PRESTASI PROGRAM STUDI</b></h3>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Pemenang Lomba Gaming E - Sport</h5>
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                Ullam quae aut libero sapiente est amet quos? Ipsum doloribus incidunt cumque,</p>
                                                <div class="card-text">
                                                    <a class="font2 card-link" href="#">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Pemenang Lomba Gaming E - Sport</h5>
                                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                    Ullam quae aut libero sapiente est amet quos? Ipsum doloribus incidunt cumque,</p>
                                                    <div class="card-text">
                                                        <a class="font2 card-link" href="#">Read More</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="box_content">
                        <div class="judul_bagian font3 mt-5">
                            Kerja Sama
                        </div>

                        <div class="hr"></div>

                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row ml-5">
                                        <div class="col-sm"><img class="item-kerjasama" src="{{ asset('img/pngegg (14).png') }}" ></div>
                                        <div class="col-sm"><img class="item-kerjasama" src="{{ asset('img/pngegg (15).png') }}" ></div>
                                        <div class="col-sm"><img class="item-kerjasama" src="{{ asset('img/pngegg (16).png') }}" ></div>
                                        <div class="col-sm"><img class="item-kerjasama" src="{{ asset('img/pngegg (17).png') }}" ></div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row ml-5">
                                        <div class="col-sm"><img class="item-kerjasama" src="{{ asset('img/pngegg (14).png') }}" ></div>
                                        <div class="col-sm"><img class="item-kerjasama" src="{{ asset('img/pngegg (15).png') }}" ></div>
                                        <div class="col-sm"><img class="item-kerjasama" src="{{ asset('img/pngegg (16).png') }}" ></div>
                                        <div class="col-sm"><img class="item-kerjasama" src="{{ asset('img/pngegg (17).png') }}" ></div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row ml-5">
                                        <div class="col-sm"><img class="item-kerjasama" src="{{ asset('img/pngegg (14).png') }}" ></div>
                                        <div class="col-sm"><img class="item-kerjasama" src="{{ asset('img/pngegg (15).png') }}" ></div>
                                        <div class="col-sm"><img class="item-kerjasama" src="{{ asset('img/pngegg (16).png') }}" ></div>
                                        <div class="col-sm"><img class="item-kerjasama" src="{{ asset('img/pngegg (17).png') }}" ></div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>


                    </div>


                    <div class="social text-center mb-5  mt-5">
                        <a href="#" style="text-decoration:none;">
                            <i class="fab fa-facebook-f"> </i>
                        </a>
                        <a href="#" style="text-decoration:none;">
                            <i class="fab fa-twitter"> </i>
                        </a>
                        <a href="#" style="text-decoration:none;" >
                            <i class="fab fa-google-plus-g"> </i>
                        </a>
                        <a href="#" style="text-decoration:none;">
                            <i class="fab fa-instagram"> </i>
                        </a>
                    </div>

                    @endsection
