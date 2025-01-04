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

        const formData = $(this).serialize();

        const url = '/home?' + formData;

        $(this).attr('action', url);

        this.submit();
    });
    $(document).ready(function() {
        $('#city-select').on('change', function() {
            const cityId = $(this).val();
            const districtSelect = $('#district-select');

            if (cityId) {
                districtSelect.prop('disabled', true).empty().append(`<option value="">${window.translations.loading}</option>`);

                $.ajax({
                    url: `/api/districts/cities/${cityId}`,
                    method: 'GET',
                    success: function(response) {
                        let districts = response?.result.data;
                        districtSelect.prop('disabled', false).empty().append(`<option value="">${window.translations.select_district}</option>`);
                        districtSelect.append(districts.map(district => `<option value="${district.id}">${district.title}</option>`));
                    },
                    error: function() {
                        alert(window.translations.failed_to_load_districts);
                        districtSelect.prop('disabled', true).empty().append(`<option value="">${window.translations.select_district}</option>`);
                    }
                });
            } else {
                districtSelect.prop('disabled', true).empty().append(`<option value="">${window.translations.select_district}</option>`);
            }
        });
    });


    $(document).ready(function () {
        function generateTimeOptions() {
            const startHour = 0; // 00:00
            const endHour = 24; // 24:00 (not inclusive)
            let timeOptions = "";

            for (let hour = startHour; hour < endHour; hour++) {
                const formattedTime = hour.toString().padStart(2, "0") + ":00"; // Format time as HH:00
                timeOptions += `<option value="${formattedTime}">${formattedTime}</option>`;
            }

            return timeOptions;
        }

        // Populate both start and end time dropdowns
        const timeOptions = generateTimeOptions();
        $("#start_time").append(timeOptions);
        $("#end_time").append(timeOptions);
    });
    $(function () {
        const minPrice = 0;
        const maxPrice = 1000;

        // Initialize the slider
        $("#price-slider").slider({
            range: true,
            min: minPrice,
            max: maxPrice,
            values: [200, 800], // Initial range
            slide: function (event, ui) {
                // Update the displayed values dynamically
                $("#price-min").text(`$${ui.values[0]}`);
                $("#price-max").text(`$${ui.values[1]}`);
            }
        });

        // Set initial values
        $("#price-min").text(`$${$("#price-slider").slider("values", 0)}`);
        $("#price-max").text(`$${$("#price-slider").slider("values", 1)}`);
    });
</script>
