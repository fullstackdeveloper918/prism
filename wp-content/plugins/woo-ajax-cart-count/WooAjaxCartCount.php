<?php
/*
Plugin Name: Woo Ajax Cart Count
Plugin URI: http://acewebx.com
Description: Woo Ajax Cart Count plugin allow you to show cart total any where in website, by simply place a shortcode.
Author: Web Ninja
Version: 1.3.6
Author URI: http://acewebx.com
*/
define('IACC_PLUGIN_URL', plugins_url('', __FILE__));
include('shortcode.php');


/**
 * Register the awesomeness and add IE7 support
 *
 * @global $wp_styles
 * @global $is_IE
 */
function imsAjaxCartCount_fa() {
  wp_enqueue_style( 'prefix-font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' );
}




function imsAjaxCartCount_adminStyle() 
{
  wp_enqueue_style('admin-style', IACC_PLUGIN_URL .'/admin/style.css'); 
} 
add_action( 'wp_enqueue_scripts', 'imsAjaxCartCount_fa' );
add_action( 'admin_enqueue_scripts', 'imsAjaxCartCount_adminStyle' );


function imsAjaxCartCount_registerSettings() {
   add_option( 'imsAjaxCartCount_optionIcon', 'fa-shopping-cart');
   add_option( 'imsAjaxCartCount_optionColor', '#000000');
   add_option( 'imsAjaxCartCount_optionFontSize', '13');
   register_setting( 'imsAjaxCartCount_optionsGroup', 'imsAjaxCartCount_optionIcon' );
   register_setting( 'imsAjaxCartCount_optionsGroup', 'imsAjaxCartCount_optionColor' );
   register_setting( 'imsAjaxCartCount_optionsGroup', 'imsAjaxCartCount_optionFontSize' );
}
add_action( 'admin_init', 'imsAjaxCartCount_registerSettings' );



function imsAjaxCartCount_optionsPage() {
  add_options_page('Ims Ajax Cart Count Setting', 'IMS Ajax Cart Count', 'manage_options', 'imsAjaxCartCount_Setting', 'imsAjaxCartCount_setting');
}
add_action('admin_menu', 'imsAjaxCartCount_optionsPage');


function imsAjaxCartCount_setting()
{
  include('admin/setting.php');
}



/**
   * Show row meta on the plugin screen.
   *
   * @param mixed $links Plugin Row Meta
   * @param mixed $file  Plugin Base file
   * @return  array
   */

function imsAjaxCartCount_rowMeta( $links, $file ) {

  if ( strpos( $file, 'WooAjaxCartCount.php' ) !== false ) 
  {
    $new_links = array(
            'imsAjaxCartCount_setting' => '<a href="options-general.php?page=imsAjaxCartCount_Setting">Settings</a>',
    );
    
    $links = array_merge( $links, $new_links );
  }
  
  return $links;
}
add_filter( 'plugin_row_meta', 'imsAjaxCartCount_rowMeta', 10, 2 );