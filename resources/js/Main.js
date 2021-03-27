!(function (t) {
    "use strict";
    t(document).ready(function () {
        function e() {
            t(window).width() > 768
                ? t(".navbar .dropdown")
                      .on("mouseover", function () {
                          t(".dropdown-toggle", this).trigger("click");
                      })
                      .on("mouseout", function () {
                          t(".dropdown-toggle", this).trigger("click").blur();
                      })
                : t(".navbar .dropdown").off("mouseover").off("mouseout");
        }
        e(),
            t(window).resize(e),
            t("#email-sender").click(function (e) {
                e.preventDefault(), t("#email-form").submit();
            });
    }),
        t(window).scroll(function () {
            t(this).scrollTop() > 100 ? t(".back-to-top").fadeIn("slow") : t(".back-to-top").fadeOut("slow");
        }),
        t(".back-to-top").click(function () {
            return t("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo"), !1;
        }),
        t(".qty button").on("click", function () {
            var e = t(this),
                i = e.parent().find("input").val();
            if (e.hasClass("btn-plus")) var s = parseFloat(i) + 1;
            else s = i > 0 ? parseFloat(i) - 1 : 0;
            e.parent().find("input").val(s);
        }),
        t(".checkout #shipto").change(function () {
            t(this).is(":checked") ? t(".checkout .shipping-address").slideDown() : t(".checkout .shipping-address").slideUp();
        }),
        t(".checkout .payment-method .custom-control-input").change(function () {
            if (t(this).prop("checked")) {
                var e = t(this).attr("id");
                t(".checkout .payment-method .payment-content").slideUp(), t("#" + e + "-show").slideDown();
            }
        });
})(jQuery);