<?php

class PAFE_Responsive_Section_Column_Text_Align extends \Elementor\Widget_Base {

	public function __construct() {
		parent::__construct();
		$this->init();
	}

	public function get_name() {
		return 'pafe-responsive-section-column-text-align';
	}

	public function register_controls( $element, $args ) {

		$element->start_controls_section(
			'pafe_responsive_section_column_text_align_section',
			[
				'label' => __( 'PAFE Responsive Section Column Text Align', 'pafe' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$element->add_responsive_control(
			'pafe_responsive_section_column_text_align',
			[
				'label' => __( 'Text Align', 'elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
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
				],
				'selectors' => [
					'{{WRAPPER}} > .elementor-container' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} > .elementor-element-populated' => 'text-align: {{VALUE}};',
				],
			]
		);

		$element->end_controls_section();
	}

	protected function init() {
		add_action( 'elementor/element/section/section_typo/after_section_end', [ $this, 'register_controls' ], 10, 2 );
		add_action( 'elementor/element/column/section_typo/after_section_end', [ $this, 'register_controls' ], 10, 2 );
	}

}