<?php
/**
 * Page
 */
get_header();

get_template_part('templates/hero/standard');

/**
 * Breadcrumb
 */
$amartha_page_breadcrumb = amartha_inherit_option('general_breadcrumb', 'breadcrumbs_page_visibility', '1');
amartha_breadcrumbs($amartha_page_breadcrumb, get_theme_mod('breadcrumbs_separator'));

/**
 * Page Title
 */
$amartha_general_title = amartha_inherit_option('general_title', 'general_title_page', '2');
$amartha_main_wrapper_class = '';

if ($amartha_general_title != '1') {
    $amartha_main_wrapper_class = 'h-large-top-padding';
}

if ($amartha_general_title == '1') : 
?>
    <div class="h-large-top-padding">
        <div class="container">
            <?php the_title('<h3 class="a-page-title">', '</h3>') ?>
        </div>
    </div>
<?php endif; ?>
<div class="l-main-wrapper__holder h-clearfix h-large-bottom-padding <?php echo esc_attr($amartha_main_wrapper_class) ?>">
    <div class="container l-main-wrapper__inner">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                the_content();
                wp_link_pages(array('before' => '<div class="o-pagination o-pagination--pages"><span class="o-pagination__title">' . esc_attr__( 'Pages:', 'amartha' ) . '</span><div class="o-pagination--pages__numbers">', 'after' => '</div></div>', 'link_before' => '<span>', 'link_after' => '</span>', 'next_or_number' => 'next_and_number', 'separator' => '', 'nextpagelink' => esc_attr__('&raquo;', 'amartha'), 'previouspagelink' => esc_attr__('&laquo;', 'amartha'), 'pagelink' => '%'));
                paginate_links();
            }
        }
        ?>
    </div>
</div>
<?php
do_action('amartha_open_container');
    comments_template();
do_action('amartha_close_container');

get_footer();