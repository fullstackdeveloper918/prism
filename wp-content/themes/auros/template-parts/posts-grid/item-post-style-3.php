<div class="column-item post-style-3">
    <div class="post-inner">
        <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('auros-featured-image-large'); ?>
                </a>
            </div><!-- .post-thumbnail -->
        <?php endif; ?>
        <div class="post-content">
            <div class="entry-category "><?php the_category(' '); ?></div>
            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
            <div class="link-more"><a href="<?php the_permalink(); ?>"><?php esc_html_e('+ Read more', 'auros');?></a></div>
        </div>

    </div>
</div>