@extends('layouts.app', ['title' => 'Best Tech Forum'])
@section('style')
<style>
  h1.hero-heading {
    font-size: 38px;
  }

  .text-hero {
    color: #333333d6;
    width: 90%;
  }

  .count-card-small {
    width: 310px;
    padding: 20px;
  }

  .count-card-small>p {
    font-size: 15px;
  }

  .service-card-small {
    width: 325px;
    height: 280px;
    text-align: center;
    padding: 28px 22px;
    border-radius: 8px;
    border-bottom: 6px solid #21caa2;
    box-shadow: 0 0 18px rgba(56, 56, 56, 0.2);
  }

  .service-card-small>p {
    font-size: 14px;
    color: #333333ee;
  }

  .service-card-small>img {
    width: 55px;
  }

  /* FEATURE */
  .feature-card {
    width: 325px;
    padding: 30px 22px;
    padding-left: 65px;
    border-radius: 9px;
  }

  .feature-card>.image-container {
    width: 130px;
    height: 130px;
    padding: 20px;
    border: 2px solid #21caa2;
    top: 50%;
    transform: translateY(-47%);
    left: -100px;
  }

  .tech-card {
    width: 100px;
    height: 100px
  }

  .tech-card>img {
    width: 55px !important;
  }

  footer {
    border-top: 3px solid #f58d50;
  }

  footer>.row-link>.list-link>ul>li>a {
    color: #333;
    text-decoration: none;
  }

  footer>.row-link>.list-link>ul>li>a:hover {
    color: #21caa2;
  }

</style>
@endsection
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
