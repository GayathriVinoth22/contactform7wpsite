<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $woocommerce;
$autoshowroom_TzShopDetail_slider   = ot_get_option('autoshowroom_TzShopDetail_Slider','woo');
$attachment_ids = $product->get_gallery_image_ids();
if($autoshowroom_TzShopDetail_slider=='woo'){

    if ( $attachment_ids && has_post_thumbnail() ) {
        foreach ( $attachment_ids as $attachment_id ) {
            $full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
            $thumbnail       = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
            $attributes      = array(
                'title'                   => get_post_field( 'post_title', $attachment_id ),
                'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
                'data-src'                => $full_size_image[0],
                'data-large_image'        => $full_size_image[0],
                'data-large_image_width'  => $full_size_image[1],
                'data-large_image_height' => $full_size_image[2],
            );

            $html  = '<div data-thumb="' . esc_url( $thumbnail[0] ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '">';
            $html .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
            $html .= '</a></div>';

            echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );
        }
    }

}else{
if ( $attachment_ids ) {
	$loop 		= 0;
	$columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );

		foreach ( $attachment_ids as $attachment_id ) {

			$classes = array( '' );

			if ( $loop === 0 || $loop % $columns === 0 )
				$classes[] = 'first';

			if ( ( $loop + 1 ) % $columns === 0 )
				$classes[] = 'last';

			$image_link = wp_get_attachment_url( $attachment_id );

			if ( ! $image_link )
				continue;

			$image_title 	= esc_attr( get_the_title( $attachment_id ) );
			$image_caption 	= esc_attr( get_post_field( 'post_excerpt', $attachment_id ) );

			$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_single' ), 0, $attr = array(
				'title'	=> $image_title,
				'alt'	=> $image_title
				) );

			$image_class = esc_attr( implode( ' ', $classes ) );

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<li><img src="%s" title="%s"/></li>', $image_link, $image_class, $image_caption, $image ), $attachment_id, $post->ID, $image_class );

			$loop++;
		}

	?>
	<?php
}
}
