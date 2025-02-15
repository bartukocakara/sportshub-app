<div class="modal fade" id="createCommentModal" tabindex="-1" aria-labelledby="createCommentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createCommentModalLabel">{{ __('Create Comment') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createCommentForm">
                    @csrf
                    <input type="hidden" name="commentable_id" id="commentable_id">
                    <input type="hidden" name="commentable_type" id="commentable_type" value="App\Models\Reservation">

                    <!-- Comment Textarea -->
                    <div class="mb-4">
                        <label for="comment" class="form-label">{{ __('Comment') }}</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                    </div>

                    <!-- Star Rating -->
                    <div class="mb-4 text-center"> <!-- Center the star list -->
                        <label class="form-label">{{ __('Rating') }}</label>
                        <div class="star-rating d-inline-block"> <!-- Center the stars -->
                            @for($i = 1; $i <= 5; $i++) <!-- Display stars in ascending order -->
                                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" />
                                <label for="star{{ $i }}" title="{{ $i }} stars">
                                    <i class="far fa-star"></i> <!-- Empty star -->
                                    <i class="fas fa-star"></i> <!-- Filled star -->
                                </label>
                            @endfor
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100">{{ __('Submit') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
