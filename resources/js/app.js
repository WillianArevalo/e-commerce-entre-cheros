import "./bootstrap";
import "./jquery";
import "flowbite";
import "./loginAdmin";
import "./customSelect";
import "./script";
import "./categorie";
import "./brand";
import "./product";
import "./modal-image";
import "./flash-offers";
import "./popup";
import "./user";
import "./faq";
import "./swiper";
import "./product-view";
import "./cart";
import "./drawer";
import { initSwiper } from "./swiper";

initSwiper();

var swiperHome = new Swiper(".swiper-home", {
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
