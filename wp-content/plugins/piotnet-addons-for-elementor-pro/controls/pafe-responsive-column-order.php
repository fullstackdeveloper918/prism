<?php
class PAFE_Responsive_Column_Order extends \Elementor\Widget_Base {

	public function __construct() {
		parent::__construct();
		$this->init();
	}

	public function get_name() {
		return 'pafe-responsive-column-order';
	}

	public function register_controls( $element, $section_id ) {

		$element->start_controls_section(
			'pafe_responsive_column_order_section',
			[
				'label' => __( 'PAFE Responsive Column Order', 'pafe' ),
				'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
			]
		);
		
		$element->add_responsive_control(
			'pafe_responsive_column_order',
			[
				'label' => __( 'Order', 'piotnet-addons-for-elementor' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'label_block' => true,
				'selectors' => [
					'{{WRAPPER}}' => '-webkit-order: {{VALUE}}; -ms-flex-order: {{VALUE}}; order: {{VALUE}};',
				],
			]
		);

		$element->end_controls_section();

	}

	protected function init() {
		add_action( 'elementor/element/column/layout/after_section_end', [ $this, 'register_controls' ], 10, 2 );
	}

}