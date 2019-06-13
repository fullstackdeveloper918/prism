// Frontend

jQuery(document).ready(function( $ ) {
	$(window).on('load', function() {
		$('[data-pafe-close-first-accordion]').each(function(){
			$(this).find( '.elementor-tab-title' ).removeClass( 'elementor-active' );
			$(this).find( '.elementor-tab-content' ).css( 'display', 'none' );
		});
	});
});