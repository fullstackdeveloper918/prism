<?php  
$De_Settings = unserialize(get_option('wpsm_accordion_pro_default_settings'));
 $PostId = $post->ID;
 $Settings = unserialize(get_post_meta( $PostId, 'Accordion_Pro_Settings', true));

		$option_names = array(
			"acc_sec_title" 	 		=> $De_Settings['acc_sec_title'],
			"op_cl_icon" 		 		=> $De_Settings['op_cl_icon'],
			"op_cl_icon_align" 	 		=> $De_Settings['op_cl_icon_align'],
			"icon_sel_val" 	 			=> $De_Settings['icon_sel_val'],
			"acc_title_icon"     		=> $De_Settings['acc_title_icon'],
			"acc_margin"   		 		=> $De_Settings['acc_margin'],
			"enable_toggle"    	 		=> $De_Settings['enable_toggle'],
			"acc_title_bg_clr"   		=> $De_Settings['acc_title_bg_clr'],
			"acc_title_icon_clr" 		=> $De_Settings['acc_title_icon_clr'],
			"acc_open_cl_icon_bg_clr" 	=> $De_Settings['acc_open_cl_icon_bg_clr'],
			"acc_open_cl_icon_ft_clr" 	=> $De_Settings['acc_open_cl_icon_ft_clr'],
			"sel_acc_title_bg_clr" 		=> $De_Settings['sel_acc_title_bg_clr'],
			"sel_acc_title_ft_clr" 		=> $De_Settings['sel_acc_title_ft_clr'],
			"sel_acc_op_cl_bg_clr" 		=> $De_Settings['sel_acc_op_cl_bg_clr'],
			"sel_acc_op_cl_ft_clr" 		=> $De_Settings['sel_acc_op_cl_ft_clr'],
			"on_hover_toggle" 			=> $De_Settings['on_hover_toggle'],
			"scroll_to" 				=> $De_Settings['scroll_to'],
			"acc_desc_bg_clr"    		=> $De_Settings['acc_desc_bg_clr'],
			"acc_desc_font_clr"  		=> $De_Settings['acc_desc_font_clr'],
			"title_size"         		=> $De_Settings['title_size'],
			"des_size"     		 		=> $De_Settings['des_size'],
			"font_family_allow"     	=> $De_Settings['font_family_allow'],
			"font_family"     	 		=> $De_Settings['font_family'],
			"font_family_group"     	=> $De_Settings['font_family_group'],
			"content_animation"     	=> $De_Settings['content_animation'],
			"expand_option"      		=> $De_Settings['expand_option'],
			"ac_styles"      			=> $De_Settings['ac_styles'],
			"custom_css"      			=> $De_Settings['custom_css'],
			"templates"      			=> $De_Settings['templates'],
			'ac_box_border' 			=> $De_Settings['ac_box_border'],
			'ac_box_border_clr' 		=> $De_Settings['ac_box_border_clr'],
			'ac_box_border_size' 		=> $De_Settings['ac_box_border_size'],
			'ac_sel_top_border_clr' 	=> $De_Settings['ac_sel_top_border_clr'],
			'ac_sel_top_border_size'	=> $De_Settings['ac_sel_top_border_size'],
			'ac_margin_btw_tabs_content'	=> $De_Settings['ac_margin_btw_tabs_content'],
			'ac_ft_weight'	=> $De_Settings['ac_ft_weight'],
			
			
			);
			foreach($option_names as $option_name => $default_value) {
				if(isset($Settings[$option_name])) 
					${"" . $option_name}  = $Settings[$option_name];
				else
					${"" . $option_name}  = $default_value;
			}
		
		//for Latest Version
		$option_names = array(
			"acc_enable_ind_clr",
			"acc_title_image_icon_type",
			"acc_title_image_icon_size_type",
			"acc_title_image_icon_size",
			"acc_des_height_type",
			"acc_des_cus_height",
			"acc_des_scroll_bg_clr",
			"acc_des_scroll_clr",
			"acc_des_scroll_width",
			
			);
			foreach($option_names as $option_name ) 
			{
				if(isset($Settings[$option_name])) 
					${"" . $option_name}  = $Settings[$option_name];
				elseif(isset($De_Settings[$option_name])) 
					${"" . $option_name}  = $De_Settings[$option_name];
				else
				{
					switch($option_name)
					{
						case 'acc_enable_ind_clr' :
								$acc_enable_ind_clr='no';
						break;
						case 'acc_title_image_icon_type' :
								$acc_title_image_icon_type='1';
						break;
						case 'acc_title_image_icon_size_type' :
								$acc_title_image_icon_size_type='1';
						break;
						case 'acc_title_image_icon_size' :
								$acc_title_image_icon_size='18';
						break;
						case 'acc_des_height_type' :
								$acc_des_height_type='1';
						break;
						case 'acc_des_cus_height' :
								$acc_des_cus_height='150';
						break;
						case 'acc_des_scroll_bg_clr' :
								$acc_des_scroll_bg_clr='#ffffff';
						break;
						case 'acc_des_scroll_clr' :
								$acc_des_scroll_clr='#000000';
						break;
						case 'acc_des_scroll_width' :
								$acc_des_scroll_width='3';
						break;
					}
					
				}
			}

			
		?>
<style>

#accordion_setting{
	min-width: 255px;
	border: 0px solid #e5e5e5;
	box-shadow: 0 0px 0px rgba(0,0,0,.0);
	background: #fff;
}
#accordion_setting .hndle  , #accordion_setting .handlediv {
	display:none
}
.sel-icon-wrapper{
	
	-webkit-box-shadow: 1px 1px 11px rgba(0, 0, 0, 0.5);
    box-shadow: 1px 1px 11px rgba(0, 0, 0, 0.5);
    padding: 0px;
     overflow: hidden;
	  cursor: pointer;
	 display:block;
	 margin-bottom:20px;
	 border : 3px solid transparent;
}
.sel-icon-wrapper.active{
	border : 3px solid #489643;
}
.sel-icon-wrapper:hover{
	border : 3px solid #489643;
}
.sel-icon-wrapper .lefti{
	
	padding: 5px;
	display:block;
	font-weight:900;
	    font-size: 19px;
    text-align: center;
    border-bottom: 1px solid #C5C2C2;
}

.sel-icon-wrapper .righti{
    padding: 5px;
	font-size: 19px;
    display:block;
	font-weight:900;
    text-align: center;
}
.sel-icon-wrapper .checked {
	position: absolute;
    background: #489643;
	color: #fff;
    top: -8px;
    right: 0px;
    border-radius: 50%;
    width: 25px;
    height: 25px;
    text-align: center;
    line-height: 24px;
	opacity:0;
}

.sel-icon-wrapper.active .checked{
	
	opacity:1;
}
.selected_label_color{
	color:#31a3dd;
}
.wpsm_site_sidebar_widget_title2{
	
	margin-left: 9px;
    margin-right: 2px;
    background: #31a3dd;
    padding: 10px;
    font-size: 20px;
    text-transform: uppercase;
    text-align: center;
    border-bottom: 9px double #FFF;
    box-shadow: 8px 8px 15px rgba(0,0,0,.4);
	margin-bottom:10px;
}
.wpsm_site_sidebar_widget_title2 h5{
	color: #fff !important;
	margin: 0px !important;
}

.op_cl_icon_box{
	
	padding-left:5px !important;
	padding-right:5px !important;
	
}
</style>
<Script>

 //font slider size script
  jQuery(function() {
    jQuery( "#title_size_id" ).slider({
		orientation: "horizontal",
		range: "min",
		max: 30,
		min:5,
		slide: function( event, ui ) {
		jQuery( "#title_size" ).val( ui.value );
      }
		});
		
		jQuery( "#title_size_id" ).slider("value",<?php if(isset($title_size)){ echo $title_size; } else{ echo 17; }  ?> );
		jQuery( "#title_size" ).val( jQuery( "#title_size_id" ).slider( "value") );
    
  });
  
  function select_icon(id){
	  jQuery(".sel-icon-wrapper").removeClass("active");
	  jQuery("#icon_"+id).addClass("active");
	  jQuery("#icon_sel_val_"+id).prop( "checked", true );
	  
  }
  function get_font_group(){
	  
	 var family_group = jQuery('#font_family option:selected').closest('optgroup').prop('label');
	 jQuery("#font_family_group").val(family_group);
			
  }
</script>
<Script>
	//font slider size script
	jQuery(function() {
		jQuery( "#des_size_id" ).slider({
			orientation: "horizontal",
			range: "min",
			max: 30,
			min:5,
			slide: function( event, ui ) {
			jQuery( "#des_size" ).val( ui.value );
		  }
		});
		
		jQuery( "#des_size_id" ).slider("value",<?php if(isset($des_size)){ echo $des_size; } else{ echo 16; }  ?>);
		jQuery( "#des_size" ).val( jQuery( "#des_size_id" ).slider( "value") );
    
	});
</script>
<Script>
	//font slider size script
	jQuery(function() {
		jQuery( "#ac_box_border_size_id" ).slider({
			orientation: "horizontal",
			range: "min",
			max: 10,
			min:1,
			slide: function( event, ui ) {
			jQuery( "#ac_box_border_size" ).val( ui.value );
		  }
		});
		
		jQuery( "#ac_box_border_size_id" ).slider("value",<?php if(isset($ac_box_border_size)){ echo $ac_box_border_size; } else{ echo 1; }  ?>);
		jQuery( "#ac_box_border_size" ).val( jQuery( "#ac_box_border_size_id" ).slider( "value") );
    
	});
</script> 
<Script>
	//font slider size script
	jQuery(function() {
		jQuery( "#ac_sel_top_border_size_id" ).slider({
			orientation: "horizontal",
			range: "min",
			max: 10,
			min:1,
			slide: function( event, ui ) {
			jQuery( "#ac_sel_top_border_size" ).val( ui.value );
		  }
		});
		
		jQuery( "#ac_sel_top_border_size_id" ).slider("value",<?php if(isset($ac_sel_top_border_size)){ echo $ac_sel_top_border_size; } else{ echo 1; }  ?>);
		jQuery( "#ac_sel_top_border_size" ).val( jQuery( "#ac_sel_top_border_size_id" ).slider( "value") );

	});
</script>

<Script>
	//font slider size script
	jQuery(function() {
		jQuery( "#ac_ft_weight_id" ).slider({
			orientation: "horizontal",
			range: "min",
			max: 900,
			min:100,
			step: 100,
			slide: function( event, ui ) {
			jQuery( "#ac_ft_weight" ).val( ui.value );
		  }
		});
		
		jQuery( "#ac_ft_weight_id" ).slider("value",<?php if(isset($ac_ft_weight)){ echo $ac_ft_weight; } else{ echo 500; }  ?>);
		jQuery( "#ac_ft_weight" ).val( jQuery( "#ac_ft_weight_id" ).slider( "value") );

	});
</script> 
<Script>
	//font slider size script
	jQuery(function() {
		jQuery( "#acc_des_scroll_width_id" ).slider({
			orientation: "horizontal",
			range: "min",
			max: 15,
			min:3,
			slide: function( event, ui ) {
			jQuery( "#acc_des_scroll_width" ).val( ui.value );
		  }
		});
		
		jQuery( "#acc_des_scroll_width_id" ).slider("value",<?php if(isset($acc_des_scroll_width)){ echo $acc_des_scroll_width; } else{ echo 3; }  ?>);
		jQuery( "#acc_des_scroll_width" ).val( jQuery( "#acc_des_scroll_width_id" ).slider( "value") );
    
	});
</script>
<Script>
function hide_color_setting(){
				
			 value = jQuery("input[name=acc_enable_ind_clr]:checked").val();
			 
			 if(value=="no"){
				jQuery(".ac_commn_clr_option_class").show(500);
				jQuery(".ac_ind_clr_option_class").hide(500);
				
			}else{
				jQuery(".ac_ind_clr_option_class").show(500);
				jQuery(".ac_commn_clr_option_class").hide(500);
				
			}
			
		}
	
</Script>

<Script>
// Hide and show icon Settings
function fn_ac_icon_setting()
{
	 icon_type = jQuery("input[name=acc_title_image_icon_type]:checked").val();
	 icon_img_Size_type = jQuery("input[name=acc_title_image_icon_size_type]:checked").val();
	 
	 switch(icon_type)
	 {	
		case "1":
			jQuery(".cls_acc_title_image_icon_size_type").hide(500);
			jQuery(".cls_acc_title_image_icon_size").hide(500);
			
			jQuery(".icon_icon_cls").show(500);
			jQuery(".icon_img_size_settings_cls").hide(500);
		break;
		case "2":
			
			jQuery(".cls_acc_title_image_icon_size_type").show(500);
			jQuery(".icon_icon_cls").hide(500);
			jQuery(".icon_img_size_settings_cls").show(500);
			if(icon_img_Size_type=='1')
			{
				jQuery(".cls_acc_title_image_icon_size").hide(500);
			}
			else
			{
				jQuery(".cls_acc_title_image_icon_size").show(500);
			}
		break;
		
	 }
	 
}
</Script>
<Script>
// Hide and show icon Settings
function fn_ac_des_height_setting()
{
	 var_acc_des_height_type = jQuery("input[name=acc_des_height_type]:checked").val();
	 
	 switch(var_acc_des_height_type)
	 {	
		case "1":
			jQuery(".wpsm_acc_des_height_cls").hide(500);
			
		break;
		case "2":
			
			jQuery(".wpsm_acc_des_height_cls").show(500);
		break;
		
	 }
	 
}
</Script>
<Script>
function updte_wpsm_ac_pro_default_settings(){
	 jQuery.ajax({
		url: location.href,
		type: "POST",
		data : {
			    'action_ac_pro':'updte_wpsm_ac_pro_default_settings',
			     },
                success : function(data){
									alert("Default Settings Updated");
									location.reload(true);
                                   }	
	});
	
}
</script>

<?php

if(isset($_POST['action_ac_pro']) == "updte_wpsm_ac_pro_default_settings")
	{
	
		$Settings_Array = serialize( array(
				"acc_sec_title" 	 	    => $acc_sec_title,
				"op_cl_icon" 		 		=> $op_cl_icon,
				"op_cl_icon_align" 	 		=> $op_cl_icon_align,
				"icon_sel_val" 	 			=> $icon_sel_val,
				"acc_title_icon"     		=> $acc_title_icon,
				"acc_margin"   		 		=> $acc_margin,
				"enable_toggle"    	 		=> $enable_toggle,
				"acc_title_bg_clr"   		=> $acc_title_bg_clr,
				"acc_title_icon_clr" 		=> $acc_title_icon_clr,
				"acc_open_cl_icon_bg_clr" 	=> $acc_open_cl_icon_bg_clr,
				"acc_open_cl_icon_ft_clr" 	=> $acc_open_cl_icon_ft_clr,
				"sel_acc_title_bg_clr" 		=> $sel_acc_title_bg_clr,
				"sel_acc_title_ft_clr" 		=> $sel_acc_title_ft_clr,
				"sel_acc_op_cl_bg_clr" 		=> $sel_acc_op_cl_bg_clr,
				"sel_acc_op_cl_ft_clr" 		=> $sel_acc_op_cl_ft_clr,
				"on_hover_toggle" 			=> $on_hover_toggle,
				"scroll_to" 				=> $scroll_to,
				"acc_desc_bg_clr"    		=> $acc_desc_bg_clr,
				"acc_desc_font_clr"  		=> $acc_desc_font_clr,
				"title_size"         		=> $title_size,
				"des_size"     		 		=> $des_size,
				"font_family_allow"     	=> $font_family_allow,
				"font_family"     	 		=> $font_family,
				"font_family_group"     	=> $font_family_group,
				"content_animation"     	=> $content_animation,
				"expand_option"      		=> $expand_option,
				"ac_styles"      			=> $ac_styles,
				"custom_css"      			=> $custom_css,
				"templates"      			=> $templates,
				'ac_box_border' 			=> $ac_box_border,
				'ac_box_border_clr' 		=> $ac_box_border_clr,
				'ac_box_border_size' 		=> $ac_box_border_size,
				'ac_sel_top_border_clr' 	=> $ac_sel_top_border_clr,
				'ac_sel_top_border_size'	=> $ac_sel_top_border_size,
				'ac_margin_btw_tabs_content'=> $ac_margin_btw_tabs_content,
				'ac_ft_weight'=> $ac_ft_weight,
				
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

			update_option('wpsm_accordion_pro_default_settings', $Settings_Array);
}

 ?> 
<input type="hidden" id="accordion_pro_setting_save_action" name="accordion_pro_setting_save_action" value="accordion_pro_setting_save_action">
		
	<div class="wpsm_site_sidebar_widget_title" style="margin-left:-13px;margin-right:-13px;border-radius: 3px;margin-bottom:5px">
		<h4 style="border-top-left-radius: 2px;"><?php _e('Accordion Settings ',wpshopmart_accordion_pro_text_domain); ?></h4>
	</div>
			
<table class="form-table acc_table">
	<tbody>
		
		<tr style="display:none">
			<th scope="row"><label><?php _e('Display Accordion Section Title ',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#acc_sec_title_tp"><i class="fa fa-lightbulb-o"></i></a>
				</th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="acc_sec_title" value="yes" id="enable_acc_sec_title" <?php if($acc_sec_title == 'yes' ) { echo "checked"; } ?>   >
					<label for="enable_acc_sec_title" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_accordion_pro_text_domain); ?></label>
					<input type="radio" class="switch-input" name="acc_sec_title" value="no" id="disable_acc_sec_title"  <?php if($acc_sec_title == 'no' ) { echo "checked"; } ?> >
					<label for="disable_acc_sec_title" class="switch-label switch-label-on"><?php _e('No',wpshopmart_accordion_pro_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<div id="acc_sec_title_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Display Accordion Section Title ',wpshopmart_accordion_pro_text_domain); ?></h2>
							<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/faq-section.png'; ?>">
					
					</div>
		    	</div>
			</td>
		</tr>
		
		
		<tr style="border-bottom:0px;">
			<th>
				<div class="wpsm_site_sidebar_widget_title2">
					<h5>Accordion color And Font Settings</h5>
				</div>
			</th>
		</tr>
		<tr>
			<th scope="row"><label><?php _e('Enable Individual Color Option ',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#cb_ind_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
			
			</th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="acc_enable_ind_clr" value="yes" id="enable_tab_ind_clr_enable" <?php if($acc_enable_ind_clr== 'yes'){echo "checked";} ?>  onchange="hide_color_setting()">
					<label for="enable_tab_ind_clr_enable" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_accordion_pro_text_domain); ?></label>
					<input type="radio" class="switch-input" name="acc_enable_ind_clr" value="no" id="disable_tab_ind_clr_enable" <?php if($acc_enable_ind_clr== 'no'){echo "checked";} ?>  onchange="hide_color_setting()">
					<label for="disable_tab_ind_clr_enable" class="switch-label switch-label-on"><?php _e('No',wpshopmart_accordion_pro_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<div id="cb_ind_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Enable your individual color settings from here, if you want to show different color for each box',wpshopmart_accordion_pro_text_domain); ?></h2>
					</div>
		    	</div>
			</td>
		</tr>
		<tr class="ac_commn_clr_option_class" style="<?php if($acc_enable_ind_clr!='no'){echo "display:none;";}?>">
			<th scope="row"><label><?php _e('Accordion Title/Icon Font Color',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#acc_title_icon_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<input id="acc_title_icon_clr" name="acc_title_icon_clr" type="text" value="<?php echo $acc_title_icon_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
				<!-- Tooltip -->
				<div id="acc_title_icon_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Accordion Title/Icon Font Color',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/title-color.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		
		<tr class="ac_commn_clr_option_class" style="<?php if($acc_enable_ind_clr!='no'){echo "display:none;";}?>">
			<th scope="row"><label><?php _e('Accordion Title Background Color',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#acc_title_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<input id="acc_title_bg_clr" name="acc_title_bg_clr" type="text" value="<?php echo $acc_title_bg_clr; ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<!-- Tooltip -->
				<div id="acc_title_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Accordion Title Background Color',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/title-bg-color.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><span class="selected_label_color"><?php _e('Selected/Hover',wpshopmart_accordion_pro_text_domain); ?></span> <?php _e('Accordion Title/Icon Font Color',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#sel_acc_title_ft_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<input id="sel_acc_title_ft_clr" name="sel_acc_title_ft_clr" type="text" value="<?php echo $sel_acc_title_ft_clr; ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<!-- Tooltip -->
				<div id="sel_acc_title_ft_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Selected/Opened Accordion Title Font Color, it is also applicable on hover color',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/sel-title-ft-clr.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><span class="selected_label_color"><?php _e('Selected/Hover',wpshopmart_accordion_pro_text_domain); ?></span> <?php _e('Accordion Title Background Color',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#sel_acc_title_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<input id="sel_acc_title_bg_clr" name="sel_acc_title_bg_clr" type="text" value="<?php echo $sel_acc_title_bg_clr; ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<!-- Tooltip -->
				<div id="sel_acc_title_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Selected/Opened Accordion Title Background Color,it is also applicable on hover color',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/sel-title-bg-clr.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr class="ac_commn_clr_option_class" style="<?php if($acc_enable_ind_clr!='no'){echo "display:none;";}?>">
			<th scope="row"><label><?php _e('Description Font Color',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#acc_desc_font_clr_tp" data-tooltip="#acc_desc_font_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<input id="acc_desc_font_clr" name="acc_desc_font_clr" type="text" value="<?php echo $acc_desc_font_clr; ?>" class="my-color-field" data-default-color="#000000" />
				<!-- Tooltip -->
				<div id="acc_desc_font_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Faq Description Font Colour',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/iocn-bg-color.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr class="ac_commn_clr_option_class" style="<?php if($acc_enable_ind_clr!='no'){echo "display:none;";}?>">
			<th scope="row"><label><?php _e('Description Background Color',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#acc_desc_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<input id="acc_desc_bg_clr" name="acc_desc_bg_clr" type="text" value="<?php echo $acc_desc_bg_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
				<!-- Tooltip -->
				<div id="acc_desc_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Faq Description Background Colour',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/soft.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		<tr class="ac_commn_clr_option_class ap_cl_group" <?php if($op_cl_icon=="3" || $acc_enable_ind_clr!='no') { ?> style="display:none" <?php } ?>>
			<th scope="row"><label><?php _e('Accordion Open/close Icon Font Colour',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#acc_open_cl_icon_ft_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<input id="acc_open_cl_icon_ft_clr" name="acc_open_cl_icon_ft_clr" type="text" value="<?php echo $acc_open_cl_icon_ft_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
				<!-- Tooltip -->
				<div id="acc_open_cl_icon_ft_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Accordion Open/close Icon Font Color',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/op-cl-ft-clr.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr class="ac_commn_clr_option_class ap_cl_group" <?php if($op_cl_icon=="3" || $acc_enable_ind_clr!='no') { ?> style="display:none" <?php } ?>>
			<th scope="row"><label><?php _e('Accordion Open/Close Icon Background Color',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#acc_open_cl_icon_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<input id="acc_open_cl_icon_bg_clr" name="acc_open_cl_icon_bg_clr" type="text" value="<?php echo $acc_open_cl_icon_bg_clr; ?>" class="my-color-field" data-default-color="#dd3333" />
				<!-- Tooltip -->
				<div id="acc_open_cl_icon_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Set Your Accordion Open/Close Icon Background Color here',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/icon-bg-clr.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr class="ap_cl_group" <?php if($op_cl_icon=="3") { ?> style="display:none" <?php } ?>>
			<th scope="row"><label><span class="selected_label_color"><?php _e('Selected/Hover',wpshopmart_accordion_pro_text_domain); ?></span> <?php _e('Accordion Open/Close Icon Color',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#sel_acc_op_cl_ft_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<input id="sel_acc_op_cl_ft_clr" name="sel_acc_op_cl_ft_clr" type="text" value="<?php echo $sel_acc_op_cl_ft_clr; ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<!-- Tooltip -->
				<div id="sel_acc_op_cl_ft_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Update Your Selected/Opened Accordion Open/Close Icon Font Color Here , it is also applicable on hover color',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/sel-op-cl-bg-clr.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr class="ap_cl_group" <?php if($op_cl_icon=="3") { ?> style="display:none" <?php } ?>>
			<th scope="row"><label><span class="selected_label_color"><?php _e('Selected/Hover',wpshopmart_accordion_pro_text_domain); ?></span> <?php _e('Accordion Open/Close Background Colour',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#sel_acc_op_cl_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<input id="sel_acc_op_cl_bg_clr" name="sel_acc_op_cl_bg_clr" type="text" value="<?php echo $sel_acc_op_cl_bg_clr; ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<!-- Tooltip -->
				<div id="sel_acc_op_cl_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Update Your Selected/Opened Accordion Open/Close Icon Background Color Here , it is also applicable on hover color',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/sel-op-cl-bg-clr.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		<tr class="ac_commn_clr_option_class " <?php if($ac_box_border=="no" || $acc_enable_ind_clr!='no') { ?> style="display:none" <?php } ?>>
			<th scope="row"><label><?php _e('Accordion Box Border Color',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#ac_box_border_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				</th>
			<td>
				<input id="ac_box_border_clr" name="ac_box_border_clr" type="text" value="<?php echo $ac_box_border_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
				
				<!-- Tooltip -->
				<div id="ac_box_border_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Select Your Accordion Box Border Color Here',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/box-border-color.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php _e('Accordion Title Icon Type',wpshopmart_accordion_pro_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#expand_option_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="acc_title_image_icon_type" id="acc_title_image_icon_type" value="1" <?php if($acc_title_image_icon_type == '1' ) { echo "checked"; } ?> onchange="fn_ac_icon_setting()"/> Icon </span>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="acc_title_image_icon_type" id="acc_title_image_icon_type" value="2" <?php if($acc_title_image_icon_type == '2' ) { echo "checked"; } ?>  onchange="fn_ac_icon_setting()"/> Image  Icon</span>
				<!-- Tooltip -->
				<div id="expand_option_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Expand/Collapse Accordion Option On Page Load',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/iocn-bg-color.png'; ?>">
						
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/toggle.png'; ?>">
					
					</div>
		    	</div>
			</td>
		</tr>
		<tr class="cls_acc_title_image_icon_size_type" style="<?php if($acc_title_image_icon_type=='1'){echo "display:none;";}?>">
			<th scope="row"><label><?php _e('Accordion Image Icon Size Type',wpshopmart_accordion_pro_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#expand_option_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="acc_title_image_icon_size_type" id="acc_title_image_icon_size_type" value="1" <?php if($acc_title_image_icon_size_type == '1' ) { echo "checked"; } ?> onchange="fn_ac_icon_setting()" /> Same as Title/Icon Font Size </span>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="acc_title_image_icon_size_type" id="acc_title_image_icon_size_type" value="2" <?php if($acc_title_image_icon_size_type == '2' ) { echo "checked"; } ?>  onchange="fn_ac_icon_setting()" /> Custum Image Icon Size</span>
				<!-- Tooltip -->
				<div id="expand_option_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Expand/Collapse Accordion Option On Page Load',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/iocn-bg-color.png'; ?>">
						
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/toggle.png'; ?>">
					
					</div>
		    	</div>
			</td>
		</tr>
		<tr class="cls_acc_title_image_icon_size" style="<?php if($acc_title_image_icon_type=='1' || $acc_title_image_icon_size_type=='1'){echo "display:none;";}?>">
			<th scope="row"><label><?php _e('Accordion Image Icon Size',wpshopmart_accordion_pro_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#expand_option_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<span style="display:block;margin-bottom:10px"><input type="number" name="acc_title_image_icon_size" id="acc_title_image_icon_size" value="<?php echo $acc_title_image_icon_size; ?>" /> Px</span>
				<!-- Tooltip -->
				<div id="expand_option_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Expand/Collapse Accordion Option On Page Load',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/iocn-bg-color.png'; ?>">
						
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/toggle.png'; ?>">
					
					</div>
		    	</div>
			</td>
		</tr>
		<tr class="setting_color">
			<th><label><?php _e('Title/Icon Font Size',wpshopmart_accordion_pro_text_domain); ?> </label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#title_size_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td style="padding-left: 11px;">
				<div id="title_size_id" class="size-slider" ></div>
				<input type="text" class="slider-text" id="title_size" name="title_size"  readonly="readonly">
				<!-- Tooltip -->
				<div id="title_size_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;">You can update Title and Icon Font Size from here. Just Scroll it to change size.</h2>
					
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr class="setting_color">
			<th><label><?php _e('Description Font Size',wpshopmart_accordion_pro_text_domain); ?> </label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#des_size_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td style="padding-left: 11px;">
				<div id="des_size_id" class="size-slider" ></div>
				<input type="text" class="slider-text" id="des_size" name="des_size"  readonly="readonly">
				<!-- Tooltip -->
				<div id="des_size_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;">You can update Description Font Size from here. Just Scroll it to change size.</h2>
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Enable Font Family',wpshopmart_accordion_pro_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#font_family_allow_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="font_family_allow" value="yes" id="enable_font_family_allow" <?php if($font_family_allow == 'yes' ) { echo "checked"; } ?>   >
					<label for="enable_font_family_allow" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_accordion_pro_text_domain); ?></label>
					<input type="radio" class="switch-input" name="font_family_allow" value="no" id="disable_font_family_allow"  <?php if($font_family_allow == 'no' ) { echo "checked"; } ?> >
					<label for="disable_font_family_allow" class="switch-label switch-label-on"><?php _e('No',wpshopmart_accordion_pro_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<div id="font_family_allow_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Enable/Disable Font Family here (For apply your theme font family on your accordion)',wpshopmart_accordion_pro_text_domain); ?></h2>
						
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th><?php _e('Font Style/Family',wpshopmart_accordion_pro_text_domain); ?> 
			<a  class="ac_tooltip" href="#help" data-tooltip="#font_family_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<?php if(!isset($font_family)) $font_family = "Open Sans";
				require_once("font-family.php");
				?>	
				<input type="hidden" name="font_family_group" id="font_family_group" value="<?php echo $font_family_group; ?>" />
				<!-- Tooltip -->
				<div id="font_family_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;">You can update Title and Description Font Family/Style from here. Select any one form these options.</h2>
					
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr class="setting_color">
			<th><label><?php _e('Accordion Title Font Weight',wpshopmart_accordion_pro_text_domain); ?> </label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#ac_ft_weight_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td style="padding-left: 11px;">
				<div id="ac_ft_weight_id" class="size-slider" ></div>
				<input type="text" class="slider-text" id="ac_ft_weight" name="ac_ft_weight"  readonly="readonly">
				<!-- Tooltip -->
				<div id="ac_ft_weight_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;">Set your Accordion title font Weight(boldness) from here</h2>
					</div>
		    	</div>
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php _e('Display Accordion Icon Of Title',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#acc_title_icon_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="acc_title_icon" value="yes" id="enable_acc_title_icon" <?php if($acc_title_icon == 'yes' ) { echo "checked"; } ?>  >
					<label for="enable_acc_title_icon" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_accordion_pro_text_domain); ?></label>
					<input type="radio" class="switch-input" name="acc_title_icon" value="no" id="disable_acc_title_icon" <?php if($acc_title_icon == 'no' ) { echo "checked"; } ?> >
					<label for="disable_acc_title_icon" class="switch-label switch-label-on"><?php _e('No',wpshopmart_accordion_pro_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<div id="acc_title_icon_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Hide/Display Faq Title Font Icon ',wpshopmart_accordion_pro_text_domain); ?></h2>
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr style="border-bottom:0px;">
			<th>
				<div class="wpsm_site_sidebar_widget_title2">
					<h5>Accordion Open/close Icon Settings</h5>
				</div>
			</th>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Open Close Icon Display Option',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#op_cl_icon_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				
				<span style="display:block;margin-bottom:10px"><input type="radio" name="op_cl_icon" id="op_cl_icon" onchange="op_cl_icon_number_select()" value="1" <?php if($op_cl_icon == '1' ) { echo "checked"; } ?> /> Display Open Close Icon Only </span>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="op_cl_icon" id="op_cl_icon" onchange="op_cl_icon_number_select()" value="2" <?php if($op_cl_icon == '2' ) { echo "checked"; } ?>  /> Display Number Only </span>
				<span style="display:block"><input type="radio" name="op_cl_icon" id="op_cl_icon" value="3" onchange="op_cl_icon_number_select()"  <?php if($op_cl_icon == '3' ) { echo "checked"; } ?> /> Hide Both </span>
				
				
				<!-- Tooltip -->
				<div id="op_cl_icon_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Select your open/close icon number or number option here ',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/icon-number.png'; ?>">
					
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr class="ap_cl_group" <?php if($op_cl_icon=="3") { ?> style="display:none" <?php } ?>>
			<th scope="row"><label><?php _e(' Open Close Icon Alignment',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#op_cl_icon_algin_tp"><i class="fa fa-lightbulb-o"></i></a>
				</th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="op_cl_icon_align" value="left" id="enable_op_cl_icon_algin" <?php if($op_cl_icon_align == 'left' ) { echo "checked"; } ?>   >
					<label for="enable_op_cl_icon_algin" class="switch-label switch-label-off"><?php _e('left',wpshopmart_accordion_pro_text_domain); ?></label>
					<input type="radio" class="switch-input" name="op_cl_icon_align" value="right" id="disable_op_cl_icon_algin"  <?php if($op_cl_icon_align == 'right' ) { echo "checked"; } ?> >
					<label for="disable_op_cl_icon_algin" class="switch-label switch-label-on"><?php _e('right',wpshopmart_accordion_pro_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<div id="op_cl_icon_algin_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Set your open/close icon position here',wpshopmart_accordion_pro_text_domain); ?></h2>
							<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/left-right.png'; ?>">
					
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr class="ap_cl_group" <?php if($op_cl_icon=="3") { ?> style="display:none" <?php } ?>>
			<th scope="row"><label><?php _e('Select Open Close Icon',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#select_op_cl_icon_tp"><i class="fa fa-lightbulb-o"></i></a>
				</th>
			<td>
				<span class="col-md-3 col-sm-6 op_cl_icon_box">
					<span class="sel-icon-wrapper <?php if($icon_sel_val == '1' ) { echo "active"; } ?>" id="icon_1" onclick="select_icon(1)">
						<span class="checked"><i class="fa fa-check"></i></span>
						<span class="lefti"><i class="fa fa-plus"></i></span>
						<span class="righti"><i class="fa fa-minus"></i></span>
						<input type="radio" name="icon_sel_val" id="icon_sel_val_1" value="1"  <?php if($icon_sel_val == '1' ) { echo "checked"; } ?> style="display:none"   />
						
					</span>	
				</span>
				
				<span class="col-md-3 col-sm-6 op_cl_icon_box">
					<span class="sel-icon-wrapper <?php if($icon_sel_val == '2' ) { echo "active"; } ?>" id="icon_2" onclick="select_icon(2)">
						<span class="checked"><i class="fa fa-check"></i></span>
						<span class="lefti"><i class="fa fa-check"></i></span>
						<span class="righti"><i class="fa fa-times"></i></span>
						<input type="radio" name="icon_sel_val" id="icon_sel_val_2" value="2" <?php if($icon_sel_val == '2' ) { echo "checked"; } ?>   style="display:none"   />
						
					</span>	
				</span>
				
				<span class="col-md-3 col-sm-6 op_cl_icon_box">
					<span class="sel-icon-wrapper <?php if($icon_sel_val == '3' ) { echo "active"; } ?>" id="icon_3" onclick="select_icon(3)">
						<span class="checked"><i class="fa fa-check"></i></span>
						<span class="lefti"><i class="fa fa-arrow-right"></i></span>
						<span class="righti"><i class="fa fa-arrow-down"></i></span>
						<input type="radio" name="icon_sel_val" id="icon_sel_val_3" value="3" <?php if($icon_sel_val == '3' ) { echo "checked"; } ?>   style="display:none"   />
						
					</span>	
				</span>
				
				<span class="col-md-3 col-sm-6 op_cl_icon_box">
					<span class="sel-icon-wrapper <?php if($icon_sel_val == '4' ) { echo "active"; } ?>" id="icon_4" onclick="select_icon(4)">
						<span class="checked"><i class="fa fa-check"></i></span>
						<span class="lefti"><i class="fa fa-caret-right"></i></span>
						<span class="righti"><i class="fa fa-caret-down"></i></span>
						<input type="radio" name="icon_sel_val" id="icon_sel_val_4" value="4" <?php if($icon_sel_val == '4' ) { echo "checked"; } ?>  style="display:none"   />
						
					</span>	
				</span>
				
				<span class="col-md-3 col-sm-6 op_cl_icon_box">
					<span class="sel-icon-wrapper <?php if($icon_sel_val == '5' ) { echo "active"; } ?>" id="icon_5" onclick="select_icon(5)">
						<span class="checked"><i class="fa fa-check"></i></span>
						<span class="lefti"><i class="fa fa-angle-right"></i></span>
						<span class="righti"><i class="fa fa-angle-down"></i></span>
						<input type="radio" name="icon_sel_val" id="icon_sel_val_5" value="5" <?php if($icon_sel_val == '5' ) { echo "checked"; } ?>  style="display:none"   />
						
					</span>	
				</span>
				
				<span class="col-md-3 col-sm-6 op_cl_icon_box" >
					<span class="sel-icon-wrapper <?php if($icon_sel_val == '6' ) { echo "active"; } ?>" id="icon_6" onclick="select_icon(6)">
						<span class="checked"><i class="fa fa-check"></i></span>
						<span class="lefti"><i class="fa fa-angle-double-right"></i></span>
						<span class="righti"><i class="fa fa-angle-double-down"></i></span>
						<input type="radio" name="icon_sel_val" id="icon_sel_val_6" value="6" <?php if($icon_sel_val == '6' ) { echo "checked"; } ?>  style="display:none"   />
						
					</span>	
				</span>
				
				<span class="col-md-3 col-sm-6 op_cl_icon_box" >
					<span class="sel-icon-wrapper <?php if($icon_sel_val == '7' ) { echo "active"; } ?>" id="icon_7" onclick="select_icon(7)">
						<span class="checked"><i class="fa fa-check"></i></span>
						<span class="lefti"><i class="fa fa-chevron-right"></i></span>
						<span class="righti"><i class="fa fa-chevron-down"></i></span>
						<input type="radio" name="icon_sel_val" id="icon_sel_val_7" value="7" <?php if($icon_sel_val == '7' ) { echo "checked"; } ?>  style="display:none"   />
						
					</span>	
				</span>
				
				<span class="col-md-3 col-sm-6 op_cl_icon_box" >
					<span class="sel-icon-wrapper <?php if($icon_sel_val == '8' ) { echo "active"; } ?>" id="icon_8" onclick="select_icon(8)">
						<span class="checked"><i class="fa fa-check"></i></span>
						<span class="lefti"><i class="fa fa-hand-o-right"></i></span>
						<span class="righti"><i class="fa fa-hand-o-down"></i></span>
						<input type="radio" name="icon_sel_val" id="icon_sel_val_8" value="8" <?php if($icon_sel_val == '8' ) { echo "checked"; } ?>  style="display:none"   />
						
					</span>	
				</span>
				<span class="col-md-3 col-sm-6 op_cl_icon_box" >
					<span class="sel-icon-wrapper <?php if($icon_sel_val == '9' ) { echo "active"; } ?>" id="icon_9" onclick="select_icon(9)">
						<span class="checked"><i class="fa fa-check"></i></span>
						<span class="lefti"><i class="fa fa-caret-up"></i></span>
						<span class="righti"><i class="fa fa-caret-down"></i></span>
						<input type="radio" name="icon_sel_val" id="icon_sel_val_9" value="9" <?php if($icon_sel_val == '9' ) { echo "checked"; } ?>  style="display:none"   />
						
					</span>	
				</span>
				
				<span class="col-md-3 col-sm-6 op_cl_icon_box" >
					<span class="sel-icon-wrapper <?php if($icon_sel_val == '10' ) { echo "active"; } ?>" id="icon_10" onclick="select_icon(10)">
						<span class="checked"><i class="fa fa-check"></i></span>
						<span class="lefti"><i class="fa fa-angle-up"></i></span>
						<span class="righti"><i class="fa fa-angle-down"></i></span>
						<input type="radio" name="icon_sel_val" id="icon_sel_val_10" value="10" <?php if($icon_sel_val == '10' ) { echo "checked"; } ?>  style="display:none"   />
						
					</span>	
				</span>
				
				<span class="col-md-3 col-sm-6 op_cl_icon_box" >
					<span class="sel-icon-wrapper <?php if($icon_sel_val == '11' ) { echo "active"; } ?>" id="icon_11" onclick="select_icon(11)">
						<span class="checked"><i class="fa fa-check"></i></span>
						<span class="lefti"><i class="fa fa-chevron-up"></i></span>
						<span class="righti"><i class="fa fa-chevron-down"></i></span>
						<input type="radio" name="icon_sel_val" id="icon_sel_val_11" value="11" <?php if($icon_sel_val == '11' ) { echo "checked"; } ?>  style="display:none"   />
						
					</span>	
				</span>
				
				<span class="col-md-3 col-sm-6 op_cl_icon_box" >
					<span class="sel-icon-wrapper <?php if($icon_sel_val == '12' ) { echo "active"; } ?>" id="icon_12" onclick="select_icon(12)">
						<span class="checked"><i class="fa fa-check"></i></span>
						<span class="lefti"><i class="fa fa-angle-double-up"></i></span>
						<span class="righti"><i class="fa fa-angle-double-down"></i></span>
						<input type="radio" name="icon_sel_val" id="icon_sel_val_12" value="12" <?php if($icon_sel_val == '12' ) { echo "checked"; } ?>  style="display:none"   />
						
					</span>	
				</span>
				
				
				<span class="col-md-3 col-sm-6 op_cl_icon_box" >
					<span class="sel-icon-wrapper <?php if($icon_sel_val == '13' ) { echo "active"; } ?>" id="icon_13" onclick="select_icon(13)">
						<span class="checked"><i class="fa fa-check"></i></span>
						<span class="lefti"><i class="fa fa-caret-down"></i></span>
						<span class="righti"><i class="fa fa-caret-up"></i></span>
						<input type="radio" name="icon_sel_val" id="icon_sel_val_13" value="13" <?php if($icon_sel_val == '13' ) { echo "checked"; } ?>  style="display:none"   />
						
					</span>	
				</span>
				
				<span class="col-md-3 col-sm-6 op_cl_icon_box" >
					<span class="sel-icon-wrapper <?php if($icon_sel_val == '14' ) { echo "active"; } ?>" id="icon_14" onclick="select_icon(14)">
						<span class="checked"><i class="fa fa-check"></i></span>
						<span class="lefti"><i class="fa fa-angle-down"></i></span>
						<span class="righti"><i class="fa fa-angle-up"></i></span>
						<input type="radio" name="icon_sel_val" id="icon_sel_val_14" value="14" <?php if($icon_sel_val == '14' ) { echo "checked"; } ?>  style="display:none"   />
						
					</span>	
				</span>
				
				<span class="col-md-3 col-sm-6 op_cl_icon_box" >
					<span class="sel-icon-wrapper <?php if($icon_sel_val == '15' ) { echo "active"; } ?>" id="icon_15" onclick="select_icon(15)">
						<span class="checked"><i class="fa fa-check"></i></span>
						<span class="lefti"><i class="fa fa-chevron-down"></i></span>
						<span class="righti"><i class="fa fa-chevron-up"></i></span>
						<input type="radio" name="icon_sel_val" id="icon_sel_val_15" value="15" <?php if($icon_sel_val == '15' ) { echo "checked"; } ?>  style="display:none"   />
						
					</span>	
				</span>
				
				<span class="col-md-3 col-sm-6 op_cl_icon_box" >
					<span class="sel-icon-wrapper <?php if($icon_sel_val == '16' ) { echo "active"; } ?>" id="icon_16" onclick="select_icon(16)">
						<span class="checked"><i class="fa fa-check"></i></span>
						<span class="lefti"><i class="fa fa-angle-double-down"></i></span>
						<span class="righti"><i class="fa fa-angle-double-up"></i></span>
						<input type="radio" name="icon_sel_val" id="icon_sel_val_16" value="16" <?php if($icon_sel_val == '16' ) { echo "checked"; } ?>  style="display:none"   />
						
					</span>	
				</span>
				
				
				<!-- Tooltip -->
				<div id="select_op_cl_icon_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('You can change your open close icons from here  ',wpshopmart_accordion_pro_text_domain); ?></h2>
							<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/select-icons.png'; ?>">
					
					</div>
		    	</div>
			</td>
		</tr>
		
		
		
		
		<tr style="border-bottom:0px;">
			<th>
				<div class="wpsm_site_sidebar_widget_title2">
					<h5>Accordion Border Settings</h5>
				</div>
			</th>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Accordion Box Border Display',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#ac_box_border_tp"><i class="fa fa-lightbulb-o"></i></a>
				</th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="ac_box_border" onchange="box_border_select()" value="yes" id="enable_ac_box_border" <?php if($ac_box_border == 'yes' ) { echo "checked"; } ?>   >
					<label for="enable_ac_box_border" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_accordion_pro_text_domain); ?></label>
					<input type="radio" class="switch-input" name="ac_box_border" value="no" onchange="box_border_select()" id="disable_ac_box_border"  <?php if($ac_box_border == 'no' ) { echo "checked"; } ?> >
					<label for="disable_ac_box_border" class="switch-label switch-label-on"><?php _e('No',wpshopmart_accordion_pro_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<div id="ac_box_border_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Hide/Display your accordion box border Here',wpshopmart_accordion_pro_text_domain); ?></h2>
					</div>
		    	</div>
			</td>
		</tr>
		
		
		
		<tr class="setting_color box_border_group" <?php if($ac_box_border=="no") { ?> style="display:none" <?php } ?>" >
			<th><label><?php _e('Accordion Box Border Size',wpshopmart_accordion_pro_text_domain); ?> </label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#ac_box_border_size_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td style="padding-left: 11px;">
				<div id="ac_box_border_size_id" class="size-slider" ></div>
				<input type="text" class="slider-text" id="ac_box_border_size" name="ac_box_border_size"  readonly="readonly">
				<!-- Tooltip -->
				<div id="ac_box_border_size_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;">You can update your accordion box border size from here</h2>
					</div>
		    	</div>
			</td>
		</tr>
		
		
		<tr class="top_border_color_group" <?php if($templates!=8) { ?> style="display:none" <?php } ?>>
			<th scope="row"><label><?php _e('Selected Accordion Top Border Color',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#ac_sel_top_border_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				</th>
			<td>
				<input id="ac_sel_top_border_clr" name="ac_sel_top_border_clr" type="text" value="<?php echo $ac_sel_top_border_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
				
				<!-- Tooltip -->
				<div id="ac_sel_top_border_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Selected Accordion Top Border Color ',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/top-border-color.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr class="setting_color top_border_color_group" <?php if($templates!=8) { ?> style="display:none" <?php } ?>>
			<th><label><?php _e('Selected Accordion Top Border Size',wpshopmart_accordion_pro_text_domain); ?> </label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#ac_sel_top_border_size_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td style="padding-left: 11px;">
				<div id="ac_sel_top_border_size_id" class="size-slider" ></div>
				<input type="text" class="slider-text" id="ac_sel_top_border_size" name="ac_sel_top_border_size"  readonly="readonly">
				<!-- Tooltip -->
				<div id="ac_sel_top_border_size_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;">Update Your Accordion top border size here</h2>
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr style="border-bottom:0px;">
			<th>
				<div class="wpsm_site_sidebar_widget_title2">
					<h5>Accordion Margin Settings </h5>
				</div>
			</th>
		</tr>
		
		
		<tr>
			<th scope="row"><label><?php _e('Enable Margin Between Two Accordion ',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#acc_margin_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="acc_margin" value="yes" id="enable_acc_margin" <?php if($acc_margin == 'yes' ) { echo "checked"; } ?>  >
					<label for="enable_acc_margin" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_accordion_pro_text_domain); ?></label>
					<input type="radio" class="switch-input" name="acc_margin" value="no" id="disable_acc_margin"  <?php if($acc_margin == 'no' ) { echo "checked"; } ?> >
					<label for="disable_acc_margin" class="switch-label switch-label-on"><?php _e('No',wpshopmart_accordion_pro_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<div id="acc_margin_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Enable Accordion Margin/Space',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/margin.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Enable Margin Between Accordion title And Content/Description',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#ac_margin_btw_tabs_content_tp"><i class="fa fa-lightbulb-o"></i></a>
				</th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="ac_margin_btw_tabs_content" value="yes" id="enable_ac_margin_btw_tabs_content" <?php if($ac_margin_btw_tabs_content == 'yes' ) { echo "checked"; } ?>   >
					<label for="enable_ac_margin_btw_tabs_content" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_accordion_pro_text_domain); ?></label>
					<input type="radio" class="switch-input" name="ac_margin_btw_tabs_content" value="no" id="disable_ac_margin_btw_tabs_content"  <?php if($ac_margin_btw_tabs_content == 'no' ) { echo "checked"; } ?> >
					<label for="disable_ac_margin_btw_tabs_content" class="switch-label switch-label-on"><?php _e('No',wpshopmart_accordion_pro_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<div id="ac_margin_btw_tabs_content_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Enable/Disable Margin Between Accordion Title And Content/Description Here',wpshopmart_accordion_pro_text_domain); ?></h2>
						</div>
		    	</div>
			</td>
		</tr>
		
		<tr style="border-bottom:0px;">
			<th>
				<div class="wpsm_site_sidebar_widget_title2">
					<h5>Accordion Animation And Others Settings</h5>
				</div>
			</th>
		</tr>
		
		<tr >
			<th><label><?php _e('Accordion Description Content Appear Animation',wpshopmart_accordion_pro_text_domain); ?></label> 
			<a  class="ac_tooltip" href="#help" data-tooltip="#content_animation_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				
				<select name="content_animation" id="content_animation" class="standard-dropdown" style="width:100%" >
					
					<option value="0"  <?php if($content_animation == '0' ) { echo "selected"; } ?> >No Animation</option>
					<option value="fadeIn"  <?php if($content_animation == 'fadeIn' ) { echo "selected"; } ?> >fadeIn</option>
					<option value="fadeInLeft"    <?php if($content_animation == 'fadeInLeft' ) { echo "selected"; } ?> >fadeInLeft</option>
					<option value="fadeInRight"    <?php if($content_animation == 'fadeInRight' ) { echo "selected"; } ?> >fadeInRight</option>
					<option value="fadeInUp"    <?php if($content_animation == 'fadeInUp' ) { echo "selected"; } ?> >fadeInUp</option>
					<option value="fadeInDown"    <?php if($content_animation == 'fadeInDown' ) { echo "selected"; } ?> >fadeInDown</option>
					<option value="flip"    <?php if($content_animation == 'flip' ) { echo "selected"; } ?> >flip</option>
					<option value="flipX"    <?php if($content_animation == 'flipX' ) { echo "selected"; } ?> >flipX</option>
					<option value="flipY"    <?php if($content_animation == 'flipY' ) { echo "selected"; } ?> >flipY</option>
					<option value="zoomIn"    <?php if($content_animation == 'zoomIn' ) { echo "selected"; } ?> >ZoomIn</option>
					<option value="zoomInLeft"    <?php if($content_animation == 'zoomInLeft' ) { echo "selected"; } ?> >ZoomInLeft</option>
					<option value="zoomInRight"    <?php if($content_animation == 'zoomInRight' ) { echo "selected"; } ?> >ZoomInRight</option>
					<option value="zoomInUp"    <?php if($content_animation == 'zoomInUp' ) { echo "selected"; } ?> >ZoomInUp</option>
					<option value="zoomInDown"    <?php if($content_animation == 'zoomInDown' ) { echo "selected"; } ?> >ZoomInDown</option>
					<option value="bounce"    <?php if($content_animation == 'bounce' ) { echo "selected"; } ?> >bounce</option>
					<option value="bounceIn"    <?php if($content_animation == 'bounceIn' ) { echo "selected"; } ?> >bounceIn</option>
					<option value="bounceInLeft"    <?php if($content_animation == 'bounceInLeft' ) { echo "selected"; } ?> >bounceInLeft</option>
					<option value="bounceInRight"    <?php if($content_animation == 'bounceInRight' ) { echo "selected"; } ?> >bounceInRight</option>
					<option value="bounceInUp"    <?php if($content_animation == 'bounceInUp' ) { echo "selected"; } ?> >bounceInUp</option>
					<option value="bounceInDown"    <?php if($content_animation == 'bounceInDown' ) { echo "selected"; } ?> >bounceInDown</option>
					<option value="flash"    <?php if($content_animation == 'flash' ) { echo "selected"; } ?> >flash</option>
					<option value="pulse"    <?php if($content_animation == 'pulse' ) { echo "selected"; } ?> >pulse</option>
					<option value="rubberBand"    <?php if($content_animation == 'rubberBand' ) { echo "selected"; } ?> >rubberBand</option>
					<option value="shake"    <?php if($content_animation == 'shake' ) { echo "selected"; } ?> >shake</option>
					<option value="swing"    <?php if($content_animation == 'swing' ) { echo "selected"; } ?> >swing</option>
					<option value="tada"    <?php if($content_animation == 'tada' ) { echo "selected"; } ?> >tada</option>
					<option value="wobble"    <?php if($content_animation == 'wobble' ) { echo "selected"; } ?> >wobble</option>
					<option value="lightSpeedIn"    <?php if($content_animation == 'lightSpeedIn' ) { echo "selected"; } ?> >lightSpeedIn</option>
					<option value="rollIn"    <?php if($content_animation == 'rollIn' ) { echo "selected"; } ?> >rollIn</option>
						
				</select>
				<!-- Tooltip -->
				<div id="content_animation_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;">Accordion Description Content Appear Animation</h2>
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Accordion Background Styles Overlay',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#ac_styles_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="ac_styles" id="ac_styles" value="1" <?php if($ac_styles == '1' ) { echo "checked"; } ?> /> Simple </span>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="ac_styles" id="ac_styles2" value="2" <?php if($ac_styles == '2' ) { echo "checked"; } ?>  /> Soft </span>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="ac_styles" id="ac_styles3" value="3"  <?php if($ac_styles == '3' ) { echo "checked"; } ?> /> Noise </span>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="ac_styles" id="ac_styles4" value="4"  <?php if($ac_styles == '4' ) { echo "checked"; } ?> /> Bubble </span>
				<span style="display:block"><input type="radio" name="ac_styles" id="ac_styles5" value="5"  <?php if($ac_styles == '5' ) { echo "checked"; } ?> /> Glass </span>
				<!-- Tooltip -->
				<div id="ac_styles_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Accordion Background Styles Overlay',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/soft.png'; ?>">
						
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/noise.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		
		<tr>
			<th scope="row"><label><?php _e('Enable Collapse Mode(Toggle one or more Accordion together) ',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#enable_toggle_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="enable_toggle" value="yes" id="enable_acc_toggle" <?php if($enable_toggle == 'yes' ) { echo "checked"; } ?>   >
					<label for="enable_acc_toggle" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_accordion_pro_text_domain); ?></label>
					<input type="radio" class="switch-input" name="enable_toggle" value="no" id="disable_acc_toggle"  <?php if($enable_toggle == 'no' ) { echo "checked"; } ?> >
					<label for="disable_acc_toggle" class="switch-label switch-label-on"><?php _e('No',wpshopmart_accordion_pro_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<div id="enable_toggle_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Enable Toggle/Collapse ',wpshopmart_accordion_pro_text_domain); ?></strong> very html</h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/toggle.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		
		
		<tr>
			<th scope="row"><label><?php _e('On Hover Toggle Accordion',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#on_hover_toggle_tp"><i class="fa fa-lightbulb-o"></i></a>
				</th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="on_hover_toggle" value="yes" id="enable_on_hover_toggle" <?php if($on_hover_toggle == 'yes' ) { echo "checked"; } ?>   >
					<label for="enable_on_hover_toggle" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_accordion_pro_text_domain); ?></label>
					<input type="radio" class="switch-input" name="on_hover_toggle" value="no" id="disable_on_hover_toggle"  <?php if($on_hover_toggle == 'no' ) { echo "checked"; } ?> >
					<label for="disable_on_hover_toggle" class="switch-label switch-label-on"><?php _e('No',wpshopmart_accordion_pro_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<div id="on_hover_toggle_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Enable it if you want to open your accordion on hover ',wpshopmart_accordion_pro_text_domain); ?></h2>
					</div>
		    	</div>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label><?php _e('Page Scroll to Accordion title on click',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#scroll_to_tp"><i class="fa fa-lightbulb-o"></i></a>
				</th>
			<td>
				<div class="switch">
					<input type="radio" class="switch-input" name="scroll_to" value="yes" id="enable_scroll_to" <?php if($scroll_to == 'yes' ) { echo "checked"; } ?>   >
					<label for="enable_scroll_to" class="switch-label switch-label-off"><?php _e('Yes',wpshopmart_accordion_pro_text_domain); ?></label>
					<input type="radio" class="switch-input" name="scroll_to" value="no" id="disable_scroll_to" <?php if($scroll_to == 'no' ) { echo "checked"; } ?> >
					<label for="disable_scroll_to" class="switch-label switch-label-on"><?php _e('No',wpshopmart_accordion_pro_text_domain); ?></label>
					<span class="switch-selection"></span>
				</div>
				<!-- Tooltip -->
				<div id="scroll_to_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Enable it if you want to scroll page to your accordion on click ',wpshopmart_accordion_pro_text_domain); ?></h2>
					</div>
		    	</div>
			</td>
		</tr>
		
	
		
		
		<tr>
			<th scope="row"><label><?php _e('Expand/Collapse Accordion Option On Page Load',wpshopmart_accordion_pro_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#expand_option_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="expand_option" id="expand_option" value="1" <?php if($expand_option == '1' ) { echo "checked"; } ?> /> First FAQ Open </span>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="expand_option" id="expand_option2" value="2" <?php if($expand_option == '2' ) { echo "checked"; } ?>  /> Open All FAQ </span>
				<span style="display:block"><input type="radio" name="expand_option" id="expand_option3" value="3"  <?php if($expand_option == '3' ) { echo "checked"; } ?> /> Hide/close All FAQ </span>
				<!-- Tooltip -->
				<div id="expand_option_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Expand/Collapse Accordion Option On Page Load',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/iocn-bg-color.png'; ?>">
						
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/toggle.png'; ?>">
					
					</div>
		    	</div>
			</td>
		</tr>
		<tr>
			<th scope="row"><label><?php _e('Accordion Content/Description Height Option',wpshopmart_accordion_pro_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#expand_option_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="acc_des_height_type" id="acc_des_height_type" value="1" <?php if($acc_des_height_type == '1' ) { echo "checked"; } ?> onchange="fn_ac_des_height_setting()" /> Auto </span>
				<span style="display:block;margin-bottom:10px"><input type="radio" name="acc_des_height_type" id="acc_des_height_type" value="2" <?php if($acc_des_height_type == '2' ) { echo "checked"; } ?> onchange="fn_ac_des_height_setting()" /> Custum </span>
				<!-- Tooltip -->
				<div id="expand_option_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Expand/Collapse Accordion Option On Page Load',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/iocn-bg-color.png'; ?>">
						
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/toggle.png'; ?>">
					
					</div>
		    	</div>
			</td>
		</tr>
		<tr class="wpsm_acc_des_height_cls" style="<?php if($acc_des_height_type=='1'){echo "display:none;";}?>">
			<th scope="row"><label><?php _e('Accordion Content/Description Custum Height ',wpshopmart_accordion_pro_text_domain); ?></label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#expand_option_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<span style="display:block;margin-bottom:10px"><input type="number" name="acc_des_cus_height" id="acc_des_cus_height" value="<?php echo $acc_des_cus_height; ?>" /> Px</span>
				<!-- Tooltip -->
				<div id="expand_option_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Expand/Collapse Accordion Option On Page Load',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/iocn-bg-color.png'; ?>">
						
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/toggle.png'; ?>">
					
					</div>
		    	</div>
			</td>
		</tr>
		<tr class="wpsm_acc_des_height_cls" style="<?php if($acc_des_height_type=='1'){echo "display:none;";}?>">
			<th scope="row"><label><?php _e('Content/Description Scroll Bar Background Color',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#acc_title_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<input id="acc_des_scroll_bg_clr" name="acc_des_scroll_bg_clr" type="text" value="<?php echo $acc_des_scroll_bg_clr; ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<!-- Tooltip -->
				<div id="acc_title_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Accordion Title Background Color',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/title-bg-color.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		<tr class="wpsm_acc_des_height_cls" style="<?php if($acc_des_height_type=='1'){echo "display:none;";}?>">
			<th scope="row"><label><?php _e('Content/Description Scroll Bar Font Color',wpshopmart_accordion_pro_text_domain); ?></label>
			<a  class="ac_tooltip" href="#help" data-tooltip="#acc_title_bg_clr_tp"><i class="fa fa-lightbulb-o"></i></a>
				
			</th>
			<td>
				<input id="acc_des_scroll_clr" name="acc_des_scroll_clr" type="text" value="<?php echo $acc_des_scroll_clr; ?>" class="my-color-field" data-default-color="#e8e8e8" />
				<!-- Tooltip -->
				<div id="acc_title_bg_clr_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;">
						<h2 style="color:#fff !important;"><?php _e('Accordion Title Background Color',wpshopmart_accordion_pro_text_domain); ?></h2>
						<img src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/tooltip/img/title-bg-color.png'; ?>">
					</div>
		    	</div>
			</td>
		</tr>
		<tr class="setting_color wpsm_acc_des_height_cls" style="<?php if($acc_des_height_type=='1'){echo "display:none;";}?>" >
			<th><label><?php _e('Content/Description Scroll Bar Width',wpshopmart_accordion_pro_text_domain); ?> </label>
				<a  class="ac_tooltip" href="#help" data-tooltip="#ac_box_border_size_tp"><i class="fa fa-lightbulb-o"></i></a>
			</th>
			<td style="padding-left: 11px;">
				<div id="acc_des_scroll_width_id" class="size-slider" ></div>
				<input type="text" class="slider-text" id="acc_des_scroll_width" name="acc_des_scroll_width"  readonly="readonly">
				<!-- Tooltip -->
				<div id="ac_box_border_size_tp" style="display:none;">
					<div style="color:#fff !important;padding:10px;max-width: 300px;">
						<h2 style="color:#fff !important;">You can update your accordion box border size from here</h2>
					</div>
		    	</div>
			</td>
		</tr>
		<script>
			jQuery('.ac_tooltip').darkTooltip({
				opacity:1,
				gravity:'east',
				size:'small'
			});
		</script>
		<script>
		function box_border_select(){
			
			 value = jQuery("input[name=ac_box_border]:checked").val();
			 
			 if(value=="yes"){
				jQuery(".box_border_group").show(500);
			}else{
				
				jQuery(".box_border_group").hide(500);
			}
		}
		function op_cl_icon_number_select(){
			 value = jQuery("input[name=op_cl_icon]:checked").val();
			 if(value=="3"){
				jQuery(".ap_cl_group").hide(500);
			}else{
				
				jQuery(".ap_cl_group").show(500);
			}
			
		}
		
		</script>
	</tbody>
</table>