<div class="wpsm_panel-group" id="accordion_pro_<?php echo $post_id; ?>" role="tablist" aria-multiselectable="true">
	<?php 
		$i=1;
		
		if($enable_toggle=="yes"){
			$data_parent="";
		}
		
		else{
			
			$data_parent="accordion_pro_$post_id";
		}
		foreach($accordion_data as $accordion_single_data)
		{
			/*$accordion_title = $accordion_single_data['accordion_title'];
			$accordion_title_icon = $accordion_single_data['accordion_title_icon'];
			$enable_single_icon = $accordion_single_data['enable_single_icon'];
			$accordion_desc = $accordion_single_data['accordion_desc'];*/
			
			foreach($data_option_names as $data_option_name => $default_value) 
			{
				if(isset($accordion_single_data[$data_option_name])) 
					${"" . $data_option_name}  = $accordion_single_data[$data_option_name];
				else
					${"" . $data_option_name}  = $default_value;
			}
			
			
			switch($expand_option){
				case "1":
					if($i==1){
						$in ="in";
						$collapsed="";
					}else{
						$in="";
						$collapsed="class=collapsed";
					}
				break;
				case "2":
					$in ="in";
					$collapsed="";
				break;
				case "3":
					$in ="";
					$collapsed="class=collapsed";
				break;
			}
			?>
				<div class="wpsm_panel panel wpsm_panel-default" id="offset_<?php echo $post_id; ?>_<?php echo $i; ?>">
					<div class="wpsm_panel-heading" role="tab" id="heading_<?php echo $post_id; ?>_<?php echo $i; ?>">
						<h4 class="wpsm_panel-title">
							<a <?php if($scroll_to=="yes" && $enable_toggle=="yes"){ ?> onclick="scroll_to(<?php echo $i; ?>)" <?php } ?> role="button" <?php echo $collapsed; ?> data-toggle="collapse" data-parent="#<?php echo $data_parent; ?>" href="#collapse_<?php echo $post_id; ?>_<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse_<?php echo $post_id; ?>_<?php echo $i; ?>">
								<?php if($templates=="6") {  ?><span></span> <?php } ?>
								<?php if($enable_single_icon=="yes"){ 
											if($acc_title_image_icon_type=='1'){ ?>
												<i class="fa <?php echo $accordion_title_icon; ?> ac_title_icon"></i> <?php 
											}
											else{?>
												<img class="ac_title_img_icon ac_title_icon" src="<?php echo $accordion_title_image_icon; ?>"/> <?php 
											}
										}?>
								<?php echo $accordion_title; ?>
								
							</a>
						</h4>
					</div>
					<div id="collapse_<?php echo $post_id; ?>_<?php echo $i; ?>" class="wpsm_panel-collapse collapse <?php echo $in; ?>" role="tabwpsm_panel" aria-labelledby="heading_<?php echo $post_id; ?>_<?php echo $i; ?>">
						<div class="wpsm_panel-body">
							<div id="#wpsm_acc_desc_<?php echo $post_id; ?>_<?php echo $i; ?>" class="wpsm_panel-body_inner <?php if($content_animation!="0"){ ?> animated <?php echo $content_animation; } ?>"><?php
								$accordion_desc = str_replace('&nbsp;', ' <br />', $accordion_desc);
								echo do_shortcode($accordion_desc); ?>
							</div>
							   
						</div>
					</div>
						<?php if($acc_des_height_type=="2")
						{?>
						<script>
							(function(jQuery){
								jQuery(window).on("load",function(){
									jQuery("#collapse_<?php echo $post_id; ?>_<?php echo $i; ?> .wpsm_panel-body_inner").mCustomScrollbar({theme: "tabs_pro_scroll"});
								});
							})(jQuery);
							
						</script>
						<?php 
						}	?>
					
				</div>
			<?php
				
			$i++;
		}		
	?>
	
</div>
<?php if($on_hover_toggle=="yes"){ ?>
<script>
	jQuery(function() {
	  jQuery('#accordion_pro_<?php echo $post_id; ?> .wpsm_panel').hover(function() {
		  var $collapse2 = jQuery(this).find(".wpsm_panel-collapse");
		setTimeout(function(){
		$collapse2.collapse("show");
		},300);
		
		
	  }, function() {
		var $collapse = jQuery(this).find(".wpsm_panel-collapse");
		
		setTimeout(function(){
		  $collapse.collapse("hide");
		},300);
	  });
	}); 
</script>
<?php }  
 if($scroll_to=="yes"){ ?>
<script>  

	<?php if($enable_toggle=="no"){ ?>	
	jQuery(function () {
		jQuery('#accordion_pro_<?php echo $post_id; ?>').on('shown.bs.collapse', function (e) {
			var id =  jQuery(this).find(".wpsm_panel-collapse.in").parent().attr('id');
			
			var offset = jQuery('.wpsm_panel.wpsm_panel-default > .wpsm_panel-collapse.in').offset();
			 if(offset) {
				jQuery('html,body').animate({
					scrollTop: jQuery('#'+id).offset().top -30
				}, 800); 
			}
		});	
	}); 
	<?php } else { ?>
	function scroll_to(id){
		
		jQuery('html,body').animate({
					scrollTop: jQuery('#offset_<?php echo $post_id; ?>_'+id).offset().top -30
				}, 800); 
			
		
	}
	<?php } ?>		
				
</script>
	<?php
} ?>