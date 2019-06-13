<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
	
	<div class="empty-cart">
		<div class="empty-icon">0</div>
		<div class="empty-main-text h3"><strong><?php _e( 'Your cart is empty', 'kona' ); ?></strong></div>
		<div class="empty-sub-text title-alt"><?php _e( "Looks like you haven't made your choice yet", 'kona' ); ?></div>
		<p class="return-to-shop">
			<a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
				<?php _e( 'Return to shop', 'kona' ) ?>
			</a>
		</p>
	</div>
	
<?php endif; ?>
