<?php
/**
 * Search Page
 */

get_header(); ?>

<div class="wrapper-medium">
	
	<?php
    //** QUERY IF SEARCH
	if (get_query_var('s')) {
		$query = new WP_Query(array(
			'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 ),
			's' => get_query_var('s')
		));
		
	} 

	//** NO POST INFO
	if (!have_posts()) { ?>
	
	<div class="notfound">
		<div class="notfound-icon"></div>
		<div class="spacer-small"></div>
		<p class="h3 ooops"><strong><?php esc_html_e("Ooops","kona"); ?>.</strong></p>
		<p class="h5 title-alt"><?php _e( 'Sorry, but nothing matched your search terms.', 'kona' ); ?></p>
		<div class="spacer-big"></div>
		<div class="spacer-small"></div>
	</div>
	
	<?php	
	} else {
	?>

	<div id="blog-grid" class="isotope-grid style-column-3 isotope-spaced-big">
		<?php while ( have_posts() ) { the_post(); get_template_part( 'includes/loop', 'search'); } ?>
	</div> <!-- END #blog-entries -->

	<?php if ($query->max_num_pages > 1) { ?>
		<div id="page-pagination">
		<?php echo kona_pagination('post',esc_html__( 'Previous Page', 'kona' ), esc_html__( 'Next Page', 'kona' )); ?>
		</div>  
	<?php } else { ?>
	<div class="spacer-medium"></div>
	<?php } ?>

	<?php } // END else have_post ?>

</div><!-- .wrapper-medium -->

<?php get_footer();
