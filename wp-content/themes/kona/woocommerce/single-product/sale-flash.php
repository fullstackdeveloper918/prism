<?php
/**
 * Single Product Sale Flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/sale-flash.php.
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
	exit; // Exit if accessed directly
}

global $post, $product;

?>

<?php 
if (get_option('_sr_shopgridshownew') || get_option('_sr_shopgridshowhot')) { 
	echo '<span class="badges">';
	
	if (get_option('_sr_shopgridshownew')) {
		$postdate      = get_the_time( 'Y-m-d' ); 			// Post date
		$postdatestamp = strtotime( $postdate );  			// Timestamped post date
		$newness       = get_option('_sr_shopgridnewdays'); // Newness in days
		if ( ( time() - ( 60 * 60 * 24 * $newness ) ) < $postdatestamp ) {
			echo '<span class="new-badge">' . esc_html__( 'New', 'kona' ) . '</span>';
		}
	}
	
}
?>

<?php if ( $product->is_on_sale() ) : ?>

	<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale', 'kona' ) . '</span>', $post, $product ); ?>

<?php endif; ?>


<?php 
if (get_option('_sr_shopgridshownew') || get_option('_sr_shopgridshowhot')) { 
	
	if (get_option('_sr_shopgridshowhot')) {
		$prodID = get_the_ID();
		$prods = ','.get_option('_sr_shopgridhotprodcuts').','; 
		if (strpos($prods, ','.$prodID.',') !== false) {
			echo '<span class="hot-badge">' . esc_html__( 'Hot', 'kona' ) . '</span>';
		}
	}
	
	echo '</span>';
}
?>