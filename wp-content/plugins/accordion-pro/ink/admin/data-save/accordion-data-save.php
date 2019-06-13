<?php
if(isset($PostID) && isset($_POST['ac_pro_save_data_action']) ) {
			$TotalCount = count($_POST['accordion_title']);
			$AccordionArray = array();
			if($TotalCount) {
				for($i=0; $i < $TotalCount; $i++) {
					$accordion_title = stripslashes(sanitize_text_field($_POST['accordion_title'][$i]));
					$accordion_title_icon = sanitize_text_field($_POST['accordion_title_icon'][$i]);
					$enable_single_icon = sanitize_text_field($_POST['enable_single_icon'][$i]);
					$accordion_title_image_icon=sanitize_text_field($_POST['accordion_title_image_icon'][$i]);
					$accordion_desc = stripslashes($_POST['accordion_desc'][$i]);
					$ind_title_icon_clr = sanitize_text_field($_POST['ind_title_icon_clr'][$i]);
					$ind_title_icon_bg_clr = sanitize_text_field($_POST['ind_title_icon_bg_clr'][$i]);
					$ind_des_clr = sanitize_text_field($_POST['ind_des_clr'][$i]);
					$ind_des_bg_clr = sanitize_text_field($_POST['ind_des_bg_clr'][$i]);
					$ind_open_cl_icon_clr = sanitize_text_field($_POST['ind_open_cl_icon_clr'][$i]);
					$ind_open_cl_icon_bg_clr = sanitize_text_field($_POST['ind_open_cl_icon_bg_clr'][$i]);
					$ind_acc_box_clr = sanitize_text_field($_POST['ind_acc_box_clr'][$i]);
					
					$AccordionArray[] = array(
						'accordion_title' => $accordion_title,
						'accordion_title_icon' => $accordion_title_icon,
						'enable_single_icon' => $enable_single_icon,
						'accordion_title_image_icon' => $accordion_title_image_icon,
						'accordion_desc' => $accordion_desc,
						'ind_title_icon_clr' => $ind_title_icon_clr,
						'ind_title_icon_bg_clr' => $ind_title_icon_bg_clr,
						'ind_des_clr' => $ind_des_clr,
						'ind_des_bg_clr' => $ind_des_bg_clr,
						'ind_open_cl_icon_clr' => $ind_open_cl_icon_clr,
						'ind_open_cl_icon_bg_clr' => $ind_open_cl_icon_bg_clr,
						'ind_acc_box_clr' => $ind_acc_box_clr,
					);
				}
				update_post_meta($PostID, 'wpsm_accordion_pro_data', serialize($AccordionArray));
				update_post_meta($PostID, 'wpsm_accordion_pro_count', $TotalCount);
			} else {
				$TotalCount = -1;
				update_post_meta($PostID, 'wpsm_accordion_pro_count', $TotalCount);
				$AccordionArray = array();
				update_post_meta($PostID, 'wpsm_accordion_pro_data', serialize($AccordionArray));
			}
		}
 ?>