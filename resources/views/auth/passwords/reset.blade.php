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
                        <input id="email" type="hidden" class="form-control form-control-user" name="email" value="{{ $email ?? old('email') }}" placeholder="Masukkan Email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password Baru</label>

                        <div class="input-group" id="show_hide_password">
                          <input id="password" type="password" class="form-control form-control-user" name="password" placeholder="Masukkan Password Baru" required autocomplete="new-password" minlength="8" autofocus>
                          <!-- Show Hide Password Component -->
                          <a href=""><div class="input-group-addon eye">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                          </div></a>
                          <!-- Show Hide Password Component -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">Konfirmasi Password</label>

                        <div class="input-group" id="show_hide_password-2">
                          <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Konfirmasi Password" required autocomplete="new-password" minlength="8" autofocus>
                          <!-- Show Hide Password Component -->
                            <a href=""><div class="input-group-addon eye">
                              <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </div></a>
                            <!-- Show Hide Password Component -->
                          </div>
                        </div>

                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Reset Password
                  </button>
                </form>
                <hr>
                <div class="text-left">
                    <a class="small" href="{{ url('/login') }}">< Batal</a>
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