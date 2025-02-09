$(document).ready(function() {
    $('.auth-form').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        // Remove previous validation errors
        form.find('.is-invalid').removeClass('is-invalid');
        form.find('.invalid-feedback').remove();
        var submitButton = form.find('button[type="submit"]');
        var originalText = submitButton.html();
        
        submitButton.prop('disabled', true);
        submitButton.html('<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>' + originalText);
        
        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(response) {
                // On successful login or registration, hide the modal and reload the page.
                $('#authModal').modal('hide');
                location.reload();
            },
            error: function(jqXHR) {
                if(jqXHR.status === 422) {
                    var errors = jqXHR.responseJSON.errors;
                    $.each(errors, function(field, messages) {
                        var input = form.find('[name="' + field + '"]');
                        input.addClass('is-invalid');
                        if (input.next('.invalid-feedback').length === 0) {
                            input.after('<div class="invalid-feedback">' + messages.join('<br>') + '</div>');
                        }
                    });
                } else {
                    alert('Something went wrong. Please try again.');
                }
            },
            complete: function() {
                submitButton.prop('disabled', false);
                submitButton.html(originalText);
            }
        });
    });
});
