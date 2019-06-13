<?php
/**
 * Blog Single
 */
get_header();

get_template_part('templates/hero/standard');

/**
 * Sidebar
 */
$amartha_row_class = 'row';
$amartha_posts_class = 'col-lg-9';
$amartha_sidebar_class = 'col-lg-3';

if (amartha_inherit_option('blog_post_sidebar', 'blog_post_sidebar', '2') == '1') {
    $amartha_row_class .= ' flex-row-reverse';
} elseif (amartha_inherit_option('blog_post_sidebar', 'blog_post_sidebar', '2') == '3') {
    $amartha_posts_class = 'col-12';
    $amartha_sidebar_class = 'h-display-none';
}

/**
 * Prevent Empty Sidebar
 */
if (!is_active_sidebar('main-sidebar')) {
    $amartha_posts_class = 'col-12';
    $amartha_sidebar_class = 'h-display-none';
}

/**
 * Meta
 */
set_query_var('neuron_posts_style_meta_icon', 'yes');

if (have_posts()) : while (have_posts()) : the_post();

/**
 * Breadcrumb
 */
$amartha_page_breadcrumb = amartha_inherit_option('general_breadcrumb', 'breadcrumbs_post_visibility', '1');
amartha_breadcrumbs($amartha_page_breadcrumb, get_theme_mod('breadcrumbs_separator'));

do_action('amartha_open_container');
?>
<div class="p-blog-single h-large-top-padding h-large-bottom-padding">
    <div class="<?php echo esc_attr($amartha_row_class) ?>">
        <div class="<?php echo esc_attr($amartha_posts_class) ?>">
            <div class="p-blog-single__wrapper o-blog-post">
                <?php if (has_post_thumbnail() && amartha_inherit_option('blog_post_thumbnail', 'blog_post_thumbnail', '1') == '1') : ?> 
                    <div class="o-blog-post__thumbnail">
                        <?php the_post_thumbnail() ?>
                    </div>
                <?php endif; ?>
                <div class="o-blog-post__content">
                    <div class="o-blog-post__meta">
                        <span class="o-blog-post__time a-separator">
                            <span><?php the_time(get_option('date_format')) ?></span>
                        </span>
                        <?php get_template_part('templates/taxonomy/categories') ?>
                    </div>
                    <?php 
                    /**
                     * Post Title
                     */
                    if (amartha_inherit_option('general_title', 'general_title_post', '2') == '1') {
                        the_title('<h2 class="o-blog-post__title">', '</h2>');
                    }
                    ?>
                    <div class="p-blog-single__content h-clearfix">
                        <?php the_content() ?>
                    </div>
                    <?php wp_link_pages(array('before' => '<div class="o-pagination o-pagination--pages"><span class="o-pagination__title">' . esc_attr__( 'Pages:', 'amartha' ) . '</span><div class="o-pagination--pages__numbers">', 'after' => '</div></div>', 'link_before' => '<span>', 'link_after' => '</span>', 'next_or_number' => 'next_and_number', 'separator' => '', 'nextpagelink' => esc_attr__('&raquo;', 'amartha'), 'previouspagelink' => esc_attr__('&laquo;', 'amartha'), 'pagelink' => '%')); ?>
                    <?php paginate_links() ?>
                </div>
                <?php get_template_part('templates/taxonomy/tags-cloud') ?>
                <?php if (amartha_inherit_option('blog_post_share', 'blog_post_share', '2') == '1') : ?>
                    <div class="p-blog-single__social-media">
                        <?php get_template_part('templates/extra/share') ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php comments_template();?>
        </div>
        <?php if (amartha_inherit_option('blog_post_sidebar', 'blog_post_sidebar', '2') != '3' && is_active_sidebar('main-sidebar')) : ?>
            <div class="<?php echo esc_attr($amartha_sidebar_class) ?>">
                <div class="o-main-sidebar">
                    <?php get_sidebar() ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php 
do_action('amartha_close_container');

get_template_part('templates/single/navigation');

endwhile; endif;

get_footer();