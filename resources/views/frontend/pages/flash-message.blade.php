@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close  bg-transparent border border-0" data-bs-dismiss="alert" aria-label="Close"> X </button>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close  bg-transparent border border-0" data-bs-dismiss="alert" aria-label="Close"> X </button>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close  bg-transparent border border-0" data-bs-dismiss="alert" aria-label="Close"> X </button>
    </div>
@endif