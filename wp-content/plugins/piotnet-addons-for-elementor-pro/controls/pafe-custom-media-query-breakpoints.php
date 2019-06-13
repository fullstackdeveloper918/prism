<?php

class PAFE_Custom_Media_Query_Breakpoints extends \Elementor\Widget_Base {

	public function __construct() {
		parent::__construct();
		$this->init();
	}

	public function get_name() {
		return 'pafe-custom-media-query-breakpoints';
	}

	public function register_controls( $element, $args ) {

		$element->start_controls_section(
			'pafe_custom_media_query_breakpoints_section',
			[
				'label' => __( 'PAFE Custom Media Query Breakpoints', 'pafe' ),
				'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
			]
		);

		$element->add_control(
			'pafe_custom_media_query_breakpoints_enable',
			[
				'label' => __( 'Enable', 'pafe' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'description' => 'This feature only works on the frontend.',
				'default' => '',
				'label_on' => 'Yes',
				'label_off' => 'No',
				'return_value' => 'yes',
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'pafe_custom_media_query_breakpoints_note',
			[
				'label' => __( 'Important Note', 'pafe' ),
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'raw' => __( 'If the widget form is the first widget in the page or post, please add any other widget above it and hide this widget on desktop, tablet, mobile. Then update page or post and refresh your browser.', 'pafe' ),
			]
		);

		$repeater->add_control(
			'pafe_custom_media_query_breakpoints_min_width',
			[
				'label' => __( 'Min Width (px)', 'pafe' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 2000,
				'step' => 1,
				'default' => 0,
			]
		);

		$repeater->add_control(
			'pafe_custom_media_query_breakpoints_max_width',
			[
				'label' => __( 'Max Width (px)', 'pafe' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 2000,
				'step' => 1,
				'default' => 1200,
			]
		);

		$repeater->add_control(
			'pafe_custom_media_query_breakpoints_hide',
			[
				'label' => __( 'Hide', 'pafe' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => '',
				'label_on' => 'Yes',
				'label_off' => 'No',
				'return_value' => 'yes',
			]
		);

		$repeater->add_control(
			'pafe_custom_media_query_breakpoints_width',
			[
				'label' => __( 'Width (%)', 'pafe' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 1,
			]
		);

		$repeater->add_control(
			'pafe_custom_media_query_breakpoints_margin',
			[
				'label' => __( 'Margin', 'pafe' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
			]
		);

		$repeater->add_control(
			'pafe_custom_media_query_breakpoints_padding',
			[
				'label' => __( 'Padding', 'pafe' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
			]
		);

		$repeater->add_control(
			'pafe_custom_media_query_breakpoints_font_size',
			[
				'label' => _x( 'Font Size', 'Typography Control', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 200,
					],
				],
			]
		);

		$repeater->add_control(
			'pafe_custom_media_query_breakpoints_line_height',
			[
				'label' => _x( 'Line-Height', 'Typography Control', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'em',
				],
				'size_units' => [ 'px', 'em' ],
			]
		);

		$repeater->add_control(
			'pafe_custom_media_query_breakpoints_letter_spacing',
			[
				'label' => _x( 'Letter Spacing', 'Typography Control', 'elementor' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => -5,
						'max' => 10,
						'step' => 0.1,
					],
				],
			]
		);

		$repeater->add_control(
			'pafe_custom_media_query_breakpoints_align',
			[
				'label' => __( 'Alignment', 'elementor' ),
				'type' => Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'elementor' ),
						'icon' => 'fa fa-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'elementor' ),
						'icon' => 'fa fa-align-justify',
					],
				],
			]
		);

		$element->add_control(
			'pafe_custom_media_query_breakpoints_list',
			array(
				'type'    => Elementor\Controls_Manager::REPEATER,
				'fields'  => array_values( $repeater->get_controls() ),
				'title_field' => 'Min: {{{ pafe_custom_media_query_breakpoints_min_width }}}px - Max: {{{ pafe_custom_media_query_breakpoints_max_width }}}px',
			)
		);

		$element->end_controls_section();
	}

	public function before_render_element($element) {
		$settings = $element->get_settings();

		if ( ! empty( $settings['pafe_custom_media_query_breakpoints_enable'] ) ) {

			$css = '';

			if ( array_key_exists( 'pafe_custom_media_query_breakpoints_list',$settings ) ) {
				$list = $settings['pafe_custom_media_query_breakpoints_list'];
				if( !empty($list) ) {
					foreach ($list as $item) {
						$min_width = $item['pafe_custom_media_query_breakpoints_min_width'];
						$max_width = $item['pafe_custom_media_query_breakpoints_max_width'];
						$width = $item['pafe_custom_media_query_breakpoints_width'];
						$hide = $item['pafe_custom_media_query_breakpoints_hide'];
						$margin = $item['pafe_custom_media_query_breakpoints_margin'];
						$padding = $item['pafe_custom_media_query_breakpoints_padding'];
						$font_size = $item['pafe_custom_media_query_breakpoints_font_size'];
						$line_height = $item['pafe_custom_media_query_breakpoints_line_height'];
						$letter_spacing = $item['pafe_custom_media_query_breakpoints_letter_spacing'];
						$align = $item['pafe_custom_media_query_breakpoints_align'];

						if(!empty($min_width) || !empty($max_width)) {
							$css .= '@media ';
							if(!empty($min_width)) {
								$css .= "(min-width:". $min_width ."px)";
							}
							if(!empty($min_width) && !empty($max_width)) {
								$css .= " and ";
							}
							if(!empty($max_width)) {
								$css .= "(max-width:". $max_width ."px)";
							}
							$css .= " { [data-id='" . $element->get_id() . "'] { ";

							if(!empty($width)) {
								$css .= "width:". $width ."% !important;";
							}

							if(!empty($hide)) {
								$css .= "display:none !important;";
							}

							$css .= " } ";

							if(!empty($padding)) {
								$css .= " [data-id='" . $element->get_id() . "'] > .elementor-column-wrap, [data-id='". $element->get_id() ."'] > .elementor-widget-container { padding:". $padding[top] . $padding[unit] . " " . $padding[right] . $padding[unit] . " " . $padding[bottom] . $padding[unit] . " " . $padding[left] . $padding[unit] . " !important; }";
							}

							if(!empty($margin)) {
								$css .= " [data-id='" . $element->get_id() . "'] > .elementor-column-wrap, [data-id='". $element->get_id() ."'] > .elementor-widget-container { margin:". $margin[top] . $margin[unit] . " " . $margin[right] . $margin[unit] . " " . $margin[bottom] . $margin[unit] . " " . $margin[left] . $margin[unit] . " !important; }";
							}

							if(!empty($font_size[size])) {
								$css .= " [data-id='" . $element->get_id() . "'] * { font-size:". $font_size[size] . $font_size[unit] ."  !important; }";
							}

							if(!empty($line_height[size])) {
								$css .= " [data-id='" . $element->get_id() . "'] * { line-height:". $line_height[size] . $line_height[unit] ."  !important; }";
							}

							if(!empty($align)) {
								$css .= " [data-id='" . $element->get_id() . "'] * { text-align:". $align ."  !important; }";
							}

							$css .= " } ";

						}
						
					}
				}
			}

			if(!empty($css)) {
				$element->add_render_attribute( '_wrapper', [
					'data-pafe-custom-media-query-breakpoints' => $css,
				] );
			}			

		}
	}

	protected function init() {
		add_action( 'elementor/element/column/section_advanced/after_section_end', [ $this, 'register_controls' ], 10, 2 );
		add_action( 'elementor/element/common/_section_style/after_section_end', [ $this, 'register_controls' ], 10, 2 );
		add_action( 'elementor/frontend/widget/before_render', [ $this, 'before_render_element'], 10, 1 );
		add_action( 'elementor/frontend/column/before_render', [ $this, 'before_render_element'], 10, 1 );
	}

}