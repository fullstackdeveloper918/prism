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
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); 

// Sidebar
$konaSidebar = get_option('_sr_shopgridsidebar');
if (isset($_GET['sidebar'])) { $konaSidebar = $_GET['sidebar']; }
$cPos = ''; 
$sPos = '';
if ($konaSidebar == 'left') { $cPos = 'right-float'; $sPos = 'left-float'; }
else if ($konaSidebar == 'right') { $cPos = 'left-float'; $sPos = 'right-float'; }

// Grid Width
$gridWidth = 'wrapper-medium';
if (get_option('_sr_shopgridwidth')) { $gridWidth = get_option('_sr_shopgridwidth'); }
if (isset($_GET['gridwidth'])) { $gridWidth = $_GET['gridwidth']; }

// Add Shop title (default / category / search)
add_action( 'woocommerce_before_main_content', 'kona_maintitle_start', 19 );
function kona_maintitle_start() {
	if (is_product_category()) {
		global $wp_query;
		$cat = $wp_query->get_queried_object();
		$title = $cat->name;
	} else if (is_search()) {
		$titles = kona_getTitle();
		$title = $titles['title'].' "'.$titles['tax'].'"';
	} else {
		$title = __( 'Shop', 'kona' );
	}
	echo '<div class="woo_main_title"><h3 class="main_title"><strong>' . esc_html($title) . '</strong></h3>';
}
add_action( 'woocommerce_before_main_content', 'kona_maintitle_end', 21 );
function kona_maintitle_end() { 
	echo '</div>';
}

if (is_product_category()) {
	add_action( 'woocommerce_before_main_content', 'kona_catimage', 22 );
	function kona_catimage() { 
		global $wp_query;
		$cat = $wp_query->get_queried_object();
		$titleImage = get_woocommerce_term_meta( $cat->term_id, 'product_cat_titleimage', true );
		if ( $titleImage ) {
			echo '<div class="woo_cat_image"><img src="' . $titleImage . '" alt="' . $cat->name . '" /></div>';
		}
	}
}

if (is_search()) {
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
}
?>

<div class="<?php echo esc_attr($gridWidth); ?>">
   
	<?php if ($konaSidebar == 'left' || $konaSidebar == 'right') { ?>
    <div class="main-content <?php echo esc_attr($cPos); ?>">
    <?php } ?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
		
		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked wc_print_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>
			
			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php do_action( 'woocommerce_no_products_found' ); ?>

		<?php endif; ?>
        
	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

    <?php if ($konaSidebar == 'left' || $konaSidebar == 'right') { ?>
    </div>
    <aside class="sidebar <?php echo esc_attr($sPos); ?>">
        <?php do_action( 'woocommerce_sidebar' ); ?>
    </aside>
    <?php } ?>
    
</div> <!-- END .wrapper -->

<?php get_footer( 'shop' ); ?>
