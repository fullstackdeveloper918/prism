<?php
/**
 * Displayed when no products are found matching the current query
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/no-products-found.php.
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

?>
<div class="woocommerce-no-products notfound">
	<div class="notfound-icon"></div>
	<div class="spacer-small"></div>
	<p class="h3 ooops"><strong><?php esc_html_e("Ooops","kona"); ?>.</strong></p>
	<p class="h5 title-alt"><?php _e( 'No products were found matching your selection.', 'kona' ); ?></p>
</div>
