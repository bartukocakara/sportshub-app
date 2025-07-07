<script>
    document.addEventListener('DOMContentLoaded', function () {
        const perPageSelect = document.getElementById('per_page');

        perPageSelect?.addEventListener('change', function () {
            const url = new URL(window.location.href);
            const params = new URLSearchParams(url.search);

            params.set('per_page', this.value);
            params.set('page', 1); // Sayfayı resetle

            url.search = params.toString();
            window.location.href = url.toString(); // Sayfayı yeniden yönlendir
        });
    });
</script>
