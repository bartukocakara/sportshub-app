<script>
$(document).ready(function () {
    // Initialize noUiSlider
    var priceSlider = document.getElementById("price-slider");

    noUiSlider.create(priceSlider, {
        start: [0, 1000],
        connect: true,
        range: {
            min: 0,
            max: 1000
        }
    });

    // Update the displayed price values
    priceSlider.noUiSlider.on("update", function (values) {
        $("#price-min").text("₺" + Math.round(values[0]));
        $("#price-max").text("₺" + Math.round(values[1]));
        $("#price_min_input").val(Math.round(values[0]));
        $("#price_max_input").val(Math.round(values[1]));
    });

    // Open the modal when "Start Filter" button is clicked
    $("#start-filter-btn").on("click", function (e) {
        e.preventDefault();
        $("#kt_modal_pricing").modal("show");
    });
});
$(document).ready(function () {
        // Get minimum_price and maximum_price from the request
        const minPrice = "{{ request()->get('minimum_price', 0) }}";
        const maxPrice = "{{ request()->get('maximum_price', 1000) }}";

        // Initialize the price range slider
        $('#price-slider').slider({
            range: true,
            min: 0,
            max: 1000,
            values: [minPrice, maxPrice],
            slide: function (event, ui) {
                // Update the displayed price range
                $('#price-min').text('₺' + ui.values[0]);
                $('#price-max').text('₺' + ui.values[1]);

                // Update the hidden inputs
                $('#price_min_input').val(ui.values[0]);
                $('#price_max_input').val(ui.values[1]);
            }
        });

        // Set initial values for the displayed price range
        $('#price-min').text('₺' + minPrice);
        $('#price-max').text('₺' + maxPrice);

        // When the modal is shown, update the slider and hidden inputs
        $('#kt_modal_pricing').on('shown.bs.modal', function () {
            $('#price-slider').slider('values', [minPrice, maxPrice]);
            $('#price_min_input').val(minPrice);
            $('#price_max_input').val(maxPrice);
        });
    });

</script>

