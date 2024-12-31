
<script>

</script>

<script>
     @php
        $translations = [
            'start_date_and_end_date_are_required' => __('messages.start_date_and_end_date_are_required'),
            'start_date_cannot_be_after_end_date' => __('messages.start_date_cannot_be_after_end_date'),
            'start_date_cannot_be_in_the_past' => __('messages.start_date_cannot_be_in_the_past'),
            'price_must_be_a_number' => __('messages.price_must_be_a_number'),
            'price_cannot_be_negative' => __('messages.price_cannot_be_negative'),
            'min_price_cannot_be_greater_than_max_price' => __('messages.min_price_cannot_be_greater_than_max_price'),
        ];
    @endphp

    var translations = @json($translations);
    $(document).ready(function() {

        var currentStep = 1;

        showStep(currentStep);

        $('#next_step').on('click', function() {
            if (validateStep(currentStep)) {
                if (currentStep < 3) {
                    currentStep++;
                    showStep(currentStep);
                }
            }
        });

        $('#prev_step').on('click', function() {
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            }
        });

        function showStep(step) {
            $('.step-content').hide();

            $('[data-step="' + step + '"]').show();

            $('.stepper-item').removeClass('current');
            $('.stepper-item[data-step="' + step + '"]').addClass('current');
        }

        function validateStep(step) {
            var isValid = true;

            switch(step) {
                case 1:
                    // Validate Date filtering step
                    const startDate = new Date($('#start_date').val());
                    const endDate = new Date($('#end_date').val());
                    const today = new Date();

                    if ($('#start_date').val() === '' || $('#end_date').val() === '') {
                        $('#date_error').text(translations.start_date_and_end_date_are_required).show();
                        isValid = false;
                    } else if (startDate > endDate) {
                        $('#date_error').text(translations.start_date_cannot_be_after_end_date).show();
                        isValid = false;
                    } else if (startDate <= today) {
                        $('#date_error').text(translations.start_date_cannot_be_in_the_past).show();
                        isValid = false;
                    } else {
                        $('#date_error').hide();
                    }
                    break;
                case 2:
                    const minPrice = parseFloat($('#min_price').val());
                    const maxPrice = parseFloat($('#max_price').val());

                    if (isNaN(minPrice) || isNaN(maxPrice)) {
                        $('.invalid-feedback').text(translations.price_must_be_a_number).show();
                        isValid = false;
                    } else if (minPrice < 0 || maxPrice < 0) {
                        $('.invalid-feedback').text(translations.price_cannot_be_negative).show();
                        isValid = false;
                    } else if (minPrice > maxPrice) {
                        $('.invalid-feedback').text(translations.min_price_cannot_be_greater_than_max_price).show();
                        isValid = false;
                    } else {
                        $('.invalid-feedback').hide();
                    }
                    break;
                case 3:
                    // Validate Sport type filtering step
                    if ($('#sport_type').val() === '') {
                        isValid = false;
                    }
                    break;
            }

            return isValid;
        }

        // Prevent selecting invalid dates
        $('#start_date').on('change', function() {
            const startDate = $(this).val();
            $('#end_date').attr('min', startDate);
        });

        $('#end_date').on('change', function() {
            const endDate = $(this).val();
            $('#start_date').attr('max', endDate);
        });

        // Handle form submit
        $('#submit_stepper').on('click', function() {
            if (validateStep(currentStep)) {
                // Submit form or perform desired action
                alert('Form submitted');
            } else {
                alert('Please complete all steps before submitting.');
            }
        });

        // Function to get URL parameters as an object
        function getUrlParams() {
            var params = {};
            var queryString = window.location.search.substring(1);
            var urlParams = new URLSearchParams(queryString);

            urlParams.forEach(function(value, key) {
                params[key] = value;
            });
            return params;
        }

        // Function to render filters as badges
        function renderFiltersAsBadges(filters) {
            var filterContainer = $('#filters');
            filterContainer.empty(); // Clear previous filters

            // Loop through the filters and create badges
            for (var key in filters) {
                if (filters.hasOwnProperty(key)) {
                    var badgeHTML = '<span class="badge bg-primary me-2 mb-2">' + key + ': ' + filters[key] + '</span>';
                    filterContainer.append(badgeHTML);
                }
            }
        }

        // Get the filters from the URL and render them
        var filters = getUrlParams();
        if (Object.keys(filters).length > 0) {
            renderFiltersAsBadges(filters);
        }
        if (filters.start_date) {
            $('#start_date').val(filters.start_date);
        }

        if (filters.end_date) {
            $('#end_date').val(filters.end_date);
        }
    });
</script>
