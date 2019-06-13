<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class GBT_Custom_Notifications {

	/**
	 * The single instance of the class.
	 */
	protected static $_instance = null;

	/**
	 * Ensures only one instance of GBT_Custom_Notifications is loaded or can be loaded.
	*/
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'gbt_cn_enqueue_scripts' ) );
		add_action( 'wp_footer', array( $this, 'gbt_cn_add_template' ) );
		add_filter('wc_add_to_cart_message_html', array( $this, 'custom_add_to_cart_message' ), 10, 2);
	}

	/**
	 * Adds modal html
	 */
	public function gbt_cn_add_template() {
		$template = $this->gbt_cn_get_template();
		echo wp_kses( $template, wp_kses_allowed_html( 'post' ) );
	}

	public function gbt_cn_get_template() {

		global $shopkeeper_theme_options;

		$slide_type = 'slide-out';
		if ( isset($shopkeeper_theme_options['notification_mode']) && 
			$shopkeeper_theme_options['notification_mode'] == '1' && 
		isset($shopkeeper_theme_options['notification_style']) && 
		$shopkeeper_theme_options['notification_style'] == '0') {
			$slide_type = 'slide-in';
		}

		return 
		'<div class="page-notifications '.$slide_type.'" id="gbt-custom-notification-notice">
			<div class="gbt-custom-notification-content"></div>
		</div>';
	}

	/*
	 * Creates custom notification for added to cart products, used for variations
	*/
	function custom_add_to_cart_message( $message, $product_id) {

		$img = false;

		if (isset($_POST['variation_id'])) {
			$id = $_POST['variation_id'];
			$img = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'shop_catalog' );
		} 

		if ($img === false || empty($img)) {
			$img = wp_get_attachment_image_src( get_post_thumbnail_id(key($product_id)), 'shop_catalog' );
		}


		$img_url = $img[0];

		$added_to_cart = '
			<div class="product_notification_wrapper">
				<div class="product_notification_background" style="background-image:url('.$img_url.')"></div>
				<div class="product_notification_text">'.$message.'</div>
		 	</div>';
		return $added_to_cart;
	}

	/**
	 * Adds scripts
	 */
	public function gbt_cn_enqueue_scripts() {

		global $shopkeeper_theme_options;

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_enqueue_style(
			'getbowtied-custom-notifications-styles', 
			get_template_directory_uri() . '/inc/notifications/custom/assets/css/style'.$suffix.'.css', 
			array(), 
			getbowtied_theme_version(), 
			'all'
		);

		wp_enqueue_script(
			'getbowtied-custom-notifications-scripts',
			get_template_directory_uri() . '/inc/notifications/custom/assets/js/custom-notifications'.$suffix.'.js',
			array( 'jquery' ),
			getbowtied_theme_version(),
			true
		);

		// Localize script
		$localize_script = array(
			'icon_default_class' => 'spk-icon spk-icon-icon-message',
			'error_icon_class'   => 'spk-icon-spk_error',
			'info_icon_class'    => 'spk-icon spk-icon-icon-message',
			'success_icon_class' => 'spk-icon spk-icon-success',
			'slide_out'			 => $shopkeeper_theme_options['notification_style']
		);

		wp_localize_script(
			'getbowtied-custom-notifications-scripts',
			'gbt_cn_info',
			apply_filters( 'gbt_cn_localize_script', $localize_script )
		);

	}
}
$custom_notif = new GBT_Custom_Notifications;