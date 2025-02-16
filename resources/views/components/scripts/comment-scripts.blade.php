<script>

    $(document).ready(function () {
        // When the form is submitted
        $('#createCommentForm').on('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Get form data
            const formData = {
                comment: $('#comment').val(),
                rating: $('input[name="rating"]:checked').val(),
                commentable_id: $('#commentable_id').val(),
                commentable_type: $('#commentable_type').val(),
                _token: $('input[name="_token"]').val(),
            };

            // Send AJAX request
            $.ajax({
                url: "{{ route('comments.store') }}",
                type: "POST",
                data: formData,
                success: function (response) {
                    // Handle success
                    if (response.success) {
                        alert('Comment submitted successfully!');
                        $('#createCommentModal').modal('hide'); // Close the modal
                        location.reload(); // Reload the page to reflect the new comment
                    } else {
                        alert('Failed to submit comment.');
                    }
                },
                error: function (xhr) {
                    // Handle errors
                    alert('An error occurred. Please try again.');
                    console.error(xhr.responseText);
                }
            });
        });

        // When the modal is shown, reset the form
        $('#createCommentModal').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget); // Button that triggered the modal
            const reservationId = button.data('reservation-id'); // Extract reservation ID

            // Set the reservation ID in the hidden input
            $('#commentable_id').val(reservationId);

            // Reset the form
            $('#createCommentForm')[0].reset();
            $('input[name="rating"]').prop('checked', false); // Uncheck all stars
        });
    });
</script>
