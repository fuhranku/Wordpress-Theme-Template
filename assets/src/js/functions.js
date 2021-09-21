/**
 * Functions script
 *
 * @author FrankPonte
 */
function checkWPAdminBar() {
  // Fix issue between wp admin bar and header overlapping
  if ($("#wpadminbar").length && $(window).width() > 425) {
    if ($("#mainHeader").hasClass("fixed-top")) {
      $("#mainHeader.fixed-top").addClass("wpadminbar-exists");
      return;
    } else {
      $("#mainHeader").removeClass("wpadminbar-exists");
    }
  }
}

export { checkWPAdminBar };
