<form action="{{ route('user.profile.update', $user->username) }}" id="formEditAdditional">
  <div class="mb-3">
    <label for="gender" class="form-label">Jenis Kelamin</label>
    <select name="gender" id="gender" class="form-control form-select">
      <option value="" selected disabled>Pilih jenis kelamin</option>
      <option value="Laki-laki" @if ($user->profile->gender == "Laki-laki")
        selected
        @endif>Laki-laki</option>
      <option value="Perempuan" @if ($user->profile->gender == "Perempuan")
        selected
        @endif>Perempuan</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="instance" class="form-label">Nama Instansi</label>
    <input type="text" class="form-control" id="instance" name="instance" placeholder="Contoh : (Sekolah, Kantor, Kampus)" value="{{ $user->profile->instance }}">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">No Telepon</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukkan no telepon" value="{{ $user->profile->phone }}">
  </div>
  <div class="mb-3">
    <label for="link_web" class="form-label">Link Portofolio</label>
    <input type="text" class="form-control" id="link_web" name="link_web" placeholder="https://...." value="{{ $user->profile->link_web }}">
  </div>

  <div class="d-flex gap-2">
    <button type="button" class="btn btn-danger btnBatal w-50">Batal</button>
    <button type="submit" class="btn btn-web-primary w-50">Edit</button>
  </div>
</form>
