<div class="modal fade" id="imagePreview" tabindex="-1" aria-labelledby="imagePreviewLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imagePreviewLabel">Preview Gambar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="img-container">
          <div class="row align-items-center justify-content-around">
            <div class="col-md-8">
              <img src="" class="w-100 rounded-2 mb-3" id="preview" />
              <h6 class="text-center">Gambar di atas akan dijadikan Gambar Sampul baru anda. Sudah Yakin?</h6>
            </div>
          </div>
          <div class="row justify-content-center align-items-center mt-4">
            <div class="col-md-6">
              <form id="addons_cover" enctype="multipart/form-data">
                <input type="hidden" name="username" value="{{ $user->username }}">
                <div class="mb-3">
                  <label for="cover_image_addons" id="change_cover_label" class="fw-bold mb-2">Ganti Gambar?</label>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-web-primary py-2" id="btnSave">Ya, Simpan!</button>
        </form>
      </div>
    </div>
  </div>
</div>
