<?php
namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopProductDataTabs extends Widget_Base {
	
	// Slug
	public function get_name() {
		return 'cybershop-product-data-tabs';
	}

	// Title
	public function get_title() {
		return __('تب های داده', 'cybershop');
	}

	// Icon
	public function get_icon() {
		return 'fab fa-amilia fa-spin';
	}

	// Category
	public function get_categories() {
		return ['cybershop-single-product'];
	}

	public function get_keywords() {
		return [ 'woocommerce', 'shop', 'store', 'data', 'product', 'tabs' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_product_tabs_style',
			[
				'label' => __( 'تب ها', 'cybershop' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'wc_style_warning',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => __( 'ظاهر این ابزارک اغلب تحت تاثیر افزونه های شما قرار می گیرد. اگه به چنین مشکلی مواجه شدید، سعی کنید افزونه های مربوطه را غیر فعال کنید', 'cybershop' ),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
			]
		);

		$this->add_control(
			'tab_justify_content',
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
					'{{WRAPPER}} .tabs' => 'justify-content: {{VALUE}}',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_style' );

		// NORMAL
		$this->start_controls_tab( 'normal_tabs_style',
			[
				'label' => __( 'عادی', 'cybershop' ),
			]
		);

		$this->add_control(
			'tab_text_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'tab_bg_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li a',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'tabs_border',
				'selector' => '.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li a',
			]
		);

		$this->add_responsive_control(
			'tabs_margin',
			[
				'label' 	 => __( 'فاصله', 'cybershop' ),
				'type' 		 => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'tabs_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'tab_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		
		$this->end_controls_tab();


		// HOVER
		$this->start_controls_tab( 'hover_tabs_style',
			[
				'label' => __( 'هاور', 'cybershop' ),
			]
		);

		$this->add_control(
			'hover_tabs_transition',
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
					'.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li a' => 'transition: all {{SIZE}}s',
				],
			]
		);

		$this->add_control(
			'hover_tab_text_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li:hover a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'hover_tab_bg_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li a:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'hover_tabs_border_color',
				'selector' => '.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li a:hover',
			]
		);

		$this->add_responsive_control(
			'hover_tabs_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li a:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'hover_tabs_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hover_tab_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_tab();


		// ACTIVE
		$this->start_controls_tab( 'active_tabs_style',
			[
				'label' => __( 'فعال', 'cybershop' ),
			]
		);

		$this->add_control(
			'active_tab_text_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li.active a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'active_tab_bg_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li.active a',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'active_tabs_border_color',
				'selector' => '.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li.active a',
			]
		);

		$this->add_responsive_control(
			'active_tabs_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li.active a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'active_tabs_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li.active a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'active_tab_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li.active a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'separator_tabs_style',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'tab_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'selector' => '.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs li a',
			]
		);

		$this->end_controls_section();

		// PANEL
		$this->start_controls_section(
			'section_product_panel_style',
			[
				'label' => __( 'پنل', 'cybershop' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'panel_bg_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '.woocommerce {{WRAPPER}} .woocommerce-Tabs-panel',
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.woocommerce {{WRAPPER}} .woocommerce-Tabs-panel' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'selector' => '.woocommerce {{WRAPPER}} .woocommerce-tabs .woocommerce-Tabs-panel',
			]
		);

		$this->add_control(
			'heading_panel_heading_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'هدینگ', 'cybershop' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'heading_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.woocommerce {{WRAPPER}} .woocommerce-Tabs-panel h2' => 'color: {{VALUE}}',
					'.woocommerce {{WRAPPER}} .woocommerce-Tabs-panel #cybershop_product_description_heading' => 'color: {{VALUE}}',
					'.woocommerce {{WRAPPER}} .woocommerce-Tabs-panel #cybershop_product_additional_information_heading' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_heading_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'selector' => '.woocommerce {{WRAPPER}} .woocommerce-tabs .woocommerce-Tabs-panel h2',
			]
		);

		$this->add_control(
			'separator_panel_style',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		// $this->add_control(
		// 	'panel_border_width',
		// 	[
		// 		'label' => __( 'قطر حاشیه', 'cybershop' ),
		// 		'type' => Controls_Manager::DIMENSIONS,
		// 		'selectors' => [
		// 			'.woocommerce {{WRAPPER}} .woocommerce-tabs .woocommerce-Tabs-panel' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; margin-top: -{{TOP}}{{UNIT}}',
		// 		],
		// 	]
		// );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'panel_border',
				'selector' => '.woocommerce {{WRAPPER}} .woocommerce-tabs .woocommerce-Tabs-panel',
			]
		);

		$this->add_control(
			'panel_border_radius',
			[
				'type' => Controls_Manager::DIMENSIONS,
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'selectors' => [
					'.woocommerce {{WRAPPER}} .woocommerce-tabs .woocommerce-Tabs-panel' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
					'.woocommerce {{WRAPPER}} .woocommerce-tabs ul.wc-tabs' => 'margin-left: {{TOP}}{{UNIT}}; margin-right: {{RIGHT}}{{UNIT}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'panel_box_shadow',
				'selector' => '.woocommerce {{WRAPPER}} .woocommerce-tabs .woocommerce-Tabs-panel',
			]
		);

		$this->end_controls_section(); // END PANEL


		// DESCRIPTION TAB
		$this->start_controls_section(
			'section_product_description_style',
			[
				'label' => __( 'تب توضیحات', 'cybershop' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'description_show_heading',
			[
				'label' => __( 'عنوان', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'نمایش', 'cybershop' ),
				'label_off' => __( 'پنهان', 'cybershop' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'description_text',
			[
				'label' => __( 'متن', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'عنوان جدول', 'cybershop' ),
				'placeholder' => __( 'عنوان جدول را وارد کنید', 'cybershop' ),
				'condition' => [
					'description_show_heading!' => '',
				],
			],
		);

		$this->add_control(
			'description_tag',
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
				'condition' => [
					'description_show_heading!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'description_align',
			[
				'label' => __( 'تراز', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'right',
				'options' => [
					'left' => [
						'title' => __( 'چپ', 'cybershop' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'وسط', 'cybershop' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'راست', 'cybershop' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'.woocommerce {{WRAPPER}} #cybershop_product_description_heading' => 'text-align: {{VALUE}}',
				],
				'condition' => [
					'description_show_heading!' => '',
				],
			]
		);

		$this->add_control(
			'description_heading_color',
			[
				'label' => __( 'رنگ مقدار', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.woocommerce {{WRAPPER}} #cybershop_product_description_heading' => 'color: {{VALUE}}',
				],
				'condition' => [
					'description_show_heading!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_heading_typography',
				'label' => __( 'تایپوگرافی هدینگ/عنوان', 'cybershop' ),
				'selector' => '.woocommerce {{WRAPPER}} #cybershop_product_description_heading',
				'condition' => [
					'description_show_heading!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'description_heading_margin',
			[
				'label' => __( 'مارجین', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.woocommerce {{WRAPPER}} #cybershop_product_description_heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'description_show_heading!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'description_heading_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.woocommerce {{WRAPPER}} #cybershop_product_description_heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'description_show_heading!' => '',
				],
			]
		);

		$this->end_controls_section(); // END DESCRIPTION TAB


		// ADDITIONAL INFORMATION TAB
		$this->start_controls_section(
			'section_product_additional_information_style',
			[
				'label' => __( 'تب اطلاعات اضافی', 'cybershop' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'additional_information_show_heading',
			[
				'label' => __( 'عنوان', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'نمایش', 'cybershop' ),
				'label_off' => __( 'پنهان', 'cybershop' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'additional_information_text',
			[
				'label' => __( 'متن', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'عنوان جدول', 'cybershop' ),
				'placeholder' => __( 'عنوان جدول را وارد کنید', 'cybershop' ),
				'condition' => [
					'additional_information_show_heading!' => '',
				],
			],
		);

		$this->add_control(
			'additional_information_tag',
			[
				'label'   => __( 'تگ HTML', 'cybershop' ),
				'type' 	  => \Elementor\Controls_Manager::SELECT,
				'default' => 'h1',
				'options' => [
					'h1'  	=> __( 'h1', 'cybershop' ),
					'h2' 	=> __( 'h2', 'cybershop' ),
					'h3' 	=> __( 'h3', 'cybershop' ),
					'h4' 	=> __( 'h4', 'cybershop' ),
					'h5' 	=> __( 'h5', 'cybershop' ),
					'h6' 	=> __( 'h6', 'cybershop' ),
					'span' 	=> __( 'span', 'cybershop' ),
					'div' 	=> __( 'div', 'cybershop' ),
				],
				'condition' => [
					'additional_information_show_heading!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'additional_information_align',
			[
				'label' => __( 'تراز', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'right',
				'options' => [
					'left' => [
						'title' => __( 'چپ', 'cybershop' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'وسط', 'cybershop' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'راست', 'cybershop' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'.woocommerce {{WRAPPER}} #cybershop_product_additional_information_heading' => 'text-align: {{VALUE}}',
				],
				'condition' => [
					'additional_information_show_heading!' => '',
				],
			]
		);

		$this->add_control(
			'additional_information_heading_color',
			[
				'label' => __( 'رنگ مقدار', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.woocommerce {{WRAPPER}} #cybershop_product_additional_information_heading' => 'color: {{VALUE}}',
				],
				'condition' => [
					'additional_information_show_heading!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'additional_information_heading_typography',
				'label' => __( 'تایپوگرافی هدینگ/عنوان', 'cybershop' ),
				'selector' => '.woocommerce {{WRAPPER}} #cybershop_product_additional_information_heading',
				'condition' => [
					'additional_information_show_heading!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'additional_information_heading_margin',
			[
				'label' => __( 'مارجین', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.woocommerce {{WRAPPER}} #cybershop_product_additional_information_heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'additional_information_show_heading!' => '',
				],
			]
		);

		$this->add_responsive_control(
			'additional_information_heading_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.woocommerce {{WRAPPER}} #cybershop_product_additional_information_heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'additional_information_show_heading!' => '',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'additional_information_typography_label',
				'label' => __( 'تایپوگرافی عنوان', 'cybershop' ),
				'selector' => '.woocommerce {{WRAPPER}} .shop_attributes th',
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'additional_information_typography_value',
				'label' => __( 'تایپوگرافی مقدار', 'cybershop' ),
				'selector' => '.woocommerce {{WRAPPER}} .shop_attributes td',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'additional_information_th_padding',
			[
				'label' => __( 'پدینگ عنوان', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.woocommerce {{WRAPPER}} .shop_attributes th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'additional_information_td_padding',
			[
				'label' => __( 'پدینگ مقدار', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'.woocommerce {{WRAPPER}} .shop_attributes td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'additional_information_vertical_align',
			[
				'label' => __( 'حالت نمایش جزعیات', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'middle',
				'options' => [
					'baseline' 	=> __( 'baseline', 'cybershop' ),
					'top' 		=> __( 'top', 'cybershop' ),
					'middle' 	=> __( 'middle', 'cybershop' ),
					'bottom' 	=> __( 'bottom', 'cybershop' ),
				],
				'selectors' => [
					'.woocommerce {{WRAPPER}} .shop_attributes th' => 'vertical-align: {{VALUE}}',
					'.woocommerce {{WRAPPER}} .shop_attributes td' => 'vertical-align: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'additional_information_border',
				'selector' => '{{WRAPPER}} table',
			]
		);

		$this->start_controls_tabs( 'tabs_additional_information' );
		// "Normal" Tab
		$this->start_controls_tab(
			'tab_additional_information_normal',
			[
				'label' => __( 'عادی', 'cybershop' ),
			]
		);

		// ODD ROW
		$this->add_control(
			'additional_information_heading_odd',
			[
				'label' => __( 'ردیف فرد', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'additional_information_odd_row_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '.woocommerce {{WRAPPER}} .shop_attributes tr:nth-child(odd)',
			]
		);

		$this->add_control(
			'additional_information_odd_label_color',
			[
				'label' => __( 'رنگ عنوان', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.woocommerce {{WRAPPER}} .shop_attributes tr:nth-child(odd) th' => 'color: {{VALUE}}',
				]
			]
		);

		$this->add_control(
			'additional_information_odd_value_color',
			[
				'label' => __( 'رنگ مقدار', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.woocommerce {{WRAPPER}} .shop_attributes tr:nth-child(odd) td' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'additional_information_odd_th_border',
				'selector' => '.woocommerce {{WRAPPER}} .shop_attributes tr:nth-child(odd) th',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'additional_information_odd_td_border',
				'selector' => '.woocommerce {{WRAPPER}} .shop_attributes tr:nth-child(odd) td',
			]
		);

		// EVEN ROW
		$this->add_control(
			'additional_information_heading_even',
			[
				'label' => __( 'ردیف زوج', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'additional_information_even_row_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '.woocommerce {{WRAPPER}} .shop_attributes tr:nth-child(even)',
			]
		);

		$this->add_control(
			'additional_information_even_label_color',
			[
				'label' => __( 'رنگ عنوان', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.woocommerce {{WRAPPER}} .shop_attributes tr:nth-child(even) th' => 'color: {{VALUE}}',
				]
			]
		);

		$this->add_control(
			'additional_information_even_value_color',
			[
				'label' => __( 'رنگ مقدار', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.woocommerce {{WRAPPER}} .shop_attributes tr:nth-child(even) td' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'additional_information_even_th_border',
				'selector' => '.woocommerce {{WRAPPER}} .shop_attributes tr:nth-child(even) th',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'additional_information_even_td_border',
				'selector' => '.woocommerce {{WRAPPER}} .shop_attributes tr:nth-child(even) td',
			]
		);

		$this->end_controls_tab(); // End "Normal" Tab

		// "Hover" Tab
		$this->start_controls_tab(
			'tab_additional_information_hover',
			[
				'label' => __( 'هاور', 'cybershop' ),
			]
		);
		// ODD ROW
		$this->add_control(
			'additional_information_heading_odd_hover',
			[
				'label' => __( 'ردیف فرد', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'additional_information_odd_row_background_hover',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '.woocommerce {{WRAPPER}} .shop_attributes tr:nth-child(odd):hover',
			]
		);

		$this->add_control(
			'additional_information_odd_label_color_hover',
			[
				'label' => __( 'رنگ عنوان', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.woocommerce {{WRAPPER}} .shop_attributes tr:nth-child(odd):hover th' => 'color: {{VALUE}}',
				]
			]
		);

		$this->add_control(
			'additional_information_odd_value_color_hover',
			[
				'label' => __( 'رنگ مقدار', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.woocommerce {{WRAPPER}} .shop_attributes tr:nth-child(odd):hover td' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'additional_information_odd_th_hover_border',
				'selector' => '.woocommerce {{WRAPPER}} .shop_attributes tr:nth-child(odd):hover th',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'additional_information_odd_td_hover_border',
				'selector' => '.woocommerce {{WRAPPER}} .shop_attributes td:nth-child(odd):hover td',
			]
		);

		// EVEN ROW
		$this->add_control(
			'additional_information_heading_even_hover',
			[
				'label' => __( 'ردیف زوج', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'additional_information_even_row_background_hover',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '.woocommerce {{WRAPPER}} .shop_attributes tr:nth-child(even):hover',
			]
		);

		$this->add_control(
			'additional_information_even_label_color_hover',
			[
				'label' => __( 'رنگ عنوان', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.woocommerce {{WRAPPER}} .shop_attributes tr:nth-child(even):hover th' => 'color: {{VALUE}}',
				]
			]
		);

		$this->add_control(
			'additional_information_even_value_color_hover',
			[
				'label' => __( 'رنگ مقدار', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'.woocommerce {{WRAPPER}} .shop_attributes tr:nth-child(even):hover td' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'additional_information_even_th_hover_border',
				'selector' => '.woocommerce {{WRAPPER}} .shop_attributes tr:nth-child(even):hover th',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'additional_information_even_td_hover_border',
				'selector' => '.woocommerce {{WRAPPER}} .shop_attributes tr:nth-child(even):hover td',
			]
		);

		$this->add_responsive_control(
			'additional_information_transition_duration',
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
					'.woocommerce {{WRAPPER}} .shop_attributes tr' => 'transition: all {{SIZE}}s',
					'.woocommerce {{WRAPPER}} .shop_attributes tr td' => 'transition: all {{SIZE}}s',
					'.woocommerce {{WRAPPER}} .shop_attributes tr th' => 'transition: all {{SIZE}}s',
				],
			]
		);

		$this->end_controls_tab(); // End "Hover" Tab
		$this->end_controls_tabs();
		$this->end_controls_section(); // End ADDITIONAL INFORMATION









		// COMMENTS
		$this->start_controls_section(
			'section_product_comments_style',
			[
				'label' => __( 'تب نظرات', 'cybershop' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		// Heading
		$this->add_control(
			'heading_comments_heading_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'هدینگ', 'cybershop' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'comments_title_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-Reviews-title' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'comments_title_display',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'none' => __( 'هیچ', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-Reviews-title' => 'display: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'comments_title_align',
			[
				'label' => __( 'تراز', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'right',
				'options' => [
					'left' => [
						'title' => __( 'چپ', 'cybershop' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'وسط', 'cybershop' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'راست', 'cybershop' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-Reviews-title' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'comments_title_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .woocommerce-Reviews-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'comments_title_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-Reviews-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'comments_title_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-Reviews-title',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'comments_title_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-Reviews-title',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'comments_title_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .woocommerce-Reviews-title',
			]
		);

		$this->add_control(
			'comments_title_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-Reviews-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'comments_title_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-Reviews-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'comments_title_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-Reviews-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		// Comment
		$this->add_control(
			'heading_comments_comment_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'کامنت', 'cybershop' ),
				'separator' => 'before',
			]
		);

		// Author
		$this->add_control(
			'heading_comments_comment_author_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'نویسنده', 'cybershop' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'comments_comment_author_display',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'none' => __( 'هیچ', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-review__author' => 'display: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'comments_comment_author_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-review__author' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'comments_comment_author_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .woocommerce-review__author',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'comments_comment_author_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-review__author',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'comments_comment_author_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-review__author',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'comments_comment_author_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-review__author',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'comments_comment_author_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .woocommerce-review__author',
			]
		);

		$this->add_control(
			'comments_comment_author_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-review__author' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'comments_comment_author_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-review__author' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'comments_comment_author_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-review__author' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Date Published
		$this->add_control(
			'heading_comments_comment_date_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'تاریخ انتشار', 'cybershop' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'comments_comment_date_display',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'none' => __( 'هیچ', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-review__published-date' => 'display: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'comments_comment_date_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-review__published-date' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'comments_comment_date_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .woocommerce-review__published-date',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'comments_comment_date_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-review__published-date',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'comments_comment_date_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-review__published-date',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'comments_comment_date_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-review__published-date',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'comments_comment_date_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .woocommerce-review__published-date',
			]
		);

		$this->add_control(
			'comments_comment_date_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-review__published-date' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'comments_comment_date_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-review__published-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'comments_comment_date_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-review__published-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);




		// Content
		$this->add_control(
			'heading_comments_comment_content_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'محتوا', 'cybershop' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'comments_comment_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .comment-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'comments_comment_display',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'none' => __( 'هیچ', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .comment-text' => 'display: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'comments_comment_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .comment-text',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'comments_comment_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .comment-text',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'comments_comment_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .comment-text',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'comments_comment_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .comment-text',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'comments_comment_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .comment-text',
			]
		);

		$this->add_control(
			'comments_comment_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .comment-text' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'comments_comment_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .comment-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'comments_comment_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .comment-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);


		// Rating
		$this->add_control(
			'heading_comments_rating_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'امتیاز', 'cybershop' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'comments_rating_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'.woocommerce {{WRAPPER}} .star-rating:before' => 'color: {{VALUE}}',
					'.woocommerce {{WRAPPER}} p.stars a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'comments_rating_fill_color',
			[
				'label' => __( 'رنگ پر شده', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .star-rating' => 'color: {{VALUE}}',
					'.woocommerce {{WRAPPER}} p.stars a:hover' => 'color: {{VALUE}}',
				],
			]
		);
		
		
		// Text Area
		$this->add_control(
			'heading_comments_textarea_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'باکس پیام', 'cybershop' ),
				'separator' => 'before',
			]
		);
		$this->add_control(
			'comments_textarea_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} textarea#comment, {{WRAPPER}} input#author, {{WRAPPER}} input#email' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'comments_textarea_display',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'none' => __( 'هیچ', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} textarea#comment, {{WRAPPER}} input#author, {{WRAPPER}} input#email' => 'display: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'comments_textarea_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} textarea#comment, {{WRAPPER}} input#author, {{WRAPPER}} input#email',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'comments_textarea_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} textarea#comment, {{WRAPPER}} input#author, {{WRAPPER}} input#email',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'comments_textarea_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} textarea#comment, {{WRAPPER}} input#author, {{WRAPPER}} input#email',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'comments_textarea_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} textarea#comment, {{WRAPPER}} input#author, {{WRAPPER}} input#email',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'comments_textarea_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} textarea#comment, {{WRAPPER}} input#author, {{WRAPPER}} input#email',
			]
		);

		$this->add_control(
			'comments_textarea_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} textarea#comment' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} input#author' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} input#email' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'comments_textarea_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} textarea#comment' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} input#author' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} input#email' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'comments_textarea_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} textarea#comment' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} input#author' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} input#email' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Button
		$this->add_control(
			'heading_comments_button_style',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'دکمه', 'cybershop' ),
				'separator' => 'before',
			]
		);

		$this->add_control(
			'comments_button_direction',
			[
				'label' => __( 'جهت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'right',
				'options' => [
					'right' 	=> __( 'راست', 'cybershop' ),
					'left' => __( 'چپ', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} input#submit' => 'float: {{VALUE}}',
				],
			]
		);

		$this->start_controls_tabs( 'button_style' );

		// NORMAL
		$this->start_controls_tab( 'normal_button_style',
			[
				'label' => __( 'عادی', 'cybershop' ),
			]
		);
		$this->add_control(
			'comments_button_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input#submit' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'comments_button_display',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'none' => __( 'هیچ', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} input#submit' => 'display: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'comments_button_background',
			[
				'label' => __( 'پس زمینه', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input#submit' => 'background: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'comments_button_border_style',
			[
				'label' => __( 'استایل حاشیه', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'solid' => __( 'Solid', 'cybershop' ),
					'dashed' => __( 'Dashed', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} input#submit' => 'border-style: {{VALUE}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'comments_button_border_width',
			[
				'label' => __( 'قطر حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} input#submit' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_control(
			'comments_button_border_color',
			[
				'label' => __( 'رنگ حاشیه', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input#submit' => 'border-color: {{VALUE}} !important',
				],
			]
		);

		$this->add_responsive_control(
			'comments_button_typography',
			[
				'label' => __( 'اندازه فونت', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} input#submit' => 'font-size: {{SIZE}}{{UNIT}} !important',
				],
			]
		);

		$this->add_control(
			'comments_button_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} input#submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'comments_button_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} input#submit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'comments_button_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} input#submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);
		$this->end_controls_tab();

		// HOVER
		$this->start_controls_tab( 'hover_button_style',
			[
				'label' => __( 'هاور', 'cybershop' ),
			]
		);

		$this->add_responsive_control(
			'button_transition_duration',
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
					'{{WRAPPER}} input#submit' => 'transition: all {{SIZE}}s',
				],
			]
		);

		$this->add_control(
			'hover_comments_button_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input#submit:hover' => 'color: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'hover_comments_button_display',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'none' => __( 'هیچ', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} input#submit:hover' => 'display: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'hover_comments_button_background',
			[
				'label' => __( 'پس زمینه', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input#submit:hover' => 'background: {{VALUE}} !important',
				],
			]
		);

		$this->add_control(
			'hover_comments_button_border_style',
			[
				'label' => __( 'استایل حاشیه', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => [
					'solid' => __( 'Solid', 'cybershop' ),
					'dashed' => __( 'Dashed', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} input#submit:hover' => 'border-style: {{VALUE}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'hover_comments_button_border_width',
			[
				'label' => __( 'قطر حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} input#submit:hover' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_control(
			'hover_comments_button_border_color',
			[
				'label' => __( 'رنگ حاشیه', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input#submit:hover' => 'border-color: {{VALUE}} !important',
				],
			]
		);

		$this->add_responsive_control(
			'hover_comments_button_typography',
			[
				'label' => __( 'اندازه فونت', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} input#submit:hover' => 'font-size: {{SIZE}}{{UNIT}} !important',
				],
			]
		);

		$this->add_control(
			'hover_comments_button_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} input#submit:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'hover_comments_button_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} input#submit:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'hover_comments_button_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} input#submit:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);
		$this->end_controls_tabs();

		$this->end_controls_section(); // END COMMENTS

	}

	protected function render() {
		global $product;
		global $product_tab_settings;

		$product_tab_settings = $this->get_settings_for_display();

		$product = wc_get_product();

		if ( empty( $product ) ) {
			return;
		}

		setup_postdata( $product->get_id() );

		wc_get_template( 'single-product/tabs/tabs.php' );

		// On render widget from Editor - trigger the init manually.
		?>
		<script>
			jQuery( '.wc-tabs-wrapper, .woocommerce-tabs, #rating' ).trigger( 'init' );
		</script>
		<?php
	}

	public function render_plain_content() {}
}
