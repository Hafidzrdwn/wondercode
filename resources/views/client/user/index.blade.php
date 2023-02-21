@extends('layouts.app', ['title' => auth()->user()->profile->name])

@section('style')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="container mt-5">
  <div class="row justify-content-center align-items-start mb-5">
    <div class="side-left col-md-8">

      <div class="profile-box box w-100 shadow overflow-hidden">
        {{-- COVER IMAGE --}}
        <div class="cover-image w-100 position-relative" style="background: url({{ asset('assets/images/cover.webp') }}) no-repeat center center;">
          <i class="edit-cover-img fas fa-pen position-absolute rounded-circle"></i>
        </div>

        {{-- DETAIL PROFILE --}}
        <div class="row justify-content-evenly align-items-stretch detail-profile px-4">

          <div class="left-box col-md-5 pt-4 position-relative">

            <img src="@if(!$user->profile->avatar) {{ asset('assets/images/default.jpg') }} @else {{ $user->profile->avatar() }} @endif" alt="{{ $user->profile->name }}" class="avatar rounded-circle img-fluid bg-light position-absolute">
            <div class="followable-detail mx-auto d-flex justify-content-evenly align-items-center">
              <a href="" class="text-decoration-none text-dark text-center">
                <h5 class="m-0 fw-bold">1200</h5>
                <p class="m-0 mt-1 text-opacity-50">Kontribusi</p>
              </a>
              <a href="" class="text-decoration-none text-dark text-center">
                <h5 class="m-0 fw-bold">1200</h5>
                <p class="m-0 mt-1">Pengikut</p>
              </a>
              <a href="" class="text-decoration-none text-dark text-center">
                <h5 class="m-0 fw-bold">1200</h5>
                <p class="m-0 mt-1">Diikuti</p>
              </a>
            </div>

            @if ($user->username == auth()->user()->username)
            <div class="btn-action gap-2 mt-4 d-flex justify-content-center text-center">
              <a href="" class="w-50 btn btn-secondary"><i class="fas fa-cog me-1"></i>Pengaturan</a>
              <a href="" class="w-50 btn btn-web-primary"><i class="fas fa-user-edit me-1"></i>Edit profil</a>
            </div>
            <a href="" class="w-100 btn btn-sm btn-web-outline-primary" style="margin-top: 14px;"><i class="fas fa-pencil-alt me-2"></i>Buat postingan</a>
            @endif

          </div>
          <div class="right-box ps-4 col-md-7 position-relative">
            @if ($user->profile->name)
            <h4 class="m-0">{{ $user->profile->name }}</h4>
            @endif
            <div class="m-0" style="margin-bottom: 17px !important;">
              <p class="m-0" style="color:#4e4e4e; font-size:16px;">
                {{ '@' . $user->username }}
                @if ($user->profile->job)
                <span class="d-inline-block lh-100" style="font-size:15px;">
                  | {{ $user->profile->job }}
                </span>
                @endif
              </p>
            </div>

            @if (!$user->profile->name)
            <div class="w-100 p-3 border border-web-primary rounded-2 text-center">
              <h4 class="m-0">
                <span class="badge text-web-primary">
                  Mohon lengkapi data profil anda.
                </span>
              </h4>
              <small class="text-muted">Tekan tombol edit profil di samping.</small>
            </div>
            @endif

            @if ($user->profile->bio)
            <p class="m-0 text-break" style="font-size: 14px; color:#6c6c6c;">{{ $user->profile->bio }}</p>
            @endif
            <p class="m-0 py-2 px-3 rounded position-absolute" style="font-size:13px; background-color:#f1f1f1; width: fit-content; color:#4e4e4e; bottom:3px;">
              <i class="fas fa-map-marker-alt me-2"></i>
              @if ($user->profile->address)
              {{ $user->profile->address }}
              @else
              Edit lokasi anda.
              @endif
            </p>

            {{-- <a href="" class="text-decoration-none btn btn-web-outline-primary py-1 px-2 position-absolute" style="font-size:13px;"><i class="fas fa-user-edit me-1"></i>Edit profil</a> --}}
          </div>

        </div>

      </div>


    </div>
    <div class="side-right col-md-4">

      <div class="friends-box box w-100 border p-4">
        <h4>
          @if ($user->username == auth()->user()->username)
          My
          @else
          {{ $user->profile->name . "'s" }}
          @endif
          Friends
        </h4>
        {{-- if have friends --}}
        <div class="row justify-content-center mt-4 gy-2">
          <div class="col-md-12 position-relative d-flex align-items-center justify-content-start gap-3 border border-web-primary py-3 rounded-2">
            <img class="friends-profile" src="{{ asset('storage/profiles/default.jpg') }}" alt="Friend Profile">
            <div class="detail">
              <h6 class="m-0">Dhamar Adhi</h6>
              <small class="m-0 text-secondary">Back-End Developer</small>
            </div>
            <a href="#" class="position-absolute friends-icon-eye">
              <i class="fas fa-eye text-web-primary"></i>
            </a>
          </div>
          <div class="col-md-12 position-relative d-flex align-items-center justify-content-start gap-3 border py-3 rounded-2">
            <img class="friends-profile" src="{{ asset('storage/profiles/default.jpg') }}" alt="Friend Profile">
            <div class="detail">
              <h6 class="m-0">Dhamar Adhi</h6>
              <small class="m-0 text-secondary">Back-End Developer</small>
            </div>
            <a href="#" class="position-absolute friends-icon-eye">
              <i class="fas fa-eye text-web-primary"></i>
            </a>
          </div>
          <div class="col-md-12 position-relative d-flex align-items-center justify-content-start gap-3 border py-3 rounded-2">
            <img class="friends-profile" src="{{ asset('storage/profiles/default.jpg') }}" alt="Friend Profile">
            <div class="detail">
              <h6 class="m-0">Dhamar Adhi</h6>
              <small class="m-0 text-secondary">Back-End Developer</small>
            </div>
            <a href="#" class="position-absolute friends-icon-eye">
              <i class="fas fa-eye text-web-primary"></i>
            </a>
          </div>
          <div class="col-md-12 position-relative d-flex align-items-center justify-content-start gap-3 border py-3 rounded-2">
            <img class="friends-profile" src="{{ asset('storage/profiles/default.jpg') }}" alt="Friend Profile">
            <div class="detail">
              <h6 class="m-0">Dhamar Adhi</h6>
              <small class="m-0 text-secondary">Back-End Developer</small>
            </div>
            <a href="#" class="position-absolute friends-icon-eye">
              <i class="fas fa-eye text-web-primary"></i>
            </a>
          </div>
        </div>
        {{-- if not --}}
      </div>

    </div>
  </div>
</div>
@endsection
