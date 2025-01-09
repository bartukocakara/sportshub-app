<script>
    const days = {
        'monday': "{{ __('messages.monday') }}",
        'tuesday': "{{ __('messages.tuesday') }}",
        'wednesday': "{{ __('messages.wednesday') }}",
        'thursday': "{{ __('messages.thursday') }}",
        'friday': "{{ __('messages.friday') }}",
        'saturday': "{{ __('messages.saturday') }}",
        'sunday': "{{ __('messages.sunday') }}"
    };

    $(document).ready(function () {
        let checkoutRoute = ''
        let courtId = '';
        let apiRoute = "{{ route('api.court-reservation-pricings.check-availability') }}";
        let currentDayIndex = 0; // Track the current day
        let pricingData = []; // Array to store the pricing data
        let currentDate = new Date(); // Track the current date
        const days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];

        const $spinner = $('#loadingSpinner'); // Reference to loading spinner

        // Show spinner
        function showSpinner() {
            $spinner.show();
        }

        // Hide spinner
        function hideSpinner() {
            $spinner.hide();
        }

        // Format date as YYYY-MM-DD
        function formatDate(date) {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }

        // Get the day name (e.g., 'sunday', 'monday') from the currentDate
        function getDayName(date) {
            return days[date.getDay()];
        }

        // Fetch pricing data for the specified court, day, and date
        function fetchPricingData(courtId, dayName, date) {
            return new Promise((resolve, reject) => {
                if (!courtId) {
                    alert("Court ID is missing.");
                    reject("Court ID is missing.");
                    return;
                }

                showSpinner();

                setTimeout(() => {
                    $.ajax({
                        url: apiRoute,
                        method: 'GET',
                        data: {
                            court_id: courtId, // Include courtId in the request
                            day_name: dayName,
                            date: date
                        },
                        success: function (response) {
                            hideSpinner();
                            pricingData = response.result.data || [];
                            updatePricing(pricingData[currentDayIndex]);
                            updateDateDisplay();
                            resolve(response);
                        },
                        error: function () {
                            hideSpinner();
                            alert("Failed to fetch pricing data.");
                            reject("Failed to fetch pricing data.");
                        }
                    });
                }, 500); // Delay for 500ms
            });
        }

        $('.show-pricing-list').on('click', function () {
            courtId = $(this).data('id'); // Get court ID
            const courtTitle = $(this).data('court-title');
            const courtAddress = $(this).data('court-address');
            checkoutRoute = $(this).data('route');
            console.log(checkoutRoute);

            $('#pricingModalLabel').text(courtTitle + ' - ' + courtAddress);

            fetchPricingData(courtId, getDayName(currentDate), formatDate(currentDate))
                .then(() => {
                    console.log("Pricing data loaded successfully.");
                })
                .catch((error) => {
                    console.error(error);
                });
        });

        // Update pricing list for the current day
        function updatePricing(pricing) {
            const pricingList = $('#pricing-list');
            pricingList.empty();

            // Loop through the hours for the selected day
            pricing.hours && $.each(pricing.hours, function (hourIndex, hour) {
                const isReserved = hour.reserved;
                const card = `
                    <div class="col-md-12 mb-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column text-center mx-auto">
                                <h5 class="mb-2">${hour.from_hour} - ${hour.to_hour}</h5>
                                <h4 class="mt-2 mb-3">₺${hour.price}</h4>
                            </div>
                            <div class="d-flex align-items-center">
                                ${isReserved ?
                                    `<span class="btn btn-danger">{{ __('messages.reserved') }}</span>` :
                                    `<form action="${checkoutRoute}" method="POST" class="d-inline-block">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="court_id" value="${courtId}">
                                        <input type="hidden" name="from_hour" value="${hour.from_hour}">
                                        <input type="hidden" name="to_hour" value="${hour.to_hour}">
                                        <input type="hidden" name="day_of_week" value="${getDayName(currentDate)}">
                                        <input type="hidden" name="date" value="${formatDate(currentDate)}">
                                        <button type="submit" class="btn btn-primary" id="checkoutButton">
                                            {{ __('messages.make_reservation') }}
                                        </button>
                                    </form>`
                                }
                            </div>
                        </div>
                    </div>
                    ${hourIndex < pricing.hours.length - 1 ? '<hr class="my-3">' : ''}
                `;



                pricingList.append(card);
            });

            $('#currentDay').text(getDayName(currentDate));
        }

        // Update the displayed date
        function updateDateDisplay() {
            const formattedDate = formatDate(currentDate);
            $('#todaysDate').html(`<h3>{{ __('messages.date') }}: ${formattedDate}</h3>`);
        }

        // Handle "next day" button click
        $('#nextDay').on('click', function () {
            currentDayIndex = (currentDayIndex + 1) % pricingData.length;
            currentDate.setDate(currentDate.getDate() + 1);

            fetchPricingData(courtId, getDayName(currentDate), formatDate(currentDate))
                .then(() => {
                    console.log("Next day's data loaded.");
                })
                .catch((error) => {
                    console.error(error);
                });
        });

        // Handle "previous day" button click
        $('#prevDay').on('click', function () {
            currentDayIndex = (currentDayIndex - 1 + pricingData.length) % pricingData.length;
            currentDate.setDate(currentDate.getDate() - 1);

            fetchPricingData(courtId, getDayName(currentDate), formatDate(currentDate))
                .then(() => {
                    console.log("Previous day's data loaded.");
                })
                .catch((error) => {
                    console.error(error);
                });
        });
    });
</script>
