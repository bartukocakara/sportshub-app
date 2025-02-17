<div class="flex-grow-0" style="width: 200px;">
    <div class="card shadow-sm border-1 rounded-3 h-100">
        <div class="card-img-top position-relative">
            <!-- Check if there is an image available, otherwise use the placeholder -->
            @if($reservation['court']['court_images'] && count($reservation['court']['court_images']) > 0)
                <img src="{{ asset('storage/courts/' . $reservation['court']['court_images'][0]['file_path']) }}"
                     class="img-fluid rounded-top"
                     alt="{{ $reservation['court']['title'] }}"
                     style="height: 150px; object-fit: cover; width: 100%;">
            @else
                <div class="img-fluid rounded-top"
                     style="background-image: url('{{ asset('storage/courts/placeholder-court.webp') }}');
                            background-size: cover;
                            background-position: center;
                            height: 150px;
                            width: 100%;">
                </div>
            @endif

            <!-- Payment Status Badge -->
            <div class="badge position-absolute top-0 end-0 m-3
                    @switch($reservation['payment_status'])
                        @case(1)
                            bg-warning
                            @break
                        @case(2)
                            bg-success
                            @break
                        @case(3)
                            bg-danger
                            @break
                        @case(4)
                            bg-info
                            @break
                        @default
                            bg-secondary
                    @endswitch
                ">
                    {{ __('messages.payment_status_list.' . $reservation['payment_status']) }}
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $reservation['court']['title'] }}</h5>
            <p class="card-text text-muted">{{ $reservation['court']['sport_type']['title'] }}</p>
            <p>{{ $reservation['date'] }}</p>
            <p class="card-text">{{ $reservation['from_hour'] }} - {{ $reservation['to_hour'] }} | {{ $reservation['price'] }}</p>
        </div>
        <div class="card-footer d-block p-3">
            <!-- View Details Button -->
            <a href="{{ route('reservation.show', $reservation['id']) }}" class="btn btn-primary btn-sm w-100 mb-2">
                {{ __('messages.view_details') }}
            </a>

            <!-- Conditionally show "Make Comment" or "Show Comment" button for completed reservations -->
            @if($reservation['status'] == 6)
                @if($reservation['comment'])
                    <!-- If the reservation has a comment, show the "Show Comment" button -->
                    <button type="button" class="btn btn-info btn-sm w-100" data-bs-toggle="modal" data-bs-target="#showCommentModal" data-comment="{{ json_encode($reservation['comment']) }}">
                        {{ __('messages.show_comment') }}
                    </button>
                @else
                    <!-- If the reservation does not have a comment, show the "Make Comment" button -->
                    <button type="button" class="btn btn-success btn-sm w-100" data-bs-toggle="modal" data-bs-target="#createCommentModal" data-reservation-id="{{ $reservation['id'] }}">
                        {{ __('messages.make_comment') }}
                    </button>
                @endif
            @endif
        </div>
    </div>
</div>
