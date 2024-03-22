@if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Selamat!</strong> {{ session('success') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if (session()->has('error'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Maaf!</strong>{{ session('error') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif