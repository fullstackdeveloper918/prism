<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/assets/styles/custom.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <?php 
        /**
         * Queried Object
         * 
         * In case it is shop page get_queried_object won't 
         * work, it needs to be changed to a custom WooCommerce
         * function wc_get_page_id.
         */
        $amartha_queried_object = class_exists('WooCommerce') && is_shop() ? wc_get_page_id('shop') : get_queried_object();

        /**
         * Redirect
         */
        if (get_field('general_redirect', $amartha_queried_object) && get_field('general_redirect_url', $amartha_queried_object)) {
            wp_redirect(get_field('general_redirect_url', $amartha_queried_object));
            exit;
        }

        wp_head();
        ?>
    </head>
    <body <?php body_class() ?>>
        <div class="l-theme-wrapper">
            <?php
            /**
             * Header Visibility
             */
            if (amartha_inherit_option('header_visibility', 'header_visibility', '1') == '2' && !is_search()) {
                add_filter('amartha_display_header', '__return_false');
            }

            /**
             * Type
             */
            $amartha_header_type = amartha_inherit_option('header_type', 'header_type', '1');
            $amartha_header_template = '';
            if (get_field('header_type', get_queried_object()) == '1') {
                $amartha_header_template = get_theme_mod('header_template', '');
            } elseif (get_field('header_type', get_queried_object()) == '3' && get_field('header_template')) {
                $amartha_header_template = get_field('header_template');
            } else {
                $amartha_header_template = get_theme_mod('header_template', '');
            }

            /**
             * Sticky Type
             */
            $amartha_header_sticky_template = '';
            if (get_field('header_transparency') == '1' && $amartha_header_type == '2') {
                $amartha_header_sticky_template = get_theme_mod('header_sticky_template');
            } elseif (get_field('header_sticky_template') && $amartha_header_type == '2') {
                $amartha_header_sticky_template = get_field('header_sticky_template');
            }

            /*
            * Header Options
            * 
            * Variables are attached via a custom 
            * function which inherits the page values
            * incase the options is set at Inherit
            */
            $amartha_header_skin = amartha_inherit_option('header_skin', 'header_skin', '1');
            $amartha_header_position = amartha_inherit_option('header_position', 'header_position', '1');
            $amartha_header_transparency = amartha_inherit_option('header_transparency', 'header_transparency', '2');
            $amartha_header_autohide = amartha_inherit_option('header_autohide', 'header_autohide', '1');
            $amartha_header_container = amartha_inherit_option('header_container', 'header_container', '2');

            $header_wrapper_class = ['l-primary-header--default-wrapper'];
            $header_class = ['l-primary-header--default'];
            $header_sticky_template_class = ['l-template-header', 'l-template-header--sticky'];
            $header_template_class = ['l-template-header'];

            // Skin
            $amartha_header_skin == '2' && !is_search() ? $header_class[] = 'l-primary-header--light-skin' : '';

            // Position
            $amartha_header_position == '2' && !is_search() ? $header_wrapper_class[] = 'l-primary-header--absolute' : '';
            $amartha_header_position == '2' ? $header_template_class[] = 'l-template-header--absolute' : '';
 
            // Transparency
            if ($amartha_header_transparency == '2') {
                $header_wrapper_class[] = 'l-primary-header--sticky';

                // Sticky Enabled & Skin Light 
                $amartha_header_skin == '2' ? $header_wrapper_class[] = 'l-primary-header--sticky--skin' : '';

                // Sticky Enabled & Position Static
                $amartha_header_position == '1' ? $header_wrapper_class[] = 'l-primary-header--default-height' : '';

                // Sticky Enabled & Autohide On
                $amartha_header_autohide == '1' ? $header_wrapper_class[] = 'l-primary-header--autohide' : '';
                $amartha_header_autohide == '1' ? $header_sticky_template_class[] = 'l-template-header--sticky-autohide' : '';
            } 

            // Container
            $amartha_header_container == '2' ? $header_class[] = 'l-primary-header--wide-container' : '';

            /*
            * Modify Classes for Responsive
            * 
            * Replaces classes from default to responsive
            * in wrapper and in header class
            */
            $header_responsive_wrapper_class = $header_responsive_class = [];

            $header_wrapper_class ? $header_responsive_wrapper_class = str_replace('default', 'responsive', $header_wrapper_class) : '';
            $header_class ? $header_responsive_class = str_replace('default', 'responsive', $header_class) : '';

            // Display Header Filter
            if (apply_filters('amartha_display_header', true) && ($amartha_header_type != '2')) :
            ?>
            <div class="<?php echo esc_attr(implode(' ', $header_responsive_wrapper_class)) ?>">
                <header class="l-primary-header <?php echo esc_attr(implode(' ', $header_responsive_class)) ?>">
                    <?php get_template_part('templates/header/menu/responsive') ?>
                </header>
            </div>

            <div class="<?php echo esc_attr(implode(' ', $header_wrapper_class)) ?>">
                <header class="l-primary-header <?php echo esc_attr(implode(' ', $header_class)) ?>">
                    <?php get_template_part('templates/header/menu/primary') ?>
                </header>
            </div>

            <?php 
            get_template_part('templates/header/search/base');

            // End of Display Header Filter
            endif;

            // Elementor
            if ($amartha_header_type == '2' && $amartha_header_template && apply_filters('amartha_display_header_template', true)) :
            ?>
                <div class="l-template-header-wrapper">
                    <?php if ($amartha_header_transparency == '2' && $amartha_header_sticky_template) : ?>
                        <header class="<?php echo esc_attr(implode(' ', $header_sticky_template_class)) ?>">
                            <?php echo amartha_get_custom_template($amartha_header_sticky_template) ?>
                        </header>
                    <?php endif; ?>
                    
                    <header class="<?php echo esc_attr(implode(' ', $header_template_class)) ?>">
                        <?php echo amartha_get_custom_template($amartha_header_template) ?>
                    </header>
                </div>
            <?php endif; ?>
            