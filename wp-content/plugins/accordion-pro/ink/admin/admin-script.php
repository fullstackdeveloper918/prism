<?php
	wp_enqueue_media();
	wp_enqueue_script('jquery-ui-datepicker');
	
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_script( 'wpsm_ac-color-pic', wpshopmart_accordion_pro_directory_url.'assets/js/color-picker.js', array( 'wp-color-picker' ), false, true );
	wp_enqueue_style('wpsm_ac-panel-style', wpshopmart_accordion_pro_directory_url.'assets/css/panel-style.css');
	
	wp_enqueue_style('wpsm_ac-panel-sidebar', wpshopmart_accordion_pro_directory_url.'assets/css/sidebar.css');
			
	wp_enqueue_style('wpsm_ac-font-awesome', wpshopmart_accordion_pro_directory_url.'assets/css/font-awesome/css/font-awesome.min.css');
	wp_enqueue_style('wpsm_ac_bootstrap', wpshopmart_accordion_pro_directory_url.'assets/css/bootstrap.css');
	wp_enqueue_style('font-awesome-picker', wpshopmart_accordion_pro_directory_url.'assets/css/fontawesome-iconpicker.css');
	wp_enqueue_style('ac_jquery-css', wpshopmart_accordion_pro_directory_url .'assets/css/ac_jquery-ui.css');
	wp_enqueue_style('ac_bootstrap-front_admin', wpshopmart_accordion_pro_directory_url .'assets/css/bootstrap-front.css');
	wp_enqueue_style('ac_animate_admin', wpshopmart_accordion_pro_directory_url .'assets/css/animate.css');
	
	wp_enqueue_style('ac_remodal-css', wpshopmart_accordion_pro_directory_url .'assets/modal/remodal.css');
	wp_enqueue_style('ac_remodal-default-theme-css', wpshopmart_accordion_pro_directory_url .'assets/modal/remodal-default-theme.css');
	
	wp_enqueue_script( 'wpsm_ac-bootstrap-js', wpshopmart_accordion_pro_directory_url.'assets/js/bootstrap.js');
	
	wp_enqueue_style('wpsm_ac_tooltip', wpshopmart_accordion_pro_directory_url.'assets/tooltip/darktooltip.css');
	wp_enqueue_script( 'wpsm_ac-tooltip-js', wpshopmart_accordion_pro_directory_url.'assets/tooltip/jquery.darktooltip.js');
	
	// settings
	wp_enqueue_style('wpsm_ac_settings-css', wpshopmart_accordion_pro_directory_url.'assets/css/settings.css');
	
	//icon picker	
	//wp_enqueue_script('font-icon-picker-js',wpshopmart_accordion_pro_directory_url.'assets/js/fontawesome-iconpicker.js',array('jquery'));
	//wp_enqueue_script('call-icon-picker-js',wpshopmart_accordion_pro_directory_url.'assets/js/call-icon-picker.js',array('jquery'), false, true);
	
	//icon picker
	wp_enqueue_script('wpsm_ac_admin_image_icon_picker',wpshopmart_accordion_pro_directory_url.'assets/js/media-upload-script.js');
	
	wp_enqueue_script('wpsm_ac_admin_font-icon-picker-js_all',wpshopmart_accordion_pro_directory_url.'assets/mul-type-icon-picker/icon-picker.js');
	wp_enqueue_style('wpsm_ac_admin_font-icon-picker_all', wpshopmart_accordion_pro_directory_url.'assets/mul-type-icon-picker/icon-picker.css');	
	wp_enqueue_style('wpsm_ac_admin_font-icon-picker-glyphicon_style',wpshopmart_accordion_pro_directory_url.'assets/mul-type-icon-picker/picker/glyphicon.css');
	wp_enqueue_style('wpsm_ac_admin_font-icon-picker-dashicons_style',wpshopmart_accordion_pro_directory_url.'assets/mul-type-icon-picker/picker/dashicons.css');
	
	
	
	//css editor 
	wp_enqueue_style('wpsm_tabs_r_codemirror-css', wpshopmart_accordion_pro_directory_url.'assets/codex/codemirror.css');
	wp_enqueue_style('wpsm_tabs_r_ambiance', wpshopmart_accordion_pro_directory_url.'assets/codex/ambiance.css');
	wp_enqueue_style('wpsm_tabs_r_show-hint-css', wpshopmart_accordion_pro_directory_url.'assets/codex/show-hint.css');
	
	wp_enqueue_script('wpsm_tabs_r_codemirror-js',wpshopmart_accordion_pro_directory_url.'assets/codex/codemirror.js',array('jquery'));
	wp_enqueue_script('wpsm_tabs_r_css-js',wpshopmart_accordion_pro_directory_url.'assets/codex/css.js',array('jquery'));
	wp_enqueue_script('wpsm_tabs_r_css-hint-js',wpshopmart_accordion_pro_directory_url.'assets/codex/css-hint.js',array('jquery'));
	
	
	wp_enqueue_script('remodal-min-js',wpshopmart_accordion_pro_directory_url.'assets/modal/remodal.min.js',array('jquery'), false, true);
	
?>