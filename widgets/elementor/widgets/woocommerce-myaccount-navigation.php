<?php

namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopWoocommerceMyaccountNavigation extends Widget_Base {

	// Slug
	public function get_name() {
		return 'cybershop-woocommerce-myaccount-navigation';
	}

	// Title
	public function get_title() {
		return __('داشبورد حساب کاربری (ناوبری)', 'cybershop');
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
			'section_wrapper_style',
			[
				'label' => __( 'پوسته', 'cybershop' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'align',
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
					'{{WRAPPER}} .cybershop-myaccount-navigation ul' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'display',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'flex' => __( 'فلکس', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .cybershop-myaccount-navigation ul' => 'display: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'links_display',
			[
				'label' => __( 'حالت نمایش لینک ها', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'flex' => __( 'فلکس', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .cybershop-myaccount-navigation ul a' => 'display: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'justify_content',
			[
				'label' => __( 'حالت نمایش جزعایت', 'cybershop' ),
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
				'condition' => [
					'display' => 'flex',
				],
				'selectors' => [
					'{{WRAPPER}} .cybershop-myaccount-navigation ul' => 'justify-content: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'flex_direction',
			[
				'label' => __( 'جهت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'row',
				'options' => [
					'row' 			 => __( 'row', 'cybershop' ),
					'row-reverse' 	 => __( 'row-reverse', 'cybershop' ),
					'column' 		 => __( 'column', 'cybershop' ),
					'column-reverse' => __( 'column-reverse', 'cybershop' ),
				],
				'condition' => [
					'display' => 'flex',
				],
				'selectors' => [
					'{{WRAPPER}} .cybershop-myaccount-navigation ul' => 'flex-direction: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'links_hover_animation',
			[
				'label' => __( 'انیمیشن هاور', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
			]
		);

		// End "Wrapper" Controls
		$this->end_controls_section();	


		// Links
		$this->start_controls_section(
			'section_links_style',
			[
				'label' => __( 'لینک ها', 'cybershop' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'tabs_link_style' );
		// "Links" Tab
		$this->start_controls_tab(
			'tab_links_normal',
			[
				'label' => __( 'عادی', 'cybershop' ),
			]
		);

		$this->add_control(
			'links_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .cybershop-myaccount-navigation ul a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'links_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .cybershop-myaccount-navigation ul a',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'links_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-myaccount-navigation ul a',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'links_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-myaccount-navigation ul a',
			]
		);

		$this->add_control(
			'links_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-myaccount-navigation ul a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'links_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-myaccount-navigation ul a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'links_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-myaccount-navigation ul a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'links_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .cybershop-myaccount-navigation ul a',
			]
		);
		$this->end_controls_tab(); // End "Links" Tab

		// "Links (Hover)" Tab
		$this->start_controls_tab(
			'tab_links_hover',
			[
				'label' => __( 'هاور', 'cybershop' ),
			]
		);

		$this->add_responsive_control(
			'links_transition_duration',
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
					'{{WRAPPER}} .cybershop-myaccount-navigation ul a' => 'transition: all {{SIZE}}s',
				],
			]
		);

		$this->add_control(
			'hover_links_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .cybershop-myaccount-navigation ul a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'hover_links_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .cybershop-myaccount-navigation ul a:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'hover_links_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-myaccount-navigation ul a:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'hover_links_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .cybershop-myaccount-navigation ul a:hover',
			]
		);

		$this->add_control(
			'hover_links_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-myaccount-navigation ul a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'hover_links_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-myaccount-navigation ul a:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'hover_links_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .cybershop-myaccount-navigation ul a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab(); // End "Links (Hover)" Tab
		$this->end_controls_tabs();

		// End "Links" Controls
		$this->end_controls_section();	


	}

	// PHP-RENDER
	public function render() {
		$settings  = $this->get_settings_for_display();

		global $navigation_settings;
		$navigation_settings = $settings;

		// Render woocommerce myaccount Navigation fragment
		wc_get_template( 'myaccount/navigation.php');
		
		// Editor Mode
		if( \Elementor\Plugin::$instance->editor->is_edit_mode() ):
		?>
		<style type="text/css">
			.elementor-element.elementor-widget-empty {
				background: inherit;
			}
		</style>
		<?php 
		endif; 

		// Do not show the navigation container when user is not logged in
		if(!is_user_logged_in()):
		?>
		<script type="text/javascript">
			const navigation_container = $(".elementor-element-<?=$this->get_id()?>").parents('.elementor-element')[0]
			navigation_container.style.display = "none"
		</script>
		<?php
		endif;
	}
}
