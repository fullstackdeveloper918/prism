<?php
/*-----------------------------------------------------------------------------------

	WRITE PAGE TITLE
	
-----------------------------------------------------------------------------------*/

$theId = kona_getId();

$titleWrapper = "wrapper-medium";
if (get_post_meta($theId, '_sr_titlewidth', true)) { $titleWrapper = get_post_meta($theId, '_sr_titlewidth', true); }

/*************
GET PAGE TITLE OPTIONS
**************/
$titles = kona_getTitle();
if ($titles['tax']) { $maintitle =  $titles['tax']; $subtitle = $titles['title']; } else { $maintitle = $titles['title']; }

if (isset($theId) && get_post_meta($theId, '_sr_alttitle', true)) { $maintitle = get_post_meta($theId, '_sr_alttitle', true); } 
if (isset($theId) && get_post_meta($theId, '_sr_subtitle', true)) { $subtitle = get_post_meta($theId, '_sr_subtitle', true); }


if ((is_tag() || is_category() || is_search() || is_archive() || is_tax()) && (class_exists('Woocommerce') && !is_shop())) {
if ($titles['tax']) { $maintitle =  $titles['tax']; $subtitle =  $titles['title']; } else { $maintitle =  $titles['title']; } }
	if (is_search() || (is_archive() && (class_exists('Woocommerce') && !is_shop()))) { 
		$maintitle = '';
		if ($titles['tax']) { $maintitle =  "<strong>".$titles['title'].' "'.$titles['tax'].'"'.'</strong>'; }
		$subtitle = ""; 
	}


// defaults
$showPagetitle = 1;
$titleType = "default";
$titleSpacing = "spacer-small";
$titleArrangement = 'main';
$titleAlignment = 'align-left';
$titlePosition = 'title-center';
$mainSize = 'h1';
$subSize = 'h5'; 

if (get_post_meta($theId, '_sr_showpagetitle', true) == '0' || get_post_meta($theId, '_sr_showpagetitle', true)) 
{ $showPagetitle = get_post_meta($theId, '_sr_showpagetitle', true); }
	if (is_tag() || is_category() || is_search() || (is_archive() && (class_exists('Woocommerce') && !is_shop())) || is_tax() ) { $showPagetitle = 1; }
if (get_post_meta($theId, '_sr_pagetitletype', true)) { $titleType = get_post_meta($theId, '_sr_pagetitletype', true); }
	if (is_tag() || is_category() || is_search() || (is_archive() && (class_exists('Woocommerce') && !is_shop())) || is_tax()) { $titleType = "default"; }
if (get_post_meta($theId, '_sr_titlearrangement', true)) { $titleArrangement = get_post_meta($theId, '_sr_titlearrangement', true); }
if (get_post_meta($theId, '_sr_titlespacing', true) || get_post_meta($theId, '_sr_titlespacing', true) == "0") { $titleSpacing = get_post_meta($theId, '_sr_titlespacing', true); }
if (get_post_meta($theId, '_sr_titlealignment', true)) { $titleAlignment = get_post_meta($theId, '_sr_titlealignment', true); }
if (get_post_meta($theId, '_sr_titleposition', true)) { $titlePosition = get_post_meta($theId, '_sr_titleposition', true); }
if (get_post_meta($theId, '_sr_alttitle-size', true)) { $mainSize = get_post_meta($theId, '_sr_alttitle-size', true); }
	if (is_search() || (is_archive() && (class_exists('Woocommerce') && !is_shop()))) { $mainSize = 'h3';
		 if ( is_search()) {
			global $wp_query;
			$result = ( 0 != $wp_query->found_posts ) ? true : false;
			if (!$result) { $titleAlignment = 'align-center'; }
		  }																			  
	}
if (get_post_meta($theId, '_sr_subtitle-size', true)) { $subSize = get_post_meta($theId, '_sr_subtitle-size', true); }

// Conditions for default pages
if ((is_tag() || is_category() || is_search() || is_archive() || is_tax()) && (class_exists('Woocommerce') && !is_shop())) {
	$titleSpacing = false; 
	$titleAlignment = "align-left"; 
	$titlePosition = 'title-left'; 
	$mainSize = 'h3';
	$subSize = 'h6';
	$titleArrangement = "subtitle"; 
}

// disable title
if (is_search() && isset($_GET["post_type"]) && $_GET["post_type"] == 'product') { $showPagetitle = 0; }

$titleWrite = '';
$titleClass = '';
if ($titleType == "default") {
	$titleClass = ' '.$titlePosition.' '.$titleAlignment;
	if (isset($subtitle) && $titleArrangement !== 'main') { 
		$titleWrite .= '<'.esc_attr($subSize).' class="title-alt">'.wp_kses_post($subtitle).'</'.esc_attr($subSize).'>';
		if ($titleSpacing) { $titleWrite .= '<div class="'.esc_attr($titleSpacing).'"></div>'; }
	}
	$titleWrite .= '<h1 class="'.esc_attr($mainSize).'">'.wp_kses_post($maintitle).'</h1>';
	if (isset($subtitle) && $titleArrangement == 'main') { 
		if ($titleSpacing) { $titleWrite .= '<div class="'.esc_attr($titleSpacing).'"></div>'; }
		$titleWrite .= '<'.esc_attr($subSize).' class="title-alt">'.wp_kses_post($subtitle).'</'.esc_attr($subSize).'>'; 
	}
} else if ($titleType == "custom") {
	$titleClass = ' '.$titlePosition;
	$titleWrite = apply_filters('the_content',get_post_meta($theId, '_sr_customtitle', true));
	}

// generate Title for Blog posts
if (is_single() && get_post_type() == 'post') {
	$titleWrite = ''; 
	$titleClass = ' '.$titlePosition.' '.$titleAlignment;
	
	if (!get_post_meta($theId, '_sr_titlewidth', true)) { $titleWrapper = "wrapper-small"; }
	
	$thePost = get_post( $theId );
	if (kona_getCategory() && (get_option('_sr_blogpostauthor') || !get_option('_sr_optiontree'))) { 
		$authorId= $thePost->post_author;
		$titleWrite .= kona_getBlogMeta($authorId); 
	}
	
	if (isset($subtitle) && $titleArrangement !== 'main') { $titleWrite .= '<'.esc_attr($subSize).' class="title-alt ">'.wp_kses_post($subtitle).'</'.esc_attr($subSize).'>'; }
	$titleWrite .= '<h1 class="'.esc_attr($mainSize).' post-name">'.wp_kses_post($maintitle).'</h1>';
	if (isset($subtitle) && $titleArrangement == 'main') { $titleWrite .= '<'.esc_attr($subSize).' class="title-alt ">'.wp_kses_post($subtitle).'</'.esc_attr($subSize).'>'; } 
	
	$content = $thePost->post_content;
	if (get_option('_sr_blogpostshare') && !stripos($content,'[kona-share')) 
	$titleWrite .= kona_Share(get_post_type(),esc_html__( 'Share', 'kona' ),'');
	
}
/*************
GET PAGE TITLE OPTIONS
**************/




/*************
GET HERO OPTIONS
**************/
$heroClass = '';		
$heroAdd = '';
$heroappearance = 'hero-boxedauto';

if (get_post_meta($theId, '_sr_heroappearance', true)) { $heroappearance = get_post_meta($theId, '_sr_heroappearance', true); }
$heroType = get_post_meta($theId, '_sr_herobackground', true);
$heroTextColor = get_post_meta($theId, '_sr_herotextcolor', true);

// Conditions for default pages
if ((is_tag() || is_category() || is_search() || is_archive() || is_tax() || !$heroType) && (class_exists('Woocommerce') && !is_shop())) {
	$showPagetitle = 1;
	$heroType = 'default';
}

if ($heroType == 'default' || !$heroType) {
	$heroClass = "no-bg";
} else if ($heroType == 'color') {
	$colorBg = get_post_meta($theId, '_sr_color_bgcolor', true);		
	$heroAdd = 'style="background-color:'.esc_attr($colorBg).'"';	
	$heroClass = $heroTextColor;
} else if ($heroType == 'image') {
	$image = get_post_meta($theId, '_sr_image_bgimage', true);
	$imageType = get_post_meta($theId, '_sr_image_type', true);
	
	if ($imageType == 'normal') {
		$heroClass = $heroTextColor;
		$heroAdd = 'style="background:url('.esc_url($image).') center center;background-size:cover;"';	
	} else if ($imageType == 'parallax') {
		$heroClass = 'parallax-section '.$heroTextColor;
		$heroAdd = 'data-parallax-image="'.esc_url($image).'"';	
	} else if ($imageType == 'pattern') {
		if (strpos($image, '@2x') !== false) {
			$imageInfo = wp_get_attachment_image_src( kona_get_attachment_id_from_src($image), 'full' );	
			$w = $imageInfo[1]/2;
			$h = $imageInfo[2]/2;
			$styleAdd = "-webkit-background-size:".esc_attr($w)."px ".esc_attr($h)."px; -moz-background-size:".esc_attr($w)."px ".esc_attr($h)."px; -o-background-size:".esc_attr($w)."px ".esc_attr($h)."px; background-size:".esc_attr($w)."px ".esc_attr($h)."px;";
		} else { $styleAdd = ""; }
		$heroClass = $heroTextColor;
		$heroAdd = 'style="background:url('.esc_url($image).') center center;'.$styleAdd.'"';	
	}
} else if ($heroType == 'selfhosted' || $heroType == 'youtube' || $heroType == 'vimeo') {
		
	if ($heroType == 'selfhosted') {
		$mp4 = get_post_meta($theId, '_sr_video_mp4', true);
		$webm = get_post_meta($theId, '_sr_video_webm', true);
		$oga = get_post_meta($theId, '_sr_video_oga', true);
		$heroAdd = '		data-phattype="html5" 
						data-phatmp4="'.esc_attr($mp4).'" 
						data-phatwebm="'.esc_attr($webm).'" 
						data-phatogv="'.esc_attr($oga).'"';	
	} else if ($heroType == 'youtube') {
		$youtube = get_post_meta($theId, '_sr_video_youtube', true);
		$heroAdd = '		data-phattype="youtube" 
						data-phatvideoid="'.esc_attr($youtube).'"' ;
	} else if ($heroType == 'vimeo') {
		$vimeo = get_post_meta($theId, '_sr_video_vimeo', true);
		$heroAdd = '		data-phattype="vimeo" 
						data-phatvideoid="'.esc_attr($vimeo).'"' ;
	}
	
	$ratio = get_post_meta($theId, '_sr_video_ratio', true);
	$poster = get_post_meta($theId, '_sr_video_poster', true);
	$loop = get_post_meta($theId, '_sr_video_loop', true);
	if (!$loop) { $loop = "false"; } else {$loop = "true"; }
	$mute = get_post_meta($theId, '_sr_video_mute', true);
	if ($mute) { $mute = "false"; } else {$mute = "true"; }
	$playpause = get_post_meta($theId, '_sr_video_playpause', true);
	if ($playpause) { $playpause = "true"; } else {$playpause = "false"; }
    $playmobile = get_post_meta($theId, '_sr_video_play_mobile', true);
	if ($playmobile) { $playmobile = "true"; } else {$playmobile = "false"; }
	$oColor = get_post_meta($theId, '_sr_video_overlaycolor', true);
	$oOpacity = get_post_meta($theId, '_sr_video_overlayopacity', true);
	if ($oColor == '') { $oColor = "#ffffff"; $oOpacity = 0; }
	
	$heroClass = 'videobg-section '.esc_attr($heroTextColor);
	$heroAdd .= '		data-phatratio="'.esc_attr($ratio).'"
						data-phatposter="'.esc_attr($poster).'"
						data-phatloop="'.esc_attr($loop).'"
						data-phatmute="'.esc_attr($mute).'"
						data-phatplaypause="'.esc_attr($playpause).'"
						data-phatplaymobile="'.esc_attr($playmobile).'"
						data-phatoverlaycolor="'.esc_attr($oColor).'"
						data-phatoverlayopacity="'.esc_attr($oOpacity).'"';
} else if ($heroType == 'portfolioslider' || $heroType == 'blogslider') { 
	$themeslider = "";
	$themesliderSlides = get_post_meta($theId, '_sr_themeslider_slides', true);
	$themesliderArrows = get_post_meta($theId, '_sr_themeslider_arrows', true);
	$themesliderBullets = get_post_meta($theId, '_sr_themeslider_bullets', true);
	$themesliderTitlesize = get_post_meta($theId, '_sr_themeslider_titlesize', true);
	$themesliderCategory = get_post_meta($theId, '_sr_themeslider_category', true);
	
	$readMore = esc_html__("Read More", 'kona'); if ($heroType == 'portfolioslider') { $readMore = esc_html__("View Project", 'kona'); }
	$postType = "post"; if ($heroType == 'portfolioslider') { $postType = "portfolio"; }
	
	$sliderquery = new WP_Query(array(
		'post_type' => array($postType),
		'posts_per_page'=> $themesliderSlides
	));
	
	if ( $sliderquery->have_posts() ) { 
		$themeslider .= '<div class="owl-slider hero-slider nav-light" data-autoplay="true" data-loop="true" data-dots="'.esc_attr($themesliderBullets).'" data-nav="'.esc_attr($themesliderArrows).'">';
        	while ($sliderquery->have_posts()) { $sliderquery->the_post();
				$thumb = get_the_post_thumbnail_url(get_the_ID(),'full');								
				$themeslider .= '<div class="slider-item text-light">
					<div class="bg-img" style="background-image:url('.esc_url($thumb).');"></div>
					<a href="'.esc_url(get_the_permalink()).'" class="sr-button style-3 button-small read-more">'.esc_html($readMore).'</a>
					<div class="owl-slider-caption bottom">';
				
				if ($themesliderCategory && $heroType == 'blogslider') {
					$themeslider .= '<h5 class="title-alt">'.kona_getCategory("simple").'</h5><div class="spacer-small"></div>';
				}							
				
				$themeslider .= '<h2 class="'.esc_attr($themesliderTitlesize).'"><strong>'.get_the_title().'</strong></h2>
					</div>
				</div>';								
												
			}
        $themeslider .= '</div>';
		wp_reset_postdata();
	} // END if have posts
	
	$showPagetitle = false;
} else if ($heroType == 'slider') { 
	$revslider = get_post_meta($theId, '_sr_slider', true);
	$heroappearance = get_post_meta($theId, '_sr_herosliderappearance', true);
	$heroClass = "";
	$showPagetitle = false;
} else if ($heroType == 'map') {
	$apikey = get_post_meta($theId, '_sr_mapapikey', true);
	$latlong = get_post_meta($theId, '_sr_maplatlong', true);
	$text = get_post_meta($theId, '_sr_mappopup', true);
	$pin = get_post_meta($theId, '_sr_mappin', true);
	$zoom = get_post_meta($theId, '_sr_mapzoom', true);
	$style = get_post_meta($theId, '_sr_mapstyle', true);
	
	$mapStyle = "height:50vh;";
	if ($heroappearance == 'hero-big') { $mapStyle = "height:75vh;"; } else
	if ($heroappearance == 'hero-full' || $heroappearance == 'hero-fullscreen' || $heroappearance == 'hero-overlay') { $mapStyle = "height:100vh;"; }
	$googleMap = kona_googleMap($latlong, $text, $pin, $mapStyle, 'heromap', '', $style, $apikey, $zoom);
	//$heroappearance = 'hero-auto';
	$showPagetitle = false;
}

// Add overlay
if ($heroappearance == "hero-overlay") {
	$heroappearance = "hero-fullscreen";
	$heroClass .= " content-overlay";
}

// Conditions for default pages
if (is_404()) {
	$showPagetitle = false;
	$heroType = 'default';
}

// Conditions for different account pages
if (class_exists('Woocommerce')) {
	if (is_account_page()) {
		global $subtitle;
		
		$heroClass .= ' account-hero';		
		$heroAdd = '';
		$heroappearance = 'hero-auto';
		$heroType = 'default';
		$showPagetitle = 0;
		$titleWrapper = 'wrapper';
		$titleClass = '';
		
		if (is_wc_endpoint_url( 'lost-password' )) { $titleWrite = '<h2>'.esc_html__( 'Lost Password', 'kona' ).'</h2>'; }
		
	} else if (is_product_category() || is_product_tag() || is_product()) {
		$showPagetitle = false;
		$heroType = 'default';
	} else if (is_checkout()) { 
		$showPagetitle = false;
	} else if (is_shop() && !get_option('_sr_optiontree')) {
		$showPagetitle = false;
		$heroType = 'default';
	}
}

// Conditions for the default blog page
if (is_home() && !get_post_meta($theId, '_sr_herobackground', true)) {
	$showPagetitle = false;
	$heroType = 'default';
}
?>
				
<?php if ((!$showPagetitle && $heroType == 'default') || 
		  ($heroType == 'default' && (!$maintitle || $maintitle == '')) ) { } else { ?>
    
    <!-- HERO  -->
    <section id="hero" class="<?php echo esc_attr($heroappearance); ?> <?php echo esc_attr($heroClass); ?>" <?php echo ''.$heroAdd; ?>>
    	
        <?php
		if (isset($revslider) && $revslider) { 
			if(class_exists('RevSlider')){ echo putRevSlider($revslider); }
		}
        ?>
        
    	<?php if ($showPagetitle && $showPagetitle == 1) { ?>
        <div id="page-title" class="<?php echo esc_attr($titleWrapper); ?> <?php echo esc_attr($titleClass); ?>">
             <?php if ($titleWrite && $titleWrite !== '') { echo do_shortcode($titleWrite); } ?>
        </div> <!-- END #page-title -->
        <?php } ?>
        
        <?php if (isset($themeslider)) { echo ''.$themeslider; } ?>
        
        <?php if (isset($googleMap)) { echo ''.$googleMap; } ?>
                
    </section>
    <!-- HERO -->
        
<?php } ?>
