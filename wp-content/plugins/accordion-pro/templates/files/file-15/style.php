#accordion_pro_<?php echo $post_id; ?> a:hover, #accordion_pro_<?php echo $post_id; ?> a:focus{
    outline: none !important;
    text-decoration: none !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel{
   <?php if($ac_box_border=="yes"){ ?>
	    border: <?php echo $ac_box_border_size; ?>px solid <?php echo $ac_box_border_clr; ?>;
	<?php } else { ?>
	border: 0px !important;
	<?php } ?>
    box-shadow: none !important;
    border-radius: 0 !important;
    margin-bottom: 15px !important;
    margin-top: 5px !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-heading{
    padding: 0 !important;
    border-radius: 0px !important;
    border: none !important;
	background:none !important;
 }
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a{
    display: block !important;
	<?php if($op_cl_icon_align=="left") { ?>
    padding: 14px 30px 14px 70px !important;
	<?php } else { ?>
    padding: 14px 70px 14px 30px !important;
	<?php } ?>
    position: relative !important;
	color:<?php echo $sel_acc_title_ft_clr; ?> !important;
    background:<?php echo $sel_acc_title_bg_clr; ?> !important;
	font-size: <?php echo $title_size; ?>px !important;
	box-shadow:none !important;
	line-height:1.5 !important;
	font-weight:<?php echo $ac_ft_weight; ?> !important;
	overflow: hidden;
    transition: all 0.5s ease 0s;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a > i{
	color:<?php echo $sel_acc_title_ft_clr; ?> !important;
	transition: all 0.5s ease 0s;
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

#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a.collapsed{
	background-color: <?php echo $acc_title_bg_clr; ?> !important;
    color: <?php echo $acc_title_icon_clr; ?> !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a.collapsed > i{
    color: <?php echo $acc_title_icon_clr; ?> !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a.collapsed:hover{
   color:<?php echo $sel_acc_title_bg_clr; ?> !important;
 }
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a.collapsed:hover i{
   color:<?php echo $sel_acc_title_bg_clr; ?> !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a:before,
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a.collapsed:before{
    content: "" !important;
    width: 55px;
    height: 100%;
	background: rgba(0, 0, 0, 0.1) !important;; 
	position: absolute !important;
	top:0 !important;
	 <?php echo $op_cl_icon_align; ?>:-13px !important;
	 transform: skewX(-25deg);
    transition: all 0.5s ease 0s;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a.collapsed:hover:before{
    background: <?php echo $sel_acc_title_bg_clr; ?> !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a:after,
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a.collapsed:after{
    content: "\<?php echo $cl_icon; ?>" !important;
    font-family: FontAwesome !important;
	position: absolute !important;
	top: 50% !important;
	<?php echo $op_cl_icon_align; ?>:10px !important;
	 transform: translateY(-50%);
	 color: <?php echo $sel_acc_op_cl_ft_clr; ?> !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a.collapsed:after{
    content: "\<?php echo $op_icon; ?>" !important;
	color: <?php echo $acc_open_cl_icon_ft_clr; ?> !important;
    /* background: <?php echo $acc_open_cl_icon_bg_clr; ?> !important; */
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title > a.collapsed:hover:after{
   color: <?php echo $sel_acc_op_cl_ft_clr; ?> !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-body{
	background:<?php echo $acc_desc_bg_clr; ?> !important;
	color:<?php echo $acc_desc_font_clr; ?> !important;
	font-size:<?php echo $des_size; ?>px !important;
	line-height: <?php echo ($des_size +10); ?>px !important;
    padding: 20px 15px 20px 40px !important;
    position: relative !important;
    border: none !important;
    transition: all 0.5s ease 0s;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-body p{
	color:<?php echo $acc_desc_font_clr; ?> !important;
	font-size:<?php echo $des_size; ?>px !important;
	line-height: <?php echo ($des_size +10); ?>px !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-body:before{
	content: "";
    width: 5px;
    height: 40px;
    background: <?php echo $sel_acc_title_bg_clr; ?> !important;
    position: absolute;
    top: 30px;
    left: 0;
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
			Background-color: <?php echo $ind_title_icon_bg_clr;?> !important;
		}
		#offset_<?php echo $post_id; ?>_<?php echo $k; ?> .wpsm_panel-title > a.collapsed > i{
			color: <?php echo $ind_title_icon_clr;?> !important;
		}
		#offset_<?php echo $post_id; ?>_<?php echo $k; ?> .wpsm_panel-body{
			color: <?php echo $ind_des_clr;?> !important;
		}
		#offset_<?php echo $post_id; ?>_<?php echo $k; ?> .wpsm_panel-title > a.collapsed:hover{
		    color:<?php echo $sel_acc_title_bg_clr; ?> !important;
		}
		#offset_<?php echo $post_id; ?>_<?php echo $k; ?> .wpsm_panel-title > a.collapsed:hover i{
		    color:<?php echo $sel_acc_title_bg_clr; ?> !important;
		}
		#offset_<?php echo $post_id; ?>_<?php echo $k; ?> .wpsm_panel-title > a.collapsed:after{
			color:<?php echo $ind_open_cl_icon_clr; ?> !important;
		}
		#offset_<?php echo $post_id; ?>_<?php echo $k; ?> .wpsm_panel-title > a.collapsed:hover:after{
			color:<?php echo $sel_acc_op_cl_ft_clr; ?> !important;
		}
		#offset_<?php echo $post_id; ?>_<?php echo $k; ?> .wpsm_panel-title > a.collapsed:hover:before{
			background-color:<?php echo $sel_acc_title_bg_clr; ?> !important;
		}
		
		
		<?php
		$k++;	
	}
}
?>