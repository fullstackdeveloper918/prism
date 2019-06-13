
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel{
    border-radius: 0px !important;
    box-shadow: none !important;
	margin-bottom: 6px !important;
	<?php if($ac_box_border=="yes"){ ?>
	    border: <?php echo $ac_box_border_size; ?>px solid <?php echo $ac_box_border_clr; ?>;
	<?php } else { ?>
	border: 0px !important;
	<?php } ?>
}

#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-heading{
    border-radius: 0px !important;
    background-color:transparent !important;
    padding:0 !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a{
    display: block !important;
    color:<?php echo $acc_title_icon_clr; ?> !important;
    font-size: <?php echo $title_size; ?>px !important;
    padding: 13px 15px 13px 45px !important;
	<?php if($op_cl_icon_align=="right") { ?>
	padding: 13px 45px 13px 15px !important;
	<?php } ?>
   
    position: relative !important;
    border-top:<?php echo $ac_sel_top_border_size; ?>px solid <?php echo $ac_sel_top_border_clr; ?>;
	box-shadow:none !important;
	line-height:1.5 !important;
	font-weight:<?php echo $ac_ft_weight; ?> !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a > i{
	color:<?php echo $acc_title_icon_clr; ?> !important;
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
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a.collapsed{
    border-top:0 !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a:hover,
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a:focus{
    text-decoration: none !important;
    outline: none !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a:after,
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a.collapsed:after{
    content: "\<?php echo $cl_icon; ?>" !important;
    font-family: FontAwesome !important;
    color:<?php echo $acc_open_cl_icon_ft_clr; ?> !important;
    position: absolute !important;
    top:calc(50% - 12px) !important;
    <?php echo $op_cl_icon_align; ?>:15px !important;
	text-align:center;
    font-size: <?php echo $title_size; ?>px !important;
    line-height: 24px !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a.collapsed:after{
    content: "\<?php echo $op_icon; ?>" !important;
}
#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-body{
    border-top: 0px none !important;
    color:<?php echo $acc_desc_font_clr; ?> !important;
	font-size:<?php echo $des_size; ?>px !important;
	line-height: <?php echo ($des_size +10); ?>px !important;
	background:transparent !important;
    padding: 10px 27px 15px !important;
    border-top: 0px none !important;
}

#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-body p{
	color:<?php echo $acc_desc_font_clr; ?> !important;
	font-size:<?php echo $des_size; ?>px !important;
	line-height: <?php echo ($des_size +10); ?>px !important;
}
<?php 
if($op_cl_icon=="3")
{	?>
		#accordion_pro_<?php echo $post_id; ?> .wpsm_panel-title a{
			padding: 13px 15px 13px 15px !important;
			
		}
	<?php 
}?>

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
		}
		#offset_<?php echo $post_id; ?>_<?php echo $k; ?> .wpsm_panel-title > a.collapsed > i{
			color: <?php echo $ind_title_icon_clr;?> !important;
		}
		#offset_<?php echo $post_id; ?>_<?php echo $k; ?> .wpsm_panel-body{
			color: <?php echo $ind_des_clr;?> !important;
		}
		#offset_<?php echo $post_id; ?>_<?php echo $k; ?> .wpsm_panel-title > a.collapsed:after{
			color:<?php echo $ind_open_cl_icon_clr; ?> !important;
		}
		#offset_<?php echo $post_id; ?>_<?php echo $k; ?> ,
		#offset_<?php echo $post_id; ?>_<?php echo $k; ?> .wpsm_panel-body{
			border-color: <?php echo $ind_acc_box_clr; ?> !important;
		}
		<?php
		$k++;	
	}
}
?>