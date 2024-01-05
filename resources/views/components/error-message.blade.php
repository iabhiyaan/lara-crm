@if(count($errors->all()) > 0)
<div class="alert alert-danger mt-3 alert-dismissible validationMessage d-flex gap-1 align-items-baseline" style="z-index: 999;">
    <button onclick="dismissAlert()" class="close btn btn-sm btn-bg-white" style="background-color: transparent" data-dismiss="alert" aria-label="close">&times;</button>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@push('scripts')
    <script>
        function dismissAlert() {
            $('.validationMessage').addClass('d-none')
        }
        setTimeout(() => {
            dismissAlert()
        }, 10000);
    </script>
@endpush
