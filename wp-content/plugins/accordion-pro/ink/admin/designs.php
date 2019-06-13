<?php
	$PostId = get_the_ID();
	$wpsm_no_of_designs=20;
	$De_Settings = unserialize(get_option('wpsm_accordion_pro_default_settings'));
	$Accordion_Settings = unserialize(get_post_meta( $PostId, 'Accordion_Pro_Settings', true));
	if($Accordion_Settings['acc_sec_title'] && $Accordion_Settings['op_cl_icon'] && $Accordion_Settings['acc_title_bg_clr']) {  
	 $templates     	= $Accordion_Settings['templates'];
	}
	else{
	$templates=$De_Settings['templates'];
	}
	
?>



<div class="tabs_pro_admin_wrapper">	
	<div class="wpsm_site_sidebar_widget_title">
		<h4>Select Your Design</h2>
	</div>
	
	<a href="#0" id="cd-btn" class="btn btn btn-primary btn-lg btn-select-design-button" >Select Designs</a>
</div>
	<div class="cd-panel from-right" id="wpsm_cd_panel">
		<header class="cd-panel-header">
			<h1>Select Your Design</h1>
			<a href="#0" class="cd-panel-close" id="wpsm_cd_panel_close">Close</a>
		</header>

		<div class="cd-panel-container">
			<div class="cd-panel-content">
			<?php for($i=1;$i<=$wpsm_no_of_designs;$i++){ ?>
				<div class="col-md-6">
					<div class="demoftr">	
						<span class="wpsm_checked_temp checked_temp_radio" id="wpsm_checked_temp<?php echo $i; ?>" <?php if($templates!=$i) { ?>  style="display:none" <?php } ?> ><i class="fa fa-check"></i></span>
						<div class="wpsm_home_portfolio_showcase">
							<img class="wpsm_img_responsive ftr_img" src="<?php echo wpshopmart_accordion_pro_directory_url.'assets/images/design/accordion-'.$i.'.png'?>">
							<span><a target="_new" href="http://demo.wpshopmart.com/accordion-pro/accordion-template-<?php echo $i; ?>/">Demo</a></span>
						</div>
						<div class="wpsm_home_portfolio_links">
							<h3 class="text-center pull-left">Design <?php echo $i; ?></h3>
							<button type="button" <?php if($templates==$i) { ?> disabled="disabled" <?php } ?> class="pull-right btn btn-primary wpsm_design_btn design_select_btn" id="wpsm_templates_btn_<?php echo $i; ?>" onclick="select_template_h('<?php echo $i; ?>')"><?php if($templates==$i){  echo "Selected"; } else { echo "Select"; } ?></button>
							<input type="radio" name="templates" id="wpsm_design_<?php echo $i; ?>" value="<?php echo $i; ?>" <?php if($templates==$i){  echo "checked"; } ?> style="display:none">
						</div>		
					</div>		
				</div>
			<?php } ?>
			</div> <!-- cd-panel-content -->
		</div> <!-- cd-panel-container -->
	</div> <!-- cd-panel -->
	

<script>

function select_template_h(id)
{
	
	jQuery(".wpsm_design_btn").attr('style','');
	jQuery(".wpsm_design_btn").prop("disabled", false);
	jQuery(".wpsm_design_btn").text("Select");
	
	jQuery(".wpsm_checked_temp").hide();
	jQuery("#wpsm_checked_temp"+id).show();
	
	
	jQuery("#wpsm_templates_btn_"+id).attr('disabled','disabled');
	jQuery("#wpsm_templates_btn_"+id).attr('style','background:#F50000;border-color:#F50000;');
	jQuery("#wpsm_templates_btn_"+id).text("Selected");
	 jQuery("#wpsm_design_"+id).prop( "checked", true );
	
}




jQuery(document).ready(function($){
	//open the lateral panel
	$('#cd-btn').on('click', function(event){
		event.preventDefault();
		$('#wpsm_cd_panel').addClass('is-visible');
	});
	//clode the lateral panel
	$('#wpsm_cd_panel').on('click', function(event){
		if( $(event.target).is('#wpsm_cd_panel') || $(event.target).is('#wpsm_cd_panel_close') ) { 
			$('#wpsm_cd_panel').removeClass('is-visible');
			event.preventDefault();
		}
	});
	
});

</script>