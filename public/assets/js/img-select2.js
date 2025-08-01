$(document).ready(function() {
    $('#sport_type').select2({
        templateResult: function (option) {
            if (!option.id) {
                return option.text;
            }
            var $option = $(
                '<span><img src="' + $(option.element).data('image') + '" class="img-flag" width="25" /> ' + option.text + '</span>'
            );
            return $option;
        },
        templateSelection: function (option) {
            if (!option.id) {
                return option.text;
            }
            var $option = $(
                '<span><img src="' + $(option.element).data('image') + '" class="img-flag" width="25" /> ' + option.text + '</span>'
            );
            return $option;
        },
        escapeMarkup: function (markup) {
            return markup; // Allow HTML in the result
        }
    });
});