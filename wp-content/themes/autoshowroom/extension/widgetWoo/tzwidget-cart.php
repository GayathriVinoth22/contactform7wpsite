<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class autoshowroom_WC_Widget_Cart extends WC_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_shopping_cart';
		$this->widget_description =  esc_html__( "Display the user's Cart in the sidebar.", 'autoshowroom' );
		$this->widget_id          = 'woocommerce_widget_cart';
		$this->widget_name        =  esc_html__( 'WooCommerce Cart', 'autoshowroom' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   =>  esc_html__( 'Cart', 'autoshowroom' ),
				'label' =>  esc_html__( 'Title', 'autoshowroom' )
			),
			'hide_if_empty' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' =>  esc_html__( 'Hide if cart is empty', 'autoshowroom' )
			)
		);

		parent::__construct();
	}

	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 *
	 * @param array $autoshowroom_args
	 * @param array $autoshowroom_instance
	 */
	public function widget( $autoshowroom_args, $autoshowroom_instance ) {

//		if ( apply_filters( 'woocommerce_widget_cart_is_hidden', is_cart() || is_checkout() ) ) {
//			return;
//		}

		$autoshowroom_hide_if_empty = empty( $autoshowroom_instance['hide_if_empty'] ) ? 0 : 1;

		$this->widget_start( $autoshowroom_args, $autoshowroom_instance );

		if ( $autoshowroom_hide_if_empty ) {
			echo '<div class="hide_cart_widget_if_empty">';
		}

		// Insert cart widget placeholder - code in woocommerce.js will update this on page load
		echo '<div class="widget_shopping_cart_content"></div>';

		if ( $autoshowroom_hide_if_empty ) {
			echo '</div>';
		}

		$this->widget_end( $autoshowroom_args );
	}
}
