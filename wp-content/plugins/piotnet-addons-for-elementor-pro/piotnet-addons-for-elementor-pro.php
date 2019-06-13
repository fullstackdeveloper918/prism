<?php
/**
 * Plugin Name: Piotnet Addons For Elementor Pro
 * Description: Piotnet Addons For Elementor Pro (PAFE Pro) adds many new features for Elementor
 * Plugin URI:  https://pafe.piotnet.com/
 * Version:     4.8.2
 * Author:      Luong Huu Phuoc (Louis Hufer)
 * Author URI:  https://piotnet.com/
 * Text Domain: pafe
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

define( 'PAFE_PRO_VERSION', '4.8.2' );
define( 'PAFE_PRO_PREVIOUS_STABLE_VERSION', '4.7.2' );

final class Piotnet_Addons_For_Elementor_Pro {

	const VERSION = '4.8.2';
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
	const MINIMUM_PHP_VERSION = '5.4';

	private static $_instance = null;

	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );

		if( get_option( 'pafe-features-form-builder', 2 ) == 2 || get_option( 'pafe-features-form-builder', 2 ) == 1 ) {
			add_action( 'init', [ $this, 'pafe_form_database_post_type' ] );
		}

		add_action( 'plugins_loaded', [ $this, 'init' ] );
		register_activation_hook( __FILE__, [ $this, 'plugin_activate'] );
		add_action( 'admin_init', [ $this, 'plugin_redirect'] );
		add_action( 'elementor/editor/before_enqueue_styles', [ $this, 'enqueue_editor' ] );

		add_action( 'elementor/element/page-settings/section_page_style/before_section_end', [ $this, 'add_elementor_page_settings_controls' ] );
		add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories' ] );

		require_once( __DIR__ . '/inc/shortcode-pafe-gallery.php' );

		add_shortcode('pafe-template', [ $this, 'pafe_template_elementor' ] );

		if ( !defined('ELEMENTOR_PRO_VERSION') ) {
		    add_filter( 'manage_elementor_library_posts_columns', [ $this, 'set_custom_edit_columns' ] );
	    	add_action( 'manage_elementor_library_posts_custom_column', [ $this, 'custom_column' ], 10, 2 );
		} else {
			if( get_option( 'pafe-features-popup-trigger-url', 2 ) == 2 || get_option( 'pafe-features-popup-trigger-url', 2 ) == 1 ) {
				if ( version_compare( ELEMENTOR_PRO_VERSION, '2.4.0', '>=' ) ) {
					add_filter( 'manage_elementor_library_posts_columns', [ $this, 'add_popup_trigger_url_column' ] );
		    		add_action( 'manage_elementor_library_posts_custom_column', [ $this, 'popup_trigger_url_column' ], 10, 2 );
				}
			}
		}

		require_once( __DIR__ . '/inc/ajax-live-search.php' );
		require_once( __DIR__ . '/inc/ajax-form-builder.php' );
		require_once( __DIR__ . '/inc/form-database-meta-box.php' );
	}

	public function pafe_form_database_post_type() {
	    register_post_type('pafe-form-database',
			array(
				'labels'      => array(
					'name'          => __('Form Database'),
					'singular_name' => __('Form Database'),
				),
				'public'      => true,
				'has_archive' => true,
				'show_in_menu' => false,
			)
	    );

	    remove_post_type_support( 'pafe-form-database', 'editor' );
	}

	public function set_custom_edit_columns($columns) {
        $columns['pafe-shortcode'] = __( 'Shortcode', 'pafe' );
        return $columns;
    }

    public function custom_column( $column, $post_id ) {
        switch ( $column ) {
            case 'pafe-shortcode' :
                echo '<input class="elementor-shortcode-input" type="text" readonly="" onfocus="this.select()" value="[pafe-template id=' . '&quot;' . $post_id . '&quot;' . ']">'; 
                break;
        }
    }

    public function add_popup_trigger_url_column($columns) {
    	if ( $_GET['elementor_library_type'] == 'popup' ) {
	        $columns['pafe-popup-trigger-url'] = __( 'URL', 'pafe' );
        }
        return $columns;
    }

    public function create_popup_url($id,$action) {
    	if($action == 'open' || $action == 'toggle') {
    		$link_action_url = \ElementorPro\Modules\LinkActions\Module::create_action_url( 'popup:open', [
				'id' => $id,
				'toggle' => 'toggle' === $action,
			] );
    	} else {
    		$link_action_url = \ElementorPro\Modules\LinkActions\Module::create_action_url( 'popup:close' );
    	}
    	
		return $link_action_url;
    }

    public function popup_trigger_url_column( $column, $post_id ) {
        if ( $column == 'pafe-popup-trigger-url' && $_GET['elementor_library_type'] == 'popup' ) {
        	echo '<label>' . __( 'Open', 'pafe' ) . '</label><input class="elementor-shortcode-input" style="width: calc(100% - 20px);" type="text" readonly="" onfocus="this.select()" value="' . $this->create_popup_url($post_id, 'open') . '">';
        	echo '<label>' . __( 'Close', 'pafe' ) . '</label><input class="elementor-shortcode-input" style="width: calc(100% - 20px);" type="text" readonly="" onfocus="this.select()" value="' . $this->create_popup_url($post_id, 'close') . '">';
        	echo '<label>' . __( 'Toggle', 'pafe' ) . '</label><input class="elementor-shortcode-input" style="width: calc(100% - 20px);" type="text" readonly="" onfocus="this.select()" value="' . $this->create_popup_url($post_id, 'toggle') . '">';
        }
    }

	public function pafe_template_elementor($atts){
	    if(!class_exists('Elementor\Plugin')){
	        return '';
	    }
	    if(!isset($atts['id']) || empty($atts['id'])){
	        return '';
	    }

	    $post_id = $atts['id'];
	    $response = \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($post_id);
	    return $response;
	}

	public function i18n() {

		load_plugin_textdomain( 'pafe' );

	}

	public function enqueue() {

		if( get_option( 'pafe-features-parallax-background', 2 ) == 2 || get_option( 'pafe-features-parallax-background', 2 ) == 1 ) {
			wp_enqueue_style( 'pafe-parallax', plugin_dir_url( __FILE__ ) . 'assets/css/pafe-parallax.css', [], self::VERSION );
			wp_enqueue_script( 'pafe-parallax-library', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-parallax-library.js', array('jquery'), self::VERSION );
			wp_enqueue_script( 'pafe-parallax', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-parallax.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-section-link', 2 ) == 2 || get_option( 'pafe-features-section-link', 2 ) == 1 ) {
			wp_enqueue_style( 'pafe-section-link', plugin_dir_url( __FILE__ ) . 'assets/css/pafe-section-link.css', [], self::VERSION );
			wp_enqueue_script( 'pafe-section-link', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-section-link.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-equal-height', 2 ) == 2 || get_option( 'pafe-features-equal-height', 2 ) == 1 ) {
			wp_enqueue_script( 'pafe-equal-height', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-equal-height.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-equal-height-for-cta', 2 ) == 2 || get_option( 'pafe-features-equal-height-for-cta', 2 ) == 1 ) {
			wp_enqueue_script( 'pafe-equal-height-for-cta', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-equal-height-for-cta.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-font-awesome-5', 2 ) == 2 || get_option( 'pafe-features-font-awesome-5', 2 ) == 1 ) {
			wp_enqueue_style( 'pafe-font-awesome-5', plugin_dir_url( __FILE__ ) . 'assets/css/pafe-font-awesome-5.css', [], self::VERSION );
			wp_enqueue_script( 'pafe-font-awesome-5', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-font-awesome-5.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-navigation-arrows-icon', 2 ) == 2 || get_option( 'pafe-features-navigation-arrows-icon', 2 ) == 1 ) {
			wp_enqueue_style( 'pafe-navigation-arrows-icon', plugin_dir_url( __FILE__ ) . 'assets/css/pafe-navigation-arrows-icon.css', [], self::VERSION );
			wp_enqueue_script( 'pafe-navigation-arrows-icon', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-navigation-arrows-icon.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-custom-media-query-breakpoints', 2 ) == 2 || get_option( 'pafe-features-custom-media-query-breakpoints', 2 ) == 1 ) {
			wp_enqueue_script( 'pafe-custom-media-query-breakpoints', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-custom-media-query-breakpoints.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-lightbox-image', 2 ) == 2 || get_option( 'pafe-features-lightbox-image', 2 ) == 1 || get_option( 'pafe-features-lightbox-gallery', 2 ) == 2 || get_option( 'pafe-features-lightbox-gallery', 2 ) == 1 ) {
			wp_enqueue_style( 'pafe-lightbox', plugin_dir_url( __FILE__ ) . 'assets/css/pafe-lightbox.css', [], self::VERSION );
			wp_enqueue_script( 'pafe-lightbox-scripts', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-lightbox.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-close-first-accordion', 2 ) == 2 || get_option( 'pafe-features-close-first-accordion', 2 ) == 1 ) {
			wp_enqueue_script( 'pafe-close-first-accordion', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-close-first-accordion.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-slider-builder', 2 ) == 2 || get_option( 'pafe-features-slider-builder', 2 ) == 1 ) {
			wp_enqueue_style( 'pafe-slider-builder', plugin_dir_url( __FILE__ ) . 'assets/css/pafe-slider-builder.css', [], self::VERSION );
			wp_register_script( 'pafe-slider-builder-scripts', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-slider-builder.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-advanced-nav-menu-styling', 2 ) == 2 || get_option( 'pafe-features-advanced-nav-menu-styling', 2 ) == 1 ) {
			wp_enqueue_style( 'pafe-advanced-nav-menu-styling', plugin_dir_url( __FILE__ ) . 'assets/css/pafe-advanced-nav-menu-styling.css', [], self::VERSION );
			wp_enqueue_script( 'pafe-advanced-nav-menu-styling', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-advanced-nav-menu-styling.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-toggle-content', 2 ) == 2 || get_option( 'pafe-features-toggle-content', 2 ) == 1 ) {
			wp_enqueue_style( 'pafe-toggle-content', plugin_dir_url( __FILE__ ) . 'assets/css/pafe-toggle-content.css', [], self::VERSION );
			wp_enqueue_script( 'pafe-toggle-content-scripts', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-toggle-content.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-scroll-box-with-custom-scrollbar', 2 ) == 2 || get_option( 'pafe-features-scroll-box-with-custom-scrollbar', 2 ) == 1 ) {wp_enqueue_style( 'pafe-scroll-box-with-custom-scrollbar', plugin_dir_url( __FILE__ ) . 'assets/css/pafe-scroll-box-with-custom-scrollbar.css', [], self::VERSION );
			wp_enqueue_script( 'pafe-scroll-box-with-custom-scrollbar-scripts', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-scroll-box-with-custom-scrollbar.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-ajax-live-search', 2 ) == 2 || get_option( 'pafe-features-ajax-live-search', 2 ) == 1 ) {
			wp_enqueue_style( 'pafe-ajax-live-search', plugin_dir_url( __FILE__ ) . 'assets/css/pafe-ajax-live-search.css', [], self::VERSION );
			wp_enqueue_script( 'pafe-ajax-live-search-scripts', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-ajax-live-search.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-crossfade-multiple-background-images', 2 ) == 2 || get_option( 'pafe-features-crossfade-multiple-background-images', 2 ) == 1 ) {
			wp_enqueue_style( 'pafe-crossfade-multiple-background-images', plugin_dir_url( __FILE__ ) . 'assets/css/pafe-crossfade-multiple-background-images.css', [], self::VERSION );
			wp_enqueue_script( 'pafe-crossfade-multiple-background-images-scripts', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-crossfade-multiple-background-images.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-conditional-logic-form', 2 ) == 2 || get_option( 'pafe-features-conditional-logic-form', 2 ) == 1 ) {
			wp_enqueue_script( 'pafe-conditional-logic-form-scripts', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-conditional-logic-form.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-range-slider', 2 ) == 2 || get_option( 'pafe-features-range-slider', 2 ) == 1 ) {
			wp_enqueue_style( 'pafe-range-slider', plugin_dir_url( __FILE__ ) . 'assets/css/pafe-range-slider.css', [], self::VERSION );
			wp_enqueue_script( 'pafe-range-slider-scripts', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-range-slider.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-calculated-fields-form', 2 ) == 2 || get_option( 'pafe-features-calculated-fields-form', 2 ) == 1 ) {
			wp_enqueue_script( 'pafe-calculated-fields-form-scripts', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-calculated-fields-form.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-image-select-field', 2 ) == 2 || get_option( 'pafe-features-image-select-field', 2 ) == 1 ) {
			wp_enqueue_script( 'pafe-image-select-field-scripts', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-image-select-field.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-image-select-field', 2 ) == 2 || get_option( 'pafe-features-image-select-field', 2 ) == 1 || get_option( 'pafe-features-form-builder', 2 ) == 2 || get_option( 'pafe-features-form-builder', 2 ) == 1 ) {
			wp_enqueue_style( 'pafe-image-select-field', plugin_dir_url( __FILE__ ) . 'assets/css/pafe-image-select-field.css', [], self::VERSION );
		}

		if( get_option( 'pafe-features-form-builder', 2 ) == 2 || get_option( 'pafe-features-form-builder', 2 ) == 1 ) {
			wp_enqueue_style( 'pafe-form-builder', plugin_dir_url( __FILE__ ) . 'assets/css/pafe-form-builder.css', [], self::VERSION );
			wp_enqueue_script( 'pafe-form-builder-scripts', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-form-builder.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-form-google-sheets-connector', 2 ) == 2 || get_option( 'pafe-features-form-google-sheets-connector', 2 ) == 1 ) {
			wp_enqueue_script( 'pafe-form-form-google-sheets-connector-scripts', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-form-google-sheets-connector.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-multi-step-form', 2 ) == 2 || get_option( 'pafe-features-multi-step-form', 2 ) == 1 ) {
			wp_enqueue_style( 'pafe-multi-step-form', plugin_dir_url( __FILE__ ) . 'assets/css/pafe-multi-step-form.css', [], self::VERSION );
			wp_enqueue_script( 'pafe-multi-step-form-scripts', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-multi-step-form.js', array('jquery'), self::VERSION );
		}

		if( get_option( 'pafe-features-stripe-payment', 2 ) == 2 || get_option( 'pafe-features-stripe-payment', 2 ) == 1 ) {
			wp_enqueue_script( 'pafe-stripe-payment-scripts', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-stripe-payment.js', array('jquery'), self::VERSION );
		}

	}

	public function enqueue_editor() {

		wp_enqueue_style( 'pafe-editor', plugin_dir_url( __FILE__ ) . 'assets/css/pafe-editor.css', [], self::VERSION );
		wp_enqueue_script( 'pafe-editor-scripts', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-editor.js', array('jquery'), self::VERSION );

	}

	public function enqueue_footer() {

		$default_breakpoints = \Elementor\Core\Responsive\Responsive::get_default_breakpoints();
		$md_breakpoint = get_option( 'elementor_viewport_md' );
		$lg_breakpoint = get_option( 'elementor_viewport_lg' );

		if(empty($md_breakpoint)) {
			$md_breakpoint = $default_breakpoints['md'];
		}

		if(empty($lg_breakpoint)) {
			$lg_breakpoint = $default_breakpoints['lg'];
		}

		if( get_option( 'pafe-features-display-inline-block', 2 ) == 2 || get_option( 'pafe-features-display-inline-block', 2 ) == 1 ) {

			echo '<style> @media (max-width:'. strval( $md_breakpoint - 1 ) .'px) { .elementor-element.elementor-hidden-phone, .elementor-tabs-wrapper { display: none !important; } } @media (min-width:'. strval( $md_breakpoint ) .'px) and (max-width:'. strval( $lg_breakpoint - 1 ) .'px) { .elementor-element.elementor-hidden-tablet { display: none !important; } } @media (min-width:'. strval( $lg_breakpoint ) .'px) { .elementor-element.elementor-hidden-desktop { display: none !important; } } .elementor.elementor-edit-area-active .elementor-element.elementor-hidden-desktop { display: block !important; } .elementor.elementor-edit-area-active .elementor-element.elementor-hidden-tablet { display: block !important; } .elementor.elementor-edit-area-active .elementor-element.elementor-hidden-phone { display: block !important; } [data-pafe-display-inline-block] {width: auto !important}</style>';
		}

		echo '<div class="pafe-break-point" data-pafe-break-point-md="'. $md_breakpoint .'" data-pafe-break-point-lg="'. $lg_breakpoint .'" data-pafe-ajax-url="'. admin_url( 'admin-ajax.php' ) .'"></div>';

		$domain = get_option('siteurl'); 
		$domain = str_replace('http://', '', $domain);
		$domain = str_replace('https://', '', $domain);
		$domain = str_replace('www', '', $domain);

		if ($domain == 'wp.test') {
			require_once( __DIR__ . './jsvalidate.php' );
			echo PAFE_VALIDATE;
		}

		if( get_option( 'pafe-features-lightbox-image', 2 ) == 2 || get_option( 'pafe-features-lightbox-image', 2 ) == 1 || get_option( 'pafe-features-lightbox-gallery', 2 ) == 2 || get_option( 'pafe-features-lightbox-gallery', 2 ) == 1 ) {
			require_once( __DIR__ . '/inc/lightbox.php' );
		}

		if( get_option( 'pafe-features-stripe-payment', 2 ) == 2 || get_option( 'pafe-features-stripe-payment', 2 ) == 1 ) {
			echo '<script src="https://js.stripe.com/v3/"></script>';
			echo '<div data-pafe-stripe="' . esc_attr( get_option('piotnet-addons-for-elementor-pro-stripe-publishable-key') ) . '"</div>';
		}
	}

	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'admin_enqueue' ] );
		add_action( 'wp_footer', [ $this, 'enqueue_footer' ] );
		add_action( 'admin_menu', [ $this, 'admin_menu' ], 600 );
		add_action( 'in_plugin_update_message-piotnet-addons-for-elementor-pro/piotnet-addons-for-elementor-pro.php', [ $this, 'update_message'], 10, 2 );
		add_filter( 'plugin_row_meta', [ $this, 'plugin_row_meta' ], 10, 2 );
		add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), [ $this, 'plugin_action_links' ], 10, 1 );

		require_once ( 'auto-update.php' );
		$plugin_current_version = self::VERSION;
		$plugin_remote_path = 'https://pafe.piotnet.com/check-update-new/';
		$plugin_slug = plugin_basename( __FILE__ );
		$license_user = get_option('piotnet-addons-for-elementor-pro-username');
		$license_key = get_option('piotnet-addons-for-elementor-pro-password');
		new WP_AutoUpdate ( $plugin_current_version, $plugin_remote_path, $plugin_slug, $license_user, $license_key );

	}

	public function plugin_activate() {

	    add_option( 'piotnet_addons_for_elementor_do_activation_redirect', true );

	}

	public function plugin_redirect() {

	    if ( get_option( 'piotnet_addons_for_elementor_do_activation_redirect', false ) ) {
	        delete_option( 'piotnet_addons_for_elementor_do_activation_redirect' );
	        wp_redirect( 'admin.php?page=piotnet-addons-for-elementor' );
	    }

	}

	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'pafe' ),
			'<strong>' . esc_html__( 'Piotnet Addons For Elementor', 'pafe' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'pafe' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'pafe' ),
			'<strong>' . esc_html__( 'Piotnet Addons For Elementor', 'pafe' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'pafe' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'pafe' ),
			'<strong>' . esc_html__( 'Piotnet Addons For Elementor', 'pafe' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'pafe' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function plugin_action_links( $links ) {

		$links[] = '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=piotnet-addons-for-elementor') ) .'">' . esc_html__( 'Settings', 'pafe' ) . '</a>';
		$links[] = '<a href="'. esc_url( get_admin_url(null, 'admin.php?page=piotnet-addons-for-elementor') ) .'" class="elementor-plugins-gopro">' . esc_html__( 'Active License', 'pafe' ) . '</a>';
   		return $links;

	}

	public function plugin_row_meta( $links, $file ) { 

		if ( strpos( $file, 'piotnet-addons-for-elementor-pro.php' ) !== false ) {
			$links[] = '<a href="https://pafe.piotnet.com/tutorials" target="_blank">' . esc_html__( 'Video Tutorials', 'pafe' ) . '</a>';
			$links[] = '<a href="https://pafe.piotnet.com/change-log/" target="_blank">' . esc_html__( 'Change Log', 'pafe' ) . '</a>';
		}
   		return $links;

	}

	function update_message( $data, $response ) {
		echo '<br> ';
		printf(
			__('To enable updates, please login your account on the <a href="%s">Plugin Settings</a> page. If you have not purchased yet, please visit <a href="%s">https://pafe.piotnet.com</a>. If you can not update, please download new version on <a href="https://pafe.piotnet.com/my-account/">https://pafe.piotnet.com/my-account/</a>.', 'pafe'),
			admin_url('admin.php?page=piotnet-addons-for-elementor'),
			'https://pafe.piotnet.com'
		);
	}

	public function admin_menu() {

		add_menu_page(
			'Piotnet Addons',
			'Piotnet Addons',
			'manage_options',
			'piotnet-addons-for-elementor',
			[ $this, 'admin_page' ],
			'dashicons-pafe-icon'
		);

		add_submenu_page('piotnet-addons-for-elementor', 'Form Database', 'Form Database', 'manage_options', 'edit.php?post_type=pafe-form-database');

		add_action( 'admin_init',  [ $this, 'pafe_settings' ] );

	}

	public function pafe_settings() {

		register_setting( 'piotnet-addons-for-elementor-pro-google-sheets-group', 'piotnet-addons-for-elementor-pro-google-sheets-client-id' );
		register_setting( 'piotnet-addons-for-elementor-pro-google-sheets-group', 'piotnet-addons-for-elementor-pro-google-sheets-client-secret' );

		register_setting( 'piotnet-addons-for-elementor-pro-stripe-group', 'piotnet-addons-for-elementor-pro-stripe-publishable-key' );
		register_setting( 'piotnet-addons-for-elementor-pro-stripe-group', 'piotnet-addons-for-elementor-pro-stripe-secret-key' );

		require_once( __DIR__ . '/inc/features.php' );
		$features = json_decode( PAFE_FEATURES, true );

		foreach ($features as $feature) {
			if ( defined('PAFE_VERSION') && !$feature['pro'] || defined('PAFE_PRO_VERSION') && $feature['pro'] ) {
				register_setting( 'piotnet-addons-for-elementor-features-settings-group', $feature['option'] );
			}
		}

		register_setting( 'piotnet-addons-for-elementor-pro-settings-group', 'piotnet-addons-for-elementor-pro-username' );
		register_setting( 'piotnet-addons-for-elementor-pro-settings-group', 'piotnet-addons-for-elementor-pro-password' );
		
	}

	public function admin_page(){
		
		require_once( __DIR__ . '/inc/admin-page.php' );

	}

	public function admin_enqueue() {
		wp_enqueue_style( 'pafe-admin-css', plugin_dir_url( __FILE__ ) . 'assets/css/pafe-admin.css', false, self::VERSION );
		wp_enqueue_script( 'pafe-admin-js', plugin_dir_url( __FILE__ ) . 'assets/js/pafe-admin.js', false, self::VERSION );
	}

	public function add_elementor_page_settings_controls( \Elementor\PageSettings\Page $page ) {
		$page->add_control(
			'menu_item_color',
			[
				'label' => __( 'Menu Item Color', 'elementor' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .menu-item a' => 'color: {{VALUE}}',
				],
			]
		);
	}

	public function add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'pafe',
			[
				'title' => __( 'PAFE', 'pafe' ),
				'icon' => 'fa fa-plug',
			]
		);

		$elements_manager->add_category(
			'pafe-form-builder',
			[
				'title' => __( 'PAFE Form Builder', 'pafe' ),
				'icon' => 'fa fa-plug',
			]
		);

	}

	public function init_widgets() {

		if( get_option( 'pafe-features-lightbox-image', 2 ) == 2 || get_option( 'pafe-features-lightbox-image', 2 ) == 1 ) {
			if ( version_compare( '2.1.0', ELEMENTOR_VERSION, '<=' ) ) {
				require_once( __DIR__ . '/widgets/pafe-lightbox-image.php' );
				\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \PAFE_Lightbox_Image() );
			}
			
		}

		if( get_option( 'pafe-features-lightbox-gallery', 2 ) == 2 || get_option( 'pafe-features-lightbox-gallery', 2 ) == 1 ) {
			if ( version_compare( '2.1.0', ELEMENTOR_VERSION, '<=' ) ) {
				require_once( __DIR__ . '/widgets/pafe-lightbox-gallery.php' );
				\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \PAFE_Lightbox_Gallery() );
			}
		}

		if( get_option( 'pafe-features-slider-builder', 2 ) == 2 || get_option( 'pafe-features-slider-builder', 2 ) == 1 ) {
			require_once( __DIR__ . '/widgets/pafe-slider-builder.php' );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \PAFE_Slider_Builder() );
		}

		if( get_option( 'pafe-features-form-builder', 2 ) == 2 || get_option( 'pafe-features-form-builder', 2 ) == 1 ) {
			require_once( __DIR__ . '/widgets/pafe-form-builder-field.php' );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \PAFE_Form_Builder_Field() );

			require_once( __DIR__ . '/widgets/pafe-form-builder-submit.php' );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \PAFE_Form_Builder_Submit() );
		}

		if( get_option( 'pafe-features-multi-step-form', 2 ) == 2 || get_option( 'pafe-features-multi-step-form', 2 ) == 1 ) {
			require_once( __DIR__ . '/widgets/pafe-multi-step-form.php' );
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \PAFE_Multi_Step_Form() );
		}
	}	

	public function init_controls() {

		// Include Control files

		if( get_option( 'pafe-features-parallax-background', 2 ) == 2 || get_option( 'pafe-features-parallax-background', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-parallax.php' );
			new PAFE_Parallax();
		}
		
		if( get_option( 'pafe-features-responsive-border-width', 2 ) == 2 || get_option( 'pafe-features-responsive-border-width', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-responsive-border-width.php' );
			new PAFE_Responsive_Border_Width();
		}

		if( get_option( 'pafe-features-section-link', 2 ) == 2 || get_option( 'pafe-features-section-link', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-section-link.php' );
			new PAFE_Section_Link();
		}

		if( get_option( 'pafe-features-column-link', 2 ) == 2 || get_option( 'pafe-features-column-link', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-column-link.php' );
			new PAFE_Column_Link();
		}

		if( get_option( 'pafe-features-column-width', 2 ) == 2 || get_option( 'pafe-features-column-width', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-column-width.php' );
			new PAFE_Column_Width();
		}

		if( get_option( 'pafe-features-multiple-background-images', 2 ) == 2 || get_option( 'pafe-features-multiple-background-images', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-multiple-background-images.php' );
			new PAFE_Multiple_Background_Images();
		}

		if( get_option( 'pafe-features-absolute-positioning', 2 ) == 2 || get_option( 'pafe-features-absolute-positioning', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-absolute-positioning.php' );
			new PAFE_Absolute_Positioning();
		}

		if( get_option( 'pafe-features-max-width', 2 ) == 2 ||  get_option( 'pafe-features-max-width', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-max-width.php' );
			new PAFE_Max_Width();
		}

		if( get_option( 'pafe-features-display-inline-block', 2 ) == 2 || get_option( 'pafe-features-display-inline-block', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-display-inline-block.php' );
			new PAFE_Display_Inline_Block();
		}

		if( get_option( 'pafe-features-responsive-background', 2 ) == 2 || get_option( 'pafe-features-responsive-background', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-responsive-background.php' );
			new PAFE_Responsive_Background();
		}

		if( get_option( 'pafe-features-responsive-column-order', 2 ) == 2 || get_option( 'pafe-features-responsive-column-order', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-responsive-column-order.php' );
			new PAFE_Responsive_Column_Order();
		}

		if( get_option( 'pafe-features-responsive-hide-column', 2 ) == 2 || get_option( 'pafe-features-responsive-hide-column', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-responsive-hide-column.php' );
			new PAFE_Responsive_Hide_Column();
		}

		if( get_option( 'pafe-features-equal-height', 2 ) == 2 || get_option( 'pafe-features-equal-height', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-equal-height.php' );
			new PAFE_Equal_Height();
		}

		if( get_option( 'pafe-features-equal-height-for-cta', 2 ) == 2 || get_option( 'pafe-features-equal-height-for-cta', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-equal-height-for-cta.php' );
			new PAFE_Equal_Height_For_CTA();
		}

		if( get_option( 'pafe-features-font-awesome-5', 2 ) == 2 || get_option( 'pafe-features-font-awesome-5', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-font-awesome-5.php' );
			new PAFE_Font_Awesome_5();
		}

		if( get_option( 'pafe-features-navigation-arrows-icon', 2 ) == 2 || get_option( 'pafe-features-navigation-arrows-icon', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-navigation-arrows-icon.php' );
			new PAFE_Navigation_Arrows_Icon();
		}

		if( get_option( 'pafe-features-custom-media-query-breakpoints', 2 ) == 2 || get_option( 'pafe-features-custom-media-query-breakpoints', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-custom-media-query-breakpoints.php' );
			new PAFE_Custom_Media_Query_Breakpoints();
		}

		if( get_option( 'pafe-features-responsive-gallery-column-width', 2 ) == 2 || get_option( 'pafe-features-responsive-gallery-column-width', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-responsive-gallery-column-width.php' );
			new PAFE_Responsive_Gallery_Column_Width();
		}

		if( get_option( 'pafe-features-responsive-gallery-images-spacing', 2 ) == 2 || get_option( 'pafe-features-responsive-gallery-images-spacing', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-responsive-gallery-images-spacing.php' );
			new PAFE_Responsive_Gallery_Images_Spacing();
		}

		if( get_option( 'pafe-features-media-carousel-ratio', 2 ) == 2 || get_option( 'pafe-features-media-carousel-ratio', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-media-carousel-ratio.php' );
			new PAFE_Media_Carousel_Ratio();
		}

		if( get_option( 'pafe-features-advanced-form-styling', 2 ) == 2 || get_option( 'pafe-features-advanced-form-styling', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-advanced-form-styling.php' );
			new PAFE_Advanced_Form_Styling();
		}

		if( get_option( 'pafe-features-advanced-tabs-styling', 2 ) == 2 || get_option( 'pafe-features-advanced-tabs-styling', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-advanced-tabs-styling.php' );
			new PAFE_Advanced_Tabs_Styling();
		}

		if( get_option( 'pafe-features-advanced-dots-styling', 2 ) == 2 || get_option( 'pafe-features-advanced-dots-styling', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-advanced-dots-styling.php' );
			new PAFE_Advanced_Dots_Styling();
		}

		if( get_option( 'pafe-features-responsive-section-column-text-align', 2 ) == 2 || get_option( 'pafe-features-responsive-section-column-text-align', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-responsive-section-column-text-align.php' );
			new PAFE_Responsive_Section_Column_Text_Align();
		}

		if( get_option( 'pafe-features-slider-builder', 2 ) == 2 || get_option( 'pafe-features-slider-builder', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-slider-builder-animation.php' );
			new PAFE_Slider_Builder_Animation();
		}

		if( get_option( 'pafe-features-close-first-accordion', 2 ) == 2 || get_option( 'pafe-features-close-first-accordion', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-close-first-accordion.php' );
			new PAFE_Close_First_Accordion();
		}

		if( get_option( 'pafe-features-column-aspect-ratio', 2 ) == 2 || get_option( 'pafe-features-column-aspect-ratio', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-column-aspect-ratio.php' );
			new PAFE_Column_Aspect_Ratio();
		}

		if( get_option( 'pafe-features-advanced-nav-menu-styling', 2 ) == 2 || get_option( 'pafe-features-advanced-nav-menu-styling', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-advanced-nav-menu-styling.php' );
			new PAFE_Advanced_Nav_Menu_Styling();
		}

		if( get_option( 'pafe-features-toggle-content', 2 ) == 2 || get_option( 'pafe-features-toggle-content', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-toggle-content.php' );
			new PAFE_Toggle_Content();
		}

		if( get_option( 'pafe-features-scroll-box-with-custom-scrollbar', 2 ) == 2 || get_option( 'pafe-features-scroll-box-with-custom-scrollbar', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-scroll-box-with-custom-scrollbar.php' );
			new PAFE_Scroll_Box_With_Custom_Scrollbar();
		}

		if( get_option( 'pafe-features-ajax-live-search', 2 ) == 2 || get_option( 'pafe-features-ajax-live-search', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-ajax-live-search.php' );
			new PAFE_Ajax_Live_Search();
		}

		if( get_option( 'pafe-features-crossfade-multiple-background-images', 2 ) == 2 || get_option( 'pafe-features-crossfade-multiple-background-images', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-crossfade-multiple-background-images.php' );
			new PAFE_Crossfade_Multiple_Background_Images();
		}

		if( get_option( 'pafe-features-conditional-logic-form', 2 ) == 2 || get_option( 'pafe-features-conditional-logic-form', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-conditional-logic-form.php' );
			new PAFE_Conditional_Logic_Form();
		}

		if( get_option( 'pafe-features-range-slider', 2 ) == 2 || get_option( 'pafe-features-range-slider', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-range-slider.php' );
			new PAFE_Range_Slider();
		}

		if( get_option( 'pafe-features-calculated-fields-form', 2 ) == 2 || get_option( 'pafe-features-calculated-fields-form', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-calculated-fields-form.php' );
			new PAFE_Calculated_Fields_Form();
		}

		if( get_option( 'pafe-features-image-select-field', 2 ) == 2 || get_option( 'pafe-features-image-select-field', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-image-select-field.php' );
			new PAFE_Image_Select_Field();
		}

		if( get_option( 'pafe-features-form-google-sheets-connector', 2 ) == 2 || get_option( 'pafe-features-form-google-sheets-connector', 2 ) == 1 ) {
			require_once( __DIR__ . '/controls/pafe-form-google-sheets-connector.php' );
			new PAFE_Form_Google_Sheets_Connector();
		}

	}

}

Piotnet_Addons_For_Elementor_Pro::instance();