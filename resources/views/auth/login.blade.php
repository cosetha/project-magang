@extends('layouts.loginLayout')
@section('title', 'Login')

@section('content')
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
                  <h1 class="h4 text-gray-900 mb-4">Login</h1>
                </div>
                <form class="user" method="POST" action="{{ route('login') }}">
                @csrf
                  <div class="form-group">
                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="exampleInputEmail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <div class="input-group" id="show_hide_password">
                      <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="inputPassword" placeholder="Password" name="password" required autocomplete="current-password">
                      <!-- Show Hide Password Component -->
                      <a href=""><div class="input-group-addon eye">
                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                      </div></a>
                      <!-- Show Hide Password Component -->
                    </div>
                    @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input type="checkbox" class="custom-control-input" id="customCheck"  name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="custom-control-label" for="customCheck">Remember Me</label>
                    </div>
                  </div>
                  <button href="{{ url('dashboard') }}" type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                </form>
                <hr>
                <div class="text-right">
                  <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
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
