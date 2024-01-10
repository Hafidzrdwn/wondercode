@extends('layouts.app', ['title' => 'Pengaturan'])

@section('style')
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="container" style="margin-top: 120px; margin-bottom:90px;">
  <div class="row justify-content-evenly align-items-start mb-5 position-relative">

    <div class="col-md-3 box shadow-sm border p-4">
      <div class="d-flex align-items-center gap-3">
        <a href="{{ route('user.profile', $user->username) }}" class="btn btn-sm btn-web-primary">
          <i class="fas fa-arrow-left"></i>
        </a>
        <h5 class="m-0">Pengaturan</h5>
      </div>

      <div class="d-flex align-items-start mt-4 pt-2">
        <div class="nav flex-column nav-pills w-100" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <p class="text-muted"><i class="fas fa-home me-2"></i>Pengaturan Umum</p>
          <button class="nav-link text-start ps-3 mb-2 @if(request()->query('type') == 'editprofil' || !request()->query('type')) active @endif" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">Edit Profil</button>
          <p class="text-muted mt-4"><i class="fas fa-user me-2"></i>Pengaturan Pribadi</p>
          <button class="nav-link text-start ps-3 mb-2" id="v-pills-changepass-tab" data-bs-toggle="pill" data-bs-target="#v-pills-changepass" type="button" role="tab" aria-controls="v-pills-changepass" aria-selected="false">Ubah Password</button>
          <button class="nav-link text-start ps-3" id="v-pills-account-tab" data-bs-toggle="pill" data-bs-target="#v-pills-account" type="button" role="tab" aria-controls="v-pills-account" aria-selected="false">Akun</button>
        </div>
      </div>
    </div>

    <div class="col-md-8 box shadow-sm border pb-4 pt-5 px-5">
      <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show @if(request()->query('type') == 'editprofil' || !request()->query('type')) active @endif" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
          @include('client.settings.editprofile')
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
@include('partials.modal-image-preview')
@include('partials.modal-crop-image')

@section('script')
<script src="https://unpkg.com/cropperjs"></script>
<script src="{{asset('js/profile.js')}}"></script>
@endsection
