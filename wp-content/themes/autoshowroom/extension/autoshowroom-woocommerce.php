<?php
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
add_theme_support( 'woocommerce' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );

remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

add_action( 'autoshowroom_product_thumbnail', 'woocommerce_template_loop_product_thumbnail', 10 );

add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 40 );

add_action( 'autoshowroom_woocommerce_excerpt','woocommerce_template_single_excerpt', 10 );

add_action( 'autoshowroom_woocommerce_mini_cart','woocommerce_mini_cart', 10 );

add_action( 'autoshowroom_woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 10 );

add_action( 'autoshowroom_woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

add_action( 'autoshowroom_single_product_excerpt', 'woocommerce_template_single_excerpt', 20 );

add_action( 'autoshowroom_single_product_addtocart', 'woocommerce_template_single_add_to_cart', 30 );

add_action( 'autoshowroom_related_product', 'woocommerce_output_related_products', 20 );

/* Grid/List switcher */
add_action('woocommerce_before_shop_loop', 'autoshowroom_grid_list_switcher',50);
function autoshowroom_grid_list_switcher() {

    if ( ! woocommerce_products_will_display() )
        return;
    ?>
    <div class="tzview-style">
        <label><?php  esc_html_e('View as:', 'autoshowroom'); ?></label>
        <div class="switchToGrid">
            <i class="fa fa-th"></i>
            <span><?php  esc_html_e('Grid style','autoshowroom');?></span>
        </div>
        <div class="switchToList">
            <i class="fa fa-list"></i>
            <span><?php  esc_html_e('List style','autoshowroom')?></span>
        </div>
    </div>

<?php
}

/*
 * WISHLIST BUTTON
 * */
if (!function_exists('autoshowroom_wishlist_button')) {
    function autoshowroom_wishlist_button() {

        global $product, $yith_wcwl;

        if ( class_exists( 'YITH_WCWL_UI' ) )  {
            $autoshowroom_url = $yith_wcwl->get_wishlist_url();
            $autoshowroom_product_type = $product->get_type();
            $autoshowroom_exists = $yith_wcwl->is_product_in_wishlist( $product->get_id() );

            $autoshowroom_classes = get_option( 'yith_wcwl_use_button' ) == 'yes' ? 'class="add_to_wishlist single_add_to_wishlist button alt tzheart"' : 'class="add_to_wishlist tzheart"';

            $autoshowroom_html  = '<div class="yith-wcwl-add-to-wishlist">';
            $autoshowroom_html .= '<div class="yith-wcwl-add-button';  // the class attribute is closed in the next row

            $autoshowroom_html .= $autoshowroom_exists ? ' hide"' : ' show"';

            $autoshowroom_html .= '><a href="' . htmlspecialchars($yith_wcwl->get_wishlist_url()) . '" data-product-id="' . esc_attr($product->get_id()) . '" data-product-type="' . esc_attr($autoshowroom_product_type) . '" ' . esc_attr($autoshowroom_classes) . ' ><i class="fa fa-heart"></i><span>' . esc_html__('Add to Wishlist','autoshowroom').'</span></a>';
            $autoshowroom_html .= '</div>';

            $autoshowroom_html .= '<div class="yith-wcwl-wishlistaddedbrowse hide"><a href="' . $autoshowroom_url . '"><i class="fa fa-heart"></i><span>Browse Wishlist</span></a></div>';
            $autoshowroom_html .= '<div class="yith-wcwl-wishlistexistsbrowse ' . ( $autoshowroom_exists ? 'show' : 'hide' ) . '"><a href="' . esc_url($autoshowroom_url) . '"><i class="fa fa-heart"></i><span>'.esc_html__('Browse Wishlist','autoshowroom').'</span></a></div>';
            $autoshowroom_html .= '<div class="clearfix"></div><div class="yith-wcwl-wishlistaddresponse"></div>';

            $autoshowroom_html .= '</div>';

            return $autoshowroom_html;
        }
    }
}

add_action('woocommerce_share','autoshowroom_share_product',1);
function autoshowroom_share_product(){
    if( is_product() ):
        ?>
        <div class="product_share">
            <span><?php esc_html_e('Share on:', 'autoshowroom'); ?></span>
            <div class="product_share_social">
                <!-- Facebook Button -->
                <a href="javascript: void(0)" onclick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php the_title(); ?>&amp;p[url]=<?php the_permalink() ; ?>','sharer','toolbar=0,status=0,width=580,height=325');" id="fb-share" class="tz_social"><i class="fa fa-facebook"></i><span></span></a>

                <!-- Twitter Button -->
                <a href="javascript: void(0)" onclick="window.open('http://twitter.com/share?text=<?php the_title(); ?>&amp;url=<?php the_permalink() ; ?>','sharer','toolbar=0,status=0,width=580,height=325');" class="tz_social" id="tw-share"><i class="fa fa-twitter"></i><span></span></a>

                <!-- Google +1 Button -->
                <a href="javascript: void(0)" onclick="window.open('https://plus.google.com/share?url=<?php the_permalink() ; ?>','sharer','toolbar=0,status=0,width=580,height=325');" class="tz_social" id="g-share"><i class="fa fa-google-plus"></i><span></span></a>

                <!-- Pinterest Button -->
                <a href="javascript: void(0)" onclick="window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink() ; ?>&amp;description=<?php the_title(); ?>','sharer','toolbar=0,status=0,width=580,height=325');" class="tz_social" id="p-share"><i class="fa fa-pinterest"></i><span></span></a>
            </div>
        </div>
    <?php
    endif;
}

if ( ! function_exists( 'woocommerce_cross_sell_display' ) ) {

    /**
     * Output the cart cross-sells.
     *
     * @param  integer $autoshowroom_posts_per_page
     * @param  integer $autoshowroom_columns
     * @param  string $autoshowroom_orderby
     */
    function woocommerce_cross_sell_display( $autoshowroom_posts_per_page = 4, $autoshowroom_columns = 4, $autoshowroom_orderby = 'rand' ) {
        wc_get_template( 'cart/cross-sells.php', array(
            'posts_per_page' => $autoshowroom_posts_per_page,
            'orderby'        => $autoshowroom_orderby,
            'columns'        => $autoshowroom_columns
        ) );
    }
}

/* Override widget woocommerce cart */

function autoshowroom_override_woocommerce_widgets() {
    if ( class_exists( 'WC_Widget_Cart' ) ) {
        unregister_widget( 'WC_Widget_Cart' );
        include_once('widgetWoo/tzwidget-cart.php' );
        register_widget( 'autoshowroom_WC_Widget_Cart' );
    }
}
add_action( 'widgets_init', 'autoshowroom_override_woocommerce_widgets', 15 );
?>
