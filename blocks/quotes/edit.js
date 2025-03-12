// Load Swiper.js dynamically if not already loaded
if (typeof Swiper === "undefined") {
    let script = document.createElement("script");
    script.src = "https://unpkg.com/swiper/swiper-bundle.min.js";
    script.onload = function () {
        console.log("Swiper.js loaded dynamically");
        initializeSwiper();
    };
    document.head.appendChild(script);
} else {
    initializeSwiper();
}

// Load Swiper CSS dynamically if not already present
if (!document.querySelector('link[href="https://unpkg.com/swiper/swiper-bundle.min.css"]')) {
    let style = document.createElement("link");
    style.rel = "stylesheet";
    style.href = "https://unpkg.com/swiper/swiper-bundle.min.css";
    style.type = "text/css";
    document.head.appendChild(style);
}

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
