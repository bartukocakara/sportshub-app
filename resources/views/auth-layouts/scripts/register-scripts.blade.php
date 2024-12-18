<script>
    $(document).ready(function () {
        $('#auth').on('submit', function (e) {
            let valid = true;
            let firstName = $('#first_name').val().trim();
            let lastName = $('#last_name').val().trim();
            let birthDate = $('#birth_date').val().trim();
            let email = $('#email').val().trim();
            let password = $('#password').val();
            let passwordConfirmation = $('#password_confirmation').val();

            // Clear previous error messages
            $('.invalid-feedback').remove();
            $('.form-control').removeClass('is-invalid');
            let submitBtn = $('#kt_sign_submit');
            submitBtn.find('.indicator-label').remove(); // Remove the previous label
            submitBtn.html("<span class='spinner-border spinner-border-sm align-middle ms-2'></span>'"); // Show the spinner

            // Disable the button
            submitBtn.prop('disabled', true);

            // First Name validation
            if (firstName === '') {
                showError('#first_name', 'İsim alanı gereklidir.');
                valid = false;
            }

            // Last Name validation
            if (lastName === '') {
                showError('#last_name', 'Soyisim alanı gereklidir.');
                valid = false;
            }

            // Birth Date validation
            if (birthDate === '') {
                showError('#birth_date', 'Doğum tarihi alanı gereklidir.');
                valid = false;
            } else if (new Date(birthDate) >= new Date()) {
                showError('#birth_date', 'Doğum tarihi bugünden önce olmalıdır.');
                valid = false;
            }

            // Email validation
            if (email === '') {
                showError('#email', 'Email alanı gereklidir.');
                valid = false;
            } else if (!validateEmail(email)) {
                showError('#email', 'Geçerli bir email adresi giriniz.');
                valid = false;
            }

            // Password validation
            if (password === '') {
                showError('#password', 'Şifre alanı gereklidir.');
                valid = false;
            } else if (password.length < 8) {
                showError('#password', 'Şifre en az 8 karakter olmalıdır.');
                valid = false;
            }

            // Password confirmation validation
            if (passwordConfirmation !== password) {
                showError('#password_confirmation', 'Şifreler eşleşmiyor.');
                valid = false;
            }

            // Prevent form submission if validation fails
            if (!valid) {
                e.preventDefault();
            }

            // Simulate an API call or response handling
            // After response (success or failure), reset the button state
            setTimeout(function () {
                // Simulating successful response (you can modify it as per your actual response handling logic)
                if (valid) {
                    // On success, reset the button
                    submitBtn.prop('disabled', false); // Enable the button
                    submitBtn.html("<span class='indicator-label'>Continue</span>"); // Reset button text
                } else {
                    // On failure, reset the button
                    submitBtn.prop('disabled', false); // Enable the button
                    submitBtn.html("<span class='indicator-label'>Continue</span>"); // Reset button text
                }
            }, 2000); // Adjust timeout to simulate server response time
        });

        // Function to show error messages
        function showError(selector, message) {
            $(selector).addClass('is-invalid');
            $(selector).after(`<div class="invalid-feedback">${message}</div>`);
        }

        // Function to validate email format
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
    });
</script>
