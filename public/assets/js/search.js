/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/search.js ***!
  \********************************/
$('.search-toggle').addClass('closed');
$('.search-container').addClass('closed-0');
$('.search-toggle .search-icon').click(function (e) {
  if ($('.search-toggle').hasClass('closed')) {
    $('.search-container').removeClass('closed-0').addClass('opened-0');
    $('.search-toggle').removeClass('closed').addClass('opened');
    $('.search-toggle, .search-container').addClass('opened');
    $('#search-terms').focus();
  } else {
    $('.search-toggle').removeClass('opened').addClass('closed');
    $('.search-container').removeClass('opened-0').addClass('closed-0');
    $('.search-toggle, .search-container').removeClass('opened');
  }
});
/******/ })()
;