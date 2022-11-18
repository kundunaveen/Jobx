@if($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <ul>
        @foreach ($errors->all() as $error)
        <li><strong>{{ $error }}</strong></li>
        @endforeach
    <ul>
</div>
@endif