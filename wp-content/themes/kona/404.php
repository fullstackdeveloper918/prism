<?php
//get template header
get_header();
?>

		<div class="wrapper-small notfound">
			<div class="spacer-big"></div>
			<div class="notfound-icon"></div>
			<div class="spacer-small"></div>
			<h3><strong><?php esc_html_e("Ooops","kona"); ?>.</strong></h3>
			<h5 class="title-alt"><?php esc_html_e("We can't seem find the page you're looking for.","kona"); ?>.</h5>
			<div class="spacer-medium"></div>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="sr-button withicon style-4">
				<span class="text">
					<span><?php esc_html_e("Back to Homepage","kona"); ?></span>
					<span><?php esc_html_e("Back to Homepage","kona"); ?></span>
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
			<div class="spacer-big"></div>
		</div>
	      
<div class="spacer-big"></div>
        
<?php get_footer(); ?>
