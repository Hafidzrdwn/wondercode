<footer class="p-5">
  <div class="row justify-content-between align-items-center">
    <div class="col-md-4">
      <img src="{{ asset('assets/images/logo-web.png') }}" style="width: 125px;" alt="">
    </div>
    <div class="col-md-4 text-end">
      <button class="btn btn-web-primary rounded-pill" id="btnBackToTop">
        Kembali ke atas
        <i class="fas fa-arrow-up ms-1"></i>
      </button>
    </div>
  </div>
  <h6 class="mt-3">Make World More Wonderful With WonderCode.</h6>

  <div class="row row-link justify-content-start mt-5">
    <div class="col-md-4 list-link">
      <h3 class="fw-bold mb-3">Produk</h3>
      <ul class="p-0" style="list-style: none;">
        <li class="mb-3"><a href="">Forum Q&A</a></li>
        <li class="mb-3"><a href="">Blog</a></li>
        <li class="mb-3"><a href="">Showcase Projek</a></li>
      </ul>
    </div>
    <div class="col-md-4 list-link">
      <h3 class="fw-bold mb-3">Company</h3>
      <ul class="p-0" style="list-style: none;">
        <li class="mb-3"><a href="">FAQ</a></li>
        <li class="mb-3"><a href="" type="button" data-bs-toggle="modal" data-bs-target="#aboutUs">Tentang</a></li>
        <li class="mb-3"><a href="" type="button" data-bs-toggle="modal" data-bs-target="#contactUs">Kontak</a></li>
      </ul>
    </div>
    <div class="col-md-4">
      <h3 class="fw-bold mb-3">Alamat</h3>
      <p>Jl. Smea No.4, Wonokromo, Kec. Wonokromo, Kota SBY, Jawa Timur 60243</p>
    </div>
  </div>
</footer>
<div class="end-footer bg-dark p-5 text-center" style="color:#a3a3a3;">
  <p class="mb-2">
    Copyright © 2023 WonderCode. All rights reserved
  </p>
  <p class="m-0">
    Made with <span class="text-danger">❤</span> by @hafidzrdwn & @dhamarasp in 🇮🇩
  </p>
</div>

<!-- Modal Tentang Kami -->
<div class="modal fade" id="aboutUs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tentang Kami</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img src="{{ asset('assets/images/logo-web.png') }}" style="width: 125px" alt="">
        </div>
        <br>
        <p style="text-align: justify">Kami adalah <b>pelajar</b> yang terdiri dari individu-individu yang memiliki semangat yang sama, yaitu untuk memberikan kontribusi positif untuk lingkungan sekolah. Kami percaya bahwa dengan bersatu, kami dapat mencapai tujuan bersama.</p>
        <br>
        <p class="fw-bold">~Tuhan Bersama Anak Kelas 12~</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-web-primary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Kontak -->
<div class="modal fade" id="contactUs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Kontak</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <div class="text-center">
          <img src="{{ asset('assets/images/contact_kami.jpg') }}" width="250px" class="mb-4" alt="">
          <div class="row">
            <div class="col fw-bold">
              Hafidz Ridwan Cahya <br>
              <i class="fab fa-instagram"></i>
              <a href="http://instagram.com/hafidzrdwn" target="_blank">@hafidzrdwn</a> <br>
              <i class="fab fa-whatsapp"></i>
              <a href="https://api.whatsapp.com/send?phone=6282141068404" target="_blank">082141068404</a>
            </div>
            <div class="col fw-bold">
              Dhamar Adhi Susyatama <br>
              <i class="fab fa-instagram"></i>
              <a href="http://instagram.com/dhamarasp" target="_blank">@dhamarasp</a> <br>
              <i class="fab fa-whatsapp"></i>
              <a href="https://api.whatsapp.com/send?phone=6289612759802" target="_blank">089612759802</a>
            </div>
          </div>
        </div>
        <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-web-primary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
