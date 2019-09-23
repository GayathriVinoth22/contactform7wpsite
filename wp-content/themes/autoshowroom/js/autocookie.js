
/*------------------ live demo*/
var $live_demo = true;

jQuery('.live_icon').click(function(){
    if ( $live_demo == true ){
        jQuery('.livedemo').addClass('liveeff');
        $live_demo = false;
    }else{
        jQuery('.livedemo').removeClass('liveeff');
        $live_demo = true;
    }
});
function change_color_example(data_color){
    jQuery('.addcss_example').remove();
    jQuery('head').append('' +
        '<style type="text/css" class="addcss_example">' +
        'body .autoshowroom-quote .slick-track .autoshowroom-quote-item .autoshowroom-quote-image::after,'+
        'body .autoshowroom-service .autoshowroom-service-icon::after,'+
        'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToList span::after,'+
        'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToGrid span::after,' +
        'body .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .tzShop-item_button a span::after,'+
        'body .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a span::after,' +
        'body .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a span::after' +
        '{border-top-color: '+ data_color +' !important;}'+
        'body .autoshowroom-title h2.AutoshowroomTitle::before,' +
        '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info h3.tzShop-item_title a,' +
        '.woocommerce div.woocommerce-message, body.woocommerce-checkout .woocommerce .woocommerce-info,' +
        'body .container-content .vehicle-layout-list .vehicle-grid .TZ-Vehicle-Grid .vehicle-btn a, ' +
        'body .container-content .vehicle-layout-list .vehicle-grid .TZ-Vehicle-Grid .vehicle-btn span,' +
        '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a,' +
        '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .tzShop-item_button a,' +
        '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a'+
        '{border-color:'+ data_color +' !important;}'+
        'body .autoshowroom-sidebar aside.widget.widget_categories ul li a::before,'+
        'body .su-list::before,'+
        'body .autoshowroom-footer .autoshowroom-footer-top .footerattr .widget.dw_twitter .dw-twitter-inner .tweet-item::after,' +
        'body.woocommerce-checkout .woocommerce .woocommerce-info::before,' +
        '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a,' +
        '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .tzShop-item_button a,' +
        '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a,' +
        '.pcd-specs .product_meta a, .pcd-specs  .product_share a' +
        '{color:'+ data_color +' !important;}'+
        'body .autoshowroom-title-breadcrumb .autoshowroom-page-title .autoshowroom-page-title-overlay .autoshowroom-page-title-content h1::before,'+
        'body .autoshowroom-title-breadcrumb .autoshowroom-page-title .autoshowroom-page-title-overlay .autoshowroom-page-title-content h1::after,'+
        'body .autoshowroom-sidebar aside.widget h3.widget-title::before,'+
        'body .autoshowroom-sidebar aside.widget h3.widget-title span::before,'+
        'body .autoshowroom-sidebar aside.widget h3.widget-title span::after,'+
        'body .autoshowroom-agency .autoshowroom-agency-item .autoshowroom-agency-content h3.autoshowroom-agency-title a::before,'+
        'body .autoshowroom-agency .autoshowroom-agency-item .autoshowroom-agency-content h3.autoshowroom-agency-title a::after,'+
        'body .vehicle-detail .vehicle-box h3.widget-title::before,'+
        'body .vehicle-detail .vehicle-box h3.widget-title span::before,'+
        'body .vehicle-detail .vehicle-box h3.widget-title span::after,'+
        'body .autoshowroom-agency-single article .autoshowroom-agency-content .autoshowroom-agency-content-right h3.autoshowroom-agency-single-title::after,'+
        'body .autoshowroom-blog .autoshowroom-blog-body .autoshowroom-blog-item .autoshowroom-blog-item-wrap .autoshowroom-blog-item-content h3.autoshowroom-blog-item-title::after,'+
        'body .container-content .vehicle-results .vehicle-layouts a .tooltip-content::after,'+
        'body .autoshowroom-footer .autoshowroom-footer-top .footerattr .widget.widget_newsletterwidget .newsletter form::after,'+
        'body .autoshowroom-post-slider .autoshowroom-post-slider-box .autoshowroom-post-slider-item .autoshowroom-post-back .autoshowroom-post-front .autoshowroom-post-front-box h3.autoshowroom-post-front-title::after,'+
        'body .autoshowroom-post-slider .owl-controls .owl-nav .owl-next:hover::after,'+
        'body .autoshowroom-post-slider .owl-controls .owl-nav .owl-prev:hover::after,' +
        '.vc_custom_1454322531567 .autoshowroom-ads-bg, .vc_custom_1455675412520 .autoshowroom-ads-bg,' +
        'body .TZ-Vehicle-Slider .owl-item .item .vehicle-slider-des .slider-info,' +
        '.autoshowroom-agency-single article .autoshowroom-agency-content .autoshowroom-agency-content-right .wpcf7-form p.btn.btn-color .wpcf7-submit,' +
        '.vehicle-search-form .car-search-submit, .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .tzShop-item_button a span,' +
        'body .container-content .vehicle-layout-list .vehicle-grid .TZ-Vehicle-Grid .vehicle-btn a.active,body  .container-content .vehicle-layout-list .vehicle-grid .TZ-Vehicle-Grid .vehicle-btn span.active,' +
        '.tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a span,' +
        'body .tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover'+

        '{background-color:'+ data_color +' !important;}' +

        '.vc_custom_1454322531567 .autoshowroom-ads-bg,'+
        '.vc_custom_1455675412520 .autoshowroom-ads-bg'+
        '{opacity:0.8;}' +
        'body .quicksearch_top_right,'+
        'body .quicksearch_top_left,'+
        'body .quicksearch_bottom_left,'+
        'body .quicksearch_bottom_right,'+
        'body .quicksearch_top_center,'+
        'body .quicksearch_bottom_center,'+
        'body header nav ul.navbar-nav li > ul.sub-menu,'+
        'body .TZ-Vehicle-Feature .item .Vehicle-Title a, body .TZ-Vehicle-Grid .item .Vehicle-Title a,'+
        'body .rev_slider_wrapper .Auto-Slider-Title, body header,'+
        'body .autoshowroom-blog .autoshowroom-blog-body .autoshowroom-blog-item .autoshowroom-blog-item-wrap,'+
        'body .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info h3.tzShop-item_title a,'+
        'body .vehicle-detail h1.vehicle-title,'+
        'body .vehicle-detail .vehicle-btn-function span,'+
        'body.woocommerce .product-detail .product-content .woocommerce-tabs ul.tabs li:hover a,'+
        'body.woocommerce .product-detail .product-content .woocommerce-tabs ul.tabs li:focus a,'+
        'body.woocommerce .product-detail .product-content .woocommerce-tabs ul.tabs li.active a,' +
        'body .rev_slider_wrapper .Slide02-Title, .TZ-Vehicle-Slider .owl-item .item .Vehicle-Title.container,' +
        'body .products_compare .compare-count' +
        '{border-color: '+ data_color +' !important;}' +
        'body .autoshowroom-our-process span.autoshowroom-number-process,'+
        'body .autoshowroom-our-process a.autoshowroom_readmore,'+
        'body .tzfilter a.selected, html body a:hover, body .autoshowroom-quote .slick-track .autoshowroom-quote-item .autoshowroom-quote-info .autoshowroom-quote-content small,'+
        'body .autoshowroom-quote .slick-track .autoshowroom-quote-item .autoshowroom-quote-info .autoshowroom-quote-name,'+
        'body .TZ-Vehicle-Search-Vertical h3,'+
        'body header i,body .autoshowroom-list ul li i,'+
        'body .autoshowroom-title.autoshowroom-title-left h2.AutoshowroomTitle em,'+
        'body .autoshowroom-post-slider .autoshowroom-post-slider-box .autoshowroom-post-slider-item .autoshowroom-post-image .autoshowroom-post-date i,'+
        'body header nav ul.navbar-nav li a:hover, body header nav ul.navbar-nav li.current_page_item > a,'+
        'body .autoshowroom-blog .autoshowroom-blog-body .autoshowroom-blog-item .autoshowroom-blog-item-wrap .autoshowroom-blog-item-content .autoshowroom-blog-item-Info span a:hover,'+
        'body .autoshowroom-post-slider .autoshowroom-post-slider-box .autoshowroom-post-slider-item .autoshowroom-post-back .autoshowroom-post-front .autoshowroom-post-front-box .autoshowroom-post-front-info .autoshowroom-post-front-info-author a,'+
        'body .autoshowroom-blog .autoshowroom-blog-body .autoshowroom-blog-item .autoshowroom-blog-item-wrap .autoshowroom-blog-item-content .autoshowroom-blog-item-share:hover .autoshowroom-blog-share-icon a:hover,'+
        'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToGrid.active i,'+
        'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToGrid:hover i,'+
        'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToList:hover i,'+
        'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToList.active i,'+
        'body.woocommerce .widget_price_filter .price_slider_amount .button,'+
        'body .autoshowroom-sidebar aside.woocommerce.widget ul li:hover a,'+
        'body .autoshowroom-sidebar aside.woocommerce.widget ul li ins span,'+
        'body .autoshowroom-sidebar aside.widget h3.black i, .tp-caption.Auto-Slider-Small-Title[data-x="414"],'+
        'body .container-content .vehicle-results .vehicle-layouts a.active,'+
        'body .container-content .vehicle-results .vehicle-layouts a:hover,'+
        'body .vehicle-detail .vehicle-btn-function span, body .tz-top-header-right a,'+
        'body .payment-calculator label span, body .autoshowroom-post-front .autoshowroom-post-front-box .autoshowroom-readmore,'+
        'body.woocommerce .product-detail .related ul.products li.related-product-item span.price del span,'+
        'body.woocommerce .product-detail .related ul.products li.related-product-item span.price ins span,' +
        'body .rev_slider_wrapper .Slide02-Title, .TZ-Vehicle-Slider .owl-item .item .Vehicle-Title.container span span,' +
        '.autoshowroom-title-breadcrumb .autoshowroom-breadcrumb .autoshowroom-breadcrumb-navxt span a:hover, .autoshowroom-text-box i,' +
        '.autoshowroom-text-box a, .vehicle_listing .pcd-pricing .pcd-price,' +
        '.woocommerce .product-list .tzShop-item .tzShop-item-bottom-info .price del span, .woocommerce .product-list .tzShop-item .tzShop-item-bottom-info .price ins span,' +
        '.autoshowroom-sidebar aside.woocommerce.widget ul li del span, .woocommerce div.woocommerce-message::before,' +
        'body .woocommerce form table.shop_table tbody tr.cart_item td.product-subtotal span.amount,'+
        'body .woocommerce .cart-collaterals .tzCart_totals .tzCollateralsColumn .cart_totals table tbody tr.order-total td span,' +
        'body .container-content .vehicle-layout-list .vehicle-grid .TZ-Vehicle-Grid .vehicle-btn a,body .container-content .vehicle-layout-list .vehicle-grid .TZ-Vehicle-Grid .vehicle-btn span,' +
        'body .products_compare .compare-count'+
        '{color:'+ data_color +' !important;}'+
        'body .autoshowroom-service .autoshowroom-service-icon,'+
        'body .autoshowroom-sign-up .autoshowroom-sign-up-box,'+
        'body .autoshowroom-sign-up .autoshowroom-sign-up-box .autoshowroom-sign-up-triangle,'+
        'body .autoshowroom-sign-up .esu-from-shortcode form ul li input.esu-button,'+
        'body .autoshowroom-quote .slick-dots li button,'+
        'body .autoshowroom-post-slider .autoshowroom-post-slider-box .autoshowroom-post-slider-item .autoshowroom-post-image .autoshowroom-post-date,'+
        'body .autoshowroom-footer .autoshowroom-footer-bottom .autoshowroom-footer-bottom-center .autoshowrooom-footer-bottom-center-box,'+
        'body .autoshowroom-post-slider .owl-controls .owl-dots .owl-dot span,'+
        'body .autoshowroom-quote .slick-track .autoshowroom-quote-item.slick-center .autoshowroom-quote-image,'+
        'body .autoshowroom-quote .slick-track .autoshowroom-quote-item .autoshowroom-quote-image:hover,'+
        'body .TZ-Vehicle-Feature .item .Vehicle-Feature-Image .pcd-pricing, .TZ-Vehicle-Grid .item .Vehicle-Feature-Image .pcd-pricing,'+
        'body .autoshowroom-blog .autoshowroom-blog-body .autoshowroom-blog-item .autoshowroom-blog-item-wrap .autoshowroom-blog-item-icon,'+
        'body .autoshowroom-blog .autoshowroom-blog-body .autoshowroom-blog-pagenavi .autoshowroom-blog-back,'+
        'body .autoshowroom-contact .autoshowroom-contact-overlay .autoshowroom-contact-content a.autoshowroom-contact-button,'+
        'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToList span,'+
        'body .tzShop-item .tzShop-item-bottom-info,'+
        'body .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .tzShop-item_button,'+
        'body .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist,'+
        'body.woocommerce .widget_price_filter .ui-slider .ui-slider-range, body.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,'+
        'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToGrid span,'+
        'body .autoshowroom-agency .autoshowroom-agency-item .autoshowroom-agency-content a.autoshowroom-agency-more:hover,'+
        'html body button:hover,'+
        'body .container-content .vehicle-results .vehicle-layouts a .tooltip-content,'+
        'body .container-content .vehicle-grid .TZ-Vehicle-Grid .pcd-pricing,'+
        'body .vehicle-detail .pcd-pricing,'+
        'body.woocommerce .product-detail .price,'+
        'body.woocommerce .product-detail .cart .single_add_to_cart_button,'+
        'body.woocommerce .product-detail .yith-wcwl-add-to-wishlist .add_to_wishlist, body .vc_btn3.vc_btn3-color-warning,' +
        '.vc_custom_1453454838985 .autoshowroom-ads-bg, body .tp-caption.rev-btn,' +
        '.autoshowroom-text-box h3.AutoshowroomTitle::before,' +
        '.autoshowroom-text-box h3.AutoshowroomTitle span::before,'+
        '.autoshowroom-text-box h3.AutoshowroomTitle span::after, body .wp-pagenavi span.current, body .wp-pagenavi a:hover,' +
        '.tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a span,'+
        'body .tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover,' +
        'body .tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .tzShop-item_button a:hover,' +
        'body .woocommerce div.woocommerce-message a.button, body .woocommerce form table.shop_table tbody tr td.actions .coupon input.button,' +
        'body .woocommerce form table.shop_table tbody tr td.actions input.button,' +
        'body .woocommerce .cart-collaterals .tzCart_totals .tzCollateralsColumn .cart_totals .wc-proceed-to-checkout a,' +
        'body.woocommerce-checkout .woocommerce form.checkout #order_review .woocommerce-checkout-payment .place-order input#place_order,' +
        'body .products_compare, body .auto-get-a-quote' +
        '{background-color:'+ data_color +' !important;}'+
        '</style>' +
        '');
}
jQuery('.color').on('click',function(){
    jQuery(this).parent().find('.color').removeClass('active');
    jQuery(this).addClass('active');
    var data_color = jQuery(this).attr('data-color');
    createCookie('color_example',data_color);
    change_color_example(data_color);
});

jQuery('head').append('<style type="text/css" class="config_color"></style>');
if(readCookie('general_color')){
    $general_color = readCookie('general_color');
    jQuery('.general_color div').css('background-color','#'+$general_color);
    jQuery('.config_color').append('body .autoshowroom-quote .slick-track .autoshowroom-quote-item .autoshowroom-quote-image::after,'+
    'body .autoshowroom-service .autoshowroom-service-icon::after,'+
    'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToList span::after,'+
    'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToGrid span::after,'+
    'body .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .tzShop-item_button a span::after,'+
    'body .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a span::after' +
    '{border-top-color: #'+ $general_color +' !important;}'+

    'body .autoshowroom-title h2.AutoshowroomTitle::before'+
    '{border-color:#'+ $general_color +' !important;}'+
    'body .autoshowroom-sidebar aside.widget.widget_categories ul li a::before,'+
    'body .su-list::before,'+
    'body .autoshowroom-footer .autoshowroom-footer-top .footerattr .widget.dw_twitter .dw-twitter-inner .tweet-item::after'+
    '{color:#'+ $general_color +' !important;}'+
    'body .autoshowroom-title-breadcrumb .autoshowroom-page-title .autoshowroom-page-title-overlay .autoshowroom-page-title-content h1::before,'+
    'body .autoshowroom-title-breadcrumb .autoshowroom-page-title .autoshowroom-page-title-overlay .autoshowroom-page-title-content h1::after,'+
    'body .autoshowroom-sidebar aside.widget h3.widget-title::before,'+
    'body .autoshowroom-sidebar aside.widget h3.widget-title span::before,'+
    'body .autoshowroom-sidebar aside.widget h3.widget-title span::after,'+
    'body .autoshowroom-agency .autoshowroom-agency-item .autoshowroom-agency-content h3.autoshowroom-agency-title a::before,'+
    'body .autoshowroom-agency .autoshowroom-agency-item .autoshowroom-agency-content h3.autoshowroom-agency-title a::after,'+
    'body .vehicle-detail .vehicle-box h3.widget-title::before,'+
    'body .vehicle-detail .vehicle-box h3.widget-title span::before,'+
    'body .vehicle-detail .vehicle-box h3.widget-title span::after,'+
    'body .autoshowroom-agency-single article .autoshowroom-agency-content .autoshowroom-agency-content-right h3.autoshowroom-agency-single-title::after,'+
    'body .autoshowroom-blog .autoshowroom-blog-body .autoshowroom-blog-item .autoshowroom-blog-item-wrap .autoshowroom-blog-item-content h3.autoshowroom-blog-item-title::after,'+
    'body .container-content .vehicle-results .vehicle-layouts a .tooltip-content::after,'+
    'body .autoshowroom-footer .autoshowroom-footer-top .footerattr .widget.widget_newsletterwidget .newsletter form::after,'+
    'body .autoshowroom-post-slider .autoshowroom-post-slider-box .autoshowroom-post-slider-item .autoshowroom-post-back .autoshowroom-post-front .autoshowroom-post-front-box h3.autoshowroom-post-front-title::after,'+
    'body .autoshowroom-post-slider .owl-controls .owl-nav .owl-next:hover::after,'+
    'body .autoshowroom-post-slider .owl-controls .owl-nav .owl-prev:hover::after,' +
    '.vc_custom_1454322531567 .autoshowroom-ads-bg, .vc_custom_1455675412520 .autoshowroom-ads-bg, .vc_custom_1453454838985 .autoshowroom-ads-bg,' +
    'body .TZ-Vehicle-Slider .owl-item .item .vehicle-slider-des .slider-info,' +
    '.autoshowroom-agency-single article .autoshowroom-agency-content .autoshowroom-agency-content-right .wpcf7-form p.btn.btn-color .wpcf7-submit,' +
    '.vehicle-search-form .car-search-submit,' +
    'body .vehicle-detail .vehicle-content h3::before,' +
    'body .vehicle-detail .vehicle-content h3::after,' +
    '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover,' +
    '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .tzShop-item_button a:hover,' +
    '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover,' +
    'body .vehicle-detail .vehicle-btn-function span.active' +

    '{background-color:#'+ $general_color +' !important;}' +

    '.vc_custom_1453454838985 .autoshowroom-ads-bg,'+
    '.vc_custom_1454322531567 .autoshowroom-ads-bg,'+
    '.vc_custom_1455675412520 .autoshowroom-ads-bg'+
    '{opacity:0.8;}' +
    'body .quicksearch_top_right,'+
    'body .quicksearch_top_left,'+
    'body .quicksearch_bottom_left,'+
    'body .quicksearch_bottom_right,'+
    'body .quicksearch_top_center,'+
    'body .quicksearch_bottom_center,'+
    'body header nav ul.navbar-nav li > ul.sub-menu,'+
    'body .TZ-Vehicle-Feature .item .Vehicle-Title a, body .TZ-Vehicle-Grid .item .Vehicle-Title a,'+
    'body .rev_slider_wrapper .Auto-Slider-Title, body header,'+
    'body .autoshowroom-blog .autoshowroom-blog-body .autoshowroom-blog-item .autoshowroom-blog-item-wrap,'+
    'body .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info h3.tzShop-item_title a,'+
    'body .vehicle-detail h1.vehicle-title,'+
    'body .vehicle-detail .vehicle-btn-function span,'+
    'body.woocommerce .product-detail .product-content .woocommerce-tabs ul.tabs li:hover a,'+
    'body.woocommerce .product-detail .product-content .woocommerce-tabs ul.tabs li:focus a,'+
    'body.woocommerce .product-detail .product-content .woocommerce-tabs ul.tabs li.active a,' +
    'body .rev_slider_wrapper .Slide02-Title, .TZ-Vehicle-Slider .owl-item .item .Vehicle-Title.container,' +
    'body .container-content .vehicle-layout-list .vehicle-grid .TZ-Vehicle-Grid .vehicle-btn a,' +
    'body .container-content .vehicle-layout-list .vehicle-grid .TZ-Vehicle-Grid .vehicle-btn span,' +
    '.products_compare .compare-count, body .TZ-Vehicle-Compare .item h3,' +
    'body .vehicle-detail .su-tabs .su-tabs-nav span.su-tabs-current,' +
    'body .vehicle-detail .su-tabs .su-tabs-nav span:hover,' +
    '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info h3.tzShop-item_title a,' +
    '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a,' +
    '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .tzShop-item_button a,' +
    '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .tzShop-item_button a,' +
    '.woocommerce div.woocommerce-message, body.woocommerce-checkout .woocommerce .woocommerce-info' +

    '{border-color: #'+ $general_color +' !important;}' +

    'body .autoshowroom-our-process span.autoshowroom-number-process,'+
    'body .autoshowroom-our-process a.autoshowroom_readmore,'+
    'body .tzfilter a.selected, html body a:hover, body .autoshowroom-quote .slick-track .autoshowroom-quote-item .autoshowroom-quote-info .autoshowroom-quote-content small,'+
    'body .autoshowroom-quote .slick-track .autoshowroom-quote-item .autoshowroom-quote-info .autoshowroom-quote-name,'+
    'body .TZ-Vehicle-Search-Vertical h3,'+
    'body header i,body .autoshowroom-list ul li i,'+
    'body .autoshowroom-title.autoshowroom-title-left h2.AutoshowroomTitle em,'+
    'body .autoshowroom-post-slider .autoshowroom-post-slider-box .autoshowroom-post-slider-item .autoshowroom-post-image .autoshowroom-post-date i,'+
    'body header nav ul.navbar-nav li a:hover, body header nav ul.navbar-nav li.current_page_item > a,'+
    'body .autoshowroom-blog .autoshowroom-blog-body .autoshowroom-blog-item .autoshowroom-blog-item-wrap .autoshowroom-blog-item-content .autoshowroom-blog-item-Info span a:hover,'+
    'body .autoshowroom-post-slider .autoshowroom-post-slider-box .autoshowroom-post-slider-item .autoshowroom-post-back .autoshowroom-post-front .autoshowroom-post-front-box .autoshowroom-post-front-info .autoshowroom-post-front-info-author a,'+
    'body .autoshowroom-blog .autoshowroom-blog-body .autoshowroom-blog-item .autoshowroom-blog-item-wrap .autoshowroom-blog-item-content .autoshowroom-blog-item-share:hover .autoshowroom-blog-share-icon a:hover,'+
    'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToGrid.active i,'+
    'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToList:hover i,'+
    'body.woocommerce .widget_price_filter .price_slider_amount .button,'+
    'body .autoshowroom-sidebar aside.woocommerce.widget ul li:hover a,'+
    'body .autoshowroom-sidebar aside.woocommerce.widget ul li ins span, body .autoshowroom-post-front .autoshowroom-post-front-box .autoshowroom-readmore,'+
    'body .autoshowroom-sidebar aside.widget h3.black i, .tp-caption.Auto-Slider-Small-Title[data-x="414"],'+
    'body .container-content .vehicle-results .vehicle-layouts a.active,'+
    'body .container-content .vehicle-results .vehicle-layouts a:hover,'+
    'body .vehicle-detail .vehicle-btn-function span, body .tz-top-header-right a,'+
    'body .payment-calculator label span,'+
    'body.woocommerce .product-detail .related ul.products li.related-product-item span.price del span,'+
    'body.woocommerce .product-detail .related ul.products li.related-product-item span.price ins span,' +
    'body .rev_slider_wrapper .Slide02-Title, .TZ-Vehicle-Slider .owl-item .item .Vehicle-Title.container span span,' +
    '.autoshowroom-title-breadcrumb .autoshowroom-breadcrumb .autoshowroom-breadcrumb-navxt span a:hover, .autoshowroom-text-box i,' +
    '.autoshowroom-text-box a, .vehicle_listing .pcd-pricing .pcd-price,'+
    '.container-content .vehicle-layout-list .vehicle-grid .TZ-Vehicle-Grid .vehicle-btn a,' +
    '.container-content .vehicle-layout-list .vehicle-grid .TZ-Vehicle-Grid .vehicle-btn span,' +
    'body .products_compare .compare-count, .container-content .vehicle-results.vehicle-compare-results span.results-text span,' +
    'body .TZ-Vehicle-Compare .owl-controls .owl-nav .owl-next:hover,'+
    'body .TZ-Vehicle-Compare .owl-controls .owl-nav .owl-prev:hover,' +
    '.vehicle-box .pcd-specs a, .tzshop-wrap .grid_pagination_block .tzview-style .switchToList.active i,' +
    '.tzshop-wrap .grid_pagination_block .tzview-style .switchToGrid:hover i,' +
    '.woocommerce .product-list .tzShop-item .tzShop-item-bottom-info .price del span, .woocommerce .product-list .tzShop-item .tzShop-item-bottom-info .price ins span,' +
    '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a,' +
    '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .tzShop-item_button a,' +
    '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .tzShop-item_button a,' +
    '.autoshowroom-sidebar aside.woocommerce.widget ul li a:hover, .woocommerce div.woocommerce-message::before,' +
    'body .woocommerce form table.shop_table tbody tr.cart_item td.product-subtotal span.amount,'+
    'body .woocommerce .cart-collaterals .tzCart_totals .tzCollateralsColumn .cart_totals table tbody tr.order-total td span,' +
    'body.woocommerce-checkout .woocommerce .woocommerce-info::before' +

    '{color:#'+ $general_color +' !important;}'+

    'body .autoshowroom-service .autoshowroom-service-icon,'+
    'body .autoshowroom-sign-up .autoshowroom-sign-up-box,'+
    'body .autoshowroom-sign-up .autoshowroom-sign-up-box .autoshowroom-sign-up-triangle,'+
    'body .autoshowroom-sign-up .esu-from-shortcode form ul li input.esu-button,'+
    'body .autoshowroom-quote .slick-dots li button,'+
    'body .autoshowroom-post-slider .autoshowroom-post-slider-box .autoshowroom-post-slider-item .autoshowroom-post-image .autoshowroom-post-date,'+
    'body .autoshowroom-footer .autoshowroom-footer-bottom .autoshowroom-footer-bottom-center .autoshowrooom-footer-bottom-center-box,'+
    'body .autoshowroom-post-slider .owl-controls .owl-dots .owl-dot span,'+
    'body .autoshowroom-quote .slick-track .autoshowroom-quote-item.slick-center .autoshowroom-quote-image,'+
    'body .autoshowroom-quote .slick-track .autoshowroom-quote-item .autoshowroom-quote-image:hover,'+
    'body .TZ-Vehicle-Feature .item .Vehicle-Feature-Image .pcd-pricing, .TZ-Vehicle-Grid .item .Vehicle-Feature-Image .pcd-pricing,'+
    'body .autoshowroom-blog .autoshowroom-blog-body .autoshowroom-blog-item .autoshowroom-blog-item-wrap .autoshowroom-blog-item-icon,'+
    'body .autoshowroom-blog .autoshowroom-blog-body .autoshowroom-blog-pagenavi .autoshowroom-blog-back,'+
    'body .autoshowroom-contact .autoshowroom-contact-overlay .autoshowroom-contact-content a.autoshowroom-contact-button,'+
    'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToList span,'+
    'body .tzShop-item .tzShop-item-bottom-info,'+
    'body .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .tzShop-item_button,'+
    'body .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist,'+
    'body.woocommerce .widget_price_filter .ui-slider .ui-slider-range, body.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,'+
    'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToGrid span,'+
    'body .autoshowroom-agency .autoshowroom-agency-item .autoshowroom-agency-content a.autoshowroom-agency-more:hover,'+
    'html body button:hover,'+
    'body .container-content .vehicle-results .vehicle-layouts a .tooltip-content,'+
    'body .container-content .vehicle-grid .TZ-Vehicle-Grid .pcd-pricing,'+
    'body .vehicle-detail .pcd-pricing,'+
    'body.woocommerce .product-detail .price,'+
    'body.woocommerce .product-detail .cart .single_add_to_cart_button,'+
    'body.woocommerce .product-detail .yith-wcwl-add-to-wishlist .add_to_wishlist, body .vc_btn3.vc_btn3-color-warning,' +
    '.vc_custom_1453454838985 .autoshowroom-ads-bg, body .tp-caption.rev-btn,' +
    '.autoshowroom-text-box h3.AutoshowroomTitle::before,' +
    '.autoshowroom-text-box h3.AutoshowroomTitle span::before,'+
    '.autoshowroom-text-box h3.AutoshowroomTitle span::after, body .wp-pagenavi span.current, body .wp-pagenavi a:hover,' +
    '.container-content .vehicle-layout-list .vehicle-grid .TZ-Vehicle-Grid .vehicle-btn a.active,'+
    '.container-content .vehicle-layout-list .vehicle-grid .TZ-Vehicle-Grid .vehicle-btn span.active,' +
    'body .products_compare,' +
    'body .container-content .vehicle-results.vehicle-compare-results .vehicle-layouts a,' +
    'body .TZ-Vehicle-Compare .item .Vehicle-Feature-Image .btn-remove-compare,' +
    'body .TZ-Vehicle-Compare .item p.pcd-pricing, body .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .tzShop-item_button a span,' +
    '.tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a span,' +
    'body .woocommerce div.woocommerce-message a.button, body .woocommerce form table.shop_table tbody tr td.actions .coupon input.button,' +
    'body .woocommerce form table.shop_table tbody tr td.actions input.button,' +
    'body .woocommerce .cart-collaterals .tzCart_totals .tzCollateralsColumn .cart_totals .wc-proceed-to-checkout a,' +
    'body.woocommerce-checkout .woocommerce form.checkout #order_review .woocommerce-checkout-payment .place-order input#place_order,' +
    'body .vehicle-detail .vehicle-btn-function span.active'+

    '{background-color:#'+ $general_color +' !important;}'+
        '');
}
if(readCookie('color_menu')){
    $parents_color = readCookie('color_menu');
    jQuery('.menu_color div').css('background-color','#'+$parents_color);

    jQuery('.config_color').append('' +
        'body header nav ul.navbar-nav li > a,' +
        '.mega-menu-horizontal > li >a'+
        '{color:#'+ $parents_color +' !important;}'+
        '')
}

if(readCookie('color_submenu')){
    $sub_color = readCookie('color_submenu');
    jQuery('.submenu_color div').css('background-color','#'+$sub_color);
    jQuery('.config_color').append('' +
        'body header nav ul.navbar-nav li ul li a,' +
        '.mega-menu-horizontal > li ul.mega-sub-menu li a'+
        '{color:#'+ $sub_color +' !important;}'+
        '')
}

if(readCookie('border_submenu')){
    $border_color = readCookie('border_submenu');
    jQuery('.border_submenu div').css('background-color','#'+$border_color);

    jQuery('.config_color').append('' +
        'ul.mega-sub-menu,' +
        'body div header nav ul.navbar-nav li > ul.sub-menu'+
        '{border-color:#'+ $border_color +' !important;}'+
        '')
}

if(readCookie('menu_hover')){
    $hover_color = readCookie('menu_hover');
    jQuery('.menu_hover div').css('background-color','#'+$hover_color);
    jQuery('.config_color').append('' +
        'body header nav ul.navbar-nav li > a:hover,'+
        '.mega-menu-horizontal > li >a:hover'+
        '{color:#'+ $hover_color +' !important;}'+
        '')
}

if(readCookie('submenu_hover')){
    $hoversub_color = readCookie('submenu_hover');
    jQuery('.submenu_hover div').css('background-color','#'+$hoversub_color);

    jQuery('.config_color').append('' +
        'body header nav ul.navbar-nav li ul li a:hover,'+
        '.mega-menu-horizontal li ul.mega-sub-menu li a:hover'+
        '{color:#'+ $hoversub_color +' !important;}'+
        '')
}

jQuery('a.reset').on('click',function(){
    eraseCookie('general_color');
    eraseCookie('color_menu');
    eraseCookie('color_submenu');
    eraseCookie('border_submenu');
    eraseCookie('menu_hover');
    eraseCookie('submenu_hover');
    location.reload();
})

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