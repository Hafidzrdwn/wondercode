$(document).ready(function () {

  const modal = $('#cropProfilePhoto');
  const image = $('#sample_image');
  let cropper;

  $('#avatar').on('change', function(event) {
    const reader = new FileReader();
    reader.readAsDataURL(event.target.files[0]);
    reader.onload = function(e) {
      image.attr('src', e.target.result);
      modal.modal('show');
    };
  });

  modal.on('shown.bs.modal', function() {
    cropper = new Cropper(image[0], {
      aspectRatio: 1
      , viewMode: 3
      , preview: '.preview'
    });
  }).on('hidden.bs.modal', function() {
    cropper.destroy();
    cropper = null;
  });

  $('#save').click(function() {
    canvas = cropper.getCroppedCanvas({
      width: 600
      , height: 600
    });

    canvas.toBlob(function(blob) {
      url = URL.createObjectURL(blob);
      const reader = new FileReader();
      reader.readAsDataURL(blob);
      reader.onloadend = function(e) {
        let data = e.target.result;
        let username = $('#username').val()

        $.ajax({
          url: `${username}/editprofileimage`
          , method: 'POST'
          , data: {
            image: data
          }
          , beforeSend: function() {
            $('#save').html('<i class="fas fa-spinner fa-spin"></i> Saving...');
          }
          , success: function (res) {
            $('#save').text('Simpan!');
            modal.modal('hide');
            location.reload();
          },
          error: function (err) {
            console.log(err)
          }
        });
      };
    });
  });

  $('#cover_image').change(function (event) {
    if ($(this).attr('id') == 'cover_image') {
      $(this).addClass('form-control');
      $(this).toggleClass('d-none d-block');
      $(this).attr('id', $(this).attr('id') + '_addons');
      $(this).insertAfter('#change_cover_label');
    }

    $('#change_cover_label').html('Ganti Gambar?')

    const reader = new FileReader();
    reader.readAsDataURL(event.target.files[0]);
    reader.onload = function (e) {
      $('#preview').attr('src', e.target.result);
      $('#imagePreview').modal('show');
    };
    
  });

  $('#addons_cover').submit(function (e) {

    e.preventDefault();
    const data = new FormData(e.target)
    
    if(data.get('cover_image')['size'] > 1000000) {
      $('#change_cover_label').html('Ganti Gambar?')
      $('#change_cover_label').html(`
          ${$('#change_cover_label').text() + '<span class="text-danger"> Size gambar terlalu besar, coba lagi.</span>'}
      `)
      return 
    }
    
    $.ajax({
      url: `${data.get('username')}/editcover`,
      type: 'POST',
      data: data,
      processData: false,
      contentType: false,
      beforeSend: function () {
        $('#btnSave').html('Saving image...')
      },
      success: function (res) {
        $('#imagePreview').modal('hide');
        location.reload()
      }
    })

  })

  $('#imagePreview').on('hide.bs.modal', function () {
    location.reload()
  });
})