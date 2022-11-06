<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/2e160f1ac0.js" crossorigin="anonymous"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> --}}
<script>
  const dt = document.querySelector('.dropdown-toggle');
  const dm = document.querySelector('.dropdown-menu');

  dt.addEventListener('click', function() {
    if (this.classList.contains('show')) {
      this.classList.add('active');
    } else {
      this.classList.remove('active');
    }
  });

  dt.addEventListener('mouseover', function() {
    this.classList.add('active');
    dm.classList.add('show');
  });

  document.addEventListener('click', function(e) {
    if (e.target !== dt) {
      dt.classList.remove('active');
      dm.classList.remove('show');
    }
  });

</script>
