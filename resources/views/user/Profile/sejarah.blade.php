@extends('layouts/userlayout')
@section('title', 'Fasilitas')

@section('content')


      <div class="container-margin">
        <div class="row">
            <div class="col-sm-8">
                <div class="box-visimisi">
                    <div class="navigasi font-roboto-13">
                        Home > Profil > Struktur
                        <div class="hr-navigasi"></div>
                    </div>
                    @foreach($head ?? '' as $item)
                    <div class="judul-visimisi">
                        <div class="judul_bagian font3">
                        <h2>{{$item['judul']}}</h2>
                        </div>
                        <div class="hr"></div>
                    </div>

                    <div class="container">
                        <p>{!! $item['deskripsi'] !!}</p>
                    </div>

                    @endforeach


                <!-- <div class="timeline mt-5">

                    <div class="container-tl left">
                        <div class="content">
                          <h2>2017</h2>
                          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, sunt magnam quaerat laboriosam, consequatur fugit alias nemo minima nulla aut eum rerum maiores. Id beatae vel assumenda. Quos, sed expedita. Consectetur, quasi. Recusandae, consequatur illum.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt molestiae nam perspiciatis, pariatur in qui minus aperiam autem dignissimos eos.
                          </p>
                        </div>
                    </div>

                    <div class="container-tl right">
                      <div class="content">
                        <h2>2016</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio nobis nemo ex minus possimus. Magnam ullam tempore dolorum voluptatibus ex?</p>
                      </div>
                    </div>

                    <div class="container-tl left">
                      <div class="content">
                        <h2>2015</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio nobis nemo ex minus possimus. Magnam ullam tempore dolorum voluptatibus ex?</p>
                      </div>
                    </div>

                    <div class="container-tl right">
                      <div class="content">
                        <h2>2014</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio nobis nemo ex minus possimus. Magnam ullam tempore dolorum voluptatibus ex?</p>
                      </div>
                    </div>

                    <div class="container-tl left">
                      <div class="content">
                        <h2>2013</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio nobis nemo ex minus possimus. Magnam ullam tempore dolorum voluptatibus ex?</p>
                      </div>
                    </div>

                </div> -->

                </div>
            </div>

            <div class="col-sm-4">
                <div class="box-menu">
                    <div class="judul-menu font8px">
                        PROFIL
                    </div>
                    <div class="menu font10">
                        <!-- bold jika di click -->
                        <div class="isi-menu">
                            <a href="/gsejarah" style="text-decoration:none;">
                                Sejarah
                            </a>
                            <div class="hr-profile"></div>
                        </div>
                        <div class="isi-menu">
                            <a href="/gvisimisi" style="text-decoration:none;">
                                Visi dan Misi
                            </a>
                            <div class="hr-profile"></div>
                        </div>
                        <div class="isi-menu">
                            <a href="/gstruktur" style="text-decoration:none;">
                                Struktur Organisasi
                            </a>
                            <div class="hr-profile"></div>
                        </div>
                        <div class="isi-menu">
                            <a href="/gprestasi" style="text-decoration:none;">
                                Prestasi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>




@endsection
