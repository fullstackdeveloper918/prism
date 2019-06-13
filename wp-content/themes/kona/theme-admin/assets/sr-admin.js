jQuery(document).ready(function(){
	
	
	/*
	*	Option Panel Tabs
	*/
	jQuery('.section-content').first().show();
	jQuery('#section-list li').first().find('a').addClass('active');
	
  	jQuery("#section-list li a").on("click", function() {  
		var openid = jQuery(this).attr('href');
		
		if (jQuery(this).is('.active')) {

		} else {
			jQuery('#section-list li a').removeClass('active');
			jQuery(this).addClass('active');
			
			jQuery('.section-content').fadeOut(350);
			jQuery('#'+openid).delay(350).fadeIn(350);
		}
		
		return false;
	});
	
	
	/*
	*	Option Group Toggle
	*/
  	jQuery(".optiongroup-title").on("click", function() {  
		jQuery(this).siblings('.optiongroup-content').toggle(0);
		jQuery(this).toggleClass('closed');
		return false;
	});
	
	
	
	/*
	* 	IMAGE UPLOAD
	*/
  	jQuery(".sr_upload_image_button").on("click", function() {  
		var formfield = jQuery(this).siblings('.upload_image');
		var mediaframe = wp.media({
			title: 'Choose Image',
			library: { type: 'image' },
			button: { text: 'Select Image' }
		});
		mediaframe.on( "select", function() {
				// Grab the selected attachment.
				var imagefile = mediaframe.state().get("selection").first();
				var imagesrc = imagefile.attributes.url;
            	formfield.val(imagesrc).change();
		});
	    mediaframe.open();
       return false;  
    });
		
	jQuery(".sr_remove_image_button").on("click", function() {  
		jQuery(this).siblings('.upload_image').val('');
		jQuery(this).siblings('.preview_image').find('img').remove();  
		jQuery(this).addClass("hide");  
       	return false;  
    });
	
	jQuery(".sr_upload_image_button").siblings('input.upload_image').on('change', function() {  
		var imageFile = jQuery(this).val();
		if(imageFile) {
			if (!jQuery(this).siblings('.preview_image').find('img').length) {
				jQuery(this).siblings('.preview_image').append('<img src="" alt="preview image" />');
			}
			jQuery(this).siblings('.preview_image').find('img').attr('src',imageFile);
			jQuery(this).siblings('.sr_remove_image_button').removeClass("hide");
		}  
       	return false;  
    });
	
	
	
	/*
	* 	VIDEO UPLOAD
	*/
  	jQuery(".upload_video_button").on("click", function() {  
		var formfield = jQuery(this).siblings('input[type="text"]');
		
		var mediaframe = wp.media({
			title: 'Choose Video',
			library: { type: 'video' },
			button: { text: 'Select Video' }
		});
		mediaframe.on( "select", function() {
				// Grab the selected attachment.
				var imagefile = mediaframe.state().get("selection").first();
				var imagesrc = imagefile.attributes.url;
            	formfield.val(imagesrc);  				
		});
	    mediaframe.open();
		
       return false;  
    });
	
	
	/*
	* 	AUDIO UPLOAD
	*/
  	jQuery(".upload_audio_button").on("click", function() {  
		var formfield = jQuery(this).siblings('input[type="text"]');
		
		var mediaframe = wp.media({
			title: 'Choose Audio',
			library: { type: 'audio' },
			button: { text: 'Select Audio' }
		});
		mediaframe.on( "select", function() {
				// Grab the selected attachment.
				var imagefile = mediaframe.state().get("selection").first();
				var imagesrc = imagefile.attributes.url;
            	formfield.val(imagesrc);  				
		});
	    mediaframe.open();
		
       return false;  
    });
	
	
	/*
	* 	Checkbox
	*/
	jQuery('.checkbox-pseudo a').live("click", function() { 
		var value = jQuery(this).data('value');
		jQuery(this).siblings("a").removeClass('active');
		jQuery(this).addClass('active');
		jQuery(this).parent(".checkbox-pseudo").siblings("select").val(value).change();
		return false;
	});
	jQuery('.checkbox-pseudo').siblings("select").on('change',function() {
		var val = jQuery(this).val();
		jQuery(this).siblings('.checkbox-pseudo').find('a').removeClass('active');
		jQuery(this).siblings('.checkbox-pseudo').find('a[data-value="'+val+'"]').addClass('active');
	});
	
	
	
	/*
	* 	Selectbox Custom
	*/
	jQuery('.option_custom_select a').live("click", function() { 
		var value = jQuery(this).attr('href');
		jQuery(this).siblings("a").removeClass('selected');
		jQuery(this).addClass('selected');
		jQuery(this).siblings("select").val(value).change();
		return false;
	});
	jQuery('.option_custom_select select').on('change',function() {
		var val = jQuery(this).val();
		jQuery(this).siblings('a').removeClass('selected');
		jQuery(this).siblings('a[href="'+val+'"]').addClass('selected');
	});
	
	
	
	/*
	Hiding Group
	*/
	jQuery('.hiding select').on('change',function() {
		var val = jQuery(this).val();
		if (jQuery(this).find(':selected').data('hiding')) { val = jQuery(this).find(':selected').data('hiding'); }
		 	if (val.indexOf(' ') > 0) { val = val.substring(0, val.indexOf(' ')); }  //  if val has blank spaces/character
		var name = jQuery(this).attr('id');
		var parent = jQuery(this).parents(".hiding");
		jQuery(parent).siblings('.hide'+name).hide();
		jQuery(parent).siblings('.'+name+'_'+val).show();
	});
	
	
	jQuery('.hiding select').each(function() {
		var val = jQuery(this).val();
		if (jQuery(this).find(':selected').data('hiding')) { val = jQuery(this).find(':selected').data('hiding'); }
		 	if (val.indexOf(' ') > 0) { val = val.substring(0, val.indexOf(' ')); }  //  if val has blank spaces/character
		var name = jQuery(this).attr('id');
		var parent = jQuery(this).parents(".hiding");
		jQuery(parent).siblings('.hide'+name).hide();
		jQuery(parent).siblings('.'+name+'_'+val).show();
	});
	
	
	
	
	/*
	*	Google Font Weight option
	*/
	jQuery('.font-change-weight').change(function() {
		var val = jQuery(this).val();
		var weights = jQuery(this).find(':selected').data('weights');
		var weights = weights.toString();
		if (weights.indexOf(";") != -1) { 
			var weightarray = weights.split(';'); 
			var newoptions = '';
			jQuery.each( weightarray, function(index,value) {
				newoptions += '<option value="'+value+'">'+value+'</option>';
			});
		} else {
			var newoptions = '<option value="'+weights+'">'+weights+'</option>';
		}
		jQuery(this).parent('.value_half').siblings('.value_weight').find('.weight').html(newoptions);
	});
	
	
	
	/*
	*	Import Loader (new since orio)
	*/
  	jQuery(".sr-open-demo-options").on("click", function() {  
		jQuery('.sr-import-loader').addClass("visible");
		var url = jQuery(this).data('url');
		var options = jQuery(this).data('options');
		options = options.split('||');
		
		jQuery.each(options , function(index, val) { 
		   	var o = val.split(':');
			if (jQuery(".import-options > div.option-"+o[0]).length) {
				jQuery(".import-options > div.option-"+o[0]).show();
				jQuery(".import-options > div.option-"+o[0]).attr('data-val',o[1]);
				
				// Set to YES or NO
				if (o[2] === '1' || o[2] === '2') {
					jQuery(".import-options > div.option-"+o[0]+" select").val("yes").change();
				}
				if (o[2] === '2') {
					jQuery(".import-options > div.option-"+o[0]+"").addClass("mandatory");
				}
			}
		});
		
		jQuery('.sr-import-loader .final-import').attr('href',url);
		return false;
	});
	
  	jQuery(".sr-import-loader .final-import").on("click", function() {
		var i = 2;
		jQuery(".import-options > div select").each(function(index) {
			if (jQuery(this).val() === 'yes' && jQuery(this).closest("div[class*='option-']").data('val') !== 'default') {
				jQuery('.sr-import-loader .final-import').attr('href', jQuery('.sr-import-loader .final-import').attr('href') + "&file"+i+"="+jQuery(this).parents("div[class*='option-']").data('val'));
				i++;
			}
		});
		jQuery('.sr-import-loader').addClass("loading");
		jQuery('.sr-close-demo-options').fadeOut(300);
		return true;
		return false;
	});
	
  	jQuery(".sr-close-demo-options").on("click", function() {  
		jQuery('.sr-import-loader').removeClass("visible");
		jQuery(".import-options .option_value select").val("no").change();
		return false;
	});
	
	
	
	
	/*
	*	Enable color picker
	*/
    jQuery('.sr-color-field').wpColorPicker();
	
	
	
	/*	
	*	META TABS (for custom post meta)
	*/
  	jQuery(".sr-tab-list li a").on("click", function() {  
		var tab = jQuery(this).attr("href");
		jQuery(this).parent("li").addClass("active").siblings("li").removeClass("active");
		jQuery(".sr-tab-content[data-tab="+tab+"]").addClass("active").siblings(".sr-tab-content").removeClass("active");
		return false;
	});
	
	
	
	/*	
	*	Enable Sortable
	*/
	jQuery( ".sortable-list .sortable-container" ).sortable({
		revert: true,
		cancel: ".disable-sortable",
		placeholder: "sortable-placeholder",
		handle: '> .image-preview',
		start: function(e,ui){
			ui.placeholder.height(ui.item.height());
		},
		stop: function(e,ui) {  
			updateSortableContainer(ui.item.parent("ul.sortable-container"));
		}
	});
		
		
	/*
	* 	ADD CONTENT TO SORTABLE
	*/
  	//jQuery(".add-to-sortable-media").on("click", function() {  
	jQuery("body").on("click", ".add-to-sortable-media", function() {  
		var sortableField = jQuery(this).siblings('.sortable-container');
		
		var mediaframe = wp.media({
			title: 'Select one or multiple Images',
			library: { type: 'image' },
			button: { text: 'Add Image(s)' },
			multiple: true
		});
		mediaframe.on( "select", function() {
			var selection = mediaframe.state().get('selection');
				selection.map( function( attachment ) {
				var image = attachment.toJSON();
				if (image.sizes.thumbnail) { var thumbnail = image.sizes.thumbnail.url; }
				else { var thumbnail = image.url; }
				// if change, it might also be changed in pagebuilder js
				var output = '<li><input type="hidden" name="type" value="image" class="to-json"><input type="hidden" name="id" value="'+image.id+'" class="to-json"><input type="hidden" name="thumb" value="'+thumbnail+'" class="to-json"><div class="image-preview"><img src="'+thumbnail+'"></div><a href="#" class="delete-sortable">delete</a></li>';
				sortableField.append(output);
            });
			updateSortableContainer(sortableField);
		});
	    mediaframe.open();
				
       return false;  
    });
	
	
	/*
	* 	ADD CONTENT TO SORTABLE
	*/
	jQuery("body").on("click", ".add-to-sortable-media-options", function() {  
		
		var sortableField = jQuery(this).siblings('.sortable-container');
		if (jQuery(this).attr('data-options')) { var mediaOptions = jQuery(this).data('options'); mediaOptions = mediaOptions.split("|"); }
		
		var mediaframe = wp.media({
			title: 'Select one or multiple Images',
			library: { type: 'image' },
			button: { text: 'Add Image(s)' },
			multiple: true
		});
		mediaframe.on( "select", function() {
			var selection = mediaframe.state().get('selection');
				selection.map( function( attachment ) {
				var image = attachment.toJSON();
				if (image.sizes.thumbnail) { var thumbnail = image.sizes.thumbnail.url; }
				else { var thumbnail = image.url; }
				
				// options
				var outputOptions = '';
				if(typeof(mediaOptions) != "undefined" && mediaOptions !== null && mediaOptions.length > 0) {
					for (i=0; i < mediaOptions.length; i++) {
						var field = mediaOptions[i].split(":");
						if(i === 0) { outputOptions += '<div class="options">'; }
						if(field[1] === 'textarea') {
							outputOptions += '<textarea name="'+field[0]+'" class="to-json" placeholder="'+field[0]+'"></textarea>';	
						} else if(field[1] === 'text') {
							outputOptions += '<input type="text" name="'+field[0]+'" placeholder="'+field[0]+'" class="to-json">';	
						} else if(field[1] === 'select') {
							outputOptions += '<select name="'+field[0]+'" class="to-json">';
							var fieldOptions = field[2].split(",");
							for (o=0; o < fieldOptions.length; o++) {
							outputOptions += '<option value="'+fieldOptions[o]+'">'+field[0]+': '+fieldOptions[o]+'</option>';
							}
							outputOptions += '</select>';
						}
						if(i+1 === mediaOptions.length) { outputOptions += '</div>'; }
					}
				}
				
				// if change, it might also be changed in pagebuilder js
				var output = '<li><input type="hidden" name="type" value="image" class="to-json"><input type="hidden" name="id" value="'+image.id+'" class="to-json"><input type="hidden" name="thumb" value="'+thumbnail+'" class="to-json"><div class="image-preview"><img src="'+thumbnail+'"></div>'+outputOptions+'<a href="#" class="delete-sortable">delete</a></li>';
				sortableField.append(output);
            });
			updateSortableContainer(sortableField);
		});
	    mediaframe.open();
		
       return false;  
    });
	
	
	/*
	* 	Update Sortable Container
	*/
	function updateSortableContainer(container) {
		var json = '{"sortable":[';
		var ids = '';
		container.find("li").each(function(index) {
			var li = jQuery(this);
			if (index > 0) { json +=','; ids +=','; }
			json += '{';
			li.find(".to-json").each(function(i){
				if (i > 0) { json +=',';}
				if (jQuery(this).attr('name') == 'id') { ids += jQuery(this).val();}
				json += '"'+jQuery(this).attr('name')+'":"'+jQuery(this).val()+'"';
			});
			json += '}';
		});
		json += ']}';
		if (json === '{"sortable":[]}') { json = ''; }
		container.siblings('.sortable-value').val(json).change();
		
		// NEW for Kona - take the original produdct gallery images if empty
		if (container.siblings('.sortable-value').attr('name') === '_sr_prodgallery') {
			jQuery("#woocommerce-product-images.postbox #product_image_gallery").val(ids);
		}
		// NEW for Kona - take the original produdct gallery images if empty
	}
	
	
	/* Delete sortable item */
	jQuery('body').on('click',".sortable-container .delete-sortable",function() {
		var container = jQuery(this).parent("li").parent(".sortable-container");
		jQuery(this).parent("li").remove();
		updateSortableContainer(container);
		return false;
	});
	
	/* Update when field is changed */
	//jQuery('.sortable-media-options').on('change',function() {
	jQuery('body').on('change',".sortable-media-options",function() {
		var container = jQuery(this);
		updateSortableContainer(container);
		return false;
	});
	
	
	
	
	/*
	*	Blog Post types (hide / show)
	*/
	/* Gutenberg (Wordpress 5.0 has no gutenberg class but block-editor) */
	if( jQuery(".gutenberg").length > 0 || jQuery(".block-editor").length > 0) {
		jQuery(document).on('change', '.editor-post-format select', function() {
		  	var format = jQuery(this).val();
			jQuery('#meta_imageposttype').hide();
			jQuery('#meta_galleryposttype').hide();
			jQuery('#meta_videoposttype').hide();
			jQuery('#meta_audioposttype').hide();
			jQuery('#meta_quoteposttype').hide();
			if (format === 'image') { jQuery('#meta_imageposttype').show(); }
			if (format === 'gallery') { jQuery('#meta_galleryposttype').show(); }
			if (format === 'video') { jQuery('#meta_videoposttype').show(); }
			if (format === 'audio') { jQuery('#meta_audioposttype').show(); }
			if (format === 'quote') { jQuery('#meta_quoteposttype').show(); }
		});
		
		var intervalPbButtons = setInterval(function () {
			if (jQuery(".gutenberg #editor").length > 0 || jQuery(".block-editor #editor").length > 0) {
				jQuery(document).find('.editor-post-format select').change();
				clearInterval(intervalPbButtons);
			} 
		}, 50);
	} 
	
	
  	jQuery("#formatdiv input").on("click", function() {  
        var format = jQuery(this).val();
		jQuery('#meta_imageposttype').hide();
		jQuery('#meta_galleryposttype').hide();
		jQuery('#meta_videoposttype').hide();
		jQuery('#meta_audioposttype').hide();
		jQuery('#meta_quoteposttype').hide();
		if (format === 'image') { jQuery('#meta_imageposttype').show(); }
		if (format === 'gallery') { jQuery('#meta_galleryposttype').show(); }
		if (format === 'video') { jQuery('#meta_videoposttype').show(); }
		if (format === 'audio') { jQuery('#meta_audioposttype').show(); }
		if (format === 'quote') { jQuery('#meta_quoteposttype').show(); }
		
		if (format === 'quote') { 
				jQuery('select#_sr_showpagetitle').val("0").change(); 
				jQuery('.option.hiding_sr_showpagetitle').addClass("disable"); 
			} 
			else { 
				jQuery('.option.hiding_sr_showpagetitle').removeClass("disable"); 
			}
    });
	
	/* Hide From pageload */
	jQuery('#meta_imageposttype').hide();
	jQuery('#meta_galleryposttype').hide();
	jQuery('#meta_videoposttype').hide();
	jQuery('#meta_audioposttype').hide();
	jQuery('#meta_quoteposttype').hide();
	
	jQuery("#formatdiv input").each(function () { 
		var format = jQuery(this).val();
		var checked = jQuery(this).attr('checked');
		if (checked === 'checked') {
			if (format === 'image') { jQuery('#meta_imageposttype').show(); }
			if (format === 'gallery') { jQuery('#meta_galleryposttype').show(); }
			if (format === 'video') { jQuery('#meta_videoposttype').show(); }
			if (format === 'audio') { jQuery('#meta_audioposttype').show(); }
			if (format === 'quote') { jQuery('#meta_quoteposttype').show(); }
			
			if (format === 'quote') { 
				jQuery('select#_sr_showpagetitle').val("0").change(); 
				jQuery('.option.hiding_sr_showpagetitle').addClass("disable"); 
			} 
			else { 
				jQuery('.option.hiding_sr_showpagetitle').removeClass("disable"); 
			}
		}
	});
	
	
	/* Hide / Show Portfolio settings depending the template */
	jQuery('#meta_portfoliosettings').hide();
	
	jQuery("select#page_template option").each(function () { 
		var val = jQuery(this).val();
		var checked = jQuery(this).attr('selected');
		if (checked === 'selected' && val === 'template-portfolio.php') { jQuery('#meta_portfoliosettings').show(); }
	});
	
	jQuery('select#page_template').on('change',function() {
		var val = jQuery(this).val();
		if (val === 'template-portfolio.php') { jQuery('#meta_portfoliosettings').show(); } else { jQuery('#meta_portfoliosettings').hide(); }
	});
	
	
	
	
	
	/*
	*	Font Manager
	*/
	jQuery(".fontmanager").on("click", ".add-font", function() {  
		var count = jQuery('.customfontcontainer .font:not(.hidden)').length + 1;
	   	var theEl = jQuery('.customfontcontainer .font.hidden').clone().removeClass('hidden').attr('data-id',count).insertAfter('.customfontcontainer .font:last-child');
	   	theEl.find(".radios input[name=type]").attr('name','type-'+count);
	   	return false;
    });
	
	jQuery(".fontmanager").on("click", ".delete-font", function() {  
	   jQuery(this).closest(".font").remove();
	   updateFontManager();
	   return false;
    });
	
	jQuery(".fontmanager").on("click", ".save-font", function() {  
	   jQuery(this).closest(".font").removeClass("edit");
	   jQuery(this).closest(".font").find("input").attr("readonly", true);
	   updateFontManager();
	   return false;
    });
	
	jQuery(".fontmanager").on("click", ".edit-font", function() {  
	   jQuery(this).closest(".font").addClass("edit");
	   jQuery(this).closest(".font").find("input").attr("readonly", false);
	   return false;
    });
	
	function updateFontManager() {
		var fJson = '{"fonts":[';
		jQuery(".fontmanager .customfontcontainer .font:not(.hidden)").each(function(index) {
			var id = jQuery(this).attr('data-id');
			var font = jQuery(this).find(".input-font").val();
			var styles = jQuery(this).find(".input-styles").val();
			var type = jQuery(this).find('input[name=type-'+id+']:checked').val();
			if (index > 0) { fJson += ','; }
			fJson += '{"name":'+JSON.stringify(font)+',"styles":'+JSON.stringify(styles)+',"type":'+JSON.stringify(type)+'}';
		});
		fJson += ']}';
		jQuery(".fontmanager").find("textarea#_sr_fontmanager").val(fJson);
	}
	
	
	
	
	/* Woo if variation is opend it enables the sortable */
	jQuery("body").on("click", ".woocommerce_variations .handlediv", function() { 
		var parent = jQuery(this).parents(".woocommerce_variation");
		parent.find( ".sortable-list .sortable-container" ).sortable({
			revert: true,
			cancel: ".disable-sortable",
			placeholder: "sortable-placeholder",
			handle: '> .image-preview',
			start: function(e,ui){
				ui.placeholder.height(ui.item.height());
			},
			stop: function(e,ui) {  
				updateSortableContainer(ui.item.parent("ul.sortable-container"));
			}
		});
	});
	
	
	/* Woo if a custom prodgallery is added */
	if (jQuery("#meta_prodgallery.postbox").length) {
		jQuery("#woocommerce-product-images.postbox").hide();
	}
	
});