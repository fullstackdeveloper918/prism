<?php

$theId = kona_getId();

$type = get_post_meta($theId, '_sr_audiotype', true);

if ($type == 'classic') {
	$output = get_post_meta($theId, '_sr_audioembed', true);
} else if ($type == 'selfhosted') {
	$mp3 = get_post_meta($theId, '_sr_audiomp3', true);
	$image = get_post_meta($theId, '_sr_audioimage', true);
	$output = '';
	if ($image) { $output = '<img src="'.esc_url($image).'" alt="Audio Poster">'; }
	$output .= '<audio id="player'.esc_attr($theId).'"controls>';
	if ($mp3) { $output .= '<source type="audio/mp3" src="'.esc_url($mp3).'" />'; }
	$output .= '</video>';
}

if (isset($output) && $output) { echo '<div class="blog-media">'.$output.'</div>'; }

?>