<h4 class="additional-detail-heading" style="margin-bottom: 42px;">Detail Tambahan</h4>
<button class="btn btn-web-outline-primary p-0 position-absolute btnEditDetail" style="font-size:14px; padding: 5px 10px !important; right:18px; top:22px;">
  <i class="fas fa-pen"></i>
</button>

<div class="mb-4 d-flex align-items-center justify-content-start gap-4">
  <i class="fas fa-eye text-web-primary" style="font-size: 20px;"></i>
  <div class="detail">
    <h6 class="m-0 mb-2">Kunjungan Profil</h6>
    <p class="m-0">0</p>
  </div>
</div>
<div class="mb-4 d-flex align-items-center justify-content-start gap-4">
  <i class="fas fa-envelope text-web-primary" style="font-size: 20px;"></i>
  <div class="detail">
    <h6 class="m-0 mb-2">Email</h6>
    <p class="m-0">{{ $user->email }}</p>
  </div>
</div>
<div class="mb-4 d-flex align-items-center justify-content-start gap-4">
  <i class="fas fa-venus-mars text-web-primary" style="font-size: 20px;"></i>
  <div class="detail">
    <h6 class="m-0 mb-2">Jenis Kelamin</h6>
    <p class="m-0" id="user-gender">{{ ($gender = $user->profile->gender) ? $gender : "-" }}</p>
  </div>
</div>
<div class="mb-4 d-flex align-items-center justify-content-start gap-4">
  <i class="fas fa-building text-web-primary" style="font-size: 20px;"></i>
  <div class="detail">
    <h6 class="m-0 mb-2">Nama Instansi</h6>
    <p class="m-0" id="user-instance">{{ ($instance = $user->profile->instance) ? $instance : "-" }}</p>
  </div>
</div>
<div class="mb-4 d-flex align-items-center justify-content-start gap-4">
  <i class="fas fa-phone-alt text-web-primary" style="font-size: 20px;"></i>
  <div class="detail">
    <h6 class="m-0 mb-2">No Telepon</h6>
    <p class="m-0" id="user-phone">{{ ($phone = $user->profile->phone) ? $phone : "-" }}</p>
  </div>
</div>
<div class="mb-4 d-flex align-items-center justify-content-start gap-4">
  <i class="fas fa-briefcase text-web-primary" style="font-size: 20px;"></i>
  <div class="detail">
    <h6 class="m-0 mb-2">Link Portofolio</h6>
    <p class="m-0" id="user-link"><a href="{{ ($link_web = $user->profile->link_web) ? $link_web : "#" }}" target="_blank" @if (!$user->profile->link_web)
        class="text-decoration-none"
    @endif>{{ ($link_web = $user->profile->link_web) ? $link_web : "-" }}</a></p>
  </div>
</div>
<div class="mb-2 d-flex align-items-center justify-content-start gap-4">
  <i class="fas fa-calendar-alt text-web-primary" style="font-size: 20px;"></i>
  <div class="detail">
    <h6 class="m-0 mb-2">Tanggal Bergabung</h6>
    <p class="m-0">{{ date('d-m-Y', strtotime($user->created_at)) }}</p>
  </div>
</div>
