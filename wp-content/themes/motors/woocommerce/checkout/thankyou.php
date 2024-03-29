<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order">

    <?php if ( $order ) : ?>

        <?php if ( stm_is_auto_parts() ) : ?>
            <div class="left">
        <?php endif; ?>
        <?php if ( $order->has_status( 'failed' ) ) : ?>

            <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'motors' ); ?></p>

            <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
                <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>"
                   class="button pay"><?php _e( 'Pay', 'motors' ) ?></a>
                <?php if ( is_user_logged_in() ) : ?>
                    <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>"
                       class="button pay"><?php _e( 'My Account', 'motors' ); ?></a>
                <?php endif; ?>
            </p>

        <?php else : ?>


            <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received heading-font">
                <i class="fa fa-check"></i>
                <?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'motors' ), $order ); ?>
                <?php if ( stm_payment_enabled() ): ?>
                    <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>"
                       style="color: #1bc744;"><?php esc_html_e( 'Return to account', 'motors' ); ?></a>
                <?php endif; ?>
            </p>

            <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details heading-font">

                <li class="woocommerce-order-overview__order order">
                    <span><?php _e( 'Order number:', 'motors' ); ?></span>
                    <strong class="heading-font">#<?php echo stm_do_lmth( $order->get_order_number() ); ?></strong>
                </li>

                <li class="woocommerce-order-overview__date date">
                    <?php _e( 'Date:', 'motors' ); ?>
                    <strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
                </li>

                <?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
                    <li class="woocommerce-order-overview__email email">
                        <?php _e( 'Email:', 'motors' ); ?>
                        <strong><?php echo stm_do_lmth( $order->get_billing_email() ); ?></strong>
                    </li>
                <?php endif; ?>

                <li class="woocommerce-order-overview__total total">
                    <?php _e( 'Total:', 'motors' ); ?>
                    <strong><?php echo stm_do_lmth( $order->get_formatted_order_total() ); ?></strong>
                </li>

                <?php if ( $order->get_payment_method_title() ) : ?>

                    <li class="woocommerce-order-overview__payment-method method">
                        <span><?php _e( 'Payment method:', 'motors' ); ?></span>
                        <strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
                    </li>

                <?php endif; ?>

            </ul>
            <div class="clear"></div>
        <?php endif; ?>

        <?php
        if ( !stm_is_rental() ) {
            do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() );
        }
        ?>
        <?php if ( stm_is_auto_parts() ) : ?>
            </div>
        <?php endif; ?>
        <?php if ( stm_is_auto_parts() ) : ?>
            <div class="right">
        <?php endif; ?>
        <?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>
        <?php if ( stm_is_auto_parts() ) : ?>
            <?php
            $shopPageId = get_option( 'woocommerce_shop_page_id' );
            if ( $shopPageId ) :
                ?>
                <a href="<?php echo get_the_permalink( $shopPageId ); ?>" class="go-to-shop heading-font">
                    <?php echo esc_html__( 'Continue Shopping', 'motors' ); ?>
                </a>
            <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php do_action( 'stm_send_email_pay_per_listing', $order->get_id() ); ?>

    <?php else : ?>

        <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'motors' ), null ); ?></p>

    <?php endif; ?>

</div>
