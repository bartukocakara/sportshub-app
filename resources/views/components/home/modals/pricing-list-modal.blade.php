<div class="modal modal-md fade" id="pricingModal" tabindex="-1" aria-labelledby="pricingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pricingModalLabel">{{ __('messages.pricing_list') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <button id="prevDay" class="btn btn-secondary">←</button>
                    <h6 id="currentDay" class="m-0"></h6>
                    <button id="nextDay" class="btn btn-secondary">→</button>
                </div>
                <div id="pricing-list" class="row">
                    <!-- Pricing cards will be appended here -->
                </div>
            </div>
        </div>
    </div>
</div>
