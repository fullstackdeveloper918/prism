<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        <?php
        the_content();
        wp_link_pages(array(
            'before'      => '<div class="page-links">' . esc_html__('Pages:', 'auros'),
            'after'       => '</div>',
            'link_before' => '<span class="page-number">',
            'link_after'  => '</span>',
        ));

        ?>
    </div><!-- .entry-content -->
</article><!-- #post-## -->
