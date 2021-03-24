<?php

namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopProductTitle extends Widget_Base {

	// Slug
	public function get_name() {
		return 'cybershop-product-title';
	}

	// Title
	public function get_title() {
		return __('عنوان محصول', 'cybershop');
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
			'section_title_style',
			[
				'label' => __( 'عنوان', 'cybershop' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
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
			'stock_display',
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

		$this->start_controls_tabs( 'tabs_title_style' );
		// "Wrapper" Tab
		$this->start_controls_tab(
			'tab_title_normal',
			[
				'label' => __( 'عادی', 'cybershop' ),
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'title_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} #cybershop_single_product_title',
			]
		);		

		$this->add_control(
			'title_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} #cybershop_single_product_title' => 'color: {{VALUE}}',
				]
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'title_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} #cybershop_single_product_title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} #cybershop_single_product_title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'title_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} #cybershop_single_product_title',
			]
		);

		$this->add_responsive_control(
			'title_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} #cybershop_single_product_title' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'title_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} #cybershop_single_product_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'title_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} #cybershop_single_product_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab(); // End "Wrapper" Tab
		// "Wrapper (Hover)" Tab
		$this->start_controls_tab(
			'tab_title_hover',
			[
				'label' => __( 'هاور', 'cybershop' ),
			]
		);

		// Background Hover
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'title_hover_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} #cybershop_single_product_title:hover',
			]
		);		

		$this->add_control(
			'title_hover_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} #cybershop_single_product_title:hover' => 'color: {{VALUE}}',
				]
			]
		);

		// Box Shadow Hover
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'title_hover_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} #cybershop_single_product_title:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow_hover',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} #cybershop_single_product_title:hover',
			]
		);
		
		// Border Hover
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'title_hover_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} #cybershop_single_product_title:hover',
			]
		);

		// Border Radius Hover
		$this->add_responsive_control(
			'title_hover_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} #cybershop_single_product_title:hover' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		// Margin Hover
		$this->add_responsive_control(
			'title_hover_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} #cybershop_single_product_title:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Padding Hover
		$this->add_responsive_control(
			'title_hover_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} #cybershop_single_product_title:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		echo "<{$settings['tag']} class='is-{$settings['stock_display']} has-transition-3' id='cybershop_single_product_title'>{$product->get_title()}</{$settings['tag']}>";
	}
}
