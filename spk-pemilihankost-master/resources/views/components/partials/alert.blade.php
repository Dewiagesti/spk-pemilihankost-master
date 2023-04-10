@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
    </button>
    <strong>Success!</strong> Message has been sent.
</div>
@endif

@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
    </button>
    <strong>Success!</strong> Message has been sent.
</div>
@endif