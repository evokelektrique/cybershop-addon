<?php
namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopProductAddToCart extends Widget_Base {

	// Slug
	public function get_name() {
		return 'cybershop-product-add-to-cart';
	}

	// Title
	public function get_title() {
		return __( 'افزودن به سبد', 'cybershop' );
	}

	// Icon
	public function get_icon() {
		return 'fab fa-amilia fa-spin';
	}

	// Category
	public function get_categories() {
		return ['cybershop-single-product'];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_atc_button_style',
			[
				'label' => __( 'Button', 'cybershop' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		$this->add_control(
			'development_status',
			[
				'label' => __( 'حالت ویرایش', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'پروداکشن', 'cybershop' ),
				'label_on' => __( 'تست', 'cybershop' ),
				'default' => 'yes',
				'return_value' => 'yes',
			]
		);

		$this->add_responsive_control(
			'alignment',
			[
				'label' => __( 'Alignment', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'cybershop' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'cybershop' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'cybershop' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justified', 'cybershop' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'prefix_class' => 'elementor-add-to-cart%s--align-',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .cart button',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'button_border',
				'selector' => '{{WRAPPER}} .cart button',
				'exclude' => [ 'color' ],
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label' => __( 'Border Radius', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .cart button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_padding',
			[
				'label' => __( 'Padding', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cart button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'button_style_tabs' );

		$this->start_controls_tab( 'button_style_normal',
			[
				'label' => __( 'Normal', 'cybershop' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' => __( 'Text Color', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cart button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_bg_color',
			[
				'label' => __( 'Background Color', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cart button' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_border_color',
			[
				'label' => __( 'Border Color', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cart button' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'button_style_hover',
			[
				'label' => __( 'Hover', 'cybershop' ),
			]
		);

		$this->add_control(
			'button_text_color_hover',
			[
				'label' => __( 'Text Color', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cart button:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_bg_color_hover',
			[
				'label' => __( 'Background Color', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cart button:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_border_color_hover',
			[
				'label' => __( 'Border Color', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cart button:hover' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_transition',
			[
				'label' => __( 'Transition Duration', 'cybershop' ),
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
					'{{WRAPPER}} .cart button' => 'transition: all {{SIZE}}s',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_atc_quantity_style',
			[
				'label' => __( 'Quantity', 'cybershop' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Display
		$this->add_control(
			'quantity_layout_display',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'flex' => __( 'فلکس', 'cybershop' ),
					'none' => __( 'هیچ', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .quantity' => 'display: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'spacing',
			[
				'label' => __( 'Spacing', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'body:not(.rtl) {{WRAPPER}} .quantity + .button' => 'margin-left: {{SIZE}}{{UNIT}}',
					'body.rtl {{WRAPPER}} .quantity + .button' => 'margin-right: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'quantity_typography',
				'selector' => '{{WRAPPER}} .quantity .qty',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'quantity_border',
				'selector' => '{{WRAPPER}} .quantity .qty',
				'exclude' => [ 'color' ],
			]
		);

		$this->add_control(
			'quantity_border_radius',
			[
				'label' => __( 'Border Radius', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .quantity .qty' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'quantity_padding',
			[
				'label' => __( 'Padding', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .quantity .qty' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'quantity_style_tabs' );

		$this->start_controls_tab( 'quantity_style_normal',
			[
				'label' => __( 'Normal', 'cybershop' ),
			]
		);

		$this->add_control(
			'quantity_text_color',
			[
				'label' => __( 'Text Color', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quantity .qty' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'quantity_bg_color',
			[
				'label' => __( 'Background Color', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quantity .qty' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'quantity_border_color',
			[
				'label' => __( 'Border Color', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quantity .qty' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'quantity_style_focus',
			[
				'label' => __( 'Focus', 'cybershop' ),
			]
		);

		$this->add_control(
			'quantity_text_color_focus',
			[
				'label' => __( 'Text Color', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quantity .qty:focus' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'quantity_bg_color_focus',
			[
				'label' => __( 'Background Color', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quantity .qty:focus' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'quantity_border_color_focus',
			[
				'label' => __( 'Border Color', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quantity .qty:focus' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'quantity_transition',
			[
				'label' => __( 'Transition Duration', 'cybershop' ),
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
					'{{WRAPPER}} .quantity .qty' => 'transition: all {{SIZE}}s',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		$this->start_controls_section(
			'section_atc_variations_style',
			[
				'label' => __( 'Variations', 'cybershop' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'variations_width',
			[
				'label' => __( 'Width', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'default' => [
					'unit' => '%',
				],
				'selectors' => [
					'.woocommerce {{WRAPPER}} form.cart .variations' => 'width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'variations_spacing',
			[
				'label' => __( 'Spacing', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'.woocommerce {{WRAPPER}} form.cart .variations' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'variations_space_between',
			[
				'label' => __( 'Space Between', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'.woocommerce {{WRAPPER}} form.cart table.variations tr:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'heading_variations_label_style',
			[
				'label' => __( 'Label', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'variations_label_color_focus',
			[
				'label' => __( 'Color', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.woocommerce {{WRAPPER}} form.cart table.variations label' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'variations_label_typography',
				'selector' => '.woocommerce {{WRAPPER}} form.cart table.variations label',
			]
		);

		$this->add_control(
			'heading_variations_select_style',
			[
				'label' => __( 'Select field', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'variations_select_color',
			[
				'label' => __( 'Color', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.woocommerce {{WRAPPER}} form.cart table.variations td.value select' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'variations_select_bg_color',
			[
				'label' => __( 'Background Color', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.woocommerce {{WRAPPER}} form.cart table.variations td.value select' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'variations_select_border_color',
			[
				'label' => __( 'Border Color', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.woocommerce {{WRAPPER}} form.cart table.variations td.value select' => 'border: 1px solid {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'variations_select_typography',
				'selector' => '.woocommerce {{WRAPPER}} form.cart table.variations td.value select, .woocommerce div.product.elementor{{WRAPPER}} form.cart table.variations td.value:before',
			]
		);

		$this->add_control(
			'variations_select_border_radius',
			[
				'label' => __( 'Border Radius', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'.woocommerce {{WRAPPER}} form.cart table.variations td.value select' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		// 
		// Prices
		// 
		$this->start_controls_section(

			'section_prices',
			[
				'label' => __( 'قیمت ها', 'cybershop' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'prices_layout_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'پوسته', 'cybershop' ),
				'separator' => 'before',
			]
		);

		// Display Flex
		$this->add_control(
			'prices_layout_display',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'flex' => __( 'فلکس', 'cybershop' ),
					'none' => __( 'هیچ', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-variation' => 'display: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'additional_information_vertical_align',
			[
				'label' => __( 'حالت نمایش جزعیات', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'center',
				'options' => [
					'baseline' 		=> __( 'baseline', 'cybershop' ),
					'top' 			=> __( 'top', 'cybershop' ),
					'flex-start' 	=> __( 'flex-start', 'cybershop' ),
					'center' 		=> __( 'center', 'cybershop' ),
					'end' 			=> __( 'end', 'cybershop' ),
					'flex-end' 		=> __( 'flex-end', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-variation' => 'align-items: {{VALUE}}',
				],
				'condition' => [
					'prices_layout_display' => 'flex',
				],
			]
		);

		// Justify Content
		$this->add_control(
			'prices_layout_justify_content',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'space-between',
				'options' => [
					'space-between' => __( 'space-between', 'cybershop' ),
					'space-around' 	=> __( 'space-around', 'cybershop' ),
					'space-evenly' 	=> __( 'space-evenly', 'cybershop' ),
					'flex-start' 		=> __( 'flex-start', 'cybershop' ),
					'center' 		=> __( 'center', 'cybershop' ),
					'end' 			=> __( 'end', 'cybershop' ),
					'flex-end' 		=> __( 'flex-end', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-variation' => 'justify-content: {{VALUE}}',
				],
				'condition' => [
					'prices_layout_display' => 'flex',
				],
			]
		);

		// Flex Direction
		$this->add_control(
			'prices_layout_flex_direction',
			[
				'label' => __( 'حالت چیدمان', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'row',
				'options' => [
					'column' 			=> __( 'column', 'cybershop' ),
					'column-reverse' 	=> __( 'column-reverse', 'cybershop' ),
					'row' 				=> __( 'row', 'cybershop' ),
					'row-reverse' 		=> __( 'row-reverse', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-variation' => 'flex-direction: {{VALUE}}',
				],
				'condition' => [
					'prices_layout_display' => 'flex',
				],
			]
		);


		// 
		// Discount Price
		// 
		$this->add_control(
			'discount_price',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'قیمت تخفیف', 'cybershop' ),
				'separator' => 'before',
			]
		);
		// Discount Color
		$this->add_control(
			'discount_price_color_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'رنگ', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_control(
			'discount_price_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price del' => 'color: {{VALUE}}',
				],
			]
		);

		// Discount Background
		$this->add_control(
			'discount_price_background_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'پس زمینه', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'discount_price_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .price del',
			]
		);

		// Discount Text Shadow
		$this->add_control(
			'discount_price_text_shadow_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'سایه متن', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'discount_price_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .price del',
			]
		);

		// Discount Box Shadow
		$this->add_control(
			'discount_price_box_shadow_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'سایه باکس', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'discount_price_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .price del',
			]
		);

		// Discount Typography
		$this->add_control(
			'discount_price_typography_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'discount_price_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .price del',
			]
		);

		// Discount Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'label' => __( 'حاشیه', 'cybershop' ),
				'name' => 'discount_price_border',
				'selector' => '{{WRAPPER}} .price del',
			]
		);

		// Discount Border
		$this->add_control(
			'discount_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .price del' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		// Discount Margin
		$this->add_responsive_control(
			'discount_price_margin',
			[
				'label' => __( 'مارجین', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .price del' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		// Discount Padding
		$this->add_responsive_control(
			'discount_price_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .price del' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		// 
		// Regular Price
		// 
		$this->add_control(
			'regular_price',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'قیمت معمولی', 'cybershop' ),
				'separator' => 'before',
			]
		);
		// Regular Color
		$this->add_control(
			'regular_price_color_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'رنگ', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_control(
			'regular_price_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .price ins' => 'color: {{VALUE}}',
				],
			]
		);

		// Regular Background
		$this->add_control(
			'regular_price_background_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'پس زمینه', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'regular_price_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .price ins',
			]
		);

		// Regular Text Shadow
		$this->add_control(
			'regular_price_text_shadow_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'سایه متن', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'regular_price_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .price ins',
			]
		);

		// Regular Box Shadow
		$this->add_control(
			'regular_price_box_shadow_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'سایه باکس', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'regular_price_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .price ins',
			]
		);

		// Regular Typography
		$this->add_control(
			'regular_price_typography_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'regular_price_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .price ins',
			]
		);

		// Regular Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'label' => __( 'حاشیه', 'cybershop' ),
				'name' => 'regular_price_border',
				'selector' => '{{WRAPPER}} .price ins',
			]
		);

		// Regular Border
		$this->add_control(
			'regular_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .price ins' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		
		// Regular Margin
		$this->add_responsive_control(
			'regular_price_margin',
			[
				'label' => __( 'مارجین', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .price ins' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		// Regular Padding
		$this->add_responsive_control(
			'regular_price_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .price ins' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);


		// 
		// InStock Price
		// 
		$this->add_control(
			'in_stock_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'موجودی انبار', 'cybershop' ),
				'separator' => 'before',
			]
		);

		// InStock Display
		$this->add_control(
			'in_stock_display',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'flex' => __( 'فلکس', 'cybershop' ),
					'none' => __( 'هیچ', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-variation-availability .stock.in-stock' => 'display: {{VALUE}}',
				],
			]
		);

		// InStock Color
		$this->add_control(
			'in_stock_color_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'رنگ', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_control(
			'in_stock_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-variation-availability .stock.in-stock' => 'color: {{VALUE}}',
				],
			]
		);

		// InStock Background
		$this->add_control(
			'in_stock_background_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'پس زمینه', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'in_stock_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .woocommerce-variation-availability .stock.in-stock',
			]
		);

		// InStock Text Shadow
		$this->add_control(
			'in_stock_text_shadow_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'سایه متن', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'in_stock_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-variation-availability .stock.in-stock',
			]
		);

		// InStock Box Shadow
		$this->add_control(
			'in_stock_box_shadow_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'سایه باکس', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'in_stock_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-variation-availability .stock.in-stock',
			]
		);

		// InStock Typography
		$this->add_control(
			'in_stock_typography_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'in_stock_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .woocommerce-variation-availability .stock.in-stock',
			]
		);

		// InStock Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'label' => __( 'حاشیه', 'cybershop' ),
				'name' => 'in_stock_border',
				'selector' => '{{WRAPPER}} .woocommerce-variation-availability .stock.in-stock',
			]
		);

		// InStock Border
		$this->add_control(
			'in_stock_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-variation-availability .stock.in-stock' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		
		// InStock Margin
		$this->add_responsive_control(
			'in_stock_margin',
			[
				'label' => __( 'مارجین', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-variation-availability .stock.in-stock' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		// InStock Padding
		$this->add_responsive_control(
			'in_stock_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-variation-availability .stock.in-stock' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		// 
		// OutOfStock Price
		// 
		$this->add_control(
			'out_of_stock_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'ناموجودی انبار', 'cybershop' ),
				'separator' => 'before',
			]
		);

		// InStock Display
		$this->add_control(
			'out_of_stock_display',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'flex' => __( 'فلکس', 'cybershop' ),
					'none' => __( 'هیچ', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-variation-availability .stock.out-of-stock' => 'display: {{VALUE}}',
				],
			]
		);

		// OutOfStock Color
		$this->add_control(
			'out_of_stock_color_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'رنگ', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_control(
			'out_of_stock_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-variation-availability .stock.out-of-stock' => 'color: {{VALUE}}',
				],
			]
		);

		// OutOfStock Background
		$this->add_control(
			'out_of_stock_background_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'پس زمینه', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'out_of_stock_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .woocommerce-variation-availability .stock.out-of-stock',
			]
		);

		// OutOfStock Text Shadow
		$this->add_control(
			'out_of_stock_text_shadow_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'سایه متن', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'out_of_stock_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-variation-availability .stock.out-of-stock',
			]
		);

		// OutOfStock Box Shadow
		$this->add_control(
			'out_of_stock_box_shadow_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'سایه باکس', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'out_of_stock_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-variation-availability .stock.out-of-stock',
			]
		);

		// OutOfStock Typography
		$this->add_control(
			'out_of_stock_typography_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'out_of_stock_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .woocommerce-variation-availability .stock.out-of-stock',
			]
		);

		// OutOfStock Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'label' => __( 'حاشیه', 'cybershop' ),
				'name' => 'out_of_stock_border',
				'selector' => '{{WRAPPER}} .woocommerce-variation-availability .stock.out-of-stock',
			]
		);

		// OutOfStock Border
		$this->add_control(
			'out_of_stock_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-variation-availability .stock.out-of-stock' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		
		// OutOfStock Margin
		$this->add_responsive_control(
			'out_of_stock_margin',
			[
				'label' => __( 'مارجین', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-variation-availability .stock.out-of-stock' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		// OutOfStock Padding
		$this->add_responsive_control(
			'out_of_stock_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-variation-availability .stock.out-of-stock' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section(); // END PRICES
	}

	protected function render() {
		global $product;

		$settings = $this->get_settings();

		$product = wc_get_product();

		if ( empty( $product ) ) {
			return;
		}
		?>
		<?php if($settings['development_status'] === 'yes'): ?>
			<?php $this->development_html() ?>
		<?php else: ?>
		<div class="elementor-add-to-cart elementor-product-<?php echo esc_attr( wc_get_product()->get_type() ); ?>">
			<?php woocommerce_template_single_add_to_cart(); ?>
		</div>
		<?php endif; ?>
		<?php
	}

	public function render_plain_content() {}

	private function development_html() {
		?>
		<form class="variations_form cart" method="post" enctype="multipart/form-data" data-product_id="87" current-image="80">
			<table class="variations" cellspacing="0">
				<tbody>
					<tr>
						<td class="label">
							<label>نام ویژگی شماره 1</label>
						</td>
						<td class="value">
							<select>
								<option value="">یک گزینه را انتخاب کنید</option>
								<option value="مقدار ویژگی شماره 1" class="attached enabled">مقدار ویژگی شماره 1</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="label">
							<label>نام ویژگی شماره 2</label>
						</td>
						<td class="value">
							<select>
								<option value="">یک گزینه را انتخاب کنید</option>
								<option value="مقدار ویژگی شماره 2" class="attached enabled">مقدار ویژگی شماره 2</option>
								<option value="یا شماره دیگر" class="attached enabled">یا شماره دیگر</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="label">
							<label>نام ویژگی شماره 3</label>
						</td>
						<td class="value">
							<select>
								<option value="">یک گزینه را انتخاب کنید</option>
								<option value="مقدار ویژگی شماره 3" class="attached enabled">مقدار ویژگی شماره 3</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="label">
							<label for="pa_color">رنگ</label>
						</td>
						<td class="value">
							<select id="pa_color" class="" name="attribute_pa_color" data-attribute_name="attribute_pa_color" data-show_option_none="yes">
								<option value="">یک گزینه را انتخاب کنید</option>
								<option value="blue" class="attached enabled">آبی</option>
								<option value="red" class="attached enabled">قرمز</option>
							</select><a class="reset_variations" href="#" style="visibility: visible;">صاف</a>	
						</td>
					</tr>
				</tbody>
			</table>
			<div class="single_variation_wrap">
				<div class="woocommerce-variation single_variation" style="">
					<div class="woocommerce-variation-description"></div>
					<div class="woocommerce-variation-price"><span class="price"><del><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">ریال</span>10,000.00</bdi>
						</span>
						</del> <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">ریال</span>9,000.00</bdi></span></ins>
						</span>
					</div>
					<div class="woocommerce-variation-availability">
						<p class="stock in-stock">5 در انبار</p>
						<p class="stock out-of-stock">5 در انبار</p>
					</div>
				</div>
				<div class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-enabled">
					<div class="quantity hidden" style="display: none;">
						<input type="hidden" id="quantity_606c47b8c5ba0" class="qty" name="quantity" value="1" min="1" max="">
					</div>
					<div class="quantity">
						<label class="screen-reader-text" for="quantity_606f09837f216">
							محصول شماره 5 عدد
						</label>
						<input type="number" id="quantity_606f09837f216" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="تعداد" size="4" placeholder="" inputmode="numeric">
					</div>
					<button type="submit" class="single_add_to_cart_button button alt">افزودن به سبد خرید</button>
					<input type="hidden" name="add-to-cart" value="87">
					<input type="hidden" name="product_id" value="87">
					<input type="hidden" name="variation_id" class="variation_id" value="534">
				</div>
			</div>
		</form>
		<?php
	}

}
