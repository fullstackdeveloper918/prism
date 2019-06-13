<?php 
$post_type = "wpsm_accordion_pro";
$AllDATA = array(  'p' => $WPSM_AC_PRO_ID, 'post_type' => $post_type, 'orderby' => 'ASC');
$loop = new WP_Query( $AllDATA );
while ( $loop->have_posts() ) : $loop->the_post();
	//get the post id
	$post_id = get_the_ID();
	$De_Settings = unserialize(get_option('wpsm_accordion_pro_default_settings'));
	$Settings = unserialize(get_post_meta( $post_id, 'Accordion_Pro_Settings', true));
	$option_names = array(
		"acc_sec_title" 	 			=> $De_Settings['acc_sec_title'],
		"op_cl_icon" 		 			=> $De_Settings['op_cl_icon'],
		"op_cl_icon_align" 	 			=> $De_Settings['op_cl_icon_align'],
		"icon_sel_val" 	 				=> $De_Settings['icon_sel_val'],
		"acc_title_icon"     			=> $De_Settings['acc_title_icon'],
		"acc_margin"   		 			=> $De_Settings['acc_margin'],
		"enable_toggle"    	 			=> $De_Settings['enable_toggle'],
		"acc_title_bg_clr"   			=> $De_Settings['acc_title_bg_clr'],
		"acc_title_icon_clr" 			=> $De_Settings['acc_title_icon_clr'],
		"acc_open_cl_icon_bg_clr" 		=> $De_Settings['acc_open_cl_icon_bg_clr'],
		"acc_open_cl_icon_ft_clr" 		=> $De_Settings['acc_open_cl_icon_ft_clr'],
		"sel_acc_title_bg_clr" 			=> $De_Settings['sel_acc_title_bg_clr'],
		"sel_acc_title_ft_clr" 			=> $De_Settings['sel_acc_title_ft_clr'],
		"sel_acc_op_cl_bg_clr" 			=> $De_Settings['sel_acc_op_cl_bg_clr'],
		"sel_acc_op_cl_ft_clr" 			=> $De_Settings['sel_acc_op_cl_ft_clr'],
		"on_hover_toggle" 				=> $De_Settings['on_hover_toggle'],
		"scroll_to" 					=> $De_Settings['scroll_to'],
		"acc_desc_bg_clr"    			=> $De_Settings['acc_desc_bg_clr'],
		"acc_desc_font_clr"  			=> $De_Settings['acc_desc_font_clr'],
		"title_size"         			=> $De_Settings['title_size'],
		"des_size"     		 			=> $De_Settings['des_size'],
		"font_family_allow"     		=> $De_Settings['font_family_allow'],
		"font_family"     	 			=> $De_Settings['font_family'],
		"font_family_group"     		=> $De_Settings['font_family_group'],
		"content_animation"     		=> $De_Settings['content_animation'],
		"expand_option"      			=> $De_Settings['expand_option'],
		"ac_styles"      				=> $De_Settings['ac_styles'],
		"custom_css"      				=> $De_Settings['custom_css'],
		"templates"      				=> $De_Settings['templates'],
		'ac_box_border' 				=> $De_Settings['ac_box_border'],
		'ac_box_border_clr' 			=> $De_Settings['ac_box_border_clr'],
		'ac_box_border_size' 			=> $De_Settings['ac_box_border_size'],
		'ac_sel_top_border_clr' 		=> $De_Settings['ac_sel_top_border_clr'],
		'ac_sel_top_border_size'		=> $De_Settings['ac_sel_top_border_size'],
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
	
	//Open Close Icon 
	switch($icon_sel_val){
		case "1":
			$op_icon="f067";
			$cl_icon="f068";
		break;
		case "2":
			$op_icon="f00c";
			$cl_icon="f00d";
		break;
		case "3":
			$op_icon="f061";
			$cl_icon="f063";
		break;
		case "4":
			$op_icon="f0da";
			$cl_icon="f0d7";
		break;
		case "5":
			$op_icon="f105";
			$cl_icon="f107";
		break;
		case "6":
			$op_icon="f101";
			$cl_icon="f103";
		break;
		case "7":
			$op_icon="f054";
			$cl_icon="f078";
		break;
		case "8":
			$op_icon="f0a4";
			$cl_icon="f0a7";
		break;
		case "9":
			$op_icon="f0d8";
			$cl_icon="f0d7";
		break;
		case "10":
			$op_icon="f106";
			$cl_icon="f107";
		break;
		case "11":
			$op_icon="f078";
			$cl_icon="f077";
		break;
		case "12":
			$op_icon="f102";
			$cl_icon="f103";
		break;
		case "13":
			$op_icon="f0d7";
			$cl_icon="f0d8";
		break;
		case "14":
			$op_icon="f107";
			$cl_icon="f106";
		break;
		case "15":
			$op_icon="f078";
			$cl_icon="f077";
		break;
		case "16":
			$op_icon="f103";
			$cl_icon="f102";
		break;
	}
	
	$accordion_data = unserialize(get_post_meta( $post_id, 'wpsm_accordion_pro_data', true));
	$TotalCount =  get_post_meta( $post_id, 'wpsm_accordion_pro_count', true );
	//Getting Default Data	
	$data_option_names = array(
		 "accordion_title"=>"Accordion Sample Title",
		 "accordion_desc"=>"Accordion Sample Description",
		 "accordion_title_icon"=>"fa fa-laptop",
		 "accordion_title_image_icon"=>wpshopmart_accordion_pro_directory_url.'assets/images/default-image.png',
		 "enable_single_icon"=>"yes",
		 "ind_title_icon_clr"=>"#d3d3d3",
		 "ind_title_icon_bg_clr"=>"#000000",
		 "ind_des_clr"=>"#d3d3d3",
		 "ind_des_bg_clr"=>"#ffffff",
		 "ind_open_cl_icon_clr"=>"#ffffff",
		 "ind_open_cl_icon_bg_clr"=>"#000000",
		 "ind_acc_box_clr"=>"#d3ffff",
		);
	?>
	<?php if($font_family_group=="Google Fonts"){ ?> 
	<script src="http://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js"></script>
    <script type="text/javascript">
      WebFont.load({
        google: {
          families: ['<?php echo $font_family; ?>'] 
        }
      });
    </script>
	<?php } ?>
	<style>
	#wps_accordion_pro_<?php echo $post_id; ?>{
		overflow:hidden;
		display:block;
		width:100%;
		margin-bottom:30px;
	}
	#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title {
		margin-top: 0px !important;
		margin-bottom: 0px !important;
		padding-top: 0px !important;
		padding-bottom: 0px !important;
	}
	
	#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a{
		
		border-bottom: 0px !important;
		text-decoration:none !important;
		outline: none !important;
		box-shadow:none !important;
	}
	#accordion_pro_<?php echo $post_id; ?> .ac_title_icon{
		margin-right:8px;
		<?php if($acc_title_icon=="no"){ ?>
		display:none;
		<?php } ?>
		
	}
	
	
	/* css files */
	<?php require('files/file-'.$templates.'/style.php'); ?>
	
	/* open close icon option */
	<?php
	if($op_cl_icon=="2")
	{
		for($i=1; $i<=$TotalCount; $i++) { ?>
			#accordion_pro_<?php echo $post_id; ?>  .wpsm_panel-default:nth-child(<?php echo $i; ?>) .wpsm_panel-title a:after,
			#accordion_pro_<?php echo $post_id; ?>  .wpsm_panel-default:nth-child(<?php echo $i; ?>) .wpsm_panel-title a.collapsed:after{
				content: "<?php echo $i; ?>" !important;
			}
		<?php 
		} 
	}
	if($op_cl_icon=="3")
	{
		?>
			#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a:after,
			#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a.collapsed:after{
				display:none;
			}
		<?php 
		
	}
	
	?>
	
	#accordion_pro_<?php echo $post_id; ?> .wpsm_panel {
		background-color:transparent !important;
		<?php if($templates=="16"){?>templates
			margin-bottom:20px !important;
		<?php } elseif($acc_margin=="yes"){?>
			margin-bottom:10px !important;
		<?php } else{?>
			margin-bottom:0px !important;
		<?php } ?>
		margin-top:0px !important;
	}
	#accordion_pro_<?php echo $post_id; ?> .collapsing {
		transition: height 0.6s;
	}
	#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-body_inner{
		overflow:hidden;
		display:block;
		
	}
	
	<?php if($font_family_allow=="yes"){ ?>
	#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-body{
		font-family:<?php echo $font_family; ?> !important;
	}
	#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a{
		font-family:<?php echo $font_family; ?> !important;
	}
	<?php } ?>
	<?php if($ac_margin_btw_tabs_content=="yes"){ ?>
	#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-body{
		margin-top:10px;
	}
	<?php } ?>
	
	<?php
		if ( ! function_exists( 'HextoR' ) ) 
		{
			function HextoR($hex_color)
			{
			return intval(substr(trim($hex_color),1,2), 16);
			}
		}

		if ( ! function_exists( 'HextoG' ) ) 
		{
			function HextoG($hex_color)
			{
			return intval(substr(trim($hex_color),3,2), 16);
			}
		}

		if ( ! function_exists( 'HextoB' ) ) 
		{
			function HextoB($hex_color)
			{
			return intval(substr(trim($hex_color),5,2), 16);
			}
		}
	//Accordion Content Height
	if($acc_des_height_type=="2")
	{?>
		#accordion_pro_<?php echo $post_id; ?> .wpsm_panel .wpsm_panel-collapse .wpsm_panel-body_inner{
			padding:15px 10px 15px 15px !important;
		}
		@media only screen and (max-width: 600px) {
			#accordion_pro_<?php echo $post_id; ?> .wpsm_panel .wpsm_panel-collapse .wpsm_panel-body_inner{
				padding:10px 8px 10px 10px !important;
			}
		}
		#accordion_pro_<?php echo $post_id; ?> .wpsm_panel .wpsm_panel-collapse .wpsm_panel-body_inner{
			height:<?php echo $acc_des_cus_height;?>px !important;
			overflow:auto !important;
		}
		
		/* -------------Scrolling CSS--------------------------- */
		
		#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-collapse .wpsm_panel-body_inner .mCS-tabs_pro_scroll.mCSB_scrollTools .mCSB_draggerRail{
			width: <?php echo $acc_des_scroll_width; ?>px;
			background-color: <?php echo $acc_des_scroll_bg_clr; ?>; 
		}
		#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-collapse .wpsm_panel-body_inner .mCS-tabs_pro_scroll.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar{ 
			width: <?php echo $acc_des_scroll_width; ?>px; 
			background-color:<?php echo $acc_des_scroll_clr; ?>;
			background-color: rgba(<?php echo HextoR($acc_des_scroll_clr).",".HextoG($acc_des_scroll_clr).",".HextoB($acc_des_scroll_clr);?>,0.75); 
		}

		#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-collapse .wpsm_panel-body_inner .mCS-tabs_pro_scroll.mCSB_scrollTools .mCSB_dragger:hover .mCSB_dragger_bar{ 
			background-color:<?php echo $acc_des_scroll_clr; ?>; 
			background-color: rgba(<?php echo HextoR($acc_des_scroll_clr).",".HextoG($acc_des_scroll_clr).",".HextoB($acc_des_scroll_clr);?>,0.85);  
		}

		#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-collapse .wpsm_panel-body_inner .mCS-tabs_pro_scroll.mCSB_scrollTools .mCSB_dragger:active .mCSB_dragger_bar,
		#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-collapse .wpsm_panel-body_inner .mCS-tabs_pro_scroll.mCSB_scrollTools .mCSB_dragger.mCSB_dragger_onDrag .mCSB_dragger_bar{
			background-color:<?php echo $acc_des_scroll_clr; ?>; 
			background-color: rgba(<?php echo HextoR($acc_des_scroll_clr).",".HextoG($acc_des_scroll_clr).",".HextoB($acc_des_scroll_clr);?>,0.9);  
		}
		
	<?php
	}?>
	
	<?php echo $custom_css; ?>
	
	</style>
	<div id="wps_accordion_pro_<?php echo $post_id; ?>">
		<?php if($TotalCount>0) 
		{
			require('files/index.php');
		}
		else{
			echo "<h3> No Accordion/Faq Found </h3>";
		}
		?>
	</div>
	
	<?php 
	endwhile;
?>	