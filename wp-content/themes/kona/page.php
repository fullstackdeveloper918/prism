<?php
/*
* Main Page (Default Template)
*/

//get global prefix
$theId = kona_getId();

//get template header
get_header();

if (have_posts()) : while (have_posts()) : the_post();

// pagebuilder activated or not
$pb_enabled = get_post_meta($theId, '_sr_pagebuilder_active', true);
$vc_enabled = "false";
$vc_enabled = get_post_meta($theId, '_wpb_vc_js_status', true);
?>

<?php if (get_the_content() != '') {  ?>
        <?php if (!$pb_enabled && ($vc_enabled == "false" || !$vc_enabled)) { ?><div class="wrapper-medium"><?php } ?>
		<?php the_content(); ?>
		<?php if (!$pb_enabled && ($vc_enabled == "false" || !$vc_enabled)) { ?>
		<div class="clear"></div>
      	<?php 
			$pagesDefault = array(
				'before'           => '<div class="content-pagination"><span class="h6 widget-title title-alt">' . __( 'Pages:', 'kona' ).'</span><span class="pages">',
				'after'            => '</div>',
			);																 
			wp_link_pages($pagesDefault); 
		?>
       	</div>
       	<?php } ?>
        
        <?php if (!get_post_meta($theId, '_sr_pagebuilder_active', true) && !get_post_meta($theId, '_wpb_vc_js_status', true)) { ?>
        <div class="spacer-big"></div> 
		<?php } ?>
<?php } // End if content ?>

<?php if (comments_open() && !post_password_required() ) { ?><div class="post-comments wrapper-medium"><?php comments_template( '', true );?></div><div class="spacer-big"></div><?php } ?>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>