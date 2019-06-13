<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

$pb_enabled = get_post_meta(get_the_ID(), '_sr_pagebuilder_active', true);
$vc_enabled = "false";
$vc_enabled = get_post_meta(get_the_ID(), '_wpb_vc_js_status', true);

if ( ! empty( $tabs ) ) : ?>

	<div class="woocommerce-tabs wc-tabs-wrapper sr-tabs">
		<ul class="tab-nav clearfix wc-tabs">
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab">
                	<h5 class="tab-name">
					<a href="#tab-<?php echo esc_attr( $key ); ?>">
					<?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
                    </h5>
				</li>
			<?php endforeach; ?>
		</ul>
		<div class="tab-container clearfix">
		<?php foreach ( $tabs as $key => $tab ) : ?>
			<div class="tab-content woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>">
				<?php 
				$wrapper = '';
				if ($key == 'reviews') { $wrapper = 'wrapper-medium'; } else 
				if ($key == 'additional_information' || ($key == 'description' && !$pb_enabled && ($vc_enabled == "false" || !$vc_enabled))) { $wrapper = 'wrapper-small'; } ?>
				<div class="tab-wrapper <?php echo esc_attr($wrapper); ?> ">
				<?php if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } ?>
				</div> <!-- END .tab-wrapper -->
			</div>
		<?php endforeach; ?>
		</div>
	</div>

<?php endif; ?>
