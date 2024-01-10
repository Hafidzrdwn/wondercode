<div class="d-flex align-items-center justify-content-evenly mb-4">
  <div class="profile-image">
    <img src="{{ $user->profile->avatar() }}" width="160" class="border border-dark rounded-circle" alt="{{ $user->username }}" style="object-fit: cover; object-position: center;">
    <div class="dropdown-center mt-2">
      <p class="text-center text-web-primary text-change" style="cursor: pointer;" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Ubah Foto Profil</p>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li class="mb-2">
          <form method="POST">
            <label class="dropdown-item" style="cursor: pointer;" for="avatar">
              <i class="fas fa-upload me-2"></i>Foto profil baru
              <input type="file" name="avatar" class="image d-none" id="avatar" />
            </label>
          </form>
        </li>
        @if ($user->profile->avatar() != asset('storage/profiles/default.jpg'))
        <li>
          <form action="" method="POST">
            @method('delete')
            @csrf
            <button type="submit" class="dropdown-item dropdown-item-danger text-danger" onclick="return confirm('Are you sure to delete your profile??')">
              <i class="fas fa-trash-alt me-2"></i>Hapus foto profil
            </button>
          </form>
        </li>
        @endif
      </ul>
    </div>
  </div>
  <div class="profile-cover">
    <img src="{{ $user->profile->cover() }}" class="border shadow-sm rounded" style="width: 285px; height:165px; object-fit:cover; object-position: center;" alt="">
    <form method="POST" class="text-center mt-2">
      <label class="text-web-primary text-change" style="cursor: pointer;" for="cover_image">
        Ubah Gambar Sampul
        <input type="file" name="cover_image" class="image d-none" id="cover_image" />
      </label>
    </form>
  </div>
</div>

@if ($msg = Session::get('success'))
<x-alert type="success" :message="$msg"></x-alert>
@endif

<form action="">
  <div class="mb-4 row align-items-start form-group">
    <div class="col-5">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{ $user->username }}">
    </div>
    <div class="col-7">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control disabled" name="email" id="email" placeholder="Email" value="{{ $user->email }}" disabled>
    </div>
  </div>
  <div class="mb-4 row align-items-start form-group">
    <div class="col-6">
      <label for="name" class="form-label">Nama Lengkap</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Nama Lengkap" value="{{ $user->profile->name }}">
    </div>
    <div class="col-6">
      <label for="gender" class="form-label">Jenis Kelamin</label>
      <select name="gender" id="gender" class="form-control form-select">
        <option value="" selected disabled>Pilih Jenis Kelamin</option>
        <option value="Laki-laki" @if($user->profile->gender == 'Laki-laki') selected @endif>Laki-laki</option>
        <option value="Perempuan" @if($user->profile->gender == 'Perempuan') selected @endif>Perempuan</option>
      </select>
    </div>
  </div>
  <div class="mb-4 row align-items-start form-group">
    <div class="col-6">
      <label for="instance" class="form-label">Nama Instansi</label>
      <input type="text" class="form-control" name="instance" id="instance" placeholder="(ex : Sekolah, Kantor, Kampus)" value="{{ $user->profile->instance }}">
    </div>
    <div class="col-6">
      <label for="job" class="form-label">Pekerjaan</label>
      <input type="text" class="form-control" name="job" id="job" placeholder="(ex : Pelajar, Web Developer, dll)" value="{{ $user->profile->job }}">
    </div>
  </div>
  <div class="mb-4 row align-items-start form-group">
    <div class="col-7">
      <label for="address" class="form-label">Alamat / Lokasi</label>
      <input type="text" class="form-control" name="address" id="address" placeholder="Format : Kota, Provinsi, Negara" value="{{ $user->profile->address }}">
    </div>
    <div class="col-5">
      <label for="phone" class="form-label">No Telepon</label>
      <input type="text" class="form-control" name="phone" id="phone" placeholder="No Telepon" value="{{ $user->profile->phone }}">
    </div>
  </div>
  <div class="mb-4 row align-items-start form-group">
    <div class="col-6">
      <label for="link_web" class="form-label">Link Portofolio (web / dll)</label>
      <input type="text" class="form-control" name="link_web" id="link_web" placeholder="https://..." value="{{ $user->profile->link_web }}">
    </div>
    <div class="col-6">
      <label for="bio" class="form-label">Biodata</label>
      <textarea class="form-control" name="bio" id="bio" style="height:150px; resize:none;">{{ $user->profile->bio }}</textarea>
    </div>
  </div>
  <div class="text-end">
    <button type="submit" class="btn btn-web-primary">Kirim</button>
  </div>
</form>
