<?php 


/*-----------------------------------------------------------------------------------

	Theme Setup

-----------------------------------------------------------------------------------*/
$kona_version = '2.2'; 


/*-----------------------------------------------------------------------------------*/
/*	Set Max Content Width
/*-----------------------------------------------------------------------------------*/
if( ! isset( $content_width ) ) $content_width = 1200;




/*-----------------------------------------------------------------------------------*/
/*	Setup theme defaults
/*-----------------------------------------------------------------------------------*/
function kona_theme_setup() {
	
	/* Load Text Domain */
	load_theme_textdomain('kona', get_template_directory(). '/languages');

	/* Theme Supports */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background' );
 	add_theme_support( 'title-tag' );
	
	/* Theme images sizes */
	add_image_size( 'kona-thumb-mini', 160);
	add_image_size( 'kona-thumb-small', 220);
		
	add_image_size( 'kona-thumb-medium', 640);
	add_image_size( 'kona-thumb-medium-crop', 640, 400, true );
	
	add_image_size( 'kona-thumb-default', 960);
	add_image_size( 'kona-thumb-default-crop', 960, 600, true );
	
	add_image_size( 'kona-thumb-big', 1280);
	add_image_size( 'kona-thumb-big-crop', 1280, 800, true );
	
	add_image_size( 'kona-thumb-ultra', 1680);

	/* Post Formats */
	add_theme_support('post-formats', array('image','gallery','video','audio'));
	
	/* Add Menus */
	add_action('init', 'kona_register_menu');

}
add_action( 'after_setup_theme', 'kona_theme_setup' );




/*-----------------------------------------------------------------------------------*/
/*	Register Custom Menus 
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_register_menu' ) ) {
    function kona_register_menu() {
		register_nav_menus(
			array(
				'primary-menu' => esc_html__('Primary Menu', 'kona' )
			)
		);	
    }
}



/*-----------------------------------------------------------------------------------*/
/*	Register and Enqueue front-end scripts
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_enqueue_scripts' ) ) {
    function kona_enqueue_scripts() {
		global $kona_version;

		// Enqueue scripts
    	wp_enqueue_script('visible', get_template_directory_uri() . '/files/js/jquery.visible.min.js', array('jquery'), '1.0', true);
    	wp_enqueue_script('unveil', get_template_directory_uri() . '/files/js/jquery.unveil.min.js', array('jquery'), '2.0', true);
    	wp_enqueue_script('easing', get_template_directory_uri() . '/files/js/jquery.easing.min.js', array('jquery'), '1.3', true);
    	wp_enqueue_script('tweenmax', get_template_directory_uri() . '/files/js/tweenMax.js', array('jquery'), '1.16.1', true);
		wp_enqueue_script('imagesloaded');  	# pre-packaged with WordPress core
		wp_enqueue_script('isotope', get_template_directory_uri() . '/files/js/jquery.isotope.min.js', array('jquery'), '3.0.6', true);
    	wp_enqueue_script('fitvids', get_template_directory_uri() . '/files/js/jquery.fitvids.min.js', array('jquery'), '1.0', true);
    	wp_enqueue_script('lightcase', get_template_directory_uri() . '/files/js/jquery.lightcase.min.js', array('jquery'), '1.4.5', true);
    	wp_enqueue_script('flickity', get_template_directory_uri() . '/files/js/jquery.flickity.js', array('jquery'), '2.0.11', true);
    	wp_enqueue_script('zoom', get_template_directory_uri() . '/files/js/jquery.zoom.min.js', array('jquery'), '1.7.21', true);
		wp_enqueue_script('comment-reply'); 	# pre-packaged with WordPress core
		
			// Enqueue scripts dependencies
			$theId = kona_getId();
			$heroType = get_post_meta($theId, '_sr_herobackground', true);
			$content = ""; if ($theId) { $content_post = get_post($theId); $content = $content_post->post_content; }
			
			# phatvideo
			if (	
				($heroType == 'selfhosted' || $heroType == 'youtube' || $heroType == 'vimeo') ||
				(stripos($content,'background="vimeo"') || stripos($content,'background="youtube"') || stripos($content,'background="selfhosted"')) ||
				(stripos($content,'sr-portfolioitems'))
			   ) { wp_enqueue_script('phatvideo', get_template_directory_uri() . '/files/js/jquery.min.phatvideobg.js', array('jquery'), '1.0', true); }

			# bgparallax
			if (	
				($heroType == 'image' || get_post_meta($theId, '_sr_image_type', true) == 'parallax') ||
				(stripos($content,'background="image"') && stripos($content,'imagetype="parallax"'))
			   ) { wp_enqueue_script('bgparallax', get_template_directory_uri() . '/files/js/jquery.backgroundparallax.min.js', array('jquery'), '2.3', true); }
		
		
		// add variables to script
		$settings_vars = array('ajaxurl' => admin_url('admin-ajax.php'));
		// add current lang for ajax requests
		if (function_exists('icl_object_id')) { 
			global $sitepress;
			if ($sitepress) { $settings_vars["wpml"] = $sitepress->get_current_language(); }
			else if (pll_current_language()) { $settings_vars["pll"] = pll_current_language(); }
		}
		
		// register is needed to be able to write the srvars
		wp_register_script('kona-script', get_template_directory_uri() . '/files/js/script.js', array('jquery'), $kona_version, true);
		wp_localize_script( 'kona-script', 'srvars', $settings_vars );
    	wp_enqueue_script('kona-script');
		
		// Enqueue styles
		wp_enqueue_style('kona-default-style', get_template_directory_uri() . '/files/css/style.css', 'default-style', $kona_version);
		wp_enqueue_style('lightcase', get_template_directory_uri() . '/files/css/lightcase.css', 'lightcase-style', '1.0');
		wp_enqueue_style('fontawesome', get_template_directory_uri() . '/files/css/font-awesome.min.css', 'fontawesome-style', '3.2.1');
		wp_enqueue_style('ionicons', get_template_directory_uri() . '/files/css/ionicons.css', 'ionicons-style', '3.2.1');
		wp_enqueue_style('isotope', get_template_directory_uri() . '/files/css/isotope.css', 'isotope-style', '2.2');
		wp_enqueue_style('flickity', get_template_directory_uri() . '/files/css/flickity.css', 'flickity-style', '2.0.11');
		
		// include custom woocommerce style if woocommerce is activated
		if (class_exists('Woocommerce')) {
			wp_enqueue_style('kona-woo-style', get_template_directory_uri() . '/woocommerce/files/css/woocommerce-kona.css', 'woo-style', $kona_version);
			wp_enqueue_script('kona-woo-js', get_template_directory_uri() . '/woocommerce/files/js/woocommerce-kona.js', 'jquery', $kona_version, true);  
		}
		
		if (get_option('_sr_appearance') == 'dark') { 
			wp_enqueue_style('kona-dark-style', get_template_directory_uri() . '/files/css/dark-style.css', 'dark-style', $kona_version);
			if (class_exists('Woocommerce')) {
			wp_enqueue_style('kona-woo-dark', get_template_directory_uri() . '/woocommerce/files/css/woocommerce-kona-dark.css', 'woo-style', $kona_version);
			}
		}
		
		wp_enqueue_style('kona-wp-style', get_stylesheet_uri() , 'theme-style', $kona_version);
		wp_enqueue_style('kona-mqueries-style', get_template_directory_uri() . '/files/css/mqueries.css', 'mqueries-style', $kona_version);
				
		// add custom css comming from individual settings/options
		$customCss = kona_custom_style_logo().kona_custom_style_typography().kona_custom_style_color();
		wp_add_inline_style( 'kona-wp-style', $customCss );
				    	
    }
}
add_action('wp_enqueue_scripts', 'kona_enqueue_scripts', 5);



/*-----------------------------------------------------------------------------------*/
/*	Include Theme Admin
/*-----------------------------------------------------------------------------------*/
// Adding Theme Admin
require_once( get_template_directory() . "/theme-admin/theme-admin.php");

// Adding WooComemrce Support
if (class_exists('Woocommerce')) { require_once( get_template_directory() . "/woocommerce/woo-config.php"); }



/*-----------------------------------------------------------------------------------*/
/*	Plugin Activation
/*-----------------------------------------------------------------------------------*/
require_once( get_template_directory() . '/plugin-activation/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'kona_plugin_activation' );
function kona_plugin_activation() {
	
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'     				=> esc_html__('Kona Core', 'kona' ), // The plugin name
			'slug'     				=> 'kona-core', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory_uri() . '/plugin-activation/plugins/kona-core.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '2.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('Revolution Slider', 'kona' ), // The plugin name
			'slug'     				=> 'revslider', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory_uri() . '/plugin-activation/plugins/revslider.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '5.4.8.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> esc_html__('Product Size Guide ', 'kona' ), // The plugin name
			'slug'     				=> 'ct-size-guide', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory_uri() . '/plugin-activation/plugins/ct-size-guide.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'      => esc_html__('Contact Form 7', 'kona' ),
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('WooCommerce', 'kona' ),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('WooCommerce Variation Swatches', 'kona' ),
			'slug'      => 'woo-variation-swatches',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('WC Ajax Product Filter', 'kona' ),
			'slug'      => 'wc-ajax-product-filter',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('Cookie Notice', 'kona' ),
			'slug'      => 'cookie-notice',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('Widget Importer Exporter', 'kona' ),
			'slug'      => 'widget-importer-exporter',
			'required'  => false,
		),
		array(
			'name'      => esc_html__('WooCommerce Wishlist', 'kona' ),
			'slug'      => 'ti-woocommerce-wishlist',
			'required'  => false,
		)
	);
	
	
	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> 'kona',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_slug' 		=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> true,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> esc_html__( 'Install Required Plugins', 'kona' ),
			'menu_title'                       			=> esc_html__( 'Install Plugins', 'kona' ),
			'installing'                       			=> esc_html__( 'Installing Plugin: %s', 'kona' ), // %1$s = plugin name
			'oops'                             			=> esc_html__( 'Something went wrong with the plugin API.', 'kona' ),
			'return'                           			=> esc_html__( 'Return to Required Plugins Installer', 'kona' ),
			'plugin_activated'                 			=> esc_html__( 'Plugin activated successfully.', 'kona' ),
			'complete' 									=> esc_html__( 'All plugins installed and activated successfully. %s', 'kona' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}



/*-----------------------------------------------------------------------------------*/
/*	Custom row width for visual composer  
/*-----------------------------------------------------------------------------------*/
function kona_vc_row_mini_width()  {
	$param = WPBMap::getParam( 'vc_row', 'full_width' );
	$param['weight'] = 2;
	$param['value'][ __('Mini (420px)', 'kona').' (Kona)' ] = 'sr-vc-mini-width';
	vc_update_shortcode_param( 'vc_row', $param );
}
add_action( 'vc_after_init', 'kona_vc_row_mini_width' );

function kona_vc_row_small_width()  {
	$param = WPBMap::getParam( 'vc_row', 'full_width' );
	$param['weight'] = 2;
	$param['value'][ __('Small (780px)', 'kona').' (Kona)' ] = 'sr-vc-small-width';
	vc_update_shortcode_param( 'vc_row', $param );
}
add_action( 'vc_after_init', 'kona_vc_row_small_width' );

function kona_vc_row_medium_width()  {
	$param = WPBMap::getParam( 'vc_row', 'full_width' );
	$param['weight'] = 2;
	$param['value'][ __('Medium (1140px)', 'kona').' (Kona)' ] = 'sr-vc-medium-width';
	vc_update_shortcode_param( 'vc_row', $param );
}
add_action( 'vc_after_init', 'kona_vc_row_medium_width' );



/*-----------------------------------------------------------------------------------*/
/*	NEEDED SCRIPTS
/*-----------------------------------------------------------------------------------*/
function kona_theme_scripts() {
	    wp_enqueue_style('wp-color-picker');
	    wp_enqueue_script('wp-color-picker');
}
add_action('admin_enqueue_scripts', 'kona_theme_scripts');


?>