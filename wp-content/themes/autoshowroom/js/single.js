"use strict";
jQuery(window).load(function(){

    var slider_width = jQuery('#shopslider').width()-60;
    var item_width = (slider_width/5);
    jQuery('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: true,
        slideshow: false,
        itemWidth: item_width,
        itemMargin: 15,
        move:3,
        asNavFor: '#shopslider'
    });

    jQuery('#shopslider').flexslider({
        animation: "fade",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        smoothHeight: true,
        sync: "#carousel",
        directionNav: false,
        start: function(slider){
            jQuery('body').removeClass('loading');
        }
    });
    jQuery('.autoshowroom-gallery-flexslider .slides').autoshowroom_owlCarousel({
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1,
                nav: false
            },
            1200: {
                items: 1,
                nav: false
            }
        }
    })

});
