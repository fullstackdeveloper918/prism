<?php
/**
 * To Top
 * 
 * Show the to top button
 * at the bottom of footer.
 */
$amartha_to_top_class = ['a-to-top'];

if (get_theme_mod('to_top_visibility', '2') == '2') {
    return;
}

/**
 * Skin
 */
if (get_theme_mod('to_top_skin', '1') == '1') {
    $amartha_to_top_class[] = 'a-to-top--dark';
} else {
    $amartha_to_top_class[] = 'a-to-top--white';
}

/**
 * animation
 */
if (get_theme_mod('to_top_animation', '1') == '1') {
    $amartha_to_top_class[] = 'a-to-top--translate';
} else {
    $amartha_to_top_class[] = 'a-to-top--scale';
}
?>
<a href="#" class="<?php echo esc_attr(implode(' ', $amartha_to_top_class)) ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="feather feather-chevron-up"><polyline points="18 15 12 9 6 15"></polyline></svg>
</a>