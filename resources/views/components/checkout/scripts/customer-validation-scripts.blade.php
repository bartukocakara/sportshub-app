<script>
$(document).ready(function () {
    $('#customerName, #customerEmail, #customerPhone').on('input', function () {
        $(this).removeClass('is-invalid');
        $(this).siblings('.invalid-feedback').remove();
    });

    $('form').on('submit', function (e) {
        let valid = true;

        // Customer Name Validation
        const customerName = $('#customerName').val();
        if (!customerName || customerName.length < 3 || customerName.length > 255) {
            valid = false;
            showValidationError('#customerName', "{{ __('messages.invalid_customer_name') }}");
        }

        // Customer Email Validation
        const customerEmail = $('#customerEmail').val();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!customerEmail || !emailRegex.test(customerEmail)) {
            valid = false;
            showValidationError('#customerEmail', "{{ __('messages.invalid_customer_email') }}");
        }

        // Customer Phone Validation
        const customerPhone = $('#customerPhone').val();
        const phoneRegex = /^[0-9]{10,12}$/;
        if (!customerPhone || !phoneRegex.test(customerPhone)) {
            valid = false;
            showValidationError('#customerPhone', "{{ __('messages.invalid_customer_phone') }}");
        }

        if (!valid) {
            e.preventDefault();
        }
    });

    function showValidationError(selector, message) {
        const input = $(selector);
        input.addClass('is-invalid');
        if (input.siblings('.invalid-feedback').length === 0) {
            input.after(`<div class="invalid-feedback">${message}</div>`);
        }
    }
});

</script>
