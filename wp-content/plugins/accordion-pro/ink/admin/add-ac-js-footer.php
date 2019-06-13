<script>
	var j = 1000;
	function add_new_accordion(){
		<?php
		  //getting only variable names
		foreach($data_option_names as $data_option_name => $data_default_value) 
			{	
				${"" . $data_option_name}=$data_default_value;
				?>
				var <?php echo $data_option_name."=\"".${"" . $data_option_name}."\"";?>;
				<?php
			}
		?>	
	var output = 	'<li class="wpsm_ac-panel single_acc_box panel-default" >'+
		'<div class="panel-heading" role="tab" id="wpsm-heading'+j+'">'+
			'<h4 class="panel-title">'+
				'<i class="fa fa-bars wpsm-ac-pro-move"></i>'+
				'<a class="wpsm_accordion_handle wpsm-collapsed collapsed" role="button" data-toggle="collapse" data-parent="#accordion_panel" href="#wpsm-collapse'+j+'" aria-expanded="true" aria-controls="wpsm-collapse'+j+'"></a>'+
				'<span class="wpsm_tabs_header" id="wpsm-tabs-header-'+j+'">Accordion Sample Title</span>'+
				'<a class="remove_button" href="#delete" id="remove_bt" ><i class="fa fa-trash-o"></i></a>'+
			'</h4>'+
		'</div>'+
		'<div id="wpsm-collapse'+j+'" class="panel-collapse collapse " role="tabpanel" aria-labelledby="wpsm-heading'+j+'">'+
			'<div class="panel-body">'+
				'<span class="ac_label"><?php _e("Accordion Title",wpshopmart_accordion_pro_text_domain); ?></span>'+
				'<input type="text" id="accordion_title[]" name="accordion_title[]" value="'+accordion_title+'" placeholder="Enter Accordion Title Here" class="wpsm_ac_label_text wpsm_ac_pro_title">'+
				'<span class="ac_label"l><?php _e("Accordion Description",wpshopmart_accordion_pro_text_domain); ?></span>'+
				'<textarea  id="wpsm_ac_pro_desc-'+j+'" name="accordion_desc[]"  placeholder="Enter Accordion Description Here" class="wpsm_ac_label_text">'+accordion_desc+'</textarea>'+
				
				'<div class="col-md-12" style="padding-left:0;margin-top:10px;">'+
					'<div class="col-md-6 icon_icon_cls" style="padding-left:0;">'+
						'<span class="ac_label"><?php _e('Accordion Icon',wpshopmart_accordion_pro_text_domain); ?></span>	'+			
						'<div class="form-group input-group" style="">'+
							'<input style="width:100%;" class="form-control regular-text" id="accordion_title_icon[]" name="accordion_title_icon[]" value="'+accordion_title_icon+'" type="text" readonly="readonly" />'+
							'<span style="display:table-cell;width:1%;" class="wpsm_tabs_icon_picker input-group-addon icon-picker '+accordion_title_icon+'" id="" data-target="#"></span>'+
						'</div>'+
					'</div>'+
				
					'<div class="form-group col-md-6 icon_img_size_settings_cls" style="padding-left:0;">'+
						'<span class="ac_label"><?php _e('Accordion Image Icon',wpshopmart_accordion_pro_text_domain); ?></span>'+
						'<div class="input-group">'+
							'<span class="input-group-addon" style="padding:4px;">'+
								'<img class="wpsm-input-group-addon-img team-img-responsive" src="'+accordion_title_image_icon+'" />'+
							'</span>'+
						'<input type="button" name="" value="Upload Image" class="wpsm-input-group-addon-img-btn form-control btn btn-primary"  onclick="wpsm_media_upload(this)"/>'+
						'<input style="display:block;width:100%" type="hidden"  name="accordion_title_image_icon[]"  value="'+accordion_title_image_icon+'"  readonly="readonly" placeholder="No Media Selected" />'+
						'<input style="display:block;width:100%" type="hidden"  name="test_pro_icon_image_id[]" class="wpsm_ac_label_text"  value=""  readonly="readonly" placeholder="No Media Selected" />'+
						'</div>'+
					'</div>'+
					'<div class="form-group col-md-6" style="padding-left:0;">'+
						'<span class="ac_label"><?php _e('Display Above Icon',wpshopmart_accordion_pro_text_domain); ?></span>'+
						'<select name="enable_single_icon[]" style="width:100%" >'+
								'<option value="yes" selected=selected>Yes</option>'+
								'<option value="no" >No</option>'+
						'</select>'+
					'</div>'+	
				'</div>'+
				'<span class="ac_label" style="margin-top: 15px;"><?php _e('Accordion Individual Color Settings',wpshopmart_accordion_pro_text_domain); ?></span>'+
				
				'<div class="form-group ac_ind_clr_option_class ind_clr_settings_container" >'+
					
					'<div class="col-md-12 ">'+
						'<div class="col-md-4">'+
							'<div class="margin-10">'+
								'<span class="ac_label"><?php _e('Title/Icon Font Color',wpshopmart_accordion_pro_text_domain); ?></span>'+
								'<input id="indvid_title_clr" name="ind_title_icon_clr[]" type="text" value="'+ind_title_icon_clr+'" class="my-color-field" data-default-color="#ffffff" />'+
							'</div>'+
						'</div>'+
						'<div class="col-md-4">	'+			
							'<div class="margin-10">'+
								'<span class="ac_label"><?php _e('Title/Icon Background Color',wpshopmart_accordion_pro_text_domain); ?></span>'+
								'<input id="indvid_title_bg_clr" name="ind_title_icon_bg_clr[]" type="text" value="'+ind_title_icon_bg_clr+'" class="my-color-field" data-default-color="#ffffff" />'+
							'</div>'+
						'</div>'+
						'<div class="col-md-4">'+
							'<div class="margin-10">'+
								'<span class="ac_label"><?php _e('Description Font Color',wpshopmart_accordion_pro_text_domain); ?></span>'+
								'<input id="indvid_title_clr" name="ind_des_clr[]" type="text" value="'+ind_des_clr+'" class="my-color-field" data-default-color="#ffffff" />'+
							'</div>'+
						'</div>'+
					'</div>'+
					'<div class="col-md-12 ">'+
						'<div class="col-md-4">	'+			
							'<div class="margin-10">'+
								'<span class="ac_label"><?php _e('Description Background Color',wpshopmart_accordion_pro_text_domain); ?></span>'+
								'<input id="indvid_title_bg_clr" name="ind_des_bg_clr[]" type="text" value="'+ind_des_bg_clr+'" class="my-color-field" data-default-color="#ffffff" />'+
							'</div>'+
						'</div>'+
						'<div class="col-md-4">'+
							'<div class="margin-10">'+
								'<span class="ac_label"><?php _e('Accordion Open/close Icon Font Colour',wpshopmart_accordion_pro_text_domain); ?></span>'+
								'<input id="ind_open_cl_icon_clr" name="ind_open_cl_icon_clr[]" type="text" value="'+ind_open_cl_icon_clr+'" class="my-color-field" data-default-color="#ffffff" />'+
							'</div>'+
						'</div>'+
						'<div class="col-md-4">	'+			
							'<div class="margin-10">'+
								'<span class="ac_label"><?php _e('Accordion Open/close Icon Background Colour',wpshopmart_accordion_pro_text_domain); ?></span>'+
								'<input id="ind_open_cl_icon_bg_clr" name="ind_open_cl_icon_bg_clr[]" type="text" value="'+ind_open_cl_icon_bg_clr+'" class="my-color-field" data-default-color="#ffffff" />'+
							'</div>'+
						'</div>'+
					'</div>'+
					'<div class="col-md-12 ">'+
						'<div class="col-md-4">	'+			
							'<div class="margin-10">'+
								'<span class="ac_label"><?php _e('Accordion Box Border Colour',wpshopmart_accordion_pro_text_domain); ?></span>'+
								'<input id="ind_acc_box_clr" name="ind_acc_box_clr[]" type="text" value="'+ind_acc_box_clr+'" class="my-color-field" data-default-color="#ffffff" />'+
							'</div>'+
						'</div>'+
					'</div>'+
					
				'</div>'+
			'</div>'+
		'</div>'+
	'</li>';
	jQuery(output).hide().appendTo("#accordion_panel").slideDown("slow");
	tinyMCE.execCommand('mceAddEditor', false, 'wpsm_ac_pro_desc-'+j);
	jQuery('.my-color-field').wpColorPicker();
	jQuery('.icon-picker').iconPicker();
	dynamic_change_header();
	hide_color_setting();
	fn_ac_icon_setting();
	j++
	
	}
	
	
	jQuery(document).ready(function(){
		
		// to add editor on textarea
		tinyMCE.init({
			toolbar: [
        "formatselect,bold,italic,blockquote,bullist,numlist,alignleft,aligncenter,alignright,link,unlink,fullscreen,wp_adv,undo,redo"
        
			],
			mode : "none",
			statusbar: false,
			menubar: false,
			statusbar: true,
			setup: function (editor) {
				editor.on('change', function () {
					editor.save();
				});
				
			},
		});
		
		//accordion
		jQuery(document).on('click', '.panel-title .wpsm_accordion_handle', function()
		{	
				if(jQuery(this).hasClass('wpsm-collapsed'))
				{	
					jQuery(".wpsm_accordion_handle").addClass('collapsed wpsm-collapsed');
					jQuery(this).removeClass('collapsed wpsm-collapsed');
					
					jQuery('.panel-collapse').removeClass('in');
					jQuery(this).parents('.panel-heading').siblings('.panel-collapse').addClass('in');
				}
				else
				{
					jQuery(".wpsm_accordion_handle").addClass('collapsed wpsm-collapsed');
					jQuery('.panel-collapse').removeClass('in');
				}
			
			
		})	
		//dynamic Header Change fn call
		dynamic_change_header();
		
		jQuery('#accordion_panel').sortable({
			revert: true,
		    handle: '.wpsm-ac-pro-move' 
		});
	});
	
	
</script>
<script>
	jQuery(function(jQuery)
		{
			var accordion = 
			{
				accordion_ul: '',
				init: function() 
				{
					this.accordion_ul = jQuery('#accordion_panel');

					this.accordion_ul.on('click', '.remove_button', function() {
					if (confirm('Are you sure you want to delete this?')) {
						jQuery(this).parents("li:first").slideUp(600, function() {
							jQuery(this).remove();
						});
					}
					return false;
					});
					 jQuery('#delete_all_acc').on('click', function() {
						if (confirm('Are you sure you want to delete all the Accordions?')) {
							jQuery(".single_acc_box").slideUp(600, function() {
								jQuery(".single_acc_box").remove();
							});
							jQuery('html, body').animate({ scrollTop: 0 }, 'fast');
							
						}
						return false;
					});
					
			   }
			};
		accordion.init();
	});
</script>


<script>
	function open_editor(id){
		var value = jQuery("#"+id).closest('li').find('textarea').val();
		jQuery("#get_text-html").click();
		jQuery("#get_text").val(value);
		jQuery("#get_id").val(jQuery("#"+id).attr('id'));
	 }
	function insert_html(){
		jQuery("#get_text-html").click();
		var html_text = jQuery("#get_text").val();
		var id = jQuery("#get_id").val();
		jQuery("#"+id).closest('li').find('textarea').val(html_text);
			
	}
	//change header
	function dynamic_change_header(){
		jQuery('.wpsm_ac_pro_title').on('input', function() {
			cur_text=jQuery(this).val();
			jQuery(this).parents("li").find('.panel-heading').find("span").text(cur_text);
		});
	}
	
</script>


