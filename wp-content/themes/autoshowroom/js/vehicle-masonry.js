"use strict";
function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}

function autoshowroom_vehicle_init(){

    var window_width = jQuery(window).width();
    var desktopCol = jQuery ('.vehicle-page-masonry').attr('data-desktop');
    var tabletCol  = jQuery ('.vehicle-page-masonry').attr('data-tablet');
    var mobileCol  = jQuery ('.vehicle-page-masonry').attr('data-mobile');
    if (window_width>1200){
        var cols = desktopCol;
    }
    if ((992 < window_width) && (window_width<= 1200) ){
        var cols = tabletCol;
    }
    if ((480 <= window_width) && (window_width<= 992) ){
        var cols = tabletCol;
    }
    if (window_width < 480){
        var cols = mobileCol;
    }

    var vehicle_layouts = readCookie('vehicle_layout');

    if(vehicle_layouts=='list'){
        var cols_layout = 1;
        jQuery('.vehicle-masonry').addClass('vehicle-layout-list');
    } else{
        var cols_layout = cols;
        jQuery('.vehicle-masonry').removeClass('vehicle-layout-list');
    }

    var container_width = jQuery('.vehicle-masonry').width();
    var item_width = Math.floor(container_width/cols_layout);
    jQuery('.vehicle-grid').css({
        width:item_width+'px'
    });

    var $grid = jQuery('.vehicle-masonry').imagesLoaded( function() {
        $grid.masonry({
            itemSelector: '.vehicle-grid',
            percentPosition: true,
            columnWidth: item_width
        });
    });
    jQuery('.vehicle-grid').css({
        opacity:1
    });
}

var tz_resizeTimer = null;
jQuery(window).on('load resize',function() {
    var container_width = jQuery('.vehicle-masonry').width();
    var vehicle_layouts = readCookie('vehicle_layout');
    if(vehicle_layouts=='list'){
        jQuery('.vehicle-layout-list-button').addClass('active');
    }else{
        jQuery('.vehicle-layout-grid-button').addClass('active');
    }

    if (tz_resizeTimer) clearTimeout(tz_resizeTimer);
    tz_resizeTimer = setTimeout("autoshowroom_vehicle_init()", 100);

});

jQuery(document).ready(function(){
    jQuery('.vehicle-layout-grid-button').on('click', function(){
        var active_class = jQuery(this).hasClass('active');
        if(active_class==false){
            jQuery(this).parent().find('a').removeClass('active');
            jQuery(this).addClass('active');
            jQuery('.vehicle-grid').removeAttr('style');
            jQuery('.vehicle-grid').removeClass('vehicle-list');
            jQuery('.vehicle-masonry').removeClass('vehicle-layout-list');
            jQuery('.vehicle-masonry').removeAttr('style');
            eraseCookie('vehicle_layout');
            autoshowroom_vehicle_init();
        }
    });
    jQuery('.vehicle-layout-list-button').on('click', function(){
        var active_class = jQuery(this).hasClass('active');
        jQuery('.vehicle-masonry').addClass('vehicle-layout-list-active');
        if(active_class==false){
            jQuery(this).parent().find('a').removeClass('active');
            jQuery(this).addClass('active');
            createCookie('vehicle_layout','list',1);
            jQuery('.vehicle-masonry').addClass('vehicle-layout-list');
            jQuery('.vehicle-grid').addClass('vehicle-list');
            jQuery('.vehicle-grid').removeAttr('style');
            autoshowroom_vehicle_init();
        }
    })
})