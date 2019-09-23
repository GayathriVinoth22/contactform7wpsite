<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

$autoshowroom_Shop_ColumnGrid        =   ot_get_option('autoshowroom_TzShopGrid_Column','3');
$autoshowroom_Shop_ColumnList        =   ot_get_option('autoshowroom_TzShopList_Column','1');
$autoshowroom_TzShop_Title   = ot_get_option('autoshowroom_TzShop_Title','show');
$autoshowroom_TzShop_Rate   = ot_get_option('autoshowroom_TzShop_Rate','show');
$autoshowroom_TzShop_Price   = ot_get_option('autoshowroom_TzShop_Price','show');

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', $autoshowroom_Shop_ColumnGrid );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}

// TZ COLUMNS

if($autoshowroom_Shop_ColumnGrid == '4'){
    $classes[] = 'tzShop-item tzShop-4column';
}elseif($autoshowroom_Shop_ColumnGrid == '3'){
    $classes[] = 'tzShop-item tzShop-3column';
}else{
    $classes[] = 'tzShop-item tzShop-2column';
}

if($autoshowroom_Shop_ColumnList == '2'){
    $classes[] = 'tzShopList-2column';
}else{
    $classes[] = 'tzShopList-1column';
}

?>

<li <?php post_class( $classes ); ?>>

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

    <div class="tzShop-item_inner">
        <div class="tzShop-item_image">
            <a href="<?php the_permalink();?>">
                <?php do_action('autoshowroom_product_thumbnail'); ?>
            </a>
            <?php
            /**
             * woocommerce_before_shop_loop_item_title hook
             *
             * @hooked woocommerce_show_product_loop_sale_flash - 10
             * @hooked woocommerce_template_loop_product_thumbnail - 10
             */
            do_action( 'woocommerce_before_shop_loop_item_title' );
            ?>
            <?php echo balanceTags(autoshowroom_wishlist_button()); ?>
            <div class="tzShop-item_button">
                <?php
                /**
                 * woocommerce_after_shop_loop_item hook
                 *
                 * @hooked woocommerce_template_loop_add_to_cart - 10
                 */
                do_action( 'woocommerce_after_shop_loop_item' );
                ?>
            </div>
        </div>
        <div class="tzShop-item_info">
            <?php if($autoshowroom_TzShop_Title == 'show'){ ?>
            <h3 class="tzShop-item_title">
                <a href="<?php the_permalink();?>"><?php the_title();?></a>
            </h3>
            <?php } ?>
            <?php if($autoshowroom_TzShop_Rate == 'show'){ ?>
            <?php
            do_action( 'woocommerce_after_shop_loop_item_title' );
            ?>
            <?php } ?>
            <?php if($autoshowroom_TzShop_Price == 'show'){ ?>
            <div class="tzShop-item-bottom-info">
                <?php
                do_action( 'autoshowroom_woocommerce_after_shop_loop_item_title' );
                ?>
                <div class="tzShop-item_detail">
                    <a href="<?php the_permalink();?>" title="<?php esc_html_e('View Detail','autoshowroom')?>">
                        <?php echo balanceTags('<i class="fa fa-arrow-circle-right"></i>','autoshowroom');?>
                    </a>
                </div>
            </div>
            <?php } ?>

            <div class="tzShop-item_des">
                <?php do_action( 'autoshowroom_woocommerce_excerpt'); ?>
            </div>

            <div class="tzShop-item_button_list">
                <?php echo balanceTags(autoshowroom_wishlist_button()); ?>
                <div class="tzShop-item_button">
                    <?php
                    /**
                     * woocommerce_after_shop_loop_item hook
                     *
                     * @hooked woocommerce_template_loop_add_to_cart - 10
                     */
                    do_action( 'woocommerce_after_shop_loop_item' );
                    ?>
                </div>
                <div class="tzShop-item_button">
                    <a class="button add_to_cart_button product_type_simple" href="<?php the_permalink();?>">
                        <?php echo balanceTags('<i class="fa fa-arrow-circle-right"></i>','autoshowroom');?>
                        <span><?php esc_html_e('View More','autoshowroom')?></span></a>
                </div>
                <div class="clr"></div>
            </div>

        </div>
    </div>
</li>
