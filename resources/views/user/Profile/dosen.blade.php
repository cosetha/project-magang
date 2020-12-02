@extends('layouts/userlayout')
@section('title', 'Fasilitas')

@section('content')


<div class="container-margin">
        <div class="row">
            <div class="col-sm-8">
                <div class="box-visimisi">
                    <div class="navigasi font-roboto-13">
                        Home > Profil > Dosen dan Tenaga kerja
                        <div class="hr-navigasi"></div>
                    </div>

                    <div class="judul-visimisi">
                        <div class="judul_bagian font3">
                            Dosen
                        </div>
                        <div class="hr"></div>
                    </div>

                    <section id="team2">
                        <div class=" text-center ">
                            <div class="row row-cols-1 row-cols-md-4 mt-3">
                                @foreach($dosen as $d)
                                <div class="col-lg-3 col-md-6">
                                    <div class="card">
                                        <img src="{{asset('')}}{{$d->gambar}}" width=" 100%" height="100%" /> 
                                        <div class="card-body">
                                        <h5 class="card-title">{{$d->nama}}</h5>
                                        <p class="card-text">{!! $d->deskripsi !!} </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        </section>

                        <div class="judul-visimisi mt-5">
                            <div class="judul_bagian font3">
                                Tenaga Kerja
                            </div>
                            <div class="hr"></div>
                        </div>

                        <section id="team2">
                        <div class="text-center ">
                            <div class="row row-cols-1 row-cols-md-4 mt-3">
                                @foreach($tenaga as $t)
                                <div class="col-lg-3 col-md-6">
                                    <div class="card">
                                        <img src="{{ asset('') }}{{$t->gambar}}" width=" 100%" height="100%" /> 
                                        <div class="card-body">
                                        <h5 class="card-title">{{$t->nama}}</h5>
                                        <p class="card-text">{!! $t->deskripsi !!} </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>

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
                            <a href="#" style="text-decoration:none;">
                                Sejarah
                            </a>
                            <div class="hr-profile"></div>
                        </div>
                        <div class="isi-menu">
                            <a href="#" style="text-decoration:none;">
                                Visi dan Misi
                            </a>
                            <div class="hr-profile"></div>
                        </div>
                        <div class="isi-menu">
                            <a href="#" style="text-decoration:none;">
                                Struktur Organisasi
                            </a>
                            <div class="hr-profile"></div>
                        </div>
                        <div class="isi-menu">
                            <a href="#" style="text-decoration:none;">
                                Prestasi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection