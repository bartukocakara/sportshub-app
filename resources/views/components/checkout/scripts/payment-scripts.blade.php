<script>
   $(document).ready(function () {

    $('#card_number').on('input', function() {
        let value = $(this).val().replace(/\D/g, ''); // Remove non-numeric characters
        value = value.substring(0, 16); // Limit to 16 digits

        // Format the value as '#### #### #### ####'
        let formattedValue = value.replace(/(\d{4})(?=\d)/g, '$1 ');

        $(this).val(formattedValue); // Set the formatted value back to the input
    });

    $('#cvv').on('input', function() {
        let value = $(this).val().replace(/\D/g, ''); // Remove non-numeric characters
        value = value.substring(0, 3); // Limit to 3 digits

        $(this).val(value); // Set the value back to the input
    });
    // Initialize form validation
    $('#paymentForm').validate({
        rules: {
            fname: {
                required: true,
                maxlength: 255
            },
            lname: {
                required: true,
                maxlength: 255
            },
            card_number: {
                required: true,
                digits: true,
                minlength: 16,
                maxlength: 16
            },
            expiry_month: {
                required: true,
                number: true,
                range: [1, 12]
            },
            expiry_year: {
                required: true,
                digits: true,
                minlength: 4,
                maxlength: 4,
                min: new Date().getFullYear()
            },
            cvv: {
                required: true,
                digits: true,
                minlength: 3,
                maxlength: 3
            }
        },
        messages: {
            fname: {
                required: "First name is required.",
                maxlength: "First name cannot exceed 255 characters."
            },
            lname: {
                required: "Last name is required.",
                maxlength: "Last name cannot exceed 255 characters."
            },
            card_number: {
                required: "Card number is required.",
                digits: "Card number must be digits.",
                minlength: "Card number must be 16 digits.",
                maxlength: "Card number must be 16 digits."
            },
            expiry_month: {
                required: "Please select an expiry month.",
                number: "Please enter a valid number.",
                range: "Please select a month between 01 and 12."
            },
            expiry_year: {
                required: "Please select an expiry year.",
                digits: "Please enter a valid year.",
                minlength: "Year must be 4 digits.",
                maxlength: "Year must be 4 digits.",
                min: "Year must be the current year or later."
            },
            cvv: {
                required: "CVV is required.",
                digits: "CVV must be digits.",
                minlength: "CVV must be 3 digits.",
                maxlength: "CVV must be 3 digits."
            }
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "expiry_month" || element.attr("name") === "expiry_year") {
                error.appendTo(element.closest('div'));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element) {
            $(element).addClass("is-invalid");
            $(element).removeClass("is-valid");
        },
        unhighlight: function (element) {
            $(element).removeClass("is-invalid");
            $(element).addClass("is-valid");
        }
    });
});


</script>
