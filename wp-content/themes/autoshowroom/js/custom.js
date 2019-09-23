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
function setCookie(name, value, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = name + "=" + value + "; " + expires;
}

jQuery(window).load(function(){
    jQuery('#tzloadding').remove();
    jQuery('body').append('<section class="products_compare"> <span class="view-compare"><i class="fa fa-car"></i>Compare List</span><span class="compare-count"></span> </section> <section class="compare-content"></sectionclass>');
    var id_arr = readCookie('vehicle_compare');
    if(id_arr){
        var ids = id_arr.split("|");
    }
    var list_compare = readCookie('list_compare');

    if(list_compare) {
        jQuery('.compare-count').html(list_compare);
    }
    var list_compare_text = readCookie('compare_list_text');
    if(list_compare_text) {
        jQuery('.products_compare').addClass('active');
        jQuery('.btn_detail_compare').each(function(){
            var id_btn = jQuery(this).attr('data-id');
            var in_id = jQuery.inArray( id_btn, ids );
            if(in_id>=0){
                jQuery(this).addClass('active');
                jQuery(this).html('<i class="fa fa-car"></i> '+list_compare_text+'');
            }
        })
    }
    jQuery('.btn_detail_compare').on('click',function(){
        jQuery(this).addClass('active');
        var id_arr = readCookie('vehicle_compare');
        var compare_text = jQuery(this).attr('data-text');
        createCookie('compare_list_text',compare_text,1);
        jQuery(this).html('<i class="fa fa-car"></i> '+compare_text+'');
        jQuery('.products_compare').addClass('active');
        if(id_arr) {
            var ids = id_arr.split("|");
        }
        var product_id = jQuery(this).attr('data-id')+'|';
        if(id_arr==null) {
            createCookie('vehicle_compare',product_id,1);
        }else{
            var in_arr = jQuery.inArray( product_id, ids );
            if(in_arr<0){
                createCookie('vehicle_compare',''+id_arr+''+product_id,1);
            }
        }
        var ids_str = readCookie('vehicle_compare');
        var ids_c = ids_str.split("|");
        var count_compare = ids_c.length -1;
        createCookie('list_compare',count_compare,1);
        jQuery('.compare-count').html(count_compare);

        if(typeof in_arr=='undefined' || in_arr<0) {
            jQuery('.products_compare').append('<span data-id="' + product_id + '"></span>');
        }
    })
    if(id_arr){
        jQuery.each(ids, function(index) {
            jQuery('.products_compare').append('<span data-id="' + ids[index] + '"></span>');
        });
    }
    jQuery('.view-compare').on('click',function(){
        autoshowroom_ajax_action();
    })

    jQuery('.auto_sort').on('change', function(){
        var odby = jQuery(this).val();
        var url = jQuery(this).attr('data-url');
        if(odby =='newness'){
            url+='?orderby=date&order=desc';
        }
        if(odby =='price_desc'){
            url+= '?orderby=price&order=desc';
        }
        if(odby =='price_asc'){
            url+= '?orderby=price&order=asc';
        }
        window.location.href = url;
    })

});
function autoshowroom_ajax_action(){
    var vehicleids =readCookie('vehicle_compare');
    jQuery('.default-page').addClass('ajax_active');
    jQuery('.default-page .container').fadeOut();
    jQuery.ajax({
        url: vehicle_compare_ajax.url,
        type: 'POST',
        data: ({
            action: 'tz_autoshowroom_compare_ajax',
            vehicleIDS: vehicleids
        }),
        success: function(data){
            if (data){
                jQuery('.default-page').append(data);
            }
            jQuery('.TZ-Vehicle-Compare').each(function(){
                jQuery(this).autoshowroom_owlCarousel({
                    margin:30,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:3,
                            nav:true
                        },
                        1200:{
                            items:3,
                            nav:true
                        }
                    }
                })
            })
            jQuery('.btn-remove-compare').on('click', function(){
                var ids = vehicleids;
                var ids_arr = ids.split("|");

                if(ids_arr.length >1){
                    var id_removed = jQuery(this).attr('data-id') +'|';
                } else{
                    var id_removed = jQuery(this).attr('data-id');
                }
                var res = ids.replace(id_removed, "");
                var res_arr = res.split("|");
                var count_compare = res_arr.length -1;
                createCookie('list_compare',count_compare,1);
                var list_compare = readCookie('list_compare');
                if(list_compare) {
                    jQuery('.compare-count').html(list_compare);
                }
                createCookie('vehicle_compare',res,1);
                autoshowroom_ajax_action();
            })
            jQuery('.default-page').removeClass('ajax_active');
        }
    });
}

jQuery(window).load(function(){

    if (jQuery('.js-masonry').length){
        var $grid = jQuery('.js-masonry').imagesLoaded( function() {
            $grid.masonry({
                itemSelector: '.autoshowroom-blog-item',
                columnWidth: '.autoshowroom-blog-item',
                percentPosition: true,          /*  Sets item positions in percent values, rather than pixel values.    */
                gutter: 30,                     /*  Adds horizontal space between item elements.    */
                horizontalOrder: false,         /*https://codepen.io/desandro/pen/EmKWdr*/
                fitWidth: true
            });
        });
    }



});