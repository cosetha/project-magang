@extends('layouts.loginLayout')
@section('title', 'Reset Password')

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
                  <h1 class="h4 text-gray-900 mb-2">Reset Password</h1>
                </div>
                <br>
                <form class="user" method="POST" action="{{ route('password.update') }}">
                @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <label for="email">E-Mail</label>

                        <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Masukkan Email" required disabled>

                        @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password Baru</label>

                        <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Password Baru" required autocomplete="new-password" minlength="8" autofocus>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">Konfirmasi Password</label>

                        <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Konfirmasi Password" required autocomplete="new-password" minlength="8" autofocus>
                    </div>

                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Reset Password
                  </button>
                </form>
                <hr>
                <div class="text-left">
                    <a class="small" href="{{ url('/') }}">< Batal</a>
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