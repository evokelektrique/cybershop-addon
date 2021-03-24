<?php
namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopMegaMenu extends Widget_Base {

	// Slug
	public function get_name() {
		return 'cybershop-mega-menu';
	}

	// Title
	public function get_title() {
		return __('Mega Menu', 'cybershop');
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



		// 
		// SETTINGS
		// 
		// Start Controls
		$this->start_controls_section(
			'mm_settings', [
				'label' => __('تنظیمات', 'cybershop')
			]
		);

		// Selected Menu
		$this->add_control(
			'mm_selected_menu',
			[
				'label' => __( 'منو', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'options' => \Helper::get_wordpress_menus()
			]
		);

		// Auto Calculate Width Of Both Menus
		$this->add_responsive_control(
			'mm_width',
			[
				'label' => __( 'عرض', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 15,
				],
				'range' => [
					'px' => [
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu > ul > li > ul > li' => 'width: {{SIZE}}%',
					'{{WRAPPER}} .cybershop-mega-menu > ul > li > ul > li > ul' => 'right: {{SIZE}}%; width: calc(100% - {{SIZE}}%);',
				],
			]
		);
		
		$this->add_control(
			'mm_development_mode',
			[
				'label' => __( 'حالت', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'test',
				'options' => [
					'test' => [
						'title' => __( 'تست', 'cybershop' ),
						'icon' => 'eicon-h-align-right',
					],
					'prod' => [
						'title' => __( 'عادی', 'cybershop' ),
						'icon' => 'fas fa-home',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu > ul > li > ul' => '{{VALUE}}',
					'{{WRAPPER}} .cybershop-mega-menu > ul > li > ul li ul' => '{{VALUE}}',
				],
				'selectors_dictionary' => [
					'test' => 'visibility: visible; opacity: 1;',
				],    
			]
		);


		$this->end_controls_section(); // END SETTINGS	













		// 
		// BUTTON
		// 
		// Start Controls
		$this->start_controls_section(
			'section_button', [
				'label' => __('دکمه', 'cybershop')
			]
		);

		$this->add_control(
			'mm_button_text',
			[
				'label' => __( 'متن', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'عنوان دکمه', 'cybershop' ),
				'placeholder' => __( 'عنوان دکمه را وارد کنید', 'cybershop' ),
			],
		);

		$this->add_control(
			'mm_button_icon',
			[
				'label' => __( 'آیکون', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-chevron-down',
					'library' => 'solid',
				]
			]
		);

		$this->add_control(
			'mm_button_display',
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
					'{{WRAPPER}} .cybershop-mega-menu .toggle' => 'display: {{VALUE}}',
				],
			]
		);
	   
	   $this->add_control(
	   	'tab_justify_content',
	   	[
	   		'label' => __( 'حالت چیدمان', 'cybershop' ),
	   		'type' => \Elementor\Controls_Manager::SELECT,
	   		'default' => 'flex-end',
	   		'options' => [
	   			'space-between' => __( 'space-between', 'cybershop' ),
	   			'space-around' 	=> __( 'space-around', 'cybershop' ),
	   			'space-evenly' 	=> __( 'space-evenly', 'cybershop' ),
	   			'center' 		=> __( 'center', 'cybershop' ),
	   			'end' 			=> __( 'end', 'cybershop' ),
	   			'flex-end' 		=> __( 'flex-end', 'cybershop' ),
	   		],
	   		'selectors' => [
	   			'{{WRAPPER}} .cybershop-mega-menu .toggle > button' => 'justify-content: {{VALUE}}',
	   		],
	   	]
	   );

	   $this->add_responsive_control(
	   	'mm_button_width',
	   	[
	   		'label' => __( 'عرض', 'cybershop' ),
	   		'type' => Controls_Manager::SLIDER,
	   		'default' => [
	   			'unit' => '%',
	   			'size' => 100,
	   		],
			'size_units' => [ '%', 'px', 'em' ],
	   		'range' => [
	   			'%' => [
	   				'max' => 100,
	   				'step' => 1,
	   			],
	   		],
	   		'selectors' => [
	   			'{{WRAPPER}} .cybershop-mega-menu .toggle > button' => 'width: {{SIZE}}{{UNIT}}',
	   		],
	   	]
	   );

		$this->add_responsive_control(
			'mm_button_align',
			[
				'label' => __( 'تراز', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'left',
				'options' => [
					'left' => [
						'title' => __( 'چپ', 'cybershop' ),
						'icon' => 'eicon-text-align-left',
					],
					'right' => [
						'title' => __( 'راست', 'cybershop' ),
						'icon' => 'eicon-text-align-right',
					],
				]
			]
		);

		$this->start_controls_tabs( 'tabs_button' );

		// "Normal" Tab
		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'عادی', 'cybershop' ),
			]
		);

		$this->add_control(
			'mm_button_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle > button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' 	   => 'mm_button_background',
				'label'    => __( 'پس زمینه', 'cybershop' ),
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle > button',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'mm_button_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle > button',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mm_button_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle > button',
			]
		);

		$this->add_control(
			'mm_button_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle > button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'mm_button_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle > button',
			]
		);

		$this->add_responsive_control(
			'mm_button_margin',
			[
				'label' 	 => __( 'فاصله', 'cybershop' ),
				'type' 		 => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle > button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'mm_button_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle > button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
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
			'hover_mm_button_transition',
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
					'{{WRAPPER}} .cybershop-mega-menu .toggle > button' => 'transition: all {{SIZE}}s',
				],
			]
		);

		$this->add_control(
			'hover_mm_button_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle > button:hover, {{WRAPPER}} .cybershop-mega-menu .toggle:hover > button,{{WRAPPER}} .cybershop-mega-menu .toggle > button:focus' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' 	   => 'hover_mm_button_background',
				'label'    => __( 'پس زمینه', 'cybershop' ),
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle > button:hover, {{WRAPPER}} .cybershop-mega-menu .toggle:hover > button,{{WRAPPER}} .cybershop-mega-menu .toggle > button:focus',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'hover_mm_button_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle > button:hover, {{WRAPPER}} .cybershop-mega-menu .toggle:hover > button,{{WRAPPER}} .cybershop-mega-menu .toggle > button:focus',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'hover_mm_button_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle > button:hover, {{WRAPPER}} .cybershop-mega-menu .toggle:hover > button,{{WRAPPER}} .cybershop-mega-menu .toggle > button:focus',
			]
		);

		$this->add_control(
			'hover_mm_button_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle > button:hover, {{WRAPPER}} .cybershop-mega-menu .toggle:hover > button,{{WRAPPER}} .cybershop-mega-menu .toggle > button:focus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hover_mm_button_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle > button:hover, {{WRAPPER}} .cybershop-mega-menu .toggle:hover > button,{{WRAPPER}} .cybershop-mega-menu .toggle > button:focus',
			]
		);
		
		$this->add_responsive_control(
			'hover_mm_button_margin',
			[
				'label' 	 => __( 'فاصله', 'cybershop' ),
				'type' 		 => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle > button:hover, {{WRAPPER}} .cybershop-mega-menu .toggle:hover > button,{{WRAPPER}} .cybershop-mega-menu .toggle > button:focus' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'hover_mm_button_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle > button:hover, {{WRAPPER}} .cybershop-mega-menu .toggle:hover > button,{{WRAPPER}} .cybershop-mega-menu .toggle > button:focus' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab(); // End "Hover" Tab

		$this->end_controls_tabs();
		$this->end_controls_section(); // End BUTTON














		// 
		// FIRST MENU
		// 
		// Start Controls
		// .cybershop-mega-menu .toggle:first-child > ul > li > a
		$this->start_controls_section(
			'section_first_menu', [
				'label' => __('منوی اول', 'cybershop')
			]
		);

		$this->add_control(
			'mm_first_menu_wrapper_margin',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle > ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->start_controls_tabs( 'tabs_first_menu' );

		// "Normal" Tab
		$this->start_controls_tab(
			'tab_first_menu_normal',
			[
				'label' => __( 'عادی', 'cybershop' ),
			]
		);

		$this->add_control(
			'mm_first_menu_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' 	   => 'mm_first_menu_background',
				'label'    => __( 'پس زمینه', 'cybershop' ),
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > a',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'mm_first_menu_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > a',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mm_first_menu_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > a',
			]
		);

		$this->add_control(
			'mm_first_menu_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'mm_first_menu_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > a',
			]
		);

		$this->add_responsive_control(
			'mm_first_menu_margin',
			[
				'label' 	 => __( 'فاصله', 'cybershop' ),
				'type' 		 => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'mm_first_menu_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab(); // End "Normal" Tab

		// "Hover" Tab
		$this->start_controls_tab(
			'hover_tab_first_menu_normal',
			[
				'label' => __( 'هاور', 'cybershop' ),
			]
		);

		$this->add_control(
			'mm_first_menu_transition',
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
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > a' => 'transition: all {{SIZE}}s',
				],
			]
		);
		$this->add_control(
			'hover_mm_first_menu_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li:hover > a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' 	   => 'hover_mm_first_menu_background',
				'label'    => __( 'پس زمینه', 'cybershop' ),
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li:hover > a',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'hover_mm_first_menu_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li:hover > a',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'hover_mm_first_menu_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li:hover > a',
			]
		);

		$this->add_control(
			'hover_mm_first_menu_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li:hover > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hover_mm_first_menu_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li:hover > a',
			]
		);

		$this->add_responsive_control(
			'hover_mm_first_menu_margin',
			[
				'label' 	 => __( 'فاصله', 'cybershop' ),
				'type' 		 => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li:hover > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'hover_mm_first_menu_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li:hover > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab(); // End "Hover" Tab

		$this->end_controls_tabs();
		$this->end_controls_section(); // End FIRST MENU


























		// 
		// SECOND MENU
		// 
		// Start Controls
		$this->start_controls_section(
			'section_second_menu', [
				'label' => __('منوی دوم', 'cybershop')
			]
		);

		


		// Heading
		$this->add_control(
			'mm_second_menu_wrapper_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'پوسته', 'cybershop' ),
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' 	   => 'mm_second_menu_wrapper_background',
				'label'    => __( 'پس زمینه', 'cybershop' ),
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'mm_second_menu_wrapper_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'mm_second_menu_wrapper_border',
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul',
			]
		);

		$this->add_control(
			'mm_second_menu_wrapper_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'mm_second_menu_wrapper_margin',
			[
				'label' 	 => __( 'فاصله', 'cybershop' ),
				'type' 		 => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'mm_second_menu_wrapper_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		// Heading
		$this->add_control(
			'tabs_second_menu_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'لینک ها', 'cybershop' ),
				'separator' => 'before',
			]
		);

		$this->start_controls_tabs( 'tabs_second_menu' );

		// "Normal" Tab
		$this->start_controls_tab(
			'tab_second_menu_normal',
			[
				'label' => __( 'عادی', 'cybershop' ),
			]
		);

		$this->add_control(
			'mm_second_menu_head_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li > a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' 	   => 'mm_second_menu_head_background',
				'label'    => __( 'پس زمینه', 'cybershop' ),
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li > a',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'mm_second_menu_head_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li > a',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mm_second_menu_head_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li > a',
			]
		);

		$this->add_control(
			'mm_second_menu_head_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'mm_second_menu_head_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li > a',
			]
		);

		$this->add_responsive_control(
			'mm_second_menu_head_margin',
			[
				'label' 	 => __( 'فاصله', 'cybershop' ),
				'type' 		 => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'mm_second_menu_head_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab(); // End "Normal" Tab

		// "Hover" Tab
		$this->start_controls_tab(
			'tab_second_menu_hover',
			[
				'label' => __( 'هاور', 'cybershop' ),
			]
		);

		$this->add_control(
			'hover_mm_second_menu_head_transition',
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
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li > a' => 'transition: all {{SIZE}}s',
				],
			]
		);

		$this->add_control(
			'hover_mm_second_menu_head_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li:hover > a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' 	   => 'hover_mm_second_menu_head_background',
				'label'    => __( 'پس زمینه', 'cybershop' ),
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li:hover > a',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'hover_mm_second_menu_head_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li:hover > a',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'hover_mm_second_menu_head_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li:hover > a',
			]
		);

		$this->add_control(
			'hover_mm_second_menu_head_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li:hover > a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hover_mm_second_menu_head_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li:hover > a',
			]
		);

		$this->add_responsive_control(
			'hover_mm_second_menu_head_margin',
			[
				'label' 	 => __( 'فاصله', 'cybershop' ),
				'type' 		 => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li:hover > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'hover_mm_second_menu_head_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li:hover > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab(); // End "Hover" Tab
		$this->end_controls_tabs();


























		// Wrapper Sub menu heading
		$this->add_control(
			'second_menu_submenu_wrapper_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'پوسته ساب منو', 'cybershop' ),
				'separator' => 'before',
			]
		);

		// .cybershop-mega-menu > ul > li > ul li ul li ul


		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'mm_submenu_wrapper_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .cybershop-mega-menu > ul > li > ul li ul li ul',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'mm_submenu_wrapper_box_shadow',
				'selector' => '{{WRAPPER}} .cybershop-mega-menu > ul > li > ul li ul li ul',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'mm_submenu_wrapper_border',
				'selector' => '{{WRAPPER}} .cybershop-mega-menu > ul > li > ul li ul li ul',
			]
		);

		$this->add_control(
			'mm_submenu_wrapper_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu > ul > li > ul li ul li ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'mm_submenu_wrapper_margin',
			[
				'label' 	 => __( 'فاصله', 'cybershop' ),
				'type' 		 => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .cybershop-mega-menu > ul > li > ul li ul li ul' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'mm_submenu_wrapper_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu > ul > li > ul li ul li ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);




















		// Sub menu heading
		$this->add_control(
			'second_menu_submenu_heading',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'لینک های ساب منو', 'cybershop' ),
				'separator' => 'before',
			]
		);


		$this->start_controls_tabs( 'tabs_second_menu_submenu' );

		// "Normal" Tab
		$this->start_controls_tab(
			'tab_second_menu_submenu',
			[
				'label' => __( 'عادی', 'cybershop' ),
			]
		);

		$this->add_control(
			'mm_second_menu_submenu_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li ul a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' 	   => 'mm_second_menu_submenu_background',
				'label'    => __( 'پس زمینه', 'cybershop' ),
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li ul a',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'mm_second_menu_submenu_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li ul a',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mm_second_menu_submenu_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li ul a',
			]
		);

		$this->add_control(
			'mm_second_menu_submenu_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li ul a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'mm_second_menu_submenu_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li ul a',
			]
		);

		$this->add_responsive_control(
			'mm_second_menu_submenu_margin',
			[
				'label' 	 => __( 'فاصله', 'cybershop' ),
				'type' 		 => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li ul a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'mm_second_menu_submenu_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li ul a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab(); // End "Normal" Tab

		// "Hover" Tab
		$this->start_controls_tab(
			'tab_second_menu_submenu_hover',
			[
				'label' => __( 'هاور', 'cybershop' ),
			]
		);

		$this->add_control(
			'hover_mm_second_menu_submenu_transition',
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
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li ul a' => 'transition: all {{SIZE}}s',
				],
			]
		);

		$this->add_control(
			'hover_mm_second_menu_submenu_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li ul a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' 	   => 'hover_mm_second_menu_submenu_background',
				'label'    => __( 'پس زمینه', 'cybershop' ),
				'types'    => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li ul a:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'hover_mm_second_menu_submenu_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li ul a:hover',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'hover_mm_second_menu_submenu_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li ul a:hover',
			]
		);

		$this->add_control(
			'hover_mm_second_menu_submenu_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li ul a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hover_mm_second_menu_submenu_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li ul a:hover',
			]
		);

		$this->add_responsive_control(
			'hover_mm_second_menu_submenu_margin',
			[
				'label' 	 => __( 'فاصله', 'cybershop' ),
				'type' 		 => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors'  => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li ul a:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'hover_mm_second_menu_submenu_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-mega-menu .toggle:first-child > ul > li > ul > li ul a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab(); // End "Hover" Tab
		$this->end_controls_tabs();

		$this->end_controls_section(); // End SECOND MENU
		// Head:
		// .cybershop-mega-menu .toggle:first-child > ul > li > ul > li > a
		// Background:
		// .cybershop-mega-menu .toggle:first-child > ul > li > ul
		// SUB MENU:
		// .cybershop-mega-menu .toggle:first-child > ul > li > ul > li ul a

	}

	// PHP-RENDER
	public function render() {

		// Get Settings
		$settings  = $this->get_settings_for_display();
		$mega_menu_button_icon = $settings['mm_button_icon']['value'];
		// Current Selected Menu
		$selected_menu = $settings['mm_selected_menu'];
		if(!empty($selected_menu)) {
			// Get menu list
			$menu = wp_get_nav_menu_items($selected_menu);

			// Build hierarchical tree of $menu
			$menuitems = \Helper::buildTree( $menu );
		}
		?>


		<div class="cybershop-mega-menu">
			<ul>
				<li class="toggle is-<?= $settings['mm_button_align'] ?>">
					<button class="button is-light">
						<span>
							<?php if(!empty($settings['mm_button_text'])): ?>
								<?= $settings['mm_button_text'] ?>
							<?php else: ?>
								<?= __('دسته بندی', 'cybershop') ?>
							<?php endif; ?>
						</span>
						<span class="icon is-small">
							<i class="<?= $mega_menu_button_icon ?>"></i>
						</span>
					</button>
					<ul>
					<?php
					if(!empty($selected_menu)) {
						foreach( $menuitems as $item ) {
							\Helper::create_menu($item);
						}
					}
					?>
					</ul>
				</li>
			</ul>
		</div>

		<?php
	}
}
