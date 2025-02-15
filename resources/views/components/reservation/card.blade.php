<div class="flex-grow-0" style="width: 200px;">
    <div class="card shadow-sm border-1 rounded-3 h-100">
        <div class="card-img-top position-relative">
            <img src="{{ asset('storage/courts/' . ($reservation['court']['court_images'] && count($reservation['court']['court_images']) > 0 ? $reservation['court']['court_images'][0]['file_path'] : 'default.jpg')) }}" class="img-fluid rounded-top" alt="{{ $reservation['court']['title'] }}">
            <div class="badge bg-success position-absolute top-0 end-0 m-3">{{ $reservation['payment_status'] }}</div>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $reservation['court']['title'] }}</h5>
            <p class="card-text text-muted">{{ $reservation['court']['sport_type']['title'] }}</p>
            <p>{{ $reservation['date'] }}</p>
            <p class="card-text">{{ $reservation['from_hour'] }} - {{ $reservation['to_hour'] }} | {{ $reservation['price'] }}</p>
        </div>
        <div class="card-footer d-flex justify-content-center align-items-center p-3 gap-2">
            <!-- View Details Button -->
            <a href="{{ route('reservation.show', $reservation['id']) }}" class="btn btn-primary btn-sm">
                {{ __('messages.view_details') }}
            </a>

            <!-- Conditionally show "Make Comment" button for completed reservations -->
            @if($reservation['status'] == 6)
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#createCommentModal" data-reservation-id="{{ $reservation['id'] }}">
                    {{ __('messages.make_comment') }}
                </button>
            @endif
        </div>
    </div>
</div>
