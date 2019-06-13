<?php

$theId = kona_getId();

$type = get_post_meta($theId, '_sr_videotype', true);

if ($type == 'classic') {
	$output = get_post_meta($theId, '_sr_videoembed', true);
} else if ($type == 'inline') {
	$option = get_post_meta($theId, '_sr_videooption', true);
	$vId = get_post_meta($theId, '_sr_videoid', true);
	$image = get_post_meta($theId, '_sr_videoimage', true);
	$output = '<div class="inline-video" data-type="'.esc_attr($option).'" data-videoid="'.$vId.'"><img src="'.esc_url($image).'" alt="Video Poster"></div> ';
} else if ($type == 'selfhosted') {
	$mp4 = get_post_meta($theId, '_sr_videomp4', true);
	$webm = get_post_meta($theId, '_sr_videowebm', true);
	$ogv = get_post_meta($theId, '_sr_videoogv', true);
	$image = get_post_meta($theId, '_sr_videoimage', true);
	$output = '<video width="640" height="360" id="player'.esc_attr($theId).'" poster="'.esc_url($image).'" controls preload="none">';
	if ($mp4) { $output .= '<source type="video/mp4" src="'.esc_url($mp4).'" />'; }
	if ($webm) { $output .= '<source type="video/webm" src="'.esc_url($webm).'" />'; }
	if ($ogv) { $output .= '<source type="video/ogg" src="'.esc_url($ogv).'" />'; }
	$output .= '</video>';
}

if (isset($output) && $output) { echo '<div class="blog-media">'.$output.'</div>'; }

?>