<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header('shop');
 get_template_part('template_inc/inc','menu');
 get_template_part('template_inc/inc','title-breadcrumb');

$autoshowroom_ShopSidebar        =   ot_get_option('autoshowroom_TzShop_Sidebar','right');
$autoshowroom_TzShopPagination   = ot_get_option('autoshowroom_TzShopPagination','show');
$autoshowroom_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
if($autoshowroom_ShopSidebar == 'right' || $autoshowroom_ShopSidebar == 'left'){
    $autoshowroom_class = 'col-lg-9 col-md-9 col-sm-12 col-xs-12';
}else{
    $autoshowroom_class = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
}
$autoshowroom_shop_type = '';
if(isset($_GET["type"]) && !empty($_GET["type"])) {
    $autoshowroom_shop_type = $_GET["type"];
}

?>
<script type="text/javascript">

    jQuery(function($){
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

        $.display = function(view) {
            if (view == 'list') {
                $('.product-grid').attr('class', 'product-list');
                createCookie('display', 'list');
                jQuery('.switchToGrid').removeClass('active');
                jQuery('.switchToList').addClass('active');
            } else {
                $('.product-list').attr('class', 'product-grid');
                createCookie('display', 'grid');
                jQuery('.switchToList').removeClass('active');
                jQuery('.switchToGrid').addClass('active');
            }
        }

        var $autoshowroom_shop = '<?php echo esc_attr($autoshowroom_shop_type);?>';
        if($autoshowroom_shop == 'list'){
            $.display('list');
        }
        $('.switchToList').on('click',function(){
            $.display('list');
        });
        $('.switchToGrid').on('click',function(){
            $.display('grid');
        });

        var view = readCookie('display');

        if (view) {
            $.display(view);
        } else {
            $.display('grid');
        }
    });
</script>

<div class="tzshop-wrap">
    <div class="container">
        <div class="row">
            <?php
            if($autoshowroom_ShopSidebar == 'left'){
                get_sidebar('shop');
            }
            ?>
            <div class="<?php //echo esc_attr($autoshowroom_class);?> col-md-9 col-padding">
                <?php
                /**
                 * woocommerce_before_main_content hook
                 *
                 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                 * @hooked woocommerce_breadcrumb - 20
                 */
                do_action( 'woocommerce_before_main_content' );
                ?>

                <?php
                if ( have_posts() ) :
                    if ( woocommerce_products_will_display() ) {
                        ?>
                        <div class="grid_pagination_block">
                            <?php
                            /**
                             * woocommerce_before_shop_loop hook
                             *
                             * @hooked woocommerce_result_count - 20
                             * @hooked woocommerce_catalog_ordering - 30
                             */
                            do_action('woocommerce_before_shop_loop');
                            ?>
                        </div>
                    <?php
                    }
                        ?>
                    <div class="product-grid">
                        <!--                    <div class="product-list">-->
<!--                        <div class="row">-->
                            <?php woocommerce_product_loop_start(); ?>

                            <?php woocommerce_product_subcategories(); ?>

                            <?php while ( have_posts() ) : the_post(); ?>

                                <?php wc_get_template_part( 'content', 'product-autoshowroom' ); ?>

                            <?php endwhile; // end of the loop. ?>

                            <?php woocommerce_product_loop_end(); ?>
<!--                        </div>-->
                    </div>
                    <?php if($autoshowroom_TzShopPagination == 'show'){ ?>
                    <?php
                    /**
                     * woocommerce_after_shop_loop hook
                     *
                     * @hooked woocommerce_pagination - 10
                     */
                    do_action( 'woocommerce_after_shop_loop' );
                    ?>
                    <?php } ?>

                <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

                    <?php wc_get_template( 'loop/no-products-found.php' ); ?>

                <?php endif; ?>

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
            if($autoshowroom_ShopSidebar == 'right'){
                get_sidebar('shop');
            }
            ?>
        </div>
    </div>
</div>

<?php
get_footer( 'shop' );
?>
