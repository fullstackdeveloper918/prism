jQuery(document).ready(function( $ ) {
	$('.elementor-image-carousel').each(function(){
		var image = $(this).find('.slick-slide-inner a'),
			linkImage = image.attr('href');
		if(linkImage != undefined) {
			if(linkImage.indexOf(',') >= 0) {
				linkImages = linkImage.split(',');
				for (var i = 0; i <= linkImages.length; i++) {		
					if(linkImages[i] != undefined) {
						var link = linkImages[i].trim();
						$(this).find('.slick-slide-inner a[data-elementor-lightbox-index="'+ i +'"]').attr('href',link);
					}
				}
			}
		}	
	});
});