<div class="alert @if($type != 'success') alert-{{ $type }} @endif alert-dismissible fade show my-4" @if($type=='success' ) style="background-color:#40ffd2; color:#1f866e;" @endif role="alert">
  {!! $message !!}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
