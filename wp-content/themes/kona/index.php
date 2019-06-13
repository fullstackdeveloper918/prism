<?php
/*
* Main Blog page
*/

//get global prefix
global $wp_query;
$theId = kona_getId();

//get template header
get_header();

/*************
GET OPTIONS
**************/
$gridWidth = get_option('_sr_bloggridwidth');
$columns = get_option('_sr_bloggridcolumns');
$gridStyle = get_option('_sr_bloggridstyle');
$gridOffset = get_option('_sr_bloggridoffset');
$gridOffsetSize = get_option('_sr_bloggridoffsetsize');
$titlesize = get_option('_sr_bloggridtitlesize');
$gridSpacing = get_option('_sr_bloggridspacing');
$kona_sidebar = get_option('_sr_bloggridsidebar');
$heroType = get_post_meta($theId, '_sr_herobackground', true);

/* Defaults */
if (!$gridSpacing) { $gridSpacing = "spaced-huge"; }
if (!$columns) { $columns = "3"; }
if (!$gridOffset) { $gridOffset = 0; }
if (!$gridOffsetSize) { $gridOffsetSize = "huge"; }

// Conditions for default pages
if ((is_tag() || is_search() || is_archive() || is_tax()) && !is_category()) { $columns = "3"; $gridSpacing = "spaced-big"; $is_default = true; }

$gridTemplate = 'default';
$gridClass = 'isotope-grid style-column-'.$columns.' isotope-'.$gridSpacing;
if ($gridOffset) { $gridClass .= " offset";}
if ($gridOffset == "1") { $gridClass .= "-".$gridOffsetSize; }
if ($gridOffset == "2") { $gridClass .= "-crazy fitrows"; }

// Sidebar
$cPos = ''; 
$sPos = '';
if ($kona_sidebar == 'left') { $cPos = 'right-float'; $sPos = 'left-float'; }
else if ($kona_sidebar == 'right') { $cPos = 'left-float'; $sPos = 'right-float'; }

$wrapper = 'wrapper-medium';
if($gridWidth) { $wrapper = $gridWidth; }
?>
		            
      	<?php
		//** NO POST INFO
		if (!have_posts()) { 
			echo '<div class="wrapper nopost"><h3 class="alttitle">'.esc_html__("No posts has been found!", 'kona').'</h3></div>'; 
			echo '<div class="spacer spacer-big"></div>';
		} else {
		?>
           
            <?php if ($wrapper) { echo '<div class="'.$wrapper.'">'; } ?>
            
            	<?php if ($kona_sidebar == 'left' || $kona_sidebar == 'right') { ?>
                <div class="main-content <?php echo esc_attr($cPos); ?>">
                <?php } ?>
                      
                <div id="blog-grid" class="<?php echo esc_attr($gridClass); ?>">
                    <?php while ( have_posts() ) { the_post(); get_template_part( 'includes/loop', 'blog-'.$gridTemplate); } ?>
                </div>
            	
               	<?php if (kona_pagination('post')) { ?>
                <div id="page-pagination">
                <?php echo kona_pagination('post',esc_html__( 'Previous Page', 'kona' ), esc_html__( 'Next Page', 'kona' )); ?>
                </div>
                <?php } else { ?>
				<div class="spacer-small"></div>
		 		<?php } ?>
                
                <?php if ($kona_sidebar == 'left' || $kona_sidebar == 'right') { ?>
                </div>
                <aside class="sidebar <?php echo esc_attr($sPos); ?>">
                    <?php get_sidebar(); ?>
                </aside>
                <?php } ?>
                
                <?php /*Required for theme check*/ echo '<div style="display:none;">'; the_posts_pagination(); echo '</div>'; ?>
                
        	<?php if ($wrapper) { echo '</div> <!-- END .wrapper -->'; } ?>
            
        <?php } // END else have_post ?>

<?php get_footer(); ?>