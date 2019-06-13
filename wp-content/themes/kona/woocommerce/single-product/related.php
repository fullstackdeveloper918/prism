<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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

global $product, $woocommerce_loop;

if ( empty( $product ) || ! $product->exists() ) {
	return;
}

if ( ! $related = wc_get_related_products($product->get_id()) ) {
	return;
}

$columns = 4;
$columnsMobile = 2;
if (get_option('_sr_shopsinglerelatedcol')) { $columns = intval(get_option('_sr_shopsinglerelatedcol')); }
if (get_option('_sr_shopgridcolmobile')) { $columnsMobile = intval(get_option('_sr_shopgridcolmobile')); }

$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $columns,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->get_id() )
) );

$products                    = new WP_Query( $args );
$woocommerce_loop['name']    = 'related';
$woocommerce_loop['columns'] = apply_filters( 'woocommerce_related_products_columns', $columns );

if ( $products->have_posts() ) : 


$spaced = "spaced";
$gridWidth = "wrapper";
$titlePosition = "normal";
$titleSize = 'h4';
if (get_option('_sr_shopgridspaced')) { $spaced = get_option('_sr_shopgridspaced'); }
if (get_option('_sr_shopsinglerelatedwidth')) { $gridWidth = get_option('_sr_shopsinglerelatedwidth'); }
if (get_option('_sr_shopsinglerelatedposition')) { $titlePosition = get_option('_sr_shopsinglerelatedposition'); }
if ($titlePosition == 'left-vertical') { $titleSize = 'h5';  }

$gridClass = 'isotope-grid fitrows mobile-col-'.$columnsMobile.' style-column-'.$columns.' isotope-'.$spaced;
?>
	
	<div class="related products clearfix <?php echo esc_attr($gridWidth); ?>">
		
		<div class="section-title position-<?php echo esc_attr($titlePosition); ?>">
			<<?php echo esc_attr($titleSize); ?>><?php _e( 'Related Products', 'kona' ); ?></<?php echo esc_attr($titleSize); ?>>
		</div>

		<div class="<?php echo esc_attr($gridClass); ?> shop-container">

			<?php while ( $products->have_posts() ) : $products->the_post(); ?>

				<?php include( locate_template( 'woocommerce/content-product.php' ) ); //wc_get_template_part( 'content', 'product' ); ?>

			<?php endwhile; // end of the loop. ?>
            
		</div>
		
	</div>

<?php endif;

wp_reset_postdata();
