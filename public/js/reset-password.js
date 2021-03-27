/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************************!*\
  !*** ./resources/js/auths/reset-password.js ***!
  \**********************************************/
$(function () {
  $('#resetPasswordForm').validate({
    rules: {
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 8
      },
      password_confirmation: {
        required: true,
        equalTo: "#idpassword"
      }
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "The password field is required.",
        minlength: "The password must be at least 8 characters."
      },
      password_confirmation: {
        required: "The password confirmation field is required.",
        equalTo: "The password confirmation does not match."
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