<?php
/**
 * Footer Copyright
 */
if (amartha_inherit_option('footer_copyright_visibility', 'footer_copyright_visibility', '1') == '2' && !is_search()) {
    return;
}

$amartha_footer_copyright = get_theme_mod('footer_copyright');
if (!$amartha_footer_copyright && get_theme_mod('footer_copyright_automated', '1') == '1') {
    $amartha_footer_copyright = sprintf(
        '%s %s %s. %s',
        '©',
        date('Y'),
        get_bloginfo('name'),
        esc_html__('All rights reserved.', 'amartha')
    );
}

// Social Media
$amartha_social_media_visibility = amartha_inherit_option('footer_social_media_visibility', 'footer_social_media_visibility', '1');
$amartha_social_media_enabled = get_theme_mod('footer_social_media_enabled', ['facebook', 'twitter', 'dribbble', 'pinterest', 'linkedin']);

if ($amartha_social_media_visibility == '2' && empty($amartha_footer_copyright)) {
    return;
} 

// Alignment
if (amartha_inherit_option('footer_copyright_alignment', 'footer_copyright_alignment', '1') == '1') {
    $amartha_footer_row = 'row';
    $amartha_copyright_class = 'l-primary-footer__copyright__text';
    $amartha_social_media_class = 'm-social-media l-primary-footer__copyright__social-media h-align-right';
} else {
    $amartha_footer_row = 'row flex-row-reverse';
    $amartha_copyright_class = 'l-primary-footer__copyright__text h-align-right';
    $amartha_social_media_class = 'l-primary-footer__copyright__social-media';
}
?>
<div class="l-primary-footer__copyright">
    <div class="container">
        <div class="l-primary-footer__copyright__space">
            <div class="<?php echo esc_attr($amartha_footer_row) ?> d-flex align-items-center">
                <div class="col-sm-6">
                    <div class="<?php echo esc_attr($amartha_copyright_class) ?>">
                        <?php echo wpautop(wp_kses_post($amartha_footer_copyright)) ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="<?php echo esc_attr($amartha_social_media_class) ?>">
                        <?php amartha_social_media($amartha_social_media_visibility, $amartha_social_media_enabled) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>