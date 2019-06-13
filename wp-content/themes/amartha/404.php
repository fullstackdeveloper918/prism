<?php
/**
 * 404 
 */
get_header();

/**
 * Hero 
 */
$amartha_404_hero_style = $amartha_404_overlay_style = [];

/**
 * Image
 */
if (get_theme_mod('404_hero_image')) {
    $amartha_404_hero_style[] = 'background-image: url('. esc_url(wp_get_attachment_url(get_theme_mod('404_hero_image'))) .')';
}

/**
 * Overlay
 */
if (get_theme_mod('404_hero_overlay', '2') == '1') {
    if (get_theme_mod('404_hero_overlay_opacity')) {
        $amartha_404_overlay_style[] = 'opacity: '. get_theme_mod('404_hero_overlay_opacity') .'';
    }

    if (get_theme_mod('404_hero_overlay_color')) {
        $amartha_404_overlay_style[] = 'background-color: '. get_theme_mod('404_hero_overlay_color') .'';
    }
}

echo sprintf(
    '<div class="t-404">
        <div class="o-hero d-flex">
            <div class="o-hero__header">
                <div class="o-hero__header__image" %s></div>
                %s
            </div>
            <div class="o-hero__content align-self-center h-align-center">
                <div class="container">
                    <div class="o-hero__content__title h-fadeInNeuron wow"><h1>%s</h1></div>
                    <div class="o-hero__content__subtitle h-fadeInNeuron wow"><p>%s</p></div>
                    <a href="%s" class="a-button a-button--regular a-button--dark-color h-fadeInNeuron wow">%s</a>
                </div>
            </div>
        </div>
    </div>',
    $amartha_404_hero_style ? 'style="'. implode(';', $amartha_404_hero_style) .'"' : '',
    get_theme_mod('404_hero_overlay', '2') == '1' ? '<div class="o-hero__header__overlay" style="'. implode(';', $amartha_404_overlay_style) .'"></div>' : '',
    get_theme_mod('404_title') ? get_theme_mod('404_title') : esc_html__('404', 'amartha'),
    get_theme_mod('404_description') ? get_theme_mod('404_description') : esc_html__('The page you were looking for couldn\'t be found. The page could be', 'amartha') . '<br />' . esc_html__('removed or you misspelled the word while searching for it.', 'amartha'),
    get_theme_mod('404_button_url') ? get_theme_mod('404_button_url') : esc_url(home_url('/')),
    get_theme_mod('404_button_text') ? get_theme_mod('404_button_text') : esc_attr__('Back to Homepage', 'amartha')
);

get_footer();