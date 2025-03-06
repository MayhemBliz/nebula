document.addEventListener('DOMContentLoaded', function() {
    // Look for all instances of the Swiper container within your quotes block.
    var quoteSliders = document.querySelectorAll('.swiper-container');

    // Initialize a new Swiper for each found container.
    quoteSliders.forEach(function(container) {
        new Swiper(container, {
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 80,
                }
            },
            loop: true,
            pagination: {
                el: ".swiper-pagination-custom",
                type: "fraction",
            },
            navigation: {
                nextEl: ".swiper-button-next-custom",
                prevEl: ".swiper-button-prev-custom",
            },
        });
    });
});
