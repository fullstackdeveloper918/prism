<?php
/**
 * Prevent switching to Home Finder on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Home Finder 1.0
 */
function auros_switch_theme() {
    switch_theme( WP_DEFAULT_THEME );
    unset( $_GET['activated'] );
    add_action( 'admin_notices', 'auros_upgrade_notice' );
}

add_action( 'after_switch_theme', 'auros_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Home Finder on WordPress versions prior to 4.7.
 *
 * @since Home Finder 1.0
 *
 * @global string $wp_version WordPress version.
 */
function auros_upgrade_notice() {
    $message = sprintf( esc_html__( 'Home Finder requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'auros' ), $GLOBALS['wp_version'] );
    printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since Home Finder 1.0
 *
 * @global string $wp_version WordPress version.
 */
function auros_customize() {
    wp_die( sprintf( esc_html__( 'Home Finder requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'auros' ), $GLOBALS['wp_version'] ), '', array(
        'back_link' => true,
    ) );
}

add_action( 'load-customize.php', 'auros_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since Home Finder 1.0
 *
 * @global string $wp_version WordPress version.
 */
function auros_preview() {
    if (isset( $_GET['preview'] )) {
        wp_die( sprintf( esc_html__( 'Home Finder requires at least WordPress version 4.7. You are running version %s. Please upgrade and try again.', 'auros' ), $GLOBALS['wp_version'] ) );
    }
}

add_action( 'template_redirect', 'auros_preview' );
