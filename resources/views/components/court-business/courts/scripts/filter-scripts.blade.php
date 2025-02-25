
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

        // Handle form submission
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
    });
    $(document).ready(function() {
    // Get the values from the URL query string
    let minPrice = {{ request()->get('minimum_price') ?? 0 }};
    let maxPrice = {{ request()->get('maximum_price') ?? 1000 }};

    // Initialize the slider with the min and max values from the query
    $("#price-slider").slider({
        min: 0,
        max: 1000,
        values: [minPrice, maxPrice],
        range: true,
        slide: function(event, ui) {
            // Update the hidden input fields as the slider is adjusted
            $("#price_min_input").val(ui.values[0]);
            $("#price_max_input").val(ui.values[1]);
            $("#price-min").text("₺" + ui.values[0]);
            $("#price-max").text("₺" + ui.values[1]);
        }
    });

    // Update the price range display on page load
    $("#price-min").text("₺" + minPrice);
    $("#price-max").text("₺" + maxPrice);
});

</script>
