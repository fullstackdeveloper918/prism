<?php
/**
 * Custom Style
 */

if(!function_exists('neuron_hexToRgb') || !function_exists('neuron_color_lightness')) {
	return;
}

function amartha_custom_style() {
	$amartha_color_output = [];

	/**
	 * Body Color
	 */
	$amartha_bg_color = get_theme_mod('style_bg_color', '#FFFFFF');
	
	if ($amartha_bg_color && ($amartha_bg_color != '#FFFFFF' && $amartha_bg_color != '#ffffff')) {
		// Color
		$amartha_color_output[] = 'html, body, .l-main-wrapper, input, textarea, .select2-container--default .select2-selection--single { background-color: '. $amartha_bg_color .' }';

		// Background Color Important
		$amartha_color_output[] = implode(',', [
			'.l-primary-footer .l-primary-footer__widgets'
		]) . '{ background-color: '. $amartha_bg_color .' !important}';

		// Background Color Darken (3%) Important
		$amartha_color_output[] = implode(',', [
			'.l-primary-footer .l-primary-footer__copyright'
		]) . '{ background-color: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_bg_color)), -3) .') !important}'; 
	}

	/**
	 * Main Color
	 */
	$amartha_main_color = get_theme_mod('style_main_color', '#ffcdab');

	if ($amartha_main_color && ($amartha_main_color != '#ffcdab' && $amartha_main_color != '#FFCDAB')) {

		// Color
		$amartha_color_output[] = implode(',', [
			'a:not(button)',
			'.a-site-search-icon:hover',
			'.a-slidingbar-icon a:hover',
			'a',
			'.l-primary-footer .l-primary-footer__copyright .l-primary-footer__copyright__space .l-primary-footer__copyright__social-media ul li a:hover',
			'.m-filters ul li a:hover',
			'.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__close-icon:hover',
			'.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form .m-site-search__form__icon span:hover',
			'.m-social-media ul li a:hover',
			'.l-primary-footer--dark-skin .widget.widget_calendar table td a',
			'.l-primary-footer--dark-skin .widget.widget_calendar table th a',
			'.woocommerce .woocommerce-shipping-calculator a',
			'.woocommerce .o-product .woocommerce-tabs .woocommerce-Tabs-panel .woocommerce-Reviews #comments .woocommerce-Reviews-title span',
			'.woocommerce .o-product .woocommerce-tabs .woocommerce-Tabs-panel .woocommerce-Reviews #comments .commentlist .comment .comment_container .comment-text .star-rating',
			'.o-breadcrumb .o-breadcrumb__list .o-breadcrumb__list__item.o-breadcrumb__list__item--separator',
			'.l-primary-header__bag .l-primary-header__bag__icon:hover',
			'.o-post-navigation .o-post-navigation__link a:hover .o-post-navigation__title',
			'.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a:hover',
			'.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a:hover svg',
		]) . '{ color: '. $amartha_main_color .' }';

		// Color Important
		$amartha_color_output[] = implode(',', [
			'.woocommerce table td.product-remove a:hover',
			'.woocommerce .o-product .woocommerce-tabs ul.tabs li a:hover',
			'.woocommerce .o-product .woocommerce-tabs ul.tabs li.active a',
			'.o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__item__remove:hover',
			'.o-pagination ul.o-pagination__numbers li a:hover',
			'.o-slidingbar .o-slidingbar__content .o-slidingbar__content__holder .o-slidingbar__close-icon svg:hover'
		]) . '{ color: '. $amartha_main_color .' !important}';

		// Stroke
		$amartha_color_output[] = implode(',', [
			'.o-pagination .o-pagination__arrow a:hover svg',
			'.o-post-navigation .o-post-navigation__link a:hover svg'
		]) . '{ stroke: '. $amartha_main_color .' }';

		// Background Color
		$amartha_color_output[] = implode(',', [
			'.a-woo-badge.a-woo-badge--theme-color',
			'input[type=submit]',
			'button',
			'.button',
			'mark',
			'.select2-container .select2-dropdown .select2-results .select2-results__options .select2-results__option.select2-results__option--highlighted',
			'.a-button.a-button--theme-color',
			'.elementor-button',
			'.l-woocommerce-wrapper .l-woocommerce-wrapper__product .o-neuron-hover-holder .o-neuron-hover-holder__button:hover',
			'.m-progress-bar .m-progress-bar__content-holder .m-progress-bar__content span',
			'.l-primary-header__bag .l-primary-header__bag__icon span',
			'.a-form--dark-skin input[type=submit]',
			'.a-form--dark-skin button',
			'.a-form--dark-skin .button,',
			'.m-nav-menu--horizontal ul li.menu-item > a:before',
			'.a-to-top',
			'.a-button.a-button--theme-color'
		]) . '{ background-color: '. $amartha_main_color .' }';

		// Background Color Selection
		$amartha_color_output[] = implode(',', [
			'::-moz-selection'
		]) . '{ background-color: '. $amartha_main_color .' }';

		// Background Color Selection
		$amartha_color_output[] = implode(',', [
			'::selection'
		]) . '{ background-color: '. $amartha_main_color .' }';

		// Background Color Important
		$amartha_color_output[] = implode(',', [
			'.woocommerce .button',
			'.woocommerce .o-product .woocommerce-tabs .woocommerce-Tabs-panel .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input',
			'.m-nav-menu--horizontal ul li.menu-item > a:before',
			'.l-primary-header__bag .l-primary-header__bag__icon span',
			'.a-woo-badge.a-woo-badge--theme-color',
			'.a-button.a-button--theme-color'
		]) . '{ background-color: '. $amartha_main_color .' !important}';
		
		// Background Color (Darken)
		$amartha_color_output[] = implode(',', [
			'input[type=submit]:hover',
			'button:hover',
			'.button:hover',
			'.a-button.a-button--theme-color:hover',
		]) . '{ background-color: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_main_color)), -10) .') }';


		// Background Color (Darken) !important
		$amartha_color_output[] = implode(',', [
			'.woocommerce .button:hover',
			'.woocommerce .o-product .woocommerce-tabs .woocommerce-Tabs-panel .woocommerce-Reviews #review_form_wrapper .comment-form .form-submit input:hover'
		]) . '{ background-color: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_main_color)), -10) .') !important}';

		// Border Color
		$amartha_color_output[] = implode(',', [
			'input:focus',
			'textarea:focus',
			'.select2-container .select2-dropdown',
			'blockquote',
			'abbr',
			'.widget .widgettitle-wrapper .widgettitle',
			'.woocommerce .o-product .woocommerce-tabs ul.tabs li a:hover',
			'.woocommerce .o-product .woocommerce-tabs ul.tabs li.active a',
			'.a-form--dark-skin input:focus',
			'.a-form--dark-skin textarea:focus'
		]) . '{ border-color: '. $amartha_main_color .' }';

		// Border Color Important
		$amartha_color_output[] = implode(',', [
			'select2.select2-container.select2-container--default.select2-container--open .select2-selection--multiple',
			'.select2.select2-container.select2-container--default.select2-container--open .selection .select2-selection'
		]) . '{ border-color: '. $amartha_main_color .' !important}';

		// Border Top Color
		$amartha_color_output[] = implode(',', [
			'.woocommerce .blockUI.blockOverlay::before',
			'.woocommerce .loader::before',
			'.woocommerce-info',
			'.woocommerce-message'
		]) . '{ border-top-color: '. $amartha_main_color .' }';

		// Background Color RGBA(0.5) 
		$amartha_color_output[] = implode(',', [
			'.a-to-top',
		]) . '{ background-color: rgba('. neuron_hexToRgb($amartha_main_color, 0.5) .') !important}';
	}

	/**
	 * Headings
	 */
	$amartha_headings_color = get_theme_mod('style_headings_color', '#232121');

	if ($amartha_headings_color && $amartha_headings_color != '#232121') {
		// Color
		$amartha_color_output[] = implode(', ', [
			'h1', '.h1', 'h2', '.h2', 'h3', '.h3', 'h4', '.h4', 'h5', '.h5', 'h6', '.h6',
			'.o-hero .o-hero__content .o-hero__content__title',
			'.t-404 .o-hero .o-hero__content .o-hero__content__title h1',
			'legend',
			'input',
			'textarea',
			'label',
			'.select2-container .select2-dropdown .select2-results .select2-results__options .select2-results__option[data-selected=true]',
			'.select2-container--default .select2-selection--single .select2-selection__rendered',
			'.a-separator ul li a',
			'.a-site-search-icon',
			'.a-slidingbar-icon a',
			'table td a',
			'table th a',
			'table td#today',
			'table thead td',
			'table thead th',
			'.tagcloud a',
			'dl dt',
			'blockquote',
			'b',
			'strong',
			'.woocommerce .star-rating',
			'.woocommerce table tfoot tr:last-child th',
			'.woocommerce table tfoot tr:last-child td',
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .widget_shopping_cart_content .o-mini-cart__no-products p',
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__cart-list__item__meta .title a',
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__item__remove',
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__total .subtotal',
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__total .price .amount',
			'.l-woocommerce-wrapper .l-woocommerce-wrapper__products-holder.l-woocommerce-wrapper__products-holder--meta-outside .o-neuron-hover .o-neuron-hover__body .o-neuron-hover__body-meta .o-neuron-hover__body-meta__title a',
			'.m-filters ul li a',
			'.m-filters ul li.active a',
			'.m-progress-bar .m-progress-bar__label',
			'.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__close-icon',
			'.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form .m-site-search__form__icon span',
			'.m-social-media ul li a',
			'.widget.widget_rss .widgettitle-wrapper .widgettitle .rsswidget',
			'.widget ul li a',
			'.woocommerce .o-product .m-product-summary .woocommerce-product-rating a',
			'.woocommerce .o-product .m-product-summary .price',
			'.woocommerce .o-product .woocommerce-tabs .woocommerce-Tabs-panel.woocommerce-Tabs-panel--additional_information table tr th',
			'.o-comments .o-comments__area .o-comment .o-comment__details .o-comment__author-meta .comment-reply-link',
			'.l-primary-header__bag .l-primary-header__bag__icon',
			'.o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__cart-list__item__meta .title a',
			'.o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__item__remove',
			'.o-mini-cart__total-holder .o-mini-cart__total-holder__total .subtotal',
			'.o-mini-cart__total-holder .o-mini-cart__total-holder__total .price .amount',
			'.o-pagination ul.o-pagination__numbers li a',
			'.o-pagination ul.o-pagination__numbers li.active a',
			'.o-pagination.o-pagination--pages .o-pagination__title',
			'.o-pagination.o-pagination--pages .o-pagination--pages__numbers span',
			'.o-slidingbar .o-slidingbar__content .o-slidingbar__content__holder .o-slidingbar__close-icon svg',
			'.o-blog-post .o-blog-post__title a',
			'.o-blog-post .o-blog-post__meta',
			'.o-blog-post .o-blog-post__author .author-name a',
			'.l-portfolio-wrapper .l-portfolio-wrapper__items-holder.l-portfolio-wrapper__items-holder--meta-outside .o-portfolio-item .o-portfolio-item__content .o-portfolio-item__title a',
			'.woocommerce .woocommerce-cart-form table td::before',
			'.woocommerce .woocommerce-cart-form table .actions .coupon #coupon_code',
			'.woocommerce .cart-collaterals .cart_totals table th',
			'.woocommerce .cart-collaterals .cart_totals table td[data-title=Total]::before, .woocommerce .cart-collaterals .cart_totals table td[data-title=Subtotal]::before',
			'.woocommerce-checkout .woocommerce-checkout-review-order table tr.order-total td strong',
			'.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a',
			'.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a svg',
			'.a-button.a-button--white-color',
        ]) . '{ color: '. $amartha_headings_color .' }';
        
		// Color Important
		$amartha_color_output[] = implode(',', [
            '.woocommerce table td.product-remove a',
			'.m-nav-menu--horizontal ul.menu li.menu-item > a',
			'.woocommerce .o-product .woocommerce-tabs ul.tabs li a',
			'.o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__buttons .button',
			'.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form input[type=search]',
			'.l-primary-footer .l-primary-footer__widgets',
			'.l-primary-footer .l-primary-footer__copyright',
			'.l-primary-footer .l-primary-footer__copyright .l-primary-footer__copyright__space .l-primary-footer__copyright__social-media ul li a',
        ]) . '{ color: '. $amartha_headings_color .' !important}';
        
        // Color Placeholder
        $amartha_color_output[] = implode(',', [
            '.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form input[type=search]::-webkit-input-placeholder',
		]) . '{ color: '. $amartha_headings_color .'}';
		
		$amartha_color_output[] = implode(',', [
			'.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form input[type=search]:-moz-placeholder',
		]) . '{ color: '. $amartha_headings_color .'}';
		
		$amartha_color_output[] = implode(',', [
			'.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form input[type=search]::-moz-placeholder',
		]) . '{ color: '. $amartha_headings_color .'}';
		
		$amartha_color_output[] = implode(',', [
			'.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form input[type=search]:-ms-input-placeholder'
        ]) . '{ color: '. $amartha_headings_color .'}';

		// Stroke
		$amartha_color_output[] = implode(',', [
			'.l-primary-header.l-primary-header--responsive .m-nav-menu--mobile-icon svg line',
			'.o-pagination .o-pagination__arrow a svg',
			'.o-post-navigation .o-post-navigation__link a svg',
			'.o-blog-post .o-blog-post__meta svg'
		]) . '{ stroke: '. $amartha_headings_color .'  }';

		// Stroke Lighten 40%
		$amartha_color_output[] = implode(',', [
			'.o-pagination .o-pagination__arrow.o-pagination__arrow--disabled a svg'
		]) . '{ stroke: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_headings_color)), 40) .')  }';

		// Background Color
		$amartha_color_output[] = implode(',', [
			'.l-primary-header.l-primary-header--responsive .m-nav-menu--mobile',
			'.l-woocommerce-wrapper .l-woocommerce-wrapper__product .o-neuron-hover-holder .o-neuron-hover-holder__button',
			'.m-nav-menu--horizontal ul.menu li.menu-item.menu-item-has-children > ul.sub-menu',
			'.o-mini-cart',
			'.o-slidingbar .o-slidingbar__content.o-slidingbar__content--dark-skin',
			'.a-button.a-button--dark-color'
		]) . '{ background-color: '. $amartha_headings_color .'  }';

		// Background Color Important
		$amartha_color_output[] = implode(',', [
			'.ui-slider .ui-slider-range',
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__buttons .button',
			'.woocommerce .o-main-sidebar input[type=submit]',
			'.woocommerce .o-main-sidebar button',
			'.woocommerce .o-main-sidebar .button',
			'.o-mini-cart__total-holder .o-mini-cart__total-holder__buttons .button',
			'.o-mini-cart .o-mini-cart__holder .blockUI.blockOverlay',
			'.o-mini-cart .o-mini-cart__holder .loader'	
		]) . '{ background-color: '. $amartha_headings_color .' !important}';

		// Background Color Lighten (10%) IMPORTANT
		$amartha_color_output[] = implode(',', [
			'.o-mini-cart__total-holder .o-mini-cart__total-holder__buttons .button:hover'
		]) . '{ background-color: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_headings_color)), 10) .') !important}';

		// Background Color RGBA (0.3) 
		$amartha_color_output[] = implode(',', [
			'.m-site-search .m-site-search__overlay',
			'.o-slidingbar .o-slidingbar__overlay'
		]) . '{ background-color: rgba('. neuron_hexToRgb($amartha_headings_color, 0.3) .') !important}';

		// Background Color Lighten (10%) 
		$amartha_color_output[] = implode(',', [
			'.a-button.a-button--dark-color:hover'
		]) . '{ background-color: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_headings_color)), 10) .') }';

		// Background Color Lighten (8%) IMPORTANT 
		$amartha_color_output[] = implode(',', [
			'.woocommerce .o-main-sidebar input[type=submit]:hover',
			'.woocommerce .o-main-sidebar button:hover',
			'.woocommerce .o-main-sidebar .button:hover'	
		]) . '{ background-color: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_headings_color)), 8) .') !important}';

		// Background Color Darken (20%)
		$amartha_color_output[] = implode(',', [
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__cart-list__item__meta .quantity'
		]) . '{ background-color: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_headings_color)), -20) .')}'; 

		// Background Color Darken (15%) IMPORTANT
		$amartha_color_output[] = implode(',', [
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__buttons .button:hover'
		]) . '{ background-color: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_headings_color)), -15) .') !important}'; 

		// Border Color
		$amartha_color_output[] = implode(',', [
			'.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form input[type=search]'
		]) . '{ border-color: '. $amartha_headings_color .'  }';

	}

	/**
	 * Paragraphs
	 */
	$amartha_paragraphs_color = get_theme_mod('style_paragraphs_color', '#959595');

	if ($amartha_paragraphs_color && $amartha_paragraphs_color != '#959595') {
        // Color
 		$amartha_color_output[] = implode(',', [
            'body',
            'select',
            '.woocommerce .star-rating::before',
            '.woocommerce table tr.shipping td label',
            '.woocommerce table tr.shipping td label span',
            '.l-woocommerce-wrapper .l-woocommerce-wrapper__products-holder.l-woocommerce-wrapper__products-holder--meta-outside .o-neuron-hover .o-neuron-hover__body .o-neuron-hover__body-meta .o-neuron-hover__body-meta__price',
            '.l-primary-footer.l-primary-footer--light-skin .l-primary-footer__copyright .l-primary-footer__copyright__space .l-primary-footer__copyright__social-media ul li a',
            '.l-primary-footer--dark-skin .widget select',
            '.l-primary-footer--dark-skin .widget input',
            '.l-primary-footer--dark-skin .widget textarea',
            '.o-slidingbar__content--dark-skin .widget select',
            '.o-slidingbar__content--dark-skin .widget input',
            '.o-slidingbar__content--dark-skin .widget textarea',
            '.widget.widget_rss ul li',
            '.widget ul li',
            '.m-team.m-team--meta-outside .m-team__member .m-team__member__content .m-team__member__content__subtitle',
            '.woocommerce-info',
            '.woocommerce-message',
            '.woocommerce-error',
            '.woocommerce .o-product .m-product-summary .quantity input',
            '.o-breadcrumb .o-breadcrumb__list .o-breadcrumb__list__item',
            '.o-hero .o-hero__content .o-hero__content__subtitle',
            '.o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__cart-list__item__meta .quantity',
            '.o-post-navigation .o-post-navigation__link a .o-post-navigation__text-icon .o-post-navigation__subtitle',
            '.l-portfolio-wrapper .l-portfolio-wrapper__items-holder.l-portfolio-wrapper__items-holder--meta-outside .o-portfolio-item .o-portfolio-item__content .a-separator ul li a',
            '.p-portfolio-single .p-portfolio-single__content .p-portfolio-single__content__meta .meta-subtitle',
            '.woocommerce-checkout .woocommerce-checkout-review-order table tr td strong',
            '.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li a svg',
			'.woocommerce ul.order_details li',
			'#add_payment_method #payment div.payment_box p',
			'.woocommerce-cart #payment div.payment_box p',
			'.woocommerce-checkout #payment div.payment_box p',
			'.t-404 .o-hero .o-hero__content .o-hero__content__subtitle h5',
			'.select2-container .select2-dropdown .select2-results .select2-results__options .select2-results__option'
        ]) . '{ color: '. $amartha_paragraphs_color .'}';

        // Placeholder Color
        $amartha_color_output[] = implode(',', [
            'input::-webkit-input-placeholder',
            'textarea::-webkit-input-placeholder', 
            'input:-moz-placeholder',
            'textarea:-moz-placeholder', 
            'input::-moz-placeholder',
            'textarea::-moz-placeholder',
            'input:-ms-input-placeholder',
            'textarea:-ms-input-placeholder'
        ]) . '{ color: '. $amartha_paragraphs_color .' }';
        
        // Border Color Lighten (38%)
        $amartha_color_output[] = implode(',', [
			'table',
            'table td',
			'table th',
			'.woocommerce-checkout .woocommerce-checkout-review-order .woocommerce-checkout-payment',
			'#add_payment_method #payment ul.payment_methods, .woocommerce-cart #payment ul.payment_methods',
			'.woocommerce-checkout #payment ul.payment_methods'
		]) . '{ border-color: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_paragraphs_color)), 38) .') !important}';
	}

	/**
	 * Border
	 */
	$amartha_border_color = get_theme_mod('style_border_color', '#ededed');

	if ($amartha_border_color && ($amartha_border_color != '#ededed' && $amartha_border_color != '#EDEDED')) {
        // Color
        $amartha_color_output[] = implode(',', [
            'fieldset',
            'fieldset legend',
            'select',
            '.select2 .selection .select2-selection .select2-selection__rendered .select2-selection__choice',
            '.select2-container .select2-dropdown .select2-search input',
            '.tagcloud a',
            'hr',
            '#add_payment_method #payment div.payment_box',
            '.woocommerce-cart #payment div.payment_box',
            '.woocommerce-checkout #payment div.payment_box',
            '.l-primary-footer.l-primary-footer--light-skin .l-primary-footer__widgets .l-primary-footer__widgets__space',
            '.l-primary-header--sticky .headroom.headroom--not-top',
            '.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form .m-site-search__form__icon span',
            '.l-primary-footer--dark-skin .widget .widgettitle-wrapper hr',
            '.o-slidingbar__content--dark-skin .widget .widgettitle-wrapper hr',
            '.woocommerce form .form-row.woocommerce-validated input.input-text',
            '.woocommerce form.login',
            '.woocommerce form.register',
            '.woocommerce .o-product .m-product-summary .product_meta',
            '.woocommerce .o-product .woocommerce-tabs .woocommerce-Tabs-panel',
            '.o-breadcrumb',
            '.o-comments .o-comments__area .o-comment .o-comment__avatar img',
            '.o-comments .o-comments__area .comment-respond',
            '.o-pagination',
            '.o-pagination.o-pagination--pages .o-pagination--pages__numbers a span',
            '.o-post-navigation',
            '.l-blog-wrapper .l-blog-wrapper__posts-holder.l-blog-wrapper__posts-holder--meta-outside .o-blog-post',
            '.woocommerce .woocommerce-cart-form table .actions .coupon #coupon_code',
            '.woocommerce-checkout .woocommerce-checkout-review-order .woocommerce-checkout-payment',
            '.woocommerce-account .woocommerce .woocommerce-MyAccount-navigation ul li',
            '.woocommerce ul.order_details',
            '.woocommerce ul.order_details li'
        ]) . '{ border-color: '. $amartha_border_color .'}'; 

        // Border Color Important
        $amartha_color_output[] = implode(',', [
            '.o-comments__area',
            '.select2 .selection .select2-selection',
            '.woocommerce .o-product .woocommerce-tabs .woocommerce-Tabs-panel .woocommerce-Reviews #comments .commentlist .comment .comment_container img.avatar',
            '.o-mini-cart__total-holder .o-mini-cart__total-holder__total',
            '.woocommerce-checkout .checkout_coupon',
            '.woocommerce-checkout .woocommerce-checkout-review-order .woocommerce-checkout-payment .wc_payment_methods'
        ]) . '{ border-color: '. $amartha_border_color .' !important}'; 

        // Border Color Darken (3%)
        $amartha_color_output[] = implode(',', [
            'input',
            'textarea'
        ]) . '{ border-color: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_border_color)), -3) .')}';
        
        // Border Color Darken (6%)
        $amartha_color_output[] = implode(',', [
            '.o-pagination.o-pagination--pages .o-pagination--pages__numbers span',
            '.o-pagination.o-pagination--pages .o-pagination--pages__numbers a:hover span'
        ]) . '{ border-color: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_border_color)), -6) .')}';
        
        // Background Color
        $amartha_color_output[] = implode(',', [
            '.ui-slider',
            '.o-pagination ul.o-pagination__numbers li.active a'
        ]) . '{ background-color: '. $amartha_border_color .'}'; 
	}	

	/**
	 * Pattern
	 */
	$amartha_pattern_color = get_theme_mod('style_pattern_color', '#f6f6f6');

	if ($amartha_pattern_color && ($amartha_pattern_color != '#f6f6f6' && $amartha_pattern_color != '#F6F6F6')) {
        // Background Color
        $amartha_color_output[] = implode(',', [
            '.select2 .selection .select2-selection .select2-selection__rendered .select2-selection__choice',
            '.select2-container .select2-dropdown .select2-results .select2-results__options .select2-results__option[data-selected=true]',
            '.tagcloud a',
			'code',
			'pre',
            '#add_payment_method #payment div.payment_box',
            '.woocommerce-cart #payment div.payment_box',
            '.woocommerce-checkout #payment div.payment_box',
            '.l-primary-footer.l-primary-footer--light-skin',
            '.m-progress-bar .m-progress-bar__content-holder',
            '.m-site-search .m-site-search__content .m-site-search__content__inner .m-site-search__form .m-site-search__form__icon span',
            '.woocommerce-info',
            '.woocommerce-message',
            '.woocommerce-error',
            '.o-breadcrumb',
            '.o-comments .o-comments__area',
            '.o-hero',
            '.o-pagination',
            '.o-pagination.o-pagination--pages .o-pagination--pages__numbers a span',
            '.o-post-navigation',
            '.woocommerce-checkout .woocommerce-checkout-review-order .woocommerce-checkout-payment .place-order'
        ]) . '{ background-color: '. $amartha_pattern_color .'}'; 

        // Background Color Darken (3%)
        $amartha_color_output[] = implode(',', [
            '.tagcloud a:hover'
        ]) . '{ background-color: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_pattern_color)), -3) .')}';

        // Background Color Darken (6%)
        $amartha_color_output[] = implode(',', [
            '.o-pagination.o-pagination--pages .o-pagination--pages__numbers span',
            '.o-pagination.o-pagination--pages .o-pagination--pages__numbers a:hover span'
        ]) . '{ background-color: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_pattern_color)), -6) .')}';
    }	
    
    /**
     * Warnings
     */
	$amartha_warnings_color = get_theme_mod('style_warnings_color', '#c7004c');

	if ($amartha_warnings_color && ($amartha_warnings_color != '#c7004c' && $amartha_warnings_color != '#C7004C')) {
        // Color
        $amartha_color_output[] = implode(',', [
            '.a-woo-badge.a-woo-badge--red-color',
            '.woocommerce form .form-row .required',
			'.woocommerce .o-product .m-product-summary p.stock.out-of-stock',
			'.widget.widget_layered_nav_filters ul li a::before',
			'.woocommerce form .form-row.woocommerce-invalid label'
        ]) . '{ color: '. $amartha_warnings_color .'}'; 
        
        
        // Border Color
        $amartha_color_output[] = implode(',', [
            '.woocommerce form .form-row.woocommerce-invalid input.input-text',
            '.woocommerce-error'
        ]) . '{ border-color: '. $amartha_warnings_color .'}'; 
	}
	
	/**
	 * Light
	 */
	$amartha_light_color = get_theme_mod('style_light_color', '#FFFFFF');

	if ($amartha_light_color && ($amartha_light_color != '#FFFFFF' && $amartha_light_color != '#ffffff')) {
		// Color
		$amartha_color_output[] = implode(',', [
			'.l-blog-wrapper .l-blog-wrapper__posts-holder.l-blog-wrapper__posts-holder--meta-inside .o-blog-post .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body__inner .o-neuron-hover-holder__body-meta .o-neuron-hover-holder__body-meta__title a',
			'.l-primary-footer .l-primary-footer__copyright .l-primary-footer__copyright__space .l-primary-footer__copyright__social-media ul li a',
			'.l-primary-header.l-primary-header--light-skin .a-logo.a-logo--text a',
			'.l-primary-header.l-primary-header--responsive .m-nav-menu--mobile nav ul.menu li.menu-item a',
			'.l-primary-header.l-primary-header--responsive .m-nav-menu--mobile nav ul.menu li.menu-item.menu-item-has-children .menu-item-icon svg',
			'.l-woocommerce-wrapper .l-woocommerce-wrapper__product .o-neuron-hover-holder .o-neuron-hover-holder__button',
			'.l-woocommerce-wrapper .l-woocommerce-wrapper__products-holder.l-woocommerce-wrapper__products-holder--meta-inside .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta .o-neuron-hover-holder__body-meta__title a',
			'.m-nav-menu--horizontal ul.menu li.menu-item.menu-item-has-children > ul.sub-menu li.menu-item.menu-item-has-children:after',
			'.o-slidingbar__content--dark-skin .widget',
			'.m-team .m-team__member .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body__inner .o-neuron-hover-holder__body-meta ul.o-neuron-hover-holder__body-meta__social-media li a',
			'.m-team.m-team--meta-inside .m-team__member .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta .o-neuron-hover__body-meta__title',
			'.m-team.m-team--meta-inside .m-team__member .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta .o-neuron-hover-holder__body-meta__social-media ul li a',
			'.m-team.m-team--meta-outside .m-team__member .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta .o-neuron-hover-holder__body-meta__social-media ul li a',
			'.l-primary-header__bag .l-primary-header__bag__icon span',
			'.o-mini-cart .widget_shopping_cart_content .o-mini-cart__no-products p',
			'.o-mini-cart .o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__cart-list__item__meta .title a',
			'.o-mini-cart .o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__item__remove',
			'.o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__total .subtotal',
			'.o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__total .price .amount',
			'.o-slidingbar .o-slidingbar__content.o-slidingbar__content--dark-skin .o-slidingbar__content__holder .o-slidingbar__close-icon svg',
			'.l-woocommerce-wrapper .l-woocommerce-wrapper__products-holder.l-woocommerce-wrapper__products-holder--meta-inside .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta .o-neuron-hover-holder__body-meta__title a',
			'.l-portfolio-wrapper .l-portfolio-wrapper__items-holder.l-portfolio-wrapper__items-holder--meta-inside .o-portfolio-item .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body__inner .o-neuron-hover-holder__body-meta .o-neuron-hover-holder__body-meta__title a',
			'.a-button.a-button--dark-color'
		]) . '{ color: '. $amartha_light_color .'}'; 
		
		// Color Important
		$amartha_color_output[] = implode(',', [
			'woocommerce .button',
			'.woocommerce .o-main-sidebar input[type=submit]',
			'.woocommerce .o-main-sidebar button',
			'.woocommerce .o-main-sidebar .button',
			'.o-mini-cart__total-holder .o-mini-cart__total-holder__buttons .button',
			'.m-nav-menu--horizontal ul.menu li.menu-item.menu-item-has-children > ul.sub-menu li.menu-item a'
		]) . '{ color: '. $amartha_light_color .' !important}';
		
		// Color Darken (20%)
        $amartha_color_output[] = implode(',', [
			'.o-mini-cart .o-mini-cart__holder .o-mini-cart__holder__cart-list .o-mini-cart__holder__cart-list__item .o-mini-cart__holder__cart-list__item__meta .quantity'
		]) . '{ color: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_light_color)), -20) .')}';

		// Color Lighten (3%)
        $amartha_color_output[] = implode(',', [
			'.m-team.m-team--meta-inside .m-team__member .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta .o-neuron-hover__body-meta__subtitle'
		]) . '{ color: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_light_color)), 10) .')}';

		// Background Color
        $amartha_color_output[] = implode(',', [
			'.a-button.a-button--white-color',
			'.a-button.a-button--white-color:hover',
			'.select2-results__options'
        ]) . '{ background-color: '. $amartha_light_color .'}';

		// Color Darken (3%)
        $amartha_color_output[] = implode(',', [
			'.l-woocommerce-wrapper .l-woocommerce-wrapper__products-holder.l-woocommerce-wrapper__products-holder--meta-inside .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta .o-neuron-hover-holder__body-meta__price',
			'.l-blog-wrapper .l-blog-wrapper__posts-holder.l-blog-wrapper__posts-holder--meta-inside .o-blog-post .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body__inner .o-neuron-hover-holder__body-meta .o-blog-post__meta .a-separator ul li a',
			'.l-portfolio-wrapper .l-portfolio-wrapper__items-holder.l-portfolio-wrapper__items-holder--meta-inside .o-portfolio-item .o-neuron-hover .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body__inner .o-neuron-hover-holder__body-meta .a-separator ul li a'
        ]) . '{ color: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_light_color)), -3) .')}';
		
		// Stroke
		$amartha_color_output[] = implode(',', [
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__icons svg',
			'.l-primary-header.l-primary-header--responsive.l-primary-header--light-skin .m-nav-menu--mobile-icon svg line',
			'.l-woocommerce-wrapper .l-woocommerce-wrapper__product .o-neuron-hover-holder .o-neuron-hover-holder__button svg',
			'.o-neuron-hover.o-neuron-hover--icon .o-neuron-hover-holder .o-neuron-hover-holder__body .o-neuron-hover-holder__body-meta svg'
		]) . '{ stroke: '. $amartha_light_color .'}'; 

		// Background Color
		$amartha_color_output[] = implode(',', [
			'select',
			'.l-primary-header',
			'.l-primary-header--sticky .headroom',
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart',
			'.m-site-loader',
			'.m-site-search .m-site-search__content',
			'.o-comments .o-comments__area .comment-respond',
			'.o-slidingbar .o-slidingbar__content'
		]) . '{ background-color: '. $amartha_light_color .'}'; 

		// Background Color Important
		$amartha_color_output[] = implode(',', [
			'.ui-slider-handle',
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .o-mini-cart__holder .blockUI.blockOverlay',
			'.l-primary-header.l-primary-header--light-skin .l-primary-header__bag .o-mini-cart .o-mini-cart__holder .loader',
			'.l-primary-header .l-primary-header__bag .o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__buttons .button',
			'.woocommerce .blockUI.blockOverlay',
			'.woocommerce .loader',
			'.o-mini-cart__holder .blockUI.blockOverlay',
			'.o-mini-cart__holder .loader',
			'.o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__buttons .button'
		]) . '{ background-color: '. $amartha_light_color .' !important}'; 

		// Background Color Darken (5%) Important
        $amartha_color_output[] = implode(',', [
			'.o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__buttons .button:hover'
		]) . '{ background-color: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_light_color)), -5) .') !important}';

		// Border Darken (70%) Important
        $amartha_color_output[] = implode(',', [
			'.o-mini-cart .o-mini-cart__total-holder .o-mini-cart__total-holder__total'
		]) . '{ border-color: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_light_color)), -70) .') !important}';

		// Border Darken (70%)
        $amartha_color_output[] = implode(',', [
			'.m-mega-menu > ul.sub-menu > .menu-item'
		]) . '{ border-color: hsl('. neuron_color_lightness(explode(', ', neuron_hexToRgb($amartha_light_color)), -70) .')}';

		// Border Top Color
		$amartha_color_output[] = implode(',', [
			'.mfp-zoom-in.mfp-ready .mfp-preloader'
		]) . '{ border-top-color: '. $amartha_light_color .'}'; 	
		
	}

	return $amartha_color_output ? implode(' ', $amartha_color_output) : '';
}
