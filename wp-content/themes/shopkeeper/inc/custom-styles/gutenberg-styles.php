<?php

if ( !function_exists ('shopkeeper_custom_gutenberg_styles') ) {
	function shopkeeper_custom_gutenberg_styles() {

		global $shopkeeper_theme_options, $default_fonts;

		ob_start();	

		?>

		<style>

			.wp-block-media-text .wp-block-media-text__content p,
			p.has-drop-cap:first-letter,
			.wp-block-latest-posts a,
			.wp-block-button,
			.wp-block-cover .wp-block-cover-text,
			.wp-block-subhead,
			.wp-block-image	figcaption,
			.wp-block-quote p,
			.wp-block-quote cite,
			.wp-block-quote .editor-rich-text,
			.wp-block-pullquote p,
			.wp-block-pullquote cite,
			.wp-block-pullquote .editor-rich-text,
			.gbt_18_sk_latest_posts_title,
			.gbt_18_sk_editor_banner_title,
			.gbt_18_sk_editor_slide_title_input,
			.gbt_18_sk_editor_slide_button_input,
			.gbt_18_sk_categories_grid .gbt_18_sk_category_name,
			.gbt_18_sk_categories_grid .gbt_18_sk_category_count,
			.gbt_18_sk_slider_wrapper .gbt_18_sk_slide_button,
			.gbt_18_sk_posts_grid .gbt_18_sk_posts_grid_title,
			.gbt_18_sk_editor_portfolio_item_title,
			.editor-post-title .editor-post-title__input,
			.wc-products-block-preview .product-title,
			.wc-products-block-preview .product-add-to-cart,
			.wc-block-products-category .wc-product-preview__title,
			.wc-block-products-category .wc-product-preview__add-to-cart
			{ 
				font-family: 
				<?php 
					if (isset($shopkeeper_theme_options['new_main_font']['font-family'])):
						if (!in_array($shopkeeper_theme_options['new_main_font']['font-family'], $default_fonts)): ?>
							<?php echo '\'' . $shopkeeper_theme_options['new_main_font']['font-family'] . '\','; ?> 
							sans-serif;
						<?php else: ?>
							<?php echo esc_html( $shopkeeper_theme_options['new_main_font']['font-family'] ); ?>;
						<?php endif; ?>
					<?php else: ?>
						NeueEinstellung;
					<?php endif; ?>
			}

			.gbt_18_sk_editor_banner_subtitle,
			.gbt_18_sk_editor_slide_description_input
			{
				font-family: 
				<?php if (isset($shopkeeper_theme_options['new_secondary_font']['font-family'])): ?>
					<?php if (!in_array($shopkeeper_theme_options['new_secondary_font']['font-family'], $default_fonts)): ?>
						<?php echo '\'' . $shopkeeper_theme_options['new_secondary_font']['font-family'] . '\','; ?> 
						sans-serif;
					<?php else: ?>
						<?php echo esc_html( $shopkeeper_theme_options['new_secondary_font']['font-family'] .', sans-serif' ); ?>;
					<?php endif; ?>
				<?php else: ?>
					'Radnika';
				<?php endif; ?>
			}

			.gbt_18_sk_latest_posts_title,
			.wp-block-quote p,
			.wp-block-pullquote p,
			.wp-block-quote cite,
			.wp-block-pullquote cite,
			.wp-block-media-text p
			{
				color: <?php echo esc_html($shopkeeper_theme_options['headings_color']); ?>;
			}

			.gbt_18_sk_latest_posts_title:hover,
			.gbt_18_sk_posts_grid_title
			{
				color: <?php echo esc_html($shopkeeper_theme_options['main_color']); ?>;
			}

			.wp-block-latest-posts__post-date,
			.wp-block-gallery .blocks-gallery-item figcaption,
			.wp-block-audio figcaption,
			.wp-block-image figcaption,
			.wp-block-video figcaption
			{
				color: <?php echo esc_html($shopkeeper_theme_options['body_color']); ?>;
			}

			.wp-block-quote:not(.is-large):not(.is-style-large),
			.wp-block-quote
			{
				border-left-color: <?php echo esc_html($shopkeeper_theme_options['headings_color']); ?>;
			}

			.wp-block-pullquote
			{
				border-top-color: <?php echo esc_html($shopkeeper_theme_options['headings_color']); ?>;
				border-bottom-color: <?php echo esc_html($shopkeeper_theme_options['headings_color']); ?>;
			}

			.gbt_18_sk_latest_posts_item_link:hover .gbt_18_sk_latest_posts_img_overlay
			{
				background: <?php echo esc_html($shopkeeper_theme_options['main_color']) ?>;
			}

			<?php 

				if (!empty($shopkeeper_theme_options['headings_font_size'])): 

					$mobile_base_size = 13;
					$headings_base_size = $shopkeeper_theme_options['headings_font_size'];
					$h0_size = $headings_base_size * 3.157;
					$h0_size_mobile = $mobile_base_size * 3.157;

					?> 

					p.has-drop-cap:first-letter
					{
						font-size: <?php echo esc_html( $h0_size_mobile ); ?>px !important;
					}

					@media only screen and (min-width: 768px) {

						p.has-drop-cap:first-letter
						{
							font-size: <?php echo esc_html( $h0_size ); ?>px !important; 
						}
					}
			<?php 

				endif;

			?>

		</style>

		<?php

		$content = ob_get_clean();
		$content = str_replace(array("\r\n", "\r"), "\n", $content);
		$lines = explode("\n", $content);
		$new_lines = array();
		foreach ($lines as $i => $line) { if(!empty($line)) $new_lines[] = trim($line); }

		return implode($new_lines);
	}
}

if ( !function_exists ('shopkeeper_custom_gutenberg_editor_styles') ) {
	function shopkeeper_custom_gutenberg_editor_styles() {

		global $shopkeeper_theme_options, $default_fonts;

		ob_start();	

		?>

		<style>

			.edit-post-visual-editor .wp-block h1,
			.edit-post-visual-editor .wp-block h2,
			.edit-post-visual-editor .wp-block h3,
			.edit-post-visual-editor .wp-block h4,
			.edit-post-visual-editor .wp-block h5,
			.edit-post-visual-editor .wp-block h6,
			.edit-post-visual-editor .wp-block label,
			.edit-post-visual-editor .wp-block table thead tr th,
			.edit-post-visual-editor .wp-block input[type="reset"],
			.edit-post-visual-editor .wp-block input[type="submit"],
			.wp-block-latest-posts a,
			.wp-block-button,
			.wp-block-cover .wp-block-cover-text,
			.wp-block-subhead,
			.wp-block-image	figcaption,
			.wp-block .wp-block-pullquote .editor-rich-text p,
			.wp-block .wp-block-quote .editor-rich-text p,
			.wp-block .wp-block-pullquote .wp-block-pullquote__citation,
			.wp-block .wp-block-quote .wp-block-quote__citation,
			.gbt_18_sk_latest_posts_title,
			.gbt_18_sk_editor_banner_title,
			.gbt_18_sk_editor_slide_title_input,
			.gbt_18_sk_editor_slide_button_input,
			.gbt_18_sk_categories_grid .gbt_18_sk_category_name,
			.gbt_18_sk_categories_grid .gbt_18_sk_category_count,
			.gbt_18_sk_slider_wrapper .gbt_18_sk_slide_button,
			.gbt_18_sk_posts_grid .gbt_18_sk_posts_grid_title,
			.gbt_18_sk_editor_portfolio_item_title,
			.editor-post-title .editor-post-title__input,
			.wc-products-block-preview .product-title,
			.wc-products-block-preview .product-add-to-cart,
			.wc-block-products-category .wc-product-preview__title,
			.wc-block-products-category .wc-product-preview__add-to-cart,
			.wp-block-media-text .editor-inner-blocks .editor-rich-text p,
			.edit-post-visual-editor p.has-drop-cap:first-letter
			{ 
				font-family: 
				<?php 
					if (isset($shopkeeper_theme_options['new_main_font']['font-family'])):
						if (!in_array($shopkeeper_theme_options['new_main_font']['font-family'], $default_fonts)): ?>
							<?php echo '\'' . $shopkeeper_theme_options['new_main_font']['font-family'] . '\','; ?> 
							sans-serif;
						<?php else: ?>
							<?php echo esc_html( $shopkeeper_theme_options['new_main_font']['font-family'] ); ?>;
						<?php endif; ?>
					<?php else: ?>
						NeueEinstellung;
					<?php endif; ?>
			}

			.edit-post-visual-editor .wp-block p,
			.edit-post-visual-editor .wp-block textarea:not(.editor-post-title__input),
			.gbt_18_sk_editor_banner_subtitle,
			.gbt_18_sk_editor_slide_description_input,
			.edit-post-visual-editor .wp-block select
			{
				font-family: 
				<?php if (isset($shopkeeper_theme_options['new_secondary_font']['font-family'])): ?>
					<?php if (!in_array($shopkeeper_theme_options['new_secondary_font']['font-family'], $default_fonts)): ?>
						<?php echo '\'' . $shopkeeper_theme_options['new_secondary_font']['font-family'] . '\','; ?> 
						sans-serif;
					<?php else: ?>
						<?php echo esc_html( $shopkeeper_theme_options['new_secondary_font']['font-family'] .', sans-serif' ); ?>;
					<?php endif; ?>
				<?php else: ?>
					'Radnika';
				<?php endif; ?>
			}

			.edit-post-visual-editor .wp-block input,
			.editor-styles-wrapper .wp-block 
			{
				font-family: 
				<?php if (isset($shopkeeper_theme_options['new_secondary_font']['font-family'])): ?>
					<?php if (!in_array($shopkeeper_theme_options['new_secondary_font']['font-family'], $default_fonts)): ?>
						<?php echo '\'' . $shopkeeper_theme_options['new_secondary_font']['font-family'] . '\','; ?> 
						sans-serif !important;
					<?php else: ?>
						<?php echo esc_html( $shopkeeper_theme_options['new_secondary_font']['font-family'] .', sans-serif' ); ?> !important;
					<?php endif; ?>
				<?php else: ?>
					'Radnika' !important;
				<?php endif; ?>
			}

			.wp-block input[type="radio"]:after,
			.wp-block .input-radio:after,
			.wp-block input[type="checkbox"]:after,
			.wp-block .input-checkbox:after
			{
				border: 2px solid rgba(<?php echo getbowtied_hex2rgb($shopkeeper_theme_options['body_color']); ?>,0.8);
			}

			.wp-block input[type="radio"]:checked:after,
			.wp-block .input-radio:checked:after,
			.wp-block input[type="checkbox"]:checked:after,
			.wp-block .input-checkbox:checked:after
			{
				border-color: <?php echo esc_html($shopkeeper_theme_options['main_color']) ?> !important;
			}

			.wp-block input[type="checkbox"]:checked:after,
			.wp-block .input-checkbox:checked:after
			{
				background-color: <?php echo esc_html($shopkeeper_theme_options['main_color']) ?>;
			}

			.wp-block input[type="radio"]:checked:before,
			.wp-block .input-radio:checked:before
			{
				background-color: <?php echo esc_html($shopkeeper_theme_options['main_color']) ?> !important;
			}

			.wp-block input,
			.wp-block textarea:not(.editor-post-title__input),
			.wp-block select
			{
				border-color: rgba(<?php echo getbowtied_hex2rgb($shopkeeper_theme_options['body_color']); ?>,0.1) !important;
			}

			.edit-post-visual-editor,
			.edit-post-visual-editor .wp-block
			{
				background-color:<?php echo esc_html($shopkeeper_theme_options['main_background']['background-color']); ?>;
			}

			.gbt_18_sk_latest_posts_title,
			.edit-post-visual-editor .wp-block-quote p,
			.edit-post-visual-editor .wp-block-pullquote p,
			.edit-post-visual-editor .wp-block-pullquote__citation,
			.wp-block-media-text .editor-inner-blocks .editor-rich-text p
			{
				color: <?php echo esc_html($shopkeeper_theme_options['headings_color']); ?>;
			}

			.gbt_18_sk_latest_posts_title:hover,
			.edit-post-visual-editor .wp-block-latest-posts a,
			.edit-post-visual-editor .wp-block-archives a,
			.edit-post-visual-editor .wp-block-categories a,
			.gbt_18_sk_posts_grid_title
			{
				color: <?php echo esc_html($shopkeeper_theme_options['main_color']); ?>;
			}

			.editor-styles-wrapper,
			.edit-post-visual-editor,
			.edit-post-visual-editor .wp-block-quote__citation,
			.edit-post-visual-editor .wp-block p,
			.edit-post-visual-editor .wp-block table tr th,
			.edit-post-visual-editor .wp-block table tr td,
			.edit-post-visual-editor .wp-block table thead tr th,
			.edit-post-visual-editor .wp-block pre,
			.edit-post-visual-editor .wp-block li,
			.edit-post-visual-editor .wp-block label,
			.wp-block-latest-posts__post-date,
			.wp-block-gallery .blocks-gallery-item figcaption,
			.wp-block-audio figcaption,
			.wp-block-image figcaption,
			.wp-block-video figcaption
			{
				color: <?php echo esc_html($shopkeeper_theme_options['body_color']); ?>;
			}

			.editor-post-title__block .editor-post-title__input,
			.edit-post-visual-editor .wp-block blockquote:not(.has-text-color) p,
			.edit-post-visual-editor .wp-block h1,
			.edit-post-visual-editor .wp-block h2,
			.edit-post-visual-editor .wp-block h3,
			.edit-post-visual-editor .wp-block h4,
			.edit-post-visual-editor .wp-block h5,
			.edit-post-visual-editor .wp-block h6
			{
				color: <?php echo esc_html($shopkeeper_theme_options['headings_color']); ?>;
			}

			.wp-block-quote:not(.is-large):not(.is-style-large),
			.wp-block-quote
			{
				border-left-color: <?php echo esc_html($shopkeeper_theme_options['headings_color']); ?>;
			}

			.wp-block-pullquote
			{
				border-top-color: <?php echo esc_html($shopkeeper_theme_options['headings_color']); ?>;
				border-bottom-color: <?php echo esc_html($shopkeeper_theme_options['headings_color']); ?>;
			}

			.gbt_18_sk_latest_posts_item_link:hover .gbt_18_sk_latest_posts_img_overlay
			{
				background: <?php echo esc_html($shopkeeper_theme_options['main_color']) ?>;
			}

			<?php 

				if (!empty($shopkeeper_theme_options['body_font_size'])): 

					$body_base_size = $shopkeeper_theme_options['body_font_size'];

					?> 

					@media only screen and (min-width: 1025px) { 
						.editor-styles-wrapper .wp-block p,
						.editor-styles-wrapper .wp-block ul li ul,
						.editor-styles-wrapper .wp-block ul li ol,
						.editor-styles-wrapper .wp-block ul, 
						.editor-styles-wrapper .wp-block ol, 
						.editor-styles-wrapper .wp-block dl
						{ font-size: <?php echo esc_html( $body_base_size ); ?>px; }
					}
			<?php 

				endif;

			?>

			<?php 

				if (!empty($shopkeeper_theme_options['headings_font_size'])): 

					$headings_base_size = $shopkeeper_theme_options['headings_font_size'];
					$h0_size = $headings_base_size * 3.157;
					$h1_size = $headings_base_size * 2.369;
					$h2_size = $headings_base_size * 1.777; 
					$h3_size = $headings_base_size * 1.333; 
					$h4_size = $headings_base_size * 1; 
					$h5_size = $headings_base_size * 0.75; 
					$mobile_base_size = 13;
					$h0_size_mobile = $mobile_base_size * 3.157;
					$h1_size_mobile = $mobile_base_size * 2.369;
					$h2_size_mobile = $mobile_base_size * 1.777; 
					$h3_size_mobile = $mobile_base_size * 1.333; 
					$h4_size_mobile = $mobile_base_size * 1; 
					$h5_size_mobile = $mobile_base_size * 0.75; 

					?> 

					.edit-post-visual-editor .wp-block h1 { font-size: <?php echo esc_html( $h1_size_mobile ); ?>px; }
					.edit-post-visual-editor .wp-block h2 { font-size: <?php echo esc_html( $h2_size_mobile ); ?>px; }
					.edit-post-visual-editor .wp-block h3 { font-size: <?php echo esc_html( $h3_size_mobile ); ?>px; } 
					.edit-post-visual-editor .wp-block h4 { font-size: <?php echo esc_html( $h4_size_mobile ); ?>px; }
					.edit-post-visual-editor .wp-block h5 { font-size: <?php echo esc_html( $h5_size_mobile ); ?>px; }

					.edit-post-visual-editor .wp-block p.has-drop-cap:first-letter,
					.editor-post-title__input
					{
						font-size: <?php echo esc_html( $h0_size_mobile ); ?>px !important;
					}

					@media only screen and (min-width: 768px) {

						.edit-post-visual-editor .wp-block h1 { font-size: <?php echo esc_html( $h1_size ); ?>px; }
						.edit-post-visual-editor .wp-block h2 { font-size: <?php echo esc_html( $h2_size ); ?>px; }
						.edit-post-visual-editor .wp-block h3 { font-size: <?php echo esc_html( $h3_size ); ?>px; } 
						.edit-post-visual-editor .wp-block h4 { font-size: <?php echo esc_html( $h4_size ); ?>px; }
						.edit-post-visual-editor .wp-block h5 { font-size: <?php echo esc_html( $h5_size ); ?>px; }

						.edit-post-visual-editor .wp-block p.has-drop-cap:first-letter,
						.editor-post-title__input
						{
							font-size: <?php echo esc_html( $h0_size ); ?>px !important; 
						}
					}
			<?php 

				endif;

			?>

		</style>

		<?php

		$content = ob_get_clean();
		$content = str_replace(array("\r\n", "\r"), "\n", $content);
		$lines = explode("\n", $content);
		$new_lines = array();
		foreach ($lines as $i => $line) { if(!empty($line)) $new_lines[] = trim($line); }

		return implode($new_lines);
	}
}

if ( !function_exists ('shopkeeper_custom_gbt_styles') ) {
	function shopkeeper_custom_gbt_styles() {
		echo shopkeeper_custom_gutenberg_styles();
	}
}

if ( !function_exists ('shopkeeper_custom_gbt_editor_styles') ) {
	function shopkeeper_custom_gbt_editor_styles() {
		global $current_screen;

		$current_screen = get_current_screen();
		if ( method_exists($current_screen, 'is_block_editor') && $current_screen->is_block_editor() ) {
			echo shopkeeper_custom_gutenberg_editor_styles();
		}
	}
}

add_action( 'wp_head', 'shopkeeper_custom_gbt_styles', 100 );
add_action( 'admin_head', 'shopkeeper_custom_gbt_editor_styles', 200 );

?>