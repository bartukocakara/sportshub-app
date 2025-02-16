<div class="card w-50" id="kt_court_details_view">
    <div class="card-header cursor-pointer">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">{{ $reservation->court->name }}</h3>
        </div>
    </div>

    <div class="card-body p-0">
        <div class="swiper images-swiper">
            <div class="swiper-wrapper">
                @foreach($reservation->court->courtImages as $image)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/courts/' . $image->file_path) }}"
                             class="w-100 rounded"
                             style="height: 300px; object-fit: cover;"
                             alt="Court image">
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <div class="card-body p-9">
        <div class="row mb-7">
            <label class="col-lg-4 fw-semibold text-muted">{{ __('messages.court_type') }}</label>
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $reservation->court->type }}</span>
            </div>
        </div>
        <div class="row mb-7">
            <label class="col-lg-4 fw-semibold text-muted">{{ __('messages.business_name') }}</label>
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">
                    <a href="{{ route('court-businesses.show', $reservation->court->courtBusiness->id) }}" class="text-gray-800 text-hover-primary">
                        {{ $reservation->court->courtBusiness?->name }}
                    </a>
                </span>
            </div>
        </div>
        <div class="row mb-7">
            <label class="col-lg-4 fw-semibold text-muted">{{ __('messages.location') }}</label>
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $reservation->court->courtBusiness->address }}</span>
            </div>
        </div>
    </div>
</div>
