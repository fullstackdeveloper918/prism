<?php
/**
 * Theme Functions
 *
 * @package amartha
 * @author NeuronThemes
 * @link http://neuronthemes.com
 */

/**
 * Global Variables
 * 
 * Defining global variables to make
 * usage easier.
 */
define('AMARTHA_THEME_DIR', get_template_directory());
define('AMARTHA_THEME_URI', get_template_directory_uri());
define('AMARTHA_THEME_STYLESHEET', get_stylesheet_uri());
define('AMARTHA_THEME_PLACEHOLDER', get_template_directory_uri() . '/assets/images/placeholder.png');
define('AMARTHA_THEME_NAME', 'amartha');
define('AMARTHA_THEME_VERSION', '1.0.0');

/**
 * Content Width
 * 
 * Maximum content width is set at 1920,
 * larger images or videos will be cropped
 * to that resolution.
 */
!isset($content_width) ? $content_width = 1920 : '';

/**
 * Text Domain
 * 
 * Makes theme available for translation,
 * translations can be found in the /languages/ directory.
 */
load_theme_textdomain('amartha', AMARTHA_THEME_DIR . '/languages');

// Action to call init
add_action('after_setup_theme', 'amartha_init');

/**
 * Init
 * 
 * Global function which adds theme support,
 * register nav menus and call actions for
 * different php, js and css files.
 */
function amartha_init() {
    // Theme Support
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');

	/**
	 * WooCommerce Theme Support
	 * 
	 * Theme fully supports plugin WooCommerce
	 * also it's features in single product
	 * as zoom, lightbox and slider.
	 */
	if (class_exists('WooCommerce')) {
		add_theme_support('woocommerce');
		add_theme_support('wc-product-gallery-zoom');
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-slider');
	}

	// Image Sizes
	$amartha_general_image_sizes = get_theme_mod('general_image_sizes');
	if ($amartha_general_image_sizes) {
		$index = 1;
		foreach ($amartha_general_image_sizes as $image_size) {
			add_image_size('amartha_image_size_' . $index, isset($image_size['image_size_width']) ? $image_size['image_size_width'] : '', isset($image_size['image_size_height']) ? $image_size['image_size_height'] : 9999, true);
			$index++;
		}
	}
	
	// Predefined image sizes
	add_image_size('amartha_image_size_square', 500, 500, true);
	add_image_size('amartha_image_size_tall', 500, 700, true);
	add_image_size('amartha_image_size_large', 1000, 1000, true);

	// Include custom files
	include(AMARTHA_THEME_DIR . '/includes/functions/neuron-functions.php');
    include(AMARTHA_THEME_DIR . '/includes/functions/style-functions.php');
	include(AMARTHA_THEME_DIR . '/includes/admin/extra.php');
	include_once(AMARTHA_THEME_DIR . '/includes/tgm/class-tgm-plugin-activation.php');
	include_once(AMARTHA_THEME_DIR . '/includes/admin/acf/acf-fields.php');
	get_theme_mod('custom_fields_panel', '2') == '2' ? define('ACF_LITE' , true) : '';

    // Theme actions within init function
    add_action('tgmpa_register', 'amartha_plugins');
    add_action('wp_enqueue_scripts', 'amartha_external_css');
    add_action('wp_enqueue_scripts', 'amartha_external_js');
    add_action('admin_enqueue_scripts', 'amartha_add_extra_scripts');
	add_action('widgets_init', 'amartha_widgets_init');
    
    // Register Menus
	register_nav_menus(
		array(
			'main-menu' => esc_html__('Main Menu', 'amartha')
		)
	);
}



add_action('wp_enqueue_scripts','my_script_callback');
function my_script_callback(){
    wp_enqueue_script(
        'my-script',
        get_template_directory_uri().'/assets/scripts/addtocart_custom.js',
        array(jquery),
        null,
        true
    );
	
	wp_enqueue_script('jscustom'); // I assume you registered it somewhere else
	wp_localize_script('jscustom', 'ajax_custom', array(
	   'ajaxurl' => admin_url('admin-ajax.php')
	));
}


/**
 * TGMPA
 * 
 * An addon which helps theme to install
 * and activate different plugins.
 */
function amartha_plugins() {
    $plugins = array(
        array(
            'name'      => esc_html__('Advanced Custom Fields', 'amartha'),
            'slug'      => 'advanced-custom-fields',
            'required'  => true
        ),
        array(
			'name'      => esc_html__('Elementor', 'amartha'),
            'slug'      => 'elementor',
            'required'  => true
        ),
        array(
			'name'        => esc_html__('Neuron Core', 'amartha'),
            'slug'        => 'neuron-core-amartha',
			'source'    	=> get_template_directory() . '/includes/plugins/neuron-core-amartha.zip',
		    'required'    => true
		),
		array(
            'name'      => esc_html__('Revolution Slider', 'amartha'),
			'slug'      => 'revslider',
			'source'    => get_template_directory() . '/includes/plugins/revslider.zip',
            'required'  => false
        ),
        array(
            'name'      => esc_html__('WooCommerce', 'amartha'),
            'slug'      => 'woocommerce',
            'required'  => false
        ),
        array(
            'name'       => esc_html__('One Click Demo Import', 'amartha'),
            'slug'       => 'one-click-demo-import',
            'required'   => false
		),
        array(
            'name'       => esc_html__('Contact Form 7', 'amartha'),
            'slug'       => 'contact-form-7',
            'required'   => false
        )
    );
    $config = array(
        'id'           => 'tgmpa',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'parent_slug'  => 'themes.php',
        'capability'   => 'edit_theme_options',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => ''
    );
    tgmpa($plugins, $config);
}

// External CSS
function amartha_external_css() {
    wp_enqueue_style('amartha-main-style', AMARTHA_THEME_URI . '/assets/styles/amartha.css', false, AMARTHA_THEME_VERSION, null);
    wp_enqueue_style('magnific-popup', AMARTHA_THEME_URI . '/assets/styles/magnific-popup.css', false, AMARTHA_THEME_VERSION, null);
    wp_enqueue_style('owl-carousel', AMARTHA_THEME_URI . '/assets/styles/owl.carousel.min.css', false, AMARTHA_THEME_VERSION, null);
    wp_enqueue_style('perfect-scrollbar', AMARTHA_THEME_URI . '/assets/styles/perfect-scrollbar.css', false, AMARTHA_THEME_VERSION, null);
	wp_enqueue_style('amartha-wp-style', AMARTHA_THEME_STYLESHEET);
	wp_enqueue_style('amartha-fonts', amartha_fonts_url(), array(), AMARTHA_THEME_VERSION);
	
	// Custom Style and Fonts
	wp_add_inline_style('amartha-wp-style', amartha_custom_style());
	wp_add_inline_style('amartha-wp-style', amartha_body_offset());
}

// External Javascript
function amartha_external_js() {
	if (!is_admin()) {
		wp_enqueue_script('isotope', AMARTHA_THEME_URI . '/assets/scripts/isotope.pkgd.min.js', array('jquery'), AMARTHA_THEME_VERSION, TRUE);
		wp_enqueue_script('packery-mode', AMARTHA_THEME_URI . '/assets/scripts/packery-mode.pkgd.min.js', array('jquery'), AMARTHA_THEME_VERSION, TRUE);
		wp_enqueue_script('magnific-popup', AMARTHA_THEME_URI . '/assets/scripts/jquery.magnific-popup.min.js', array('jquery'), AMARTHA_THEME_VERSION, TRUE);
		wp_enqueue_script('owl-carousel', AMARTHA_THEME_URI . '/assets/scripts/owl.carousel.min.js', array('jquery'), AMARTHA_THEME_VERSION, TRUE);
		wp_enqueue_script('typed', AMARTHA_THEME_URI . '/assets/scripts/typed.min.js', array('jquery'), AMARTHA_THEME_VERSION, TRUE);
		wp_enqueue_script('wow', AMARTHA_THEME_URI . '/assets/scripts/wow.min.js', array('jquery'), AMARTHA_THEME_VERSION, TRUE);
		wp_enqueue_script('theia-sticky-sidebar', AMARTHA_THEME_URI . '/assets/scripts/theia-sticky-sidebar.js', array('jquery'), AMARTHA_THEME_VERSION, TRUE);
		wp_enqueue_script('headroom', AMARTHA_THEME_URI . '/assets/scripts/headroom.js', array('jquery'), AMARTHA_THEME_VERSION, TRUE);
		wp_enqueue_script('headroom-zepto', AMARTHA_THEME_URI . '/assets/scripts/jQuery.headroom.js', array('jquery'), AMARTHA_THEME_VERSION, TRUE);
		wp_enqueue_script('perfect-scrollbar', AMARTHA_THEME_URI . '/assets/scripts/perfect-scrollbar.min.js', array('jquery'), AMARTHA_THEME_VERSION, TRUE);
		wp_enqueue_script('amartha-scripts', AMARTHA_THEME_URI . '/assets/scripts/amartha.js', array('jquery'), AMARTHA_THEME_VERSION, TRUE);

        is_singular() ? wp_enqueue_script('comment-reply') : '';
	}
}

// Enqueue Extra Scripts
function amartha_add_extra_scripts() {
	wp_enqueue_style('amartha-admin-style', AMARTHA_THEME_URI . '/includes/admin/style.css', false, AMARTHA_THEME_VERSION, null);
	wp_enqueue_script('amartha-admin-script', AMARTHA_THEME_URI . '/includes/admin/script.js', array('jquery'), AMARTHA_THEME_VERSION, TRUE);
}

// Init Widgets
function amartha_widgets_init() {
	$amartha_sidebars = [
		[
			'name' => __('Main Sidebar', 'amartha'),
			'description' => __('Widgets on this sidebar are displayed in Blog Page.', 'amartha'),
			'id' => 'main-sidebar'
		],
		[
			'name' => __('Shop Sidebar', 'amartha'),
			'description' => __('Widgets on this sidebar are displayed in Shop Pages.', 'amartha'),
			'id' => 'shop-sidebar',
			'condition' => class_exists('WooCommerce')
		],
		[
			'name' => __('Footer Sidebar 1', 'amartha'),
			'description' => __('Widgets on this sidebar are placed on the first column of footer.', 'amartha'),
			'id' => 'sidebar-footer-1'
		],
		[
			'name' => __('Footer Sidebar 2', 'amartha'),
			'description' => __('Widgets on this sidebar are placed on the second column of footer.', 'amartha'),
			'id' => 'sidebar-footer-2'
		],
		[
			'name' => __('Footer Sidebar 3', 'amartha'),
			'description' => __('Widgets on this sidebar are placed on the third column of footer.', 'amartha'),
			'id' => 'sidebar-footer-3'
		],
		[
			'name' => __('Footer Sidebar 4', 'amartha'),
			'description' => __('Widgets on this sidebar are placed on the fourth column of footer.', 'amartha'),
			'id' => 'sidebar-footer-4'
		],
		[
			'name' => __('Footer Sidebar 5', 'amartha'),
			'description' => __('Widgets on this sidebar are placed on the fifth column of footer.', 'amartha'),
			'id' => 'sidebar-footer-5'
		],
		[
			'name' => __('Footer Sidebar 6', 'amartha'),
			'description' => __('Widgets on this sidebar are placed on the sixth column of footer.', 'amartha'),
			'id' => 'sidebar-footer-6'
		],
		[
			'name' => __('Sliding Bar Sidebar', 'amartha'),
			'description' => __('Widgets on this sidebar are placed on the sliding bar of header.', 'amartha'),
			'id' => 'sliding-bar',
		],
	];

	if (get_theme_mod('general_sidebars')) {
		foreach (get_theme_mod('general_sidebars') as $sidebar) {
			$amartha_sidebars[] = [
				'name' => esc_html__($sidebar['sidebar_title'], 'amartha'),
				'description' => esc_html__($sidebar['sidebar_description'], 'amartha'),
				'id' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $sidebar['sidebar_title']))),
			];
		}
	}

	foreach ($amartha_sidebars as $sidebar) {
		$sidebar['condition'] = isset($sidebar['condition']) ? $sidebar['condition'] : true;

		if ($sidebar['condition'] == false) {
			continue;
		}

		register_sidebar(
			[
				'name' => esc_html($sidebar['name']),
				'description' => esc_html($sidebar['description']),
				'id' => esc_attr($sidebar['id']),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widgettitle-wrapper"><h3 class="widgettitle">',
				'after_title'   => '</h3></div>'
			]
		);
	}
}

/**
 * Mega Menu Classes
 * 
 * Add classes to the menu item when
 * mega menu option is clicked.
 */
add_filter('wp_nav_menu_objects', 'amartha_mega_menu_class', 10, 2);
function amartha_mega_menu_class($items, $args) {
	foreach ($items as $item) {
		// Activate
		if (get_field('mega_menu', $item)) {
			$item->classes[] = 'm-mega-menu';
		}

		// Columns
		switch (get_field('mega_menu_columns', $item)) {
			case '1':
				$item->classes[] = 'm-mega-menu--two';
				break;
			case '2':
				$item->classes[] = 'm-mega-menu--three';
				break;
			case '3':
				$item->classes[] = 'm-mega-menu--four';
				break;
			case '4':
				$item->classes[] = 'm-mega-menu--five';
				break;
		}

		// Unclickable
		if (get_field('menu_unclickable', $item)) {
			$item->classes[] = 'disabled';
		}
	}
	return $items;
}

/**
 * Remove Mega Menu Classes
 * 
 * Remove clases from the menu
 * items, useful for builder.
 */
function amartha_remove_mega_menu_class($items, $args) {
	foreach ($items as $item) {
		foreach($item->classes as $key => $class) {
			if(strpos($class, 'm-mega-menu') !== false) {
				unset($item->classes[$key]);
			}
		}
	}
	return $items;
}

/**
 * Rewrite the ACF functions incase ACF fails to activate
 */
if (!function_exists('get_field') && !is_admin() && !function_exists('get_sub_field')) {
	function get_field($field_id, $post_id = null) {
		return null;
	}

	function get_sub_field($field_id, $post_id = null){
		return null;
	}
}

/**
 * Portfolio Arguments
 * 
 * Rewrite the url of portfolio
 * and remove the archive page.
 */
add_filter('portfolioposttype_args', 'amartha_change_portfolio_labels');
function amartha_change_portfolio_labels(array $args) {

	if (get_theme_mod('portfolio_prefix')) {
		$args['rewrite'] = array('slug' => get_theme_mod('portfolio_prefix'));
	}

    $args['has_archive'] = false;

	return $args;
}

/**
 * Register Fonts
 */
function amartha_fonts_url() {
	$font_url = '';
	if ('off' !== _x('on', 'Google font: on or off', 'amartha')) {
		$font_url = add_query_arg('family', urlencode('Open Sans:400,700|Poppins:300,400,500,600,700'), '//fonts.googleapis.com/css');
	}
	return $font_url;
}

/**
 * Custom Template
 */
function amartha_get_custom_template($id) {
	if (!class_exists('Elementor\Plugin')) {
		return;
	}

	if (empty($id)) {
		return;
	}

	$content = \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($id, true);

	return $content;
}

/**
 * Body Offset
 */
function amartha_body_offset() {
	if (amartha_inherit_option('general_body_offset', 'body_offset', '2') == '2')  {
		return;
	}

	$amartha_offset_output = [];
	$amartha_body_offset_padding = [
		'theme-options' => get_theme_mod('body_offset_padding'),
		'acf' => [
			'padding-left' => get_field('general_body_offset_padding_left', get_queried_object()),
			'padding-right' => get_field('general_body_offset_padding_right', get_queried_object())
		]
	];

	if (get_field('general_body_offset', get_queried_object()) == '2') {
		$amartha_body_offset_values = $amartha_body_offset_padding['acf'];
	} else {
		$amartha_body_offset_values = $amartha_body_offset_padding['theme-options'];
	}

	$amartha_offset_output[] = isset($amartha_body_offset_values['padding-left']) && $amartha_body_offset_values['padding-left'] != 0 ? 'padding-left:' . $amartha_body_offset_values['padding-left'] : '';
	$amartha_offset_output[] = isset($amartha_body_offset_values['padding-right']) && $amartha_body_offset_values['padding-right'] != 0 ? 'padding-right:' . $amartha_body_offset_values['padding-right'] : ''; 

	// Offset Breakpoint
	if (amartha_inherit_option('general_body_offset_breakpoint', 'body_offset_breakpoint', '1') == '1') {
		$amartha_offset_media_query = '1039px';
	} else {
		$amartha_offset_media_query = '745px';
	}

	return $amartha_offset_output ? '@media (min-width: '. $amartha_offset_media_query .'){ body, .l-primary-header--sticky .l-primary-header {' . implode('; ', $amartha_offset_output) . '}}' : '';
}

/**
 * Demo Importer
 * 
 * Import the content, widgets and
 * the customizer settings via the
 * plugin one click demo importer.
 */
add_filter('pt-ocdi/import_files', 'amartha_ocdi_import_files');
function amartha_ocdi_import_files() {
	return array(
		array(
			'import_file_name'           => esc_html__('Main Demo', 'amartha'),
			'import_file_url'            => 'https://neuronthemes.com/amartha/demo-importer/content.xml',
			'import_widget_file_url'     => 'https://neuronthemes.com/amartha/demo-importer/widgets.json',
			'import_customizer_file_url' => 'https://neuronthemes.com/amartha/demo-importer/customizer.dat',
			'import_notice'              => esc_html__('Everything that is listed in our demo will be imported.', 'amartha'),
		),
		array(
			'import_file_name'           => esc_html__('Header Templates', 'amartha'),
			'categories'                 => array('Templates'),
			'import_file_url'            => 'https://neuronthemes.com/amartha/demo-importer/header-templates.xml',
			'import_preview_image_url'   => 'https://neuronthemes.com/amartha/demo-importer/header-preview.jpg',
			'import_notice'              => esc_html__('Only the Header Templates will be imported.', 'amartha'),
		),
	);
}

/**
 * After Import Setup
 * 
 * Set the Classic Home Page as front
 * page and assign the menu to 
 * the main menu location.
 */
add_action('pt-ocdi/after_import', 'amartha_ocdi_after_import_setup');
function amartha_ocdi_after_import_setup() {
	$main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

	if ($main_menu) {
		set_theme_mod('nav_menu_locations', array('main-menu' => $main_menu->term_id));
	}

	$front_page_id = get_page_by_title('Shop Creative');
	if ($front_page_id) {
		update_option('page_on_front', $front_page_id->ID);
		update_option('show_on_front', 'page');
	}	
	$blog_page_id = get_page_by_title('Blog');
	if ($blog_page_id) {
		update_option('page_for_posts', $blog_page_id->ID);
	}
}

/**
 * WooCommerce Product Gallery
 * 
 * Changes the image sizes from
 * thumbnail to medium for sharper
 * resolution.
 */
add_filter('woocommerce_gallery_thumbnail_size', 'amartha_woocommerce_gallery_thumbnail_size');
function amartha_woocommerce_gallery_thumbnail_size() {
	return 'medium';
}

add_filter( 'sbp_exclude_defer_scripts', 'theme_name_exclude_script' );

function theme_name_exclude_script( $excludes ) {
	return $excludes;
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
