<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$autoshowroom_TzShopDetail_Title   = ot_get_option('autoshowroom_TzShopDetail_Title','show');
$autoshowroom_TzShopDetail_Rate   = ot_get_option('autoshowroom_TzShopDetail_Rate','show');
$autoshowroom_TzShopDetail_Price   = ot_get_option('autoshowroom_TzShopDetail_Price','show');
$autoshowroom_TzShopDetail_Box   = ot_get_option('autoshowroom_TzShopDetail_Box','show');
$autoshowroom_TzShopDetail_Related   = ot_get_option('autoshowroom_TzShopDetail_Related','show');
$autoshowroom_TzShopDetail_slider   = ot_get_option('autoshowroom_TzShopDetail_Slider','woo');

	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo balanceTags(get_the_password_form());
	 	return;
	 }
if($autoshowroom_TzShopDetail_slider=='woo'){
	     ?>
    <div class="container-content default-page vehicle-detail product-detail">
    <div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php if($autoshowroom_TzShopDetail_Title == 'show'){ ?>
                        <h1 class="vehicle-title"><?php the_title();?></h1>
                    <?php } ?>
                    <?php if($autoshowroom_TzShopDetail_Rate == 'show'){ ?>
                        <div class="product-rate">
                            <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
                        </div>
                    <?php } ?>
                    <?php
                    /**
                     * Hook: woocommerce_before_single_product_summary.
                     *
                     * @hooked woocommerce_show_product_sale_flash - 10
                     * @hooked woocommerce_show_product_images - 20
                     */
                    do_action( 'woocommerce_before_single_product_summary' );
                    ?>
                    <?php
                    /**
                     * Hook: woocommerce_after_single_product_summary.
                     *
                     * @hooked woocommerce_output_product_data_tabs - 10
                     * @hooked woocommerce_upsell_display - 15
                     * @hooked woocommerce_output_related_products - 20
                     */
                    do_action( 'woocommerce_after_single_product_summary' );
                    ?>
                </div>
                <div class="col-md-4 autoshowroom-sidebar">
                    <?php
                    do_action( 'autoshowroom_woocommerce_after_shop_loop_item_title' );
                    ?>
                    <div class="summary entry-summary">
                        <div class="vehicle-box">
                            <h3 class="widget-title"><span><?php esc_html_e('Short Description','autoshowroom');?></span></h3>
                            <div class="pcd-specs">
                                <?php
                                do_action( 'woocommerce_single_product_summary' );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    <?php do_action( 'woocommerce_after_single_product' ); ?>

<?php
}else{
?>
<section class="container-content default-page vehicle-detail product-detail">
    <div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
                <?php if($autoshowroom_TzShopDetail_Title == 'show'){ ?>
				<h1 class="vehicle-title"><?php the_title();?></h1>
                <?php } ?>
                <?php if($autoshowroom_TzShopDetail_Rate == 'show'){ ?>
				<div class="product-rate">
					<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
				</div>
                <?php } ?>
				<?php
				do_action('autoshowroom_woocommerce_before_single_product_summary');
				?>
				<div class="product-content">
					<?php
					/**
					 * woocommerce_after_single_product_summary hook
					 *
					 * @hooked woocommerce_output_product_data_tabs - 10
					 * @hooked woocommerce_upsell_display - 15
					 * @hooked woocommerce_output_related_products - 20
					 */
					do_action( 'woocommerce_after_single_product_summary' );
					?>
				</div>
			</div>
			<div class="col-md-4 autoshowroom-sidebar">
				<?php
				do_action( 'autoshowroom_woocommerce_after_shop_loop_item_title' );
				?>
                <?php if($autoshowroom_TzShopDetail_Box == 'show'){ ?>
				<div class="vehicle-box">
					<h3 class="widget-title"><span><?php esc_html_e('Short Description','autoshowroom');?></span></h3>
					<div class="pcd-specs">
						<?php
						do_action( 'woocommerce_single_product_summary' );
						?>
					</div>
				</div>
                <?php } ?>
				<?php  if ( is_active_sidebar( "autoshowroom-sidebar-shop-detail" ) ) : ?>
					<?php dynamic_sidebar( "autoshowroom-sidebar-shop-detail" ); ?>
				<?php endif; ?>

                <?php if($autoshowroom_TzShopDetail_Related == 'show'){ ?>
				<?php do_action( 'autoshowroom_related_product' ); ?>
                <?php } ?>

			</div>
		</div>
	</div>
    </div>
</section>
<?php
}