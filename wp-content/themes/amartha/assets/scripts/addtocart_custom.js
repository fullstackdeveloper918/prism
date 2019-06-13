jQuery(document).ready( function(){
	jQuery(".cart_shop").on("click", function(){	
		$(this).css({'pointer-events': 'none','cursor': 'default'});		
		jQuery(this).after('<div class="bc-ajax-add-to-cart__message-wrapper" data-js="bc-ajax-add-to-cart-message"><p class="bc-ajax-add-to-cart__message bc-alert bc-alert--success">Product successfully added to your cart.</p></div>');
	});
	
});