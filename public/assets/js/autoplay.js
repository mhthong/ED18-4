/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/autoplay.js ***!
  \**********************************/
$(document).ready(function () {
  $('.product_main_slider').slick({
    centerMode: true,
    centerPadding: '0px',
    slidesToShow: 4,
    focusOnSelect: true,
    autoplay: false,
    autoplaySpeed: 1000,
    arrows: true,
    draggable: false,
    prevArrow: '<button type="button" class="slick-prev pull-left"><i class="fa-sharp fa-solid fa-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next pull-right"><i class="fa-sharp fa-solid fa-arrow-right"></i></button>',
    responsive: [{
      breakpoint: 994,
      settings: {
        arrows: false,
        centerMode: true,
        slidesToShow: 3
      }
    }, {
      breakpoint: 769,
      settings: {
        arrows: false,
        centerMode: true,
        slidesToShow: 2
      }
    }, {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        slidesToShow: 2
      }
    }]
  });
  $('.product_main_slider_1').slick({
    centerMode: true,
    centerPadding: '0px',
    slidesToShow: 5,
    focusOnSelect: true,
    autoplay: true,
    autoplaySpeed: 1000,
    arrows: true,
    draggable: false,
    prevArrow: '<button type="button" class="slick-prev pull-left"><i class="fa-sharp fa-solid fa-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next pull-right"><i class="fa-sharp fa-solid fa-arrow-right"></i></button>',
    responsive: [{
      breakpoint: 994,
      settings: {
        arrows: false,
        centerMode: true,
        slidesToShow: 3
      }
    }, {
      breakpoint: 769,
      settings: {
        arrows: false,
        centerMode: true,
        slidesToShow: 2
      }
    }, {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        slidesToShow: 1
      }
    }]
  });
});

///
/******/ })()
;