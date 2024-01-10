@extends('layouts.app', ['title' => 'Best Tech Forum'])

@section('content')
<div class="container py-5" style="margin-top: 85px;">

  <div class="row py-5 mb-5 justify-content-between align-items-center">
    <div class="col-md-6">
      <h2 class="text-web-primary fw-bold">
        WonderCode
      </h2>
      <h1 class="hero-heading fw-bold">Satu Tempat Untuk Seluruh Penggemar Teknologi</h1>
      <p class="text-hero mt-3 mb-4">
        Temukan diskusi terkini dengan solusi terbaik dan kumpulan artikel menarik untuk memperluas wawasan anda di bidang teknologi.
      </p>
      <form method="GET" action="{{ route('register') }}" autocomplete="off">
        <div class="d-flex justify-content-start align-items-center gap-2">
          <input name="email" type="text" class="form-control w-50" placeholder="Masukkan email anda">
          <button class="btn btn-web-primary">Daftar</button>
        </div>
      </form>
    </div>
    <div class="col-md-6">
      <img class="w-100" src="{{ asset('assets/images/hero-landing.svg') }}" alt="Landing Page Hero Image">
    </div>
  </div>

  @include('client.landing.count_section')
  @include('client.landing.service_section')
  @include('client.landing.feature_section')
  @include('client.landing.banner_section')

</div>
@endsection
