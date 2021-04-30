<?php
namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Schemes;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopProductAdditionalInformation extends Widget_Base {

	// Slug
	public function get_name() {
		return 'cybershop-product-additional-information';
	}

	// Title
	public function get_title() {
		return __('اطلاعات اضافی', 'cybershop');
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

		$this->start_controls_section( 'section_additional_info_style', [
			'label' => __( 'عمومی', 'cybershop' ),
			'tab' => Controls_Manager::TAB_STYLE,
		] );

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
				'label' => __( 'رنگ عنوان', 'cybershop' ),
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
				'label' => __( 'تایپوگرافی عنوان', 'cybershop' ),
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
				'label' => __( 'رنگ عنوان', 'cybershop' ),
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
				'label' => __( 'رنگ عنوان', 'cybershop' ),
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
				'label' => __( 'رنگ عنوان', 'cybershop' ),
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
				'label' => __( 'رنگ عنوان', 'cybershop' ),
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
					'.woocommerce {{WRAPPER}} .shop_attributes tr' => 'transition: all {{SIZE}}s',
					'.woocommerce {{WRAPPER}} .shop_attributes tr td' => 'transition: all {{SIZE}}s',
					'.woocommerce {{WRAPPER}} .shop_attributes tr th' => 'transition: all {{SIZE}}s',
				],
			]
		);
		
		$this->end_controls_tab(); // End "Hover" Tab

		$this->end_controls_section();
	}

	protected function render() {
		$settings  = $this->get_settings_for_display();

		global $product;
		$product = wc_get_product();

		if ( empty( $product ) ) {
			return;
		}

		// wc_get_template( 'single-product/tabs/additional-information.php' );

		global $product;

		$heading = null;
		if(!empty($settings['additional_information_text'])) {
			$heading = $settings['additional_information_text'];
		} else {
			$heading = apply_filters( 'woocommerce_product_additional_information_heading', __( 'Additional information', 'woocommerce' ) );
		}

		if($settings['additional_information_show_heading'] === "yes") {
			echo "<{$settings['additional_information_tag']} class='is-{$settings['additional_information_align']}' id='cybershop_product_additional_information_heading'>{$heading}</{$settings['additional_information_tag']}>";
		}

		do_action( 'woocommerce_product_additional_information', $product );
	}

	public function render_plain_content() {}
}
