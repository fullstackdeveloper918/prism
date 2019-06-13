<?php 
/**
 * Meta Inside
 */
$amartha_blog_meta_inside_class = 'o-neuron-hover';
$amartha_hover_holder_body_class = ['o-neuron-hover-holder__body', 'd-flex'];

/**
 * Hover Visibility
 */
if ($neuron_posts_hover_visibility == 'show') {
    $amartha_blog_meta_inside_class .= ' o-neuron-hover--meta-inside';
}

/**
 * Hover Animation
 */
if ($neuron_posts_hover_animation == 'translate' && $neuron_posts_hover_visibility != 'hide') {
   $amartha_blog_meta_inside_class .= ' o-neuron-hover--translate'; 
} elseif ($neuron_posts_hover_animation == 'scale' && $neuron_posts_hover_visibility != 'hide') {
    $amartha_blog_meta_inside_class .= ' o-neuron-hover--scale'; 
}

/**
 * Hover Active
 */
$amartha_hover_holder_class = ['o-neuron-hover-holder'];
$neuron_posts_style_hover_active == 'yes' ? $amartha_hover_holder_class[] = 'o-neuron-hover-holder--active' : '';

/**
 * Hover Meta
 */
$amartha_hover_holder_body_class[] = $neuron_posts_style_hover_meta_vertical_alignment ? 'align-items-'. $neuron_posts_style_hover_meta_vertical_alignment .'' : 'align-items-center';
?>
<div class="<?php echo esc_attr($amartha_blog_meta_inside_class) ?>">
    <div class="<?php echo esc_attr(implode(' ', $amartha_hover_holder_class)) ?>">
        <div class="o-neuron-hover-holder__header">
            <a href="<?php the_permalink() ?>" class="o-neuron-hover-holder__header__media">
                <?php if ($neuron_posts_carousel_height == 'full') : ?>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="h-full-height-image h-background-image-style" style="background-image: url(<?php the_post_thumbnail_url() ?>)"></div>
                    <?php else : ?>
                        <div class="h-full-height-image h-background-image-style" style="background-image: url(<?php echo esc_url(AMARTHA_THEME_PLACEHOLDER) ?>)"></div>
                    <?php endif; ?>
                <?php elseif (has_post_thumbnail()) : ?>
                    <div class="h-calculated-image" style="<?php echo esc_attr(amartha_thumbnail_calculation($neuron_posts_thumbnail_resizer)) ?>">
                        <?php 
                        /**
                         * Thumbnail Sizes
                         * 
                         * It inherits the option via set query var.
                         */
                        if ($neuron_posts_thumbnail_resizer) {
                            the_post_thumbnail($neuron_posts_thumbnail_resizer);
                        } else {
                            the_post_thumbnail();
                        }
                        ?>
                    </div>
                <?php else : ?>
                    <div class="h-calculated-image" style="padding-bottom: 100%;">
                        <img src="<?php echo esc_url(AMARTHA_THEME_PLACEHOLDER) ?>" alt="<?php echo esc_attr__('Placeholder Image', 'amartha'); ?>">
                    </div>
                <?php endif; ?>
            </a>
            <?php if ($neuron_posts_hover_visibility != 'hide') : ?>
                <div class="o-neuron-hover-holder__header__overlay"></div>
            <?php endif; ?>
        </div>
        <?php if ($neuron_posts_hover_visibility != 'hide') : ?>
            <div class="<?php echo esc_attr(implode(' ', $amartha_hover_holder_body_class)) ?>">
                <div class="o-neuron-hover-holder__body__inner">
                    <div class="o-neuron-hover-holder__body-meta">
                        <?php if ($neuron_posts_meta_title == 'yes') : ?>
                            <h4 class="o-neuron-hover-holder__body-meta__title">
                                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                            </h4>
                        <?php endif; ?>
                        <?php if ($neuron_posts_meta_categories == 'yes') : ?>
                            <div class="o-blog-post__meta o-neuron-hover-holder__body-meta__subtitle">
                                <?php get_template_part('templates/taxonomy/categories'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <a href="<?php the_permalink() ?>"></a>
            </div>
        <?php endif; ?>
    </div>
</div>