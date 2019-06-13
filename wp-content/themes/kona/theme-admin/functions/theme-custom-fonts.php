<?php

/*-----------------------------------------------------------------------------------

	CUSTOM FONTS

-----------------------------------------------------------------------------------*/
function kona_theme_fonts_register($checkTypekit = false) {
	global $kona_googlefonts;
	$fontmanager = stripslashes(get_option('_sr_fontmanager')); 
	$kona_fonts = array( 'bodyfont','h1font','h2font','h3font','h4font','h5font','h6font','subtitle','navigationfont','navigationsubfont','portfoliotitle','portfoliocategory','buttonfont','widgettitlefont','blogtitle','productgridtitle','productsingletitle');
    $fonts_url = '';
 
	$kona_font_families = array();
	
	$kona_active_googlefonts = array();
	$kona_active_googleweights = array();
	$displayTypekitScript = false;
	foreach($kona_fonts as $font) {
		$family = get_option('_sr_'.$font.'-font');
		$weight = get_option('_sr_'.$font.'-weight');	
		$boldweight = get_option('_sr_'.$font.'-boldweight');
		
		if ($family) {
			
			$typekit = false;
			$customF = false;
			if (strpos($fontmanager, $family)) {
				$json = json_decode($fontmanager);
				foreach($json->fonts as $f) {
					if ($family == $f->name && $f->type == 'Google Font') {
						$typekit = false;
						$customF = false;
					} else if ($family == $f->name && $f->type == 'Typekit') {
						$typekit = true;
						$displayTypekitScript = true;
					} else {
						$customF = true;
					}
				} 
			}
			
			if (!$typekit && !$customF) {
				if(!in_array($family, $kona_active_googlefonts) && $family ) {
					$kona_active_googlefonts[] = $family;
				}
				if (!array_key_exists($family, $kona_active_googleweights)) {
					if (strpos($weight, 'italic') !== false) { $kona_active_googleweights[$family] = str_replace("italic", "", $weight).','.$weight; }
					else { $kona_active_googleweights[$family] = $weight; }
					if($weight !== $boldweight && $boldweight) {
						if (strpos($boldweight, 'italic') !== false) { $kona_active_googleweights[$family] .= ','.str_replace("italic", "", $boldweight).','.$boldweight; }
						else { $kona_active_googleweights[$family] .= ','.$boldweight; }
					} 
				} else {
					$check = $kona_active_googleweights[$family];
					if(strpos($check,$weight) === false) {
						if (strpos($weight, 'italic') !== false) { $kona_active_googleweights[$family] .= ','.str_replace("italic", "", $weight).','.$weight; }
						else { $kona_active_googleweights[$family] .= ','.$weight; }
					}
					if(strpos($check,$boldweight) === false && $boldweight) {
						if (strpos($weight, 'italic') !== false) { $kona_active_googleweights[$family] .= ','.str_replace("italic", "", $boldweight).','.$boldweight; }
						else { $kona_active_googleweights[$family] .= ','.$boldweight; }
					} 
				}
			} // END id $typekitorcustom
		}
	} // END foreach
			
	foreach($kona_active_googlefonts as $f) {
		$kona_font_families[] = $f.':'.$kona_active_googleweights[$f];
	} 
	
	// if no options has ever been saved, take default font
	if (!get_option('_sr_optiontree')){ 	
		$kona_font_families = array();
		$kona_font_families[] = 'Montserrat:400,500,600,700';
	}
	
	$query_args = array(
		'family' => urlencode( implode( '|', $kona_font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	
	if ($displayTypekitScript && $checkTypekit) {
		return true;	
	} else if (count($kona_font_families) && !$checkTypekit) {
		return $fonts_url;
	}
		
}



function kona_theme_fonts_enqueue() {
    wp_enqueue_style( 'kona-fonts', kona_theme_fonts_register(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'kona_theme_fonts_enqueue' );


function kona_add_typekit_script() {
	if (kona_theme_fonts_register(true)) {
		$typekitID = stripslashes(get_option('_sr_typekit'));
		if ($typekitID) {
			wp_enqueue_style('kona-typekit-css', 'https://use.typekit.net/'.$typekitID.'.css', 'kona-typekit', '1.0');
		}
	}
}
add_action( 'wp_enqueue_scripts', 'kona_add_typekit_script' );


?>