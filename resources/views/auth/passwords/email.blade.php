@extends('layouts.loginLayout')
@section('title', 'Lupa Password')

@section('content')
<body class="bg-gradient-primary">

<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9 login-form">

      <div class="card o-hidden border-0 shadow-lg my-2">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-2">Forgot Your Password ?</h1>
                  <p class="mb-4">Harap masukkan Email anda yang terdaftar, Kami akan mengirimkan anda sebuah Email untuk melakukan proses Verifikasi.</p>
                </div>
                <form class="user" method="POST" action="{{ route('password.email') }}">
                  @csrf
                  <div class="form-group">
                    <input id="email" type="email" class="form-control form-control-user" name="email" value="{{ old('email') }}" placeholder="Masukkan Email" required autocomplete="email" autofocus>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Kirim Link Reset Password
                  </button>
                </form>
                <hr>
                <div class="text-left">
                    <a class="small" href="{{ url('/login') }}">< Kembali</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection