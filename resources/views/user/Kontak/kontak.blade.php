@extends('layouts/userlayout')
@section('title', 'Fasilitas')

@section('content')

<div class="container-fluid background">
        <div class="row mt-4">
            <div class="col berita">
                Kontak
            </div>
        </div>
    </div>
<div class="container">

        <div class="row">
            <div class="col-lg-3">
                <h3>Kontak</h3>
                <p class="card-text"><i class="fas fa-home"></i>  Alamat</p>
                <p class="card-text"><i class="fas fa-phone"></i>  Telepon</p>
                <p class="card-text"><i class="fas fa-envelope"></i>   Email</p>
            </div>

            <div class="col-lg-9">
                <div class="google-maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15805.65636138837!2d112.6160264!3d-7.956088!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x11a949e002df2194!2sPendidikan%20Vokasi%20Universitas%20Brawijaya!5e0!3m2!1sid!2sid!4v1598330101269!5m2!1sid!2sid" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            
        </div>


</div>


@endsection