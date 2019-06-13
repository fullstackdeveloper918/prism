<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
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

if ( $upsells ) : 

$columns = 4;
$columnsMobile = 2;
$spaced = "spaced";
$gridWidth = "wrapper";
$titlePosition = "normal";
$titleSize = 'h4';
if (get_option('_sr_shopsinglerelatedcol')) { $columns = intval(get_option('_sr_shopsinglerelatedcol')); }
if (get_option('_sr_shopgridcolmobile')) { $columnsMobile = intval(get_option('_sr_shopgridcolmobile')); }
if (get_option('_sr_shopgridspaced')) { $spaced = get_option('_sr_shopgridspaced'); }
if (get_option('_sr_shopsinglerelatedwidth')) { $gridWidth = get_option('_sr_shopsinglerelatedwidth'); }
if (get_option('_sr_shopsinglerelatedposition')) { $titlePosition = get_option('_sr_shopsinglerelatedposition'); }
if ($titlePosition == 'left-vertical') { $titleSize = 'h5';  }

$gridClass = 'isotope-grid fitrows mobile-col-'.$columnsMobile.' style-column-'.$columns.' isotope-'.$spaced;

?>

	<div class="up-sells upsells products clearfix <?php echo esc_attr($gridWidth); ?>">
		
		<div class="section-title position-<?php echo esc_attr($titlePosition); ?>">
			<<?php echo esc_attr($titleSize); ?>><?php _e( 'You may also like&hellip;', 'kona' ) ?></<?php echo esc_attr($titleSize); ?>>
		</div>

		<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $upsells as $upsell ) : ?>

				<?php
					$post_object = get_post( $upsell->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product' ); ?>

			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</div>

<?php endif;

wp_reset_postdata();			

