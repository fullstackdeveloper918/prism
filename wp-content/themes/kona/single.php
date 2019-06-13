<?php

//get global prefix
$theId = kona_getId();

//get template header
get_header();

if (have_posts()) : while (have_posts()) : the_post();
$format = get_post_format(); if( false === $format ) { $format = 'standard'; }

/*************
GET OPTIONS
**************/
$kona_pagination = get_option('_sr_blogpostpagination');
if (!$kona_pagination) { $kona_pagination = 1; } 
$kona_share = get_option('_sr_blogpostshare');
$heroType = get_post_meta($theId, '_sr_herobackground', true);

// Sidebar
$kona_sidebar = get_option('_sr_blogpostsidebar');
$cPos = ''; 
$sPos = '';
$wrapper = 'wrapper-small';
if ($kona_sidebar == 'left') { $cPos = 'right-float'; $sPos = 'left-float'; $wrapper = ''; }
else if ($kona_sidebar == 'right') { $cPos = 'left-float'; $sPos = 'right-float'; $wrapper = ''; }

?>
		
		<?php
		$heroType = get_post_meta($theId, '_sr_herobackground', true);
		if (is_tag() || is_search() || is_archive() || is_tax() || is_category() || !$heroType) { $heroType = 'default'; }
		if ($heroType !== 'default') { ?>
			<div class="spacer-medium"></div>
		<?php } ?>
       
        <?php if ($kona_sidebar == 'left' || $kona_sidebar == 'right') { ?>
        <div class="wrapper-medium">
        <div class="main-content <?php echo esc_attr($cPos); ?>">
		<?php } ?>
        
        <div id="blog-single" <?php post_class(); ?>>
           	    	
			<?php if ($format) { get_template_part( 'includes/post-type', $format ); } ?> 
            
			<div class="blog-content <?php echo esc_attr($wrapper); ?>">
				<?php the_content(); ?>
				<div class="clear"></div>
				<?php
				$pagesDefault = array(
					'before'           => '<div class="content-pagination"><span class="h6 widget-title title-alt">' . __( 'Pages:', 'kona' ).'</span><span class="pages">',
					'after'            => '</span></div>',
				);																 
				wp_link_pages($pagesDefault); 
				?>
				
				<?php if (kona_getBlogTags() && (get_option('_sr_blogposttags') || !get_option('_sr_optiontree'))) { ?>
				<div class="spacer-small"></div>
					<h6 class="widget-title title-alt">Tags</h6>
					<?php echo kona_getBlogTags(); ?>
				<?php } ?>
								
			</div> <!-- END .blog-content -->
            
			<?php 
				if ($kona_pagination) { 
					$prevtext = esc_html__( 'Previous Post', 'kona' ); $nexttext = esc_html__( 'Next Post', 'kona' );
					kona_singlepagination(get_post_type(),'single-pagination','blog-pagination '.$wrapper,$prevtext,$nexttext,'',$kona_pagination);
				}
			?>
            
            <?php if (((get_option('_sr_blogcomments') || !get_option('_sr_optiontree')) && comments_open() && !post_password_required()) || get_comments_number()) { ?>             
           	<div id="blog-comments" class="post-comments <?php echo esc_attr($wrapper); ?>">
                <?php comments_template( '', true ); ?>
			</div>     
            <?php } ?>
		                          
			<div class="spacer-big single-bottom"></div>          
			                          
		</div>
        
        
        <?php if ($kona_sidebar == 'left' || $kona_sidebar == 'right') { ?>
        	</div>
            
            <aside class="sidebar <?php echo esc_attr($sPos); ?>">
            	<?php get_sidebar(); ?>
            </aside>
            
        </div> <!-- END .wrapper -->
		<?php } ?>
        
<?php endwhile; endif; ?>
<?php get_footer(); ?>