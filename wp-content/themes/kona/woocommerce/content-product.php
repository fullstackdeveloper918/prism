<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}


// remove default link open
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
// remove default product thumb
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
// remove rating stars
if (!get_option('_sr_shopgridrating')) { remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 ); }
// remove default link close
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

if (!isset($layoutcustom) || $layoutcustom == 'inherit' && get_option('_sr_optiontree')) {	
	// GET options when not comming from pagebuilder
	$titlesize = get_option('_sr_shopitemtitlesize');
	$showprice = get_option('_sr_shopgridshowprice');
	$showaddtocart = get_option('_sr_shopgridshowaddtocart');
	$showsale = get_option('_sr_shopgridshowsale');	
	$unveil = get_option('_sr_shopgridunveil');	
} 
if (!get_option('_sr_optiontree')) {
	// default settings
	$titlesize = 'h6';
	$showprice = 1;
	$showaddtocart = 1;
	$showvariation = 0;
	$showsale = 1;	
	$unveil = 1;
} else {
	$showvariation = get_option('_sr_shopgridvariations');
}

if (!isset($titlesize)) { $titlesize = 'h6'; }
if (!isset($unveil)) { $unveil = ''; }

// Options for single product pagebuilder
if (!isset($showdesc)) { $showdesc = 0; }
if (!isset($showimage)) { $showimage = 1; }
if (!isset($showviewmore)) { $showviewmore = 0; }

if (!$showprice) { remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 ); }
	else { add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 ); }

if (!$showaddtocart) { remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 ); }
	else { add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 ); }

if (!$showsale) { remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 ); }
	else { add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 ); }

if ($showdesc) { add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_single_excerpt', 20 ); }
	else { remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_single_excerpt', 20 ); }

$itemClass = '';
if ($showvariation) {
	if (get_option('_sr_shopgridvariationscount') == 'all' || !get_option('_sr_shopgridvariationsatt1')) { 
		$itemClass = 'var-'.get_option('_sr_shopgridvariationscount');
	}
	
	if( $product->is_type( 'variable' ) ){
		$variations = $product->get_available_variations();
		if (count($variations[0]['attributes']) > get_option('_sr_shopgridvariationscount')) {
			$itemClass .= " hide-var-button";
		}
	}
}

?>
<div <?php post_class(); # post classes are added via theme-general-features ?>>
	<div class="shop-item-inner item-inner <?php echo esc_attr($unveil); ?> <?php echo esc_attr($itemClass); ?>">
	
		<?php
		/**
		 * woocommerce_before_shop_loop_item hook.
		 */
		do_action( 'woocommerce_before_shop_loop_item' );
		?>
		
		<?php if ($showimage) { ?>
		<div class="product-media item-media">

			<a href="<?php echo esc_url(get_permalink()); ?>" class="thumb-hover scale">
				<?php 
					// variation images
					$hasVarImage = false;		
					if( $product->is_type( 'variable' ) && $showvariation){
						$variations = $product->get_available_variations();
						foreach($variations as $v) {
							$name = ''; foreach ($v['attributes'] as $n) { if ($n) { $name .= $n.' '; } } $name = substr($name, 0, -1);
							
							if ($v['image_id'] && $v['image_id'] !== get_post_thumbnail_id( get_the_ID() )) { 
								$image = wp_get_attachment_image_src( $v['image_id'], 'woocommerce_thumbnail' );
								$imageSrc = wp_get_attachment_image_srcset( $v['image_id'], $size = 'woocommerce_thumbnail');
								echo '<span class="variation-image" data-variation="'.$name.'">
											<img class="var-img lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="'.esc_url($image[0]).'" data-srcset="'.$imageSrc.'" sizes="(max-width: '.esc_attr($image[1]).'px) 100vw, '.esc_attr($image[1]).'px" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_attr(get_the_title($v['image_id'])).'"/>
										</span>';
								$hasVarImage = true;
							}
						}
					}
						
					// hover image
					if (get_post_meta( get_the_ID() , '_sr_producthover', true) && !$hasVarImage) {
						$imageId = kona_get_attachment_id_from_src(get_post_meta( get_the_ID() , '_sr_producthover', true));
						$image = wp_get_attachment_image_src ($imageId,'woocommerce_thumbnail');
						$imageSrc = wp_get_attachment_image_srcset( $imageId, $size = 'woocommerce_thumbnail');
						echo '<span class="hover-image">';
						if ($image[0]) { echo '<img class="hover lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="'.esc_url($image[0]).'" data-srcset="'.$imageSrc.'" sizes="(max-width: '.esc_attr($image[1]).'px) 100vw, '.esc_attr($image[1]).'px" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_attr(get_the_title($imageId)).'"/>'; }
						else { echo '<img class="hover lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="'.esc_url(get_post_meta( get_the_ID() , '_sr_producthover', true)).'" alt="'.esc_attr(get_the_title($imageId)).'"/>'; }
						echo '</span>'; 
					}
				?>
				<?php echo woocommerce_get_product_thumbnail(); ?>
			</a>
			
			

			<?php
			/**
			 * woocommerce_after_shop_loop_item hook.
			 *
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			if ( ! $product->is_in_stock() ) { echo '<p class="stock out-of-stock">'.esc_html__('Out of stock', 'kona' ).'</p>'; } 
			else { do_action( 'woocommerce_after_shop_loop_item' ); }
			?>
			
			<?php if (get_option('_sr_shopgridquickview')) { ?>
			<a href="<?php echo esc_url(get_permalink()); ?>" class="open-quick-view" data-productid="<?php echo esc_attr(get_the_ID()); ?>">
				<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 19.2 19.2">
				<path d="M18.8,17.3l-4.6-4.6c1-1.3,1.6-3,1.6-4.7c0-4.3-3.5-7.8-7.8-7.8c-4.8,0-8.6,4.4-7.6,9.3c0.6,3,3,5.5,6.1,6.1 c2.4,0.5,4.6-0.2,6.3-1.5l4.6,4.6c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3C19.2,18.3,19.2,17.7,18.8,17.3z M2.3,8 c0-3.1,2.6-5.7,5.7-5.7c3.5,0,6.3,3.2,5.6,6.9c-0.5,2.1-2.2,3.9-4.3,4.3C5.6,14.3,2.3,11.5,2.3,8z"/>
				</svg>
				<span class="sr-loader-icon"></span>
			</a>
			<?php } ?>

			
		</div>
		<?php } ?>
		

		<?php
		/**
		 * woocommerce_before_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item_title' );
		
		if( $product->is_type( 'variable' ) && $showvariation) {
			do_action( 'woocommerce_' . $product->get_type() . '_add_to_cart' );
		}
		?>
		
		

		<div class="product-meta">	
		<?php echo '<h5 class="product-name '.esc_attr($titlesize).' "><a href="'.get_the_permalink().'">'.get_the_title().'</a></h5>'; ?>

		<?php
		/**
		 * woocommerce_after_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' );
		?>
				
		<?php if ($showviewmore) { ?>
		<p class="view-more">
			<a href="<?php echo get_the_permalink(); ?>" class="sr-button withicon text-trans style-3" target="_self">
				<span class="icon">
					<span class="arrow">
						<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 13.2 9">
						<path d="M13.1,4.4c0-0.2-0.1-0.4-0.2-0.5c0,0,0,0,0,0L9.1,0.2c-0.3-0.3-0.7-0.3-1,0c-0.3,0.3-0.3,0.7,0,1l2.6,2.6H0.7
							c-0.4,0-0.7,0.3-0.7,0.7c0,0.4,0.3,0.7,0.7,0.7h10L8.2,7.8c-0.3,0.3-0.3,0.7,0,1c0.3,0.3,0.7,0.3,1,0L12.9,5c0,0,0,0,0,0
							C13,4.9,13,4.8,13.1,4.8c0,0,0,0,0,0C13.1,4.6,13.1,4.5,13.1,4.4z"/>
						</svg>
					</span>
				</span>
				<span class="text">
					<span><?php echo esc_html__("View Product", 'kona') ?></span>
					<span><?php echo esc_html__("View Product", 'kona') ?></span>
				</span>
			</a>
		</p>
		<?php } ?>
			
		</div>
    
	</div>
</div> <!-- END .shop-item -->
