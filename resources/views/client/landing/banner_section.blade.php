<section class="pt-5 pb-4">
  <h1 class="text-center fw-bold mb-2">Ajukan Pertanyaan dan</h1>
  <h1 class="m-0 text-center fw-bold mb-4">Dapatkan Bantuan dari Programmer Lainnya</h1>
  <p class="text-center">Dari Berbagai Bahasa Pemrograman, Framework, Tools Coding, dan Contoh Pengembangan Proyek</p>
  @php
  $tech = [
  'Android',
  'Bootstrap',
  'CodeIgniter',
  'CSS',
  'Firebase',
  'Git',
  'HTML',
  'Java',
  'Javascript',
  'Jquery',
  'Kotlin',
  'NodeJS',
  'Python',
  'PHP',
  'ReactJS',
  'SQL',
  'Swift'
  ];
  @endphp
  {{-- cara nyeluk image e engkok garek jupuken teko variabel $t misal {{ asset('assets/images/icons/'. $t . '.svg') }} --}}
  {{-- ojok lali jeneng file image e podokno koyok seng nde array cek dinamis --}}
  <div class="row mt-4 gap-3 justify-content-center">
    @foreach ($tech as $t)
    <div class="tech-card p-3 py-2 rounded-2 border border-web-primary d-flex align-items-center justify-content-center">
      <img src="{{ asset('assets/images/logo-web.png') }}" class="w-100" alt="">
    </div>
    @endforeach
  </div>

  <div class="text-center mt-4">
    <a href="/" class="btn btn-web-primary">Ajukan Pertanyaan</a>
  </div>

</section>
