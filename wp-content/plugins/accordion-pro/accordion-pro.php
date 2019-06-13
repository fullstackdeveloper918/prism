<?php
/**
 * Plugin Name: Accordion Pro By Wpshopmart
 * Version: 5.5.1
 * Description: Accordion Pro by WPshopmart
 * Author: wpshopmart
 * Author URI: http://www.wpshopmart.com
 * Plugin URI: http://www.wpshopmart.com
 */
 
/* DEFINE PATHS */
define("wpshopmart_accordion_pro_directory_url", plugin_dir_url(__FILE__));
define("wpshopmart_accordion_pro_text_domain", "wpsm_accordion_pro");
add_action('plugins_loaded', 'wpsm_ac_pro');
function wpsm_ac_pro() {
	load_plugin_textdomain( wpshopmart_accordion_pro_text_domain, FALSE, dirname( plugin_basename(__FILE__)).'/lang/' );
}

function wpsm_ac_pro_default_data() {
	
			$Settings_Array = serialize( array(
				"acc_sec_title" 	 	    => "yes",
				"op_cl_icon" 		 		=> "1",
				"op_cl_icon_align" 	 		=> "left",
				"icon_sel_val" 	 			=> "1",
				"acc_title_icon"     		=> "yes",
				"acc_margin"   		 		=> "yes",
				"enable_toggle"    	 		=> "no",
				
				"acc_title_bg_clr"   		=> "#ffffff",
				"acc_title_icon_clr" 		=> "#000000",
				"acc_open_cl_icon_bg_clr" 	=> "#ffffff",
				"acc_open_cl_icon_ft_clr" 	=> "#000000",
				"sel_acc_title_bg_clr" 		=> "#1e73be",
				"sel_acc_title_ft_clr" 		=> "#ffffff",
				"sel_acc_op_cl_bg_clr" 		=> "#000000",
				"sel_acc_op_cl_ft_clr" 		=> "#ffffff",
				"on_hover_toggle" 			=> "no",
				"scroll_to" 				=> "no",
				"acc_desc_bg_clr"    		=> "#ffffff",
				"acc_desc_font_clr"  		=> "#000000",
				"title_size"         		=> "18",
				"des_size"     		 		=> "16",
				"font_family_allow"     	=> "yes",
				"font_family"     	 		=> "Arial",
				"font_family_group"     	=> "Default Fonts",
				"content_animation"     	=> "fadeIn",
				"expand_option"      		=> "1",
				"ac_styles"      			=> "1",
				"custom_css"      			=> "",
				"templates"      			=> "1",
				'ac_box_border' 			=>  "yes",
				'ac_box_border_clr' 		=> "#cccccc",
				'ac_box_border_size' 		=> "1",
				'ac_sel_top_border_clr' 	=> "#31a3dd",
				'ac_sel_top_border_size'	=> "3",
				'ac_margin_btw_tabs_content'=> "no",
				'ac_ft_weight'				=> "500",
				
				"acc_enable_ind_clr"   		=> "no",
				'acc_title_image_icon_type'		=> "1",
				'acc_title_image_icon_size_type'		=> "1",
				'acc_title_image_icon_size'		=> "18",
				'acc_des_height_type'		=> "1",
				'acc_des_cus_height'		=> "150",
				'acc_des_scroll_bg_clr'		=> "#ffffff",
				'acc_des_scroll_clr'		=> "#000000",
				'acc_des_scroll_width'		=> "3",
			
			) );

			add_option('wpsm_accordion_pro_default_settings', $Settings_Array);
}
register_activation_hook( __FILE__, 'wpsm_ac_pro_default_data' );

/**
 * Support and Our Products Page
 */
add_action('admin_menu' , 'wpsm_help_page_manu');
function wpsm_help_page_manu() {
	add_submenu_page('edit.php?post_type=wpsm_accordion_pro', __('Help and Support', wpshopmart_accordion_pro_text_domain), __('Help and Support', wpshopmart_accordion_pro_text_domain), 'administrator', 'wpsm_help_page', 'wpsm_help_page_funct');
	}
function wpsm_help_page_funct(){
	wp_enqueue_style('wpsm_bootstrap_help_css', wpshopmart_accordion_pro_directory_url.'assets/css/bootstrap.css');
	require_once('ink/help.php');
}
/**
 * PLUGIN Install
 */
require_once("ink/install/installation.php");

/**
 * CPT Register
 */
require_once("ink/admin/menu.php");

/**
 * SHORTCODE
 */
 
require_once("templates/shortcode.php");

 /**
WIDGET
*/
 require_once("ink/widget/widget.php");
 
 
// ==============================================
//	Add Links in Plugins Table
// ==============================================

// Add settings link on plugin page
function wpsm_ac_pro_settings_link($links) { 
  $settings_link = '<a href="edit.php?post_type=wpsm_accordion_pro">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'wpsm_ac_pro_settings_link' );

 
?>