/**
 * Global script
 *
 * @author FrankPonte
 */

import { checkWPAdminBar } from "./functions";

$(window).on("scroll", function () {
  checkWPAdminBar();
});

$(window).on("load", function () {
  // Hide preloader once the site has loaded
  $("#site-preloader").addClass("page-loaded");
  $("body").removeClass("overflow-hidden");
  $("#site-preloader.page-loaded").one(
    "webkitAnimationEnd oanimationend msAnimationEnd animationend",
    function (e) {
      $(this).addClass("d-none");
    }
  );
});
