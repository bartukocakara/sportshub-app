<script>
$(document).ready(function() {
    var currentStep = 1;

    // Show the first step
    showStep(currentStep);

    // Handle Next button click
    $('#next_step').on('click', function() {
        if (validateStep(currentStep)) {
            if (currentStep < 3) {
                currentStep++;
                showStep(currentStep);
            }
        } else {
            alert('Please complete the current step before proceeding.');
        }
    });

    // Handle Previous button click
    $('#prev_step').on('click', function() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    });

    // Show the relevant content for the current step
    function showStep(step) {
        // Hide all step contents
        $('.step-content').hide();

        // Show the current step's content
        $('[data-step="' + step + '"]').show();

        // Update the stepper navigation
        $('.stepper-item').removeClass('current');
        $('.stepper-item[data-step="' + step + '"]').addClass('current');
    }

    // Validation function for each step
    function validateStep(step) {
        var isValid = true;

        switch(step) {
            case 1:
                // Validate Date filtering step
                if ($('#start_date').val() === '' || $('#end_date').val() === '') {
                    isValid = false;
                }
                break;
            case 2:
                // Validate Price filtering step
                if ($('#min_price').val() === '' || $('#max_price').val() === '') {
                    isValid = false;
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
    if (params.start_date) {
        $('#start_date').val(params.start_date);
    }

    if (params.end_date) {
        $('#end_date').val(params.end_date);
    }
});

</script>
