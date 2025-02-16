document.addEventListener('DOMContentLoaded', function() {
    // Swiper for the court images in the Court Details card
    new Swiper('.images-swiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        keyboard: {
            enabled: true,
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        touchEventsTarget: 'container',
        grabCursor: true,
    });

    // New Swiper for the small court thumbnail in the Reservation Details card
    new Swiper('.court-thumbnail-swiper', {
        slidesPerView: 1,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.court-thumbnail-swiper .swiper-pagination',
            clickable: true,
        },
        keyboard: {
            enabled: true,
        },
    });
});
