<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$titlesize = get_option('_sr_shopitemtitlesize');
if (!get_option('_sr_optiontree') || !isset($titlesize)) { $titlesize = 'h6'; }
?>
<div <?php wc_product_cat_class( 'isotope-item shop-item', $category ); ?>>
	<?php
	/**
	 * woocommerce_before_subcategory hook.
	 *
	 * @hooked woocommerce_template_loop_category_link_open - 10
	 */
	//do_action( 'woocommerce_before_subcategory', $category );
	?>
	
	<div class="product-media">
		<a href="<?php echo esc_url(get_term_link($category->slug, 'product_cat')); ?>" class="thumb-hover scale">
			<?php
			/**
			 * woocommerce_before_subcategory_title hook.
			 *
			 * @hooked woocommerce_subcategory_thumbnail - 10
			 */
			do_action( 'woocommerce_before_subcategory_title', $category );
			?>
		</a>
	</div>

	<div class="product-meta">	
		<h5 class="product-name <?php echo esc_attr($titlesize); ?>"><a href="<?php echo esc_url(get_term_link($category->slug, 'product_cat')); ?>"><?php echo esc_html($category->name); ?></a></h5>
	</div>
		
	<?php
	/**
	 * woocommerce_after_subcategory_title hook.
	 */
	do_action( 'woocommerce_after_subcategory_title', $category );

	/**
	 * woocommerce_after_subcategory hook.
	 *
	 * @hooked woocommerce_template_loop_category_link_close - 10
	 */
	//do_action( 'woocommerce_after_subcategory', $category ); ?>
		
</div>
