<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img width="75" class="me-5" src="{{ asset('assets/images/logo-web.png') }}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('forum') ? 'active' : '' }}" href="{{ route('forum') }}">Forum</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Produk
          </a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="#">
                <p class="fw-bold m-0">Forum Q&A</p>
                <small class="text-secondary">Pertanyaan dan Jawaban</small>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <p class="fw-bold m-0">Blog</p>
                <small class="text-secondary">Informasi, Motivasi dan Diskusi</small>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <p class="fw-bold m-0">Showcase projek</p>
                <small class="text-secondary">Sharing dan Dapatkan Feedback</small>
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <div class="search-box">
        <input class="search-input" type="text" name="" placeholder="Cari apa saja..." autocomplete="off">
        <button class="search-btn" href="#">
          <img src="{{ asset('assets/images/search.svg') }}" alt="search-image" id="img-search">
        </button>
      </div>
      <ul class="navbar-nav">
        @auth
        <li class="ms-1 nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="text-dark fw-normal">{{ Auth::user()->username }}</span>
            <img class="ms-1 rounded-circle" id="profile-nav" width="40" src="{{ asset('assets/images/default.jpg') }}" alt="">
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="">
                <i class="fas fa-user me-2"></i> Profil saya
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li class="nav-logout">
              <form id="formLogout" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" id="btnLogout" class="dropdown-item dropdown-item-danger text-danger">
                  <i class="fas fa-sign-out-alt me-2"></i>
                  Keluar
                </button>
              </form>
            </li>
          </ul>
        </li>
        @else
        <div class="btn-group">
          <a href="{{ route('login') }}" id="btn-login" class="ms-4 me-3 btn btn-web-outline-primary">Masuk</a>
          <a href="{{ route('register') }}" id="btn-register" class="btn btn-web-primary">Daftar</a>
        </div>
        @endauth
      </ul>
    </div>
  </div>
</nav>
