<script>
    $(document).ready(function () {
        // Show Comment Modal
        $('#showCommentModal').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget); // Button that triggered the modal
            const comment = button.data('comment'); // Extract comment data

            // Populate the modal with comment content
            const modal = $(this);
            modal.find('#commentValue').text(comment.comment); // Set the comment text

            // Highlight stars based on the rating
            const rating = comment.rating;
            const stars = modal.find('.show-comment-stars .star');
            stars.removeClass('selected'); // Reset all stars
            stars.each(function () {
                if ($(this).data('rating') <= rating) {
                    $(this).addClass('selected'); // Highlight stars up to the selected rating
                }
            });
        });

        // Create Comment Form Submission
        $('#createCommentForm').on('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Get form data
            const formData = {
                comment: $('#comment').val(),
                rating: $('#rating').val(), // Get rating from hidden input
                commentable_id: $('#commentable_id').val(),
                commentable_type: $('#commentable_type').val(),
                _token: $('input[name="_token"]').val(),
            };

            // Send AJAX request
            $.ajax({
                url: "{{ route('api.comments.store') }}",
                type: "POST",
                data: formData,
                success: function (response) {
                    // Handle success
                    if (response.status === "success") {
                        // Show success toast
                        toastr.success(response.message);

                        // Close the modal
                        $('#createCommentModal').modal('hide');

                        // Reload the page to reflect the new comment
                        setTimeout(() => {
                            location.reload();
                        }, 1500); // Reload after 1.5 seconds
                    } else {
                        // Show error toast
                        toastr.error('Failed to submit comment.');
                    }
                },
                error: function (xhr) {
                    // Handle validation errors
                    if (xhr.status === 422) { // Validation error status code
                        const errors = xhr.responseJSON.errors;
                        let errorMessage = '';

                        // Loop through errors and display them
                        for (const field in errors) {
                            errorMessage += errors[field].join('\n') + '\n';
                        }

                        // Show error toast
                        toastr.error(errorMessage);
                    } else {
                        // Show generic error toast
                        toastr.error('An error occurred. Please try again.');
                        console.error(xhr.responseText);
                    }
                }
            });
        });

        // Create Comment Modal Reset
        $('#createCommentModal').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget); // Button that triggered the modal
            const reservationId = button.data('reservation-id'); // Extract reservation ID

            // Set the reservation ID in the hidden input
            $('#commentable_id').val(reservationId);

            // Reset the form and stars
            $('#createCommentForm')[0].reset();
            $('#rating').val(''); // Clear the rating value
            $('#selected-rating').text('0'); // Reset the displayed rating
            $('.create-comment-stars .star').removeClass('selected'); // Reset star colors
        });

        // Star Rating Interaction for Create Comment Modal
        $('.create-comment-stars .star').on('click', function () {
            const rating = $(this).data('rating');
            $('#rating').val(rating); // Set the rating value in the hidden input
            $('#selected-rating').text(rating); // Update the displayed rating

            // Remove 'selected' class from all stars
            $('.create-comment-stars .star').removeClass('selected');

            // Add 'selected' class to the clicked star and all previous stars
            $(this).addClass('selected').prevAll('.star').addClass('selected');
        });

        $('.create-comment-stars .star').on('mouseover', function () {
            // On hover, highlight the hovered star and all previous stars
            $(this).addClass('selected').prevAll('.star').addClass('selected');
        }).on('mouseout', function () {
            // On mouse out, remove the highlight
            $('.create-comment-stars .star').removeClass('selected');
            // Re-apply the selected class based on the current rating
            const currentRating = $('#rating').val();
            if (currentRating > 0) {
                $('.create-comment-stars .star').each(function () {
                    if ($(this).data('rating') <= currentRating) {
                        $(this).addClass('selected');
                    }
                });
            }
        });
    });
</script>
