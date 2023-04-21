{{-- Message --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    setTimeout(function () {
        $('#alert').fadeOut('slow');
    }, 5000);
</script>

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible" id="alert" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>{{ session('success') }}</strong>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible" id="alert" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>{{ session('error') }}</strong>
    </div>
@endif
