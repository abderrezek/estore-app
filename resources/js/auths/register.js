$(function () {
    $('#registerForm').validate({
        rules: {
            first_name: {
                required: true,
            },
            last_name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            mobile: {
                digits: true,
                minlength: 10,
                maxlength: 10,
            },
            password: {
                required: true,
                minlength: 8,
            },
            password_confirmation: {
                required: true,
                equalTo: "#idpassword",
            },
        },
        messages: {
            first_name: {
                required: "The first name field is required.",
            },
            last_name: {
                required: "The last name field is required.",
            },
            email: {
                required: "The email field is required.",
                email: "The email must be a valid email address.",
            },
            mobile: {
                digits: "The mobile must be 10 digits.",
                minlength: "The mobile must be 10 digits.",
                maxlength: "The mobile must be 10 digits.",
            },
            password: {
                required: "The password field is required.",
                minlength: "The password must be at least 8 characters.",
            },
            password_confirmation: {
                required: "The password confirmation field is required.",
                equalTo: "The password confirmation does not match.",
            },
        },
        errorElement: 'span',
        errorPlacement: function (err, ele) {
            err.addClass('invalid-feedback');
            ele.closest('.inputs').append(err);
        },
        highlight: function (ele, errClass, validClass) {
            $(ele).addClass('is-invalid');
        },
        unhighlight: function (ele, errClass, validClass) {
            $(ele).removeClass('is-invalid');
        },
    });
});