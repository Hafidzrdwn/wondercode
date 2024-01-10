@extends('layouts.app', ['title' => ($name = auth()->user()->profile->name) ? $name : auth()->user()->username])

@section('style')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="container" style="margin-top: 120px; margin-bottom:90px;">
  <div class="row justify-content-center align-items-start h-100 mb-5">

    {{-- LEFT SIDE --}}
    <div class="side-left col-md-8">

      <div class="profile-box box w-100 shadow-sm border overflow-hidden">
        {{-- COVER IMAGE --}}
        <div class="cover-image w-100 position-relative" style="background: url({{ $user->profile->cover() }}) no-repeat; background-position: center;">
          <form>
            <label style="cursor: pointer;" for="cover_image">
              <i class="edit-cover-img fas fa-pen position-absolute rounded-circle"></i>
            </label>
            <input type="file" name="cover_image" class="image d-none" id="cover_image" />
          </form>
        </div>

        {{-- DETAIL PROFILE --}}
        <div class="row justify-content-evenly align-items-stretch detail-profile px-4">

          <div class="left-box col-md-5 pt-4 position-relative">

            <img src="@if(!$user->profile->avatar) {{ asset('assets/images/default.jpg') }} @else {{ $user->profile->avatar() }} @endif" alt="{{ $user->profile->name }}" class="avatar rounded-circle img-fluid bg-light position-absolute">
            <div class="followable-detail mx-auto d-flex justify-content-between align-items-center">
              <a href="" class="text-decoration-none text-dark text-center">
                <h5 class="m-0 fw-bold">0</h5>
                <p class="m-0 mt-1 text-opacity-50">Kontribusi</p>
              </a>
              <a href="" class="text-decoration-none text-dark text-center">
                <h5 class="m-0 fw-bold">0</h5>
                <p class="m-0 mt-1">Pengikut</p>
              </a>
              <a href="" class="text-decoration-none text-dark text-center">
                <h5 class="m-0 fw-bold">0</h5>
                <p class="m-0 mt-1">Diikuti</p>
              </a>
            </div>

            @if ($user->username == auth()->user()->username)
            <div class="btn-action gap-2 mt-4 d-flex justify-content-center text-center">
              <a href="{{ route('settings') }}" class="w-50 btn btn-secondary"><i class="fas fa-cog me-1"></i>Pengaturan</a>
              <a href="{{ route('settings') }}?type=editprofil" class="w-50 btn btn-web-primary"><i class="fas fa-user-edit me-1"></i>Edit profil</a>
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
          </div>

        </div>

      </div>

      <div class="top-badges-box box mt-4 w-100 mx-auto p-4 shadow-sm border">
        <h4 class="mb-4">Top Badges</h4>
        <div class="d-flex align-items-center justify-content-center gap-5">
          {{-- @for ($i = 1; $i <= 4; $i++) <div class="badge border rounded-circle border border-web-primary" style="width:100px; height:100px;"></div>@endfor --}}
          <h5 class="text-muted">
            Fitur ini masih dalam tahap pengembangan.
          </h5>
        </div>
      </div>

      <div class="works-box box w-100 mt-4 p-4 mx-auto border shadow-sm">
        <nav class="nav nav-pills nav-fill border-bottom border-secondary pb-3">
          <a class="nav-link active" aria-current="page" href="#">Forum</a>
          <a class="nav-link" href="#">Jawaban</a>
          <a class="nav-link" href="#">Blog</a>
          <a class="nav-link" href="#">Projek</a>
          <a class="nav-link" href="#">Tag</a>
        </nav>
      </div>



    </div>

    {{-- RIGHT SIDE --}}
    <div class="side-right col-md-4">

      <div class="friends-box box w-100 border p-4 shadow-sm">
        <h4>
          @if ($user->username == auth()->user()->username)
          Teman
          @else
          {{ $user->profile->name }}
          @endif
          Saya
        </h4>
        {{-- if have friends --}}
        <div class="row justify-content-center mt-4 gy-2">
          <div class="col-md-12 position-relative d-flex align-items-center justify-content-start gap-3 border py-3 rounded-2">
            <img class="friends-profile rounded-circle" src="{{ asset('storage/profiles/default.jpg') }}" alt="Friend Profile">
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
        <div class="row align-items-center mt-4">
          <div class="col-md-12 border border-web-primary py-3 rounded">
            <div class="d-flex align-items-center justify-content-center">
              <i class="fas fa-user-friends text-web-primary me-2" style="font-size: 30px;"></i>
              <h6 class="m-0 text-muted">Belum ada teman.</h6>
            </div>
          </div>
        </div>
      </div>

      <div class="detail-additional-box box w-100 p-4 border mt-4 position-relative shadow-sm">
        <div id="isAdditionalDetail" class="d-block">
          @include('client.user.additional_detail', $user)
        </div>
        <div data-edit-detail class="d-none">
          @include('client.user.edit_additional_detail', $user)
        </div>
      </div>
    </div>
  </div>

</div>

@include('partials.modal-image-preview')
@endsection

@section('script')
<script>
  $(document).ready(function() {

    const boxDetail = $('#isAdditionalDetail');
    const btnEditDetail = $('.btnEditDetail');


    $(btnEditDetail).click(function() {

      $(boxDetail).toggleClass('d-none d-block');
      $('[data-edit-detail]').toggleClass('d-none d-block');
      $('.alert').remove();

    })

    $('.btnBatal').click(function() {

      $(boxDetail).toggleClass('d-none d-block');
      $('[data-edit-detail]').toggleClass('d-none d-block');

    })

    $('#formEditAdditional').submit(function(e) {
      e.preventDefault();
      const data = $(this).serializeArray().reduce((obj, item) => {
        obj[item.name] = item.value;
        return obj;
      }, {});

      $.ajax({
        url: $(this).attr('action') + "?type=additional"
        , type: "PUT"
        , data: data
        , success: function(res) {
          if (res.status) {

            $(boxDetail).toggleClass('d-none d-block');
            $('[data-edit-detail]').toggleClass('d-none d-block');
            $('#user-gender').text((res.data.gender) ? res.data.gender : "-")
            $('#user-instance').text((res.data.instance) ? res.data.instance : "-")
            $('#user-phone').text((res.data.phone) ? res.data.phone : "-")

            $('#user-link > a').attr('href', (res.data.link_web) ? res.data.link_web : "#")
            if (res.data.link_web) {
              $('#user-link > a').text(res.data.link_web)
            } else {
              $('#user-link > a').addClass('text-decoration-none')
              $('#user-link > a').text("-")
            }


            $('body, html').animate({
              scrollTop: $('.detail-additional-box').offset().top - 150
            });

            $(`<div class="alert alert-dismissible fade show" style="background-color:#40ffd2; color:#1f866e;" role="alert">
              <strong>Profil</strong> Berhasil Diperbarui.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`).insertAfter('.additional-detail-heading');

          }
        }
        , error: function(error) {
          console.log(error);
        }
      })


    })

  })

</script>
<script src="{{ asset('js/profile.js') }}"></script>
@endsection
