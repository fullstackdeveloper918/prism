<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
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

$addClass = '';
if ($min_value == 1 && $max_value == 1) { $addClass = 'single-add'; }
?>
<div class="quantity <?php echo esc_attr( $addClass ); ?>">
    <input type="number" step="<?php echo esc_attr( $step ); ?>" min="<?php echo esc_attr( $min_value ); ?>" max="<?php echo esc_attr( $max_value ); ?>" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>" title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'kona' ) ?>" class="input-text qty text" size="4" pattern="<?php echo esc_attr( $pattern ); ?>" inputmode="<?php echo esc_attr( $inputmode ); ?>" />
    <span class="qty-button plus">
   		<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 8.8 8.9">
		<path d="M8.3,3.8H5.2V0.7C5.2,0.3,4.8,0,4.5,0h0C4.1,0,3.8,0.3,3.8,0.7v3.1H0.7C0.3,3.8,0,4.1,0,4.5v0
			c0,0.4,0.3,0.7,0.7,0.7h3.1v3.1c0,0.4,0.3,0.7,0.7,0.7h0c0.4,0,0.7-0.3,0.7-0.7V5.2h3.1c0.4,0,0.7-0.3,0.7-0.7v0
			C8.9,4.1,8.6,3.8,8.3,3.8z"/>
		</svg>
   	</span>
    <span class="qty-button minus">
    	<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 8.9 9">
		<path d="M8.3,5.2H0.7C0.3,5.2,0,4.8,0,4.5l0,0c0-0.4,0.3-0.7,0.7-0.7h7.6c0.4,0,0.7,0.3,0.7,0.7v0 C8.9,4.8,8.6,5.2,8.3,5.2z"/>
		</svg>
    </span>
</div>
