<?php 

$theId = kona_getId();

/* FOOTER SETTINGS */
$hideFooter = false;
if(get_option('_sr_footershow') == 'no') { $hideFooter = true; }

// individual footer settings 
if(get_post_meta($theId, '_sr_footersettings', true) !== 'inherit') {
	$hideFooter = false;
	if (get_post_meta($theId, '_sr_footershow', true) == 'no') { $hideFooter = true; }
}

$footerCols = array("one-fourth","one-fourth","one-fourth","one-fourth");
if( get_option('_sr_footerlayout') ) { $footerCols = explode(";",get_option('_sr_footerlayout')); }
$footerEmpty = true;
$i = 1;	
foreach	($footerCols as $c) {
	if ($i == 1 && is_active_sidebar( 'footer-1st' ) ) { $footerEmpty = false; } else
	if ($i == 2 && is_active_sidebar( 'footer-2nd' ) ) { $footerEmpty = false; } else
	if ($i == 3 && is_active_sidebar( 'footer-3rd' ) ) { $footerEmpty = false; } else
	if ($i == 4 && is_active_sidebar( 'footer-4th' ) ) { $footerEmpty = false; }
	$i++;
}
if ($footerEmpty) { $hideFooter = true; }
/* FOOTER SETTINGS */
?>
    
		</div>
		<!-- PAGEBODY -->
		
	</div>   
	<!-- HERO & BODY -->
             
	<?php if (!$hideFooter) { ?>
    <!-- FOOTER -->  
    <footer id="footer" >
       	<div class="footer-inner wrapper"> 
            <div class="column-section spaced-big clearfix">
            	<?php
				$i = 1;	
				foreach	($footerCols as $c) {
					echo '<div class="column '.$c.'';
					if ($i == count($footerCols)) { echo ' last-col'; }
					echo '">';
					if ($i == 1 && is_active_sidebar( 'footer-1st' ) ) { dynamic_sidebar( 'footer-1st' ); } else
					if ($i == 2 && is_active_sidebar( 'footer-2nd' ) ) { dynamic_sidebar( 'footer-2nd' ); } else
					if ($i == 3 && is_active_sidebar( 'footer-3rd' ) ) { dynamic_sidebar( 'footer-3rd' ); } else
					if ($i == 4 && is_active_sidebar( 'footer-4th' ) ) { dynamic_sidebar( 'footer-4th' ); }
					echo '</div>';
					$i++;
				}
				?>
            </div>
            
            <?php if (get_option('_sr_footerbottom') || get_option('_sr_footercopyright')) { ?>
			<div class="footer-bottom">
				<?php echo wp_kses_post(do_shortcode(stripslashes(get_option('_sr_footerbottom')))); ?>
				<?php echo wp_kses_post(do_shortcode(stripslashes('<div class="copyright">'.get_option('_sr_footercopyright').'</div>'))); ?>
			</div>
			<?php } // END if copyright text exist ?>
        </div> 
        
        <?php if (get_option('_sr_backtotop')) { ?>
        <a id="backtotop" class="totop" href="#">
			<span class="arrow">
				<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 13.2 9">
				<path d="M13.1,4.4c0-0.2-0.1-0.4-0.2-0.5c0,0,0,0,0,0L9.1,0.2c-0.3-0.3-0.7-0.3-1,0c-0.3,0.3-0.3,0.7,0,1l2.6,2.6H0.7
					c-0.4,0-0.7,0.3-0.7,0.7c0,0.4,0.3,0.7,0.7,0.7h10L8.2,7.8c-0.3,0.3-0.3,0.7,0,1c0.3,0.3,0.7,0.3,1,0L12.9,5c0,0,0,0,0,0
					C13,4.9,13,4.8,13.1,4.8c0,0,0,0,0,0C13.1,4.6,13.1,4.5,13.1,4.4z"/>
				</svg>
			</span>
		</a>       
   		<?php } ?>
    </footer>
    <!-- FOOTER --> 
    <?php } ?>
	
	<?php if (get_option('_sr_shopgridquickview')) { ?>
    <!-- QUICK VIEW --> 
	<div id="quick-view">
		<span class="pseudo-close"></span>
		<div class="quick-view-inner">
			<a href="#" class="quick-view-close close-icon">
				<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 8.8 8.9">
				<path d="M8.3,3.8H5.2V0.7C5.2,0.3,4.8,0,4.5,0h0C4.1,0,3.8,0.3,3.8,0.7v3.1H0.7C0.3,3.8,0,4.1,0,4.5v0
					c0,0.4,0.3,0.7,0.7,0.7h3.1v3.1c0,0.4,0.3,0.7,0.7,0.7h0c0.4,0,0.7-0.3,0.7-0.7V5.2h3.1c0.4,0,0.7-0.3,0.7-0.7v0
					C8.9,4.1,8.6,3.8,8.3,3.8z"/>
				</svg>
			</a>
			
			<div class="quick-product product single-product">
				<div class="product-hero product-layout-classic no-bg">
				</div>
			</div>
		</div>
	</div>
    <!-- QUICK VIEW --> 
	<?php } ?>
    
</div> <!-- END #page-content -->
<!-- PAGE CONTENT -->

<?php wp_footer(); ?>

</body>
</html>