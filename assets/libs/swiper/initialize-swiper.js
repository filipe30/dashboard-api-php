/*------------------------------------
        Slider
--------------------------------------*/
"use strict";
/*---------------------
Main Slider
-----------------------*/
    //Slider Animated Caption
    const slideHome = new Swiper('.swiper-main-slider', {
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        spaceBetween: 0,
        loop: false,
        simulateTouch: true,
        autoplay: { delay: 5000 },
        speed: 1000,
        slidesPerView: 1,
    });

/*---------------------
Clientes carousel
-----------------------*/
    const clientSlide = new Swiper('#promos', {
        loop: false,
        simulateTouch: true,
        autoplay: { delay: 5000 },
        speed: 1000,
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true,
        },
        slidesPerView: 1.1,
        spaceBetween: 25,
        // Responsive breakpoints
    });
