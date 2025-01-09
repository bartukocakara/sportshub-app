
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#courtImage').on('click', function() {
            // Retrieve court_images data from data attribute
            var courtImages = $(this).data('court-images');  // This gives you the parsed JSON object

            var carouselContent = $('#carouselImagesContent');

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

        $('[id^="courtImage-"]').on('click', function () {
            // Retrieve court_images data from the data attribute
            var courtImages = $(this).data('court-images'); // Should be a JSON array

            // Reference the carousel content container
            var carouselContent = $('#carouselImagesContent');

            // Clear existing carousel items
            carouselContent.empty();

            // Loop through the courtImages array and add slides
            courtImages.forEach((image, index) => {
                var isActive = index === 0 ? 'active' : ''; // Set the first image as active
                var imgSrc = '/storage/courts/' + image.file_path; // Construct the image source URL

                // Create carousel item
                var slide = `
                    <div class="carousel-item ${isActive}">
                        <img src="${imgSrc}" class="d-block w-100" alt="Court Image ${index + 1}">
                    </div>
                `;

                // Append the slide to the carousel content
                carouselContent.append(slide);
            });

            // Show the modal
            $('#imageModal').modal('show');
        });
    });
</script>

