@extends('layouts.auth', ['title' => 'Masuk', 'bg' => asset('assets/images/login-bg.webp')])

@section('content')
<section id="loginHero">
  <div class="auth-box login-box my-5 mx-auto">
    <a href="{{ route('home') }}">
      <img src="{{ asset('assets/images/logo-web.png') }}" alt="logo web" width="100" class="d-block mx-auto">
    </a>
    @if ($msg = Session::get('success'))
    <x-alert type="success" :message="$msg"></x-alert>
    @endif
    @if ($msg = Session::get('error'))
    <x-alert type="danger" :message="$msg"></x-alert>
    @endif
    <form action="{{ route('login.auth') }}" method="POST" class="@if(Session::has('success') || Session::has('error')) mt-0 @else mt-5 @endif">
      @csrf
      <div class="form-group mb-3">
        <label for="usernameEmail" class="form-label fw-bold">Username atau email</label>
        <input type="text" class="form-control @error('usernameEmail') is-invalid @enderror" id="usernameEmail" name="usernameEmail" placeholder="Username atau email" value="{{ old('usernameEmail') }}">
        @error('usernameEmail')
        <div class="ps-1 invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group mb-3 position-relative row">
        <div class="col-lg-11">
          <label for="password" class="form-label fw-bold">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan setidaknya 6 karakter">
          @error('password')
          <div class="ps-1 invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="col-auto">
          <i id="showHidePass" class="@error('password') is-invalid @enderror eye-login fas fa-eye border border-web-primary rounded p-2 position-absolute fs-5"></i>
        </div>
      </div>
      <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="remember" id="remember">
        <label class="form-check-label small" for="remember">
          Ingat saya
        </label>
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-web-primary text-center w-100 py-2 fw-semibold rounded-pill">Masuk</button>
      </div>
      <div class="login-or w-100 d-flex justify-content-center align-items-center small text-secondary">
        <small>atau masuk dengan</small>
      </div>
      <div class="mt-3 mb-4 gap-3 d-flex justify-content-between align-items-center">
        <a href="{{ route('google.redirect') }}" class="btn btn-light w-50 py-2 shadow-sm">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.6 12.23c0-.68-.05-1.36-.17-2.03H12v3.85h5.4a4.63 4.63 0 0 1-2 3.04v2.5h3.23c1.89-1.75 2.98-4.32 2.98-7.36Z" fill="#4285F4"></path>
            <path d="M12 22c2.7 0 4.97-.88 6.63-2.41l-3.22-2.5c-.9.6-2.06.95-3.4.95a5.99 5.99 0 0 1-5.62-4.12H3.06v2.57A10 10 0 0 0 12 22Z" fill="#34A853"></path>
            <path d="M6.39 13.92a5.99 5.99 0 0 1 0-3.83V7.5H3.06a10 10 0 0 0 0 8.98l3.33-2.57Z" fill="#FBBC04"></path>
            <path d="M12 5.96c1.43-.02 2.8.51 3.84 1.5l2.85-2.86A10 10 0 0 0 3.06 7.51L6.4 10.1c.79-2.37 3-4.13 5.61-4.13Z" fill="#EA4335"></path>
          </svg>
          <small class="ms-1">Log in with Google</small>
        </a>
        <a href="{{ route('github.redirect') }}" class="btn btn-dark w-50 py-2 shadow-sm">
          <svg stroke="currentColor" fill="currentColor" stroke-width="0" role="img" viewBox="0 0 24 24" height="1.4em" width="1.4em" xmlns="http://www.w3.org/2000/svg">
            <title></title>
            <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"></path>
          </svg>
          <small class="ms-1">Log in with Github</small>
        </a>
      </div>
      <p class="small text-center text-secondary m-0">Belum memiliki akun?
        <a href="{{ route('register') }}" class="text-web-primary">Daftar</a>
      </p>
    </form>
  </div>
</section>
@endsection

@section('script')
<script>
  $(document).ready(function() {
    $('.alert > button.btn-close').click(function() {
      $('form').removeClass('mt-0');
      $('form').addClass('mt-5');
    });
  });

</script>
@endsection
