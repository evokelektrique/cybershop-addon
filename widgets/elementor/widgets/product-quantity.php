<?php

namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopProductQuantity extends Widget_Base {

	// Slug
	public function get_name() {
		return 'cybershop-product-quantity';
	}

	// Title
	public function get_title() {
		return __('استوک محصول', 'cybershop');
	}

	// Icon
	public function get_icon() {
		return 'fab fa-amilia fa-spin';
	}

	// Category
	public function get_categories() {
		return ['cybershop-single-product'];
	}

	// Controls/Options Registration
	public function _register_controls() {

		// Start Controls
		// =============================================================
		// Wrapper
		$this->start_controls_section(
			'section_stock_style',
			[
				'label' => __( 'استوک', 'cybershop' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text',
			[
				'label' => __( 'متن', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '%d محصول در انبار', 'cybershop' ),
				'placeholder' => __( 'مقدار %d تعداد محصول می باشد', 'cybershop' ),
			]
		);

		$this->add_control(
			'tag',
			[
				'label' => __( 'تگ HTML', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'h1',
				'options' => [
					'h1' => __( 'h1', 'cybershop' ),
					'h2' 	=> __( 'h2', 'cybershop' ),
					'h3' 	=> __( 'h3', 'cybershop' ),
					'h4' 	=> __( 'h4', 'cybershop' ),
					'h5' 	=> __( 'h5', 'cybershop' ),
					'h6' 	=> __( 'h6', 'cybershop' ),
					'span' 	=> __( 'span', 'cybershop' ),
					'div' 	=> __( 'div', 'cybershop' ),
				],
			]
		);

		$this->add_control(
			'quantity_display',
			[
				'label' => __( 'حالت نمایش استوک', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'flex' => __( 'فلکس', 'cybershop' ),
				],
			]
		);

		$this->start_controls_tabs( 'tabs_stock_style' );
		// "Wrapper" Tab
		$this->start_controls_tab(
			'tab_stock_normal',
			[
				'label' => __( 'عادی', 'cybershop' ),
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'stock_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} #cybershop_product_stock_quantity',
			]
		);		

		$this->add_control(
			'stock_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} #cybershop_product_stock_quantity' => 'color: {{VALUE}}',
				]
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'stock_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} #cybershop_product_stock_quantity',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'stock_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} #cybershop_product_stock_quantity',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'stock_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} #cybershop_product_stock_quantity',
			]
		);

		$this->add_responsive_control(
			'stock_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} #cybershop_product_stock_quantity' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'stock_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} #cybershop_product_stock_quantity' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'stock_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} #cybershop_product_stock_quantity' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab(); // End "Wrapper" Tab
		// "Wrapper (Hover)" Tab
		$this->start_controls_tab(
			'tab_stock_hover',
			[
				'label' => __( 'هاور', 'cybershop' ),
			]
		);

		// Background Hover
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'stock_hover_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} #cybershop_product_stock_quantity:hover',
			]
		);		

		$this->add_control(
			'stock_hover_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} #cybershop_product_stock_quantity:hover' => 'color: {{VALUE}}',
				]
			]
		);

		// Box Shadow Hover
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'stock_hover_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} #cybershop_product_stock_quantity:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'stock_text_shadow_hover',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} #cybershop_product_stock_quantity:hover',
			]
		);
		
		// Border Hover
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'stock_hover_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} #cybershop_product_stock_quantity:hover',
			]
		);

		// Border Radius Hover
		$this->add_responsive_control(
			'stock_hover_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} #cybershop_product_stock_quantity:hover' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		// Margin Hover
		$this->add_responsive_control(
			'stock_hover_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} #cybershop_product_stock_quantity:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Padding Hover
		$this->add_responsive_control(
			'stock_hover_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} #cybershop_product_stock_quantity:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab(); // End "Wrapper (Hover)" Tab

		$this->end_controls_tabs();
		// End "Wrapper" Controls
		$this->end_controls_section();	

	}

	// PHP-RENDER
	public function render() {
		$settings  = $this->get_settings_for_display();

		global $product;

		$product = wc_get_product();

		if ( empty( $product ) ) {
			return;
		}

		printf("<{$settings['tag']} class='is-{$settings['quantity_display']} has-transition-3' id='cybershop_product_stock_quantity'>{$settings['text']}</{$settings['tag']}>", $product->get_stock_quantity());
	}
}
