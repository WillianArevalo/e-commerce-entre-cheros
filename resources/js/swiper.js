export function initSwiper() {
    new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 20,
        navigation: {
            nextEl: ".button-next",
            prevEl: ".button-prev",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
        },
    });
}
