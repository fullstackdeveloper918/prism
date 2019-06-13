<style>
.html_editor_button{
	border-radius:0px;
	background-color: #9C9C9C;
	border-color: #9C9C9C;
	margin-bottom:20px;
}
</style>
<?php
$De_Settings = unserialize(get_option('wpsm_accordion_pro_default_settings'));
$PostId = $post->ID;
$Settings = unserialize(get_post_meta( $PostId, 'Accordion_Pro_Settings', true));

if(isset($Settings['acc_enable_ind_clr'])) 
	$acc_enable_ind_clr = $Settings['acc_enable_ind_clr'];
elseif(isset($De_Settings['acc_enable_ind_clr']))
	$acc_enable_ind_clr = $De_Settings['acc_enable_ind_clr'];
else
	$acc_enable_ind_clr = 'no';

if(isset($Settings['acc_title_image_icon_type'])) 
	$acc_title_image_icon_type = $Settings['acc_title_image_icon_type'];
elseif(isset($De_Settings['acc_title_image_icon_type']))
	$acc_title_image_icon_type = $De_Settings['acc_title_image_icon_type'];
else
	$acc_title_image_icon_type = '1';

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
	 "ind_acc_box_clr"=>"#dd3333",
	);
//For New Added Accordions
foreach($data_option_names as $data_option_name => $default_value) 
	{
		${"" . $data_option_name}  = $default_value;
	}
?>
<input type="hidden" name="ac_pro_save_data_action" value="ac_pro_save_data_action" />
<div  class="ac_pro_admin_wrapper">
	<div class="wpsm_site_sidebar_widget_title">
		<h4><?php _e('Add your Accordions Or Faq Here',wpshopmart_accordion_pro_text_domain); ?></h2>
	</div>
	<ul class="clearfix" id="accordion_panel">
	<?php
			$i=1;
			$accordion_data = unserialize(get_post_meta( $post->ID, 'wpsm_accordion_pro_data', true));
			$TotalCount =  get_post_meta( $post->ID, 'wpsm_accordion_pro_count', true );
			if($TotalCount) 
			{
				if($TotalCount!=-1)
				{
					foreach($accordion_data as $accordion_single_data)
					{	
						foreach($data_option_names as $data_option_name => $default_value) 
						{
							if(isset($accordion_single_data[$data_option_name])) 
								${"" . $data_option_name}  = $accordion_single_data[$data_option_name];
							else
								${"" . $data_option_name}  = $default_value;
						}

						 ?>
						<li class="wpsm_ac-panel single_acc_box panel-default" >
							<div class="panel-heading" role="tab" id="wpsm-heading<?php echo $i;?>">
								<h4 class="panel-title">
									<i class="fa fa-bars wpsm-ac-pro-move"></i>
									<a class="wpsm_accordion_handle wpsm-collapsed <?php if($i!=1){echo "collapsed";}?>" role="button" data-toggle="collapse" data-parent="#accordion_panel" href="#wpsm-collapse<?php echo $i;?>" aria-expanded="true" aria-controls="wpsm-collapse<?php echo $i;?>"></a>
									<span class="wpsm_tabs_header" id="wpsm-tabs-header-<?php echo $i;?>"><?php echo $accordion_title; ?></span>
									<a class="remove_button" href="#delete" id="remove_bt" ><i class="fa fa-trash-o"></i></a>
								</h4>
							</div>
							<div id="wpsm-collapse<?php echo $i;?>" class="panel-collapse collapse <?php if($i==1){echo "in";}?>" role="tabpanel" aria-labelledby="wpsm-heading<?php echo $i;?>">
								<div class="panel-body">
									<span class="ac_label"><?php _e('Accordion Title',wpshopmart_accordion_pro_text_domain); ?></span>
									<input type="text" id="accordion_title[]" name="accordion_title[]" value="<?php echo esc_attr($accordion_title); ?>" placeholder="Enter Accordion Title Here" class="wpsm_ac_label_text wpsm_ac_pro_title">
									<span class="ac_label"><?php _e('Accordion Description',wpshopmart_accordion_pro_text_domain); ?></span>
									<?php
										$editor_settings = array('wpautop' => false,'textarea_name'=>'accordion_desc[]');
										$editor_id = 'wpsm_ac_desc'.$i;
										wp_editor( $accordion_desc, $editor_id,$editor_settings);
									?>
									
									
									<div class="col-md-12" style="padding-left:0;margin-top:10px;">
										<div class="col-md-6 icon_icon_cls" style="padding-left:0;<?php if($acc_title_image_icon_type!="1"){echo "display:none;";}?>">
											<span class="ac_label"><?php _e('Accordion Icon',wpshopmart_accordion_pro_text_domain); ?></span>				
											<div class="form-group input-group" style="">
												<input style="width:100%;" class="form-control regular-text" id="accordion_title_icon[]" name="accordion_title_icon[]" value="<?php echo  $accordion_title_icon; ?>" type="text" readonly="readonly" />
												<span style="display:table-cell;width:1%;" class="wpsm_tabs_icon_picker input-group-addon icon-picker <?php echo  $accordion_title_icon; ?>" id="" data-target="#"></span>
											</div>
										</div>
									
										<div class="form-group col-md-6 icon_img_size_settings_cls" style="padding-left:0;<?php if($acc_title_image_icon_type=="1"){echo "display:none;";}?>">
											<span class="ac_label"><?php _e('Accordion Image Icon',wpshopmart_accordion_pro_text_domain); ?></span>
											<div class="input-group">
												<span class="input-group-addon" style="padding:4px;">
													<img class="wpsm-input-group-addon-img team-img-responsive" src="<?php echo $accordion_title_image_icon; ?>" />
												</span>
											<input type="button" name="" value="Upload Image" class="wpsm-input-group-addon-img-btn form-control btn btn-primary"  onclick="wpsm_media_upload(this)"/>
											<input style="display:block;width:100%" type="hidden"  name="accordion_title_image_icon[]"  value="<?php echo $accordion_title_image_icon; ?>"  readonly="readonly" placeholder="No Media Selected" />
											<input style="display:block;width:100%" type="hidden"  name="test_pro_icon_image_id[]" class="wpsm_ac_label_text"  value=""  readonly="readonly" placeholder="No Media Selected" />
											</div>
										</div>
										<div class="form-group col-md-6">
											<span class="ac_label"><?php _e('Display Icon',wpshopmart_accordion_pro_text_domain); ?></span>
											<select name="enable_single_icon[]" style="width:100%" >
												<option value="yes" <?php if($enable_single_icon == 'yes') echo "selected=selected"; ?>><?php _e('Yes',wpshopmart_accordion_pro_text_domain); ?></option>
												<option value="no" <?php if($enable_single_icon == 'no') echo "selected=selected"; ?>><?php _e('No',wpshopmart_accordion_pro_text_domain); ?></option>
												
											</select>
										</div>
									</div>
									
									<span class="ac_label" style="margin-top: 15px;"><?php _e('Accordion Individual Color Settings',wpshopmart_accordion_pro_text_domain); ?></span>
										
									<div class="form-group ac_ind_clr_option_class ind_clr_settings_container" <?php if($acc_enable_ind_clr=="no"){ ?>style="display:none" <?php } ?>>
										<div class="col-md-12 ">
											<div class="col-md-4">
												<div class="margin-10">
													<span class="ac_label"><?php _e('Title/Icon Font Color',wpshopmart_accordion_pro_text_domain); ?></span>
													<input id="indvid_title_clr" name="ind_title_icon_clr[]" type="text" value="<?php echo $ind_title_icon_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
												</div>
											</div>
											<div class="col-md-4">				
												<div class="margin-10">
													<span class="ac_label"><?php _e('Title/Icon Background Color',wpshopmart_accordion_pro_text_domain); ?></span>
													<input id="indvid_title_bg_clr" name="ind_title_icon_bg_clr[]" type="text" value="<?php echo $ind_title_icon_bg_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
												</div>
											</div>
											<div class="col-md-4">
												<div class="margin-10">
													<span class="ac_label"><?php _e('Description Font Color',wpshopmart_accordion_pro_text_domain); ?></span>
													<input id="indvid_title_clr" name="ind_des_clr[]" type="text" value="<?php echo $ind_des_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
												</div>
											</div>
										</div>
										<div class="col-md-12 ">
											<div class="col-md-4">				
												<div class="margin-10">
													<span class="ac_label"><?php _e('Description Background Color',wpshopmart_accordion_pro_text_domain); ?></span>
													<input id="indvid_title_bg_clr" name="ind_des_bg_clr[]" type="text" value="<?php echo $ind_des_bg_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
												</div>
											</div>
											<div class="col-md-4">
												<div class="margin-10">
													<span class="ac_label"><?php _e('Accordion Open/close Icon Font Colour',wpshopmart_accordion_pro_text_domain); ?></span>
													<input id="ind_open_cl_icon_clr" name="ind_open_cl_icon_clr[]" type="text" value="<?php echo $ind_open_cl_icon_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
												</div>
											</div>
											<div class="col-md-4">				
												<div class="margin-10">
													<span class="ac_label"><?php _e('Accordion Open/close Icon Background Colour',wpshopmart_accordion_pro_text_domain); ?></span>
													<input id="ind_open_cl_icon_bg_clr" name="ind_open_cl_icon_bg_clr[]" type="text" value="<?php echo $ind_open_cl_icon_bg_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
												</div>
											</div>
										</div>
										
										<div class="col-md-12 ">
											<div class="col-md-4">
												<div class="margin-10">
													<span class="ac_label"><?php _e('Accordion Box Border Colour',wpshopmart_accordion_pro_text_domain); ?></span>
													<input id="ind_acc_box_clr" name="ind_acc_box_clr[]" type="text" value="<?php echo $ind_acc_box_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
												</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>	
							
						</li>
						<?php 
						$i++;
					} // end of foreach
				}else{
				echo "<h2>No Accordion Found</h2>";
				}
			}
			else 
			{
				  for($i=1; $i<=3; $i++)
				  {
					  ?>
					 <li class="wpsm_ac-panel single_acc_box panel-default" >
						<div class="panel-heading" role="tab" id="wpsm-heading<?php echo $i;?>">
							<h4 class="panel-title">
								<i class="fa fa-bars wpsm-ac-pro-move"></i>
								<a class="wpsm_accordion_handle wpsm-collapsed <?php if($i!=1){echo "collapsed";}?>" role="button" data-toggle="collapse" data-parent="#accordion_panel" href="#wpsm-collapse<?php echo $i;?>" aria-expanded="true" aria-controls="wpsm-collapse<?php echo $i;?>"></a>
								<span class="wpsm_tabs_header" id="wpsm-tabs-header-<?php echo $i;?>">Accordion Sample Title</span>
								<a class="remove_button" href="#delete" id="remove_bt" ><i class="fa fa-trash-o"></i></a>
							</h4>
						</div>
						<div id="wpsm-collapse<?php echo $i;?>" class="panel-collapse collapse <?php if($i==1){echo "in";}?>" role="tabpanel" aria-labelledby="wpsm-heading<?php echo $i;?>">
							<div class="panel-body">
								<span class="ac_label"><?php _e('Accordion Title',wpshopmart_accordion_pro_text_domain); ?></span>
								<input type="text" id="accordion_title[]" name="accordion_title[]" value="Accordion Sample Title" placeholder="Enter Accordion Title Here" class="wpsm_ac_label_text wpsm_ac_pro_title">
								<span class="ac_label"><?php _e('Accordion Description',wpshopmart_accordion_pro_text_domain); ?></span>
								
								<?php
									$editor_settings = array('wpautop' => false,'textarea_name'=>'accordion_desc[]');
									$editor_id = 'wpsm_ac_desc'.$i;
									wp_editor( 'Accordion Sample Description', $editor_id,$editor_settings);
								?>
								<div class="col-md-12" style="padding-left:0;margin-top:10px;">
									<div class="col-md-6 icon_icon_cls" style="padding-left:0;<?php if($acc_title_image_icon_type!="1" ){echo "display:none;";}?>">
										<span class="ac_label"><?php _e('Accordion Icon',wpshopmart_accordion_pro_text_domain); ?></span>				
										<div class="form-group input-group" style="">
											<input style="width:100%;" class="form-control regular-text" id="accordion_title_icon[]" name="accordion_title_icon[]" value="fa fa-laptop" type="text" readonly="readonly" />
											<span style="display:table-cell;width:1%;" class="wpsm_tabs_icon_picker input-group-addon icon-picker fa fa-laptop" id="" data-target="#"></span>
										</div>
									</div>
								
									<div class="form-group col-md-6 icon_img_size_settings_cls" style="padding-left:0;<?php if($acc_title_image_icon_type=="1" ){echo "display:none;";}?>">
										<span class="ac_label"><?php _e('Accordion Image Icon',wpshopmart_accordion_pro_text_domain); ?></span>
										<div class="input-group">
											<span class="input-group-addon" style="padding:4px;">
												<img class="wpsm-input-group-addon-img team-img-responsive" src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/images/default-image.png' ?>" />
											</span>
										<input type="button" name="" value="Upload Image" class="wpsm-input-group-addon-img-btn form-control btn btn-primary"  onclick="wpsm_media_upload(this)"/>
										<input style="display:block;width:100%" type="hidden"  name="accordion_title_image_icon[]"  value="<?php echo wpshopmart_accordion_pro_directory_url.'assets/images/default-image.png' ?>"  readonly="readonly" placeholder="No Media Selected" />
										<input style="display:block;width:100%" type="hidden"  name="test_pro_icon_image_id[]" class="wpsm_ac_label_text"  value=""  readonly="readonly" placeholder="No Media Selected" />
										</div>
									</div>
									<div class="form-group col-md-6">
										<span class="ac_label"><?php _e('Display Above Icon',wpshopmart_accordion_pro_text_domain); ?></span>
										<select name="enable_single_icon[]" style="width:100%" >
												<option value="yes" selected=selected>Yes</option>
												<option value="no" >No</option>
										</select>
									</div>
								</div>
								<span class="ac_label" style="margin-top: 15px;"><?php _e('Accordion Individual Color Settings',wpshopmart_accordion_pro_text_domain); ?></span>
									
								<div class="form-group ac_ind_clr_option_class ind_clr_settings_container" <?php if($acc_enable_ind_clr=="no"){ ?>style="display:none" <?php } ?>>
									<div class="col-md-12 ">
										<div class="col-md-4">
											<div class="margin-10">
												<span class="ac_label"><?php _e('Title/Icon Font Color',wpshopmart_accordion_pro_text_domain); ?></span>
												<input id="indvid_title_clr" name="ind_title_icon_clr[]" type="text" value="<?php echo $ind_title_icon_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
											</div>
										</div>
										<div class="col-md-4">				
											<div class="margin-10">
												<span class="ac_label"><?php _e('Title/Icon Background Color',wpshopmart_accordion_pro_text_domain); ?></span>
												<input id="indvid_title_bg_clr" name="ind_title_icon_bg_clr[]" type="text" value="<?php echo $ind_title_icon_bg_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
											</div>
										</div>
										<div class="col-md-4">
											<div class="margin-10">
												<span class="ac_label"><?php _e('Description Font Color',wpshopmart_accordion_pro_text_domain); ?></span>
												<input id="indvid_title_clr" name="ind_des_clr[]" type="text" value="<?php echo $ind_des_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
											</div>
										</div>
									</div>
									<div class="col-md-12 ">
										
										<div class="col-md-4">				
											<div class="margin-10">
												<span class="ac_label"><?php _e('Description Background Color',wpshopmart_accordion_pro_text_domain); ?></span>
												<input id="indvid_title_bg_clr" name="ind_des_bg_clr[]" type="text" value="<?php echo $ind_des_bg_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
											</div>
										</div>
										<div class="col-md-4">
											<div class="margin-10">
												<span class="ac_label"><?php _e('Accordion Open/close Icon Font Colour',wpshopmart_accordion_pro_text_domain); ?></span>
												<input id="ind_open_cl_icon_clr" name="ind_open_cl_icon_clr[]" type="text" value="<?php echo $ind_open_cl_icon_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
											</div>
										</div>
										<div class="col-md-4">				
											<div class="margin-10">
												<span class="ac_label"><?php _e('Accordion Open/close Icon Background Colour',wpshopmart_accordion_pro_text_domain); ?></span>
												<input id="ind_open_cl_icon_bg_clr" name="ind_open_cl_icon_bg_clr[]" type="text" value="<?php echo $ind_open_cl_icon_bg_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
											</div>
										</div>
									</div>
									
									<div class="col-md-12 ">
										<div class="col-md-4">
											<div class="margin-10">
												<span class="ac_label"><?php _e('Accordion Box Border Colour',wpshopmart_accordion_pro_text_domain); ?></span>
												<input id="ind_acc_box_clr" name="ind_acc_box_clr[]" type="text" value="<?php echo $ind_acc_box_clr; ?>" class="my-color-field" data-default-color="#ffffff" />
											</div>
										</div>
										
									</div>
									
								</div>
							</div>	
						</div>		
					</li>
					 <?php
				}
			}
			?>
	</ul>
</div>
<div  class="ac_pro_admin_wrapper">	
	<a class="wpsm_ac-panel add_wpsm_ac_new" id="add_new_ac" onclick="add_new_accordion()"   >
		<?php _e('Add New Accordion', wpshopmart_accordion_pro_text_domain); ?>
	</a>
	<a  style="float: left;padding:10px !important;background:#31a3dd;" class=" add_wpsm_ac_new delete_all_acc" id="delete_all_acc"    >
		<i style="font-size:57px;"class="fa fa-trash-o"></i>
		<span style="display:block"><?php _e('Delete All',wpshopmart_accordion_pro_text_domain); ?></span>
	</a>
	
	
	
	
	<?php require('add-ac-js-footer.php'); ?>
</div>	

<?php ?>