<?php
if(isset($PostID) && isset($_POST['accordion_pro_setting_save_action'])) {
			$acc_sec_title 				= sanitize_option('acc_sec_title', $_POST['acc_sec_title']);
			$op_cl_icon      			= sanitize_option('op_cl_icon', $_POST['op_cl_icon']);
			$op_cl_icon_align      		= sanitize_option('op_cl_icon_align', $_POST['op_cl_icon_align']);
			$icon_sel_val      			= sanitize_option('icon_sel_val', $_POST['icon_sel_val']);
			$acc_title_icon 			= sanitize_option('acc_title_icon', $_POST['acc_title_icon']);
			$acc_margin     			= sanitize_option('acc_margin', $_POST['acc_margin']);
			$enable_toggle      		= sanitize_option('enable_toggle', $_POST['enable_toggle']);
			$expand_option      		= sanitize_option('expand_option',$_POST['expand_option']);
			$ac_styles          		= sanitize_option('ac_styles',$_POST['ac_styles']);
			$on_hover_toggle          	= sanitize_option('on_hover_toggle',$_POST['on_hover_toggle']);
			$scroll_to          		= sanitize_option('scroll_to',$_POST['scroll_to']);
			$font_family_allow  		= sanitize_option('font_family_allow',$_POST['font_family_allow']);
			$templates          		= sanitize_option('templates',$_POST['templates']);
			$ac_box_border          	= sanitize_option('ac_box_border',$_POST['ac_box_border']);
			$ac_margin_btw_tabs_content = sanitize_option('ac_margin_btw_tabs_content',$_POST['ac_margin_btw_tabs_content']);
			$acc_title_bg_clr   		= sanitize_text_field($_POST['acc_title_bg_clr']);
			$acc_title_icon_clr 		= sanitize_text_field($_POST['acc_title_icon_clr']);
			$acc_open_cl_icon_bg_clr 	= sanitize_text_field($_POST['acc_open_cl_icon_bg_clr']);
			$acc_open_cl_icon_ft_clr 	= sanitize_text_field($_POST['acc_open_cl_icon_ft_clr']);
			$sel_acc_title_bg_clr 		= sanitize_text_field($_POST['sel_acc_title_bg_clr']);
			$sel_acc_title_ft_clr 		= sanitize_text_field($_POST['sel_acc_title_ft_clr']);
			$sel_acc_op_cl_bg_clr 		= sanitize_text_field($_POST['sel_acc_op_cl_bg_clr']);
			$sel_acc_op_cl_ft_clr 		= sanitize_text_field($_POST['sel_acc_op_cl_ft_clr']);
			$acc_desc_bg_clr  			= sanitize_text_field($_POST['acc_desc_bg_clr']);
			$acc_desc_font_clr  		= sanitize_text_field($_POST['acc_desc_font_clr']);
			$title_size 				= sanitize_text_field($_POST['title_size']);
			$des_size         			= sanitize_text_field($_POST['des_size']);
			$font_family        		= sanitize_text_field($_POST['font_family']);
			$font_family_group        	= sanitize_text_field($_POST['font_family_group']);
			$content_animation        	= sanitize_text_field($_POST['content_animation']);
			$ac_box_border_clr        	= sanitize_text_field($_POST['ac_box_border_clr']);
			$ac_box_border_size        	= sanitize_text_field($_POST['ac_box_border_size']);
			$ac_sel_top_border_clr      = sanitize_text_field($_POST['ac_sel_top_border_clr']);
			$ac_sel_top_border_size      = sanitize_text_field($_POST['ac_sel_top_border_size']);
			$ac_ft_weight                = sanitize_text_field($_POST['ac_ft_weight']);
			$custom_css         		= stripslashes(sanitize_text_field($_POST['custom_css']));
			
			$acc_enable_ind_clr 					= sanitize_option('acc_enable_ind_clr', $_POST['acc_enable_ind_clr']);
			$acc_title_image_icon_type 				= sanitize_option('acc_title_image_icon_type', $_POST['acc_title_image_icon_type']);
			$acc_title_image_icon_size_type 		= sanitize_option('acc_title_image_icon_size_type', $_POST['acc_title_image_icon_size_type']);
			$acc_title_image_icon_size              = sanitize_text_field($_POST['acc_title_image_icon_size']);
			$acc_des_height_type 					= sanitize_option('acc_des_height_type', $_POST['acc_des_height_type']);
			$acc_des_cus_height             		 = sanitize_text_field($_POST['acc_des_cus_height']);
			$acc_des_scroll_bg_clr              	= sanitize_text_field($_POST['acc_des_scroll_bg_clr']);
			$acc_des_scroll_clr              		= sanitize_text_field($_POST['acc_des_scroll_clr']);
			$acc_des_scroll_width              		= sanitize_text_field($_POST['acc_des_scroll_width']);
			
			
			
		$Accordion_Settings_Array = serialize( array(
				'acc_sec_title' 		=> $acc_sec_title,
				'op_cl_icon' 			=> $op_cl_icon,
				'op_cl_icon_align' 		=> $op_cl_icon_align,
				'icon_sel_val' 			=> $icon_sel_val,
				'acc_title_icon' 		=> $acc_title_icon,
				'acc_margin'	 		=> $acc_margin,
				'enable_toggle' 		=> $enable_toggle,
				'expand_option' 		=> $expand_option,
				'ac_styles' 		    => $ac_styles,
				'on_hover_toggle' 		=> $on_hover_toggle,
				'scroll_to' 		    => $scroll_to,
				'acc_title_bg_clr' 		=> $acc_title_bg_clr,
				'acc_title_icon_clr'	=> $acc_title_icon_clr,
				'acc_open_cl_icon_bg_clr'	=> $acc_open_cl_icon_bg_clr,
				'sel_acc_op_cl_bg_clr'	=> $sel_acc_op_cl_bg_clr,
				'acc_open_cl_icon_ft_clr'	=> $acc_open_cl_icon_ft_clr,
				'sel_acc_title_bg_clr'	=> $sel_acc_title_bg_clr,
				'sel_acc_title_ft_clr'	=> $sel_acc_title_ft_clr,
				'sel_acc_op_cl_ft_clr'	=> $sel_acc_op_cl_ft_clr,
				'acc_desc_bg_clr' 		=> $acc_desc_bg_clr,
				'acc_desc_font_clr' 	=> $acc_desc_font_clr,
				'title_size' 			=> $title_size,
				'des_size' 				=> $des_size,
				'font_family' 			=> $font_family,
				'font_family_allow' 	=> $font_family_allow,
				'font_family_group' 	=> $font_family_group,
				'content_animation' 	=> $content_animation,
				'custom_css' 			=> $custom_css,
				'templates' 			=> $templates,
				'ac_box_border' 		=> $ac_box_border,
				'ac_box_border_clr' 	=> $ac_box_border_clr,
				'ac_box_border_size' 	=> $ac_box_border_size,
				'ac_sel_top_border_clr' => $ac_sel_top_border_clr,
				'ac_sel_top_border_size'=> $ac_sel_top_border_size,
				'ac_margin_btw_tabs_content'=> $ac_margin_btw_tabs_content,
				'ac_ft_weight'			=> $ac_ft_weight,
				
				'acc_enable_ind_clr'=> $acc_enable_ind_clr,
				'acc_title_image_icon_type'=> $acc_title_image_icon_type,
				'acc_title_image_icon_size_type'=> $acc_title_image_icon_size_type,
				'acc_title_image_icon_size'=> $acc_title_image_icon_size,
				'acc_des_height_type'=> $acc_des_height_type,
				'acc_des_cus_height'=> $acc_des_cus_height,
				'acc_des_scroll_bg_clr'=> $acc_des_scroll_bg_clr,
				'acc_des_scroll_clr'=> $acc_des_scroll_clr,
				'acc_des_scroll_width'=> $acc_des_scroll_width,
				
				) );

			update_post_meta($PostID, 'Accordion_Pro_Settings', $Accordion_Settings_Array);
		}
?>