<?php

/*-----------------------------------------------------------------------------------

	CUSTOM STYLING OPTIONS

-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Logo Height Styling
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_custom_style_logo' ) ) {
	function kona_custom_style_logo() {
		
		$return = '';
		$logoDark = get_option('_sr_logo');
		$logoLight = get_option('_sr_logo_light');
		
		if ($logoDark || $logoLight) {
			$logoId =  kona_get_attachment_id_from_src($logoDark);
			$logodata = wp_get_attachment_image_src( $logoId, "full" );
			$logoHeight = $logodata[2];
			$respLogoHeight = 30;
			
			if (get_option('_sr_logo_height') == 'custom' && get_option('_sr_customlogoheight')) {
				$logoHeight = intval(get_option('_sr_customlogoheight'));
			}
			
			if (get_option('_sr_logo_height') == 'custom' && get_option('_sr_customlogoheightresponsive')) {
				$respLogoHeight = intval(get_option('_sr_customlogoheightresponsive'));
			}
			
			// important if its smaller than the hamburger icon
			if ($respLogoHeight < 30) { $respHeight = 30; } else { $respHeight = $respLogoHeight; } 
			
			// important if header bar is active
			if (get_option('_sr_headerbar')) { 
				$respHeaderHeight = $respHeight+35; 
				$headerHeight = $logoHeight+35; 
			} else { 
				$respHeaderHeight = $respHeight; 
				$headerHeight = $logoHeight; 
			}
			
			$return .= '
			header #logo .text-logo { line-height: '.$logoHeight.'px; }
			#header #logo img { height: '.$logoHeight.'px; }
			#header #logo .text-logo { line-height: '.$logoHeight.'px; }
			#menu nav#main-nav > ul { height: '.$logoHeight.'px; }
			#menu nav#main-nav > ul > li { top: '.(($logoHeight - 20)/2).'px; }
			#menu nav#main-nav > ul > li[class*="megamenu"] > .sub-menu { padding-top: calc(30px + '.(($logoHeight - 20)/2).'px); }
			#menu nav#main-nav > ul > li[class*="megamenu"] > .sub-menu::before { height: calc(100% - (30px + '.(($logoHeight - 20)/2).'px) + 20px + 20px); }
			.menu-actions > div { height: '.$logoHeight.'px; }
			.menu-actions > div > a { height: '.$logoHeight.'px; line-height: '.$logoHeight.'px; }
			.menu-actions > div:not(.display-icon) > a.login-open { height: 20px; line-height: 20px; top: '.(($logoHeight - 20)/2).'px; }
			.header-wishlist .wishlist_products_counter::before { margin-top: '.((($logoHeight - 24)/2) - 1).'px !important; }
			
			#hero.hero-boxedauto, #hero.hero-boxedfull { margin-top:  calc('.$headerHeight.'px + 80px); }
			#hero.hero-boxedfull { min-height:  calc(100vh - '.$headerHeight.'px - 80px); }
			#hero.hero-fullwidth.no-bg #page-title, #hero.hero-fullscreen.no-bg #page-title { padding-top: calc('.$headerHeight.'px + 80px + 40px); }
			#hero.hero-fullwidth #page-title, #hero.hero-fullscreen #page-title { padding-top: calc('.$headerHeight.'px + 80px + 20px); padding-bottom: calc('.$headerHeight.'px + 80px + 0px); }
			
			.product .product-hero { padding-top:  calc('.$headerHeight.'px + 80px + 60px); }
			
			body:not(.single-product) #header + #hero-and-body > #page-body:first-child { margin-top:  calc('.$logoHeight.'px + 80px + 60px); }
			';
			
			$return .= '
			@media only screen and (max-width: 1200px) {
			body #header:not(.break-1024) #logo img { height: '.$respLogoHeight.'px !important; }
			body #header:not(.break-1024) #logo .text-logo { line-height: '.$respHeight.'px; }
			body #header:not(.break-1024) .menu-actions > div { height: '.$respHeight.'px; }
			body #header:not(.break-1024) .menu-actions > div > a { height: '.$respHeight.'px; line-height: '.$respHeight.'px; }
			body #header:not(.break-1024) .menu-toggle { height: '.$respHeight.'px; }
			
			body #header:not(.break-1024) + #hero-and-body .product .product-hero { padding-top: calc('.$respHeaderHeight.'px + 40px + 30px); }
			body #header:not(.break-1024) .menu-is-open #menu #menu-inner { padding-top: calc('.$respHeaderHeight.'px + 40px + 10px) }
			body #header:not(.break-1024) #menu .menu-login + nav#main-nav { max-height: calc(100vh - '.$respHeaderHeight.'px - 40px - 10px - 105px); }
			
			body #header:not(.break-1024) + #hero-and-body #hero.hero-boxedauto, body #header:not(.break-1024) + #hero-and-body #hero.hero-boxedfull { margin-top:  calc('.$respHeight.'px + 40px + 20px) ; }
			body:not(.single-product) #header:not(.break-1024) + #hero-and-body > #page-body:first-child { margin-top:  calc('.$respHeight.'px + 20px + 60px) !important ; }
			body #header:not(.break-1024).menu-is-open #menu #menu-inner { padding-top: calc('.$respHeight.'px + 60px); }
			body #header:not(.break-1024).has-header-bar.menu-is-open #menu #menu-inner { padding-top: calc('.$respHeight.'px + 60px + 30px); }
			body #header:not(.break-1024) #menu .scroll-menu { max-height: calc(100vh - '.($respHeight + 60).'px - 50px); }
			body #header:not(.break-1024).has-header-bar #menu .scroll-menu { max-height: calc(100vh - '.($respHeight + 60 + 30).'px - 50px); }
			
			}
			
			@media only screen and (max-width: 1024px) {
			body #header.break-1024 #logo img { height: '.$respLogoHeight.'px !important; }
			body #header.break-1024 #logo .text-logo { line-height: '.$respHeight.'px; }
			body #header.break-1024 .menu-actions > div { height: '.$respHeight.'px; }
			body #header.break-1024 .menu-actions > div > a { height: '.$respHeight.'px; line-height: '.$respHeight.'px; }
			body #header.break-1024 .menu-toggle { height: '.$respHeight.'px; }
			
			body #header.break-1024 + #hero-and-body .product .product-hero { padding-top: calc('.$respHeaderHeight.'px + 40px + 30px); }
			body #header.break-1024 .menu-is-open #menu #menu-inner { padding-top: calc('.$respHeaderHeight.'px + 40px + 10px) }
			body #header.break-1024 #menu .menu-login + nav#main-nav { max-height: calc(100vh - '.$respHeaderHeight.'px - 40px - 10px - 105px); }
			
			body #header.break-1024 + #hero-and-body #hero.hero-boxedauto, body #header.break-1024 + #hero-and-body #hero.hero-boxedfull { margin-top:  calc('.$respHeight.'px + 40px + 20px); }
			body:not(.single-product) #header.break-1024 + #hero-and-body > #page-body:first-child { margin-top:  calc('.$respHeight.'px + 20px + 60px) !important ; }
			body #header.break-1024.menu-is-open #menu #menu-inner { padding-top: calc('.$respHeight.'px + 60px); }
			body #header.break-1024.has-header-bar.menu-is-open #menu #menu-inner { padding-top: calc('.$respHeight.'px + 60px + 30px); }
			body #header.break-1024 #menu .scroll-menu { max-height: calc(100vh - '.($respHeight + 60).'px - 50px); }
			body #header.break-1024.has-header-bar #menu .scroll-menu { max-height: calc(100vh - '.($respHeight + 60 + 30).'px - 50px); }
			}
			
			@media only screen and (max-width: 1024px) {
			body .product .product-hero { padding-top: calc('.$respHeaderHeight.'px + 40px + 40px); }
			}
			
			@media only screen and (max-width: 768px) { 
			body .product .product-hero { padding-top: calc('.$respHeaderHeight.'px + 40px + 0px) !important; }
			body .product .product-hero:not(.no-bg) { padding-top: 0 !important; margin-top: calc('.$respHeaderHeight.'px + 40px + 0px) !important; }
			}
			
			@media only screen and (max-width: 640px) {
			body .menu-search, body .header-wishlist { top: calc('.$respHeaderHeight.'px + 40px + 7px); }
			body #header.has-header-bar .menu-search, body #header.has-header-bar .header-wishlist { top: calc('.$respHeaderHeight.'px + 40px + 30px + 7px); }
			}
			';
			
			// New since 2.1.5
			if ($logoHeight < 60) {
				$return .= '
					#menu nav#main-nav > ul > li:not(.megamenu2):not(.megamenu3):not(.megamenu4) > .sub-menu { padding-top: calc(30px + '.(($logoHeight - 20)/2).'px); }
					#menu nav#main-nav > ul > li:not(.megamenu2):not(.megamenu3):not(.megamenu4) > .sub-menu::before { height: calc(100% - (30px + '.(($logoHeight - 20)/2).'px) + 20px + 20px); }
				';
			} 
			
			
			
		} 
		
		return $return;
	}
}
		
		
		
		
/*-----------------------------------------------------------------------------------*/
/*	Color Styling
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_custom_style_color' ) ) {
	function kona_custom_style_color() {
			
		$return = '';
		
		// Main Color
		if (get_option('_sr_customcolor')){ 
			$main_color = get_option('_sr_customcolor');
			
			$return .= '
			.colored { color: '.$main_color.'; }
						
			#menu nav#main-nav > ul > li .sub-menu li a:hover,
			#menu nav#main-nav > ul > li .sub-menu li.current-menu-item > a,
			a:hover,
			p a:not(.entry-navigation__item):not(.post-edit-link):not(.fancybox):not(.button):not(.image-text-link):hover,
			.widget ul:not(.socialmedia-widget) li a:hover,
			.product .star-rating span,
			.widget .wcapf-layered-nav ul li > a:hover,
			.pagination li a:hover,
			#page-pagination .pagination li.page a:hover,
			.content-pagination .pages a:hover,
			.woocommerce-MyAccount-navigation ul li a:hover,
			.woocommerce-MyAccount-navigation ul li.is-active a,
			.header-wishlist a:hover,
			.grid-filter li > a:hover
			{ color: '.$main_color.'; opacity: 1; }
			
			input[type=submit]:hover, input[type=button]:hover, .button:hover, button:not(.sr-button):hover,
			.empty-cart .empty-icon,
			.notfound-icon,
			.sr-button.custom.withicon .icon,
			.sr-button.custom:not(.text-trans)
			{ background: '.$main_color.'; }
			
			.header-cart:hover .cart-amount::before,
			a.tinvwl_add_to_wishlist_button.tinvwl-product-in-list,
			.header-wishlist a:hover .wishlist_products_counter_number,
			#menu nav#main-nav ul > li.cta a:hover,
			.header-cart.cart-withicon .cart-amount span.minicart-count,
			.header-wishlist .wishlist_products_counter_number
			{ background: '.$main_color.' !important; }
			
			.empty-cart .empty-icon,
			.header-cart:hover .cart-amount,
			#menu nav#main-nav ul > li.cta a:hover,
			.header-cart.cart-withicon .cart-amount span.minicart-count,
			.header-wishlist .wishlist_products_counter_number
			{ color: #ffffff !important; }
			
			.menu-search a:hover svg path,
			.header-cart .cart-amount:hover span.icon svg path,
			.menu-actions > div.display-icon > a.login-open:hover svg path
			{ fill: '.$main_color.' !important; }
			
			';
			
		} // END if custom color
		
		
		// Sale Badge
		if (get_option('_sr_shopgridsalecolor')){ 
			$return .= 'span.onsale { background: '.get_option('_sr_shopgridsalecolor').' !important; }';
		}
		
		// New Badge
		if (get_option('_sr_shopgridnewcolor')){ 
			$return .= 'span.new-badge { background: '.get_option('_sr_shopgridnewcolor').' !important; }';
		}
		
		// Hot Badge
		if (get_option('_sr_shopgridhotcolor')){ 
			$return .= 'span.hot-badge { background: '.get_option('_sr_shopgridhotcolor').' !important; }';
		}
		
		// Header Bar
		if (get_option('_sr_headerbarbgcolor')){ 
			$return .= '#header .header-bar { background: '.get_option('_sr_headerbarbgcolor').'; }';
		}
		
		// Show variation on grid
		if (get_option('_sr_shopgridvariationscount') == 1 || get_option('_sr_shopgridvariationscount') == 2) {
			if (get_option('_sr_shopgridvariationsatt1')) {
				$return .= '.shop-container .shop-item form.cart .variations .variation .value .variable-items-wrapper[data-attribute_name="attribute_pa_'.get_option('_sr_shopgridvariationsatt1').'"] { display: block; }';
			}
		}
		if (get_option('_sr_shopgridvariationscount') == 2) {
			if (get_option('_sr_shopgridvariationsatt2')) {
				$return .= '.shop-container .shop-item form.cart .variations .variation .value .variable-items-wrapper[data-attribute_name="attribute_pa_'.get_option('_sr_shopgridvariationsatt2').'"] { display: block; }';
			}
		}
		
		
		return $return;
	}
}




/*-----------------------------------------------------------------------------------*/
/*	Typorgraphy Styling
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_custom_style_typography' ) ) {
	function kona_custom_style_typography() {
		
		if (get_option('_sr_optiontree')){ 	
		
		$defaultfonts = array('body','h1','h2','h3','h4','h5','h6');
		
		// DEFAULT FONTS
		$return = '';
		$return1024 = '';
		$return768 = '';
		$return480 = '';
		foreach($defaultfonts as $font) {
			$family = get_option('_sr_'.$font.'font-font');
			$weight = get_option('_sr_'.$font.'font-weight');
			$boldweight = get_option('_sr_'.$font.'font-boldweight');
			$size = get_option('_sr_'.$font.'font-size');
			$lineheight = get_option('_sr_'.$font.'font-height');
			if (!$lineheight) $lineheight = intval(intval($size)*1.25).'px';
			$spacing = get_option('_sr_'.$font.'font-spacing');
			$transform = get_option('_sr_'.$font.'font-transform');
			
			if ($font !== 'body') { $fontClass = '.'.$font; } else { $fontClass = ''; }
			$return .= $font;
			if ($font !== 'body') { $return .= ', '.$fontClass; }
			$return .= '{';
				if ($family) { $return .= 'font-family: "'.$family.'";'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($size) { $return .= 'font-size: '.$size.';line-height: '.$lineheight.';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			if ($boldweight) { 
				$return .= $font.' strong,'.$font.' b';
				if ($font == 'body') { $return .= ', dt, .tinv-wishlist .product-name .variation span:first-child, .tinv-wishlist .product-name .variation br + span'; }
				if ($font !== 'body') { $return .= ', '.$fontClass.' strong,'.$fontClass.' b'; }
				$return .= '{ font-weight: '.str_replace("italic", "", $boldweight).'; }';
			}
			
			if ($font == 'body') {
				$return .= 'blockquote, blockquote cite, cite, mark, address, code,
							.comments .comment-reply-link, .comments #cancel-comment-reply-link,
							.widget ul:not(.socialmedia-widget) li a,
							body #cookie-notice .cookie-notice-container #cn-accept-cookie,
							body #cookie-notice .cookie-notice-container #cn-refuse-cookie,
							.woocommerce-message, .woocommerce-error,
							.product .cart .variations .variation .variable-items-wrapper li > span,
							.shop_table .product-name .product-title .product-quantity,
							.empty-cart .empty-icon,
							.menu-language a,
							header .wcml_currency_switcher a
							{ font-weight: '.$boldweight.'; }';
			}
			
			// margin-top negative for headings
			if ($font !== "body" && $size) {
				$margin = number_format(((intval($lineheight) / intval($size)-1)*0.45),2);
				if ($margin < 0) { $margin= 0.01; }
				$return .= 'div '.$font.':first-child'.', div'.$fontClass.':first-child { margin-top: -'.$margin.'em; }';
				$return .= 'div '.$font.':last-child'.', div'.$fontClass.':last-child { margin-bottom: -'.$margin.'em; }';
			}
			
			if ($font == "h5") {
				$return .= '#single-pagination .pagination li .post-title { font-size: '.$size.';line-height: '.$lineheight.'; }';
				$return .= '.content-pagination .pages, .content-pagination .pages a,
							.cart-collaterals .shop_table .order-total th, 
							.cart-collaterals .shop_table .order-total td .amount,
							.woocommerce .sr-checkout-order .shop_table tfoot .order-total th, 
							.woocommerce .sr-checkout-order .shop_table tfoot .order-total .amount,
							.woocommerce .woocommerce-order .shop_table tfoot tr:last-child th, 
							.woocommerce .woocommerce-order .shop_table tfoot tr:last-child .amount,
							.woocommerce-order .woocommerce-order-overview li > strong,
							.woocommerce-order .woocommerce-order-overview li .amount { 
					font-family: "'.$family.'";
					font-weight: '.str_replace("italic", "", $boldweight).';
				}';
			}
			
			if ($font == "h3") {
				$return .= '#header-search form input[type=search], body h2.sg_title {';
					if ($family) { $return .= 'font-family: "'.$family.'";'; }
					if ($boldweight) { $return .= 'font-weight: '.str_replace("italic", "", $boldweight).';'; }
					if ($size) { $return .= 'font-size: '.$size.'; line-height: '.$lineheight.'; height: '.$lineheight.';'; }
					if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
					if ($transform) { $return .= 'text-transform: '.$transform.';'; }
				$return .= '}';
			}
			
			if ($font == "h4") {
				$return .= '.woocommerce-MyAccount-content h3, #reply-title {';
					if ($family) { $return .= 'font-family: "'.$family.'";'; }
					if ($boldweight) { $return .= 'font-weight: '.str_replace("italic", "", $boldweight).';'; }
					if ($size) { $return .= 'font-size: '.$size.'; line-height: '.$lineheight.'; height: '.$lineheight.';'; }
					if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
					if ($transform) { $return .= 'text-transform: '.$transform.';'; }
				$return .= '}';
			}
			
			// Responsiveness
			$size1024 = get_option('_sr_'.$font.'font-1024');
			$height1024 = get_option('_sr_'.$font.'font-1024-height');
			if ($font !== 'body') { $fontClass = '.'.$font; } else { $fontClass = ''; }
			if ($size1024) { 
				//$return1024 .= $font.', '.$fontClass.' { font-size: '.$size1024.' !important;';
				$return1024 .= $font;
				if ($font !== 'body') { $return1024 .= ', '.$fontClass; }
				$return1024 .= '{ font-size: '.$size1024.';';
				if ($height1024) { $return1024 .= 'line-height: '.$height1024.';'; } 
				else { $return1024 .= 'line-height: '.intval(intval($size1024)*1.25).'px;'; }
				$return1024 .= '}'; 
			}
			
			$size768 = get_option('_sr_'.$font.'font-768');
			$height768 = get_option('_sr_'.$font.'font-768-height');
			if ($size768) { 
				//$return768 .= $font.', '.$fontClass.' { font-size: '.$size768.' !important;'; 
				$return768 .= $font;
				if ($font !== 'body') { $return768 .= ', '.$fontClass; }
				$return768 .= '{ font-size: '.$size768.';';
				if ($height768) { $return768 .= 'line-height: '.$height768.';'; } 
				else { $return768 .= 'line-height: '.intval(intval($size768)*1.25).'px;'; }
				$return768 .= '}'; 
			}
			
			$size480 = get_option('_sr_'.$font.'font-480');
			$height480 = get_option('_sr_'.$font.'font-480-height');
			if ($size480) {
				//$return480 .= $font.', '.$fontClass.' { font-size: '.$size480.' !important;'; 
				$return480 .= $font;
				if ($font !== 'body') { $return480 .= ', '.$fontClass; }
				$return480 .= '{ font-size: '.$size480.';';
				if ($height480) { $return480 .= 'line-height: '.$height480.';'; } 
				else { $return480 .= 'line-height: '.intval(intval($size480)*1.25).'px;'; }
				$return480 .= '}'; 
			}
			
		}
		
		if ($return1024) { $return .= '@media only screen and (max-width: 1024px) { '.$return1024.' }'; }
		if ($return768) { $return .= '@media only screen and (max-width: 768px) { '.$return768.' }'; }
		if ($return480) { $return .= '@media only screen and (max-width: 480px) { '.$return480.' }'; }
		// DEFAULT FONTS
		
		
		// SUB TITLE
			$family = get_option('_sr_subtitle-font');
			$weight = get_option('_sr_subtitle-weight');
			$boldweight = get_option('_sr_subtitle-boldweight');
			$spacing = get_option('_sr_subtitle-spacing');
			$transform = get_option('_sr_subtitle-transform');
			
			$return .= '.title-alt {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			if ($boldweight) { $return .= '.title-alt b, .title-alt strong, strong .title-alt { font-weight: '.str_replace("italic", "", $boldweight).'; }'; }
		// SUB TITLE
		
				
		// ROOT NAVIGATION
			$family = get_option('_sr_navigationfont-font');
			$weight = get_option('_sr_navigationfont-weight');
			$size = get_option('_sr_navigationfont-size');
			$spacing = get_option('_sr_navigationfont-spacing');
			$transform = get_option('_sr_navigationfont-transform');
			
			$return .= '#menu nav#main-nav ul > li a, .menu-actions > div > a, #menu .menu-login a {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($size) { $return .= 'font-size: '.$size.';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			
			$return .= '.widget .wcapf-layered-nav ul li a, .widget .wcapf-active-filters a, .woocommerce-MyAccount-navigation ul li a, .grid-filter li a {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			
			$return .= '@media only screen and (min-width: 1199px) { #menu nav#main-nav > ul > li .sub-menu li.image-item a {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
			$return .= '} }';
		// ROOT NAVIGATION
		
		
		// SUB NAVIGATION
			$family = get_option('_sr_navigationsubfont-font');
			$weight = get_option('_sr_navigationsubfont-weight');
			$size = get_option('_sr_navigationsubfont-size');
			$lineheight = intval(intval($size)*1.3).'px';
			$spacing = get_option('_sr_navigationsubfont-spacing');
			
			$return .= '#menu nav#main-nav > ul > li .sub-menu li a, .kona-tabs .tp-tab .tp-tab-title {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($size) { $return .= 'font-size: '.$size.';'; }
				if ($lineheight) { $return .= 'line-height: '.$lineheight.';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
			$return .= '}';
			
			$return .= '.widget ul:not(.socialmedia-widget) li a {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($size) { $return .= 'font-size: '.$size.';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
			$return .= '}';
			
			$return .= '#footer .footer-bottom > a {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
			$return .= '}';
		// SUB NAVIGATION
		
		
		// PORTFOLIO 
			$family = get_option('_sr_portfoliotitle-font');
			$weight = get_option('_sr_portfoliotitle-weight');
			$spacing = get_option('_sr_portfoliotitle-spacing');
			$transform = get_option('_sr_portfoliotitle-transform');
			
			$return .= '.portfolio-container .portfolio-name {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			
			// category
			$family = get_option('_sr_portfoliocategoryfont-font');
			$weight = get_option('_sr_portfoliocategoryfont-weight');
			$size = get_option('_sr_portfoliocategoryfont-size');
			$spacing = get_option('_sr_portfoliocategoryfont-spacing');
			$transform = get_option('_sr_portfoliocategoryfont-transform');
			
			$return .= '.portfolio-category {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($size) { $return .= 'font-size: '.$size.'; line-height: '.intval(intval($size)*1.25).'px;'; }
				if ($spacing && $spacing !== '0') { $spacing = 0; }
				$return .= 'letter-spacing: '.$spacing.'em;';
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
		// PORTFOLIO 
		
		
		// BLOG 
			$family = get_option('_sr_blogtitle-font');
			$weight = get_option('_sr_blogtitle-weight');
			$spacing = get_option('_sr_blogtitle-spacing');
			$transform = get_option('_sr_blogtitle-transform');
			
			$return .= '.blog-item .blog-info .post-name,
						#single-pagination .pagination li a[data-title]::after {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			
			$family = get_option('_sr_blogtitlesingle-font');
			$weight = get_option('_sr_blogtitlesingle-weight');
			$spacing = get_option('_sr_blogtitlesingle-spacing');
			$transform = get_option('_sr_blogtitlesingle-transform');
			
			$return .= '#page-title .post-name {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
		// BLOG 
			
			
		
		// SHOP 
			// grid title
			$family = get_option('_sr_productgridtitle-font');
			$weight = get_option('_sr_productgridtitle-weight');
			$spacing = get_option('_sr_productgridtitle-spacing');
			$transform = get_option('_sr_productgridtitle-transform');
			
			$return .= '.shop-container .product-name, .shop_table .product-name .product-title, .tinv-wishlist table .product-name {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			
			// single title
			$family = get_option('_sr_productsingletitle-font');
			$weight = get_option('_sr_productsingletitle-weight');
			$spacing = get_option('_sr_productsingletitle-spacing');
			$transform = get_option('_sr_productsingletitle-transform');
			
			$return .= '.product .product-info .product_title, #fixed-product-add .product-name {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			
			// price
			$family = get_option('_sr_productprice-font');
			$weight = get_option('_sr_productprice-weight');
			$spacing = get_option('_sr_productprice-spacing');
			$transform = get_option('_sr_productprice-transform');
			
			$return .= '.price, .amount, .woocommerce .sr-checkout-order .shop_table tfoot td, .woocommerce .woocommerce-order .shop_table tfoot td {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			
			$return .= '.comments .time,
						.widget_price_filter .price_slider_wrapper .price_slider_amount .price_label span, .widget .slider-values p span,
						body #cookie-notice .cookie-notice-container a,
						.header-cart .cart-amount,
						span.onsale,
						span.new-badge,
						.woocommerce-breadcrumb,
						.product .product_meta,
						.product .cart .woocommerce-variation .woocommerce-variation-availability,
						.stock,
						.shop_table .product-name .variation dd,
						.shop_table .product-name .wc-item-meta li > p,
						.shop_table .product-name .backorder_notification,
						.shop_table .remove,
						.woocommerce-remove-coupon,
						.post-date, .post-cat, .meta-author,
						#single-pagination .pagination li a .text {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			
			// single price size (theme options > shop > single product)
			$singlePrice = get_option('_sr_shopsinglepricesize');
			if (!$singlePrice) { $singlePrice = '28px'; }
			$lineheight = intval(intval($singlePrice)*1.15).'px';
			$return .= '.product .product-info .price, .product .product-info .amount { font-size: '.$singlePrice.'; line-height: '.$lineheight.'; }';
			
		// SHOP 
		
		
		// BUTTON
			$family = get_option('_sr_buttonfont-font');
			$weight = get_option('_sr_buttonfont-weight');
			$boldweight = get_option('_sr_buttonfont-boldweight');
			$spacing = get_option('_sr_buttonfont-spacing');
			$transform = get_option('_sr_buttonfont-transform');
			
			$return .= '.sr-button, .sr-button-text, input[type=submit], input[type=button], .button, button, .woocommerce .addresses header a.edit, .comments .comment-list .pingback .edit-link a {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			if ($weight) { $return .= '.sr-button strong, .sr-button b { font-weight: '.str_replace("italic", "", $weight).'; }'; }
			
			$return .= '.pagination li a,
						#page-pagination .pagination li.page span, #page-pagination .pagination li.page a { font-weight: '.$weight.'; }';
			
		// BUTTON
		
		
		// MISC (widget title)
			$family = get_option('_sr_widgettitlefont-font');
			$weight = get_option('_sr_widgettitlefont-weight');
			$size = get_option('_sr_widgettitlefont-size');
			$spacing = get_option('_sr_widgettitlefont-spacing');
			$transform = get_option('_sr_widgettitlefont-transform');
			
			$return .= '.widget-title, .widget-title.title-alt,
						#menu nav#main-nav.with-title > ul > li[class*="megamenu"] > .sub-menu > li > a,
						table th,
						.tinv-wishlist .social-buttons > span {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.str_replace("italic", "", $weight).';'; }
				if ($size) { $return .= 'font-size: '.$size.';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
		// MISC (widget title)
			
		
		// LABEL
			$family = get_option('_sr_labelfont-font');
			$weight = get_option('_sr_labelfont-weight');
			$size = get_option('_sr_labelfont-size');
			$spacing = get_option('_sr_labelfont-spacing');
			$transform = get_option('_sr_labelfont-transform');
			
			$return .= 'label, form label, .form-row.deplace > label, label input + span, input[type="radio"] + label, input[type="checkbox"] + label {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.$weight.';'; }
				if ($size) { $return .= 'font-size: '.$size.';'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			
			$return .= '@media only screen and (max-width: 768px) { 
							label, form label, .form-row.deplace > label, label input + span, input[type="radio"] + label, input[type="checkbox"] + label {
								size: '.intval(intval($size)*0.85).'px; 
							}
						}';
		// LABEL
			
		
		// INPUT
			$family = get_option('_sr_inputfont-font');
			$weight = get_option('_sr_inputfont-weight');
			$size = get_option('_sr_inputfont-size');
			$spacing = get_option('_sr_inputfont-spacing');
			$transform = get_option('_sr_inputfont-transform');
			
			$return .= 'input[type="text"], input[type="password"], input[type="email"], input[type="number"], input[type="tel"], input[type="date"], input[type="search"], textarea, select, .select2-container .select2-selection--single .select2-selection__rendered,
			#billing_country_field label + .woocommerce-input-wrapper > strong {';
				if ($family) { $return .= 'font-family: '.$family.';'; }
				if ($weight) { $return .= 'font-weight: '.$weight.';'; }
				if ($size) { $return .= 'font-size: '.$size.' !important;'; }
				if ($spacing && $spacing !== '0') { $return .= 'letter-spacing: '.$spacing.'em;'; }
				if ($transform) { $return .= 'text-transform: '.$transform.';'; }
			$return .= '}';
			
			$return .= '@media only screen and (max-width: 768px) { 
							input[type="text"], input[type="password"], input[type="email"], input[type="number"], input[type="tel"], input[type="date"], input[type="search"], textarea, select, .select2-container .select2-selection--single .select2-selection__rendered {
								size: '.intval(intval($size)*0.85).'px; 
							}
						}';
		// INPUT
		
		// QUICK VIEW
			$fontSize = get_option('_sr_'.get_option('_sr_shopgridquickviewtitle').'font-size');
			$fontHeight = get_option('_sr_'.get_option('_sr_shopgridquickviewtitle').'font-height');
			$return .= '#quick-view .product-info .product_title { font-size: '.$fontSize.'; line-height: '.$fontHeight.'; }';
		// QUICK VIEW
			
				
		return $return;
			
		} // END if sr_optiontree
		
	}
}

?>