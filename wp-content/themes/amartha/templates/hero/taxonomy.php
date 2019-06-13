<?php 
/**
 * Taxonomy Hero
 * 
 * It is called on each taxonomy,
 * the options can be set from customizer
 * or in each taxonomy individually.
 */
$amartha_hero_class = ['o-hero__header__image'];
$amartha_hero_content_class = ['o-hero__content', 'align-self-center'];
$amartha_hero_style = $amartha_hero_height = $amartha_hero_title_style = $amartha_hero_subtitle_style = [];

/**
 * Queried Object
 */
 if (class_exists('WooCommerce') && is_shop()) {
    $queried_object = wc_get_page_id('shop');
} else if (is_tax() && isset(get_queried_object()->term_id)) {
    $queried_object = 'term_' . get_queried_object()->term_id;
} else {
    $queried_object = get_queried_object();
}

/**
 * Visibility
 */
if (amartha_inherit_option('hero_visibility', 'hero_visibility', '2') == '2') {
    return;
}

/**
 * Container
 */
if (amartha_inherit_option('hero_container', 'hero_container', '1') == '2') {
    $amartha_hero_content_class[] = 'h-wide-container';
}

/**
 * Alignment
 */
switch (amartha_inherit_option('hero_alignment', 'hero_alignment', '2')) {
    case '1':
        $amartha_hero_content_class[] = 'h-align-left';
        break;
    default:
        $amartha_hero_content_class[] = 'h-align-center';
        break;
    case '3':
        $amartha_hero_content_class[] = 'h-align-right';
        break;
}

/**
 * Height
 */
if (get_field('hero_height', $queried_object) == '2' && get_field('hero_custom_height', $queried_object)) {
    $amartha_hero_custom_height = get_field('hero_custom_height', $queried_object);
} else {
    $amartha_hero_custom_height = get_theme_mod('hero_height', '45vh');
}

if ($amartha_hero_custom_height) {
    $amartha_hero_height[] = 'height: '. $amartha_hero_custom_height .'';
}

/**
 * Image
 */
$amartha_hero_image = amartha_inherit_option('hero_image', 'hero_image', '1');

// Increase the number for 1, because the taxonomies doesn't have the option use the post/page featured image
if (get_field('hero_image', $queried_object) == '1' && class_exists('WooCommerce') && !is_shop()) {
    $amartha_hero_style[] = 'background-image: url('. wp_get_attachment_url(get_theme_mod('hero_custom_image')) .')';
} elseif (get_field('hero_image', $queried_object) == '2' && get_field('hero_custom_image')) {
    $amartha_hero_style[] = 'background-image: url('. wp_get_attachment_url(get_field('hero_custom_image')) .')';
} else {
    $amartha_hero_class[] = 'o-hero__header--no-image';
}

/**
 * Image Repeat
 */
switch (amartha_inherit_option('hero_image_repeat', 'hero_image_repeat', '1')) {
    case '1':
        $amartha_hero_style[] = 'background-repeat: no-repeat';
        break;
    case '2':
        $amartha_hero_style[] = 'background-repeat: repeat-all';
        break;
    case '3':
        $amartha_hero_style[] = 'background-repeat: repeat-x';
        break;
    case '4':
        $amartha_hero_style[] = 'background-repeat: repeat-y';
        break;
}

/**
 * Image Attachment
 */
$hero_image_attachment = amartha_inherit_option('hero_image_attachment', 'hero_image_attachment', '1');

if ($hero_image_attachment == '2') {
    $amartha_hero_style[] = 'background-attachment: fixed';
} elseif ($hero_image_attachment == '3') {
    $amartha_hero_style[] = 'background-attachment: local';    
}

/**
 * Image Position
 */
switch(amartha_inherit_option('hero_image_position', 'hero_image_position', '5')) {
    case '1':
        $amartha_hero_style[] = 'background-position: left top';
        break;
    case '2':
        $amartha_hero_style[] = 'background-position: left center';
        break;
    case '3':
        $amartha_hero_style[] = 'background-position: left bottom';
        break;
    case '4':
        $amartha_hero_style[] = 'background-position: center top';
        break;
     case '5':
        $amartha_hero_style[] = 'background-position: center center';
        break;
    case '6':
        $amartha_hero_style[] = 'background-position: center bottom';
        break;
    case '7':
        $amartha_hero_style[] = 'background-position: right top';
        break;
    case '8':
        $amartha_hero_style[] = 'background-position: right center';
        break;
    case '9':
        $amartha_hero_style[] = 'background-position: right bottom';
        break;
}

/**
 * Image Size
 */
switch(amartha_inherit_option('hero_image_size', 'hero_image_size', '2')) {
    case '2':
        $amartha_hero_style[] = '-webkit-background-size: cover; -moz-background-size: cover; background-size: cover;';
        break;
    case '3':
        $amartha_hero_style[] = '-webkit-background-size: contain; -moz-background-size: contain; background-size: contain;';
        break;
    case '4':
        $amartha_hero_style[] = '-webkit-background-size: initial; -moz-background-size: initial; background-size: initial;';
        break;
}

/**
 * Overlay
 */
$amartha_hero_image_overlay = amartha_inherit_option('hero_image_overlay', 'hero_image_overlay', '2');
$amartha_hero_image_overlay_opacity = (get_field('hero_image_overlay', $queried_object) == '2') ? get_field('hero_image_overlay_opacity', $queried_object) : get_theme_mod('hero_image_overlay_opacity');
$amartha_hero_image_overlay_color = (get_field('hero_image_overlay', $queried_object) == '2') ? get_field('hero_image_overlay_color', $queried_object) : get_theme_mod('hero_image_overlay_color');
$amartha_hero_image_overlay_style = [];

if ($amartha_hero_image_overlay == '1') {
    if ($amartha_hero_image_overlay_opacity) {
        $amartha_hero_image_overlay_style[] = 'opacity: '. $amartha_hero_image_overlay_opacity .'';
    }   
    if ($amartha_hero_image_overlay_color) {
        $amartha_hero_image_overlay_style[] = 'background-color: '. $amartha_hero_image_overlay_color .'';       
    }     
}

/**
 * Title
 */
$amartha_hero_title = amartha_inherit_option('hero_title', 'hero_title', '1');
$amartha_hero_custom_title = (get_field('hero_title', $queried_object) == '3') ? get_field('hero_custom_title', $queried_object) : get_theme_mod('hero_custom_title');
$amartha_hero_title_markup = '';
$amartha_hero_title_class = 'o-hero__content__title';

if (class_exists('WooCommerce') && is_shop()) {
    $amartha_hero_title_markup = woocommerce_page_title(false);
} elseif (is_date()) {
    $amartha_hero_title_markup = get_the_date();
} elseif (is_author()) {
    $centaurus_hero_title_markup = get_the_author();
} elseif ($amartha_hero_title == '1') {
    $amartha_hero_title_markup = single_term_title('', false);
} elseif ($amartha_hero_title == '2' && $amartha_hero_custom_title) {
    $amartha_hero_title_markup = $amartha_hero_custom_title;
} 

/**
 * Title Animation
 */
if (amartha_inherit_option('hero_title_animation', 'hero_title_animation', '2') == '2') {
    $amartha_hero_title_class .= ' h-fadeInNeuron wow';    
} elseif (amartha_inherit_option('hero_title_animation', 'hero_title_animation', '2') == '3') {
    $amartha_hero_title_class .= ' h-fadeInUpNeuron wow';    
}

/**
 * Title Color
 */
$amartha_hero_title_color = get_field('hero_title_color', $queried_object) == '1' ? get_theme_mod('hero_title_color', '#232931') : get_field('hero_title_color_custom', $queried_object);
$amartha_hero_title_color && $amartha_hero_title_color != '#232931' ? $amartha_hero_title_style[] = 'color: '. $amartha_hero_title_color .'' : '';

/**
 * Subtitle
 */
$amartha_hero_subtitle_class = 'o-hero__content__subtitle';

if (get_field('hero_subtitle', $queried_object) == '1') {
    $amartha_hero_custom_subtitle = get_theme_mod('hero_subtitle');
} else {
    $amartha_hero_custom_subtitle = get_field('hero_custom_subtitle', $queried_object);
}

/**
 * Subtitle Animation
 */
if (amartha_inherit_option('hero_subtitle_animation', 'hero_subtitle_animation', '2') == '2') {
    $amartha_hero_subtitle_class .= ' h-fadeInNeuron wow';    
} elseif (amartha_inherit_option('hero_subtitle_animation', 'hero_subtitle_animation', '2') == '3') {
    $amartha_hero_subtitle_class .= ' h-fadeInUpNeuron wow';    
}

/**
 * Subtitle Color
 */
$amartha_hero_subtitle_color = get_field('hero_subtitle_color', $queried_object) == '1' ? get_theme_mod('hero_subtitle_color', '#858585') : get_field('hero_subtitle_color_custom', $queried_object);
$amartha_hero_subtitle_color && $amartha_hero_subtitle_color != '#858585' ? $amartha_hero_subtitle_style[] = 'color: '. $amartha_hero_subtitle_color .'' : '';

/**
 * Output the Hero
 */
echo sprintf(
    '<div class="o-hero d-flex" %s>
        <div class="o-hero__header">
            <div class="%s" %s></div>
            %s
        </div>
        <div class="%s">
            <div class="container">%s %s</div>
        </div>
    </div>',
    $amartha_hero_custom_height ? 'style="'. implode(';', $amartha_hero_height) .'"' : '',
    implode(' ', $amartha_hero_class),
    $amartha_hero_style ? 'style="'. implode(';', $amartha_hero_style) .'"' : '',
    $amartha_hero_image_overlay == '1' ? '<div class="o-hero__header__overlay" style="'. implode(';', $amartha_hero_image_overlay_style) .'"></div>' : '',
    implode(' ', $amartha_hero_content_class),
    $amartha_hero_title_markup ? '<div '. ($amartha_hero_title_style ? 'style="'. implode(';', $amartha_hero_title_style) .'"' : '') . ($amartha_hero_title_class ? ' class="'. $amartha_hero_title_class .'"' : '') .'>'. $amartha_hero_title_markup .'</div>' : '',
    $amartha_hero_custom_subtitle ? '<div '. ($amartha_hero_subtitle_style ? 'style="'. implode(';', $amartha_hero_subtitle_style) .'"' : '') . ($amartha_hero_subtitle_class ? ' class="'. $amartha_hero_subtitle_class .'"' : '') .'>'. $amartha_hero_custom_subtitle .'</div>' : ''
);