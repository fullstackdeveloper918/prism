		<style>
			
			
		</style>
		<div class="wpsm_site_sidebar_widget_title">
			<h4><?php _e('Accordion Pro Shortcode',wpshopmart_accordion_pro_text_domain); ?></h2>
		</div>
		<p><?php _e("Use below shortcode in any Page/Post to publish your Accordion", wpshopmart_accordion_pro_text_domain);?></p>
		<input readonly="readonly" type="text" value="<?php echo "[AC_PRO id=".get_the_ID()."]"; ?>">
		<?php
			$PostId = get_the_ID();
			$Accordion_Settings = unserialize(get_post_meta( $PostId, 'Accordion_Pro_Settings', true));
			if($Accordion_Settings['acc_sec_title'] && $Accordion_Settings['op_cl_icon'] && $Accordion_Settings['acc_title_bg_clr']) {  
			 $custom_css    = $Accordion_Settings['custom_css'];
			}
			else{
			$custom_css="";
			}		
		?>
		<h3 class="customcss-title">Custom Css</h3>
		<textarea name="custom_css" id="custom_css" style="width:100% !important ;height:300px;background:#ECECEC;"><?php echo $custom_css ; ?></textarea>
		<p style="
    background: #000;
    margin: 0px;
    text-align: Center;
    color: #fff;
    padding: 10px;
">Enter Css without <strong>&lt;style&gt; &lt;/style&gt; </strong> tag</p>
		<br>
		
		<?php if(isset($Accordion_Settings['custom_css'])){ ?> 
		
		<div class="wpsm_site_sidebar_widget_title">
			<h4> <?php _e('Accordion Pro Dfault Settings Option ',wpshopmart_accordion_pro_text_domain); ?></h2>
		</div>
		<h3><?php _e('Add This Accordion settings as default setting for new Accordion',wpshopmart_accordion_pro_text_domain); ?></h3>
		<div class="">
			<a  class="button button-primary button-hero" name="updte_wpsm_ac_pro_default_settings" id="updte_wpsm_ac_pro_default_settings" onclick="updte_wpsm_ac_pro_default_settings()"><?php _e('Update Default Settings',wpshopmart_accordion_pro_text_domain); ?></a>
		</div>	
		<?php } ?>
		
		
		<script>
		  var editor = CodeMirror.fromTextArea(document.getElementById("custom_css"), {
		   lineNumbers: true,
		   styleActiveLine: true,
			matchBrackets: true,
			hint:true,
			theme : 'ambiance',
			extraKeys: {"Ctrl-Space": "autocomplete"},
		  });
	  
		</script>