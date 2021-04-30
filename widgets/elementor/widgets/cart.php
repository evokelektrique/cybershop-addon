<?php

namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopCart extends Widget_Base {

	// Slug
	public function get_name() {
		return 'cybershop-cart';
	}

	// Title
	public function get_title() {
		return __('Cart', 'cybershop');
	}

	// Icon
	public function get_icon() {
		return 'fab fa-amilia fa-spin';
	}

	// Category
	public function get_categories() {
		return ['cybershop'];
	}

	// Controls/Options Registration
	public function _register_controls() {
		
		// =======================================================
		// Colors Section
		$this->start_controls_section(
			'section_colors', [
				'label' => __('رنگ', 'cybershop')
			]
		);
		// Start Controls

		$this->add_control(
			'icons_divider',
			[
				'label' => __( 'آیکون', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Icons color
		$this->add_control(
			'icons_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}}' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'icons_counter_divider',
			[
				'label' => __( 'شمارنده', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Icons Counter color
		$this->add_control(
			'icons_counter_color',
			[
				'label' => __( 'متن ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icons_counter' => 'color: {{VALUE}};',
				],
			]
		);

		// Icons Counter background color
		$this->add_control(
			'icons_counter_background_color',
			[
				'label' => __( 'پس زمینه ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icons_counter' => 'background-color: {{VALUE}};',
				],
			]
		);

		// Icons Counter border color
		$this->add_control(
			'icons_counter_border_color',
			[
				'label' => __( 'حاشیه', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .icons_counter' => 'border-color: {{VALUE}};',
				],
			]
		);

		// =======================================================
		// Dropdown Divider

		$this->add_control(
			'dropdown_divider',
			[
				'label' => __( 'سبد خرید', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Dropdown background color
		$this->add_control(
			'dropdown_background_color',
			[
				'label' => __( 'پس زمینه', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .dropdown-content' => 'background-color: {{VALUE}};',
				],
			]
		);

		// Dropdown items title color
		$this->add_control(
			'dropdown_items_title_color',
			[
				'label' => __( 'عنوان', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .dropdown-content li a:not(.remove)' => 'color: {{VALUE}};',
					'{{WRAPPER}} .dropdown-content .total *' => 'color: {{VALUE}};',
				],
			]
		);


		// Quantity
		$this->add_control(
			'quantity_heading',
			[
				'label' => __( 'مقدار', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Quantity display
		$this->add_control(
			'quantity_display',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'flex' => __( 'فلکس', 'cybershop' ),
				],
			]
		);

		// Quantity color
		$this->add_control(
			'dropdown_items_quantity_color',
			[
				'label' => __( 'مقدار', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .dropdown-content .quantity' => 'color: {{VALUE}};',
				],
			]
		);


		// Quantity Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'quantity_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .quantity',
			]
		);

		// // Quantity Margin
		// $this->add_responsive_control(
		// 	'quantity_margin',
		// 	[
		// 		'label' => __( 'فاصله', 'cybershop' ),
		// 		'type' => Controls_Manager::DIMENSIONS,
		// 		'size_units' => [ 'px', '%', 'em' ],
		// 		'selectors' => [
		// 			'{{WRAPPER}} .quantity' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 		],
		// 	]
		// );

		// // Quantity Padding
		// $this->add_responsive_control(
		// 	'quantity_padding',
		// 	[
		// 		'label' => __( 'پدینگ', 'cybershop' ),
		// 		'type' => Controls_Manager::DIMENSIONS,
		// 		'size_units' => [ 'px', '%', 'em' ],
		// 		'selectors' => [
		// 			'{{WRAPPER}} .quantity' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 		],
		// 	]
		// );


		// Variation
		$this->add_control(
			'variation_heading',
			[
				'label' => __( 'متغییر ها', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Variation Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'variation_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .variation',
			]
		);

		// Variation Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'variation_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .variation',
			]
		);

		// Variation Border Radius
		$this->add_control(
			'variation_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .variation' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		// Variation color
		$this->add_control(
			'variation_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .variation' => 'color: {{VALUE}};',
				],
			]
		);

		// Variation value color
		$this->add_control(
			'variation_value_color',
			[
				'label' => __( 'رنگ مقدار', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Core\Schemes\Color::get_type(),
					'value' => \Elementor\Core\Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .variation dd' => 'color: {{VALUE}};',
				],
			]
		);

		// Variation Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'variation_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .variation',
			]
		);

		// Variation Margin
		$this->add_responsive_control(
			'variation_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .variation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Variation Padding
		$this->add_responsive_control(
			'variation_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .variation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		// 
		// Buttons
		// 

		// Checkout
		$this->add_control(
			'checkout_heading',
			[
				'label' => __( 'تسویه حساب', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs( 'checkout_button_style' );

		// NORMAL
		$this->start_controls_tab( 'normal_checkout_button_style',
			[
				'label' => __( 'عادی', 'cybershop' ),
			]
		);
		$this->add_control(
			'checkout_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.checkout' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'checkout_background',
			[
				'label' => __( 'پس زمینه', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.checkout' => 'background: {{VALUE}} !important',
				],
			]
		);

		// Checkout Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'checkout_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .buttons .button.checkout',
			]
		);

		$this->add_responsive_control(
			'checkout_typography',
			[
				'label' => __( 'اندازه فونت', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.checkout' => 'font-size: {{SIZE}}{{UNIT}} !important',
				],
			]
		);

		$this->add_control(
			'checkout_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.checkout' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'checkout_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.checkout' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'checkout_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.checkout' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);
		$this->end_controls_tab();

		// HOVER
		$this->start_controls_tab( 'hover_checkout_button_style',
			[
				'label' => __( 'هاور', 'cybershop' ),
			]
		);

		$this->add_responsive_control(
			'checkout_transition_duration',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.2,
				],
				'range' => [
					'px' => [
						'max' => 2,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.checkout' => 'transition: all {{SIZE}}s',
				],
			]
		);

		$this->add_control(
			'hover_checkout_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.checkout:hover' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'hover_checkout_background',
			[
				'label' => __( 'پس زمینه', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.checkout:hover' => 'background: {{VALUE}} !important',
				],
			]
		);

		// Checkout Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hover_checkout_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .buttons .button.checkout:hover',
			]
		);

		$this->add_responsive_control(
			'hover_checkout_typography',
			[
				'label' => __( 'اندازه فونت', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.checkout:hover' => 'font-size: {{SIZE}}{{UNIT}} !important',
				],
			]
		);

		$this->add_control(
			'hover_checkout_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.checkout:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'hover_checkout_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.checkout:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'hover_checkout_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.checkout:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);
		
		$this->end_controls_tabs();


		// ViewCart
		$this->add_control(
			'view_cart_heading',
			[
				'label' => __( 'مشاهده سبد خرید', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs( 'view_cart_button_style' );

		// NORMAL
		$this->start_controls_tab( 'normal_view_cart_button_style',
			[
				'label' => __( 'عادی', 'cybershop' ),
			]
		);
		$this->add_control(
			'view_cart_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.view_cart' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'view_cart_background',
			[
				'label' => __( 'پس زمینه', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.view_cart' => 'background: {{VALUE}} !important',
				],
			]
		);

		// Checkout Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'view_cart_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .buttons .button.view_cart',
			]
		);

		$this->add_responsive_control(
			'view_cart_typography',
			[
				'label' => __( 'اندازه فونت', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.view_cart' => 'font-size: {{SIZE}}{{UNIT}} !important',
				],
			]
		);

		$this->add_control(
			'view_cart_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.view_cart' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'view_cart_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.view_cart' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'view_cart_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.view_cart' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);
		$this->end_controls_tab();

		// HOVER
		$this->start_controls_tab( 'hover_view_cart_button_style',
			[
				'label' => __( 'هاور', 'cybershop' ),
			]
		);

		$this->add_responsive_control(
			'view_cart_transition_duration',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 0.2,
				],
				'range' => [
					'px' => [
						'max' => 2,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.view_cart' => 'transition: all {{SIZE}}s',
				],
			]
		);

		$this->add_control(
			'hover_view_cart_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.view_cart:hover' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'hover_view_cart_background',
			[
				'label' => __( 'پس زمینه', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.view_cart:hover' => 'background: {{VALUE}} !important',
				],
			]
		);

		// Checkout Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hover_view_cart_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .buttons .button.view_cart:hover',
			]
		);

		$this->add_responsive_control(
			'hover_view_cart_typography',
			[
				'label' => __( 'اندازه فونت', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.view_cart:hover' => 'font-size: {{SIZE}}{{UNIT}} !important',
				],
			]
		);

		$this->add_control(
			'hover_view_cart_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.view_cart:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'hover_view_cart_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.view_cart:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'hover_view_cart_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .buttons .button.view_cart:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);
		
		$this->end_controls_tabs();



		// End Controls
		$this->end_controls_section();	



		// =======================================================
		// Options Section
		// Start Controls
		$this->start_controls_section(
			'section_content', [
				'label' => __('تنظیمات', 'cybershop')
			]
		);

		$this->add_control(
			'is_left',
			[
				'label' => __( 'جهت منوی سبد خرید سمت چپ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'فعال', 'cybershop' ),
				'label_off' => __( 'غیر فعال', 'cybershop' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);	

		$this->add_control(
			'show_wishlist',
			[
				'label' => __( 'دکمه لیست علاقه مندی ها', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'نمایش', 'cybershop' ),
				'label_off' => __( 'پنهان', 'cybershop' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);	

		$this->add_control(
			'show_compare',
			[
				'label' => __( 'دکمه لیست مقایسه', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'نمایش', 'cybershop' ),
				'label_off' => __( 'پنهان', 'cybershop' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);		

		// End Controls
		$this->end_controls_section();	
	}

	// PHP-RENDER
	public function render() {

		// Get Settings
		$settings  = $this->get_settings_for_display();
		?>
		<div class="align-items-center is-flex place-content-center-space-between ">
			<?php if($settings['show_compare'] === 'yes'): ?>
				<div class="is-inline-flex show-modal" data-target="wishlist-modal">
					<i class="fa fa-cogs"></i>
				</div>
			<?php endif; ?>
			<?php if($settings['show_wishlist'] === 'yes'): ?>
				<div class="is-inline-flex show-modal" data-target="wishlist-modal">
					<i class="fa fa-home"></i>
				</div>
			<?php endif; ?>
			<?php if(\Cybershop::is_woocommerce_activated()): ?>
					<div class="dropdown <?= $settings['is_left'] === 'yes' ? 'is-left' : '' ?> is-hoverable align-items-center cursor-pointer">
						<div class="dropdown-trigger">
							<div class="cybershop-mini-cart-total-container">
								(<span class="cybershop-mini-cart-total"><?= \WC()->cart->total ?></span>)
							</div>
						</div>
						<span class="icon is-small is-relative mr-2">
							<i class="fa fa-shopping-cart"></i>
							<span class="icons_counter cybershop-mini-cart-contents-count"><?= \WC()->cart->cart_contents_count ?></span>
						</span>
						<div class="dropdown-menu" id= role="menu">
							<div class="dropdown-content">
								<div class="dropdown-item" class="cybershop-mini-cart">
									<div class="widget_shopping_cart_content">
										<?php woocommerce_mini_cart() ?>
									</div>
								</div>
							</div>
						</div>
					</div>
			<?php endif; ?>
		</div>

		<?php
	}
}
