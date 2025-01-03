<script>
    $(document).ready(function () {
        $('.make-reservation-btn').on('click', function () {
            const pricings = $(this).data('pricings');
            const $pricingList = $('#pricing-list');

            // Clear existing data
            $pricingList.empty();

            // Populate the modal with pricing data
            $.each(pricings, function (index, pricing) {
                $.each(pricing.hours, function (hourIndex, hour) {
                    const row = `
                        <tr>
                            <td>${hour.start_time} - ${hour.end_time}</td>
                            <td>₺${hour.price}</td>
                        </tr>
                    `;
                    $pricingList.append(row);
                });
            });
        });
    });

</script>
