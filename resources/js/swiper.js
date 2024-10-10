export function initSwiper() {
    if (document.querySelector(".mySwiper")) {
        new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 20,
            navigation: {
                nextEl: ".button-next",
                prevEl: ".button-prev",
            },
            breakpoints: {
                200: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                320: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                760: {
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

    if (document.querySelector(".swiper-images-secondarys")) {
        new Swiper(".swiper-images-secondarys", {
            slidesPerView: 3,
            spaceBetween: 20,
            navigation: {
                nextEl: ".button-next-images",
                prevEl: ".button-prev-images",
            },
            breakpoints: {
                320: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
            },
        });
    }

    if (document.querySelector(".swiper-home")) {
        new Swiper(".swiper-home", {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".button-next-home",
                prevEl: ".button-prev-home",
            },
        });
    }
}
