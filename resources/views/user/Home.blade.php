@extends('layouts/userlayout')
@section('title', 'Home')

@section('content')

<div class="box_slide">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="box_slide" src="{{ asset('img/rog.jpg') }}" >
                <div class="carousel-caption ">
                    <h1>First slide label</h1>
                    <h3>Nulla vitae elit libero, a pharetra augue mollis interdum.</h3>
                </div>
                </div>
                <div class="carousel-item">
                <img class="box_slide" src="{{ asset('img/gambar 2.jpg') }}" >
                <div class="carousel-caption ">
                    <h1>First slide label</h1>
                    <h3>Nulla vitae elit libero, a pharetra augue mollis interdum.</h3>
                </div>
                </div>
                <div class="carousel-item">
                <img class="box_slide" src="{{ asset('img/rog.jpg') }}" >
                <div class="carousel-caption ">
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
                    <div class="hr"></div>

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
                                      <div class="isi_berita font2"> <p class="overflow-ellipsis"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum </p></div>
                                      <br>
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
                                      <div class="isi_berita font2"> <p class="overflow-ellipsis"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum </p></div>
                                      <br>
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
                                      <div class="isi_berita font2"> <p class="overflow-ellipsis"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum </p></div>
                                      <br>
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
                                      <div class="isi_berita font2"> <p class="overflow-ellipsis"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum </p></div>
                                      <br>
                                      <br>
                                      <P class="isi_berita font5"><a href="#"> Read More ... </a></P>
                            </div>
                    </div>

                    <div class="col-md-12 margin_lihat">
                        <a href="" style="text-decoration:none;">
                            <div class="text_lihat text-nowrap background-sec font6">
                                Lihat Semua <i class="fas fa-chevron-circle-right"></i>
                            </div>
                        </a>     
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
               <div class="judul_pengumuman font5"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  </div> 
            </div>
            </a>
            <a href="#">
            <div class="box_pengumuman"> 
               <div class="tgl_pengumuman font4"> 12 September 2020  </div> 
               <div class="judul_pengumuman font5"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  </div> 
            </div>
            </a>
            <a href="#">
            <div class="box_pengumuman"> 
               <div class="tgl_pengumuman font4"> 12 September 2020  </div> 
               <div class="judul_pengumuman font5"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  </div> 
            </div>
            </a>
            <a href="#">
            <div class="box_pengumuman"> 
               <div class="tgl_pengumuman font4"> 12 September 2020  </div> 
               <div class="judul_pengumuman font5"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  </div> 
            </div>
            </a>

            <a href="#">
            <div class="box_pengumuman"> 
               <div class="tgl_pengumuman font4"> 12 September 2020  </div> 
               <div class="judul_pengumuman font5"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  </div> 
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
                <img  class="gambar_agenda" src="{{ asset('img/gambar 1.jpg') }}" width=" 100%" height="100%">
                <div class="tgl_pengumuman font6"> 12 September 2020  </div> 
                <div class="judul_pengumuman font9"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  </div> 
                </div>
                </a>
                <a href="#">
                <div class="box_agenda"> 
                <img  class="gambar_agenda" src="{{ asset('img/gambar 1.jpg') }}" width=" 100%" height="100%">
                <div class="tgl_pengumuman font6"> 12 September 2020  </div> 
                <div class="judul_pengumuman font9"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  </div> 
                </div>    
                </a>
                <a href="#">
                <div class="box_agenda"> 
                <img  class="gambar_agenda" src="{{ asset('img/gambar 1.jpg') }}" width=" 100%" height="100%">
                <div class="tgl_pengumuman font6"> 12 September 2020  </div> 
                <div class="judul_pengumuman font9"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  </div> 
                </div>    
                </a>
                <a href="#">
                <div class="box_agenda"> 
                <img  class="gambar_agenda" src="{{ asset('img/gambar 1.jpg') }}" width=" 100%" height="100%">
                <div class="tgl_pengumuman font6"> 12 September 2020  </div> 
                <div class="judul_pengumuman font9"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  </div> 
                </div>    
                </a>
                <a href=""><div class="buttonlink font6">More</div></a>
            </div>
            
        </div>                
        </div>
        </div>

        
</div>
<div class="box_alumni">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="gambarslide" src="{{ asset('img/rog.jpg') }}" >
      <div class="carousel-caption">
        <p class="boxkata font10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
        <p class="margin_antara"> </p>
        <p class="font5 warna">Vokasi UB</p>
        <p class="font5 warna"> Universitas Brawijaya </p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="gambarslide"src="{{ asset('img/gambar 2.jpg') }}" >
      <div class="carousel-caption">
         <p class="boxkata font10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
        <p class="margin_antara"> </p>
        <p class="font5 warna">Vokasi UB</p>
        <p class="font5 warna"> Universitas Brawijaya </p>
      </div>
    </div>
    ...
  </div>
</div>
</div>

<div class="box_content">
    <div class="judul_bagian font3">
        Kerja Sama
    </div>

    <div class="hr"></div>  
    <div class="box_kegiatan">
      <div class="box_gambar">
      <img class="gambar_kegiatan" src="{{ asset('img/gambar 2.jpg') }}" >
      </div>
      <div class="box_gambar">
      <img class="gambar_kegiatan" src="{{ asset('img/gambar 2.jpg') }}" >
      </div>
      <div class="box_gambar">
      <img class="gambar_kegiatan" src="{{ asset('img/gambar 2.jpg') }}" >
      </div>
      <div class="box_gambar">
      <img class="gambar_kegiatan" src="{{ asset('img/gambar 2.jpg') }}" >
      </div>
      <div class="box_gambar">
      <img class="gambar_kegiatan" src="{{ asset('img/gambar 2.jpg') }}" >
      </div>
    </div>
</div>

<div class="social text-center mb-3">
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