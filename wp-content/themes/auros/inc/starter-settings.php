<?php
add_action( 'after_switch_theme', 'auros_starter_settings' );
function auros_starter_settings() {
	if (!get_theme_mod( 'osf_starter_settings', false )){
		$content = wp_remote_fopen( get_theme_file_uri( 'assets/data/settings.json' ) );
		if ($content){
			$content = json_decode( $content, true );
			if (isset( $content['thememods'] )){
				foreach ($content['thememods'] as $key => $mod) {
					set_theme_mod( $key, $mod );
				}
			}
		}
		set_theme_mod('osf_dev_mode', false);
		set_theme_mod( 'osf_blog_archive_style', 1 );
		set_theme_mod( 'osf_starter_settings', true );
	}
}