/*-----------------------------------------------------------------------------------

 	Script - All Custom frontend jQuery scripts & functions
 
-----------------------------------------------------------------------------------*/
(function(){
'use strict';

/* do animations if element is visible
------------------------------------------------*/
function animateOnScroll() {
	
	/* animations  */
	if (jQuery("[class*='do-anim']").length > 0) {
		jQuery("[class*='do-anim']").not('.animated')
		.filter(function(i, d) {
			return  jQuery(d).visible(true, false, false, 100);  // 100 is offset
		}).each(function(i) {
			var thisItem = jQuery(this);
			var delayMulti = 60;
			var delay = i*delayMulti + 100;  // + 150 is to add a small delay
			thisItem.delay(delay).queue(function(){thisItem.addClass('animated');});
		});
	}
	
	/* infinite Load for isotope */
	if( jQuery().isotope ) { 
		jQuery(".load-isotope:not(.loading):not(.disabled) > a[data-method='infiniteload']")
		.filter(function(i, d) {
			return  jQuery(d).visible();
		}).each(function() {
			jQuery(this).trigger( "click" );
		});
	}
						
}


/* header Features ()
------------------------------------------------*/
var headerHeight = jQuery("#header").outerHeight();
function headerFeatures() {
	var currY = jQuery(window).scrollTop();
	var selector = "#hero";
	
	/* sticky transform */
	if (currY > 100) {
		jQuery('body').addClass('scrolled');
	} else {
		jQuery('body').removeClass('scrolled');
	}
	
	if (currY > jQuery(window).height()) {
		jQuery('body').addClass('scrolled-wheight');
	} else {
		jQuery('body').removeClass('scrolled-wheight');
	}
	
	if (jQuery('#fixed-product-add').length && currY > jQuery(".product-hero").height()) {
		jQuery('body').addClass('scrolled-prodhero');
	} else {
		jQuery('body').removeClass('scrolled-prodhero');
	}
	
    /* Pause video on scroll */
    var triggerPoint = jQuery("#hero").height() - 80;
    if (!jQuery("#hero").hasClass("hero-fullscreen")) { triggerPoint = jQuery("#hero").height() + headerHeight - 80; }
	if (jQuery("#hero").hasClass("videobg-section") && jQuery(selector).find(".playpause-video:not(.play)").length && currY > triggerPoint) { 
		// trigger playpause
        jQuery(selector).find(".playpause-video:not(.play)").trigger("click");
	}
	
}


/* misc features which need to be regenerated on resize
------------------------------------------------*/
function resizeAdapt() {
	
	/* - Hero / Pagetitle (if pagetitle is taller than hero) - */
	if (jQuery(".hero-full #page-title").length > 0 || jQuery(".hero-fullscreen #page-title").length > 0) {
		var hero = jQuery("#hero");
		var pageTitle = jQuery("#hero #page-title");
		var pageTitleHeight = pageTitle.outerHeight();
		if (pageTitleHeight > hero.outerHeight()) {
			hero.css('height',(pageTitleHeight-2)+'px'); // -2 is for prevend jumping
		} else  {
			hero.css('height','auto');
		}
	}
	
	/* - Columns Align - */
	jQuery('.column-section.col-align-center, .column-section.col-align-bottom').each(function() { 
		var thisEl = jQuery(this);
		jQuery(thisEl).children(".column").css('minHeight','inherit');
		jQuery(thisEl).children(".column").find(".col-content").css('marginTop', '0');
						
		if ( 	(jQuery(window).width() > 768 && thisEl.parents(".product-hero").length < 1)  ||
		   		(jQuery(window).width() > 768 && thisEl.parents(".product-hero").length > 0)
		   ) {
			var maxHeight = 0;
			var tallestEl = '';
			jQuery(thisEl).children(".column").each(function() {
				var theHeight = jQuery(this).outerHeight();
				var theBorder = parseInt(jQuery(this).css('border-top-width'), 10) + parseInt(jQuery(this).css('border-bottom-width'), 10);
				if (theHeight + theBorder > maxHeight) { maxHeight = theHeight + theBorder+1; tallestEl = jQuery(this); }
				// +1 is hack for bordered sticky
			});
			if (maxHeight) {
				jQuery(thisEl).children(".column").css('minHeight',maxHeight+'px');
				jQuery(tallestEl).addClass("tallest");	
			}
			
			// apply vertical-center
			jQuery(thisEl).children(".column:not(.tallest)").each(function() {
				if (jQuery(this).find(".col-content").length > 0 && !jQuery(this).find(".col-content").is(':empty')) {
					var theContent = jQuery(this).find(".col-content");
					var elHeight = maxHeight - (parseInt(jQuery(this).css('paddingTop'), 10) + parseInt(jQuery(this).css('paddingBottom'), 10));
					var contentHeight = jQuery(theContent).height();
					if (contentHeight < elHeight) { 
						var alignMargin = (elHeight - contentHeight) / 2;
						if (thisEl.hasClass("col-align-bottom")) { alignMargin = elHeight - contentHeight; }
						jQuery(theContent).css('marginTop', alignMargin + 'px');
					}
				} 
			});
			
		} // end if window > 768
	});
	
}

/* isotope load more function
------------------------------------------------*/
function isotopeLoadMore(grid,el,url,datas) {
	
	el.parent(".load-isotope").addClass('loading');
	if (url === '#' || !url) { url = srvars.ajaxurl }
	var addData = ''; if (datas) { addData = { action:'sr_load_more', o:datas }; }
	//console.log(addData);
	jQuery.ajax({
			type:'POST',			// this might lead to issues for html template
			url:url,
			data: addData,
			dataType:"html",
			error: function (response) {
				console.log(response);
				el.parent(".load-isotope").addClass("disabled");	
			},
			success: function(response) { 
				console.log(response);
				if (response) {
					setTimeout(function(){ 
						// var items = jQuery( jQuery(response).find('#'+grid.attr('id')).html());
						// brings issue when multiple load more grids
						var items = jQuery( jQuery(response).find('.shop-container'));
						items.imagesLoaded(function(){
							grid.append( items ).isotope( 'appended', items);
							reorganizeIsotope(true);
							animateOnScroll(false);
							
							el.parent(".load-isotope").removeClass('loading');
							
							// init video bg for appended items
							if(jQuery().phatVideoBg) { grid.find('.videobg-section').phatVideoBg(); }
							
							// reinitialise lightcase for new items loaded (v. 1.1)
							setTimeout(function(){ 
								if(jQuery().lightcase) {
									jQuery('a[data-rel^=lightcase]').lightcase({ 
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
								
								if(jQuery().unveil && grid.find("img.lazy:not(.lazy-loaded)").length > 0) { 
									grid.find("img.lazy:not(.lazy-loaded)").unveil(50);
								}
							}, 500);
							// reinitialise lightcase for new items loaded (v. 1.1)
						});
					},500);
				} else {
					el.parent(".load-isotope").addClass("disabled");	
				}
			}
	});
	
}
	
	
/* reorganize isotope for ratio
------------------------------------------------*/
function reorganizeIsotope() { 
	jQuery('.isotope-grid[data-ratio]').each(function(){
		var $container = jQuery(this);
		var width = $container.find(".isotope-item:not(.double-width)").width();
		var ratio = $container.data('ratio').split(':');
		ratio = ratio[1] / ratio[0];
		if (!ratio) { ratio = 0.8; }
		var spacing = 0; 
		if ($container.hasClass("isotope-spaced") || $container.hasClass("isotope-spaced-big")) { 
			spacing = parseInt($container.find(".isotope-item").css('marginRight'),10); 
		}
		var height = parseInt(width * ratio, 10);
		if ($container.find('.isotope-item img:not(.hover):not(.wp-post-image):not(.rationed)').length) {
			$container.find('.isotope-item img:not(.hover):not(.wp-post-image)').wrap('<div class="ratio-wrapper"></div>');
			$container.find('.isotope-item img:not(.hover):not(.wp-post-image):not(.rationed)').addClass('rationed');
		}
		$container.find('.isotope-item .ratio-wrapper').css({ 'height': height+'px' });
		if (jQuery(window).width() > 1024) { $container.find('.isotope-item.double-height .ratio-wrapper').css({ 'height': height*2+spacing+'px' }); }
		$container.isotope( 'layout' );
		
	});
}


jQuery(window).on("load",function() {	
	
	
	/*---------------------------------------------- 
				S M O O T H   S H O W    (pageloader)
	------------------------------------------------*/
	jQuery("body").addClass("loaded");
	setTimeout(function(){
		setTimeout(function(){ animateOnScroll(true); },500);
		headerFeatures();
	}, 500);
	setTimeout(function(){
		jQuery("body").addClass("loading-end");		
	}, 1000);
	
	
	
	/*---------------------------------------------- 
	    P R E P A R E   C O L U M N   A L I G N
	------------------------------------------------*/
	jQuery('.column-section .column').each(function() {
		if (!jQuery.trim(jQuery(this).html())) {
			jQuery(this).addClass("empty-content");
		} else {
			if (jQuery(this).children('.col-content').length < 1) {  jQuery(this).wrapInner('<div class="col-content"></div>'); }	
		}	
	});
	
	
	
	/*---------------------------------------------- 
			   R E S P O N S I V E   N A V
	------------------------------------------------*/
	jQuery('#header').on("click", ".menu-toggle", function() {
		jQuery('html').toggleClass('disablescroll'); 	
		setTimeout(function(){ jQuery('#header').toggleClass('menu-is-open'); }, 50); // timeout because burger animation glitch in comb with disablescroll
		return false;
	});
	
	jQuery('#main-nav').on("click", "li > a", function() {
		var thisItem = jQuery(this); 
		var thisParent = jQuery(this).parent('li'); 
		if (thisItem.siblings('ul').length > 0 && thisItem.siblings('ul').css('display') === 'none') {
			thisItem.siblings('ul').slideDown(500, "easeInOutCubic");
			thisParent.siblings('li').children('ul').slideUp(500, "easeInOutCubic");
			return false;	
		}
	});
	
	if ((jQuery(window).width() > 1199 && !jQuery("header").hasClass("break-1024")) ||
	   	(jQuery(window).width() > 1023 && jQuery("header").hasClass("break-1024")) ) {
		jQuery('#main-nav > ul > li[class*="megamenu"]').on("mouseenter", function() {
			jQuery("#header").addClass("mega-hover");
		}).on('mouseleave',  function(){
			jQuery("#header").removeClass("mega-hover");
		});
	}
		
	
	/*---------------------------------------------- 
			S U B   M E N U   P O S I T I O N
	------------------------------------------------*/
	if (jQuery(window).width() > 768) {
		jQuery('nav#main-nav > ul > li.menu-item-has-children').each(function() {
			if (jQuery(this).children('ul.sub-menu').length > 0) {
				var elRight = parseInt( (jQuery(window).width() - (jQuery(this).children('ul.sub-menu').offset().left + jQuery(this).children('ul.sub-menu').outerWidth())), 10);
				
				if (elRight < 100) { 
					jQuery(this).children('ul.sub-menu').addClass('right-align'); 
				}
				
				if 	(
					(jQuery(this).attr('class').indexOf('megamenu') > -1 && elRight < 100) ||
					(jQuery("header").attr('class').indexOf('menu-center') > -1 && jQuery(this).attr('class').indexOf('megamenu') > -1)
					) {
					var subLeft = parseInt(jQuery(this).children('ul.sub-menu').offset().left, 10);
					var centerPos = parseInt((jQuery(window).width() - jQuery(this).children('ul.sub-menu').outerWidth()) / 2,10);
					var subPos = centerPos - subLeft;
					jQuery(this).children('ul.sub-menu').css('left',subPos+'px');
				}
			}
		});
	}
	
	
	
	/*---------------------------------------------- 
			   FORM ReStyling
	------------------------------------------------*/
	jQuery('.form-row input[type=text], .form-row input[type=password], .form-row input[type=email], .form-row input[type=number],.form-row input[type=tel],.form-row input[type=date],.form-row textarea,.form-row select').each(function() {
		if (jQuery(this).attr("id") !== 'rating')  { jQuery(this).parents('.form-row').addClass('deplace'); }
		var label = jQuery(this).parents('.form-row').find('label');
		jQuery(this).insertBefore(label);
		var val = jQuery(this).val();
		if (val) { jQuery(this).parent('.form-row').addClass('has-val'); }
	});
	
	jQuery('body').on( 'change', '.form-row input[type=text], .form-row input[type=password], .form-row input[type=email], .form-row input[type=number],.form-row input[type=tel],.form-row input[type=date],.form-row textarea', function() {
		var val = jQuery(this).val();
		if (val) { jQuery(this).parent('.form-row').addClass('has-val'); } else { jQuery(this).parent('.form-row').removeClass('has-val'); }
	});
	
	
	jQuery( document.body ).on( 'updated_cart_totals', function(){
		jQuery('input#coupon_code').each(function() {
			jQuery(this).parents('.form-row').addClass('deplace');
			var label = jQuery(this).parents('.form-row').find('label');
			jQuery(this).insertBefore(label);
			var val = jQuery(this).val();
			if (val) { jQuery(this).parent('.form-row').addClass('has-val'); }
		});
	});
	
		
	
	/*---------------------------------------------- 
			I S O T O P E  /  M A S O N R Y 
	------------------------------------------------*/
	if( jQuery().isotope ) { 
	
		/* Call Isotope  
		------------------------------------------------*/	
		jQuery('.isotope-grid:not(#search-shop-grid)').each(function(){
			var $container = jQuery(this);
			
			// remove tables (for shop grid if grouped product and variation are on)
			$container.find("table").remove();
			
			var layout = "masonry";
			if ($container.hasClass("fitrows")) { layout = "fitRows"; }
			$container.imagesLoaded( function(){
				$container.isotope({
					layoutMode: layout,
					itemSelector : '.isotope-item',
					masonry: { columnWidth: '.isotope-item:not(.double-width)' }
				});
				setTimeout(function() { $container.isotope( 'layout' ); reorganizeIsotope(); }, 500);	
			});
			
		});
		
		
					
		
		/* Filter isotope
		------------------------------------------------*/
		jQuery('.grid-filter').on("click", "li a", function() { 
			var thisItem = jQuery(this);
			var parentul = thisItem.parents('ul.grid-filter').data('related-grid');
			if (!parentul) {
				alert('Please specify the dala-related-grid');
			} else {
				thisItem.parents('ul.grid-filter').find('li').removeClass('active');
				thisItem.parent('li').addClass('active');
				var selector = thisItem.attr('data-filter');
				jQuery('#'+parentul).isotope({ filter: selector });
				jQuery('#'+parentul+' .isotope-item [class*="do-anim"]').not(selector).removeClass("animated");				
				setTimeout(function() { jQuery('#'+parentul+' .isotope-item'+selector+' [class*="do-anim"]').addClass("animated"); },200);
				
				// adding slug hashtag to url
				var slug = thisItem.data('slug');
				if (slug) { 
					window.location.hash = slug; } 
				else {
					history.pushState("", document.title, window.location.pathname + window.location.search);
				}
			}
			return false;
		});
		
		/* Scroll to portfolio if header filter is clicked
		------------------------------------------------*/
		jQuery('header').on("click", ".open-action.action-filter", function() {
			var relGrid = jQuery('#header .action-overlay.filter-overlay ul.grid-filter').data('related-grid');
			setTimeout(function() {
				jQuery('html,body').animate({ scrollTop: jQuery("#"+relGrid).offset().top}, 1000, 'easeInOutQuart');
			}, 300);
			return false;
		});
		
		
		/* Load More isotope
		------------------------------------------------*/
		//jQuery('.load-isotope:not(.disabled)').on("click","a", function() {
		jQuery('body').on("click", ".load-isotope:not(.disabled) a", function() { 
			var el = jQuery(this);
			if(el.data("loadpage") === undefined) { el.data("loadpage","2"); }
			else { el.data("loadpage", parseInt(el.data("loadpage"),10)+1); }
			var 	related = el.data('related-grid');
			var 	href = el.attr('href').replace("/2", '/'+el.data("loadpage"));
			href = href.replace("2", el.data("loadpage"));
			var datas = '';
			if(el.data("options") !== undefined && el.data("options")) { datas = el.data('options').replace("paged=2", "paged="+el.data("loadpage")); }
			isotopeLoadMore(jQuery('#'+related),el,href,datas);
			return false;
		});
		
	}
	
	
	
	
	/*---------------------------------------------- 
				 	L A Z Y   L O A D 
	------------------------------------------------*/
	if(jQuery().unveil && jQuery("img.lazy").length > 0) { 
		jQuery("img.lazy").unveil(600);
	}
	
	
	
	/*---------------------------------------------- 
						Z O O M
	------------------------------------------------*/
	if(jQuery().zoom && jQuery(".zoomF").length > 0 && jQuery(window).width() > 1024) { 
		jQuery('.zoomF').zoom();
	}
	
	
		
	/*---------------------------------------------- 
			    I N L I N E   V I D E O
	------------------------------------------------*/
	jQuery('body').on("click", ".inline-video", function() { 
		var el = jQuery(this);
		var type = el.data('type');
		var video = el.data('videoid');
				
		if (type === 'youtube') { 
		var iframe='<iframe src="https://www.youtube.com/embed/'+video+'?autoplay=1" width="100%" height="100%" frameborder="0" allowfullscreen ></iframe>';
		} else if (type === 'vimeo') {
		var iframe='<iframe src="https://player.vimeo.com/video/'+video+'?autoplay=1" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>';
		}
		
		el.append('<div class="inline-iframe-container" style="display:none;"></div>');
		el.find(".inline-iframe-container").fadeIn(200);
		el.find(".inline-iframe-container").html(iframe+'<div class="close-inline-video"></div>');
		
		setTimeout(function() {
			el.addClass('active');
		}, 1000);
		
		return false;
	});
	
	jQuery('body').on("click", ".close-inline-video", function() { 
		var thisItem = jQuery(this); 
		thisItem.parents( ".inline-video" ).removeClass('active');
		thisItem.parent( ".inline-iframe-container" ).fadeOut(200).remove();
		return false;
	});
	
	
	
	/*---------------------------------------------- 
				F L I C K I T Y
	------------------------------------------------*/
	if(jQuery().flickity) {
		jQuery('.flickity-carousel').flickity({
		  // options
			selectedAttraction: 0.04,
			friction: 0.4,
			lazyLoad: 1,
			pageDots: false,
			arrowShape: 'M0,50.8c0,1.5,0.8,3.1,1.5,3.8l0,0l29,28.2c2.3,2.3,5.3,2.3,7.6,0c2.3-2.3,2.3-5.3,0-7.6L18.3,55.3h76.3 c3.1,0,5.3-2.3,5.3-5.3s-2.3-5.3-5.3-5.3H18.3l19.1-19.8c2.3-2.3,2.3-5.3,0-7.6s-5.3-2.3-7.6,0l-28.2,29l0,0 c-0.8,0.8-0.8,1.5-1.5,1.5l0,0C0,49.2,0,50,0,50.8z',
			adaptiveHeight: true
		});
				
		jQuery('body').on( 'click', ".product-nav .nav-thumb", function( event ) {
		  	var index = jQuery( event.currentTarget ).index();
			var gal = jQuery(this).parents('.product-nav').data("gallery");
			var parentContainer = jQuery(this).parents(".product");
		 	jQuery(parentContainer).find('.flickity-carousel[data-gallery='+gal+']').flickity( 'select', index );
		});
		
		jQuery('body').on( 'select.flickity', ".flickity-carousel", function() {
			var flkty = jQuery(this).data('flickity');
			var nav = jQuery(this).data("gallery");
			var parentContainer = jQuery(this).parents(".product");
			
			if (nav && jQuery(parentContainer).find('.product-nav[data-gallery='+nav+']').length > 0) {
				var carouselNav = jQuery(parentContainer).find('.product-nav[data-gallery='+nav+']');
				var carouselNavCells = carouselNav.find('.nav-thumb');
				var navCellHeight = carouselNavCells.height();
				var navHeight = carouselNav.height();
			
				// set selected nav cell
				carouselNav.find('.is-nav-selected').removeClass('is-nav-selected');
				if (flkty) { var index = flkty.selectedIndex; } else { var index = 0; }
				var $selected = carouselNavCells.eq( index ).addClass('is-nav-selected');
				// scroll nav
				var scrollY = $selected.position().top + carouselNav.find(".productnav-inner").scrollTop() - ( navHeight + navCellHeight ) / 2;
				carouselNav.find(".productnav-inner").animate({
					scrollTop: scrollY
				});
			}
			
			// if is needed for ajax load which is undified on fort initialise
			if (flkty) {
				if(jQuery().zoom && jQuery(flkty.selectedElement).find(".zoomImg").length > 0) { 
					var zoomImgSrc = jQuery(flkty.selectedElement).find(".zoomImg").attr("src");
					if (!zoomImgSrc || zoomImgSrc === '' || zoomImgSrc.match("^data:image")) {
						var lazyImage = jQuery(flkty.selectedElement).find(".zoomImg").siblings('img').attr("src");
						jQuery(flkty.selectedElement).find(".zoomImg").attr("src",lazyImage)
					}
				}
			}
		});
	}
	
		
	
	/*---------------------------------------------- 
				   	 P A R A L L A X
	------------------------------------------------*/
	if(jQuery().parallax) { 
		jQuery('.parallax-section').parallax({speed:0.2});
	}
	
	
	/*---------------------------------------------- 
				   F I T   V I D E O S
	------------------------------------------------*/
	if(jQuery().fitVids) { 
		jQuery("body").fitVids();
	}
	
	
	/*---------------------------------------------- 
				   	 V I D E O   B G
	------------------------------------------------*/
	if(jQuery().phatVideoBg) { 
		jQuery('.videobg-section').phatVideoBg();
	}
	
	
	
	/*---------------------------------------------- 
				   	L I G H T C A S E
	------------------------------------------------*/
	if(jQuery().lightcase) {
		jQuery('a[data-rel^=lightcase]').lightcase({ 
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
		
		jQuery('a[data-rel^="lightcase:"]').each(function(index) {
			var el = jQuery(this);
			if(!el.hasClass('lc-trigger') && !el.parents('.isotope-item').hasClass('sr-gallery-item')) {
			var rel = el.data('rel');
            var href = el.attr('href');
			var count = jQuery('a[href="'+href+'"][data-rel="'+rel+'"]').length;
				if(count > 1) {
					jQuery('a[href="'+href+'"][data-rel="'+rel+'"]').not(this).addClass('lc-trigger').attr('data-trigger',index).attr('data-rel','');	
					el.addClass('lc-trigger-'+index);	
				}
			}
        });
		
		jQuery('a.lc-trigger').on("click", function() { 
			jQuery( ".lc-trigger-"+jQuery(this).data('trigger') ).trigger( "click" );
			return false;
		});
		
		// mute all bg videos if lightcase is opened
		jQuery('a[data-rel^=lightcase]').on("click", function() {
			if (jQuery(".phatvideo-bg .mute-video:not(.unmute)").length) {
				jQuery('.phatvideo-bg .mute-video:not(.unmute)').each(function() {
					jQuery(this).trigger("click");
				});
			}
		});
		
	}

	
	/*---------------------------------------------- 
				        T A B S 
	------------------------------------------------*/	
	jQuery(".sr-tabs:not(.wc-tabs):not(.woocommerce-tabs)").each(function() {
		var thisItem = jQuery(this); 
		thisItem.find('.tab-content').removeClass('active').css('display','none');
		var rel = thisItem.find('.active a').attr('href');
		thisItem.find('.'+rel).addClass('active');
	});
	
	jQuery(".tab-nav:not(.wc-tabs)").on("click", "a", function() { 
		var thisItem = jQuery(this); 
		var parentdiv = thisItem.parents('li').parent('ul').parent('div');
		var rel = thisItem.attr('href');
		
		jQuery(parentdiv).find(".tab-nav li").removeClass("active");
		thisItem.parents('li').addClass("active");
		
		jQuery(parentdiv).find(".tab-container .tab-content").hide().removeClass('active');
		jQuery(parentdiv).find(".tab-container ."+rel).fadeIn(500).addClass('active');
		
		return false;
	});
	
	
	
	/*---------------------------------------------- 
			T O G G L E  &  A C C O R D I O N
	------------------------------------------------*/		
	jQuery(".toggle-item").each(function() {
		if (!jQuery(this).find('.toggle-active').length) { jQuery(this).find('.toggle-inner').slideUp(300); }
		jQuery(this).find('.toggle-active').parent(".toggle-item").siblings('.toggle-item').find('.toggle-inner').slideUp(300);	
		jQuery(this).find('.toggle-active').siblings('.toggle-inner').slideDown(300);							
	});
	
	jQuery(".toggle-item").on("click", ".toggle-title", function() { 
		var thisItem = jQuery(this); 
		var parentdiv = thisItem.parent('div').parent('div');
		var active = thisItem.parent('div').find('.toggle-inner').css('display');
		
		if (jQuery(parentdiv).attr('class') === 'accordion') {
			if (active !== 'none' ) { 
				jQuery(parentdiv).find('.toggle-item .toggle-inner').slideUp(300);
				thisItem.toggleClass('toggle-active');
			} else {
				jQuery(parentdiv).find('.toggle-item .toggle-inner').slideUp(300);
				jQuery(parentdiv).find('.toggle-item .toggle-title').removeClass('toggle-active');
				
				thisItem.toggleClass('toggle-active');
				thisItem.siblings('.toggle-inner').slideDown(300);
			}
		} else {
			thisItem.toggleClass('toggle-active');
			thisItem.siblings('.toggle-inner').slideToggle(300);
		}
		
		return false;
	});
	
	
	
	
	/*---------------------------------------------- 
				   S C R O L L   T O (back to top, scroll down)
	------------------------------------------------*/
	jQuery('body').on('click', '.totop, #scrolldown', function() {
		var topPos = 0;
		if (jQuery(this).attr("id") === "scrolldown") { topPos = jQuery("#page-body").offset().top + 2; }
		jQuery('html,body').animate({ scrollTop: topPos}, 1000, 'easeInOutQuart');
		return false;
	});
		
	
	resizeAdapt();
});

jQuery(window).on('scroll',function() { 
	animateOnScroll(false);
	headerFeatures(); 
});

jQuery(window).on('resize',function() { 
	reorganizeIsotope();
	resizeAdapt(); 
});

})(jQuery);


/*---------------------------------------------- 
	WORKAROUND ( for 100vh height of the mini cart )
------------------------------------------------*/
// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
let vh = window.innerHeight * 0.01;
// Then we set the value in the --vh custom property to the root of the document
document.documentElement.style.setProperty('--vh', `${vh}px`);

// We listen to the resize event
window.addEventListener('resize', () => {
  // We execute the same script as before
  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
});
