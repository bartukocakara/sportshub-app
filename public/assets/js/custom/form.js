document.addEventListener('DOMContentLoaded', function() {
    // Find all forms with class .auth-form within the modal
    document.querySelectorAll('.loading-form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            // Locate the submit button within the form
            const submitButton = form.querySelector('button[type="submit"]');
            if (submitButton) {
                submitButton.disabled = true;
                // Save the current button text
                const originalText = submitButton.innerHTML;
                // Prepend the spinner HTML from Bootstrap 5
                submitButton.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>' + originalText;
            }
        });
    });
});
