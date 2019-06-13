<?php 
/**
 * Default Logo
 */
$amartha_logo_display = $amartha_light_logo_display = $amartha_logo_style = [];

/**
 * Logos
 */
$amartha_dark_logo = get_theme_mod('header_dark_logo');
$amartha_light_logo = get_theme_mod('header_light_logo');
$amartha_text_logo = get_theme_mod('header_logo_text');
$amartha_custom_dark_logo = get_field('header_dark_logo');
$amartha_custom_light_logo = get_field('header_light_logo');

/**
 * Logo Attributes
 */
$amartha_logo_width = get_theme_mod('header_logo_width');
$amartha_logo_height = get_theme_mod('header_logo_height');
$amartha_logo_custom_width = get_field('header_logo_width');
$amartha_logo_custom_height = get_field('header_logo_height');
$amartha_logo_text_size = get_theme_mod('header_logo_text_size');

/**
 * Logo Classes & Extensions
 */
$amartha_logo_class = 'a-logo a-logo--image';
$amartha_dark_logo_img_class = 'a-logo--image__inner a-logo--image__inner--dark';
$amartha_light_logo_img_class = 'a-logo--image__inner a-logo--image__inner--light';
$amartha_logo_ext = 'png';

/**
 * Dark Logo
*/
if ($amartha_custom_dark_logo) {
    $amartha_logo_display = $amartha_custom_dark_logo;  
} elseif ($amartha_custom_light_logo) {
    $amartha_logo_display = $amartha_custom_light_logo;  
} elseif ($amartha_dark_logo) {
    $amartha_logo_display = $amartha_dark_logo;  
} elseif ($amartha_light_logo) {
    $amartha_logo_display = $amartha_light_logo;  
} else {
    $amartha_logo_class = 'a-logo a-logo--text';
}

/**
 * Light Logo
*/
if ($amartha_custom_light_logo) {
    $amartha_light_logo_display = $amartha_custom_light_logo;
} elseif ($amartha_light_logo) {
    $amartha_light_logo_display = $amartha_light_logo;
}

/**
 * Logo Attributes
*/
if ($amartha_logo_display) {
    if ($amartha_logo_custom_width) {
        $amartha_logo_style[] = 'width: '. $amartha_logo_custom_width .'px';
    } elseif ($amartha_logo_width) {
        $amartha_logo_style[] = 'width: '. $amartha_logo_width .'px';
    } elseif (!strpos(wp_get_attachment_url($amartha_logo_display), '.svg')) {
        $amartha_logo_style[] = 'width: '. wp_get_attachment_metadata($amartha_logo_display)['width'] .'px';
    }
    
    if ($amartha_logo_custom_height) {
        $amartha_logo_style[] = 'height: '. $amartha_logo_custom_height .'px';
    } elseif ($amartha_logo_height) {
        $amartha_logo_style[] = 'height: '. $amartha_logo_height .'px';
    } elseif (!strpos(wp_get_attachment_url($amartha_logo_display), '.svg')) {
        $amartha_logo_style[] = 'height: '. wp_get_attachment_metadata($amartha_logo_display)['height'] .'px';
    }
}

/**
 * Logo Text Size
*/
if ($amartha_logo_text_size && !$amartha_logo_display && !$amartha_light_logo_display) {
    $amartha_logo_style[] = 'font-size: '. $amartha_logo_text_size .'px';
}

/**
 * Logo Type
*/
if ($amartha_logo_display && wp_check_filetype(wp_get_attachment_url($amartha_logo_display))['ext'] == 'svg') {
    $amartha_dark_logo_img_class .= ' style-svg';
} 

if ($amartha_light_logo_display && wp_check_filetype(wp_get_attachment_url($amartha_light_logo_display))['ext'] == 'svg') {
    $amartha_light_logo_img_class .= ' style-svg';
}

?>
<div class="<?php echo esc_attr($amartha_logo_class) ?>">
    <a href="<?php echo esc_url(home_url('/')); ?>" style="<?php echo esc_attr(implode(';', $amartha_logo_style)) ?>">
        <?php
        // Dark Logo
        if ($amartha_logo_display) {
            echo wp_get_attachment_image($amartha_logo_display, 'full', '', array('class' => $amartha_dark_logo_img_class));
        } elseif ($amartha_text_logo) {
            echo esc_attr($amartha_text_logo);
        } else {
            echo esc_attr(bloginfo('name'));
        }

        // Light Logo
        if ($amartha_light_logo_display) {
            echo wp_get_attachment_image($amartha_light_logo_display, 'full', '', array('class' => $amartha_light_logo_img_class));
        } 
        ?>
    </a>
</div>