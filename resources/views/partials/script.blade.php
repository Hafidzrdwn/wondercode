<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/2e160f1ac0.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.29/dist/sweetalert2.all.min.js"></script>
<script>
  // confirm logout with sweet alert jquery
  $(document).ready(function() {
    $('#btnLogout').click(function(e) {
      e.preventDefault();
      Swal.fire({
        title: 'Apakah anda yakin?'
        , text: "Anda akan keluar dari akun anda!"
        , icon: 'question'
        , reverseButtons: true
        , showCancelButton: true
        , confirmButtonColor: '#21caa2'
        , cancelButtonColor: '#dc3545'
        , confirmButtonText: 'Yakin!'
        , cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          $('#formLogout').submit();
        }
      })
    });
  })

</script>
<script>
  // navbar
  const dt = document.querySelector('.dropdown-toggle');
  const dm = document.querySelector('.dropdown-menu');

  const searchBox = document.querySelector('.search-box');
  const searchInput = document.querySelector('.search-input');
  const searchBtn = document.querySelector('.search-btn');

  dt.addEventListener('click', function() {
    if (this.classList.contains('show')) {
      this.classList.add('active');
    } else {
      this.classList.remove('active');
    }
  });

  function changeIconSearch() {
    if (searchBox.classList.contains('show')) {
      searchBtn.innerHTML = `<i class="fas fa-times" style="color: #333 !important;"></i>`;
    } else {
      searchBtn.innerHTML = `<img src="{{ asset('assets/images/search.svg') }}" alt="search-image">`;
    }
  }

  if (!window.matchMedia('(max-width: 992px)').matches) {
    dt.addEventListener('mouseover', function() {
      this.classList.add('active');
      dm.classList.add('show');
    });

    searchBox.addEventListener('mouseover', function() {
      this.classList.add('show');
      searchInput.focus();
      changeIconSearch();
    });
    searchBox.addEventListener('mouseleave', function() {
      // check search input is focus or not
      if (!searchInput.matches(':focus')) {
        this.classList.remove('show');
        searchInput.value = '';
      }
    });

    searchInput.addEventListener('blur', function() {
      searchBox.classList.remove('show');
      searchInput.value = '';
      changeIconSearch();
    });

    searchBtn.addEventListener('click', function() {
      if (this.innerHTML == `<i class="fas fa-times" style="color: #333 !important;"></i>`) {
        searchInput.value = '';
        searchBox.classList.remove('show');
        changeIconSearch();
      }
    });
  }


  document.addEventListener('click', function(e) {
    if (e.target !== dt) {
      dt.classList.remove('active');
      dm.classList.remove('show');
    }
  });

</script>
