<?php

namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopWoocommerceMyaccountContent extends Widget_Base {

	// Slug
	public function get_name() {
		return 'cybershop-woocommerce-myaccount-content';
	}

	// Title
	public function get_title() {
		return __('داشبورد حساب کاربری (محتوا)', 'cybershop');
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

		// Start Controls
		// =============================================================
		// Wrapper
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => __( 'تنظیمات', 'cybershop' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
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

		// 
		// Global Settings
		// 

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_background',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}}',
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_box_shadow',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}}',
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_border',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}}',
			]
		);

		// Border Radius
		$this->add_control(
			'global_border_radius',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}}' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_color',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}}' => 'color: {{VALUE}}',
					'{{WRAPPER}} strong' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}}',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}}',
			]
		);

		// End "Wrapper" Controls
		$this->end_controls_section();	
	









		// Inputs
		$this->start_controls_section(
			'section_inputs_style',
			[
				'label' => __( 'اینپوت ها', 'cybershop' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'global_inputs_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} input' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'global_inputs_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} input' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_title_style' );

		// "Normal" Tab
		$this->start_controls_tab(
			'tab_inputs_normal',
			[
				'label' => __( 'عادی', 'cybershop' ),
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_inputs_background',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .select2-selection--single, {{WRAPPER}} input',
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_inputs_box_shadow',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .select2-selection--single, {{WRAPPER}} input',
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_inputs_border',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .select2-selection--single, {{WRAPPER}} input',
			]
		);

		// Border Radius
		$this->add_control(
			'global_inputs_border_radius',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .select2-selection--single, {{WRAPPER}} input' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_inputs_color',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .select2-container--default .select2-selection--single .select2-selection__rendered, {{WRAPPER}} input' => 'color: {{VALUE}} !important',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_inputs_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .select2-container--default .select2-selection--single .select2-selection__rendered, {{WRAPPER}} input',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_inputs_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .select2-container--default .select2-selection--single .select2-selection__rendered, {{WRAPPER}} input',
			]
		);


		$this->add_control(
			'global_inputs_icon_style',
			[
				'label' => __( 'ایکون', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Icon Color
		$this->add_control(
			'global_inputs_icon_color',
			[
				'label' => __( 'رنگ آیکون همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .field .icon' => 'color: {{VALUE}}',
				]
			]
		);
		$this->end_controls_tab(); // End "Normal" Tab

		// "Hover" Tab
		$this->start_controls_tab(
			'tab_inputs_hover',
			[
				'label' => __( 'هاور', 'cybershop' ),
			]
		);

		$this->add_control(
			'hover_inputs_transition',
			[
				'label' => __( 'مدت زمان تغییر', 'cybershop' ),
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
					'{{WRAPPER}} input' => 'transition: all {{SIZE}}s',
				],
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_inputs_background_hover',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} input:hover',
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_inputs_box_shadow_hover',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} input:hover',
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_inputs_border_hover',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} input:hover',
			]
		);

		// Border Radius
		$this->add_control(
			'global_inputs_border_radius_hover',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} input:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_inputs_color_hover',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input:hover' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_inputs_typography_hover',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} input:hover',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_inputs_text_shadow_hover',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} input:hover',
			]
		);

		$this->add_control(
			'global_inputs_icon_style_hover',
			[
				'label' => __( 'ایکون', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Icon Color
		$this->add_control(
			'global_inputs_icon_color_hover',
			[
				'label' => __( 'رنگ آیکون همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .control .input:hover ~ .icon' => 'color: {{VALUE}}',
				]
			]
		);
		$this->end_controls_tab(); // End "Hover" Tab

		// "Focus" Tab
		$this->start_controls_tab(
			'tab_inputs_focus',
			[
				'label' => __( 'فکوس', 'cybershop' ),
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_inputs_background_focus',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} input:focus',
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_inputs_box_shadow_focus',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} input:focus',
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_inputs_border_focus',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} input:focus',
			]
		);

		// Border Radius
		$this->add_control(
			'global_inputs_border_radius_focus',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} input:focus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_inputs_color_focus',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input:focus' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_inputs_typography_focus',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} input:focus',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_inputs_text_shadow_focus',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} input:focus',
			]
		);


		$this->add_control(
			'global_inputs_icon_style_focus',
			[
				'label' => __( 'ایکون', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Icon Color
		$this->add_control(
			'global_inputs_icon_color_focus',
			[
				'label' => __( 'رنگ آیکون همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .control .input:focus ~ .icon' => 'color: {{VALUE}}',
				]
			]
		);

		$this->end_controls_tab(); // End "Focus" Tab

		$this->end_controls_tabs();

		// End "Inputs" Controls
		$this->end_controls_section();	








		// Links
		$this->start_controls_section(
			'section_links_style',
			[
				'label' => __( 'لینک ها', 'cybershop' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		// Display
		$this->add_control(
			'global_links_display',
			[
				'label' => __( 'حالت نمایش استوک', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'flex' => __( 'فلکس', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} a' => 'display: {{VALUE}}'
				],
			]
		);

		$this->add_responsive_control(
			'global_links_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'global_links_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_links_style' );

		// "Normal" Tab
		$this->start_controls_tab(
			'tab_links_normal',
			[
				'label' => __( 'عادی', 'cybershop' ),
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_links_background',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} a',
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_links_box_shadow',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} a',
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_links_border',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} a',
			]
		);

		// Border Radius
		$this->add_control(
			'global_links_border_radius',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_links_color',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_links_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} a',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_links_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} a',
			]
		);
		$this->end_controls_tab(); // End "Normal" Tab

		// "Hover" Tab
		$this->start_controls_tab(
			'tab_links_hover',
			[
				'label' => __( 'هاور', 'cybershop' ),
			]
		);

		$this->add_control(
			'hover_links_transition',
			[
				'label' => __( 'مدت زمان تغییر', 'cybershop' ),
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
					'{{WRAPPER}} a' => 'transition: all {{SIZE}}s',
				],
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_links_background_hover',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} a:hover',
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_links_box_shadow_hover',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} a:hover',
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_links_border_hover',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} a:hover',
			]
		);

		// Border Radius
		$this->add_control(
			'global_links_border_radius_hover',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_links_color_hover',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a:hover' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_links_typography_hover',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} a:hover',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_links_text_shadow_hover',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} a:hover',
			]
		);
		$this->end_controls_tab(); // End "Hover" Tab

		// "Focus" Tab
		$this->start_controls_tab(
			'tab_links_focus',
			[
				'label' => __( 'فکوس', 'cybershop' ),
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_links_background_focus',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} a:focus',
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_links_box_shadow_focus',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} a:focus',
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_links_border_focus',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} a:focus',
			]
		);

		// Border Radius
		$this->add_control(
			'global_links_border_radius_focus',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} a:focus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_links_color_focus',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a:focus' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_links_typography_focus',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} a:focus',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_links_text_shadow_focus',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} a:focus',
			]
		);

		$this->end_controls_tab(); // End "Focus" Tab

		$this->end_controls_tabs();

		// End "Links" Controls
		$this->end_controls_section();	










		// Tables
		$this->start_controls_section(
			'section_tables_style',
			[
				'label' => __( 'جدول ها', 'cybershop' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'tab_tables_buttons_heading',
			[
				'label' => __( 'دکمه ها', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'global_table_button_justify_content',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'space-between',
				'options' => [
					'space-between' => __( 'space-between', 'cybershop' ),
					'space-around' 	=> __( 'space-around', 'cybershop' ),
					'space-evenly' 	=> __( 'space-evenly', 'cybershop' ),
					'center' 		=> __( 'center', 'cybershop' ),
					'end' 			=> __( 'end', 'cybershop' ),
					'flex-end' 		=> __( 'flex-end', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} table td .field' => 'justify-content: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'global_table_button_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} table .button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'global_table_button_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} table .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_table_button_style' );

		// "Normal" Tab
		$this->start_controls_tab(
			'tab_table_button_normal',
			[
				'label' => __( 'عادی', 'cybershop' ),
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_table_button_background',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} table .button',
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_table_button_box_shadow',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} table .button',
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_table_button_border',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} table .button',
			]
		);

		// Border Radius
		$this->add_control(
			'global_table_button_border_radius',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} table .button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_table_button_color',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} table .button' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_table_button_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} table .button',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_table_button_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} table .button',
			]
		);
		$this->end_controls_tab(); // End "Normal" Tab

		// "Hover" Tab
		$this->start_controls_tab(
			'tab_table_button_hover',
			[
				'label' => __( 'هاور', 'cybershop' ),
			]
		);

		$this->add_control(
			'hover_table_button_transition',
			[
				'label' => __( 'مدت زمان تغییر', 'cybershop' ),
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
					'{{WRAPPER}} table .button' => 'transition: all {{SIZE}}s',
				],
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_table_button_background_hover',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} table .button:hover',
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_table_button_box_shadow_hover',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} table .button:hover',
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_table_button_border_hover',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} table .button:hover',
			]
		);

		// Border Radius
		$this->add_control(
			'global_table_button_border_radius_hover',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} table .button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_table_button_color_hover',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} table .button:hover' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_table_button_typography_hover',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} table .button:hover',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_table_button_text_shadow_hover',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} table .button:hover',
			]
		);
		$this->end_controls_tab(); // End "Hover" Tab

		// "Focus" Tab
		$this->start_controls_tab(
			'tab_table_button_focus',
			[
				'label' => __( 'فکوس', 'cybershop' ),
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_table_button_background_focus',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} table .button:focus',
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_table_button_box_shadow_focus',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} table .button:focus',
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_table_button_border_focus',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} table .button:focus',
			]
		);

		// Border Radius
		$this->add_control(
			'global_table_button_border_radius_focus',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} table .button:focus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_table_button_color_focus',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} table .button:focus' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_table_button_typography_focus',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} table .button:focus',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_table_button_text_shadow_focus',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} table .button:focus',
			]
		);

		$this->end_controls_tab(); // End "Focus" Tab

		$this->end_controls_tabs();









		$this->add_control(
			'tab_tables_th_heading',
			[
				'label' => __( 'هدینگ ها', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_tables_th_background',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} table th',
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_tables_th_box_shadow',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} table th',
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_tables_th_border',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} table th',
			]
		);

		// Border Radius
		$this->add_control(
			'global_tables_th_border_radius',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} table th' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_tables_th_color',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} table th' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_tables_th_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} table th',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_tables_th_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} table th',
			]
		);






		$this->add_control(
			'tab_tables_td_heading',
			[
				'label' => __( 'ستون های داخلی', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_tables_td_background',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} table td',
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_tables_td_box_shadow',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} table td',
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_tables_td_border',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} table td',
			]
		);

		// Border Radius
		$this->add_control(
			'global_tables_td_border_radius',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} table td' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_tables_td_color',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} table td' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_tables_td_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} table td',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_tables_td_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} table td',
			]
		);











		$this->add_control(
			'tab_tables_tr_heading',
			[
				'label' => __( 'ردیف ها', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$this->start_controls_tabs( 'tabs_tables_style' );

		// "Normal" Tab
		$this->start_controls_tab(
			'tab_tables_tr_normal',
			[
				'label' => __( 'عادی', 'cybershop' ),
			]
		);


		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_tables_tr_background',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} table tbody tr',
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_tables_tr_box_shadow',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} table tbody tr',
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_tables_tr_border',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} table tbody tr',
			]
		);

		// Border Radius
		$this->add_control(
			'global_tables_tr_border_radius',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} table tbody tr' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_tables_tr_color',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} table tbody tr' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_tables_tr_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} table tbody tr',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_tables_tr_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} table tbody tr',
			]
		);
		$this->end_controls_tab(); // End "Normal" Tab


		// "Hover" Tab
		$this->start_controls_tab(
			'tab_tables_tr_hover',
			[
				'label' => __( 'هاور', 'cybershop' ),
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_tables_tr_background_hover',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} table tbody tr:hover',
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_tables_tr_box_shadow_hover',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} table tbody tr:hover',
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_tables_tr_border_hover',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} table tbody tr:hover',
			]
		);

		// Border Radius
		$this->add_control(
			'global_tables_tr_border_radius_hover',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} table tbody tr:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_tables_tr_color_hover',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} table tbody tr:hover' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_tables_tr_typography_hover',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} table tbody tr:hover',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_tables_tr_text_shadow_hover',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} table tbody tr:hover',
			]
		);

		$this->end_controls_tab(); // End "Hover" Tab




		$this->end_controls_tabs();

		// End "Tables" Controls
		$this->end_controls_section();	























		// Labels
		$this->start_controls_section(
			'section_labels_style',
			[
				'label' => __( 'لیبل ها', 'cybershop' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_labels_background_focus',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} label',
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_labels_box_shadow_focus',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} label',
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_labels_border_focus',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} label',
			]
		);

		// Border Radius
		$this->add_control(
			'global_labels_border_radius_focus',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} label' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_labels_color_focus',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} label' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_labels_typography_focus',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} label',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_labels_text_shadow_focus',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} label',
			]
		);

		$this->add_responsive_control(
			'global_labels_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'global_labels_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// End "Labels" Controls
		$this->end_controls_section();	








		// Titles
		$this->start_controls_section(
			'section_titles_style',
			[
				'label' => __( 'تایتل ها', 'cybershop' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		// Display
		$this->add_control(
			'global_titles_display',
			[
				'label' => __( 'حالت نمایش استوک', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'flex' => __( 'فلکس', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .cybershop-wc-form-title, {{WRAPPER}} .woocommerce-order-downloads__title, {{WRAPPER}} .woocommerce-order-details__title, {{WRAPPER}} .woocommerce-column__title' => 'display: {{VALUE}}'
				],
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_titles_background',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .cybershop-wc-form-title, {{WRAPPER}} .woocommerce-order-downloads__title, {{WRAPPER}} .woocommerce-order-details__title, {{WRAPPER}} .woocommerce-column__title',
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_titles_box_shadow',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-wc-form-title, {{WRAPPER}} .woocommerce-order-downloads__title, {{WRAPPER}} .woocommerce-order-details__title, {{WRAPPER}} .woocommerce-column__title',
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_titles_border',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-wc-form-title, {{WRAPPER}} .woocommerce-order-downloads__title, {{WRAPPER}} .woocommerce-order-details__title, {{WRAPPER}} .woocommerce-column__title',
			]
		);

		// Border Radius
		$this->add_control(
			'global_titles_border_radius',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-my-address-header-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cybershop-wc-form-title, {{WRAPPER}} .woocommerce-order-downloads__title, {{WRAPPER}} .woocommerce-order-details__title, {{WRAPPER}} .woocommerce-column__title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cybershop-wc-reset-password-from-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_titles_color',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .cybershop-wc-form-title, {{WRAPPER}} .woocommerce-order-downloads__title, {{WRAPPER}} .woocommerce-order-details__title, {{WRAPPER}} .woocommerce-column__title' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_titles_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .cybershop-wc-form-title, {{WRAPPER}} .woocommerce-order-downloads__title, {{WRAPPER}} .woocommerce-order-details__title, {{WRAPPER}} .woocommerce-column__title',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_titles_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-wc-form-title, {{WRAPPER}} .woocommerce-order-downloads__title, {{WRAPPER}} .woocommerce-order-details__title, {{WRAPPER}} .woocommerce-column__title',
			]
		);

		$this->add_responsive_control(
			'global_titles_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-my-address-header-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cybershop-wc-form-title, {{WRAPPER}} .woocommerce-order-downloads__title, {{WRAPPER}} .woocommerce-order-details__title, {{WRAPPER}} .woocommerce-column__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cybershop-wc-reset-password-from-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'global_titles_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-my-address-header-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cybershop-wc-form-title, {{WRAPPER}} .woocommerce-order-downloads__title, {{WRAPPER}} .woocommerce-order-details__title, {{WRAPPER}} .woocommerce-column__title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cybershop-wc-reset-password-from-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);
		// End "Titles" Controls
		$this->end_controls_section();	










		// Description
		$this->start_controls_section(
			'section_description_style',
			[
				'label' => __( 'توضیحات', 'cybershop' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_description_background',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .cybershop-wc-form-description',
				
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_description_box_shadow',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-wc-form-description',
				
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_description_border',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-wc-form-description',
				
			]
		);

		// Border Radius
		$this->add_control(
			'global_description_border_radius',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-wc-form-description' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_description_color',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .cybershop-wc-form-description' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_description_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .cybershop-wc-form-description',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_description_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-wc-form-description',
			]
		);

		$this->add_responsive_control(
			'global_description_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-wc-form-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'global_description_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-wc-form-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		// End "Description" Controls
		$this->end_controls_section();	


		








		// Tags
		$this->start_controls_section(
			'section_tag_style',
			[
				'label' => __( 'تگ ها', 'cybershop' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_tag_background',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .tag',
				
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_tag_box_shadow',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .tag',
				
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_tag_border',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .tag',
				
			]
		);

		// Border Radius
		$this->add_control(
			'global_tag_border_radius',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tag' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_tag_color',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .tag' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_tag_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .tag',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_tag_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .tag',
			]
		);

		$this->add_responsive_control(
			'global_tag_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .tag' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'global_tag_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .tag' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		// End "Tags" Controls
		$this->end_controls_section();	


		












		// Buttons
		$this->start_controls_section(
			'section_button_style',
			[
				'label' => __( 'دکمه ها', 'cybershop' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		// Display
		$this->add_control(
			'global_button_display',
			[
				'label' => __( 'حالت نمایش استوک', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'flex' => __( 'فلکس', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .button' => 'display: {{VALUE}}'
				],
			]
		);

		$this->add_responsive_control(
			'global_button_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'global_button_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		// "Normal" Tab
		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'عادی', 'cybershop' ),
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_button_background',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .button',
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_button_box_shadow',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .button',
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_button_border',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .button',
			]
		);

		// Border Radius
		$this->add_control(
			'global_button_border_radius',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_button_color',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .button' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_button_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .button',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_button_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .button',
			]
		);
		$this->end_controls_tab(); // End "Normal" Tab

		// "Hover" Tab
		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'هاور', 'cybershop' ),
			]
		);

		$this->add_control(
			'hover_button_transition',
			[
				'label' => __( 'مدت زمان تغییر', 'cybershop' ),
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
					'{{WRAPPER}} .button' => 'transition: all {{SIZE}}s',
				],
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_button_background_hover',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .button:hover',
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_button_box_shadow_hover',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .button:hover',
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_button_border_hover',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .button:hover',
			]
		);

		// Border Radius
		$this->add_control(
			'global_button_border_radius_hover',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_button_color_hover',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .button:hover' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_button_typography_hover',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .button:hover',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_button_text_shadow_hover',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .button:hover',
			]
		);
		$this->end_controls_tab(); // End "Hover" Tab

		// "Focus" Tab
		$this->start_controls_tab(
			'tab_button_focus',
			[
				'label' => __( 'فکوس', 'cybershop' ),
			]
		);

		// Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'global_button_background_focus',
				'label' => __( 'پس زمینه همگانی', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .button:focus',
			]
		);

		// Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'global_button_box_shadow_focus',
				'label' => __( 'سایه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .button:focus',
			]
		);

		// Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'global_button_border_focus',
				'label' => __( 'حاشیه همگانی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .button:focus',
			]
		);

		// Border Radius
		$this->add_control(
			'global_button_border_radius_focus',
			[
				'label' => __( 'شعاع حاشیه همگانی', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .button:focus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Color
		$this->add_control(
			'global_button_color_focus',
			[
				'label' => __( 'رنگ همگانی', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .button:focus' => 'color: {{VALUE}}',
				]
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'global_button_typography_focus',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .button:focus',
			]
		);

		// Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'global_button_text_shadow_focus',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .button:focus',
			]
		);

		$this->end_controls_tab(); // End "Focus" Tab

		$this->end_controls_tabs();

		// End "Buttons" Controls
		$this->end_controls_section();	













		// EditAccountForm
		$this->start_controls_section(
			'section_edit_account_form_style',
			[
				'label' => __( 'ویرایش اکانت', 'cybershop' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'edit_account_form_layout',
			[
				'label' => __( 'حالت چیدمان فورم', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'horizontal',
				'options' => [
					'vertical' 			=> __( 'عمودی', 'cybershop' ),
					'horizontal' 		=> __( 'افقی', 'cybershop' ),
				],
			]
		);

		// End "EditAccountForm" Controls
		$this->end_controls_section();	
	}

	// PHP-RENDER
	public function render() {
		$settings  = $this->get_settings_for_display();

		global $cb_my_account_content_settings;
		$cb_my_account_content_settings = $settings;

		if($settings['development_status'] !== "yes") {
			// Render woocommerce myaccount Content fragment
			if(is_user_logged_in()) {
				wc_get_template( 'myaccount/myaccount.php');
			} else {
				// For some reasons woocommerce doens't work that way(Lost_passwords and other pages won't work if user is not logged in)
				echo do_shortcode( '[woocommerce_my_account]' );
			}

		} else {
			$this->development_html($settings);
		}

		if( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
		?>
		<style type="text/css">
			.elementor-element.elementor-widget-empty {
				background: inherit;
			}
		</style>
		<?php
		}

		// Do not show the navigation container when user is not logged in
		if(!is_user_logged_in()):
		?>
		<script type="text/javascript">
			const my_account_container = $(".elementor-element-<?=$this->get_id()?>").parents('.elementor-element')[0]
			my_account_container.style.width = "100%"
		</script>
		<?php
		endif;
	}



	protected function development_html($settings) {
	?>

	<div class="woocommerce-MyAccount-content cybershop-myaccount-content">
		<!-- Text & links -->
		<p>
		سلام <strong>Test</strong> (<a href="#">خارج شوید</a>)
		</p>

		<br>

		<!-- Addresses -->
	    <p class="cybershop-my-address-description cybershop-wc-form-description">
	        آدرس&zwnj;های زیر به طور پیش&zwnj;فرض در صفحه پرداخت مورد استفاده قرار مي&zwnj;گیرد.
	    </p>

	    <div class="u-columns woocommerce-Addresses col2-set addresses">
	        <div class="u-column1 col-1 woocommerce-Address">
	            <header class="cybershop-my-address-header">
	                <h3 class="cybershop-my-address-header-title cybershop-wc-form-title">
	                    آدرس صورتحساب
	                </h3>
	                <a href="" class="cybershop-my-address-header-edit">
	                    ویرایش
	                </a>
	            </header>
	            <address class="cybershop-my-address-address">
	                m mm<br />
	                ایران<br />
	                تهران<br />
	                آبعلی<br />
	                نام خیابان<br />
	                نام آپارتمان<br />
	                7777777777
	            </address>
	        </div>

	        <div class="u-column2 col-2 woocommerce-Address">
	            <header class="cybershop-my-address-header">
	                <h3 class="cybershop-my-address-header-title cybershop-wc-form-title">
	                    آدرس حمل و نقل
	                </h3>
	                <a href="" class="cybershop-my-address-header-edit">
	                    ویرایش
	                </a>
	            </header>
	            <address class="cybershop-my-address-address">
	                ئ ئئ<br />
	                ئ<br />
	                خیابان<br />
	                آپارتمان<br />
	                تست<br />
	                Chaco<br />
	                77777777<br />
	                آرژانتین
	            </address>
	        </div>
	    </div>


		<br>

		<!-- Login/Register Form -->
		<div class="woocommerce">
		    <div class="cybershop-wc-login u-columns col2-set" id="customer_login">
		        <div class="u-column1 col-1">
		            <h2 class="cybershop-wc-form-title">ورود</h2>

		            <form class="cybershop-wc-login-form" method="post">
		                <!-- Username/Email -->
		                <div class="field">
		                    <div class="field-label pb-2 is-normal">
		                        <label class="label" for="username"> نام کاربری یا آدرس ایمیل <span class="required">*</span> </label>
		                    </div>
		                    <div class="field-body">
		                        <div class="control field is-expanded has-icons-right">
		                            <input type="text" class="input" name="username" id="username" autocomplete="username" value="" />
		                            <span class="icon is-small is-right">
		                                <i class="fas fa-user"></i>
		                            </span>
		                        </div>
		                    </div>
		                </div>

		                <!-- Password -->
		                <div class="field">
		                    <div class="field-label pb-2 is-normal">
		                        <label class="label" for="password"> گذرواژه <span class="required">*</span> </label>
		                    </div>
		                    <div class="field-body">
		                        <div class="control field is-expanded has-icons-right">
		                            <input type="password" class="input" name="password" id="password" autocomplete="current-password" />
		                            <span class="icon is-small is-right">
		                                <i class="fas fa-lock"></i>
		                            </span>
		                        </div>
		                    </div>
		                </div>

		                <!-- Buttons -->
		                <div class="is-flex is-justify-content-space-between is-align-items-center cybershop-wc-login-from-buttons">
		                    <!-- Remember Me -->
		                    <label class="checkbox cybershop-wc-login-from-remember-me">
		                        <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" />
		                        مرا به خاطر بسپار
		                    </label>
		                    <!-- Submit Button -->
		                    <button type="submit" class="button is-success has-text-white" name="login" value="ورود">
		                        ورود
		                    </button>
		                </div>

		                <!-- Lost Password -->
		                <div class="lost_password mt-4 cybershop-wc-login-from-forgot-password">
		                    <a href='#'> گذرواژه خود را فراموش کرده اید؟ </a>
		                </div>
		            </form>
		        </div>

		        <div class="u-column2 col-2">
		            <h2 class="cybershop-wc-form-title">عضویت</h2>

		            <form method="post" class="cybershop-wc-register-form">
		                <div class="field">
		                    <div class="field-label pb-2 is-normal">
		                        <label class="label" for="reg_username"> نام کاربری <span class="required">*</span> </label>
		                    </div>
		                    <div class="field-body">
		                        <div class="control field is-expanded has-icons-right">
		                            <input type="text" class="input" name="username" id="reg_username" autocomplete="username" value="" />
		                            <span class="icon is-small is-right">
		                                <i class="fas fa-user"></i>
		                            </span>
		                        </div>
		                    </div>
		                </div>

		                <div class="field">
		                    <div class="field-label pb-2 is-normal">
		                        <label class="label" for="reg_email"> آدرس ایمیل <span class="required">*</span> </label>
		                    </div>
		                    <div class="field-body">
		                        <div class="control field is-expanded has-icons-right">
		                            <input type="email" class="input" name="email" id="reg_email" autocomplete="email" value="" />
		                            <span class="icon is-small is-right">
		                                <i class="fas fa-at"></i>
		                            </span>
		                        </div>
		                    </div>
		                </div>

		                <div class="field">
		                    <div class="field-label pb-2 is-normal">
		                        <label class="label" for="reg_password"> گذرواژه <span class="required">*</span> </label>
		                    </div>
		                    <div class="field-body">
		                        <div class="control field is-expanded has-icons-right">
		                            <input type="password" class="input" name="password" id="reg_password" autocomplete="new-password" />
		                            <span class="icon is-small is-right">
		                                <i class="fas fa-lock"></i>
		                            </span>
		                        </div>
		                    </div>
		                </div>

		                <div class="woocommerce-privacy-policy-text">
		                    <p>
		                        اطلاعات شخصی شما برای پردازش سفارش شما استفاده می&zwnj;شود، و پشتیبانی از تجربه شما در این وبسایت، و برای اهداف دیگری که در
		                        <a href='#' class="woocommerce-privacy-policy-link" target="_blank">سیاست حفظ حریم خصوصی</a> توضیح داده شده است.
		                    </p>
		                </div>
		                <div class="field mt-2 is-pulled-left cybershop-wc-register-from-submit-button">
		                    <button type="submit" class="button is-success" name="register" value="عضویت">
		                        عضویت
		                    </button>
		                </div>
		            </form>
		        </div>
		    </div>
		</div>

 		<br>

		<!-- Edit Account Form -->
		<form class="cybershop-edit-account-form woocommerce-EditAccountForm edit-account" action="" method="post">
		    <div class="field is-<?= $settings['edit_account_form_layout'] ?>">
		        <div class="field-label is-normal">
		            <label class="label" for="account_first_name"> نام <span class="required">*</span> </label>
		        </div>
		        <div class="field-body">
		            <div class="field">
		                <div class="control is-expanded has-icons-right">
		                    <input type="text" class="input" name="account_first_name" id="account_first_name" autocomplete="given-name" placeholder="نام" value="" />
		                    <span class="icon is-small is-right">
		                        <i class="fas fa-user"></i>
		                    </span>
		                </div>
		            </div>
		            <div class="field">
		                <div class="control is-expanded has-icons-right">
		                    <input type="text" class="input" name="account_last_name" id="account_last_name" autocomplete="family-name" placeholder="نام خانوادگی" value="" />
		                    <span class="icon is-small is-right">
		                        <i class="fas fa-user"></i>
		                    </span>
		                </div>
		            </div>
		        </div>
		    </div>

		    <div class="field is-<?= $settings['edit_account_form_layout'] ?>">
		        <div class="field-label is-normal">
		            <label class="label" for="account_display_name"> نام نمایشی <span class="required">*</span> </label>
		        </div>

		        <div class="field-body">
		            <div class="control field is-expanded has-icons-right has-icons-left">
		                <input type="text" class="input is-primary" name="account_display_name" id="account_display_name" value="root" />
		                <span class="icon is-small is-right">
		                    <i class="fas fa-user-tag"></i>
		                </span>
		                <span class="icon is-small is-left">
		                    <i class="fas fa-check"></i>
		                </span>
		                <p class="help">
		                    اسم شما به این صورت در حساب کاربری و نظرات دیده خواهد شد.
		                </p>
		            </div>
		        </div>
		    </div>

		    <div class="field is-<?= $settings['edit_account_form_layout'] ?>">
		        <div class="field-label is-normal">
		            <label class="label" for="account_email"> آدرس ایمیل <span class="required">*</span> </label>
		        </div>
		        <div class="field-body">
		            <div class="control is-expanded field has-icons-right has-icons-left">
		                <input type="email" class="input is-primary" name="account_email" id="account_email" autocomplete="email" value="test@gmail.com" />
		                <span class="icon is-small is-right">
		                    <i class="fas fa-at"></i>
		                </span>
		                <span class="icon is-small is-left">
		                    <i class="fas fa-check"></i>
		                </span>
		            </div>
		        </div>
		    </div>
		    <div class="field is-<?= $settings['edit_account_form_layout'] ?>">
		        <div class="field-label is-normal">
		            <label class="label" for="password_current"> تغییر گذرواژه </label>
		        </div>
		        <div class="field-body">
		            <div class="field">
		                <div class="control is-expanded has-icons-right">
		                    <input type="password" class="input is-small" name="password_current" id="password_current" autocomplete="off" placeholder="گذرواژه پیشین (در صورتی که قصد تغییر ندارید خالی بگذارید)" />
		                    <span class="icon is-small is-right">
		                        <i class="fas fa-key"></i>
		                    </span>
		                </div>
		            </div>
		            <div class="field">
		                <div class="control is-expanded has-icons-right">
		                    <input type="password" class="input is-small" name="password_1" id="password_1" autocomplete="off" placeholder="گذرواژه جدید (در صورتی که قصد تغییر ندارید خالی بگذارید)" />
		                    <span class="icon is-small is-right">
		                        <i class="fas fa-lock"></i>
		                    </span>
		                </div>
		            </div>
		            <div class="field">
		                <div class="control is-expanded has-icons-right">
		                    <input type="password" class="input is-small" name="password_2" id="password_2" autocomplete="off" placeholder="تکرار گذرواژه جدید" />
		                    <span class="icon is-small is-right">
		                        <i class="fas fa-lock"></i>
		                    </span>
		                </div>
		            </div>
		        </div>
		    </div>

		    <div>
		        <button type="submit" class="button is-success is-light" name="save_account_details" value="ذخیره تغییرات">
		            ذخیره تغییرات
		        </button>
		    </div>
		</form>

		<br>

		<!-- Tables -->
		<!-- Orders Table -->
		<div class="table-container">
		    <table class="account-orders-table table is-hoverable is-fullwidth">
		        <thead>
		            <tr>
		                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number"><span class="nobr">سفارش</span></th>
		                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date"><span class="nobr">تاریخ</span></th>
		                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"><span class="nobr">وضعیت</span></th>
		                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-total"><span class="nobr">مجموع</span></th>
		                <th class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions"><span class="nobr">عملیات&zwnj;ها</span></th>
		            </tr>
		        </thead>

		        <tbody>
		            <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-completed order">
		                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="سفارش">
		                    <a href=""> #962 </a>
		                </td>
		                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="تاریخ">
		                    <time datetime="2023-04-21T18:38:25+00:00">آوریل 21, 2023</time>
		                </td>
		                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="وضعیت">
		                    تکمیل شده
		                </td>
		                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="مجموع">
		                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">ریال</span>40,000.00</span> برای 1 مورد
		                </td>
		                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="عملیات&zwnj;ها">
		                    <div class="field has-addons is-centered">
		                        <p class="control"><a href="" class="button view">نمایش </a></p>
		                    </div>
		                </td>
		            </tr>
		            <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-pending order">
		                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="سفارش">
		                    <a href=""> #959 </a>
		                </td>
		                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="تاریخ">
		                    <time datetime="2023-04-21T17:34:32+00:00">آوریل 21, 2023</time>
		                </td>
		                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="وضعیت">
		                    در انتظار پرداخت
		                </td>
		                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="مجموع">
		                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">ریال</span>201,000.00</span> برای 3 مورد
		                </td>
		                <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="عملیات&zwnj;ها">
		                    <div class="field has-addons is-centered">
		                        <p class="control">
		                            <a href="" class="button pay">
		                                پرداخت
		                            </a>
		                        </p>
		                        <p class="control"><a href="" class="button view">نمایش </a></p>
		                        <p class="control">
		                            <a
		                                href=""
		                                class="button cancel"
		                            >
		                                لغو
		                            </a>
		                        </p>
		                    </div>
		                </td>
		            </tr>
		        </tbody>
		    </table>
		</div>

		<br>

		<!-- Order View Tables -->
	    <p class="cybershop-view-order-description cybershop-wc-form-description">
	        سفارش <span class="tag is-primary is-light order-number">#962</span> در تاریخ <span class="tag is-primary is-light order-date">آوریل 21, 2021</span> ثبت شده است و در حال حاضر در وضعیت
	        <span class="tag is-primary is-light order-status">تکمیل شده</span> می باشد.
	    </p>

	    <div class="table-container cybershop-view-order-table">
	        <section class="woocommerce-order-downloads">
	            <h2 class="woocommerce-order-downloads__title">دانلودها</h2>

	            <table class="woocommerce-table woocommerce-table--order-downloads shop_table shop_table_responsive order_details">
	                <thead>
	                    <tr>
	                        <th class="download-product"><span class="nobr">محصول</span></th>
	                        <th class="download-remaining"><span class="nobr">دانلودهای باقی مونده</span></th>
	                        <th class="download-expires"><span class="nobr">انقضا</span></th>
	                        <th class="download-file"><span class="nobr">دانلود</span></th>
	                    </tr>
	                </thead>

	                <tbody>
	                    <tr>
	                        <td class="download-product" data-title="محصول">
	                            <a href="">محصول شماره 6 (دانلودی)</a>
	                        </td>
	                        <td class="download-remaining" data-title="دانلودهای باقی مونده">
	                            2
	                        </td>
	                        <td class="download-expires" data-title="انقضا">
	                            <time datetime="2021-04-23" title="1619136000">آوریل 23, 2021</time>
	                        </td>
	                        <td class="download-file" data-title="دانلود">
	                            <a
	                                href=""
	                                class="woocommerce-MyAccount-downloads-file button alt"
	                            >
	                                تست
	                            </a>
	                        </td>
	                    </tr>
	                </tbody>
	            </table>
	        </section>
	        <section class="woocommerce-order-details">
	            <h2 class="woocommerce-order-details__title">مشخصات سفارش</h2>

	            <table class="woocommerce-table woocommerce-table--order-details shop_table order_details">
	                <thead>
	                    <tr>
	                        <th class="woocommerce-table__product-name product-name">محصول</th>
	                        <th class="woocommerce-table__product-table product-total">مجموع</th>
	                    </tr>
	                </thead>

	                <tbody>
	                    <tr class="woocommerce-table__line-item order_item">
	                        <td class="woocommerce-table__product-name product-name">
	                            <a href="">محصول شماره 6 (دانلودی)</a>
	                            <strong class="product-quantity">×&nbsp;1</strong>
	                        </td>

	                        <td class="woocommerce-table__product-total product-total">
	                            <span class="woocommerce-Price-amount amount">
	                                <bdi><span class="woocommerce-Price-currencySymbol">ریال</span>40,000.00</bdi>
	                            </span>
	                        </td>
	                    </tr>

	                    <tr class="woocommerce-table__product-purchase-note product-purchase-note">
	                        <td colspan="2"><p>یادداشت خرید</p></td>
	                    </tr>
	                </tbody>

	                <tfoot>
	                    <tr>
	                        <th scope="row">جمع كل سبد خريد:</th>
	                        <td>
	                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">ریال</span>40,000.00</span>
	                        </td>
	                    </tr>
	                    <tr>
	                        <th scope="row">قیمت نهایی:</th>
	                        <td>
	                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">ریال</span>40,000.00</span>
	                        </td>
	                    </tr>
	                </tfoot>
	            </table>

	            <p class="order-again">
	                <a href="" class="button">سفارش دوباره</a>
	            </p>
	        </section>

	        <section class="woocommerce-customer-details">
	            <h2 class="woocommerce-column__title">آدرس صورتحساب</h2>

	            <address>
	                m mm<br />
	                ایران<br />
	                تهران<br />
	                آبعلی<br />
	                نام خیابان<br />
	                نام آپارتمان<br />
	                7777777777
	                <p class="woocommerce-customer-details--phone">09000000000</p>

	                <p class="woocommerce-customer-details--email">test@gmail.com</p>
	            </address>
	        </section>
	    </div>

	    <br>

	    <!-- Download Table -->
	    <div class="table-container cybershop-view-download-table">
	        <section class="woocommerce-order-downloads">
	            <table class="woocommerce-table woocommerce-table--order-downloads shop_table shop_table_responsive order_details">
	                <thead>
	                    <tr>
	                        <th class="download-product"><span class="nobr">محصول</span></th>
	                        <th class="download-remaining"><span class="nobr">دانلودهای باقی مونده</span></th>
	                        <th class="download-expires"><span class="nobr">انقضا</span></th>
	                        <th class="download-file"><span class="nobr">دانلود</span></th>
	                    </tr>
	                </thead>

	                <tbody>
	                    <tr>
	                        <td class="download-product" data-title="محصول">
	                            <a href="">محصول شماره 6 (دانلودی)</a>
	                        </td>
	                        <td class="download-remaining" data-title="دانلودهای باقی مونده">
	                            2
	                        </td>
	                        <td class="download-expires" data-title="انقضا">
	                            <time datetime="2021-04-23" title="1619136000">آوریل 23, 2021</time>
	                        </td>
	                        <td class="download-file" data-title="دانلود">
	                            <a
	                                href=""
	                                class="woocommerce-MyAccount-downloads-file button alt"
	                            >
	                                تست
	                            </a>
	                        </td>
	                    </tr>
	                </tbody>
	            </table>
	        </section>
	    </div>

	    <br>

	    <!-- Forgot Password Form -->
	    <div class="columns is-centered">
	        <form method="post" class="cybershop-lost-password-form column is-6">
	            <p class="cybershop-lost-password-form-description cybershop-wc-form-description">
	                گذرواژه خود را فراموش کرده اید؟ نام کاربری یا ایمیل خود را وارد کنید. یک لینک برای ساختن گذرواژه جدید در ایمیل خود دریافت خواهید کرد.
	            </p>

	            <!-- Username/Email -->
	            <div class="field">
	                <div class="field-label pb-2 is-normal">
	                    <label class="label" for="user_login"> نام کاربری یا ایمیل <span class="required">*</span> </label>
	                </div>
	                <div class="field-body">
	                    <div class="control field is-expanded has-icons-right">
	                        <input type="text" class="input" name="user_login" id="user_login" autocomplete="username" />
	                        <span class="icon is-small is-right">
	                            <i class="fas fa-at"></i>
	                        </span>
	                    </div>
	                </div>
	            </div>

	            <!-- Buttons -->
	            <div class="field">
	                <div class="control">
	                    <button type="submit" class="button is-success" value="بازگردانی گذرواژه">
	                        بازگردانی گذرواژه
	                    </button>
	                </div>
	            </div>
	        </form>
	    </div>

	    <br>

	    <!-- Reset Password Form -->
	    <div class="">
	        <p class="cybershop-wc-reset-password-from-title cybershop-wc-form-title">
	            گذرواژه جدید را بنویسید
	        </p>

	        <!-- Password 1 -->
	        <div class="field">
	            <div class="field-label pb-2 is-normal">
	                <label class="label" for="password_1"> گذرواژه جدید <span class="required">*</span> </label>
	            </div>
	            <div class="field-body">
	                <div class="control field is-expanded has-icons-right">
	                    <input type="password" class="input" name="password_1" id="password_1" autocomplete="new-password" />
	                    <span class="icon is-small is-right">
	                        <i class="fas fa-lock"></i>
	                    </span>
	                </div>
	            </div>
	        </div>

	        <!-- Password 2 -->
	        <div class="field">
	            <div class="field-label pb-2 is-normal">
	                <label class="label" for="password_2"> تکرار گذرواژه جدید <span class="required">*</span> </label>
	            </div>
	            <div class="field-body">
	                <div class="control field is-expanded has-icons-right">
	                    <input type="password" class="input" name="password_2" id="password_2" autocomplete="new-password" />
	                    <span class="icon is-small is-right">
	                        <i class="fas fa-lock"></i>
	                    </span>
	                </div>
	            </div>
	        </div>

	        <div class="field">
	            <input type="hidden" name="wc_reset_password" value="true" />
	            <button type="submit" class="button is-success" name="register" value="ذخیره">
	                ذخیره
	            </button>
	        </div>
	    </div>


	</div>

	<?php
	}
}
