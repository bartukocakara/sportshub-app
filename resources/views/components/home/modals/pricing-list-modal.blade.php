<div class="modal fade" id="pricingModal" tabindex="-1" aria-labelledby="pricingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pricingModalLabel">{{ __('messages.pricing_list') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{ __('messages.hour') }}</th>
                            <th>{{ __('messages.price') }}</th>
                        </tr>
                    </thead>
                    <tbody id="pricing-list">
                        <!-- Dynamic Content -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
