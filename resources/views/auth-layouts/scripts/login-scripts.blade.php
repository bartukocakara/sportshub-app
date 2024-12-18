<script>
        $(document).ready(function() {
            $('#auth').on('submit', function(){
                let submitBtn = $('#kt_sign_submit')
                submitBtn.find('.indicator-label').remove()
                submitBtn.html("<span class='spinner-border spinner-border-sm align-middle ms-2'></span>'")
                // Disable the button
                submitBtn.prop('disabled', true);
            });
        });
    </script>
