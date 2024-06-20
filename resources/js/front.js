
import './bootstrap.js';

import 'bootstrap';

import '@popperjs/core';

import Swal from "sweetalert2";

import jquery from "jquery";

// import Swiper JS
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

const slider = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

window.Swal = Swal;
window.$ = jquery;
window.jQuery = jquery;

import Iconify from "@iconify/iconify";