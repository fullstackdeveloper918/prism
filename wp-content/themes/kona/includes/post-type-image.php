<?php

$theId = kona_getId();

$show = get_post_meta($theId, '_sr_imageshow', true);
?>

<?php if ($show || has_post_thumbnail()) { ?>
<div class="blog-media">
	<?php
	if ($show == 'custom') { echo '<img src="'.esc_url(get_post_meta($theId, '_sr_imageimage', true)).'" alt="'.esc_html(get_the_title()).'"/>'; }
	else { echo get_the_post_thumbnail($theId,'kona-thumb-big'); }
	?>
</div> <!-- END .entry-media -->
<?php } ?>
