<div class="alert alert-{{ $type }} alert-dismissible text-capitalize alertMessage" style="z-index: 999;">
    <button type="button" onclick="dismissAlert()" class="close btn btn-sm btn-bg-white"
        style="background-color: transparent" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{ $message }}
</div>

@push('scripts')
    <script>
        function dismissAlert() {
            $('.alertMessage').addClass('d-none')
        }
        setTimeout(() => {
            dismissAlert()
        }, 3000);
    </script>
@endpush
