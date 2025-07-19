@if (session()->has('swal'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swal = @json(session('swal'));

        Swal.fire({
            title: swal.title || '⚠️',
            html: swal.html || '',
            icon: swal.icon || 'info',
            confirmButtonText: swal.confirmText || 'OK',
            confirmButtonColor: swal.confirmColor || '#3085d6',
            timer: swal.timer || null,
            timerProgressBar: !!swal.timer,
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            },
            customClass: {
                popup: 'swal2-border-radius-lg'
            }
        });
    });
</script>
@endif
