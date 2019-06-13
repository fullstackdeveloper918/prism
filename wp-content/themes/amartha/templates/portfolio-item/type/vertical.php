<?php 
/**
 * Vertical Portfolio
 */
$amartha_row_class = 'row';
$amartha_item_class = 'col-12';
$amartha_gallery_class = 'col-12';

/**
 * Description Place
 * 
 * Change the order of description to
 * above or below the gallery.
 */
if (get_field('vertical_portfolio_description_place') == '2') {
    $amartha_row_class .= ' d-flex flex-column-reverse';
}

/**
 * Description Width
 * 
 * Change the width of description
 * in relation with tabs.
 */
$amartha_item_content_class = 'col-12';
$amartha_item_tabs_class = 'h-display-none';

if (get_field('vertical_portfolio_description_width') == '2') {
    $amartha_item_content_class = $amartha_item_tabs_class = 'col-sm-6';
} elseif (get_field('vertical_portfolio_description_width') == '3') {
    $amartha_item_content_class = 'col-lg-8';
    $amartha_item_tabs_class = 'col-lg-4';
}
?>
<div class="<?php echo esc_attr($amartha_row_class) ?>">
    <div class="<?php echo esc_attr($amartha_item_class) ?>">
        <div class="p-portfolio-single__content__meta">
            <?php the_title('<h1 class="h3 meta-title">', '</h1>') ?>
            <?php if (get_field('portfolio_item_subtitle')) : ?>
                <h5 class="meta-subtitle"><?php echo wp_kses_post(get_field('portfolio_item_subtitle')) ?></h5>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="p-portfolio-single__content-wrapper <?php echo esc_attr($amartha_item_content_class) ?>">
                <div class="p-portfolio-single__content">
                    <div class="p-portfolio-single__content__inner">
                        <?php the_content() ?>
                    </div>
                    <?php get_field('vertical_portfolio_description_width') == '1' ? get_template_part('templates/portfolio-item/tabs') : ''; ?>
                    <?php 
                    if (get_theme_mod('portfolio_item_share', '2') == '1') {
                        get_template_part('templates/extra/share');
                    }
                    ?>
                </div>
            </div>
            <?php if (get_field('vertical_portfolio_description_width') != '1') : ?>
                <div class="<?php echo esc_attr($amartha_item_tabs_class) ?>">
                    <?php get_template_part('templates/portfolio-item/tabs') ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
     <div class="<?php echo esc_attr($amartha_gallery_class) ?>">
        <?php get_template_part('templates/portfolio-item/gallery') ?>
    </div>
</div>