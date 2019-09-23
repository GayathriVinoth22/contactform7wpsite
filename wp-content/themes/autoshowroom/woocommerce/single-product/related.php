<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

$related = wc_get_related_products($product->get_id(),$posts_per_page);

if ( sizeof( $related ) == 0 ) return;

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->get_id() )
) );

$products = new WP_Query( $args );

$woocommerce_loop['columns'] = $columns;

if ( $products->have_posts() ) : ?>

	<aside class="related widget">

		<h3 class="widget-title"><span><?php  esc_html_e( 'Related Products', 'autoshowroom' ); ?></span></h3>
		<ul class="related-products">
			<?php woocommerce_product_loop_start(); ?>

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>
			<li class="related-product-item">
				<a class="img" href="<?php the_permalink();?>">
				<?php the_post_thumbnail('medium');?>
				</a>
				<a class="product-title" href="<?php the_permalink();?>"><?php the_title();?></a>
				<?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
				<?php
				do_action( 'autoshowroom_woocommerce_after_shop_loop_item_title' );
				?>
			</li>
			<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>
		</ul>

	</aside>

<?php endif;

wp_reset_postdata();
