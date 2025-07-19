<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "3000",
    };

    @foreach (['success', 'error', 'warning', 'info'] as $type)
        @if(session($type))
            toastr["{{ $type === 'error' ? 'error' : $type }}"]("{!! session($type) !!}");
        @endif
    @endforeach
</script>
