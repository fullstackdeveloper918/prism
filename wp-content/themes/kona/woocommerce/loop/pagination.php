<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
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

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) {
	return;
}

$pagination = get_option('_sr_shopgridpagination');
if (!$pagination) { $pagination = 'pagination'; }
?>

<?php if ($pagination == 'pagination') { ?>
<div id="page-pagination">
<?php echo kona_pagination('shop',esc_html__( 'Previous Page', 'kona' ), esc_html__( 'Next Page', 'kona' ),$wp_query); ?>
</div>
<?php } else if ($pagination == 'loadonclick' || $pagination == 'infiniteload') { ?>
<div class="load-isotope align-center">
    <a 	href="<?php echo esc_url(next_posts( 0, false )); ?>" class="sr-button withicon style-3" 
    	data-method="<?php echo esc_attr($pagination); ?>"
        data-related-grid="main-shop-grid" 
        >
    	<span class="text">
			<span><?php echo esc_html__( 'Load More', 'kona' ); ?></span>
			<span><?php echo esc_html__( 'Load More', 'kona' ); ?></span>
		</span>
		<span class="icon">
			<span class="arrow">
				<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 13.2 9">
				<path d="M13.1,4.4c0-0.2-0.1-0.4-0.2-0.5c0,0,0,0,0,0L9.1,0.2c-0.3-0.3-0.7-0.3-1,0c-0.3,0.3-0.3,0.7,0,1l2.6,2.6H0.7
					c-0.4,0-0.7,0.3-0.7,0.7c0,0.4,0.3,0.7,0.7,0.7h10L8.2,7.8c-0.3,0.3-0.3,0.7,0,1c0.3,0.3,0.7,0.3,1,0L12.9,5c0,0,0,0,0,0
					C13,4.9,13,4.8,13.1,4.8c0,0,0,0,0,0C13.1,4.6,13.1,4.5,13.1,4.4z"/>
				</svg>
			</span>
		</span>    
    </a>
    <span class="load-isotope-icon sr-loader-icon"></span>
    <span class="load-message"><?php echo esc_html__( 'No more items to show', 'kona' ); ?></span>
</div>
<?php } ?>
