<?php 
/*-----------------------------------------------------------------------------------

	PORTFOLIO LOOP
	
-----------------------------------------------------------------------------------*/
$itemClass = "item-".get_the_ID();

// GET CUSTOM CAPTIONS OPTIONS
$hovercaptionval = $hovercaption;
$captionsizeval = $captionsize;
$captionpositionval = $captionposition;
$captionalignmentval = $captionalignment;
$captioncategoryval = $captioncategory;
$captioncolorval = $captioncolor;
$hovercolorval = $hovercolor;
$customhovercaptionval = $customhovercaption;
$hoverzoomval = $hoverzoom;
if (get_post_meta(get_the_ID(), '_sr_singlecaptionappearance', true) == 'custom' && !$captionforce) {
$hovercaptionval = get_post_meta(get_the_ID(), '_sr_customhovercaption', true);
$captionpositionval = get_post_meta(get_the_ID(), '_sr_customcaptionposition', true);
$captionalignmentval = get_post_meta(get_the_ID(), '_sr_customcaptionalignment', true);
$captioncategoryval = get_post_meta(get_the_ID(), '_sr_customcaptioncategory', true);
$captioncolorval = get_post_meta(get_the_ID(), '_sr_customcaptioncolor', true);
}
if (get_post_meta(get_the_ID(), '_sr_singlehoverappearance', true) == 'custom' && (isset($hoverforce) && !$hoverforce)) {
$hovercolorval = get_post_meta(get_the_ID(), '_sr_customhovercolor', true);
$customhovercaptionval = get_post_meta(get_the_ID(), '_sr_customhovercolorcaption', true);
$itemClass .= " notforced";
}
if ($hovercolorval == "overlay-color-custom") { $hovercolorval .= " ".$customhovercaptionval; }

// GET ITEM CATEGORIES (OR SUBTITLE)
$categories = wp_get_object_terms(get_the_ID(), 'portfolio_category');
$itemCats = ''; $filterCats = '';
foreach($categories as $cat){ $itemCats .= $cat->name.', '; $filterCats .= 'cat-'.$cat->term_id.' '; }
$itemCats = substr($itemCats, 0, -2);
if ($captioncategoryval == 2) { $itemCats = get_post_meta(get_the_ID(), '_sr_subtitle', true);; }

// UNVEIL / ANIMATION
$anim = '';
$mediaAnim = '';
$infoAnim = '';
if (isset($gridunveil) && $gridunveil) { $anim = $gridunveil; }
if ($anim == "do-anim-modern") { $anim = ""; $mediaAnim = $gridunveil; $infoAnim = "do-anim"; }

// CAPTION CLASSES
$captionClass = 'overlay-caption '.$captionpositionval.' '.$captionalignmentval;
if ($hovercaptionval == 'onhover') { $captionClass .= ' hidden'; }
if ($hovercaptionval == 'onstart') { $captionClass .= ' '.$captioncolorval; }

// LINK OPTIONS
$link = get_the_permalink();
$linkAdd = '';
if (get_post_meta(get_the_ID(), '_sr_linktype', true) == 'url') {
	$link = get_post_meta(get_the_ID(), '_sr_linkurl', true);
	$linkAdd .= 'target='.get_post_meta(get_the_ID(), '_sr_linktarget', true);
} else if (get_post_meta(get_the_ID(), '_sr_linktype', true) == 'lightbox') {
	if (get_post_meta(get_the_ID(), '_sr_lightboxtype', true) == 'image') { 
		$link = get_post_meta(get_the_ID(), '_sr_lightboximage', true);
		if (get_post_meta(get_the_ID(), '_sr_lightboxcaption', true)) {
			$iId = kona_get_attachment_id_from_src(get_post_meta(get_the_ID(), '_sr_lightboximage', true)); 
			$linkAdd = 'data-caption="'.esc_html(get_post($iId)->post_excerpt).'" '; } 
	} else if (get_post_meta(get_the_ID(), '_sr_lightboxtype', true) == 'selfhosted') { 
		$link = get_post_meta(get_the_ID(), '_sr_lightboxmp4', true); 
	} else if (get_post_meta(get_the_ID(), '_sr_lightboxtype', true) == 'youtube') { 
		$link = '//www.youtube.com/embed/'.get_post_meta(get_the_ID(), '_sr_lightboxvideo', true); 
	} else if (get_post_meta(get_the_ID(), '_sr_lightboxtype', true) == 'vimeo') { 
		$link = '//player.vimeo.com/video/'.get_post_meta(get_the_ID(), '_sr_lightboxvideo', true); 
	}
	$linkAdd .= 'data-rel="lightcase:singlefolio"';
}

// VIDEO HOVER
$videoAdd = '';
if ($hovercolorval == 'video') {
	$videohover = get_post_meta(get_the_ID(), '_sr_videohover', true);
	$videohovermp4 = get_post_meta(get_the_ID(), '_sr_videohovermp4', true);
	$videohoverwebm = get_post_meta(get_the_ID(), '_sr_videohoverwebm', true);
	$videohoverogv = get_post_meta(get_the_ID(), '_sr_videohoverogv', true);
	$videohoveryoutube = get_post_meta(get_the_ID(), '_sr_videohoveryoutube', true);
	$videohovervimeo = get_post_meta(get_the_ID(), '_sr_videohovervimeo', true);
	$videohoverratio = get_post_meta(get_the_ID(), '_sr_videohoverratio', true);
	$hovercolorval = 'videobg-section';
	$videoAdd = 'data-phattype="'.esc_attr($videohover).'" data-phatratio="'.esc_attr($videohoverratio).'" data-phatplayonhover="true"';
	if ($videohover=='html5'){ $videoAdd .=' data-phatmp4="'.esc_url($videohovermp4).'" data-phatwebm="'.esc_url($videohoverwebm).'" data-phatogv="'.esc_url($videohoverogv).'"'; }
	else if ($videohover == 'youtube') { $videoAdd .= ' data-phatvideoid="'.esc_attr($videohoveryoutube).'"'; }
	else if ($videohover == 'vimeo') { $videoAdd .= ' data-phatvideoid="'.esc_attr($videohovervimeo).'"'; }
}

// WIDTH OPTION
$tileSize = '';
if (isset($gridsizeforce) && $gridsizeforce) { } else {
	if (get_post_meta(get_the_ID(), '_sr_singlegridsize', true)) { $tileSize = get_post_meta(get_the_ID(), '_sr_singlegridsize', true); }
}

?>

    <div class="isotope-item portfolio-item <?php echo esc_attr($tileSize); ?> <?php echo esc_attr($filterCats); ?> <?php echo esc_attr($itemClass); ?>">
        <div class="portfolio-item-inner item-inner <?php echo esc_attr($anim); ?>">
            <div class="portfolio-media item-media <?php echo esc_attr($mediaAnim); ?>">
            <a href="<?php echo esc_url($link); ?>" class="thumb-hover <?php echo esc_attr($hovercolorval); ?> <?php echo esc_attr($hoverzoomval); ?>" <?php echo ''.$linkAdd; ?> <?php echo ''.$videoAdd; ?>>
                <?php 
				// THUMBNAIL (Main)
				$thumb = get_post_thumbnail_id(get_the_ID());
				
				$imgsrcset = array();
				$imageFull = wp_get_attachment_image_src ($thumb,'full');
				$image1680 = wp_get_attachment_image_src ($thumb,'kona-thumb-ultra');
				$image1280 = wp_get_attachment_image_src ($thumb,'kona-thumb-big');
				$image960 = wp_get_attachment_image_src ($thumb,'kona-thumb-default');
				$image640 = wp_get_attachment_image_src ($thumb,'kona-thumb-medium');
				
				if ($gridmasonrycol == '1') { 
					$imgsrc = 'src="'.esc_url($imageFull[0]).'"';
					$imgsrcset[] = esc_url($imageFull[0]).' '.esc_attr($imageFull[1]).'w';
					$imgsrcset[] = esc_url($image1680[0]).' '.esc_attr($image1680[1]).'w';
					$imgsrcset[] = esc_url($image1280[0]).' '.esc_attr($image1280[1]).'w';
					$imgsrcset[] = esc_url($image960[0]).' '.esc_attr($image960[1]).'w';
					$imgsrcset[] = esc_url($image640[0]).' '.esc_attr($image640[1]).'w';
					$imgsizes = 'sizes="(max-width: '.esc_attr($imageFull[1]).'px) 100vw, '.esc_attr($imageFull[1]).'px"';
					$imgWidthHeight = 'width="'.esc_attr($imageFull[1]).'" height="'.esc_attr($imageFull[2]).'"';
				} else if ($gridmasonrycol == '2') {
					$imgsrc = 'src="'.esc_url($image640[0]).'"';
					$imgsrcset[] = esc_url($image1280[0]).' '.esc_attr($image1280[1]).'w';
					$imgsrcset[] = esc_url($image960[0]).' '.esc_attr($image960[1]).'w';
					$imgsrcset[] = esc_url($image640[0]).' '.esc_attr($image640[1]).'w';
					$imgsizes = 'sizes="(max-width: '.esc_attr($image1280[1]).'px) 100vw, '.esc_attr($image1280[1]).'px"';
					$imgWidthHeight = 'width="'.esc_attr($image1280[1]).'" height="'.esc_attr($image1280[2]).'"';

					if ($tileSize == 'double-width') { 
						//$imgsrc = 'src="'.esc_url($imageFull[0]).'"';
						$imgsrcset[] = esc_url($imageFull[0]).' '.esc_attr($imageFull[1]).'w';
						$imgsizes = 'sizes="(max-width: '.esc_attr($imageFull[1]).'px) 100vw, '.esc_attr($imageFull[1]).'px"';
						$imgWidthHeight = 'width="'.esc_attr($imageFull[1]).'" height="'.esc_attr($imageFull[2]).'"';
					}
				} else if ($gridmasonrycol == '3' || $gridmasonrycol == '4') {
					$imgsrc = 'src="'.esc_url($image960[0]).'"';
					$imgsrcset[] = esc_url($image960[0]).' '.esc_attr($image960[1]).'w';
					$imgsrcset[] = esc_url($image640[0]).' '.esc_attr($image640[1]).'w';
					$imgsizes = 'sizes="(max-width: '.esc_attr($image960[1]).'px) 100vw, '.esc_attr($image960[1]).'px"';
					$imgWidthHeight = 'width="'.esc_attr($image960[1]).'" height="'.esc_attr($image960[2]).'"';

					if ($tileSize == 'double-width' && $gridmasonrycol == '3') { 
						$imgsrc = 'src="'.esc_url($image1680[0]).'"';
						$imgsrcset[] = esc_url($image1680[0]).' '.esc_attr($image1680[1]).'w';
						$imgsizes = 'sizes="(max-width: '.esc_attr($image1680[1]).'px) 100vw, '.esc_attr($image1680[1]).'px"';
						$imgWidthHeight = 'width="'.esc_attr($image1680[1]).'" height="'.esc_attr($image1680[2]).'"';
					}
				} else if ($gridmasonrycol == '5') {
					$imgsrc = 'src="'.esc_url($image640[0]).'"';
					$imgsrcset[] = esc_url($image640[0]).' '.esc_attr($image640[1]).'w';
					$imgsizes = 'sizes="(max-width: '.esc_attr($image640[1]).'px) 100vw, '.esc_attr($image640[1]).'px"';
					$imgWidthHeight = 'width="'.esc_attr($image640[1]).'" height="'.esc_attr(image640[2]).'"';

					if ($tileSize == 'double-width') { 
						$imgsrc = 'src="'.esc_url($image1280[0]).'"';
						$imgsrcset[] = esc_url($image1280[0]).' '.esc_attr($image1280[1]).'w';
						$imgsizes = 'sizes="(max-width: '.esc_attr($image1280[1]).'px) 100vw, '.esc_attr($image1280[1]).'px"';
						$imgWidthHeight = 'width="'.esc_attr($image1280[1]).'" height="'.esc_attr($image1280[2]).'"';
					}
				}
				
				// for gifs
				if (strpos($imageFull[0], '.gif') !== false) { 
					$imgsrc = 'src="'.esc_url($imageFull[0]).'"';
					$imgsrcset = false;
					$imgsizes = 'sizes="(max-width: '.esc_attr($imageFull[1]).'px) 100vw, '.esc_attr($imageFull[1]).'px"';
					$imgWidthHeight = 'width="'.esc_attr($imageFull[1]).'" height="'.esc_attr($imageFull[2]).'"';
				}
				$imgsrcsetReturn = '';
				if ($imgsrcset) $imgsrcsetReturn = 'srcset="'.implode(",", $imgsrcset).'"';
				
				if ($gridlazy) {
				echo '<img class="lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-'.$imgsrc.' data-'.$imgsrcsetReturn.' data-'.$imgsizes.' '.$imgWidthHeight.' alt="'.esc_attr(get_the_title(get_post_thumbnail_id(get_the_ID()))).'" />';	
				} else {
				echo '<img '.$imgsrc.' '.$imgsrcsetReturn.' '.$imgsizes.' '.$imgWidthHeight.' alt="'.esc_attr(get_the_title(get_post_thumbnail_id(get_the_ID()))).'" />';	
				}
				?>
                
                <?php 
				// HOVER THUMBNAIL
				$thumbhover = false; if ($hovercolorval == 'image') { $thumbhover = kona_get_attachment_id_from_src(get_post_meta(get_the_ID(), '_sr_imagehover', true)); }
				
				if ($thumbhover) {
				$imgHoversrcset = array();
				$imageHoverFull = wp_get_attachment_image_src ($thumbhover,'full');
				$imageHover1680 = wp_get_attachment_image_src ($thumbhover,'kona-thumb-ultra');
				$imageHover1280 = wp_get_attachment_image_src ($thumbhover,'kona-thumb-big');
				$imageHover640 = wp_get_attachment_image_src ($thumbhover,'kona-thumb-medium');
				
				if ($gridmasonrycol == '1') { 
					$imgHoversrc = 'src="'.esc_url($imageHoverFull[0]).'"';
					$imgHoversrcset[] = esc_url($imageHoverFull[0]).' '.esc_attr($imageHoverFull[1]).'w';
					$imgHoversrcset[] = esc_url($imageHover1680[0]).' '.esc_attr($imageHover1680[1]).'w';
					$imgHoversrcset[] = esc_url($imageHover1280[0]).' '.esc_attr($imageHover1280[1]).'w';
					$imgHoversrcset[] = esc_url($imageHover640[0]).' '.esc_attr($imageHover640[1]).'w';
					$imgHoversizes = 'sizes="(max-width: '.esc_attr($imageHoverFull[1]).'px) 100vw, '.esc_attr($imageHoverFull[1]).'px"';
					$imgHoverWidthHeight = 'width="'.esc_attr($imageHoverFull[1]).'" height="'.esc_attr($imageHoverFull[2]).'"';
				} else if ($gridmasonrycol == '2') {
					$imgHoversrc = 'src="'.esc_url($imageHover1280[0]).'"';
					$imgHoversrcset[] = esc_url($imageHover1280[0]).' '.esc_attr($imageHover1280[1]).'w';
					$imgHoversrcset[] = esc_url($imageHover640[0]).' '.esc_attr($imageHover640[1]).'w';
					$imgHoversizes = 'sizes="(max-width: '.esc_attr($imageHover1280[1]).'px) 100vw, '.esc_attr($imageHover1280[1]).'px"';
					$imgHoverWidthHeight = 'width="'.esc_attr($imageHover1280[1]).'" height="'.esc_attr($imageHover1280[2]).'"';

					if ($tileSize == 'double-width') { 
						$imgHoversrc = 'src="'.esc_url($imageHoverFull[0]).'"';
						$imgHoversrcset[] = esc_url($imageHoverFull[0]).' '.esc_attr($imageHoverFull[1]).'w';
						$imgHoversizes = 'sizes="(max-width: '.esc_attr($imageHoverFull[1]).'px) 100vw, '.esc_attr($imageHoverFull[1]).'px"';
						$imgHoverWidthHeight = 'width="'.esc_attr($imageHoverFull[1]).'" height="'.esc_attr($imageHoverFull[2]).'"';
					}
				} else if ($gridmasonrycol == '3' || $gridmasonrycol == '4') {
					$imgHoversrc = 'src="'.esc_url($imageHover1280[0]).'"';
					$imgHoversrcset[] = esc_url($imageHover1280[0]).' '.esc_attr($imageHover1280[1]).'w';
					$imgHoversrcset[] = esc_url($imageHover640[0]).' '.esc_attr($imageHover640[1]).'w';
					$imgHoversizes = 'sizes="(max-width: '.esc_attr($imageHover1280[1]).'px) 100vw, '.esc_attr($imageHover1280[1]).'px"';
					$imgHoverWidthHeight = 'width="'.esc_attr($imageHover1280[1]).'" height="'.esc_attr($imageHover1280[2]).'"';

					if ($tileSize == 'double-width' && $gridmasonrycol == '3') { 
						$imgHoversrc = 'src="'.esc_url($imageHover1680[0]).'"';
						$imgHoversrcset[] = esc_url($imageHover1680[0]).' '.esc_attr($imageHover1680[1]).'w';
						$imgHoversizes = 'sizes="(max-width: '.esc_attr($imageHover1680[1]).'px) 100vw, '.esc_attr($imageHover1680[1]).'px"';
						$imgHoverWidthHeight = 'width="'.esc_attr($imageHover1680[1]).'" height="'.esc_attr($imageHover1680[2]).'"';
					}
				} else if ($gridmasonrycol == '5') {
					$imgHoversrc = 'src="'.esc_url($imageHover640[0]).'"';
					$imgHoversrcset[] = esc_url($imageHover640[0]).' '.esc_attr($imageHover640[1]).'w';
					$imgHoversizes = 'sizes="(max-width: '.esc_attr($imageHover640[1]).'px) 100vw, '.esc_attr($imageHover640[1]).'px"';
					$imgHoverWidthHeight = 'width="'.esc_attr($imageHover640[1]).'" height="'.esc_attr(image640[2]).'"';

					if ($tileSize == 'double-width') { 
						$imgHoversrc = 'src="'.esc_url($imageHover1280[0]).'"';
						$imgHoversrcset[] = esc_url($imageHover1280[0]).' '.esc_attr($imageHover1280[1]).'w';
						$imgHoversizes = 'sizes="(max-width: '.esc_attr($imageHover1280[1]).'px) 100vw, '.esc_attr($imageHover1280[1]).'px"';
						$imgHoverWidthHeight = 'width="'.esc_attr($imageHover1280[1]).'" height="'.esc_attr($imageHover1280[2]).'"';
					}
				}
				
				// for gifs
				if (strpos($imageHoverFull[0], '.gif') !== false) { 
					$imgHoversrc = 'src="'.esc_url($imageHoverFull[0]).'"';
					$imgHoversrcset = false;
					$imgHoversizes = 'sizes="(max-width: '.esc_attr($imageHoverFull[1]).'px) 100vw, '.esc_attr($imageHoverFull[1]).'px"';
					$imgHoverWidthHeight = 'width="'.esc_attr($imageHoverFull[1]).'" height="'.esc_attr($imageHoverFull[2]).'"';
				}
				$imgHoversrcsetReturn = '';
				if ($imgHoversrcset) $imgHoversrcsetReturn = 'srcset="'.implode(",", $imgHoversrcset).'"';
				
				if ($gridlazy) {
				echo '<div class="hover-image"><img class="lazy hover" data-'.$imgHoversrc.' data-'.$imgHoversrcsetReturn.' '.$imgHoversizes.' '.$imgHoverWidthHeight.' alt="'.esc_html(get_the_title(get_post_thumbnail_id(get_the_ID()))).'" /></div>';	
				} else {
				echo '<div class="hover-image"><img class="hover" '.$imgHoversrc.' '.$imgHoversrcsetReturn.' '.$imgHoversizes.' '.$imgHoverWidthHeight.' alt="'.esc_attr(get_the_title(get_post_thumbnail_id(get_the_ID()))).'" /></div>';	
				} 
				
				} // END if $thumbhover
				?>
                
                <?php if ($hovercaptionval !== 'hide' && $hovercaptionval !== 'belowthumb') { ?>
                <div class="overlay-caption <?php echo esc_attr($captionClass); ?>">
                    <?php if ($captioncategoryval) { ?><span class="caption-sub portfolio-category "><?php echo ''.$itemCats; ?></span><?php } ?>
                    <h3 class="caption-name portfolio-name <?php echo esc_attr($captionsizeval);?>"><?php the_title(); ?></h3>
                </div>
                <?php } ?>
            </a>
			</div>
            <?php if ($hovercaptionval == 'belowthumb') { ?>
            <div class="portfolio-info <?php echo esc_attr($infoAnim); ?>">
                <?php if ($captioncategoryval) { ?><span class="portfolio-category"><?php echo ''.$itemCats; ?></span><?php } ?>
                <h3 class="portfolio-name <?php echo esc_attr($captionsizeval);?>">
                    <a href="<?php echo esc_url($link); ?>" <?php echo ''.$linkAdd; ?>><?php the_title(); ?></a>
                </h3>
            </div>
            <?php } ?>
        </div>
    </div>