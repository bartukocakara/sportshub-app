<div class="modal fade" id="createCommentModal" tabindex="-1" aria-labelledby="createCommentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCommentModalLabel">{{ __('messages.create_comment') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createCommentForm">
                    @csrf
                    <input type="hidden" name="commentable_id" id="commentable_id">
                    <input type="hidden" name="commentable_type" id="commentable_type" value="App\Models\Reservation">
                    <input type="hidden" name="rating" id="rating">

                    <!-- Comment Textarea -->
                    <div class="mb-4">
                        <label for="comment" class="form-label">{{ __('messages.comment') }}</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                    </div>

                    <!-- Star Rating -->
                    <div class="create-comment-stars mb-3">
                        <span class="star" data-rating="1">&#9733;</span>
                        <span class="star" data-rating="2">&#9733;</span>
                        <span class="star" data-rating="3">&#9733;</span>
                        <span class="star" data-rating="4">&#9733;</span>
                        <span class="star" data-rating="5">&#9733;</span>
                    </div>
                    <p>{{ __('messages.your_rating') }}: <span id="selected-rating">0</span></p>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100">{{ __('messages.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
