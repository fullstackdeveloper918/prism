<?php 
/**
 * Style Options
 */

// Create Panel and Sections
Kirki::add_section('style_options', array(
    'title'          => esc_attr__('Style', 'neuron-core'),
	'priority'       => 1,
    'priority'    => 8
));

// Settings
Kirki::add_field('neuron_kirki', array(
	'type'        => 'color',
	'settings'    => 'style_bg_color',
	'label'       => __('Background Color', 'neuron-core'),
	'description' => __('Change the background color of theme.', 'neuron-core'),
	'section'     => 'style_options',
	'default'     => '#FFFFFF',
));
Kirki::add_field('neuron_kirki', array(
	'type'        => 'color',
	'settings'    => 'style_main_color',
	'label'       => __('Main Color', 'neuron-core'),
	'description' => __('Change the color of all main elements.', 'neuron-core'),
	'section'     => 'style_options',
	'default'     => '#ffcdab',
));
Kirki::add_field('neuron_kirki', array(
	'type'        => 'color',
	'settings'    => 'style_headings_color',
	'label'       => __('Headings Color', 'neuron-core'),
	'description' => __('Change the color of all headings.', 'neuron-core'),
	'section'     => 'style_options',
	'default'     => '#232121',
));
Kirki::add_field('neuron_kirki', array(
	'type'        => 'color',
	'settings'    => 'style_paragraphs_color',
	'label'       => __('Paragraphs Color', 'neuron-core'),
	'description' => __('Change the color of all paragraphs.', 'neuron-core'),
	'section'     => 'style_options',
	'default'     => '#959595',
));
Kirki::add_field('neuron_kirki', array(
	'type'        => 'color',
	'settings'    => 'style_border_color',
	'label'       => __('Border Color', 'neuron-core'),
	'description' => __('Change the color of the thin borders.', 'neuron-core'),
	'section'     => 'style_options',
	'default'     => '#ededed',
));
Kirki::add_field('neuron_kirki', array(
	'type'        => 'color',
	'settings'    => 'style_pattern_color',
	'label'       => __('Pattern Color', 'neuron-core'),
	'description' => __('Change the color of the patterns.', 'neuron-core'),
	'section'     => 'style_options',
	'default'     => '#f6f6f6',
));
Kirki::add_field('neuron_kirki', array(
	'type'        => 'color',
	'settings'    => 'style_warnings_color',
	'label'       => __('Warnings Color', 'neuron-core'),
	'description' => __('Change the color of the warnings.', 'neuron-core'),
	'section'     => 'style_options',
	'default'     => '#c7004c',
));
Kirki::add_field('neuron_kirki', array(
	'type'        => 'color',
	'settings'    => 'style_light_color',
	'label'       => __('Light Color', 'neuron-core'),
	'description' => __('Change the color of the light.', 'neuron-core'),
	'section'     => 'style_options',
	'default'     => '#FFFFFF',
));