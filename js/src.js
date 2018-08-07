(function($) {})( jQuery ); // JQuery WordPress workaround

jQuery(document).ready(function($){ // Document Ready

    var is_top = true;

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
        is_top = false;
        // $('#siteheader').addClass('opaque');
    })
    .on('leave', function() {
        $('#siteheader').addClass('hit-top');
        is_top = true;
        // $('#siteheader').removeClass('opaque');
	})
    // .addIndicators()
    .addTo(controller);

    
    // MENU BUTTON
    var mobileButton = $('#main-mobile-button'),
        mobileTargetMenu = $('#siteheader .menu-container'),
        heightSource = $('#main-header-menu:hidden').outerHeight();
    
    console.log(is_top);

    function menuOpen(){
        mobileTargetMenu.addClass('open');
        TweenMax.fromTo(mobileTargetMenu, 0.25, {
            autoAlpha: 0
        }, {
            autoAlpha: 1,
            ease: Power3.easeOut
        })
        if (is_top == true) $('#siteheader').removeClass('hit-top');
        console.log(is_top);

        $('.dimmer').addClass('dim');
        $('body').addClass('lockdown');
    }

    function menuClose(){
        mobileTargetMenu.removeClass('open');
        TweenMax.to(mobileTargetMenu, 0.25, {
            autoAlpha: 0
        })
        if (is_top == true) $('#siteheader').addClass('hit-top');

        $('.dimmer').removeClass('dim');
        $('body').removeClass('lockdown');
    }
    
    mobileButton.on('click', function(){

        if (!mobileTargetMenu.hasClass('open')) {
            menuOpen();            
        } else {
            menuClose();
        }
    });

    $('.dimmer').on('click', function(){
        menuClose();
    })

    $(window).resize(function(){
        if($(window).outerWidth() > 1024){
            mobileTargetMenu.removeAttr('style');
        }
    });


    // SLICK SLIDER

    // featured properties slider
    $('#featured-properties-slider').slick({
        autoplay: true,
        autoplaySpeed: 10000,
        speed: 1000,
        prevArrow: '<button type="button" class="featured-arrows prev-btn"><i class="fas fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="featured-arrows next-btn"><i class="fas fa-angle-right"></i></button>',
        pauseOnHover: false,
    });

    function animateContents() {
        var targetEl = $('.featured-item.slick-active .contents');
        var headline = targetEl.find('.headline'),
            subtext = targetEl.find('.subtext'),
            content = targetEl.find('.custom-content'),
            button = targetEl.find('.btn');
        var animSpeed = 0.6;
        var featuredAnimation = new TimelineMax()
            .to(headline, animSpeed, {
                autoAlpha: 1,
            }, 'a')
            .from(headline, animSpeed, {
                y: 50
            }, 'a')
            .to(subtext, animSpeed, {
                autoAlpha: 1,
            }, 'a+=0.3')
            .from(subtext, animSpeed, {
                y: 50
            }, 'a+=0.3')
            .to(content, animSpeed, {
                autoAlpha: 1,
            }, 'a+=0.6')
            .from(content, animSpeed, {
                y: 50
            }, 'a+=0.6')
            .to(button, animSpeed, {
                autoAlpha: 1,
            }, 'a+=1.2')
            .play(0);
    }

    animateContents();

    $('#featured-properties-slider').on('afterChange', function(event) {
        // console.log('slide change!');
        animateContents();
        
        $(this).find('.headline').css('visibility','hidden');
        $(this).find('.subtext').css('visibility','hidden');
        $(this).find('.custom-content').css('visibility','hidden');
        $(this).find('.btn').css('visibility','hidden');
    });

}); // END Main