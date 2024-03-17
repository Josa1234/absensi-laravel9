@if (Session::has('success'))
    <div id="autoCloseAlert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <script>
        setTimeout(function() {
            document.getElementById('autoCloseAlert').style.display = 'none';
        }, 2000);
    </script>
@endif

@if (Session::has('error'))
    <div id="autoCloseAlert" class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session::get('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <script>
        setTimeout(function() {
            document.getElementById('autoCloseAlert').style.display = 'none';
        }, 5000);
    </script>
@endif