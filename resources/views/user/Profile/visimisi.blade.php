@extends('layouts/userlayout')
@section('title', 'Visi Misi')

@section('content')


    <div class="container-margin">
        <div class="row">
            <div class="col-sm-8">
                <div class="box-visimisi">
                    <div class="navigasi font-roboto-13">
                        Home > Profil > Visi dan Misi
                        <div class="hr-navigasi"></div>
                    </div>

                    <div class="judul-visimisi">
                        <div class="font-roboslab-24">
                        VISI dan MISI
                        </div>
                    </div>

                    <div class="kotak-visi">
                        <div class="kotak-visi">
                            @foreach($visimisi as $vm)
                            <div>{!! $vm->deskripsi !!}</div>
                            @endforeach
                        </div>
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
