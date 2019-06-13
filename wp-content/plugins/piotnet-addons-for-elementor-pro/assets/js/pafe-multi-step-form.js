jQuery(document).ready(function( $ ) {
	$(document).on('click','[data-pafe-form-builder-nav="next"]',function(){
		var formID = $(this).data('pafe-form-builder-nav-form-id'),
			$wrapper = $(this).closest('.pafe-multi-step-form__content-item'),
    		$fields = $wrapper.find('[data-pafe-form-builder-form-id='+ formID +']'),
    		error = 0;

		$fields.each(function(){
			if ( $(this).data('pafe-form-builder-stripe') == undefined ) {
				if ( !$(this)[0].checkValidity() && $(this).closest('.elementor-widget').css('display') != 'none' ) {
					if ($(this).data('pafe-form-builder-image-select') == undefined) {
						$(this)[0].reportValidity();
					}
					error++;
				}
			}
		});

		if (error == 0) {
			$wrapper.removeClass('active');
			$wrapper.next().addClass('active');
			var index = $wrapper.next().index(),
				$progressbarItem = $(this).closest('.pafe-multi-step-form').find('.pafe-multi-step-form__progressbar-item');
			$progressbarItem.eq(index).addClass('active');
		}
	});

	$(document).on('click','[data-pafe-form-builder-nav="prev"]',function(){
		var formID = $(this).data('pafe-form-builder-nav-form-id'),
			$wrapper = $(this).closest('.pafe-multi-step-form__content-item');

		$wrapper.removeClass('active');
		$wrapper.prev().addClass('active');
		var index = $wrapper.index(),
			$progressbarItem = $(this).closest('.pafe-multi-step-form').find('.pafe-multi-step-form__progressbar-item');
		$progressbarItem.eq(index).removeClass('active');
	});
});