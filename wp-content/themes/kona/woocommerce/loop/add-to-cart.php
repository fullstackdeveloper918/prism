<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
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
global $product;


$buttonClass = "pseudo-add-to-cart";
$buttonText = $product->single_add_to_cart_text();
if (get_option('_sr_shopgridvariations')) {
	if( $product->is_type( 'variable' ) ){
		$variations = $product->get_available_variations();
		if (count($variations[0]['attributes']) > get_option('_sr_shopgridvariationscount')) {
			$buttonClass = "";
			$buttonText = $product->add_to_cart_text();
		}
	}
}


$class = str_replace('button','sr-button',$class);
$class = str_replace('_sr-button','_button',$class);
$class = str_replace('sr-button','sr-button withicon style-2 '.$buttonClass,$class);
echo apply_filters( 'woocommerce_loop_add_to_cart_link',
	sprintf( '<div class="grid-button"><a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s" data-title="">
		
		<span class="text">
			<span>%s</span>
			<span>%s</span>
		</span>
		<span class="icon">
			<span class="arrow">
				<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 13.2 9">
				<path d="M13.1,4.4c0-0.2-0.1-0.4-0.2-0.5c0,0,0,0,0,0L9.1,0.2c-0.3-0.3-0.7-0.3-1,0c-0.3,0.3-0.3,0.7,0,1l2.6,2.6H0.7
					c-0.4,0-0.7,0.3-0.7,0.7c0,0.4,0.3,0.7,0.7,0.7h10L8.2,7.8c-0.3,0.3-0.3,0.7,0,1c0.3,0.3,0.7,0.3,1,0L12.9,5c0,0,0,0,0,0
					C13,4.9,13,4.8,13.1,4.8c0,0,0,0,0,0C13.1,4.6,13.1,4.5,13.1,4.4z"/>
				</svg>
			</span>
			<span class="sr-loader-icon"></span>
			<span class="check"></span>
		</span>
		
		</a></div>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		esc_attr( $product->get_id() ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $class ) ? $class : 'sr-button' ),
		esc_html( $buttonText ),
		esc_html( $buttonText )
	),
$product );
