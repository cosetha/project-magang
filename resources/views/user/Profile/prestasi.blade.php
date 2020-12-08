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
                    @foreach($data as $key=>$node)
                    <div class="judul-visimisi">
                        <div class="judul_bagian font3">
                            Prestasi {{$key}}
                        </div>
                        <div class="hr"></div>
                    </div>

                <div id="demo{{$key}}" class="carousel slide" data-ride="carousel">
                    <div class="container carousel-inner no-padding text-center ">
                        <section id="team">
                            @foreach($node->chunk(4) as $item)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <div class="card-deck" style="margin-top:70px;">
                                @foreach($item as $items)
                                    <div class="col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{ asset($items->gambar) }}" alt="" class="img-fluid rounded-circle w-75 mb-3" style="margin: -100px">
                                                <h5 class="card-title">{{$items->nama}}</h5>
                                                <p class="card-text">{{$items->tahun}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                            @endforeach
                        </section>
                <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo{{$key}}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#demo{{$key}}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
   
        @endforeach
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