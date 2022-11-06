<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img class="w-25" src="{{ asset('assets/images/logo-web.png') }}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Forum</a>
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
        <input class="search-input" type="text" name="" placeholder="Search" autocomplete="off">
        <button class="search-btn" href="#" style="border: none; background: transparent;">
          <img src="{{ asset('assets/images/search.svg') }}" alt="search-image" id="img-search">
        </button>
      </div>
      <div class="btn-group">
        <a href="" id="btn-login" class="ms-4 me-3 btn btn-web-outline-primary">Masuk</a>
        <a href="" id="btn-register" class="btn btn-web-primary">Daftar</a>
      </div>
    </div>
  </div>
</nav>
