<script>
    @php
        $translations = [
            'loading' => __('messages.loading'),
            'select_district' => __('messages.select_district'),
            'failed_to_load_districts' => __('messages.failed_to_load_districts')
        ];
    @endphp
    window.translations = @json($translations);
</script>

<script>

     $('#filters-form').on('submit', function(e) {
        e.preventDefault();

        // Serialize the form data into an array of key-value pairs
        const formDataArray = $(this).serializeArray();

        // Filter out fields with null, empty, or undefined values
        const filteredData = formDataArray
            .filter(field => field.value.trim() !== '' && field.value !== null) // Exclude empty or null values
            .map(field => `${encodeURIComponent(field.name)}=${encodeURIComponent(field.value)}`); // Encode the data

        // Join the filtered fields into a query string
        const queryString = filteredData.join('&');

        // Construct the URL with the filtered query string
        const url = `/home?${queryString}`;

        // Set the action attribute and submit the form
        $(this).attr('action', url);
        this.submit();
    });

    $(document).ready(function() {
        function getQueryParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        function loadDistricts(cityId) {
            const districtSelect = $('#district-select');

            if (cityId) {
                districtSelect.prop('disabled', true).empty().append(`<option value="">${window.translations.loading}</option>`);

                $.ajax({
                    url: `/api/districts-with-courts/cities/${cityId}`,
                    method: 'GET',
                    success: function (response) {
                        const districts = response?.result.data;
                        districtSelect.prop('disabled', false).empty().append(`<option value="">${window.translations.select_district}</option>`);
                        districtSelect.append(districts.map(district => `<option value="${district.id}">${district.title}</option>`));

                        // Check if district_id exists in the URL and set it
                        const districtId = getQueryParam('district_id');
                        if (districtId) {
                            districtSelect.val(districtId);
                        }
                    },
                    error: function () {
                        alert(window.translations.failed_to_load_districts);
                        districtSelect.prop('disabled', true).empty().append(`<option value="">${window.translations.select_district}</option>`);
                    }
                });
            } else {
                districtSelect.prop('disabled', true).empty().append(`<option value="">${window.translations.select_district}</option>`);
            }
        }

        // Check if city_id exists in the URL and load districts
        const cityId = getQueryParam('city_id');
        if (cityId) {
            $('#city-select').val(cityId);
            loadDistricts(cityId);
        }

        // Handle city select change event
        $('#city-select').on('change', function () {
            const selectedCityId = $(this).val();
            loadDistricts(selectedCityId);
        });
    });


    $(document).ready(function () {
        function generateTimeOptions() {
            const fromHour = 0; // 00:00
            const toHour = 24; // 24:00 (not inclusive)
            let timeOptions = "";

            for (let hour = fromHour; hour < toHour; hour++) {
                const formattedTime = hour.toString().padStart(2, "0") + ":00"; // Format time as HH:00
                timeOptions += `<option value="${formattedTime}">${formattedTime}</option>`;
            }

            return timeOptions;
        }

        // Populate both start and end time dropdowns
        const timeOptions = generateTimeOptions();
        $("#from_hour").append(timeOptions);
        $("#to_hour").append(timeOptions);
    });
</script>
