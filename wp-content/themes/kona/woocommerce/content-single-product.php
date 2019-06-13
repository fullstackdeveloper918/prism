<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

// Product Appearance
$layout = get_post_meta(get_the_ID(), '_sr_productlayout', true);
	if (!$layout || isset($quickView)) { $layout = "classic"; }
	$product = wc_get_product() ;
	if( $product->is_type( 'grouped' )) { $layout = "classic"; }
$bgcolor = get_post_meta(get_the_ID(), '_sr_productcolor', true);
$startanimation = get_post_meta(get_the_ID(), '_sr_productanimation', true);
$prodClass = "product-hero-".get_the_ID()." product-layout-".$layout;
if ($startanimation) { $prodClass .= " start-animation"; }

$colClass = "";
if ($layout == "modern") { $colClass = "col-align-center"; }

if ($bgcolor) {} else { $prodClass .= " no-bg"; }

// move sale badge
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

if ($layout == "modern") {
	// move meta in single
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 21 );
	
	// move share in single
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 22 );
	
	add_action( 'woocommerce_single_product_summary', 'woocommerce_show_product_sale_flash', 4 );
} else {
	add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 21 );
	
	// add breadcrumb
	if (get_option('_sr_shopsinglebreadcrumb') || !get_option('_sr_optiontree')) {
  		add_action( 'woocommerce_single_product_summary', 'woocommerce_breadcrumb', 2 );
	}
}


// Product video
function sr_get_prodVideo() {
	$prodVideo = get_post_meta( get_the_ID() , '_sr_productvideo', true);
	$prodVideoOutput = "";
	if ($prodVideo) {
		if ($prodVideo == 'youtube' && get_post_meta( get_the_ID() , '_sr_productvideo_youtube', true)) {
			$href = '//www.youtube.com/embed/'.get_post_meta( get_the_ID() , '_sr_productvideo_youtube', true).'?autoplay=1'; 
		} else if ($prodVideo == 'vimeo' && get_post_meta( get_the_ID() , '_sr_productvideo_vimeo', true)) {
			$href = '//player.vimeo.com/video/'.get_post_meta( get_the_ID() , '_sr_productvideo_vimeo', true).'?autoplay=1'; 
		} else if ($prodVideo == 'selfhosted' && get_post_meta( get_the_ID() , '_sr_productvideo_mp4', true)) {
			$href = get_post_meta( get_the_ID() , '_sr_productvideo_mp4', true); 
		}

		if (isset($href)) {
			return '<a href="'.esc_url($href).'" class="sr-button withicon style-3 text-trans product-video-button" data-rel="lightcase">
				<span class="icon">
					<i class="fa fa-play"></i>
				</span>
				<span class="text">
					<span>'.esc_html__("Watch Video", 'kona').'</span>
					<span>'.esc_html__("Watch Video", 'kona').'</span>
				</span>
			</a>';
		}
	}
}


// wrap product info
function sr_wrap_product_info_start() { echo '<div class="product-info">'; }
add_action( 'woocommerce_single_product_summary', 'sr_wrap_product_info_start', 1 );
function sr_wrap_product_info_video() { echo sr_get_prodVideo(); }
add_action( 'woocommerce_single_product_summary', 'sr_wrap_product_info_video', 3 );
function sr_wrap_product_info_end() { echo '</div>'; }
add_action( 'woocommerce_single_product_summary', 'sr_wrap_product_info_end', 29 );


// Quick View
if (!isset($quickView)) { $colClass = $colClass.' spaced-huge'; }
else { 
	$colClass = 'spaced-none';
	$colClass .= ' meta-'.get_option('_sr_shopgridquickviewmeta'); 
	$colClass .= ' share-'.get_option('_sr_shopgridquickviewshare'); 
}

?>

<?php

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div id="product-<?php esc_attr(get_the_ID()); ?>" <?php post_class(); # post classes are added via theme-general-features ?>>
	
	<div class="product-hero <?php echo esc_attr($prodClass); ?>" <?php if ($bgcolor) { echo 'style="background-color:'.esc_attr($bgcolor).'"'; } ?>>
		<div class="column-section clearfix <?php echo esc_attr($colClass); ?>">
		
			<div class="column three-fifth">
				<?php
					/**
					 * woocommerce_before_single_product_summary hook.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
				?>
			</div>
			
			<div class="column two-fifth last-col">
				<?php
					/**
					 * woocommerce_single_product_summary hook.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 */
					do_action( 'woocommerce_single_product_summary' );
				?>
			</div>
			
		</div> <!-- END .column-section -->
	</div> <!-- END .product-hero -->
    
       
    <?php
		$fixedAddToCart = get_option('_sr_shopsinglefixedaddtocart');
		if ($fixedAddToCart && !$product->is_type( 'grouped' )) {
	?>   
    <div id="fixed-product-add" class="cart"> 
    	<div class="fixed-product-add-inner">
			<span class="thumbnail"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" width="150" height="150" alt="thumbnail" /></span>
			<h5 class="product-name"><?php echo esc_html(get_the_title()); ?></h5>
			<!-- price + variation + addtocart button copied by js -->
		</div>
	</div>
    <?php } ?>
        
	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>
	
	<div class="spacer-big"></div>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />
	
</div><!-- #product-<?php the_ID(); ?> -->


<?php do_action( 'woocommerce_after_single_product' ); ?>
