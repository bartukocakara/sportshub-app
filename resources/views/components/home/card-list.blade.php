

<div class="row g-10">
    @foreach($homeData['courts']['data'] as $key => $value)
    <div class="col-md-6">
        <div class="card-xl-stretch me-md-6">
            <a class="d-block overlay" data-fslightbox="lightbox-hot-sales" href="{{ asset('storage/courts/' . (($value['court_images'][0]['file_path'] ?? 'placeholder-court.webp'))) }}">
                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                    style="background-image: url('{{ asset('storage/courts/' . (($value['court_images'][0]['file_path'] ?? 'placeholder-court.webp'))) }}')">
                </div>
                <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                    <i class="ki-duotone ki-eye fs-2x text-white">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                </div>
            </a>
            <div class="mt-5">
                <a href="#" class="fs-4 text-dark fw-bold text-hover-primary lh-base">
                    {{ $value['title'] }}
                </a>
                <div class="fw-semibold fs-5 text-gray-600 mt-3">
                    {{ $value['address_detail'] }}
                </div>
                <div class="fs-6 fw-bold mt-5 d-flex flex-stack">
                    <span class="badge border border-dashed fs-2 fw-bold text-dark p-2">
                        <span class="fs-6 fw-semibold text-gray-400">₺</span>
                        {{ $value['court_reservation_pricings'][0]['hours'][0]['price'] }}
                    </span>
                    <button class="btn btn-info make-reservation-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#pricingModal"
                            data-pricings="{{ json_encode($value['court_reservation_pricings']) }}"
                            data-route="{{ Auth::check() ? 'checkout/user/': 'checkout/guest/' }}"
                            data-court-title="{{ $value['title'] }}"
                            data-court-address="{{ $value['address_detail'] }}">
                        {{ __('messages.show_pricing_list') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@include('components.home.modals.pricing-list-modal')

