<?php if($op_cl_icon_align=='left')
		$var_opposite_icon_align='right';
	  else
		$var_opposite_icon_align='left';  
?>


#wps_accordion_pro_<?php echo $post_id; ?>{
	padding-<?php echo $var_opposite_icon_align; ?>: 24px !important;			
    padding-<?php echo $op_cl_icon_align; ?>: <?php echo $title_size+23; ?>px !important;
    z-index: 1 !important;
}
#accordion_pro_<?php echo $post_id; ?> a:hover, #accordion_pro_<?php echo $post_id; ?> a:focus{
    outline: none !important;
    text-decoration: none !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel{
   border: 0px !important;
    border-radius: 0px !important;
    box-shadow: none !important;
    background: transparent !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-heading{
    padding: 0 !important;
    border-radius: 0px !important;
    border: 0px !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a{
    display: block !important;
	<?php if($op_cl_icon_align=="left") { ?>
    padding: 15px 30px 15px 50px !important;
	<?php } else { ?>
    padding: 15px 50px 15px 30px !important;
	<?php } ?>
    position: relative !important;
	color:<?php echo $sel_acc_title_ft_clr; ?> !important;
    background:<?php echo $sel_acc_title_bg_clr; ?> !important;
	font-size: <?php echo $title_size; ?>px !important;
	box-shadow:none !important;
	line-height:1.5 !important;
	font-weight:<?php echo $ac_ft_weight; ?> !important;
	transition: all 0.3s ease 0s;
	margin-<?php echo $var_opposite_icon_align; ?>:-24px !important;
	
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a > i{
	color:<?php echo $sel_acc_title_ft_clr; ?> !important;
	transition: all 0.3s ease 0s;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a.collapsed{
    background: <?php echo $acc_title_bg_clr; ?> !important;
	color: <?php echo $acc_title_icon_clr; ?> !important;
	margin-<?php echo $var_opposite_icon_align; ?>:0 !important;
	transition: all 0.3s ease 0s;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a.collapsed > i{
    color: <?php echo $acc_title_icon_clr; ?> !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a:before{
	content: "";
    /* border-<?php echo $var_opposite_icon_align; ?>: 24px solid <?php echo $sel_acc_title_bg_clr; ?>;
    border-top: 24px solid transparent;
    border-bottom: 24px solid transparent;
    position: absolute;
    top: 0;
    <?php echo $op_cl_icon_align; ?>: -24px;
    transition: all 0.3s ease 0s;   */
	
	
	position: absolute;
    top: 0px;
	bottom: 0px;
	margin: auto;
    <?php echo $op_cl_icon_align; ?>: -<?php echo ($title_size+22)/2; ?>px;
    transition: all 0.3s ease 0s;
	width: <?php echo $title_size+22; ?>px;
    height: <?php echo $title_size+22; ?>px;
    background: <?php echo $sel_acc_title_bg_clr; ?>;
    transform: rotate(-45deg);
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a.collapsed:before{
	border-<?php echo $var_opposite_icon_align; ?>-color: <?php echo $acc_title_bg_clr; ?>;
	background: <?php echo $acc_title_bg_clr; ?>;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a:after{
	content: "\<?php echo $cl_icon; ?>" !important;
    font-family: FontAwesome !important;
	position: absolute;
    /* top:calc(50% - <?php echo $title_size/2; ?>px) !important; */
    <?php echo $op_cl_icon_align; ?>: 15px !important;
    font-size: <?php echo $title_size; ?>px !important;
    color: <?php echo $sel_acc_op_cl_ft_clr; ?> !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a.collapsed:after{
	content: "\<?php echo $op_icon; ?>" !important;
    color:<?php echo $acc_open_cl_icon_ft_clr; ?> !important;
}

#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-collapse{
	position: relative;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-collapse.in:before{
    content: "";
    border-<?php echo $op_cl_icon_align; ?>: 24px solid <?php echo $acc_title_bg_clr; ?>;
    border-bottom: 18px solid transparent;
    position: absolute;
    top: 0;
    <?php echo $var_opposite_icon_align; ?>: -24px;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a > .ac_title_img_icon{
    <?php
		if($acc_title_image_icon_size_type=='2')
			$ver_img_icon_size=$acc_title_image_icon_size;
		else
			$ver_img_icon_size=$title_size;
	?>
	width: <?php echo $ver_img_icon_size; ?>px !important;
	height: <?php echo $ver_img_icon_size; ?>px !important;
	vertical-align: middle !important;
	margin-left: 0 !important;
	margin-top: 0 !important;
	margin-bottom: 0 !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-body{
	background:<?php echo $acc_desc_bg_clr; ?> !important;
	color:<?php echo $acc_desc_font_clr; ?> !important;
	font-size:<?php echo $des_size; ?>px !important;
	line-height: <?php echo ($des_size +10); ?>px !important;
	border: none !important;
	z-index: 1;
}

#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-body p{
	color:<?php echo $acc_desc_font_clr; ?> !important;
	font-size:<?php echo $des_size; ?>px !important;
	line-height: <?php echo ($des_size +10); ?>px !important;
}

<?php if($op_cl_icon=="3"){ ?>
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a{
	 padding: 15px 15px 15px 15px !important;
}
<?php } ?>


<?php 
	switch($ac_styles){
		case "1":
		?>
		#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a, #accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a:hover, #accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a.collapsed, #accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a.collapsed:hover {
			background-image: none !important;
		}
		<?php
		break;
		case "2":
		 ?>
		 #accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a, #accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a:hover, #accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a.collapsed, #accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a.collapsed:hover {
			background-image: url(<?php echo wpshopmart_accordion_pro_directory_url.'assets/images/style-soft.png'; ?>) !important;
			background-position: 0 0;
			background-repeat: repeat-x;
		}

		<?php
		break;
		case "3":
		?>
			#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a, #accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a:hover, #accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a.collapsed, #accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a.collapsed:hover {
				background-image: url(<?php echo wpshopmart_accordion_pro_directory_url.'assets/images/style-noise.png'; ?>) !important;
				background-position: 0 0;
				background-repeat: repeat-x;
			}
			
		<?php
		break;
		case "4":
		?>
			#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a, #accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a:hover, #accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a.collapsed, #accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a.collapsed:hover {
				background-image: url(<?php echo wpshopmart_accordion_pro_directory_url.'assets/images/style-bubbles.png'; ?>) !important;
				background-position: 0 50%;
				background-repeat: repeat-x;

			}
			
		<?php
		break;
		
		case "5":
		?>
			#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a, #accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a:hover, #accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a.collapsed, #accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a.collapsed:hover {
				background-image: url(<?php echo wpshopmart_accordion_pro_directory_url.'assets/images/style-glass.png'; ?>) !important;
				background-position: 0 50%;
				background-repeat: repeat-x;
			}
			
		<?php
		break;
	}
?>
<?php
if($acc_enable_ind_clr=='yes')
{
	$k=1;
	foreach($accordion_data as $sb_single_set_data)
	{ 	
		$ind_title_icon_clr			=$sb_single_set_data['ind_title_icon_clr'];
		$ind_title_icon_bg_clr		=$sb_single_set_data['ind_title_icon_bg_clr'];
		
		$ind_des_clr		=$sb_single_set_data['ind_des_clr'];
		$ind_des_bg_clr	=$sb_single_set_data['ind_des_bg_clr'];
		
		$ind_open_cl_icon_clr		=$sb_single_set_data['ind_open_cl_icon_clr'];
		$ind_open_cl_icon_bg_clr	=$sb_single_set_data['ind_open_cl_icon_bg_clr'];
		$ind_acc_box_clr		=$sb_single_set_data['ind_acc_box_clr'];
		
		?>
		#offset_<?php echo $post_id; ?>_<?php echo $k; ?> .wpsm_panel-title > a.collapsed{
			color: <?php echo $ind_title_icon_clr;?> !important;
			background-color: <?php echo $ind_title_icon_bg_clr;?> !important;
		}
		#offset_<?php echo $post_id; ?>_<?php echo $k; ?> .wpsm_panel-title > a.collapsed > i{
			color: <?php echo $ind_title_icon_clr;?> !important;
		}
		#offset_<?php echo $post_id; ?>_<?php echo $k; ?> .wpsm_panel-body{
			background-color: <?php echo $ind_des_bg_clr;?> !important;
			color: <?php echo $ind_des_clr;?> !important;
		}
		
		#offset_<?php echo $post_id; ?>_<?php echo $k; ?> .wpsm_panel-title > a.collapsed:after{
			color:<?php echo $ind_open_cl_icon_clr; ?> !important;
		}
		#offset_<?php echo $post_id; ?>_<?php echo $k; ?> .wpsm_panel-title > a.collapsed:before{
			border-<?php echo $var_opposite_icon_align; ?>-color: <?php echo $ind_title_icon_bg_clr; ?>;
			background-color: <?php echo $ind_title_icon_bg_clr; ?>;
		}
		
		<?php
		$k++;	
	}	?>
		#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-collapse.in:before{
			border-<?php echo $op_cl_icon_align; ?>-color: <?php echo $sel_acc_title_bg_clr; ?>;
		}
		<?php
}
?>