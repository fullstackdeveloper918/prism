<?php

class wpsm_accordion_pro {
	private static $instance;
    public static function forge() {
        if (!isset(self::$instance)) {
            $className = __CLASS__;
            self::$instance = new $className;
        }
        return self::$instance;
    }
	
	private function __construct() {
		
		add_action('admin_enqueue_scripts', array(&$this, 'wpsm_accordion_pro_admin_scripts'));
        if (is_admin()) {
			add_action('init', array(&$this, 'Responsive_accordion_pro'), 1);
			add_action('add_meta_boxes', array(&$this, 'wpsm_accordion_pro_meta_boxes_group'));
			add_action('admin_init', array(&$this, 'wpsm_accordion_pro_meta_boxes_group'), 1);
			add_action('save_post', array(&$this, 'add_accordion_pro_meta_box_save'), 9, 1);
			add_action('save_post', array(&$this, 'accordion_pro_settings_meta_box_save'), 9, 1);
		}
    }
	
	// admin scripts
	public function wpsm_accordion_pro_admin_scripts(){
		if(get_post_type()=="wpsm_accordion_pro"){
			require_once('admin-script.php');
		}
	}
	
	public function Responsive_accordion_pro(){
		require_once('reg-cpt.php');
	}
	
	function wpsm_accordion_pro_columns( $columns ){
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'title' => __( 'Accordion' ),
            'shortcode' => __( 'Accordion Pro Shortcode' ),
            'date' => __( 'Date' )
        );
        return $columns;
    }

    function wpsm_accordion_pro_manage_columns( $column, $post_id ){
        global $post;
        switch( $column ) {
          case 'shortcode' :
            echo '<input type="text" value="[AC_PRO id='.$post_id.']" readonly="readonly" />';
            break;
          default :
            break;
        }
    }
	public function wpsm_accordion_pro_meta_boxes_group(){
		add_meta_box('accordion_templates', __('Select Accordion Design', wpshopmart_accordion_pro_text_domain), array(&$this, 'wpsm_ac_pro_design_select_function'), 'wpsm_accordion_pro', 'normal', 'low' );
		add_meta_box('add_acc', __('Add Accordion', wpshopmart_accordion_pro_text_domain), array(&$this, 'wpsm_add_ac_pro_meta_box_function'), 'wpsm_accordion_pro', 'normal', 'low' );
		add_meta_box ('accordion_shortcode_styles', __('Accordion Shortcode', wpshopmart_accordion_pro_text_domain), array(&$this, 'wpsm_pic_ac_pro_shortcode'), 'wpsm_accordion_pro', 'normal', 'low');
		add_meta_box('accordion_rateus', __('Rate Us If You Like This Plugin', wpshopmart_accordion_pro_text_domain), array(&$this, 'wpsm_accordion_pro_rateus_meta_box_function'), 'wpsm_accordion_pro', 'side', 'low');
		add_meta_box('accordion_setting', __('Accordion Settings', wpshopmart_accordion_pro_text_domain), array(&$this, 'wpsm_add_ac_pro_setting_meta_box_function'), 'wpsm_accordion_pro', 'side', 'low');
	}
	
	public function wpsm_ac_pro_design_select_function(){
		require_once('designs.php');
	}
	public function wpsm_add_ac_pro_meta_box_function($post){
		require_once('add-ac.php');
	}
	
	public function wpsm_pic_ac_pro_shortcode(){
		require_once('get-shortcode-plus-css.php');
	}
	
	
	
	public function wpsm_accordion_pro_rateus_meta_box_function(){
		?>
		<style>
		#accordion_rateus{
			background:url(<?php echo wpshopmart_accordion_pro_directory_url.'assets/images/rate-bg.jpg'; ?>)!important;
			}
			#accordion_rateus .hndle , #accordion_rateus .handlediv{
			display:none;
			}
			#accordion_rateus h1{
			color:#fff;
			
			}
			 #accordion_rateus h3 {
			color:#fff;
			font-size:15px;
			}
			#accordion_rateus .button-hero{
			display:block;
			text-align:center;
			margin-bottom:15px;
			}
			.wpsm-rate-us{
			text-align:center;
			}
			.wpsm-rate-us span.dashicons {
				width: 40px;
				height: 40px;
				font-size:20px;
				color : #ffffff !important;
			}
			.wpsm-rate-us span.dashicons-star-filled:before {
				content: "\f155";
				font-size: 40px;
			}
		</style>
		   <h1>Rate Us </h1>
			<h3>Show us some love, If you like our product then please give us some valuable feedback on wordpress</h3>
			<a href="https://wordpress.org/plugins/responsive-accordion-and-collapse/" target="_blank" class="button button-primary button-hero ">RATE HERE</a>
			<a class="wpsm-rate-us" style=" text-decoration: none; height: 40px; width: 40px;" href="https://wordpress.org/plugins/responsive-accordion-and-collapse/" target="_blank">
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
				<span class="dashicons dashicons-star-filled"></span>
			</a>
			<a href="#" title="Go Top" class="wpsm_scrollup"><i class="fa fa-angle-up"></i></a>
			<script>
			/*----------------------------------------------------*/
/*	Scroll To Top Section
/*----------------------------------------------------*/
	jQuery(document).ready(function () {
	
		jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('.wpsm_scrollup').fadeIn();
			} else {
				jQuery('.wpsm_scrollup').fadeOut();
			}
		});
	
		jQuery('.wpsm_scrollup').click(function () {
			jQuery("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});
	
	});	
			</script>
	<?php		
	}
	public function wpsm_add_ac_pro_setting_meta_box_function($post){
		require_once('settings.php');
		
	}
	public function add_accordion_pro_meta_box_save($PostID){
		require_once('data-save/accordion-data-save.php');
		
	}
	public function accordion_pro_settings_meta_box_save($PostID){
		require_once('data-save/setting-save.php');
	}
}	
global $wpsm_accordion_pro;
$wpsm_accordion_pro = wpsm_accordion_pro::forge();

 ?>