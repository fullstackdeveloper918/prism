<?php

function wpsm_ac_pro_front_script() {
    
		//css
		wp_enqueue_style('wpsm_ac_pro-font-awesome-front', wpshopmart_accordion_pro_directory_url.'assets/css/font-awesome/css/font-awesome.min.css');
		wp_enqueue_style('wpsm_ac_pro_bootstrap-front', wpshopmart_accordion_pro_directory_url.'assets/css/bootstrap-front.css');
		wp_enqueue_style('wpsm_ac_pro_animate', wpshopmart_accordion_pro_directory_url.'assets/css/animate.css');
		
		//Js
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'wpsm_ac_pro_bootstrap-js-front', wpshopmart_accordion_pro_directory_url.'assets/js/bootstrap.js', array(), '', true );
		
		//icons
		wp_enqueue_style('wpsm_ac_front_font-icon-picker_all', wpshopmart_accordion_pro_directory_url.'assets/mul-type-icon-picker/icon-picker.css');	
		wp_enqueue_style('wpsm_ac_front_font-icon-picker-glyphicon_style',wpshopmart_accordion_pro_directory_url.'assets/mul-type-icon-picker/picker/glyphicon.css');
		wp_enqueue_style('wpsm_ac_front_font-icon-picker-dashicons_style',wpshopmart_accordion_pro_directory_url.'assets/mul-type-icon-picker/picker/dashicons.css');
		
		//Scrollbar
		wp_enqueue_style('wpsm_ac_pro_scrollbar_style', wpshopmart_accordion_pro_directory_url.'assets/scrollbar/jquery.mCustomScrollbar.css');
		wp_enqueue_script('wpsm_ac_pro_scrollbar_script',wpshopmart_accordion_pro_directory_url.'assets/scrollbar/jquery.mCustomScrollbar.concat.min.js');
}

add_action('wp_enqueue_scripts', 'wpsm_ac_pro_front_script');
add_filter( 'widget_text', 'do_shortcode');

add_action('media_buttons_context', 'wpsm_ac_pro_editor_popup_content_button');
add_action('admin_footer', 'wpsm_ac_pro_editor_popup_content');


function wpsm_ac_pro_editor_popup_content_button($context) {
 $img = wpshopmart_accordion_pro_directory_url.'assets/images/ac-icon.png';
  $container_id = 'AC_PRO';
  $title = 'Select Tabs to insert into post';
  $context .= '<style>.wp_ac_pro_shortcode_button {
				background: #000000 !important;
				border-color: #000000 #000000 #000000 !important;
				-webkit-box-shadow: 0 1px 0 #000000 !important;
				box-shadow: 0 1px 0 #000000 !important;
				color: #fff;
				text-decoration: none;
				text-shadow: 0 -1px 1px #000000 ,1px 0 1px #000000,0 1px 1px #000000,-1px 0 1px #000000 !important;
			    }</style>
			    <a class="button  wp_ac_pro_shortcode_button thickbox" title="Select Accordion to insert into post"    href="#TB_inline?width=400&inlineId='.$container_id.'">
					<span class="wp-media-buttons-icon" style="background: url('.$img.'); background-repeat: no-repeat; background-position: left bottom;"></span>
				Accordion Pro Shortcode
				</a>';
  return $context;
}

function wpsm_ac_pro_editor_popup_content() {
	?>
	<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#wpsm_ac_pro_insert').on('click', function() {
			var id = jQuery('#wpsm_ac_pro_insertselect option:selected').val();
			window.send_to_editor('<p>[AC_PRO id=' + id + ']</p>');
			tb_remove();
		})
	});
	</script>
<style>
.wp_ac_pro_shortcode_button {
    background: #000000; !important;
    border-color: #000000; #000000 #000000 !important;
    -webkit-box-shadow: 0 1px 0 #000000 !important;
    box-shadow: 0 1px 0 #000000 !important;
    color: #fff !important;
	text-decoration: none;
    text-shadow: 0 -1px 1px #000000 ,1px 0 1px #000000,0 1px 1px #000000,-1px 0 1px #000000 !important;
}
</style>
	<div id="AC_PRO" style="display:none;">
	  <h3>Select Accordion To Insert Into Post</h3>
	  <?php 
		
		$all_posts = wp_count_posts( 'wpsm_accordion_pro')->publish;
		$args = array('post_type' => 'wpsm_accordion_pro', 'posts_per_page' =>$all_posts);
		global $All_rac;
		$All_rac = new WP_Query( $args );			
		if( $All_rac->have_posts() ) { ?>	
			<select id="wpsm_ac_pro_insertselect" style="width: 100%;margin-bottom: 20px;">
				<?php
				while ( $All_rac->have_posts() ) : $All_rac->the_post(); ?>
				<?php $title = get_the_title(); ?>
				<option value="<?php echo get_the_ID(); ?>"><?php if (strlen($title) == 0) echo 'No Title Found'; else echo $title;   ?></option>
				<?php
				endwhile; 
				?>
			</select>
			<button class='button primary wp_ac_pro_shortcode_button' id='wpsm_ac_pro_insert'><?php _e('Insert Accordion Shortcode', wpshopmart_accordion_pro_text_domain); ?></button>
			<?php
		} else {
			_e('No Accordion Found', wpshopmart_accordion_pro_text_domain);
		}
		?>
	</div>
	<?php
}

add_action( 'admin_notices', 'wpsm_faq_r_review' );
function wpsm_faq_r_review() {

	// Verify that we can do a check for reviews.
	$review = get_option( 'wpsm_faq_r_review' );
	$time	= time();
	$load	= false;
	if ( ! $review ) {
		$review = array(
			'time' 		=> $time,
			'dismissed' => false
		);
		add_option('wpsm_faq_r_review', $review);
		//$load = true;
	} else {
		// Check if it has been dismissed or not.
		if ( (isset( $review['dismissed'] ) && ! $review['dismissed']) && (isset( $review['time'] ) && (($review['time'] + (DAY_IN_SECONDS * 2)) <= $time)) ) {
			$load = true;
		}
	}
	// If we cannot load, return early.
	if ( ! $load ) {
		return;
	}

	// We have a candidate! Output a review message.
	?>
	<div class="notice notice-info is-dismissible wpsm-faq-r-review-notice">
		<div style="float:left;margin-right:10px;margin-bottom:5px;">
			<img style="width: 80px;height: auto;" src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/images/thumbnail.jpg'; ?>" />
		</div>
		<p style="font-size:18px;">'Hi! We saw you have been using <strong>Accordion FAQ WordPress Plugin</strong> for a few days and wanted to ask for your help to <strong>make the plugin better</strong>.We just need a minute of your time to rate the plugin. Thank you!</p>
		<p style="font-size:18px;"><strong><?php _e( '~ dazzlersoft', '' ); ?></strong></p>
		<p style="font-size:19px;"> 
			<a style="color: #fff;background: #673AB7;padding: 5px 7px 4px 6px;border-radius: 4px;" href="https://themeforest.net/downloads?ref=dazzlersoft#item-20590251" class="wpsm-faq-r-dismiss-review-notice wpsm-faq-r-review-out" target="_blank" rel="noopener">Rate the plugin</a>&nbsp; &nbsp;
			<a style="color: #fff;background: #23282d;padding: 5px 7px 4px 6px;border-radius: 4px;" href="#"  class="wpsm-faq-r-dismiss-review-notice wpsm-rate-later" target="_self" rel="noopener"><?php _e( 'Nope, maybe later', '' ); ?></a>&nbsp; &nbsp;
			<a style="color: #fff;background: #31a3dd;padding: 5px 7px 4px 6px;border-radius: 4px;" href="#" class="wpsm-faq-r-dismiss-review-notice wpsm-rated" target="_self" rel="noopener"><?php _e( 'I already did', '' ); ?></a>
		</p>
	</div>
	<script type="text/javascript">
		jQuery(document).ready( function($) {
			$(document).on('click', '.wpsm-faq-r-dismiss-review-notice, .wpsm-faq-r-dismiss-notice .notice-dismiss', function( event ) {
				if ( $(this).hasClass('wpsm-faq-r-review-out') ) {
					var wpsm_rate_data_val = "1";
				}
				if ( $(this).hasClass('wpsm-rate-later') ) {
					var wpsm_rate_data_val =  "2";
					event.preventDefault();
				}
				if ( $(this).hasClass('wpsm-rated') ) {
					var wpsm_rate_data_val =  "3";
					event.preventDefault();
				}

				$.post( ajaxurl, {
					action: 'wpsm_faq_r_dismiss_review',
					wpsm_rate_data_faq_r : wpsm_rate_data_val
				});
				
				$('.wpsm-faq-r-review-notice').hide();
				//location.reload();
			});
		});
	</script>
	<?php
}

add_action( 'wp_ajax_wpsm_faq_r_dismiss_review', 'wpsm_faq_r_dismiss_review' );
function wpsm_faq_r_dismiss_review() {
	if ( ! $review ) {
		$review = array();
	}
	
	if($_POST['wpsm_rate_data_faq_r']=="1"){
		
		
	}
	if($_POST['wpsm_rate_data_faq_r']=="2"){
		$review['time'] 	 = time();
		$review['dismissed'] = false;
		update_option( 'wpsm_faq_r_review', $review );
	}
	if($_POST['wpsm_rate_data_faq_r']=="3"){
		$review['time'] 	 = time();
		$review['dismissed'] = true;
		update_option( 'wpsm_faq_r_review', $review );
	}
	
	die;
}
?>