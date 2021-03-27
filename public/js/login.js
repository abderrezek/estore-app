/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/auths/login.js ***!
  \*************************************/
$(function () {
  $('#loginForm').validate({
    rules: {
      name: {
        required: true
      },
      password: {
        required: true
      }
    },
    messages: {
      name: {
        required: "The name field is required."
      },
      password: {
        required: "The password field is required."
      }
    },
    errorElement: 'span',
    errorPlacement: function errorPlacement(err, ele) {
      err.addClass('invalid-feedback');
      ele.closest('.inputs').append(err);
    },
    highlight: function highlight(ele, errClass, validClass) {
      $(ele).addClass('is-invalid');
    },
    unhighlight: function unhighlight(ele, errClass, validClass) {
      $(ele).removeClass('is-invalid');
    }
  });
});
/******/ })()
;