<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version     3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>

<div class="cart-list" data-items="<?php echo WC()->cart->get_cart_contents_count(); ?>">
	<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
		<?php do_action( 'woocommerce_before_cart_table' ); ?>

		<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
			<tbody>
				<?php do_action( 'woocommerce_before_cart_contents' ); ?>

				<?php
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
						?>
						<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

							<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'kona' ); ?>">
								<?php
									$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image('kona-thumb-mini'), $cart_item, $cart_item_key );

									if ( ! $product_permalink ) {
										echo '<span class="product-image">'.$thumbnail.'</span>';
									} else {
										printf( '<span class="product-image"><a href="%s">%s</a></span>', esc_url( $product_permalink ), $thumbnail );
									}
								?>
								<div class="product-info">
								<?php
									$titlesize = get_option('_sr_shopitemtitlesize');
									if ( ! $product_permalink ) {
										echo '<h6 class="product-title '.esc_attr($titlesize).'">'.apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '</h6>';
									} else {
										echo '<h6 class="product-title '.esc_attr($titlesize).'">'.apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ). '</h6>';
									}

									// Meta data
									echo wc_get_formatted_cart_item_data( $cart_item );

									// Backorder notification
									if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
										echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'kona' ) . '</p>';
									}
								?>
								</div>
							</td>

							<td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'kona' ); ?>">
								<?php
									// displayed on mobile devices
									echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
								?>
								
								<?php
									if ( $_product->is_sold_individually() ) {
										$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
									} else {
										$product_quantity = woocommerce_quantity_input( array(
											'input_name'  => "cart[{$cart_item_key}][qty]",
											'input_value' => $cart_item['quantity'],
											'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
											'min_value'   => '0',
										), $_product, false );
									}

									echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
								?>
								
								<?php
									// displayed on mobile devices
									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
										'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">%s</a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'kona' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() ),
										""
									), $cart_item_key );
								?>
							</td>

							<td class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'kona' ); ?>">
								<?php
									echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
								?>
								
								<?php
									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
										'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">%s</a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'kona' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() ),
										esc_html__( 'Remove', 'kona' )
									), $cart_item_key );
								?>
							</td>
						</tr>
						<?php
					}
				}
				?>

				<?php do_action( 'woocommerce_cart_contents' ); ?>

				<?php do_action( 'woocommerce_after_cart_contents' ); ?>
			</tbody>
		</table>

		<div class="update-cart-action">
			<input type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'kona' ); ?>" />

			<?php do_action( 'woocommerce_cart_actions' ); ?>

			<?php wp_nonce_field( 'woocommerce-cart' ); ?>
		</div>

		<?php do_action( 'woocommerce_after_cart_table' ); ?>
	</form>
</div> <!-- AND .cart-list -->

	<div class="cart-bottom">
	
		<span class="sr-loader-icon"></span>
    
        <div class="total"><h6 class="label widget-title"><?php _e( 'Total', 'kona' ); ?></h6> <?php echo WC()->cart->get_cart_subtotal(); ?></div>
    
        <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>
    
        <div class="buttons">
           	<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="sr-button withicon">
				<span class="text">
					<span><?php _e( 'Checkout', 'kona' ); ?></span>
					<span><?php _e( 'Checkout', 'kona' ); ?></span>
				</span>
				<span class="icon">
					<span class="arrow">
						<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 13.2 9">
						<path d="M13.1,4.4c0-0.2-0.1-0.4-0.2-0.5c0,0,0,0,0,0L9.1,0.2c-0.3-0.3-0.7-0.3-1,0c-0.3,0.3-0.3,0.7,0,1l2.6,2.6H0.7
							c-0.4,0-0.7,0.3-0.7,0.7c0,0.4,0.3,0.7,0.7,0.7h10L8.2,7.8c-0.3,0.3-0.3,0.7,0,1c0.3,0.3,0.7,0.3,1,0L12.9,5c0,0,0,0,0,0
							C13,4.9,13,4.8,13.1,4.8c0,0,0,0,0,0C13.1,4.6,13.1,4.5,13.1,4.4z"/>
						</svg>
					</span>
				</span>
			</a>
        </div>
    
    </div>
    
 <?php else : // if empty ?>

		<div class="empty-cart">
			<div class="empty-icon">0</div>
			<div class="empty-main-text h4"><strong><?php _e( 'Your cart is empty', 'kona' ); ?></strong></div>
			<div class="empty-sub-text title-alt"><?php _e( "Looks like you haven't made your choice yet", 'kona' ); ?></div>
		</div>

<?php endif; ?> 
  
<?php do_action( 'woocommerce_after_mini_cart' ); ?>
