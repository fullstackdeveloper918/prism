<?php

$theId = kona_getId();

$medias = get_post_meta($theId, '_sr_gallerymedias', true);
$galleryType = get_post_meta($theId, '_sr_gallerytype', true);

if($medias) {
	
	// LIST STYLE
	if ($galleryType == 'list') {
		$spacing = get_post_meta($theId, '_sr_galleryspaced', true);
		$unveil = get_post_meta($theId, '_sr_galleryunveil', true);
		$lazy = get_post_meta($theId, '_sr_gallerylazy', true);
		
		$output = '<ul class="sr-vertical-gallery '.esc_attr($spacing).'">';
		$json = json_decode($medias);
		foreach($json->sortable as $j) {
			$output .= '<li class="'.esc_attr($unveil).'">';
			$image = wp_get_attachment_image_src( $j->id, 'kona-thumb-big' );	
			if ($lazy) {
				$output .= '<img class="lazy" data-src="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_html(get_the_title($j->id)).'" />';	
			} else {
				$output .= '<img src="'.esc_url($image[0]).'" width="'.esc_attr($image[1]).'" height="'.esc_attr($image[2]).'" alt="'.esc_html(get_the_title($j->id)).'" />';	
			}	
			$output .= '</li>';
		}
		$output .= '</ul>';
	} else
	
	// SLIDER STYLE
	if ($galleryType == 'slider') {
		$nav = get_post_meta($theId, '_sr_galleryslidernav', true);
		$arrow = get_post_meta($theId, '_sr_gallerysliderarrows', true); if ($arrow) { $arrow = 'true'; } else { $arrow = 'false'; }
		$dots = get_post_meta($theId, '_sr_gallerysliderdots', true); if ($dots) { $dots = 'true'; } else { $dots = 'false'; }
		$loop = get_post_meta($theId, '_sr_gallerysliderloop', true); if ($loop) { $loop = 'true'; } else { $loop = 'false'; }
		$auto = get_post_meta($theId, '_sr_gallerysliderautoplay', true); if ($auto) { $auto = 'true'; } else { $auto = 'false'; }
		
		$output = '<div class="flickity-carousel image-gallery nav-'.esc_attr($nav).'" data-flickity=\'{ 
			"prevNextButtons": '.esc_attr($arrow).',
			"pageDots": '.esc_attr($dots).',
			"lazy": 1,
			"adaptiveHeight": true,
			"wrapAround": '.esc_attr($loop).',
			"arrowShape": "M0,50.8c0,1.5,0.8,3.1,1.5,3.8l0,0l29,28.2c2.3,2.3,5.3,2.3,7.6,0c2.3-2.3,2.3-5.3,0-7.6L18.3,55.3h76.3 c3.1,0,5.3-2.3,5.3-5.3s-2.3-5.3-5.3-5.3H18.3l19.1-19.8c2.3-2.3,2.3-5.3,0-7.6s-5.3-2.3-7.6,0l-28.2,29l0,0 c-0.8,0.8-0.8,1.5-1.5,1.5l0,0C0,49.2,0,50,0,50.8z"
			}\'>';
		$json = json_decode($medias);
		foreach($json->sortable as $j) {
			$image = wp_get_attachment_image_src( $j->id, 'kona-thumb-big' );	
			$output .= '<div class="gallery-image"><img src="'.esc_url($image[0]).'" alt="'.esc_html(get_the_title($j->id)).'"></div>';
		}
		$output .= '</div>';
	}
	
	echo '<div class="blog-media">'.$output.'</div>';
} ?>