<?php 
/**
 * Archive Page
 */
get_header();

get_template_part('templates/hero/taxonomy');

/**
 * Breadcrumb
 */
$amartha_page_breadcrumb = amartha_inherit_option('general_archive_breadcrumb', 'breadcrumbs_archives_visibility', '1');
amartha_breadcrumbs($amartha_page_breadcrumb, get_theme_mod('breadcrumbs_separator'));

get_template_part('templates/blog/base');

get_footer();