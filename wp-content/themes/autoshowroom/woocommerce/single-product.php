<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );
 get_template_part('template_inc/inc','menu');
 get_template_part('template_inc/inc','title-breadcrumb');

//$autoshowroom_Sidebar    = ot_get_option('autoshowroom_TzShopDetail_Sidebar');
$autoshowroom_class_col = '';
$autoshowroom_Sidebar = '';
if($autoshowroom_Sidebar == 'right' || $autoshowroom_Sidebar == 'left'){
    $autoshowroom_class_col = "col-lg-9 col-md-9 col-sm-12 col-xs-12 tzShopContentDetail";
}else{
    $autoshowroom_class_col = "col-lg-12 col-md-12 col-sm-12 col-xs-12 tzShopContentDetail single-product-nosidebar";
}
?>
<div class="tzShopDetail-wrap">
    <div class="container">
        <div class="row">
            <?php
            if($autoshowroom_Sidebar == 'left'){
                get_sidebar('shop');
            }
            ?>
            <div class="<?php echo esc_attr($autoshowroom_class_col);?>">
                <?php
                /**
                 * woocommerce_before_main_content hook
                 *
                 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                 * @hooked woocommerce_breadcrumb - 20
                 */
                do_action( 'woocommerce_before_main_content' );
                ?>

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php wc_get_template_part( 'content', 'single-product' ); ?>

                <?php endwhile; // end of the loop. ?>

                <?php
                /**
                 * woocommerce_after_main_content hook
                 *
                 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                 */
                do_action( 'woocommerce_after_main_content' );
                ?>
            </div>
            <?php
            if($autoshowroom_Sidebar == 'right'){
                get_sidebar('shop');
            }
            ?>
        </div>
    </div>
</div>

<?php
get_footer( 'shop' );
?>
