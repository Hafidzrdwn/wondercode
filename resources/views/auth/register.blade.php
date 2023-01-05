@extends('layouts.auth', ['title' => 'Daftar', 'bg' => asset('assets/images/register-bg.webp')])

@section('content')
<div class="auth-box register-box row justify-content-center align-items-center my-5 mx-auto">
  <div class="col-lg-6">
    <img width="350" src="{{ asset('assets/images/register-hero.svg') }}" alt="register hero">
    <h3 class="fw-bold my-4">Make World More Wonderful With <span class="text-web-primary">WonderCode!</span></h3>
    <div class="row mb-3">
      <div class="col-1">
        <svg width="11" height="11" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="7.5" cy="8.46655" r="7.5" fill="#21caa2"></circle>
        </svg>
      </div>
      <div class="col-11">
        <p class="m-0">Perbesar relasi dengan seluruh programmer Indonesia lainnya.</p>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-1">
        <svg width="11" height="11" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="7.5" cy="8.46655" r="7.5" fill="#21caa2"></circle>
        </svg>
      </div>
      <div class="col-11">
        <p class="m-0">Perluas wawasan seputar dunia teknologi.</p>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-1">
        <svg width="11" height="11" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="7.5" cy="8.46655" r="7.5" fill="#21caa2"></circle>
        </svg>
      </div>
      <div class="col-11">
        <p class="m-0">Tingkatkan reputasi sebagai programmer.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-1">
        <svg width="11" height="11" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="7.5" cy="8.46655" r="7.5" fill="#21caa2"></circle>
        </svg>
      </div>
      <div class="col-11">
        <p class="m-0">Ciptakan blog edukasi yang bermanfaat.</p>
      </div>
    </div>
  </div>
  {{-- form regist --}}
  <div class="col-lg-6">
    <h3 class="text-center">Buat Akun Baru</h3>
    <form action="{{ route('registration') }}" method="POST" class="mt-5 mx-auto">
      @csrf
      <div class="form-group mb-3">
        <label for="username" class="form-label fw-bold">Username</label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" id="username" name="username" placeholder="Masukkan username anda">
        @error('username')
        <div class="ps-1 invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group mb-3">
        <label for="email" class="form-label fw-bold">Email</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="Masukkan email anda">
        @error('email')
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
          <i id="showHidePass" class="@error('password') is-invalid @enderror fas fa-eye border border-web-primary rounded p-2 position-absolute fs-5"></i>
        </div>
      </div>
      <div class="form-group mb-3">
        <label for="captcha" class="form-label fw-bold">Captcha</label>
        <div class="captcha position-relative">
          <span class="cp-img">{!! captcha_img() !!}</span>
          <span class="reload-captcha position-absolute text-web-primary fs-4 m-0 px-2 border ms-2">&#x21bb;</span>
        </div>
        <input type="text" class="form-control mt-3 @error('captcha') is-invalid @enderror" id="captcha" name="captcha" placeholder="Jawab captcha diatas">
        @error('captcha')
        <div class="ps-1 invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-web-primary text-center w-100 py-2 fw-semibold rounded-pill">Daftar</button>
      </div>
      <div class="login-or w-100 d-flex justify-content-center align-items-center small text-secondary">
        <small>atau daftar dengan</small>
      </div>
      <div class="mt-3 mb-4 gap-3 d-flex justify-content-between align-items-center">
        <a href="" class="btn btn-light w-50 py-2 shadow-sm">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.6 12.23c0-.68-.05-1.36-.17-2.03H12v3.85h5.4a4.63 4.63 0 0 1-2 3.04v2.5h3.23c1.89-1.75 2.98-4.32 2.98-7.36Z" fill="#4285F4"></path>
            <path d="M12 22c2.7 0 4.97-.88 6.63-2.41l-3.22-2.5c-.9.6-2.06.95-3.4.95a5.99 5.99 0 0 1-5.62-4.12H3.06v2.57A10 10 0 0 0 12 22Z" fill="#34A853"></path>
            <path d="M6.39 13.92a5.99 5.99 0 0 1 0-3.83V7.5H3.06a10 10 0 0 0 0 8.98l3.33-2.57Z" fill="#FBBC04"></path>
            <path d="M12 5.96c1.43-.02 2.8.51 3.84 1.5l2.85-2.86A10 10 0 0 0 3.06 7.51L6.4 10.1c.79-2.37 3-4.13 5.61-4.13Z" fill="#EA4335"></path>
          </svg>
          <small class="ms-1">Sign up with Google</small>
        </a>
        <a href="" class="btn btn-dark w-50 py-2 shadow-sm">
          <svg stroke="currentColor" fill="currentColor" stroke-width="0" role="img" viewBox="0 0 24 24" height="1.4em" width="1.4em" xmlns="http://www.w3.org/2000/svg">
            <title></title>
            <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"></path>
          </svg>
          <small class="ms-1">Sign up with Github</small>
        </a>
      </div>
      <p class="small text-center text-secondary m-0">Sudah memiliki akun?
        <a href="{{ route('login') }}" class="text-web-primary">Masuk</a>
      </p>
    </form>
  </div>
</div>

@endsection

@section('script')
<script>
  $(document).ready(function() {
    $('.reload-captcha').click(function() {
      $.ajax({
        type: 'GET'
        , url: '/reload-captcha'
        , beforeSend: function() {
          $('.captcha > span.cp-img').html('<i class="fa fa-spinner fa-spin mt-2 text-web-primary"></i>');
        }
        , success: function(data) {
          $('.captcha > span.cp-img').html(data.captcha);
        }
      });
    });
  });

</script>
@endsection
