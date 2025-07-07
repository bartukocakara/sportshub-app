<div class="row g-10">
    @foreach($datas['courts']['data'] as $key => $value)
    <div class="col-md-6">
        <div class="card-xl-stretch me-md-6 shadow-sm border border-grey rounded p-4">
            <a class="d-block overlay" id="courtImage-{{ $value['id'] }}" data-court-images="{{ json_encode($value['court_images']) }}">
                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                     style="background-image: url('{{ asset('storage/' . ($value['court_images'][0]['file_path'] ?? 'courts/placeholder-court.webp')) }}')">
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
                    @if(isset($value['court_business']) && $value['court_business']['address'])
                        {{ $value['court_business']['address'] }}
                    @elseif(isset($value['court_address']) && $value['court_address']['address_detail'])
                        {{ $value['court_address']['address_detail'] }}
                    @else
                        {{ __('messages.no_address_available') }}
                    @endif
                </div>
                @if(isset($value['court_reservation_pricings']) && count($value['court_reservation_pricings']) > 0 && !isset($value['court_address']))
                    <div class="fs-6 fw-bold mt-5">
                        <span class="badge border border-dashed fs-2 fw-bold text-dark p-2">
                            <span class="fs-6 fw-semibold text-gray-400">₺</span>
                            {{ $value['court_reservation_pricing_average_price'] }}
                        </span>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-sm btn-info show-pricing-list"
                                data-bs-toggle="modal"
                                data-bs-target="#pricingModal"
                                data-id="{{ $value['id'] }}"
                                data-pricings="{{ json_encode($value['court_reservation_pricings']) }}"
                                data-route="{{ Auth::check() ? route('checkout.user.index') : route('checkout.guest.index') }}"
                                data-court-title="{{ $value['title'] }}"
                                data-court-address="{{ isset($value['court_business']['address']) ? $value['court_business']['address'] : (isset($value['court_address']['address_detail']) ? $value['court_address']['address_detail'] : '') }}">
                                {{ __('messages.show_pricing_list') }}
                            </button>
                        </div>
                    </div>
                @else
                    <!-- If it's a public court, redirect to the court detail page -->
                    <div class="fs-6 fw-bold mt-5 d-flex justify-content-center">
                        <a href="{{ route('courts.show', ['id' => $value['id']]) }}" class="btn btn-primary">
                            {{ __('messages.view_court_details') }}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@include('components.modals.court-images-modal')

@include('components.modals.pricing-list-modal')
