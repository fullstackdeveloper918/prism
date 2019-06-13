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
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="woocommerce-order">
	
	<?php if ( $order ) : ?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<h3><strong><?php echo esc_html__('Order failed','kona') ?></strong></h3>
		
			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed h6 title-alt"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'kona' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'kona' ) ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My Account', 'kona' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>
			
			<h3><strong><?php echo esc_html__('Order received','kona') ?></strong></h3>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received h6 title-alt"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'kona' ), $order ); ?></p>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<span><strong><?php _e( 'Order number', 'kona' ); ?></strong></span>
					<strong><?php echo esc_html($order->get_order_number()); ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<span><strong><?php _e( 'Date', 'kona' ); ?></strong></span>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
				</li>

				<li class="woocommerce-order-overview__total total">
					<span><strong><?php _e( 'Total', 'kona' ); ?></strong></span>
					<strong><?php echo wp_kses_post($order->get_formatted_order_total()); ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<span><strong><?php _e( 'Payment method', 'kona' ); ?></strong></span>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				<?php endif; ?>

			</ul>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>
		
		<h3><strong><?php echo esc_html__('Order received','kona') ?></strong></h3>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received h6 title-alt"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'kona' ), null ); ?></p>

	<?php endif; ?>

</div>
