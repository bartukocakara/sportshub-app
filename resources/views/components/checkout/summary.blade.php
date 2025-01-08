<div class="flex-column flex-lg-row-auto w-100 w-lg-250px w-xl-300px mb-10 order-1 order-lg-2">
    <div class="card card-flush pt-3 mb-0">
        <div class="card-header">
            <div class="card-title">
                <h2>{{ __('messages.court_details') }}</h2>
            </div>
        </div>
        <div class="card-body pt-0 fs-6">
            <!-- Court Image -->
            <img class="w-100 card-rounded"
                src="{{ asset('storage/courts/' . (($court['court_images'][0]['file_path'] ?? 'placeholder-court.webp'))) }}"
                alt="Court Image"
                id="courtImage"
                style="cursor: pointer;"
                data-bs-toggle="modal"
                data-bs-target="#imageModal">

            <div class="separator separator-dashed mb-7"></div>
            @include('components.checkout.court-details')
            <div class="separator separator-dashed mb-7"></div>
            <div class="mb-0">
                <button type="submit" class="btn btn-primary" id="kt_subscriptions_create_button">
                    <span class="indicator-label">{{ __('messages.make_payment') }}</span>
                    <span class="indicator-progress">
                        Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Image Slideshow -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">{{ __('messages.court_images') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="carouselImages" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" id="carouselImagesContent">
                        <!-- Dynamically populated images will go here -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
