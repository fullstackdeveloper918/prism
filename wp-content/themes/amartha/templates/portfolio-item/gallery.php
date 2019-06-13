<?php
/**
 * Portfolio Item Gallery
 */

/**
 * Columns
 * 
 * Change gallery items columns
 * via customizer or individually.
 */
switch (amartha_inherit_option('portfolio_item_gallery_columns', 'portfolio_item_gallery_columns', '1')) {
    default:
        $amartha_gallery_item_column = 'col-12';
        break;
    case '2':
        $amartha_gallery_item_column = 'col-sm-6';
        break;
    case '3':
        $amartha_gallery_item_column = 'col-sm-6 col-md-4';
        break;
    case '4':
        $amartha_gallery_item_column = 'col-sm-6 col-md-3';
        break;
}

/**
 * Animation & WOW Delay
 */
$amartha_portfolio_item_gallery_animation = amartha_inherit_option('portfolio_item_gallery_animation', 'portfolio_item_gallery_animation', '2');
$amartha_portfolio_item_holder_class = 'p-portfolio-gallery__item';

if ($amartha_portfolio_item_gallery_animation == '2' || $amartha_portfolio_item_gallery_animation == '4') {
    $amartha_portfolio_item_holder_class .= ' h-fadeInNeuron wow';    
} elseif ($amartha_portfolio_item_gallery_animation == '3' || $amartha_portfolio_item_gallery_animation == '5') {
    $amartha_portfolio_item_holder_class .= ' h-fadeInUpNeuron wow';
}

$amartha_data_wow_delay = false;
$amartha_data_wow_seconds = 0;

if ($amartha_portfolio_item_gallery_animation == '4' || $amartha_portfolio_item_gallery_animation == '5') {
    $amartha_data_wow_delay = true;
}

if (have_rows('portfolio_item_gallery')) :
?>
<div class="p-portfolio-gallery">
    <div class="row masonry">
        <?php while (have_rows('portfolio_item_gallery')) : the_row(); ?>
            <?php 
            /**
             * WOW Animation
             */
            $amartha_data_wow_seconds == 12 ? $amartha_data_wow_seconds = 0 : '';
            $amartha_wow_holder = "data-wow-delay=". $amartha_data_wow_seconds/10 ."s";
            ?>
            <div class="selector <?php echo esc_attr($amartha_gallery_item_column) ?>">
                <div class="h-lightbox <?php echo esc_attr($amartha_portfolio_item_holder_class) ?>" <?php echo esc_attr($amartha_data_wow_delay === true && $amartha_data_wow_seconds ? $amartha_wow_holder : '') ?>>
                    <?php if (get_row_layout() == 'portfolio_item_gallery_image') : ?>
                        <a class="h-calculated-image h-lightbox-link" data-mfp-src="<?php echo esc_url(get_sub_field('portfolio_item_gallery_image_obj')['url']) ?>" style="<?php echo esc_attr(amartha_image_calculation(get_sub_field('portfolio_item_gallery_image_obj')['id'])) ?>">
                            <img src="<?php echo esc_url(get_sub_field('portfolio_item_gallery_image_obj')['url']) ?>" alt="<?php echo esc_url(get_sub_field('portfolio_item_gallery_image_obj')['url']) ?>">
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php $amartha_data_wow_seconds = $amartha_data_wow_seconds + 2; endwhile; ?>
    </div>
</div>
<?php
endif;