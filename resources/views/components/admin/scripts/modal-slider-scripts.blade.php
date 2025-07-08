<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('.court-image-modal-trigger').on('click', function () {
            const images = $(this).data('images') || [];
            const $carouselContent = $('#carouselImagesContent');

            $carouselContent.empty();

            images.forEach((src, index) => {
                const isActive = index === 0 ? 'active' : '';
                const slide = `
                    <div class="carousel-item ${isActive}">
                        <img src="${src}" class="d-block w-100" alt="Court Image ${index + 1}">
                    </div>
                `;
                $carouselContent.append(slide);
            });

            new bootstrap.Carousel(document.getElementById('carouselImages'), {
                interval: 5000,
                wrap: true
            });
        });

        $('#imageModal').on('hidden.bs.modal', function () {
            $('#carouselImagesContent').empty();
        });
    });

</script>
