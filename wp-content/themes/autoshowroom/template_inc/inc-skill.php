<div class="livedemo">
    <span class="live_icon">
        <i class="fa fa-cog"></i>
    </span>

    <div class="live-content">
        <h4>Header Styles</h4>
        <div class="content">
            <a data-option-value="boxed" href="http://wordpress.templaza.net/autoshowroom/" class="layout_boxed cog-button">Header 1</a>
            <a data-option-value="boxed" href="http://wordpress.templaza.net/autoshowroom/home-version-2/" class="layout_boxed cog-button">Header 2</a>
            <a data-option-value="boxed" href="http://wordpress.templaza.net/autoshowroom/home-version-3/" class="layout_boxed cog-button">Header 3</a>
            <div class="clr"></div>
        </div>
        <span class="space">&nbsp;</span>
        <h4>Colors Style</h4>
        <div class="content">
            <span class="color color_blue" data-color="#199cdb">&nbsp;</span>
            <span class="color color_red" data-color="#DF4A43">&nbsp;</span>
            <span class="color color_pink" data-color="#fa0dbb">&nbsp;</span>
            <span class="color color_orange" data-color="#FF5500">&nbsp;</span>
            <span class="color color_red2" data-color="#ff002b">&nbsp;</span>
            <span class="color color_blue2" data-color="#0055ff">&nbsp;</span>
            <span class="color color_pink2" data-color="#c266ff">&nbsp;</span>
            <span class="color color_yellow" data-color="#ffcc00">&nbsp;</span>
            <div class="clr"></div>
        </div>

        <span class="space">&nbsp;</span>
        <h4>Custom Color</h4>

        <div class="menu_color_item">
            <span>Default Color</span>
            <div id="colorSelector" class="colorSelector general_color"><div style="background-color: #FF5400"></div></div>
            <div class="clr"></div>
        </div>
        <span class="space">&nbsp;</span>
        <h4>Menu Color</h4>
        <div class="menu_color_item">
            <span>Menu parent</span>
            <div id="color_menu_parent" class="colorSelector menu_color"><div style="background-color: #222222"></div></div>
        </div>
        <div class="menu_color_item">
            <span>Menu Hover</span>
            <div id="color_menu_hover" class="colorSelector menu_hover"><div style="background-color: #ff5400"></div></div>
        </div>
        <div class="menu_color_item">
            <span>Sub-menu color</span>
            <div id="color_sub_menu" class="colorSelector submenu_color"><div style="background-color: #222222"></div></div>
        </div>
        <div class="menu_color_item">
            <span>Sub-menu Hover</span>
            <div id="color_sub_menu_hover" class="colorSelector submenu_hover"><div style="background-color: #ff5400"></div></div>
        </div>
        <div class="menu_color_item">
            <span>Sub-menu Border</span>
            <div id="color_sub_menu_border" class="colorSelector border_submenu"><div style="background-color: #ff5400"></div></div>
        </div>
        <div class="clr"></div>
        <div class="btn_reset">
            <a class="reset" href="javascript: ">Reset</a>
        </div>

        <p class="live_copy">Copyright © 2015. <a target="_blank" href="<?php echo esc_url('http://www.templaza.com'); ?>"> TemPlaza</a>. All Rights Reserved.</p>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#colorSelector').ColorPicker({
            color: '#FF5400',
            onShow: function (colpkr) {
                jQuery(colpkr).fadeIn(500);
                return false;
            },
            onHide: function (colpkr) {
                jQuery(colpkr).fadeOut(500);
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                jQuery('#colorSelector div').css('backgroundColor', '#' + hex);
                jQuery('.addcss').remove();
                jQuery('.addcss_example').remove();
                jQuery('.config_color').remove();
                var $general_color = hex;
                createCookie('general_color',$general_color);

                jQuery('head').append('' +
                    '<style type="text/css" class="addcss">' +
                    'body .autoshowroom-quote .slick-track .autoshowroom-quote-item .autoshowroom-quote-image::after,'+
                    'body .autoshowroom-service .autoshowroom-service-icon::after,'+
                    'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToList span::after,'+
                    'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToGrid span::after,' +
                    'body .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .tzShop-item_button a span::after,'+
                    'body .tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a span::after'+
                        '{border-top-color:#' + hex+'}'+

                    'body .autoshowroom-title h2.AutoshowroomTitle::before,' +
                    'body .vehicle-detail .su-tabs .su-tabs-nav span.su-tabs-current,' +
                    'body .vehicle-detail .su-tabs .su-tabs-nav span:hover,'+
                    'body.woocommerce .product-detail .product-content .woocommerce-tabs ul.tabs li:hover a,'+
                    'body.woocommerce .product-detail .product-content .woocommerce-tabs ul.tabs li:focus a,'+
                    'body.woocommerce .product-detail .product-content .woocommerce-tabs ul.tabs li.active a' +

                        '{border-color:#' + hex+'}'+

                    'body .vc_btn3.vc_btn3-color-warning, .vc_custom_1453454838985 .autoshowroom-ads-bg,' +
                    'body .tp-caption.rev-btn, .vc_custom_1455675412520 .autoshowroom-ads-bg'+
                        '{background-color:#' + hex+' !important;}'+
                    'body .autoshowroom-sidebar aside.widget.widget_categories ul li a::before,'+
                    'body .su-list::before,'+
                    'body .autoshowroom-footer .autoshowroom-footer-top .footerattr .widget.dw_twitter .dw-twitter-inner .tweet-item::after,' +
                    'body .tzfilter a:hover,  .autoshowroom-title-breadcrumb .autoshowroom-breadcrumb .autoshowroom-breadcrumb-navxt span a:hover,' +
                    'body .container-content .vehicle-results .vehicle-layouts a:hover,' +
                    'body .TZ-Vehicle-Compare .owl-controls .owl-nav .owl-next:hover,'+
                    'body .TZ-Vehicle-Compare .owl-controls .owl-nav .owl-prev:hover,' +
                    'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToGrid.active i,'+
                    'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToGrid:hover i,'+
                    'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToList:hover i,'+
                    'body .tzshop-wrap .grid_pagination_block .tzview-style .switchToList.active i,'+
                    'body .autoshowroom-blog .autoshowroom-blog-body .autoshowroom-blog-item .autoshowroom-blog-item-wrap .autoshowroom-blog-item-content .autoshowroom-blog-item-share:hover .autoshowroom-blog-share-icon a:hover,' +
                    'body .autoshowroom-sidebar aside.woocommerce.widget ul li a:hover,body  .woocommerce div.woocommerce-message::before,' +
                    'body.woocommerce-checkout .woocommerce .woocommerce-info::before'+
                        '{color:#' + hex+'}'+

                    '.tp-caption.Auto-Slider-Small-Title[data-x="414"]' +
                        '{color:#' + hex+' !important}'+

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
                    'body .autoshowroom-quote .slick-track .autoshowroom-quote-item .autoshowroom-quote-image:hover,'+
                    'body .autoshowroom-quote .slick-track .autoshowroom-quote-item.slick-current .autoshowroom-quote-image,' +
                    'body .TZ-Vehicle-Search-Horizontal .vehicle-search-form .car-search-submit:hover,' +
                    'body .vehicle-search-form .car-search-submit:hover, body .autoshowroom-text-box h3.AutoshowroomTitle::before,' +
                    'body .autoshowroom-text-box h3.AutoshowroomTitle span::before,'+
                    'body .autoshowroom-text-box h3.AutoshowroomTitle span::after, body .wp-pagenavi span.current, body .wp-pagenavi a:hover,'+
                    'body .container-content .vehicle-layout-list .vehicle-grid .TZ-Vehicle-Grid .vehicle-btn a.active,'+
                    'body .container-content .vehicle-layout-list .vehicle-grid .TZ-Vehicle-Grid .vehicle-btn span.active,' +
                    'body .vehicle-detail .vehicle-content h3::before,' +
                    'body .vehicle-detail .vehicle-content h3::after,' +
                    'body .tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a:hover,' +
                    'body .tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .tzShop-item_button a:hover,' +
                    'body .tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info .tzShop-item_button_list .yith-wcwl-add-to-wishlist .yith-wcwl-add-button a:hover' +

                        '{background-color:#' + hex+'}'+
                    '</style>' +
                    '');
                jQuery('' +
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
                'body .rev_slider_wrapper .Slide02-Title, .TZ-Vehicle-Slider .owl-item .item .Vehicle-Title.container,' +
                'body .container-content .vehicle-layout-list .vehicle-grid .TZ-Vehicle-Grid .vehicle-btn a,' +
                'body .container-content .vehicle-layout-list .vehicle-grid .TZ-Vehicle-Grid .vehicle-btn span,' +
                'body .products_compare .compare-count, .TZ-Vehicle-Compare .item h3,' +
                '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_info h3.tzShop-item_title a,' +
                '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_button_list a,' +
                '.woocommerce div.woocommerce-message, body.woocommerce-checkout .woocommerce .woocommerce-info' +
                    '').css('border-color', '#' + hex);

                jQuery('' +
                'body .autoshowroom-our-process span.autoshowroom-number-process,'+
                'body .autoshowroom-our-process a.autoshowroom_readmore,'+
                'body .tzfilter a.selected, body .autoshowroom-quote .slick-track .autoshowroom-quote-item .autoshowroom-quote-info .autoshowroom-quote-content small,'+
                'body .autoshowroom-quote .slick-track .autoshowroom-quote-item .autoshowroom-quote-info .autoshowroom-quote-name,'+
                'body .TZ-Vehicle-Search-Vertical h3,'+
                'body header i,body .autoshowroom-list ul li i,'+
                'body .autoshowroom-title.autoshowroom-title-left h2.AutoshowroomTitle em,'+
                'body .autoshowroom-post-slider .autoshowroom-post-slider-box .autoshowroom-post-slider-item .autoshowroom-post-image .autoshowroom-post-date i,'+
                'body header nav ul.navbar-nav li a:hover, body header nav ul.navbar-nav li.current_page_item > a,'+
                'body .autoshowroom-blog .autoshowroom-blog-body .autoshowroom-blog-item .autoshowroom-blog-item-wrap .autoshowroom-blog-item-content .autoshowroom-blog-item-Info span a:hover,'+
                'body .autoshowroom-post-slider .autoshowroom-post-slider-box .autoshowroom-post-slider-item .autoshowroom-post-back .autoshowroom-post-front .autoshowroom-post-front-box .autoshowroom-post-front-info .autoshowroom-post-front-info-author a,'+
                'body.woocommerce .widget_price_filter .price_slider_amount .button,'+
                'body .autoshowroom-sidebar aside.woocommerce.widget ul li:hover a,'+
                'body .autoshowroom-sidebar aside.woocommerce.widget ul li ins span,'+
                'body .autoshowroom-sidebar aside.widget h3.black i,'+
                'body .container-content .vehicle-results .vehicle-layouts a.active,'+
                'body .vehicle-detail .vehicle-btn-function span,'+
                'body .payment-calculator label span,'+
                'body.woocommerce .product-detail .related ul.products li.related-product-item span.price del span,'+
                'body.woocommerce .product-detail .related ul.products li.related-product-item span.price ins span,' +
                'body .autoshowroom-post-front .autoshowroom-post-front-box .autoshowroom-readmore,' +
                'body .tz-top-header-right a, .autoshowroom-footer-bottom-left a, .tp-caption.Slide02-Title,' +
                'body .TZ-Vehicle-Slider .owl-item .item .Vehicle-Title.container span span, .autoshowroom-text-box i,' +
                'body .autoshowroom-text-box  a, body .vehicle_listing .pcd-pricing .pcd-price,'+
                'body .container-content .vehicle-layout-list .vehicle-grid .TZ-Vehicle-Grid .vehicle-btn a,' +
                'body .container-content .vehicle-layout-list .vehicle-grid .TZ-Vehicle-Grid .vehicle-btn span,' +
                'body .products_compare .compare-count, .container-content .vehicle-results.vehicle-compare-results span.results-text span,' +
                '.vehicle-box .pcd-specs a, .woocommerce .product-list .tzShop-item .tzShop-item-bottom-info,' +
                '.woocommerce .product-list .tzShop-item .tzShop-item-bottom-info .price del span, .woocommerce .product-list .tzShop-item .tzShop-item-bottom-info .price ins span,' +
                '.tzshop-wrap .product-list ul.products li.tzShop-item .tzShop-item_button_list a,' +
                '.autoshowroom-sidebar aside.woocommerce.widget ul li del span,'+
                'body .woocommerce form table.shop_table tbody tr.cart_item td.product-subtotal span.amount,'+
                'body .woocommerce .cart-collaterals .tzCart_totals .tzCollateralsColumn .cart_totals table tbody tr.order-total td span'+
                '').css('color', '#' + hex);
                jQuery('' +
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
                'html body button:hover, .autoshowroom-agency-single article .autoshowroom-agency-content .autoshowroom-agency-content-right .wpcf7-form p.btn.btn-color .wpcf7-submit,'+
                'body .container-content .vehicle-results .vehicle-layouts a .tooltip-content,'+
                'body .container-content .vehicle-grid .TZ-Vehicle-Grid .pcd-pricing,'+
                'body .vehicle-detail .pcd-pricing,'+
                'body.woocommerce .product-detail .price,'+
                'body.woocommerce .product-detail .cart .single_add_to_cart_button,'+
                'body.woocommerce .product-detail .yith-wcwl-add-to-wishlist .add_to_wishlist, .vc_custom_1454322531567 .autoshowroom-ads-bg,' +
                '.vc_custom_1455675412520 .autoshowroom-ads-bg,.vc_custom_1453454838985 .autoshowroom-ads-bg,' +
                'body .TZ-Vehicle-Slider .owl-item .item .vehicle-slider-des .slider-info,' +
                'body .products_compare, .container-content .vehicle-results.vehicle-compare-results .vehicle-layouts a,' +
                '.TZ-Vehicle-Compare .item .Vehicle-Feature-Image .btn-remove-compare,' +
                '.TZ-Vehicle-Compare .item p.pcd-pricing,' +
                '.tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a span,' +
                '.tzshop-wrap .product-grid ul.products li.tzShop-item .tzShop-item_inner .tzShop-item_image .tzShop-item_button a span,' +
                '.woocommerce div.woocommerce-message a.button, body .woocommerce form table.shop_table tbody tr td.actions .coupon input.button,' +
                'body .woocommerce form table.shop_table tbody tr td.actions input.button,' +
                'body .woocommerce .cart-collaterals .tzCart_totals .tzCollateralsColumn .cart_totals .wc-proceed-to-checkout a,' +
                '.woocommerce-checkout .woocommerce form.checkout #order_review .woocommerce-checkout-payment .place-order input#place_order,' +
                '.vehicle-detail .vehicle-btn-function span.active, div.auto-get-a-quote' +

                '').css('background-color', '#' + hex);

                jQuery('' +
                    '.vc_custom_1453454838985 .autoshowroom-ads-bg,' +
                    '.vc_custom_1454322531567 .autoshowroom-ads-bg,' +
                    '.vc_custom_1455675412520 .autoshowroom-ads-bg,' +
                    '.autoshowroom-sidebar aside.woocommerce.widget ul li del span' +
                    '').css('opacity', 0.8);
            }
        });
        jQuery('#color_menu_parent').ColorPicker({
            color: '#222222',
            onShow: function (colpkr) {
                jQuery(colpkr).fadeIn(500);
                return false;
            },
            onHide: function (colpkr) {
                jQuery(colpkr).fadeOut(500);
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                jQuery('#color_menu_parent div').css('backgroundColor', '#' + hex);
                jQuery('.config_color').remove();
                jQuery('.addcss_example').remove();
                jQuery('' +
                    'body header nav ul.navbar-nav li > a,' +
                    '.mega-menu-horizontal > li >a'+
                    '').css('color', '#' + hex);
                var $parent_color = hex ;
                createCookie('color_menu',$parent_color);
            }

        })
        jQuery('#color_sub_menu').ColorPicker({
            color: '#222222',
            onShow: function (colpkr) {
                jQuery(colpkr).fadeIn(500);
                return false;
            },
            onHide: function (colpkr) {
                jQuery(colpkr).fadeOut(500);
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                jQuery('#color_sub_menu div').css('backgroundColor', '#' + hex);
                jQuery('.config_color').remove();
                jQuery('.addcss_example').remove();
                jQuery('' +
                    'body header nav ul.navbar-nav li ul li a,' +
                    '.mega-menu-horizontal > li ul.mega-sub-menu li a'+
                    '').css('color', '#' + hex);

                var $submenu_color = hex ;

                createCookie('color_submenu',$submenu_color);
            }
        })
        jQuery('#color_sub_menu_border').ColorPicker({
            color: '#FF5400',
            onShow: function (colpkr) {
                jQuery(colpkr).fadeIn(500);
                return false;
            },
            onHide: function (colpkr) {
                jQuery(colpkr).fadeOut(500);
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                jQuery('#color_sub_menu_border div').css('backgroundColor', '#' + hex);
                jQuery('.config_color').remove();
                jQuery('.addcss_example').remove();
                jQuery('' +
                    'ul.mega-sub-menu,' +
                    'body div header nav ul.navbar-nav li > ul.sub-menu'+
                    '').css('border-color', '#' + hex);

                var $submenu_border = hex;

                createCookie('border_submenu',$submenu_border);
            }
        })
        jQuery('#color_menu_hover').ColorPicker({
            color: '#FF5400',
            onShow: function (colpkr) {
                jQuery(colpkr).fadeIn(500);
                return false;
            },
            onHide: function (colpkr) {
                jQuery(colpkr).fadeOut(500);
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                jQuery('#color_menu_hover div').css('backgroundColor', '#' + hex);
                jQuery('.config_color').remove();
                jQuery('.addcss_example').remove();
                jQuery('head').append('' +
                    '<style type="text/css" class="addcssmenu">' +
                    'body header nav ul.navbar-nav li > a:hover,'+
                    '.mega-menu-horizontal > li >a:hover,' +
                    '.mega-current-menu-parent > a'+
                    '{color:#' + hex+' !important;}'+
                    '</style>' +
                '');
                var $menu_hover = hex;

                createCookie('menu_hover',$menu_hover);

            }
        })
        jQuery('#color_sub_menu_hover').ColorPicker({
            color: '#FF5400',
            onShow: function (colpkr) {
                jQuery(colpkr).fadeIn(500);
                return false;
            },
            onHide: function (colpkr) {
                jQuery(colpkr).fadeOut(500);
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                jQuery('#color_sub_menu_hover div').css('backgroundColor', '#' + hex);
                jQuery('.addcssmenu').remove();
                jQuery('.config_color').remove();
                jQuery('.addcss_example').remove();
                jQuery('head').append('' +
                    '<style type="text/css" class="addcssmenu">' +
                    'body header nav ul.navbar-nav li > ul li a:hover,'+
                    '.mega-menu-horizontal > li ul.mega-sub-menu li a:hover'+
                    '{color:#' + hex+' !important;}'+
                    '</style>' +
                '');
                var $submenu_hover = hex;

                createCookie('submenu_hover',$submenu_hover);

            }
        })
    })
</script>