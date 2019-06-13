<?php 
/**
 * Side Portfolio
 */
$amartha_row_class = 'row';
$amartha_item_class = 'col-sm-6 col-lg-4';
$amartha_gallery_class = 'col-sm-6 col-lg-8';

/**
 * Description Alignment
 * 
 * The alignment of side portfolio moves the
 * description in left or right.
 */
if (get_field('side_portfolio_description_alignment') == '2') {
    $amartha_row_class .= ' flex-row-reverse';
} 

/**
 * Description Width
 * 
 * Manipulates with description width, it 
 * changes the columns via a condition.
 */
if (get_field('side_portfolio_description_width') == '1') {
    $amartha_item_class = $amartha_gallery_class = 'col-sm-6 col-lg-6';
} elseif (get_field('side_portfolio_description_width') == '3') {
    $amartha_item_class = 'col-sm-5 col-lg-3';
    $amartha_gallery_class = 'col-sm-7 col-lg-9';
}

/**
 * Description Sticky
 * 
 * Makes description sticky on scrolling.
 */
if (get_field('side_portfolio_description_sticky')) {
    $amartha_row_class .= ' p-portfolio-single--sticky-content';
}
?>
<div class="<?php echo esc_attr($amartha_row_class) ?>">
    <div class="p-portfolio-single__content-wrapper <?php echo esc_attr($amartha_item_class) ?>">
        <div class="p-portfolio-single__content">
            <?php if (amartha_inherit_option('general_title', 'general_title_portfolio_item', '2') == '2' || get_field('portfolio_item_subtitle') != false) : ?>
                <div class="p-portfolio-single__content__meta">
                    <?php 
                    /**
                     * Portfolio Item Title
                     */
                    if (amartha_inherit_option('general_title', 'general_title_portfolio_item', '2') == '1') {
                        the_title('<h1 class="h3 meta-title">', '</h1>');
                    }
                    ?>
                    <?php if (get_field('portfolio_item_subtitle')) : ?>
                        <h5 class="meta-subtitle"><?php echo wp_kses_post(get_field('portfolio_item_subtitle')) ?></h5>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <div class="p-portfolio-single__content__inner">
                <?php the_content() ?>
            </div>
            <?php 
            /**
             * Tabs
             */
            get_template_part('templates/portfolio-item/tabs');

            /**
             * Share
             */
            if (get_theme_mod('portfolio_item_share', '2') == '1') {
                get_template_part('templates/extra/share');
            }
            ?>
        </div>
    </div>
    <div class="<?php echo esc_attr($amartha_gallery_class) ?>">
        <?php get_template_part('templates/portfolio-item/gallery') ?>
    </div>
</div>