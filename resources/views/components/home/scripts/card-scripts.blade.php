<script>
$(document).ready(function () {
    // Attach the click event handler for the reservation button
    $('.make-reservation-btn').on('click', function () {
        const pricings = $(this).data('pricings');
        const courtTitle = $(this).data('court-title');
        const courtAddress = $(this).data('court-address');
        const routePrefix = $(this).data('route');  // Get the route prefix

        const pricingList = $('#pricing-list');
        pricingList.empty(); // Clear any previous content

        // Update the modal title and court details
        $('#pricingModalLabel').text(courtTitle + ' - ' + courtAddress);

        // Loop through the pricing data and populate the modal with cards
        $.each(pricings, function (index, pricing) {
            $.each(pricing.hours, function (hourIndex, hour) {
                const card = `
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">${hour.from_hour} - ${hour.to_hour}</h5>
                                <p class="card-text">₺${hour.price}</p>
                                <a href="${routePrefix}${pricing.id}" class="btn btn-primary">
                                    {{ __('messages.book_now') }}
                                </a>
                            </div>
                        </div>
                    </div>
                `;
                pricingList.append(card);
            });
        });
    });
});

</script>
