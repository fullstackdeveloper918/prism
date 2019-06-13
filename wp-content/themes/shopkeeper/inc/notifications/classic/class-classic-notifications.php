<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class GBT_Classic_Notifications {

	/**
	 * The single instance of the class.
	 */
	protected static $_instance = null;

	/**
	 * Ensures only one instance of GBT_Classic_Notifications is loaded or can be loaded.
	*/
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'gbt_cln_enqueue_scripts' ) );
	}

	/**
	 * Adds scripts
	 */
	public function gbt_cln_enqueue_scripts() {

		global $shopkeeper_theme_options;

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_enqueue_style(
			'getbowtied-classic-notifications-styles', 
			get_template_directory_uri() . '/inc/notifications/classic/assets/css/style'.$suffix.'.css', 
			array(), 
			getbowtied_theme_version(), 
			'all'
		);

		if( $shopkeeper_theme_options['ajax_add_to_cart'] ) {
			wp_enqueue_script(
				'getbowtied-classic-notifications-scripts',
				get_template_directory_uri() . '/inc/notifications/classic/assets/js/classic-notifications'.$suffix.'.js',
				array( 'jquery' ),
				getbowtied_theme_version(),
				true
			);
		}
	}
}
$custom_notif = new GBT_Classic_Notifications;