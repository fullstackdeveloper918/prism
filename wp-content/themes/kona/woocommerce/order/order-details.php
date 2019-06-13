<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version     3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$order = wc_get_order( $order_id );

$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
?>

<div class="spacer-big"></div>
<div id="order_review" class="column-section clearfix spaced-huge woocommerce-order-details">

	<div class="column three-fifth">

	<h4 class="woocommerce-order-details__title"><strong><?php _e( 'Order details', 'kona' ); ?></strong></h4>

	<table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

		<tbody>
			<?php
				foreach ( $order->get_items() as $item_id => $item ) {
					$product = apply_filters( 'woocommerce_order_item_product', $item->get_product(), $item );

					wc_get_template( 'order/order-details-item.php', array(
						'order'			     => $order,
						'item_id'		     => $item_id,
						'item'			     => $item,
						'show_purchase_note' => $show_purchase_note,
						'purchase_note'	     => $product ? $product->get_purchase_note() : '',
						'product'	         => $product,
					) );
				}
			?>
			<?php do_action( 'woocommerce_order_items_table', $order ); ?>
		</tbody>

		<tfoot>
			<?php
				foreach ( $order->get_order_item_totals() as $key => $total ) {
					?>
					<tr>
						<th scope="row"><?php echo esc_html($total['label']); ?></th>
						<td><?php echo ''.$total['value']; ?></td>
					</tr>
					<?php
				}
			?>
		</tfoot>

	</table>

	<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
	
	</div> <!-- END .one-half -->

	<?php if ( $show_customer_details ) : ?>
		<div class="column two-fifth last-col">
		<?php wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) ); ?>
		</div>
	<?php endif; ?>

</div>