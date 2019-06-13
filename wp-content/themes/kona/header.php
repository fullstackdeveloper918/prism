<!doctype html>
<html <?php language_attributes(); ?>>
<head>

<!-- DEFAULT META TAGS -->
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<?php kona_get_social_metas(); ?>
<?php wp_head(); ?>
</head>

<?php $theId = kona_getId(); ?>
<body <?php body_class(); # body classes are added via theme-general-features ?>>

<?php if (get_option('_sr_preloader') || (!get_option('_sr_optiontree') && !get_option('_sr_preloader'))) { ?>
<!-- PAGE LOADER -->
<div id="page-loader">
	<span class="loader-icon"></span>
</div>
<!-- PAGE LOADER -->
<?php } ?>

<!-- PAGE CONTENT -->
<div id="page-content">
	
	<?php
		/* HEADER + MENU SETTINGS */
		$classHeader = ''; 
		$classHeaderInner = ''; 
		if (get_option('_sr_headerbehaviour')) { $classHeader .= get_option('_sr_headerbehaviour'); }
		if (get_option('_sr_headerbreakpoint')) { $classHeader .= " ".get_option('_sr_headerbreakpoint'); }
		if (get_option('_sr_headerappearance')) { $classHeader .= " ".get_option('_sr_headerappearance'); } else { $classHeader .= " logo-left-menu-right"; }
		if (get_option('_sr_headerbar')) { $classHeader .= ' has-header-bar'; }
	
		$heroappearance = get_post_meta($theId, '_sr_heroappearance', true);
		$heroType = get_post_meta($theId, '_sr_herobackground', true);
		$heroTextColor = get_post_meta($theId, '_sr_herotextcolor', true);
		if ($heroType !== 'default' && $heroType !== 'slider' && ($heroappearance == 'hero-fullwidth' || $heroappearance == 'hero-fullscreen')) {
			if ($heroTextColor == 'text-light') $classHeaderInner .= " header-light"; 
		}
		if ($heroType == 'slider' && get_post_meta($theId, '_sr_herosliderappearance', true) == 'hero-fullwidth') {
			$classHeaderInner .= " header-".get_post_meta($theId, '_sr_herosliderheader', true); 
		}
		
		$classLogo = '';
		if (get_option('_sr_logoposition')) { $classLogo = get_option('_sr_logoposition'); }
		
		$classCart = '';
		if (get_option('_sr_shopminicartopen')) { $classCart = "ajax-open"; }
		if (get_option('_sr_shopminicartlink') && !WC()->cart->is_empty()) { $classCart .= " show-cart-link"; }
	?>
	
	<!-- HEADER -->
	<header id="header" class="<?php echo esc_attr($classHeader); ?>">
		
		<?php kona_headerbar(); ?>
		
		<div class="header-inner clearfix wrapper <?php echo esc_attr($classHeaderInner); ?>">
			
            <!-- LOGO -->
            <div id="logo" class="<?php echo esc_attr($classLogo); ?>">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                	<?php kona_get_logo(); ?>
                </a>
            </div>
			
           	<div class="menu-actions">
           		<?php if (class_exists('Woocommerce') && get_option('_sr_shoplogin') ) { 
				$classLogin = ''; 
				if (get_option('_sr_shoploginappearance') == 'icon') { $classLogin = "display-icon"; }
				?>
				<div class="menu-login <?php echo esc_attr($classLogin); ?>">
					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="login-open">
						<span class="text">
						<?php 	if (!is_user_logged_in()) { 
									echo esc_html__("Login", 'kona');
								} else {
									echo esc_html__("My Account", 'kona');
								}
						?>
						</span>
						<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 66.1 69.9">
							<path d="M48,34.9c3.6-3.8,5.5-8.7,5.5-13.9C53.5,9.7,44.3,0.5,33,0.5S12.5,9.7,12.5,21c0,5.1,2,10.1,5.5,13.9
		C7.2,40.7,0.5,52.6,0.5,66c0,1.9,1.6,3.5,3.5,3.5h58c1.9,0,3.5-1.6,3.5-3.5C65.5,52.6,58.8,40.7,48,34.9z M33,7.5
		c7.4,0,13.5,6.1,13.5,13.5c0,4.8-2.5,9.2-6.6,11.6h-0.1l-0.3,0.2c-1.8,1-4.1,1.6-6.5,1.6c-2.2,0-4.3-0.5-6.6-1.7l-0.2,0
		c-4.2-2.3-6.7-6.8-6.7-11.7C19.5,13.6,25.6,7.5,33,7.5z M24.6,39.6c5.3,2.4,11.4,2.4,16.8,0c9,3.1,15.5,12,16.8,22.8H7.9
		C9,51.6,15.6,42.8,24.6,39.6z"/>
						</svg>
					</a>
				</div>
				<?php } ?>
				<?php if (get_option('_sr_headersearch')) { ?>
				<div class="menu-search"><a href="#" class="search-open">
					<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 19.2 19.2">
					<path d="M18.8,17.3l-4.6-4.6c1-1.3,1.6-3,1.6-4.7c0-4.3-3.5-7.8-7.8-7.8c-4.8,0-8.6,4.4-7.6,9.3c0.6,3,3,5.5,6.1,6.1 c2.4,0.5,4.6-0.2,6.3-1.5l4.6,4.6c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3C19.2,18.3,19.2,17.7,18.8,17.3z M2.3,8 c0-3.1,2.6-5.7,5.7-5.7c3.5,0,6.3,3.2,5.6,6.9c-0.5,2.1-2.2,3.9-4.3,4.3C5.6,14.3,2.3,11.5,2.3,8z"/>
					</svg>
				</a></div>
				<?php } ?>
				<?php if (class_exists( 'TInvWL_Public_TInvWL' ) ) { kona_woo_wishlist_menu(); } ?>
				<?php if (class_exists('Woocommerce') && (get_option('_sr_shopminicart') || !get_option('_sr_optiontree')) ) { kona_woo_minicart_menu(); } ?>
			</div> <!-- END .menu-actions -->
           
			<?php if(has_nav_menu('primary-menu')) {  ?>
            <!-- MAIN NAVIGATION -->
            <div id="menu">
                <div id="menu-inner">
                   	<?php if (class_exists('Woocommerce') && get_option('_sr_shoplogin') && get_option('_sr_shoploginappearance') !== 'icon' ) { ?>
					<div class="menu-login">
						<?php if (!is_user_logged_in()) { ?>
						<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="login-open"><?php echo esc_html__("Login", 'kona') ?></a></div>
						<?php } else { ?>
						<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="login-open"><?php echo esc_html__("My Account", 'kona') ?></a></div>
						<?php }  ?>
					<?php } ?>
					<div class="scroll-menu">
						
                    <?php
						$megaTitle = "";
						if (get_option('_sr_megatitle')) { $megaTitle = get_option('_sr_megatitle'); }
						wp_nav_menu( array(  
								'theme_location'  => 'primary-menu', 
								'container'       => 'nav',  			        
								'container_id'    => 'main-nav',  
								'container_class' => $megaTitle,  
								'menu_class'      => '', 
								'menu_id'         => 'primary-menu' ,
								'before'          => '',
								'after'           => '',
								'walker' 		  => new kona_output_walker()
						) );  
					?>
					
					<?php kona_headerbar("mobile"); ?>
					</div>
              	
           			<?php if (function_exists('icl_object_id')) { kona_wpml_switcher(); } ?>                      
               	</div>
               	<?php if(has_nav_menu('primary-menu')) { ?>
				<div class="menu-toggle"><span class="hamburger"></span></div>
				<?php } // END if has_nav_menu ?>
          	</div>
            <?php } // END if has_nav_menu ?>
          	            
			<?php if (class_exists('Woocommerce') && ((get_option('_sr_shopminicart') || !get_option('_sr_optiontree')) && !is_cart())) { ?>
				<div id="mini-cart" class="<?php echo esc_attr($classCart); ?>">
					<h4 class="cart-title"><strong><?php echo esc_html__("Your cart", 'kona') ?></strong>
						<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="sr-button withicon style-4">
							<span class="text">
								<span><?php _e( 'View Cart', 'kona' ); ?></span>
								<span><?php _e( 'View Cart', 'kona' ); ?></span>
							</span>
							<span class="icon">
								<span class="arrow">
									<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 13.2 9">
									<path d="M13.1,4.4c0-0.2-0.1-0.4-0.2-0.5c0,0,0,0,0,0L9.1,0.2c-0.3-0.3-0.7-0.3-1,0c-0.3,0.3-0.3,0.7,0,1l2.6,2.6H0.7
										c-0.4,0-0.7,0.3-0.7,0.7c0,0.4,0.3,0.7,0.7,0.7h10L8.2,7.8c-0.3,0.3-0.3,0.7,0,1c0.3,0.3,0.7,0.3,1,0L12.9,5c0,0,0,0,0,0
										C13,4.9,13,4.8,13.1,4.8c0,0,0,0,0,0C13.1,4.6,13.1,4.5,13.1,4.4z"/>
									</svg>
								</span>
							</span>
						</a>
           			</h4>
            		
					<a href="#" class="cart-close close-icon">
						<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 8.8 8.9">
						<path d="M8.3,3.8H5.2V0.7C5.2,0.3,4.8,0,4.5,0h0C4.1,0,3.8,0.3,3.8,0.7v3.1H0.7C0.3,3.8,0,4.1,0,4.5v0
							c0,0.4,0.3,0.7,0.7,0.7h3.1v3.1c0,0.4,0.3,0.7,0.7,0.7h0c0.4,0,0.7-0.3,0.7-0.7V5.2h3.1c0.4,0,0.7-0.3,0.7-0.7v0
							C8.9,4.1,8.6,3.8,8.3,3.8z"/>
						</svg>
					</a>
					<?php kona_woo_minicart_content(); ?>
				</div>
			<?php } ?>
            
            <?php if (get_option('_sr_headersearch')) { 
			$gridWidth = 'wrapper';
			if (get_option('_sr_shopgridwidth')) { $gridWidth = get_option('_sr_shopgridwidth'); }
			?>             
            <div id="header-search">
				<div class="search-inner">
					<a href="#" class="search-close close-icon">
						<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 8.8 8.9">
						<path d="M8.3,3.8H5.2V0.7C5.2,0.3,4.8,0,4.5,0h0C4.1,0,3.8,0.3,3.8,0.7v3.1H0.7C0.3,3.8,0,4.1,0,4.5v0
							c0,0.4,0.3,0.7,0.7,0.7h3.1v3.1c0,0.4,0.3,0.7,0.7,0.7h0c0.4,0,0.7-0.3,0.7-0.7V5.2h3.1c0.4,0,0.7-0.3,0.7-0.7v0
							C8.9,4.1,8.6,3.8,8.3,3.8z"/>
						</svg>
					</a>
					<div class="search-form <?php echo esc_attr($gridWidth); ?>">
						<?php echo get_product_search_form(); ?>
						<h5 class="search-subline title-alt"><?php echo esc_html__('Enter your search & hit enter','kona'); ?></h5>
					</div>
					<div class="search-results">
						<div class="<?php echo esc_attr($gridWidth); ?>"> <!-- The grid id must be the same than the ajax request -->
							<div id="search-shop-grid" class="shop-container"></div>
						</div>
						<div class="search-noresult">
							<div class="notfound-icon"></div>
							<div class="spacer-small"></div>
							<p class="h3 ooops"><strong><?php esc_html_e("Ooops","kona"); ?>.</strong></p>
							<p class="h5 title-alt"><?php esc_html_e("We couldn't find any results for your search","kona"); ?>.</p>
						</div>
						<span class="sr-loader-icon"></span>
					</div>
				</div>
			</div>
            <?php } ?>
                                      
            <?php if (function_exists('icl_object_id')) { kona_wpml_switcher(); } ?>                      
                                       
		</div> <!-- END .header-inner -->
		<span class="pseudo-close header-close"></span>
	</header>
	<!-- HEADER -->
	
	<!-- HERO & BODY -->
	<div id="hero-and-body">
			
		<?php get_template_part( 'includes/page', 'title' ); ?>

		<!-- PAGEBODY -->
		<div id="page-body">
		