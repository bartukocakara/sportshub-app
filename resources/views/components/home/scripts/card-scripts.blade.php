<script>
    $(document).ready(function () {
        let currentDayIndex = 0;  // Track the current day
        let pricingData = [];    // Array to store the pricing data
        const days = {
            'monday': "{{ __('messages.monday') }}",
            'tuesday': "{{ __('messages.tuesday') }}",
            'wednesday': "{{ __('messages.wednesday') }}",
            'thursday': "{{ __('messages.thursday') }}",
            'friday': "{{ __('messages.friday') }}",
            'saturday': "{{ __('messages.saturday') }}",
            'sunday': "{{ __('messages.sunday') }}"
        };

        // Function to format date as DD-MM-YYYY
        function formatDate(date) {
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            return `${day}-${month}-${year}`;
        }

        // Attach the click event handler for the reservation button
        $('.make-reservation-btn').on('click', function () {
            const pricings = $(this).data('pricings'); // Get the pricing data for all days
            const courtTitle = $(this).data('court-title');
            const courtAddress = $(this).data('court-address');
            const routePrefix = $(this).data('route');

            const pricingList = $('#pricing-list');
            pricingList.empty(); // Clear any previous content in the modal

            // Set the court title and address in the modal
            $('#pricingModalLabel').text(courtTitle + ' - ' + courtAddress);

            pricingData = pricings; // Store the pricing data for day navigation

            // Get today's date and format it
            const todayDate = new Date();
            const formattedDate = formatDate(todayDate);

            // Display today's date in Turkish
            $('#todaysDate').html(`
                <h3>{{ __('messages.date') }}: ${formattedDate}</h3>
            `);

            // Initialize the modal with the first day's pricing
            updatePricing(pricingData[currentDayIndex], routePrefix);

            // Update the current day label
            $('#currentDay').text('Day: ' + days[pricingData[currentDayIndex].day_of_week]);
        });

        // Function to update pricing list for the current day
        function updatePricing(pricing, routePrefix) {
            const pricingList = $('#pricing-list');
            pricingList.empty(); // Clear any previous content in the modal

            // Loop through the hours for the selected day and display each hour's pricing
            pricing.hours && $.each(pricing.hours, function (hourIndex, hour) {
                const card = `
                    <div class="col-md-12 mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column text-center mx-auto">
                                <h5 class="mb-2">${hour.from_hour} - ${hour.to_hour}</h5>
                                <h4 class="mt-2 mb-3">₺${hour.price}</h4>
                            </div>
                            <a href="${routePrefix}${pricing.id}" class="btn btn-primary">
                                {{ __('messages.make_reservation') }}
                            </a>
                        </div>
                    </div>
                    ${hourIndex < pricing.hours.length - 1 ? '<hr class="my-3">' : ''}
                `;
                pricingList.append(card); // Add each hour's pricing to the list
            });
        }

        // Handle "next day" button click to navigate to the next day
        $('#nextDay').on('click', function () {
            if (currentDayIndex < pricingData.length - 1) {
                currentDayIndex++;
            } else {
                currentDayIndex = 0;
            }
            updatePricing(pricingData[currentDayIndex]);  // Update pricing for the new day
            $('#currentDay').text('Day: ' + days[pricingData[currentDayIndex].day_of_week]);  // Update day label
        });

        // Handle "previous day" button click to navigate to the previous day
        $('#prevDay').on('click', function () {
            if (currentDayIndex > 0) {
                currentDayIndex--;
            } else {
                currentDayIndex = pricingData.length - 1;
            }
            updatePricing(pricingData[currentDayIndex]);  // Update pricing for the previous day
            $('#currentDay').text('Day: ' + days[pricingData[currentDayIndex].day_of_week]);  // Update day label
        });
    });
    </script>
