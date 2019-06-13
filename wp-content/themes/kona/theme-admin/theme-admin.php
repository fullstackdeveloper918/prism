<?php

/*-----------------------------------------------------------------------------------

	Theme Admin

-----------------------------------------------------------------------------------*/



/*-----------------------------------------------------------------------------------*/
/*	Includes
/*-----------------------------------------------------------------------------------*/

// Adding Option Panel
require_once( get_template_directory() . "/theme-admin/option-panel/option-panel.php");

// Adding post/work meta boxes (added via core plugin becaufe of theme check rules - since kona (10-2018))

// Theme general frontend features
require_once( get_template_directory() . "/theme-admin/functions/theme-general-features.php");

// Theme menu features (megamenu + image menu)
require_once( get_template_directory() . "/theme-admin/functions/theme-menu-features.php");

// Get the custom style
require_once( get_template_directory() . "/theme-admin/functions/theme-custom-styling.php");

// Get the custom fonts
require_once( get_template_directory() . "/theme-admin/functions/theme-custom-fonts.php");




/*-----------------------------------------------------------------------------------*/
/*	Register Widget Areas
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_widgets_init' ) ) {
	function kona_widgets_init() {
		
		$titleSize = 'h6';
		
		$footerCols = array(1,2,3,4);
		if( get_option('_sr_footerlayout') ) { $footerCols = explode(";",get_option('_sr_footerlayout')); }
		$i = 1;	
		foreach	($footerCols as $c) {
			$sidebarName = esc_html__("Footer", 'kona' ); $sidebarId = "footer-1st";
			if ($i == 2 ) { $sidebarName = esc_html__("Footer (2nd column)", 'kona' ); $sidebarId = "footer-2nd"; } else
			if ($i == 3 ) { $sidebarName = esc_html__("Footer (3rd column)", 'kona' ); $sidebarId = "footer-3rd"; } else
			if ($i == 4 ) { $sidebarName = esc_html__("Footer (4th column)", 'kona' ); $sidebarId = "footer-4th"; }
			register_sidebar( array(
				'name' => $sidebarName,
				'id' => $sidebarId,
				'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
				'after_widget' => "</div>",
				'before_title' => '<'.$titleSize.' class="widget-title title-alt">',
				'after_title' => '</'.$titleSize.'>'
			) );
			$i++;
		}
		
		if(get_option('_sr_bloggridsidebar') || get_option('_sr_blogpostsidebar')) {
			register_sidebar( array(
				'name' => esc_html__( 'Blog Sidebar', 'kona' ),
				'id' => 'blog-sidebar',
				'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">',
				'after_widget' => "</div>",
				'before_title' => '<'.$titleSize.' class="widget-title title-alt">',
				'after_title' => '</'.$titleSize.'>'
			) );
		}
				
	}
	
}
add_action( 'widgets_init', 'kona_widgets_init' );



/*-----------------------------------------------------------------------------------*/
/*	Custom Wordpress Login Logo
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_get_logo' ) ) {
	function kona_get_logo() {
		
		// get logos
		$logoDark = kona_get_attachment_id_from_src( get_option('_sr_logo') );
		$logoLight = kona_get_attachment_id_from_src( get_option('_sr_logo_light') );
		if ($logoDark) { $logoDarkUrl = wp_get_attachment_image_src( $logoDark, 'full' ); } else { $logoDarkUrl = array(get_option('_sr_logo')); }
		if ($logoLight) { $logoLightUrl = wp_get_attachment_image_src( $logoLight, 'full' ); } else { $logoLightUrl = array(get_option('_sr_logo_light')); } 
		// else is for make it work if network wordpress system
		
		// workaround for logos coming from a different location
		if (!$logoDark && get_option('_sr_logo') && get_option('_sr_logo') !== '') {
			if (get_option('_sr_logo')) { 
				echo '<img id="dark-logo" src="'.esc_url(get_option('_sr_logo')).'">'; 
			}
			if (get_option('_sr_logo_light')) { 
				echo '<img id="light-logo" src="'.esc_url(get_option('_sr_logo_light')).'">'; 
			}
		}
		// workaround for logos coming from a different location
		
		if ($logoDark) { 
			
			$fileType = wp_check_filetype($logoDarkUrl[0]);
			$retinaDark = substr($logoDarkUrl[0], 0, - (strlen($fileType['ext'])+1) );
			$retinaDark = $retinaDark.'@2x.'.$fileType['ext'];
			
			$srcSetDark = 'srcset="'.esc_url($logoDarkUrl[0]).' 1x';
			if(kona_get_attachment_id_from_src( $retinaDark ) ) { $srcSetDark .= ', '.esc_url($retinaDark).' 2x'; }
			$srcSetDark .= '"';
			
			echo '<img id="dark-logo" src="'.esc_url($logoDarkUrl[0]).'" alt="'.esc_attr(get_the_title($logoDark)).'" '.$srcSetDark.' width="'.esc_attr($logoDarkUrl[1]).'" height="'.esc_attr($logoDarkUrl[2]).'">'; 
			
		}
		
		if ($logoLight) { 
			
			$fileType = wp_check_filetype($logoLightUrl[0]);
			$retinaLight = substr($logoLightUrl[0], 0, - (strlen($fileType['ext'])+1) );
			$retinaLight = $retinaLight.'@2x.'.$fileType['ext'];
			
			$srcSetLight = 'srcset="'.esc_url($logoLightUrl[0]).' 1x';
			if(kona_get_attachment_id_from_src( $retinaLight ) ) { $srcSetLight .= ', '.esc_url($retinaLight).' 2x'; }
			$srcSetLight .= '"';
			
			echo '<img id="light-logo" src="'.esc_url($logoLightUrl[0]).'" alt="'.esc_attr(get_the_title($logoLight)).'" '.$srcSetLight.' width="'.esc_attr($logoLightUrl[1]).'" height="'.esc_attr($logoLightUrl[2]).'">';
			
		}
		
		if (!get_option('_sr_logo') && !get_option('_sr_logo_light')) {
			echo '<span class="text-logo">'.get_bloginfo().'</span>';
		}
		   
	} 
}



/*-----------------------------------------------------------------------------------*/
/*	Custom Wordpress Login Logo
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_custom_login_logo' ) ) {
	function kona_custom_login_logo() {
	   if (get_option('_sr_loginlogo')) {
		echo '<style type="text/css">
			h1 a { 
				background-image: url('.esc_url(get_option('_sr_loginlogo')).') !important;
				background-position: center center !important;
			}
		</style>';
		}
	} 
}
add_action('login_head', 'kona_custom_login_logo');



/*-----------------------------------------------------------------------------------*/
/*	Comment Function
/*-----------------------------------------------------------------------------------*/
if( !function_exists( 'kona_comment' ) ) {
    function kona_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment; 
		switch ( $comment->comment_type ) :
			case 'pingback':
			case 'trackback':
				?>
		<li class="post pingback">
		<p><?php _e( 'Pingback:', 'kona' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'kona' ), '<span class="edit-link">', '</span>' ); ?></p>
				<?php
				break;
			default:
				?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
            <div class="comment-inner">
                <div class="user"><?php echo get_avatar( $comment, $size = '50'); ?></div>
                <div class="comment-content">
                	<div class="name"><h6 class="comment-name"><?php comment_author(); ?></h6><span class="time"><?php comment_date('F j, Y'); ?></span><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?> </div>
                   	<div class="content">
                    <?php comment_text() ?>
					</div>
                </div>
            </div>
    <?php
				break;
		endswitch;
    }
}



/*-----------------------------------------------------------------------------------*/
/* Add Favicon
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'kona_favicon' ) ) {
    function kona_favicon() {
    	if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
			if (get_option('_sr_favicon') != '') {
			echo '<link rel="shortcut icon" href="'. esc_url(get_option('_sr_favicon')) .'"/>'."\n";
			}
		}
    }
    add_action('wp_head', 'kona_favicon');
}



/*-----------------------------------------------------------------------------------*/
/*	Passwort protection
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'kona_password_form' ) ) {
	function kona_password_form() {
		global $post;
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		echo '<form class="protected-post-form" action="' . esc_html(get_option( 'siteurl' )) . '/wp-login.php?action=postpass" method="post">
		<div class="form-row clearfix">
			<label for="comment_form" class="req">'.esc_html__( "To view this protected post, enter the password below:", "kona" ).'</label>
			<div class="form-value"><input name="post_password" id="' . esc_attr($label) . '" type="password" size="20" /></div>
		</div>
		<div class="form-row clearfix"><input type="submit" name="Submit" value="' . esc_html__( "Submit", "kona" ) . '" /></div>
		</form>
		';
	}
}
add_filter( 'the_password_form', 'kona_password_form' );




/*-----------------------------------------------------------------------------------*/
/*	Remove "Protected" from Title
/*-----------------------------------------------------------------------------------*/
function kona_title_trim($title) {
	$findthese = array(
		'#Protected:#',
		'#Private:#'
	);
	$replacewith = array(
		'', // What to replace "Protected:" with
		'' // What to replace "Private:" with
	);
	$title = preg_replace($findthese, $replacewith, $title);
	return $title;
}
add_filter('the_title', 'kona_title_trim');





/*-----------------------------------------------------------------------------------*/
/*	Custom function to limit the content
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'kona_content' ) ) {
	function kona_content($contenttype,$limit,$readmore,$force=null) {
		global $post;
		if ($post) {
			
			if ($contenttype == 'excerpt') { 
				$content = $post->post_excerpt; 
			}
			if ($contenttype == 'content' || ($contenttype == 'excerpt' && !$content)) { 
				$content = $post->post_content;
				$content = strip_shortcodes( $content );
				$content = apply_filters( 'the_content', $content );
				$content = str_replace(']]>', ']]&gt;', $content);
			}
			$content = wp_trim_words( $content, $limit, ' ...');
			
			if ($readmore) { $redmorelink = '<p><a href="'.esc_url(get_permalink()).'" class="read-more sr-button-text"><strong>'.esc_html__("Read More", 'kona').'</strong></a></p>'; } else { $redmorelink = ''; }

			return '<p>'.$content.'</p>'.$redmorelink;
		}
	}
}



/*-----------------------------------------------------------------------------------*/
/* Add meta datas for social share
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'kona_get_social_metas' ) ) {
    function kona_get_social_metas() {
        
		$customcss = '';
        
        // get post id
		$postid = kona_getId();
		
		$og_title = get_the_title( $postid );
		$og_desc = get_post($postid);
		$og_desc = kona_content('excerpt', 30, '', true);
		$og_desc = strip_tags($og_desc);
		$og_url = get_permalink( $postid );
		$og_img = wp_get_attachment_image_src( get_post_thumbnail_id( $postid ), 'kona-thumb-big' );;
		
		if ($og_title) { echo '<meta property="og:title" content="'.esc_html($og_title).' - '.esc_html(get_bloginfo('name')).'" />'; echo "\n"; }
		echo '<meta property="og:type" content="website" />'; echo "\n";
		if ($og_url) { echo '<meta property="og:url" content="'.esc_url($og_url).'" />'; echo "\n"; }
		if ($og_img) { echo '<meta property="og:image" content="'.esc_url($og_img[0]).'" />'; echo "\n"; }
		if ($og_img) { echo '<meta property="og:image:width" content="'.esc_attr($og_img[1]).'" />'; echo "\n"; }
		if ($og_img) { echo '<meta property="og:image:height" content="'.esc_attr($og_img[2]).'" />'; echo "\n"; }
		if ($og_desc) { echo '<meta property="og:description" content="'.esc_html($og_desc).'" />'; echo "\n"; }
		echo "\n";
			
	
    }

}




/*-----------------------------------------------------------------------------------*/
/* Get Current title
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'kona_getTitle' ) ) {
	function kona_getTitle() {
		
		$kona_titles = array();
		
		if (is_404()) {
			$kona_titles['tax'] = false;
			$kona_titles['title'] = esc_html__("Page not found", 'kona');
		} else if (is_tag()) {
			$kona_titles['tax'] = single_tag_title('', false);
			$kona_titles['title'] = esc_html__("Tag", 'kona');
		} else if (is_category()) {
			$kona_titles['tax'] = single_cat_title('', false);
			$kona_titles['title'] = esc_html__("Category", 'kona');
		} else if (is_search()) {
			$kona_titles['tax'] = get_search_query();
			$kona_titles['title'] = esc_html__("Search for", 'kona');
		} else if (is_tax('portfolio_category')) {
			$the_tax = get_term_by( 'slug', get_query_var( 'portfolio_category' ) , 'portfolio_category');
			$kona_titles['tax'] = $the_tax->name;
			$kona_titles['title'] = esc_html__("Portfolio", 'kona');
		} else if (is_tax('portfolio_tags')) {
			$the_tax = get_term_by( 'slug', get_query_var( 'portfolio_tags' ) , 'portfolio_tags');
			$kona_titles['tax'] = $the_tax->name;
			$kona_titles['title'] = esc_html__("Portfolio", 'kona');
		} else if (is_author()) {
			$kona_titles['tax'] = get_the_author_meta('display_name',get_query_var('author'));
			$kona_titles['title'] = esc_html__("Posts by", 'kona');
		} else if (class_exists('Woocommerce') && is_shop()) {
			$kona_titles['tax'] = false;
			$shopPage = get_post(get_option('woocommerce_shop_page_id'));
			$title = $shopPage->post_title;
			$kona_titles['title'] = $title;
		} else if (is_archive()) {
			$kona_titles['tax'] = single_month_title(' ', false);
			$kona_titles['title'] = esc_html__("Archive", 'kona');
		} else if (is_home()) {
			if (get_option('page_for_posts') > 0) {
				$blog = get_post(get_option('page_for_posts'));
				$title = $blog->post_title;
			} else {
				$title = esc_html__("Home", 'kona');
			}
			$kona_titles['tax'] = false;
			$kona_titles['title'] = $title;
		} else {
			$kona_titles['tax'] = false;
			$kona_titles['title'] = get_the_title();
		}
		
		return $kona_titles;
	}
}





/*-----------------------------------------------------------------------------------*/
/*	Customize Comment form
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'kona_comment_fields' ) ) {
	function kona_comment_fields($fields) {
		$fields =  array(
			'author' => '<div class="form-row one-third">
						<label for="author" class="req">'.esc_html__('Name', 'kona').' <abbr title="required" class="required">*</abbr></label>
						<input type="text" name="author" class="author" id="author" value="" />
						</div>
						 ',
			'email'  => '<div class="form-row one-third">
						 <label for="email" class="req">'.esc_html__('Email', 'kona').' <abbr title="required" class="required">*</abbr></label>
						 <input type="text" name="email" class="email" id="email" value="" />
						 </div>',
			'url'    => '<div class="form-row one-third last-col">
						 <label for="url">'.esc_html__('Website', 'kona').'</label>
						 <input type="text" name="url" class="url" id="url" value=""/>
						 </div>
						 <div class="clear"></div>'
		);
		return $fields;
	}
}
add_filter('comment_form_default_fields','kona_comment_fields');

$kona_comments_defaults = array( 
	'comment_field' => '<div class="form-row">
						<label for="comment_form">'.esc_html__('Your Comment', 'kona').' <abbr title="required" class="required">*</abbr></label>
						<textarea name="comment" class="comment_form" id="comment_form" rows="15" cols="50"></textarea>
						</div>',
	'comment_notes_before'  => '',
	'comment_notes_after'  => '',
	'title_reply'          => esc_html__( 'Leave a comment', 'kona' ),
	'title_reply_to'       => esc_html__( 'Leave a Comment to %s', 'kona' ),
	'cancel_reply_link'    => esc_html__( 'Cancel Reply', 'kona' ),
	'label_submit'         => esc_html__( 'Post Comment', 'kona' )
);
	



/*-----------------------------------------------------------------------------------*/
/*	Get attachement id from src
/*-----------------------------------------------------------------------------------*/
function kona_get_attachment_id_from_src( $url ) {
    $post_id = attachment_url_to_postid( $url );

    if ( ! $post_id ){
        $dir = wp_upload_dir();
        $path = $url;
        if ( 0 === strpos( $path, $dir['baseurl'] . '/' ) ) {
            $path = substr( $path, strlen( $dir['baseurl'] . '/' ) );
        }

        if ( preg_match( '/^(.*)(\-\d*x\d*)(\.\w{1,})/i', $path, $matches ) ){
            $url = $dir['baseurl'] . '/' . $matches[1] . $matches[3];
            $post_id = attachment_url_to_postid( $url );
        }
    }

    return (int) $post_id;
}


/*-----------------------------------------------------------------------------------*/
/*	Attachement Infos
/*-----------------------------------------------------------------------------------*/
function kona_get_attachment_infos( $attachment_id ) {
	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}




/*-----------------------------------------------------------------------------------*/
/*	Google Map  
/*-----------------------------------------------------------------------------------*/
function kona_googleMap($latlong, $text, $pin, $style, $id, $class, $color=null, $apikey, $zoom) {
    	
		static $mapId = 1;
		if (!$latlong) { $latlong = '-33.86938,151.204834'; }
		if (!$pin) { $pin = get_template_directory_uri().'/files/images/map-pin.png'; }
		if (!$id) { $id = $mapId; }
		
		$mapTypeId = "mapTypeId: google.maps.MapTypeId.ROADMAP";
		$mapcolor = '';	
		if ($color == 'dark') {
			$mapcolor = 'styles: [ { "elementType": "geometry", "stylers": [ { "color": "#212121" } ] }, { "elementType": "labels.icon", "stylers": [ { "visibility": "off" } ] }, { "elementType": "labels.text.fill", "stylers": [ { "color": "#757575" } ] }, { "elementType": "labels.text.stroke", "stylers": [ { "color": "#212121" } ] }, { "featureType": "administrative", "elementType": "geometry", "stylers": [ { "color": "#757575" } ] }, { "featureType": "administrative.country", "elementType": "labels.text.fill", "stylers": [ { "color": "#9e9e9e" } ] }, { "featureType": "administrative.land_parcel", "stylers": [ { "visibility": "off" } ] }, { "featureType": "administrative.locality", "elementType": "labels.text.fill", "stylers": [ { "color": "#bdbdbd" } ] }, { "featureType": "poi", "elementType": "labels.text.fill", "stylers": [ { "color": "#757575" } ] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [ { "color": "#181818" } ] }, { "featureType": "poi.park", "elementType": "labels.text.fill", "stylers": [ { "color": "#616161" } ] }, { "featureType": "poi.park", "elementType": "labels.text.stroke", "stylers": [ { "color": "#1b1b1b" } ] }, { "featureType": "road", "elementType": "geometry.fill", "stylers": [ { "color": "#2c2c2c" } ] }, { "featureType": "road", "elementType": "labels.text.fill", "stylers": [ { "color": "#8a8a8a" } ] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [ { "color": "#373737" } ] }, { "featureType": "road.highway", "elementType": "geometry", "stylers": [ { "color": "#3c3c3c" } ] }, { "featureType": "road.highway.controlled_access", "elementType": "geometry", "stylers": [ { "color": "#4e4e4e" } ] }, { "featureType": "road.local", "elementType": "labels.text.fill", "stylers": [ { "color": "#616161" } ] }, { "featureType": "transit", "elementType": "labels.text.fill", "stylers": [ { "color": "#757575" } ] }, { "featureType": "water", "elementType": "geometry", "stylers": [ { "color": "#000000" } ] }, { "featureType": "water", "elementType": "labels.text.fill", "stylers": [ { "color": "#3d3d3d" } ] } ],';	
		} else if ($color == 'greyscale') {
			$mapcolor = 'styles: [{featureType:"landscape",stylers:[{saturation:-100},{lightness:65},{visibility:"on"}]},{featureType:"poi",stylers:[{saturation:-100},{lightness:51},{visibility:"simplified"}]},{featureType:"road.highway",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"road.arterial",stylers:[{saturation:-100},{lightness:30},{visibility:"on"}]},{featureType:"road.local",stylers:[{saturation:-100},{lightness:40},{visibility:"on"}]},{featureType:"transit",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"administrative.province",stylers:[{visibility:"off"}]},{featureType:"administrative.locality",stylers:[{visibility:"off"}]},{featureType:"administrative.neighborhood",stylers:[{visibility:"on"}]},{featureType:"water",elementType:"labels",stylers:[{visibility:"on"},{lightness:-25},{saturation:-100}]},{featureType:"water",elementType:"geometry",stylers:[{hue:"#ffff00"},{lightness:-25},{saturation:-97}]}],';	
		} else if ($color == 'satelite') {
			$mapTypeId = "mapTypeControl: false,mapTypeId: google.maps.MapTypeId.SATELLITE";
		}
		
		if (!defined('map_check')) {
		  // first time code
		  if ($apikey) { $mapAdd = "?key=".$apikey; } else { $mapAdd = ''; }
		  $incScript = '<script type="text/javascript" src="//maps.google.com/maps/api/js'.esc_js($mapAdd).'"></script>';
		  define('map_check',true);
		} else {
		  // not the first time code
		  $incScript = '';
		}
		
		if ($text && $text !== '') {
			$text = str_replace(chr(13),'<br>',$text);
        	$text = str_replace(chr(10),'',$text);
			$text = "var contentString = '".addslashes($text)."'; var infowindow = new google.maps.InfoWindow({ content: contentString });";
		} else {
			$text = '';	
		}
		
		if (strpos($pin, '@2x') !== false) {
			$imageInfo = wp_get_attachment_image_src( kona_get_attachment_id_from_src($pin), 'full' );	
			$w = $imageInfo[1]/2;
			$h = $imageInfo[2]/2;
			$pinOutput = 'var image = new google.maps.MarkerImage("'.esc_html($pin).'", null, null, null, new google.maps.Size('.$w.','.$h.'));';
		} else { 
			$pinOutput = 'var image = "'.esc_html($pin).'";';
		}
	
		$return = '<div id="map'.esc_attr($id).'" class="google-map '.esc_attr($class).'" style="'.$style.'"></div>
        '.$incScript.'
        <script type="text/javascript">
			function mapinitialize'.esc_js($id).'() {
				
				var latlng = new google.maps.LatLng('.$latlong.');
				var myOptions = {
					zoom: '.esc_js($zoom).',
					center: latlng,
					scrollwheel: false,
					scaleControl: false,
					disableDefaultUI: false,
					streetViewControl: false,
					overviewMapControl: false,
					panControl: false,
					'.$mapcolor.'
					'.$mapTypeId.'
				};
				var map = new google.maps.Map(document.getElementById("map'.$id.'"),myOptions);
				
				'.$pinOutput.'
				var marker = new google.maps.Marker({
					map: map, 
					icon: image,
					position: map.getCenter()
				});
				
				'.$text.'
							
				google.maps.event.addListener(marker, "click", function() {
				  infowindow.open(map,marker);
				});
								
					
			}
			mapinitialize'.esc_js($id).'();
		</script>';
		
	$mapId++;
	return $return;
}
?>