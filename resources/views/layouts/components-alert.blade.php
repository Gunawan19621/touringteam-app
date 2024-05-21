{{-- @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ Session::get('success') }}
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ Session::get('error') }}
    </div>
@endif --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Check for session messages
        @if (Session::has('success'))
            Swal.fire({
                title: 'Success!',
                text: '{{ Session::get('success') }}',
                icon: 'success',
                confirmButtonText: 'Cool'
            });
        @endif

        @if (Session::has('error'))
            Swal.fire({
                title: 'Error!',
                text: '{{ Session::get('error') }}',
                icon: 'error',
                confirmButtonText: 'Try Again'
            });
        @endif
    });
</script>
