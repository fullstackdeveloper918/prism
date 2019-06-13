/*-----------------------------------------------------------------------------------

 	Script - All Custom frontend jQuery scripts & functions
 
-----------------------------------------------------------------------------------*/
(function(){
'use strict';

jQuery(window).load(function() {
		
	/*---------------------------------------------- 
	
			Q U A N T I T Y   B U T T O N S 
			
	------------------------------------------------*/
    jQuery( "body" ).on( 'click', '.quantity .plus, .quantity .minus', function() {c

        // Get values
        var $qty        = jQuery( this ).closest( '.quantity' ).find( '.qty' ),
            currentVal  = parseFloat( $qty.val() ),
            max         = parseFloat( $qty.attr( 'max' ) ),
            min         = parseFloat( $qty.attr( 'min' ) ),
            step        = $qty.attr( 'step' );

        // Format values
        if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
        if ( max === '' || max === 'NaN' ) max = '';
        if ( min === '' || min === 'NaN' ) min = 0;
        if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

        // Change the value
        if ( jQuery( this ).is( '.plus' ) ) {

            if ( max && ( max == currentVal || currentVal > max ) ) {
                $qty.val( max );
            } else {
                $qty.val( currentVal + parseFloat( step ) );
            }

        } else {

            if ( min && ( min == currentVal || currentVal < min ) ) {
                $qty.val( min );
            } else if ( currentVal > 0 ) {
                $qty.val( currentVal - parseFloat( step ) );
            }

        }

        // Trigger change event
        $qty.trigger( 'change' );
    });
	
			
	
	/*---------------------------------------------- 
	
		 A J A X   A D D   T O   C A R T
			
	------------------------------------------------*/	
	
	// Custom add to cart button (trigger default submit button)
	jQuery('body').on("click", ".pseudo-add-to-cart", function() { 
		var el = jQuery(this);
		var checkAjax = 0;
		if (el.hasClass("ajax_add_to_cart")) { 
			
			checkAjax = setInterval(function () {
			  if (el.hasClass("added")) {
				  getNewCartData("add_cart");
				  clearInterval(checkAjax);
			  }
			}, 500);
			
		} else if (el.parents(".product-media").siblings("form.cart").length) { 
			// new for button on archive when variations show
			el.parents(".product-media").siblings("form.cart").find('button[type=submit]').trigger("click");
			return false;
		} else if (el.hasClass("product_type_variable")) { // for 'select options' on grid
			return true;
		} else if (el.parents("form.cart").length) {
			//  new for only submit the parent form if there are multiple forms (1.5)
			el.parents("form.cart").find('button[type=submit]').trigger("click");
			//jQuery('form.cart button[type=submit]').trigger("click");
			return false;
		}
	});
	
	
	// Call change cart if add to cart form is submited
	jQuery(document).on('submit','form.cart',function(e){
		e.preventDefault();
		var form = jQuery(this);
		var productData = form.serializeArray();
		
		
		// needed for simple product (no variation)
		if (form.find('button[type=submit]').length) {
		productData.push({name: form.find('button[type=submit]').attr("name"), value: form.find('button[type=submit]').val()});
		}
		
		productData.push({name: 'action', value: 'sr_add_to_cart'});
		jQuery("body").addClass("updating-woocart");
		
		var button = form.find(".pseudo-add-to-cart");
		button.removeClass("added").addClass("loading");
		
		// 2nd button (new since variation on archive)
		var button2 = form.siblings(".product-media").find(".pseudo-add-to-cart");
		button2.removeClass("added").addClass("loading");
		
		// 3rd button (new since fixed product add)
		var button3 = jQuery("#fixed-product-add .pseudo-add-to-cart");
		button3.removeClass("added").addClass("loading");
		
		change_cart(productData,'add_cart'); //Ajax add/change cart
	});
	
	
	
	// Change cart via ajax
	function change_cart(data,action){
		var url = srvars.ajaxurl;
		jQuery.ajax({
			type:'POST',			// this might lead to issues for html template
			url:url,
			data: data,
			dataType:"html",
			error: function () {
				console.log("no");
			},
			success: function(response) { 
				getNewCartData(action);
				
				// update checkout page order review on mini cart change
				jQuery( document.body ).trigger( 'update_checkout' );
			}
		});
	}
	
	// add new cart content
	function getNewCartData(action) {
		jQuery(".cart-open").removeClass('updated');
		var url = srvars.ajaxurl;
		var addData = { action:'sr_woo_minicart' };
		if(srvars.wpml){ addData.wpml = srvars.wpml; }
		jQuery.ajax({
				type:'POST',			// this might lead to issues for html template
				url:url,
				data: addData,
				dataType:"html",
				error: function () {
				},
				success: function(response) { 
					if (response) {
						
						// adapt calsses for ajax 
						var button = jQuery(".pseudo-add-to-cart");
						button.removeClass("loading").addClass("added");
												
						// update item count
						var itemCount = jQuery(response).find('.cart-list').data('items');
						if(!itemCount) { itemCount = 0; }
						jQuery(".minicart-count").html(itemCount);
						jQuery(".cart-open").addClass('updated');
						
						// update cart content
						if (jQuery(".menu-cart-content .empty-cart").length || itemCount === 0) {
							jQuery(".menu-cart-content").replaceWith(jQuery(response));
							jQuery("#mini-cart").removeClass("show-cart-link");
						} else {
							jQuery(".menu-cart-content .cart-list").replaceWith(jQuery(response).find(".cart-list"));
							//jQuery(".menu-cart-content .cart-bottom .total .amount").replaceWith(jQuery(response).find(".cart-bottom .total .amount"));
							jQuery(".menu-cart-content .cart-bottom").replaceWith(jQuery(response).find(".cart-bottom")); 
						}
						jQuery("body").removeClass("updating-woocart");
						
						if (itemCount === 0) {
							jQuery("#mini-cart").removeClass("show-cart-link");
						} else { 
							jQuery("#mini-cart").addClass("show-cart-link");
						}
						
						// open mini cart
						if (action === 'add_cart' && jQuery('#mini-cart').hasClass("ajax-open") && !jQuery('#quick-view').hasClass('visible')) {
							jQuery('.cart-open').trigger("click");
						}
					} 
				}
		});		
	}
	
	
	/*---------------------------------------------- 
	
		 		  M I N I   C A R T
			
	------------------------------------------------*/
	
	/* open mini cart */
	jQuery('body').on("click", ".cart-open", function() {
		jQuery('body').toggleClass("cart-is-open");
		return false;
	});
	
	jQuery(document).on("click", ".cart-close, .cart-is-open .pseudo-close", function() {
		jQuery('body').toggleClass("cart-is-open");
		return false;
	});
	
	/* trigger 'update cart' if qty has been changed on the cart form */
	jQuery('body').on( 'change', 'form.woocommerce-cart-form input.qty', function() {
		jQuery( '.woocommerce-cart-form :input[name="update_cart"]' ).prop( 'disabled', false );
		jQuery(this).parents('form').find('input[type=submit]').trigger("click");
	});
	
	// Call change cart if mini cart form is submited
	jQuery(document).on('submit','#mini-cart form.woocommerce-cart-form',function(e){
		e.preventDefault();
		var form = jQuery(this);
		var productData = form.serializeArray();
		productData.push({name: form.find('input[type=submit]').attr("name"), value: form.find('input[type=submit]').val()});
		productData.push({name: 'action', value: 'sr_add_to_cart'});
		jQuery("body").addClass("updating-woocart");
		change_cart(productData,'update_cart'); //Ajax add/change cart
	});
	
	/* remove item from cart */
	jQuery('body').on("click", ".remove", function() {
		var button = jQuery(this);
		jQuery(button).parents("tr").find('.quantity').find('input').val(0).change();
		
		// workaround for products marked as 'sold individually'
		if (jQuery(button).parents("tr").find('.quantity').length < 1) {
			jQuery(button).parents("tr").find('.product-quantity').find('input').val(0).change();
			jQuery(this).parents('form').find('input[type=submit]').trigger("click");
		}
		return false;
	});
	
	
	
	
	/*---------------------------------------------- 
	
		 	 C H A N G E   V A R I A T I O N
			
	------------------------------------------------*/
	
	/* workaround for swtaches to change for load more on normal page */
	jQuery('body').on( 'click', '.shop-container .variations .variation ul li', function() {
		var value = jQuery(this).data("value");
		var select = jQuery(this).parents(".value").find("select").val(value).change();
		jQuery(this).siblings("li").removeClass("selected");
		jQuery(this).addClass("selected");
	});
	
	jQuery('body').on( 'change', '.variations .variation select', function() {
		var item = null;
		if (jQuery(this).parents(".shop-container").length) { item = jQuery(this).parents(".shop-item"); }
		onChangeVariation(null,item);
	});
	
	// do on page load
	onChangeVariation("pageload");
	
	
	function onChangeVariation(when,item) {
		
		if (jQuery('.product-hero .variation-gallery').length && !item) {
			var variation = '';
			jQuery('.product-hero .variations .variation select').each(function() {
				variation += jQuery(this).val();
				variation += ' ';
				
				if (jQuery('#fixed-product-add').length) { 
					var attribute = jQuery(this).data("attribute_name");
					jQuery('#fixed-product-add .variation ul[data-attribute_name="'+attribute+'"] li[data-value="'+jQuery(this).val()+'"]').addClass("selected").siblings().removeClass("selected");
				}
			});
			variation = variation.substring(0, variation.length - 1);
			//variation += ',';
			// commas needed for multiple variation ()
						
			var gallery = '';
			jQuery('.product-hero .variation-gallery').each(function() {
				var gal = jQuery(this).data("variation");
				//alert(gal+" == "+variation)
				if (variation.indexOf(gal) > -1) {
				  gallery = jQuery(this);
				}
			});
			if (when === "pageload" && !gallery) { 
				if (jQuery('.variation-gallery.main.first-shown').length) { gallery = jQuery('.variation-gallery.main');  }
				else { gallery = jQuery('div .variation-gallery:first-child'); }
			}
		
			if (gallery) {
				jQuery('.variation-gallery').removeClass("active");
				gallery.addClass("active");
				jQuery('.variation-thumbs').removeClass("active");
				gallery.next(".variation-thumbs").addClass("active");
				
				// height to tranform col-content height if one gallery is taller than the other
				if (jQuery(window).width() > 768 && jQuery('.product-hero.product-layout-classic').length) {
					var galHeight = gallery.height();
					var colHeight = gallery.parent(".col-content").height();
					if (galHeight !== colHeight) {
						gallery.parent(".col-content").css('height',galHeight+'px');
					}
				}
				
				jQuery('#fixed-product-add .thumbnail img').attr('src',gallery.data("thumb"));
			} else if (jQuery('.variation-gallery.main').length) {
				jQuery('.variation-gallery').removeClass("active");
				jQuery('.variation-gallery.main').addClass("active");
				jQuery('.variation-thumbs').removeClass("active");
				jQuery('.variation-thumbs.main').addClass("active");
				
				// height to tranform col-content height if one gallery is taller than the other
				if (jQuery(window).width() > 768 && jQuery('.product-hero.product-layout-classic').length) {
					var galHeight = jQuery('.variation-gallery').height();
					var colHeight = jQuery('.variation-gallery').parent(".col-content").height();
					if (galHeight !== colHeight) {
						jQuery('.variation-gallery').parent(".col-content").css('height',galHeight+'px');
					}
				}
				
				jQuery('#fixed-product-add .thumbnail img').attr('src',jQuery('.variation-gallery.main').data("thumb"));
			}
			
		}
		
		if (jQuery('.product-hero .woocommerce-variation-price').length) {
			jQuery('.product-hero .price').html(jQuery('.product-hero .woocommerce-variation-price .price').html());
			jQuery('#fixed-product-add .price').html(jQuery('.product-hero .woocommerce-variation-price .price').html());
			// double set because of plugin issue (woocommerce germanized)
			setTimeout(function(){ 
				jQuery('.product-hero .price').html(jQuery('.product-hero .woocommerce-variation-price .price').html());
				jQuery('#fixed-product-add .price').html(jQuery('.product-hero .woocommerce-variation-price .price').html());
			}, 500);
		}
		
		// if variation change on grid (since 1.5 for variation on grid )
		if (item) {
			if (item.find('.variation-image').length) {
				
				var variationItem = '';
				item.find('.variations .variation select').each(function(i) {
					if (i !== 0) { variationItem += ' '; }
					variationItem += jQuery(this).val();
				});
				//alert(variationItem);
				
				var imageItem = '';
				item.find('.variation-image').each(function() {
					var gal = jQuery(this).data("variation");
					if (variationItem.indexOf(gal) > -1) {
					  imageItem = jQuery(this);
					}
				});
				//if (!imageItem) { imageItem = item.find('.thumb-hover > img'); }
				
				if (imageItem) {
					imageItem.appendTo(item.find('.thumb-hover'));
					setTimeout(function(){ 
						item.find('.variation-image').removeClass("active");
						imageItem.addClass("active"); 
					}, 50);
				} else {
					item.find('.variation-image').removeClass("active");
				}
				
			}
			
			if (item.find('.woocommerce-variation-price').length && item.find('.woocommerce-variation-price').html()) {
				item.find('.product-meta .price').html(item.find('.woocommerce-variation-price .price').html());
			}
		}
		if (when === "pageload") {
			setTimeout(function(){ 
				jQuery('.shop-container > .product .variation').each(function() {
					var val = jQuery(this).find('li.selected').data("value");
					if (val) {
						jQuery(this).find("select").val(val).change();
					}
				});
			}, 500);
		}
		
	}
		
	
	
	/*---------------------------------------------- 
	
			  Workaround for variation swatches on ajax reload
			
	------------------------------------------------*/
	jQuery('body').on("click", ".wcapf-before-products .variations .variable-item, #search-shop-grid .variations .variable-item, #quick-view .variations .variable-item", function() { 
		var el = jQuery(this);
		var value = el.data("value");
		var parentUl = el.parent("ul");
		
		parentUl.siblings("select").val(value).change();
		el.addClass("selected").siblings().removeClass("selected");
	});
	
	
	
	
	
	/*---------------------------------------------- 
	
		  L O G I N   A N D   R E G I S T E R
			
	------------------------------------------------*/
	jQuery('body').on("click", ".goto-register", function() {
		jQuery('.login-register').addClass("register-is-visible");
		return false;
	});
	
	jQuery('body').on("click", ".goto-login", function() {
		jQuery('.login-register').removeClass("register-is-visible");
		return false;
	});
	
	
	
	/*---------------------------------------------- 
	
		    	H E A D E R   S E A R C H
			
	------------------------------------------------*/
	jQuery('body').on("click", ".search-open", function() {
		jQuery('body').addClass("search-is-open");
		setTimeout(function(){ jQuery('#header-search form input[type=search]').focus(); }, 500);
		return false;
	});
	
	jQuery('body').on("click", ".search-close", function() {
		jQuery('body').removeClass("search-is-open");
		setTimeout(function(){ 
			jQuery('#header-search').removeClass("is-searching");
			jQuery('#header-search').removeClass("no-results");
			jQuery('#header-search').removeClass("is-searched");
			jQuery('#search-shop-grid').css("height","inherit").html("");
			jQuery('#header-search form input[type=search]').val("");
			jQuery('#header-search').find('.load-isotope').remove();
		}, 700);
		return false;
	});
	
	
	
	/* AJAX SEARCH */	
	jQuery(document).on('submit','#header-search form.woocommerce-product-search',function(e){
		e.preventDefault();
		
		jQuery('#header-search').addClass("is-searching");
		jQuery('#header-search').removeClass("is-searched");
		jQuery('#header-search').removeClass("no-results");
		jQuery('#header-search').find('.load-isotope').remove();
		
		var form = jQuery(this);
		var searchData = form.serializeArray();
		searchData.push({name: 'action', value: 'sr_ajax_search'});
		var url = srvars.ajaxurl;
					
			jQuery.ajax({
				type:'POST',			// this might lead to issues for html template
				url: url,
				data: searchData,
				dataType:"html",
				error: function () {
					console.log("error");
				},
				success: function(response) { 
					if (response) {
						console.log(response);
						var grid = jQuery( jQuery(response).find('.shop-container'));
						jQuery('#search-shop-grid').replaceWith(grid);
						jQuery('#search-shop-grid').imagesLoaded( function(){
							jQuery('#search-shop-grid').isotope({
								layoutMode: "fitRows",
								itemSelector : '.isotope-item'
							});	
							jQuery('#header-search').addClass("is-searched");
							if (jQuery(response).find('.load-isotope').length) {
								jQuery(response).find('.load-isotope').insertAfter( "#search-shop-grid" );
							}
							
							if(jQuery().unveil && jQuery("#search-shop-grid img.lazy").length > 0) { 
								jQuery("#search-shop-grid img.lazy").unveil(50);
							}
						});
					} else { 
						jQuery('#header-search').addClass("no-results");
					}
				}
			});
					
	});
	
	
	
	
	/*---------------------------------------------- 
	
		    	F I L T E R   O P E N
			
	------------------------------------------------*/
	jQuery('body').on("click", ".filter-open", function() { 
		var el = jQuery(this);
		el.toggleClass("is-open");
		jQuery(".filter-container").slideToggle(300);
		jQuery(".filter-container").toggleClass("slide-in");
		return false;
	});
	
	
	jQuery('.filter-option .woocommerce-ordering').on('submit', function(event) {
		event.preventDefault();
		var val = jQuery(this).find("select.orderby").val();
		jQuery(".grid-options").find("select.orderby").val(val).change();
	});
	
	

	
	/*---------------------------------------------- 
	
			  S H O P   T H E   L O O K
			
	------------------------------------------------*/
	if (jQuery('.shopthelook').length) {
		jQuery('#hero-and-body').append('<div id="lookbook-modal"><div class="lookbook-inner"></div></div>');
	}
	
    jQuery( "body" ).on( 'click', '.shoplook-open', function() {
		var position = jQuery(this).siblings('.shopthelook').offset();
		if (position.left < 5) { jQuery(this).siblings('.shopthelook').css({'transform':'translateX('+Math.abs(position.left - 15)+'px)'});  }
		jQuery(this).parents('.sr-lookbook-item').addClass('is-active');
		return false;
	});
	
	jQuery( "body" ).on( 'click', '.lookbook-close', function() {
		jQuery(this).parents('.shopthelook').css({'transform':'inherit'});
		jQuery(this).parents('.sr-lookbook-item').removeClass('is-active');
		return false;
	});
	
	
	
	/*---------------------------------------------- 
	
			  F I X E D   P R O D U C T   A D D
			
	------------------------------------------------*/
	if (jQuery('#fixed-product-add').length) {
		/* add the elements to the fixed bar */
		var variations = jQuery('.product-hero form.cart .variations').clone();
		var addToCart = jQuery('.product-hero form.cart .product-add-to-cart').clone();
		var price = jQuery('.product-hero .product-info .price').clone();
  		jQuery('#fixed-product-add .fixed-product-add-inner').append(price).append(variations).append(addToCart);
	}
	
	/* click for variation */
	jQuery('body').on("click", "#fixed-product-add .variations .variable-item", function() { 
		var el = jQuery(this);
		var value = el.data("value");
		var attribute = el.parent("ul").data("attribute_name");
		
		jQuery('.product-hero .variation ul[data-attribute_name="'+attribute+'"] li[data-value="'+value+'"]').trigger("click");
		
		var price = jQuery('.product-hero .product-info .price').html();
  		jQuery('#fixed-product-add .price').html(price);
	});
	
	/* if quantity is changed */
	jQuery("body").on( 'change', '#fixed-product-add .quantity input', function() {
		var value = jQuery(this).val();
		jQuery('.product-hero .product-add-to-cart .quantity input').val(value);
	});
	
	jQuery('body').on("click", "#fixed-product-add .pseudo-add-to-cart", function() { 
		var el = jQuery(this);
		if (el.parents('#fixed-product-add').length) { 
			jQuery(".product-hero form.cart").find('button[type=submit]').trigger("click");
		} 
		return false;
	});
	
	
	
	/*---------------------------------------------- 
	
		 		 Q U I C K   V I E W
			
	------------------------------------------------*/
	
	
	jQuery(document).on("click", ".quick-view-close, #quick-view .pseudo-close", function() {
		jQuery('#quick-view').removeClass("visible");
		return false;
	});
	
	jQuery(document).on("click", ".open-quick-view", function() {
		
		var thisAnchor = jQuery(this);
		thisAnchor.addClass("loading");
		
		var url = srvars.ajaxurl;
		var product = jQuery(this).data("productid");
		jQuery.ajax({
			type:'POST',			// this might lead to issues for html template
			url: url,
			data: {action:'sr_ajax_quickview',prodId:product},
			dataType:"html",
			error: function () {
				console.log("error");
			},
			success: function(response) { 
				if (response) {
					//console.log(response);
					setTimeout(function(){ thisAnchor.removeClass("loading"); }, 500);
					
					jQuery('#quick-view').addClass("visible");
					
					var prodContent = jQuery( jQuery(response).find('.column-section'));
					jQuery('#quick-view .product-hero').html(prodContent);
					
					
					if(jQuery().unveil && jQuery("#quick-view img.lazy").length > 0) { 
						jQuery("#quick-view img.lazy").unveil(50);
					}
					setTimeout(function(){ 
						//console.log(jQuery('#quick-view .flickity-carousel').length);
						jQuery('#quick-view .flickity-carousel').flickity({
						  // options
							selectedAttraction: 0.04,
							friction: 0.4,
							lazyLoad: 1,
							pageDots: false,
							arrowShape: 'M0,50.8c0,1.5,0.8,3.1,1.5,3.8l0,0l29,28.2c2.3,2.3,5.3,2.3,7.6,0c2.3-2.3,2.3-5.3,0-7.6L18.3,55.3h76.3 c3.1,0,5.3-2.3,5.3-5.3s-2.3-5.3-5.3-5.3H18.3l19.1-19.8c2.3-2.3,2.3-5.3,0-7.6s-5.3-2.3-7.6,0l-28.2,29l0,0 c-0.8,0.8-0.8,1.5-1.5,1.5l0,0C0,49.2,0,50,0,50.8z',
							adaptiveHeight: true
						});
						onChangeVariation("pageload");
						if(jQuery().lightcase) {
							jQuery('#quick-view a[data-rel^=lightcase]').lightcase({ 
								showSequenceInfo: false, 
								swipe: true, 
								showCaption: true,
								overlayOpacity:1,
								maxWidth: 1300,
								maxHeight: 1100,
								shrinkFactor: 1,
								liveResize: true,
								fullScreenModeForMobile: true,
								video: {
									width : 800,
									height : 450
									},
								iframe:{
									width : 800,
									height : 450,
									allowfullscreen: 1
									}
							});	
						}
					},600);

				}
			}
		});
		
		
		
		return false;
	});
	
});
	

})(jQuery);
