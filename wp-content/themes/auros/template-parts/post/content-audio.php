<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-inner">
	    <?php
	    $content = apply_filters('the_content', get_the_content());
	    $audio = false;

	    // Only get audio from the content if a playlist isn't present.
	    if (false === strpos($content, 'wp-playlist-script')) {
		    $audio = get_media_embedded_in_content($content, array('audio'));
	    }
	    if (!is_single()) {

		    // If not a single post, highlight the audio file.
		    if (!empty($audio)) {
			    foreach ($audio as $audio_html) {
				    echo '<div class="entry-audio">' . $audio_html . '</div>';
			    }
		    };

	    };
	    ?>

        <?php if ('' !== get_the_post_thumbnail() && empty($audio)) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('auros-featured-image-full'); ?>
                </a>
            </div><!-- .post-thumbnail -->
        <?php endif; ?>
        <header class="entry-header">
            <?php

            if (is_single()) {
               // the_title('<h1 class="entry-title">', '</h1>');
            } elseif (is_front_page() && is_home()) {
                the_title('<h3 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>');
            } else {
                the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
            }
            ?>
            <div class="entry-meta">
                <?php auros_posted_on(); ?>
            </div>
        </header><!-- .entry-header -->


        <div class="entry-content">

            <?php

            if (is_single() || empty($audio)) {

                /* translators: %s: Name of current post */
                the_content(sprintf(
                    esc_html__('Read more', 'auros') . '<span class="screen-reader-text"> "%s"</span>',
                    get_the_title()
                ));

                wp_link_pages(array(
                    'before'      => '<div class="page-links">' . esc_html__('Pages:', 'auros'),
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                ));

            };
            ?>

        </div><!-- .entry-content -->

        <?php
        if (is_single()) {
            echo '<div class="tag-social">';
            auros_entry_footer();
            auros_social_share();
            echo '</div>';
        }
        ?>
    </div>

</article><!-- #post-## -->