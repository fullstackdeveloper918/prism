<?php
/*-----------------------------------------------------------------------------------

	PORTFOLIO SINGLE PAGE
	
-----------------------------------------------------------------------------------*/

$theId = kona_getId();

//get template header
get_header();

if (have_posts()) : while (have_posts()) : the_post();

// General Options
$kona_pagination = get_option('_sr_portfoliopagination');
$comments = get_option('_sr_portfoliocomments');
$content_post = get_post($theId); $content = $content_post->post_content;

// pagebuilder activated or not
$pb_enabled = get_post_meta($theId, '_sr_pagebuilder_active', true);
$vc_enabled = "false";
$vc_enabled = get_post_meta($theId, '_wpb_vc_js_status', true);
?>
		<!-- SINGLE PORTFOLIO -->
		<div id="portfolio-single" class="single-portfolio">
        	<?php if (!$pb_enabled && ($vc_enabled == "false" || !$vc_enabled)) { ?><div class="wrapper-medium"><?php } ?>
        	<?php the_content(); ?>
			<?php if (!$pb_enabled && ($vc_enabled == "false" || !$vc_enabled)) { ?><div class="clear"></div></div><?php } ?>
		</div>
		<!-- SINGLE PORTFOLIO -->
       
       	<?php if ( get_option('_sr_portfolioshare') && !stripos($content,'[kona-share') ) { ?>
		<div class="spacer-medium"></div>
		<div class="wrapper-medium">
			<?php echo kona_Share(get_post_type(),esc_html__( 'Share', 'kona' ),''); ?>
		</div>
		<?php } ?>
        
        <?php if (get_option('_sr_portfoliocomments')  && get_option('_sr_portfoliocommentspos') == "content" && comments_open() && !post_password_required()) {echo '<div class="wrapper-small">';comments_template('',true);echo '</div>';}?>
                 
		<?php if ($kona_pagination) {
			echo '<div class="wrapper-medium">';
            kona_singlepagination(get_post_type(),'single-pagination','portfolio-pagination ',esc_html__( 'Prev', 'kona' ),esc_html__( 'Next', 'kona' ), '', $kona_pagination);
			echo '</div>';
        } ?>
		
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>