@extends('layouts.auth', ['title' => 'Akun Baru', 'bg' => ''])

@section('content')
<div class="auth-box question-box shadow border my-5 mx-auto">
  <a href="{{ route('home') }}">
    <img src="{{ asset('assets/images/logo-web.png') }}" alt="logo web" width="100" class="d-block mx-auto">
  </a>
  <h3 class="text-center mt-4 mb-5">Buat Akun Baru</h3>

  <h5>Nama :</h6>
    <p class="mb-4">{{ $name }}</p>
    <h5>Email :</h5>
    <p>{{ $email }}</p>

    <hr class="my-4">

    <form action="{{ route('social.question.store') }}?email={{ $email }}" method="POST">
      @csrf
      <div class="form-group mb-3">
        <label for="username" class="form-label fw-bold">Pilih Username</label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Masukkan username.." value="{{ old('username') }}">
        @error('username')
        <div class="ps-1 invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-web-primary text-center w-100 py-2 fw-semibold rounded-pill">Lanjut</button>
    </form>
    <p class="small text-center text-secondary m-0 mt-3">Sudah memiliki akun?
      <a href="{{ route('login') }}" class="text-web-primary">Masuk</a>
    </p>
</div>
@endsection
