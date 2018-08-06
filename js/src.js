(function($) {})( jQuery ); // JQuery WordPress workaround

jQuery(document).ready(function($){ // Document Ready


    // ANIMATIONS
    var controller = new ScrollMagic.Controller();

    // navbar animation
    var navMenuTransition = new ScrollMagic.Scene({
        triggerElement: '#top',
        offset: '50px',
        triggerHook: 0,
    })
    .on('enter', function() {
        $('#siteheader').removeClass('hit-top');
    })
    .on('leave', function() {
        $('#siteheader').addClass('hit-top');
	})
    .addIndicators()
    .addTo(controller);



    // SLICK SLIDER

    // featured properties slider
    $('#featured-properties-slider').slick({
        arrows: false,
    });

}); // END Main