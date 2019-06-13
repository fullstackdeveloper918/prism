<?php
/**
 * The Template for displaying empty wishlist.
 *
 * @version             1.0.0
 * @package           TInvWishlist\Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<div class="tinv-wishlist woocommerce notfound">
	<?php do_action( 'tinvwl_before_wishlist', $wishlist ); ?>
	<?php if ( function_exists( 'wc_print_notices' ) ) { wc_print_notices(); } ?>
	<div class="notfound-icon"></div>
	<div class="spacer-small"></div>
	<p class="h3 ooops"><strong><?php esc_html_e("Ooops","kona"); ?>.</strong></p>
	<p class="cart-empty h5 title-alt">
		<?php if ( get_current_user_id() === $wishlist['author'] ) { ?>
			<?php esc_html_e( 'Your Wishlist is currently empty.', 'kona' ); ?>
		<?php } else { ?>
			<?php esc_html_e( 'Wishlist is currently empty.', 'kona' ); ?>
		<?php } ?>
	</p>

	<?php do_action( 'tinvwl_wishlist_is_empty' ); ?>
	<div class="spacer-medium"></div>
	<p class="return-to-shop">
		<a class="sr-button-text wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>"><?php esc_html_e( 'Return To Shop', 'kona' ); ?></a>
	</p>
</div>