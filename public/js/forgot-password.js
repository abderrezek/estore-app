/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***********************************************!*\
  !*** ./resources/js/auths/forgot-password.js ***!
  \***********************************************/
$(function () {
  $('#forgotPasswordForm').validate({
    rules: {
      email: {
        required: true,
        email: true
      }
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
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