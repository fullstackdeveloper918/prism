<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header();

get_template_part('templates/hero/taxonomy');

global $amartha_data_wow_seconds, $amartha_data_wow_delay;

/**
 * Type
 */
$amartha_shop_type = get_theme_mod('shop_type', 'meta-outside');
if ($amartha_shop_type == 'meta-inside') {
	$amartha_products_holder = 'l-posts-wrapper l-posts-wrapper--meta-inside l-woocommerce-wrapper__products-holder l-woocommerce-wrapper__products-holder--meta-inside';
} else {
	$amartha_products_holder = 'l-posts-wrapper l-posts-wrapper--meta-outside l-woocommerce-wrapper__products-holder l-woocommerce-wrapper__products-holder--meta-outside';
}

/**
 * Sidebar
 */
$amartha_row_class = 'row';
$amartha_products_class = 'col-lg-8';
$amartha_sidebar_class = 'col-lg-4';

if (get_theme_mod('shop_sidebar', '2') == '1') {
    $amartha_row_class .= ' flex-row-reverse';
} elseif (get_theme_mod('shop_sidebar', '2') == '3') {
    $amartha_products_class = 'col-12';
    $amartha_sidebar_class = 'h-display-none';
}

/**
 * Animation
 */
$amartha_data_wow_delay = false;
$amartha_data_wow_seconds = 0;

if (get_theme_mod('shop_animation', 'fade-in') == 'fade-in-delay' || get_theme_mod('shop_animation', 'fade-in') == 'fade-in-up-delay') {
    $amartha_data_wow_delay = true;
}

/**
 * Meta
 */
set_query_var('neuron_posts_meta_thumbnail', 'yes');
set_query_var('neuron_posts_meta_title', 'yes');
set_query_var('neuron_posts_meta_price', 'yes');
set_query_var('neuron_posts_meta_results_count', 'yes');
set_query_var('neuron_posts_carousel_height', 'auto');
set_query_var('neuron_posts_style_hover_active', 'no');
set_query_var('neuron_posts_thumbnail_resizer', '');
/**
 * Hover
 */
set_query_var('neuron_posts_style_hover_icon', 'yes');
set_query_var('neuron_posts_style_hover_icon_vertical_alignment', 'left');
set_query_var('neuron_posts_style_hover_icon_horizontal_alignment', 'bottom');
set_query_var('neuron_posts_style_hover_meta_vertical_alignment', 'center');

/**
 * Hover Visibility and Hover Animation
 */
set_query_var('neuron_posts_hover_visibility', 'show');
set_query_var('neuron_posts_hover_animation', 'translate');

amartha_breadcrumbs(get_theme_mod('breadcrumbs_shop_visibility', '1'), get_theme_mod('breadcrumbs_separator'));

do_action('amartha_open_container');
?>
<div class="l-woocommerce-wrapper h-large-top-padding h-large-bottom-padding">
	<div class="<?php echo esc_attr($amartha_row_class) ?>">
		<div class="<?php echo esc_attr($amartha_products_class) ?>">
			<div class="l-woocommerce-wrapper__top-bar h-medium-bottom-padding">
				<div class="row">
					<div class="col-sm-6">
						<?php woocommerce_result_count(); ?>
					</div>
					<div class="col-sm-6">
						<?php woocommerce_catalog_ordering(); ?>
					</div>
				</div>
			</div>
			<div class="<?php echo esc_attr($amartha_products_holder) ?>">
				<div class="row masonry">
					<?php while (have_posts()) : the_post(); ?>
						<?php
						do_action('woocommerce_shop_loop');

						wc_get_template_part('content', 'product');

						$amartha_data_wow_seconds = $amartha_data_wow_seconds + 2;
						$amartha_data_wow_seconds == 12 ? $amartha_data_wow_seconds = 0 : '';
						?>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
       <?php if (get_theme_mod('shop_sidebar', '2') !== '3') : ?>
			<div class="<?php echo esc_attr($amartha_sidebar_class) ?>">
				<div class="o-main-sidebar">
					<?php get_sidebar('shop') ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
<?php
do_action('amartha_close_container');

neuron_pagination();

get_footer();