@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>×</span>
            </button>
            <p>{{ $message }}</p>
        </div>
    </div>
    <script>
        setTimeout(function() {
            $('.alert').fadeOut('fast');
        }, 2000); // 3000ms = 3 seconds
    </script>
@endif
