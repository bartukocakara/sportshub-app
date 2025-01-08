
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('#courtImage').on('click', function() {
            var courtImages = @json($court['court_images']);  // Assuming court_images is an array in PHP
            var carouselContent = $('#carouselImagesContent');

            // Clear any existing images
            carouselContent.empty();

            // Loop through each image and add it to the carousel
            $.each(courtImages, function(index, image) {
                var isActive = index === 0 ? 'active' : '';  // Set the first image as active
                var imgSrc = '{{ asset("storage/courts/") }}/' + image.file_path;

                var slide = $('<div>').addClass('carousel-item ' + isActive);
                var img = $('<img>').addClass('d-block w-100').attr('src', imgSrc).attr('alt', 'Court Image ' + (index + 1));

                slide.append(img);
                carouselContent.append(slide);
            });
        });
    });
</script>
