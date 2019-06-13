<?php
get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php // Show the selected frontpage content.
            if (have_posts()) :
                while (have_posts()) : the_post();
                    get_template_part( 'template-parts/page/content', 'front-page' );
                endwhile;
            else : // I'm not sure it's possible to have no posts when this page is shown, but WTH.
                get_template_part( 'template-parts/post/content', 'none' );
            endif; ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer();