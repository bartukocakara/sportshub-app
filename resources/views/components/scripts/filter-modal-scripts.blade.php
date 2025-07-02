<script>
    document.querySelector('#kt_filter_modal form').addEventListener('submit', function(e) {
    const form = e.target;
    [...form.elements].forEach(el => {
        if ((el.tagName === 'INPUT' || el.tagName === 'SELECT') && !el.disabled) {
            if (el.type === 'checkbox' || el.type === 'radio') {
                if (!el.checked) el.name = ''; // unchecked checkbox/radio gönderilmez
            } else if (!el.value) {
                el.name = ''; // boş input gönderilmez
            }
        }
    });
});
</script>
