/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/style.js ***!
  \*******************************/
$('.notify').click(function () {
  $(this).fadeOut();
});

/*   contact zalo fb ... */

$(document).ready(function () {
  $('.support-content').hide();
  $('a.btn-support').click(function (e) {
    e.stopPropagation();
    $('.support-content').slideToggle();
  });
  $('.support-content').click(function (e) {
    e.stopPropagation();
  });
  $(document).click(function () {
    $('.support-content').slideUp();
  });
});
/******/ })()
;