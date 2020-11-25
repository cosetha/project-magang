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

                    <div class="judul-visimisi">
                        <div class="judul_bagian font3">
                            Struktur Organisasi 
                        </div>
                        <div class="hr"></div>
                    </div>

                    <div class="kotak-struktur">    
                        <img class="gambar-struktur" src="{{ asset('img/gambar 2.jpg') }}" >
                    </div>

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