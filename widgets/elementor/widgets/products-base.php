<?php
namespace CybershopElementor\Widgets;

use Elementor\Controls_Manager;
use Elementor\Core\Schemes;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

abstract class Products_Base extends Base_Widget {


	protected function _register_controls() {

		$this->start_controls_section(
			'section_products_style',
			[
				'label' => __( 'محصولات', 'cybershop' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'cb_archive_product',
			[
				'label' => __( 'cb_archive_product', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HIDDEN,
				'default' => 'cb_archive_product',
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
			'products_class',
			[
				'type' => Controls_Manager::HIDDEN,
				'default' => 'wc-products',
				'prefix_class' => 'cybershop-products-grid elementor-products-grid elementor-',
			]
		);

		$this->add_responsive_control(
			'column_gap',
			[
				'label' => __( 'فاصله بین سطون ها', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 20,
				],
				'tablet_default' => [
					'size' => 20,
				],
				'mobile_default' => [
					'size' => 20,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products  ul.products' => 'grid-column-gap: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'row_gap',
			[
				'label' => __( 'فاصله بین ردیف ها', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 40,
				],
				'tablet_default' => [
					'size' => 40,
				],
				'mobile_default' => [
					'size' => 40,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}.elementor-wc-products  ul.products' => 'grid-row-gap: {{SIZE}}{{UNIT}}',
				],
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
					'{{WRAPPER}} .product-box' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'details_wrapper_display',
			[
				'label' => __( 'حالت نمایش جزعیات', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'flex' => __( 'فلکس', 'cybershop' ),
				],
			]
		);

		$this->add_control(
			'details_wrapper_justify_content',
			[
				'label' => __( 'حالت نمایش محتوای جزعیات', 'cybershop' ),
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
					'details_wrapper_display' => 'flex',
				],
			]
		);

		$this->add_control(
			'details_wrapper_flex_direction',
			[
				'label' => __( 'جهت نمایش محتویات جزعیات', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'row',
				'options' => [
					'row' 			 => __( 'row', 'cybershop' ),
					'row-reverse' 	 => __( 'row-reverse', 'cybershop' ),
					'column' 		 => __( 'column', 'cybershop' ),
					'column-reverse' => __( 'column-reverse', 'cybershop' ),
				],
				'condition' => [
					'details_wrapper_display' => 'flex',
				],
			]
		);
		
		$this->add_control(
			'box_animation',
			[
				'label' => __( 'انیمیشن ورود', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::ANIMATION,
				'prefix_class' => 'animated ',
			]
		);

		$this->add_control(
			'box_hover_animation',
			[
				'label' => __( 'انیمیشن هاور', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->start_controls_tabs( 'tabs_box_style' );
		// "Box" Tab
		$this->start_controls_tab(
			'tab_box_normal',
			[
				'label' => __( 'عادی', 'cybershop' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .product-box',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-box',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-box',
			]
		);

		$this->add_responsive_control(
			'box_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-box' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);
		
		$this->end_controls_tab(); // End "Box" Tab

		// "Box (Hover)" Tab
		$this->start_controls_tab(
			'tab_box_hover',
			[
				'label' => __( 'هاور', 'cybershop' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_background_hover',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .product-box:hover',
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_box_shadow_hover',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-box:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border_hover',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-box:hover',
			]
		);

		$this->add_responsive_control(
			'box_border_radius_hover',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-box:hover' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_tab(); // End "Box (Hover)" Tab
		$this->end_controls_tabs();

		$this->add_responsive_control(
			'details_align',
			[
				'label' => __( 'تراز مشخصات(رتبه، قیمت)', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'right',
				'options' => [
					'right' => [
						'title' => __( 'راست', 'cybershop' ),
						'icon' => 'eicon-text-align-right',
					],
					'center' => [
						'title' => __( 'وسط', 'cybershop' ),
						'icon' => 'eicon-text-align-center',
					],
					'left' => [
						'title' => __( 'چپ', 'cybershop' ),
						'icon' => 'eicon-text-align-left',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-details-wrapper' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'box_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section(); // End "Products" Section

		// =============================================================
		// Image
		$this->start_controls_section(
			'section_products_image_style',
			[
				'label' => __( 'عکس', 'cybershop' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_image_style',
			[
				'label' => __( 'عکس', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} .product-image',
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'elementor-pro' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-image' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'image_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // End "Image" Section

		// =============================================================
		// Title
		$this->start_controls_section(
			'section_products_title_style',
			[
				'label' => __( 'عنوان', 'cybershop' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_status',
			[
				'label' => __( 'نمایش عنوان', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'پنهان', 'cybershop' ),
				'label_on' => __( 'نمایش', 'cybershop' ),
				'default' => 'yes',
				'return_value' => 'yes',
			]
		);

		$this->start_controls_tabs( 'tabs_title_style' );
		// "Title" Tab
		$this->start_controls_tab(
			'tab_title_normal',
			[
				'label' => __( 'عادی', 'cybershop' ),
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'title_align',
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
					'{{WRAPPER}} .product-title' => 'text-align: {{VALUE}}',
				],
				'condition' => [
					'title_status' => 'yes',
				],
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
					'{{WRAPPER}} .product-title' => 'color: {{VALUE}}',
				],
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'title_display',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
				],
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'title_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .product-title',
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-title',
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'title_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-title',
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'title_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-title',
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .product-title',
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'title_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .product-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'title_status' => 'yes',
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
					'{{WRAPPER}} .product-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'title_status' => 'yes',
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
					'{{WRAPPER}} .product-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);


		$this->end_controls_tab(); // End "Title" Tab

		// "Title (Hover)" Tab
		$this->start_controls_tab(
			'tab_title_hover',
			[
				'label' => __( 'هاور', 'cybershop' ),
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'title_hover_align',
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
					'{{WRAPPER}} .product-title:hover' => 'text-align: {{VALUE}}',
				],
				'condition' => [
					'title_status' => 'yes',
				],
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
					'{{WRAPPER}} .product-title:hover' => 'color: {{VALUE}}',
				],
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'title_hover_display',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
				],
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'title_hover_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .product-title:hover',
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_hover_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-title:hover',
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'title_hover_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-title:hover',
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'title_hover_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-title:hover',
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_hover_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .product-title:hover',
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'title_hover_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .product-title:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'title_hover_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-title:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'title_hover_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-title:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'title_status' => 'yes',
				],
			]
		);

		$this->end_controls_tab(); // End "Title (Hover)" Tab

		$this->end_controls_tabs();
		$this->end_controls_section(); // End "Title" Section

		// =============================================================
		// Reviews
		$this->start_controls_section(
			'section_products_reviews_style',
			[
				'label' => __( 'رتبه', 'cybershop' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'reviews_status',
			[
				'label' => __( 'نمایش رتبه', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'پنهان', 'cybershop' ),
				'label_on' => __( 'نمایش', 'cybershop' ),
				'default' => 'yes',
				'return_value' => 'yes',
			]
		);	

		$this->add_control(
			'reviews_display',
			[
				'label' => __( 'حالت نمایش رتبه', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'flex' => __( 'فلکس', 'cybershop' ),
				],
			]
		);

		$this->add_control(
			'reviews_icon_status',
			[
				'label' => __( 'نمایش آیکون رتبه', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'پنهان', 'cybershop' ),
				'label_on' => __( 'نمایش', 'cybershop' ),
				'default' => 'yes',
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'reviews_average_status',
			[
				'label' => __( 'نمایش میانگین رتبه', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'پنهان', 'cybershop' ),
				'label_on' => __( 'نمایش', 'cybershop' ),
				'default' => 'yes',
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'reviews_count_status',
			[
				'label' => __( 'نمایش تعداد رتبه', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'پنهان', 'cybershop' ),
				'label_on' => __( 'نمایش', 'cybershop' ),
				'default' => 'yes',
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'heading_rating_wrapper_style',
			[
				'label' => __( 'پوسته', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'reviews_icon_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'reviews_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .product-reviews',
				'condition' => [
					'reviews_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'reviews_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-reviews',
				'condition' => [
					'reviews_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'reviews_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-reviews',
				'condition' => [
					'reviews_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'reviews_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-reviews' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'reviews_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'reviews_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-reviews' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'reviews_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'reviews_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-reviews' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'reviews_status' => 'yes',
				],
			]
		);

		// Review "Icon"
		$this->add_control(
			'heading_reviews_icon_style',
			[
				'label' => __( 'ایکون ', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'reviews_icon_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'reviews_icon',
			[
				'label' => __( 'آیکون', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
				'condition' => [
					'reviews_icon_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'reviews_icon_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .product-reviews-icon' => 'color: {{VALUE}}',
				],
				'condition' => [
					'reviews_icon_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'reviews_icon_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-reviews-icon',
				'condition' => [
					'reviews_icon_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'reviews_icon_size',
			[
				'label' => __( 'اندازه', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-reviews-icon' => 'font-size: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'reviews_icon_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'reviews_icon_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-reviews-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'reviews_icon_status' => 'yes',
				],
			]
		);
		// End Review "Icon"

		// Review "Average"
		$this->add_control(
			'heading_reviews_average_style',
			[
				'label' => __( 'متن میانگین ', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'reviews_average_status' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'reviews_average_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .product-reviews-average' => 'color: {{VALUE}}',
				],
				'condition' => [
					'reviews_average_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'reviews_average_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-reviews-average',
				'condition' => [
					'reviews_average_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'reviews_average_size',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .product-reviews-average',
				'condition' => [
					'reviews_average_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'reviews_average_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-reviews-average' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'reviews_average_status' => 'yes',
				],
			]
		);
		// End Review "Average"

		// Review "Count"
		$this->add_control(
			'heading_reviews_count_style',
			[
				'label' => __( 'متن تعداد ', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'reviews_count_status' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'reviews_count_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .product-reviews-count' => 'color: {{VALUE}}',
				],
				'condition' => [
					'reviews_count_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'reviews_count_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-reviews-count',
				'condition' => [
					'reviews_count_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'reviews_count_size',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .product-reviews-count',
				'condition' => [
					'reviews_count_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'reviews_count_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-reviews-count' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'reviews_count_status' => 'yes',
				],
			]
		);
		// End Review "Count"


		$this->end_controls_section(); // End "Reviews" Section

		// =============================================================
		// Price
		$this->start_controls_section(
			'section_products_price_style',
			[
				'label' => __( 'قیمت', 'cybershop' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);


		// Switchers
		$this->add_control(
			'price_switcher_notice',
			[
				'type' => Controls_Manager::RAW_HTML,
				'raw' => __( 'با فعال کردن این قابلیت ', 'cybershop' ),
				'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
			]
		);		

		$this->add_control(
			'sale_price_status',
			[
				'label' => __( 'نمایش قیمت تخفیف', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'پنهان', 'cybershop' ),
				'label_on' => __( 'نمایش', 'cybershop' ),
				'default' => 'yes',
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'regular_price_status',
			[
				'label' => __( 'نمایش قیمت معمولی کنار تخفیف', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'پنهان', 'cybershop' ),
				'label_on' => __( 'نمایش', 'cybershop' ),
				'default' => 'yes',
				'return_value' => 'yes',
				'condition' => [
					'sale_price_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'price_display',
			[
				'label' => __( 'حالت نمایش قیمت', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
					'flex' => __( 'فلکس', 'cybershop' ),
				],
				'condition' => [
					'sale_price_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'normal_price_status',
			[
				'label' => __( 'قیمت (در صورت عدم نمایش قیمت تخفیف)', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'پنهان', 'cybershop' ),
				'label_on' => __( 'نمایش', 'cybershop' ),
				'default' => 'yes',
				'return_value' => 'yes',
				// 'conditions' => [
				// 	'relation' => 'and',
				// 	'terms' => [
				// 		[
				// 			'name' => 'sale_price_status',
				// 			'operator' => '!==',
				// 			'value' => 'yes',
				// 		],
				// 		[
				// 			'name' => 'regular_price_status',
				// 			'operator' => '!==',
				// 			'value' => 'yes',
				// 		],
				// 	],
				// ],
			]
		);
		// End "Switchers"

		// "Sale Price"
		$this->add_control(
			'heading_sale_price_style',
			[
				'label' => __( 'قیمت تخفیف', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'sale_price_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'sale_price_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .product-sale-price',
				'condition' => [
					'sale_price_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sale_price_shadow',
				'label' => __( 'سایه ', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-sale-price',
				'condition' => [
					'sale_price_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'sale_price_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-sale-price',
				'condition' => [
					'sale_price_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'sale_price_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .product-sale-price' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'sale_price_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'sale_price_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-sale-price',
				'condition' => [
					'sale_price_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'sale_price_color',
			[
				'label' => __( 'رنگ ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .product-sale-price' => 'color: {{VALUE}}',
				],
				'condition' => [
					'sale_price_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sale_price_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .product-sale-price',
				'condition' => [
					'sale_price_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'sale_price_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-sale-price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'sale_price_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'sale_price_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-sale-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'sale_price_status' => 'yes',
				],
			]
		);
		// End "Sale Price"

		// "Regular Price"
		$this->add_control(
			'heading_regular_price_style',
			[
				'label' => __( 'قیمت معمولی همراه قیمت تخفیف', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'regular_price_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'regular_price_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .product-regular-price',
				'condition' => [
					'regular_price_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'regular_price_shadow',
				'label' => __( 'سایه ', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-regular-price',
				'condition' => [
					'regular_price_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'regular_price_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-regular-price',
				'condition' => [
					'regular_price_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'regular_price_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .product-regular-price' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'regular_price_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'regular_price_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-regular-price',
				'condition' => [
					'regular_price_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'regular_price_color',
			[
				'label' => __( 'رنگ ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .product-regular-price' => 'color: {{VALUE}}',
				],
				'condition' => [
					'regular_price_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'regular_price_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .product-regular-price',
				'condition' => [
					'regular_price_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'regular_price_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-regular-price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'regular_price_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'regular_price_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-regular-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'regular_price_status' => 'yes',
				],
			]
		);
		// End "Regular Price"

		// "Normal Price"
		$this->add_control(
			'heading_normal_price_style',
			[
				'label' => __( 'قیمت', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'normal_price_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'normal_price_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .product-normal-price',
				'condition' => [
					'normal_price_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'normal_price_shadow',
				'label' => __( 'سایه ', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-normal-price',
				'condition' => [
					'normal_price_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'normal_price_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-normal-price',
				'condition' => [
					'normal_price_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'normal_price_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .product-normal-price' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'normal_price_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'normal_price_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-normal-price',
				'condition' => [
					'normal_price_status' => 'yes',
				],				
			]
		);

		$this->add_control(
			'normal_price_color',
			[
				'label' => __( 'رنگ ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .product-normal-price' => 'color: {{VALUE}}',
				],
				'condition' => [
					'normal_price_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'normal_price_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .product-normal-price',
				'condition' => [
					'normal_price_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'normal_price_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-normal-price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'normal_price_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'normal_price_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-normal-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'normal_price_status' => 'yes',
				],
			]
		);
		// End "Normal Price"
		$this->end_controls_section(); // End "Products Price" Section

		// Add To Cart
		$this->start_controls_section(
			'section_add_to_cart_style',
			[
				'label' => __( 'دکمه سبد خرید', 'cybershop' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'add_to_cart_status',
			[
				'label' => __( 'نمایش سبد خرید', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'پنهان', 'cybershop' ),
				'label_on' => __( 'نمایش', 'cybershop' ),
				'default' => 'yes',
				'return_value' => 'yes',
			]
		);	

		$this->add_control(
			'add_to_cart_fade',
			[
				'label' => __( 'نمایش در صورت هاور', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'پنهان', 'cybershop' ),
				'label_on' => __( 'نمایش', 'cybershop' ),
				'default' => '',
				'return_value' => 'yes',
			]
		);	

		$this->add_control(
			'add_to_cart_text_status',
			[
				'label' => __( 'نمایش متن سبد خرید', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'پنهان', 'cybershop' ),
				'label_on' => __( 'نمایش', 'cybershop' ),
				'default' => 'yes',
				'return_value' => 'yes',
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'heading_add_to_cart_style',
			[
				'label' => __( 'دکمه خرید', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'add_to_cart_text',
			[
				'label' => __( 'متن سبد خرید', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'اضافه به سبد خرید 2', 'cybershop' ),
				'placeholder' => __( 'متن مورد نظر جهت اضافه کردن به دکمه سبد خرید', 'cybershop' ),
			]
		);

		$this->add_control(
			'add_to_cart_hover_animation',
			[
				'label' => __( 'انیمیشن هاور', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'add_to_cart_display',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
				],
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'add_to_cart_float',
			[
				'label' => __( 'موقعیت', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'right' => [
						'title' => __( 'راست', 'cybershop' ),
						'icon' => 'eicon-h-align-right',
					],
					'left' => [
						'title' => __( 'چپ', 'cybershop' ),
						'icon' => 'eicon-h-align-left',
					],
				],
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'add_to_cart_icon',
			[
				'label' => __( 'آیکون', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'add_to_cart_align',
			[
				'label' => __( 'تراز', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'right',
				'options' => [
					'right' => [
						'title' => __( 'راست', 'cybershop' ),
						'icon' => 'eicon-text-align-right',
					],
					'center' => [
						'title' => __( 'وسط', 'cybershop' ),
						'icon' => 'eicon-text-align-center',
					],
					'left' => [
						'title' => __( 'چپ', 'cybershop' ),
						'icon' => 'eicon-text-align-left',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-add-to-cart' => 'text-align: {{VALUE}}',
				],
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_add_to_cart_style' );
		// "Add To Cart" Tab
		$this->start_controls_tab(
			'tab_add_to_cart_normal',
			[
				'label' => __( 'عادی', 'cybershop' ),
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'add_to_cart_text_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .product-add-to-cart-text' => 'color: {{VALUE}};',
				],
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'add_to_cart_icon_color',
			[
				'label' => __( 'رنگ آیکون', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .product-add-to-cart-icon' => 'color: {{VALUE}};',
				],
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'add_to_cart_background_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .product-add-to-cart',
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'add_to_cart_box_shadow',
				'selector' => '{{WRAPPER}} .product-add-to-cart',
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'add_to_cart_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .product-add-to-cart',
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(), [
				'name' => 'add_to_cart_border',
				'selector' => '{{WRAPPER}} .product-add-to-cart',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'add_to_cart_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .product-add-to-cart' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'add_to_cart_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-add-to-cart' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'add_to_cart_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-add-to-cart' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);


		$this->add_responsive_control(
			'add_to_cart_position_status',
			[
				'label' => __( 'جایگاه', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'static',
				'options' => [
					'static' => [
						'title' => __( 'STATIC', 'cybershop' ),
						'icon' => 'fas fa-map-marker',
					],
					'relative' => [
						'title' => __( 'RELATIVE', 'cybershop' ),
						'icon' => 'fas fa-map-marker-alt',
					],
					'absolute' => [
						'title' => __( 'ABSOLUTE', 'cybershop' ),
						'icon' => 'fas fa-arrows-alt',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-add-to-cart' => 'position: {{VALUE}}',
				],
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);	

		// Category Top Position
		$this->add_responsive_control(
			'add_to_cart_top_position',
			[
				'label' => __( 'پوزیشین: (بالا)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-add-to-cart' => 'top: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'add_to_cart_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'add_to_cart_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		// Category Right Position
		$this->add_responsive_control(
			'add_to_cart_right_position',
			[
				'label' => __( 'پوزیشین: (راست)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-add-to-cart' => 'right: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'add_to_cart_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'add_to_cart_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		// Category Bottom Position
		$this->add_responsive_control(
			'add_to_cart_bottom_position',
			[
				'label' => __( 'پوزیشین: (پایین)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-add-to-cart' => 'bottom: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'add_to_cart_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'add_to_cart_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		// Category Left Position
		$this->add_responsive_control(
			'add_to_cart_left_position',
			[
				'label' => __( 'پوزیشین: (چپ)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-add-to-cart' => 'left: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'add_to_cart_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'add_to_cart_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);


		$this->add_control(
			'add_to_cart_zindex',
			[
				'label' => __( 'Z-INDEX', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => -1,
				'max' => 99999,
				'step' => 1,
				'default' => 1,
				'selectors' => [
					'{{WRAPPER}} .product-add-to-cart' => 'z-index: {{VALUE}}',
				],
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'add_to_cart_horizontal_position',
			[
				'label' => __( 'موقعیت', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'right' => [
						'title' => __( 'راست', 'cybershop' ),
						'icon' => 'eicon-h-align-right',
					],
					'left' => [
						'title' => __( 'چپ', 'cybershop' ),
						'icon' => 'eicon-h-align-left',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-add-to-cart' => '{{VALUE}}',
				],
				'selectors_dictionary' => [
					'left' => 'position: absolute; right: auto; left: 0',
					'right' => 'position: absolute; left: auto; right: 0',
				],
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);



		$this->end_controls_tab(); // End "Add To Cart" Tab

		// "Add To Cart (Hover)" Tab
		$this->start_controls_tab(
			'tab_add_to_cart_hover',
			[
				'label' => __( 'هاور', 'cybershop' ),
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'add_to_cart_hover_text_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .product-add-to-cart-text:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'add_to_cart_hover_icon_color',
			[
				'label' => __( 'رنگ آیکون', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .product-add-to-cart-icon:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'add_to_cart_hover_background_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .product-add-to-cart:hover',
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'add_to_cart_hover_box_shadow',
				'selector' => '{{WRAPPER}} .product-add-to-cart:hover',
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'add_to_cart_hover_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .product-add-to-cart:hover',
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(), [
				'name' => 'add_to_cart_hover_border',
				'selector' => '{{WRAPPER}} .product-add-to-cart:hover',
				'separator' => 'before',
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'add_to_cart_hover_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .product-add-to-cart:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'add_to_cart_hover_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-add-to-cart:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'add_to_cart_hover_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-add-to-cart:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'add_to_cart_status' => 'yes',
				],
			]
		);

		$this->end_controls_tab(); // End "Add To Cart (Hover)" Tab

		$this->end_controls_tabs();

		// $this->add_group_control(
		// 	Group_Control_Border::get_type(), [
		// 		'name' => 'button_border',
		// 		'exclude' => [ 'color' ],
		// 		'selector' => '{{WRAPPER}}.elementor-wc-products ul.products li.product .button',
		// 		'separator' => 'before',
		// 	]
		// );

		// $this->add_control(
		// 	'button_text_padding',
		// 	[
		// 		'label' => __( 'Text Padding', 'elementor-pro' ),
		// 		'type' => Controls_Manager::DIMENSIONS,
		// 		'size_units' => [ 'px', 'em', '%' ],
		// 		'selectors' => [
		// 			'{{WRAPPER}}.elementor-wc-products ul.products li.product .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 		],
		// 	]
		// );

		// $this->add_responsive_control(
		// 	'button_spacing',
		// 	[
		// 		'label' => __( 'Spacing', 'elementor-pro' ),
		// 		'type' => Controls_Manager::SLIDER,
		// 		'size_units' => [ 'px', 'em' ],
		// 		'selectors' => [
		// 			'{{WRAPPER}}.elementor-wc-products ul.products li.product .button' => 'margin-top: {{SIZE}}{{UNIT}}',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'heading_view_cart_style',
		// 	[
		// 		'label' => __( 'View Cart', 'elementor-pro' ),
		// 		'type' => Controls_Manager::HEADING,
		// 		'separator' => 'before',
		// 	]
		// );

		// $this->add_control(
		// 	'view_cart_color',
		// 	[
		// 		'label' => __( 'Color', 'elementor-pro' ),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}}.elementor-wc-products .added_to_cart' => 'color: {{VALUE}}',
		// 		],
		// 	]
		// );

		// $this->add_group_control(
		// 	Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'view_cart_typography',
		// 		'scheme' => Schemes\Typography::TYPOGRAPHY_4,
		// 		'selector' => '{{WRAPPER}}.elementor-wc-products .added_to_cart',
		// 	]
		// );

		// $this->end_controls_section(); // End "Add To Cart"

		// $this->start_controls_section(
		// 	'section_design_box',
		// 	[
		// 		'label' => __( 'Box Test?', 'elementor-pro' ),
		// 		'tab' => Controls_Manager::TAB_STYLE,
		// 	]
		// );

		// $this->add_control(
		// 	'box_border_width',
		// 	[
		// 		'label' => __( 'Border Width', 'elementor-pro' ),
		// 		'type' => Controls_Manager::DIMENSIONS,
		// 		'size_units' => [ 'px' ],
		// 		'range' => [
		// 			'px' => [
		// 				'min' => 0,
		// 				'max' => 50,
		// 			],
		// 		],
		// 		'selectors' => [
		// 			'{{WRAPPER}}.elementor-wc-products ul.products li.product' => 'border-style: solid; border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'box_border_radius',
		// 	[
		// 		'label' => __( 'Border Radius', 'elementor-pro' ),
		// 		'type' => Controls_Manager::SLIDER,
		// 		'size_units' => [ 'px', '%' ],
		// 		'range' => [
		// 			'px' => [
		// 				'min' => 0,
		// 				'max' => 200,
		// 			],
		// 		],
		// 		'selectors' => [
		// 			'{{WRAPPER}}.elementor-wc-products ul.products li.product' => 'border-radius: {{SIZE}}{{UNIT}}',
		// 		],
		// 	]
		// );

		// $this->add_responsive_control(
		// 	'box_padding',
		// 	[
		// 		'label' => __( 'Padding', 'elementor-pro' ),
		// 		'type' => Controls_Manager::DIMENSIONS,
		// 		'size_units' => [ 'px', 'em' ],
		// 		'range' => [
		// 			'px' => [
		// 				'min' => 0,
		// 				'max' => 50,
		// 			],
		// 		],
		// 		'selectors' => [
		// 			'{{WRAPPER}}.elementor-wc-products ul.products li.product' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
		// 		],
		// 	]
		// );

		// $this->start_controls_tabs( 'box_style_tabs' );

		// $this->start_controls_tab( 'classic_style_normal',
		// 	[
		// 		'label' => __( 'Normal', 'elementor-pro' ),
		// 	]
		// );

		// $this->add_group_control(
		// 	Group_Control_Box_Shadow::get_type(),
		// 	[
		// 		'name' => 'box_shadow',
		// 		'selector' => '{{WRAPPER}}.elementor-wc-products ul.products li.product',
		// 	]
		// );

		// $this->add_control(
		// 	'box_bg_color',
		// 	[
		// 		'label' => __( 'Background Color', 'elementor-pro' ),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}}.elementor-wc-products ul.products li.product' => 'background-color: {{VALUE}}',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'box_border_color',
		// 	[
		// 		'label' => __( 'Border Color', 'elementor-pro' ),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}}.elementor-wc-products ul.products li.product' => 'border-color: {{VALUE}}',
		// 		],
		// 	]
		// );

		// $this->end_controls_tab();

		// $this->start_controls_tab( 'classic_style_hover',
		// 	[
		// 		'label' => __( 'Hover', 'elementor-pro' ),
		// 	]
		// );

		// $this->add_group_control(
		// 	Group_Control_Box_Shadow::get_type(),
		// 	[
		// 		'name' => 'box_shadow_hover',
		// 		'selector' => '{{WRAPPER}}.elementor-wc-products ul.products li.product:hover',
		// 	]
		// );

		// $this->add_control(
		// 	'box_bg_color_hover',
		// 	[
		// 		'label' => __( 'Background Color', 'elementor-pro' ),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}}.elementor-wc-products ul.products li.product:hover' => 'background-color: {{VALUE}}',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'box_border_color_hover',
		// 	[
		// 		'label' => __( 'Border Color', 'elementor-pro' ),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}}.elementor-wc-products ul.products li.product:hover' => 'border-color: {{VALUE}}',
		// 		],
		// 	]
		// );

		// $this->end_controls_tab();

		// $this->end_controls_tabs();

		// $this->end_controls_section();

		// $this->start_controls_section(
		// 	'section_pagination_style',
		// 	[
		// 		'label' => __( 'Pagination', 'elementor-pro' ),
		// 		'tab' => Controls_Manager::TAB_STYLE,
		// 		'condition' => [
		// 			'paginate' => 'yes',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'pagination_spacing',
		// 	[
		// 		'label' => __( 'Spacing', 'elementor-pro' ),
		// 		'type' => Controls_Manager::SLIDER,
		// 		'selectors' => [
		// 			'{{WRAPPER}} nav.woocommerce-pagination' => 'margin-top: {{SIZE}}{{UNIT}}',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'show_pagination_border',
		// 	[
		// 		'label' => __( 'Border', 'elementor-pro' ),
		// 		'type' => Controls_Manager::SWITCHER,
		// 		'label_off' => __( 'Hide', 'elementor-pro' ),
		// 		'label_on' => __( 'Show', 'elementor-pro' ),
		// 		'default' => 'yes',
		// 		'return_value' => 'yes',
		// 		'prefix_class' => 'elementor-show-pagination-border-',
		// 	]
		// );

		// $this->add_control(
		// 	'pagination_border_color',
		// 	[
		// 		'label' => __( 'Border Color', 'elementor-pro' ),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} nav.woocommerce-pagination ul' => 'border-color: {{VALUE}}',
		// 			'{{WRAPPER}} nav.woocommerce-pagination ul li' => 'border-right-color: {{VALUE}}; border-left-color: {{VALUE}}',
		// 		],
		// 		'condition' => [
		// 			'show_pagination_border' => 'yes',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'pagination_padding',
		// 	[
		// 		'label' => __( 'Padding', 'elementor-pro' ),
		// 		'type' => Controls_Manager::SLIDER,
		// 		'range' => [
		// 			'em' => [
		// 				'min' => 0,
		// 				'max' => 2,
		// 				'step' => 0.1,
		// 			],
		// 		],
		// 		'size_units' => [ 'em' ],
		// 		'selectors' => [
		// 			'{{WRAPPER}} nav.woocommerce-pagination ul li a, {{WRAPPER}} nav.woocommerce-pagination ul li span' => 'padding: {{SIZE}}{{UNIT}}',
		// 		],
		// 	]
		// );

		// $this->add_group_control(
		// 	Group_Control_Typography::get_type(),
		// 	[
		// 		'name' => 'pagination_typography',
		// 		'selector' => '{{WRAPPER}} nav.woocommerce-pagination',
		// 	]
		// );

		// $this->start_controls_tabs( 'pagination_style_tabs' );

		// $this->start_controls_tab( 'pagination_style_normal',
		// 	[
		// 		'label' => __( 'Normal', 'elementor-pro' ),
		// 	]
		// );

		// $this->add_control(
		// 	'pagination_link_color',
		// 	[
		// 		'label' => __( 'Color', 'elementor-pro' ),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} nav.woocommerce-pagination ul li a' => 'color: {{VALUE}}',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'pagination_link_bg_color',
		// 	[
		// 		'label' => __( 'Background Color', 'elementor-pro' ),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} nav.woocommerce-pagination ul li a' => 'background-color: {{VALUE}}',
		// 		],
		// 	]
		// );

		// $this->end_controls_tab();

		// $this->start_controls_tab( 'pagination_style_hover',
		// 	[
		// 		'label' => __( 'Hover', 'elementor-pro' ),
		// 	]
		// );

		// $this->add_control(
		// 	'pagination_link_color_hover',
		// 	[
		// 		'label' => __( 'Color', 'elementor-pro' ),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} nav.woocommerce-pagination ul li a:hover' => 'color: {{VALUE}}',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'pagination_link_bg_color_hover',
		// 	[
		// 		'label' => __( 'Background Color', 'elementor-pro' ),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} nav.woocommerce-pagination ul li a:hover' => 'background-color: {{VALUE}}',
		// 		],
		// 	]
		// );

		// $this->end_controls_tab();

		// $this->start_controls_tab( 'pagination_style_active',
		// 	[
		// 		'label' => __( 'Active', 'elementor-pro' ),
		// 	]
		// );

		// $this->add_control(
		// 	'pagination_link_color_active',
		// 	[
		// 		'label' => __( 'Color', 'elementor-pro' ),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} nav.woocommerce-pagination ul li span.current' => 'color: {{VALUE}}',
		// 		],
		// 	]
		// );

		// $this->add_control(
		// 	'pagination_link_bg_color_active',
		// 	[
		// 		'label' => __( 'Background Color', 'elementor-pro' ),
		// 		'type' => Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} nav.woocommerce-pagination ul li span.current' => 'background-color: {{VALUE}}',
		// 		],
		// 	]
		// );

		// $this->end_controls_tab();

		// $this->end_controls_tabs();

		// $this->end_controls_section();

		// $this->start_controls_section(
		// 	'sale_flash_style',
		// 	[
		// 		'label' => __( 'Sale Flash', 'elementor-pro' ),
		// 		'tab' => Controls_Manager::TAB_STYLE,
		// 	]
		// );

		$this->end_controls_section(); // End "Add To Cart"

		// Sale Badge
		$this->start_controls_section(
			'section_sale_badge_style',
			[
				'label' => __( 'نشانه تخفیف', 'cybershop' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sale_badge_status',
			[
				'label' => __( 'نشانه تخفیف', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'پنهان', 'cybershop' ),
				'label_on' => __( 'نمایش', 'cybershop' ),
				'separator' => 'before',
				'default' => 'yes',
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'sale_badge_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .product-sale-badge' => 'color: {{VALUE}}',
				],
				'condition' => [
					'sale_badge_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'sale_badge_background_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .product-sale-badge',
				'condition' => [
					'sale_badge_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sale_badge_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-sale-badge',
				'condition' => [
					'sale_badge_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'sale_badge_typography',
				'selector' => '{{WRAPPER}} .product-sale-badge',
				'condition' => [
					'sale_badge_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'sale_badge_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .product-sale-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'sale_badge_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'sale_badge_display',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
				],
				'condition' => [
					'sale_badge_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'sale_badge_width',
			[
				'label' => __( 'عرض', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-sale-badge' => 'min-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'sale_badge_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'sale_badge_height',
			[
				'label' => __( 'طول', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-sale-badge' => 'min-height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'sale_badge_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'sale_badge_horizontal_position',
			[
				'label' => __( 'موقعیت', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'right' => [
						'title' => __( 'راست', 'cybershop' ),
						'icon' => 'eicon-h-align-right',
					],
					'left' => [
						'title' => __( 'چپ', 'cybershop' ),
						'icon' => 'eicon-h-align-left',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-sale-badge' => '{{VALUE}}',
				],
				'selectors_dictionary' => [
					'left' => 'position: absolute; right: auto; left: 0',
					'right' => 'position: absolute; left: auto; right: 0',
				],
				'condition' => [
					'sale_badge_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'sale_badge_position_status',
			[
				'label' => __( 'جایگاه', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'static',
				'options' => [
					'static' => [
						'title' => __( 'STATIC', 'cybershop' ),
						'icon' => 'fas fa-map-marker',
					],
					'relative' => [
						'title' => __( 'RELATIVE', 'cybershop' ),
						'icon' => 'fas fa-map-marker-alt',
					],
					'absolute' => [
						'title' => __( 'ABSOLUTE', 'cybershop' ),
						'icon' => 'fas fa-arrows-alt',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-sale-badge' => 'position: {{VALUE}}',
				],
				'condition' => [
					'sale_badge_status' => 'yes',
				],
			]
		);	

		$this->add_responsive_control(
			'sale_badge_top_position',
			[
				'label' => __( 'پوزیشین: (بالا)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-sale-badge' => 'top: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'sale_badge_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'sale_badge_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		$this->add_responsive_control(
			'sale_badge_right_position',
			[
				'label' => __( 'پوزیشین: (راست)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-sale-badge' => 'right: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'sale_badge_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'sale_badge_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		$this->add_responsive_control(
			'sale_badge_bottom_position',
			[
				'label' => __( 'پوزیشین: (پایین)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-sale-badge' => 'bottom: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'sale_badge_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'sale_badge_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		$this->add_responsive_control(
			'sale_badge_left_position',
			[
				'label' => __( 'پوزیشین: (چپ)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-sale-badge' => 'left: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'sale_badge_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'sale_badge_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);


		$this->add_control(
			'sale_badge_zindex',
			[
				'label' => __( 'Z-INDEX', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => -1,
				'max' => 99999,
				'step' => 1,
				'default' => 1,
				'selectors' => [
					'{{WRAPPER}} .product-sale-badge' => 'z-index: {{VALUE}}',
				],
				'condition' => [
					'sale_badge_status' => 'yes',
				],
			]
		);


		$this->add_responsive_control(
			'sale_badge_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-sale-badge' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'sale_badge_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-sale-badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section(); // End "Sale Badge"

		// Category
		$this->start_controls_section(
			'section_category_style',
			[
				'label' => __( 'دسته بندی', 'cybershop' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'category_status',
			[
				'label' => __( 'نشانه دسته بندی', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'پنهان', 'cybershop' ),
				'label_on' => __( 'نمایش', 'cybershop' ),
				'separator' => 'before',
				'default' => 'yes',
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'category_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .product-category' => 'color: {{VALUE}}',
				],
				'condition' => [
					'category_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'category_background_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .product-category',
				'condition' => [
					'category_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'category_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-category',
				'condition' => [
					'category_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'category_typography',
				'selector' => '{{WRAPPER}} .product-category',
				'condition' => [
					'category_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'category_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-category',
			]
		);

		$this->add_control(
			'category_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .product-category' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'category_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'category_display',
			[
				'label' => __( 'حالت نمایش', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
				],
				'condition' => [
					'category_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'category_width',
			[
				'label' => __( 'عرض', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .product-category' => 'min-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'category_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'category_height',
			[
				'label' => __( 'طول', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .product-category' => 'min-height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'category_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'category_align',
			[
				'label' => __( 'تراز', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'right',
				'options' => [
					'right' => [
						'title' => __( 'راست', 'cybershop' ),
						'icon' => 'eicon-text-align-right',
					],
					'center' => [
						'title' => __( 'وسط', 'cybershop' ),
						'icon' => 'eicon-text-align-center',
					],
					'left' => [
						'title' => __( 'چپ', 'cybershop' ),
						'icon' => 'eicon-text-align-left',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-category' => 'text-align: {{VALUE}}',
				],
				'condition' => [
					'category_status' => 'yes',
				],
			]
		);


		$this->add_responsive_control(
			'category_position_status',
			[
				'label' => __( 'جایگاه', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'static',
				'options' => [
					'static' => [
						'title' => __( 'STATIC', 'cybershop' ),
						'icon' => 'fas fa-map-marker',
					],
					'relative' => [
						'title' => __( 'RELATIVE', 'cybershop' ),
						'icon' => 'fas fa-map-marker-alt',
					],
					'absolute' => [
						'title' => __( 'ABSOLUTE', 'cybershop' ),
						'icon' => 'fas fa-arrows-alt',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-category' => 'position: {{VALUE}}',
				],
				'condition' => [
					'category_status' => 'yes',
				],
			]
		);	

		// Category Top Position
		$this->add_responsive_control(
			'category_top_position',
			[
				'label' => __( 'پوزیشین: (بالا)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-category' => 'top: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'category_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'category_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		// Category Right Position
		$this->add_responsive_control(
			'category_right_position',
			[
				'label' => __( 'پوزیشین: (راست)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-category' => 'right: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'category_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'category_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		// Category Bottom Position
		$this->add_responsive_control(
			'category_bottom_position',
			[
				'label' => __( 'پوزیشین: (پایین)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-category' => 'bottom: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'category_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'category_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		// Category Left Position
		$this->add_responsive_control(
			'category_left_position',
			[
				'label' => __( 'پوزیشین: (چپ)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-category' => 'left: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'category_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'category_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);


		$this->add_control(
			'category_zindex',
			[
				'label' => __( 'Z-INDEX', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => -1,
				'max' => 99999,
				'step' => 1,
				'default' => 1,
				'selectors' => [
					'{{WRAPPER}} .product-category' => 'z-index: {{VALUE}}',
				],
				'condition' => [
					'category_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'category_horizontal_position',
			[
				'label' => __( 'موقعیت', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'right' => [
						'title' => __( 'راست', 'cybershop' ),
						'icon' => 'eicon-h-align-right',
					],
					'left' => [
						'title' => __( 'چپ', 'cybershop' ),
						'icon' => 'eicon-h-align-left',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-category' => '{{VALUE}}',
				],
				'selectors_dictionary' => [
					'left' => 'position: absolute; right: auto; left: 0',
					'right' => 'position: absolute; left: auto; right: 0',
				],
				'condition' => [
					'category_status' => 'yes',
				],
			]
		);


		$this->add_responsive_control(
			'category_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-category' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'category_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'category_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-category' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'category_status' => 'yes',
				],
			]
		);

		$this->end_controls_section(); // End "Category"

		// Start "Buttons"
		$this->start_controls_section(
			'section_buttons_style',
			[
				'label' => __( 'دکمه ها (علاقه مندی، مقایسه)', 'cybershop' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'compare_button_status',
			[
				'label' => __( 'نمایش دکمه "مقایسه"', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'پنهان', 'cybershop' ),
				'label_on' => __( 'نمایش', 'cybershop' ),
				'default' => 'yes',
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'like_button_status',
			[
				'label' => __( 'نمایش دکمه "علاقه مندی"', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'پنهان', 'cybershop' ),
				'label_on' => __( 'نمایش', 'cybershop' ),
				'default' => 'yes',
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'heading_buttons_style',
			[
				'label' => __( 'پوسته', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'buttons_align',
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
					'{{WRAPPER}} .product-buttons' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'buttons_display',
			[
				'label' => __( 'حالت نمایش ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'buttons_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .product-buttons',
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'buttons_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-buttons',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'buttons_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-buttons',
			]
		);

		$this->add_responsive_control(
			'buttons_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-buttons' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);

		// Start "Compare Button"
		$this->add_control(
			'heading_compare_button_style',
			[
				'label' => __( 'دکمه "مقایسه"', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'compare_button_display',
			[
				'label' => __( 'حالت نمایش ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'compare_button_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .product-compare-button',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'compare_button_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-compare-button',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'compare_button_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-compare-button',
			]
		);

		$this->add_control(
			'compare_button_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .product-compare-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'compare_button_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .product-compare-button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'compare_button_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .product-compare-button',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'compare_button_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-compare-button',
			]
		);

		$this->add_control(
			'compare_button_icon',
			[
				'label' => __( 'آیکون', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fa fa-sliders-h',
					'library' => 'solid',
				],
			]
		);


		$this->add_responsive_control(
			'compare_button_position_status',
			[
				'label' => __( 'جایگاه', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'static',
				'options' => [
					'static' => [
						'title' => __( 'STATIC', 'cybershop' ),
						'icon' => 'fas fa-map-marker',
					],
					'relative' => [
						'title' => __( 'RELATIVE', 'cybershop' ),
						'icon' => 'fas fa-map-marker-alt',
					],
					'absolute' => [
						'title' => __( 'ABSOLUTE', 'cybershop' ),
						'icon' => 'fas fa-arrows-alt',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-compare-button' => 'position: {{VALUE}}',
				],
				'condition' => [
					'compare_button_status' => 'yes',
				],
			]
		);	

		// Category Top Position
		$this->add_responsive_control(
			'compare_button_top_position',
			[
				'label' => __( 'پوزیشین: (بالا)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-compare-button' => 'top: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'compare_button_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'compare_button_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		// Category Right Position
		$this->add_responsive_control(
			'compare_button_right_position',
			[
				'label' => __( 'پوزیشین: (راست)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-compare-button' => 'right: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'compare_button_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'compare_button_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		// Category Bottom Position
		$this->add_responsive_control(
			'compare_button_bottom_position',
			[
				'label' => __( 'پوزیشین: (پایین)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-compare-button' => 'bottom: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'compare_button_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'compare_button_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		// Category Left Position
		$this->add_responsive_control(
			'compare_button_left_position',
			[
				'label' => __( 'پوزیشین: (چپ)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-compare-button' => 'left: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'compare_button_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'compare_button_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);


		$this->add_control(
			'compare_button_zindex',
			[
				'label' => __( 'Z-INDEX', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => -1,
				'max' => 99999,
				'step' => 1,
				'default' => 1,
				'selectors' => [
					'{{WRAPPER}} .product-compare-button' => 'z-index: {{VALUE}}',
				],
				'condition' => [
					'compare_button_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'compare_button_horizontal_position',
			[
				'label' => __( 'موقعیت', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'right' => [
						'title' => __( 'راست', 'cybershop' ),
						'icon' => 'eicon-h-align-right',
					],
					'left' => [
						'title' => __( 'چپ', 'cybershop' ),
						'icon' => 'eicon-h-align-left',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-compare-button' => '{{VALUE}}',
				],
				'selectors_dictionary' => [
					'left' => 'position: absolute; right: auto; left: 0',
					'right' => 'position: absolute; left: auto; right: 0',
				],
				'condition' => [
					'compare_button_status' => 'yes',
				],
			]
		);







		$this->add_responsive_control(
			'compare_button_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-compare-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'compare_button_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-compare-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);		
		// End "Compare Button"

		// Start "Like Button"
		$this->add_control(
			'heading_like_button_style',
			[
				'label' => __( 'دکمه "علاقمندی"', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'like_button_display',
			[
				'label' => __( 'حالت نمایش ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'like_button_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .product-like-button',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'like_button_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-like-button',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'like_button_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-like-button',
			]
		);

		$this->add_control(
			'like_button_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .product-like-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'like_button_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .product-like-button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'like_button_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .product-like-button',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'like_button_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-like-button',
			]
		);

		$this->add_control(
			'like_button_icon',
			[
				'label' => __( 'آیکون', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-heart',
					'library' => 'solid',
				],
			]
		);




		$this->add_responsive_control(
			'like_button_position_status',
			[
				'label' => __( 'جایگاه', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'static',
				'options' => [
					'static' => [
						'title' => __( 'STATIC', 'cybershop' ),
						'icon' => 'fas fa-map-marker',
					],
					'relative' => [
						'title' => __( 'RELATIVE', 'cybershop' ),
						'icon' => 'fas fa-map-marker-alt',
					],
					'absolute' => [
						'title' => __( 'ABSOLUTE', 'cybershop' ),
						'icon' => 'fas fa-arrows-alt',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-like-button' => 'position: {{VALUE}}',
				],
				'condition' => [
					'like_button_status' => 'yes',
				],
			]
		);	

		// Category Top Position
		$this->add_responsive_control(
			'like_button_top_position',
			[
				'label' => __( 'پوزیشین: (بالا)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-like-button' => 'top: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'like_button_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'like_button_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		// Category Right Position
		$this->add_responsive_control(
			'like_button_right_position',
			[
				'label' => __( 'پوزیشین: (راست)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-like-button' => 'right: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'like_button_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'like_button_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		// Category Bottom Position
		$this->add_responsive_control(
			'like_button_bottom_position',
			[
				'label' => __( 'پوزیشین: (پایین)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-like-button' => 'bottom: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'like_button_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'like_button_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		// Category Left Position
		$this->add_responsive_control(
			'like_button_left_position',
			[
				'label' => __( 'پوزیشین: (چپ)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-like-button' => 'left: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'like_button_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'like_button_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);


		$this->add_control(
			'like_button_zindex',
			[
				'label' => __( 'Z-INDEX', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => -1,
				'max' => 99999,
				'step' => 1,
				'default' => 1,
				'selectors' => [
					'{{WRAPPER}} .product-like-button' => 'z-index: {{VALUE}}',
				],
				'condition' => [
					'like_button_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'like_button_horizontal_position',
			[
				'label' => __( 'موقعیت', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'right' => [
						'title' => __( 'راست', 'cybershop' ),
						'icon' => 'eicon-h-align-right',
					],
					'left' => [
						'title' => __( 'چپ', 'cybershop' ),
						'icon' => 'eicon-h-align-left',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-like-button' => '{{VALUE}}',
				],
				'selectors_dictionary' => [
					'left' => 'position: absolute; right: auto; left: 0',
					'right' => 'position: absolute; left: auto; right: 0',
				],
				'condition' => [
					'like_button_status' => 'yes',
				],
			]
		);




		$this->add_responsive_control(
			'like_button_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-like-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'like_button_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-like-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		// End "Like Button"

		$this->end_controls_section(); // End "Buttons"


		// Start "Short Description"
		$this->start_controls_section(
			'section_description_style',
			[
				'label' => __( 'توضیح کوتاه', 'cybershop' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Short Description Display Status
		$this->add_control(
			'short_description_status',
			[
				'label' => __( 'نمایش توضیحات کوتاه', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'پنهان', 'cybershop' ),
				'label_on' => __( 'نمایش', 'cybershop' ),
				'default' => 'yes',
				'return_value' => 'yes',
			]
		);	

		// Short Description Display Status
		$this->add_control(
			'short_description_fade',
			[
				'label' => __( 'نمایش در صورت هاور', 'cybershop' ),
				'type' => Controls_Manager::SWITCHER,
				'label_off' => __( 'پنهان', 'cybershop' ),
				'label_on' => __( 'نمایش', 'cybershop' ),
				'default' => 'no',
				'return_value' => 'yes',
			]
		);	

		$this->add_responsive_control(
			'short_description_align',
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
					'{{WRAPPER}} .product-short-description' => 'text-align: {{VALUE}}',
				],
				'condition' => [
					'short_description_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'short_description_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .product-short-description' => 'color: {{VALUE}}',
				],
				'condition' => [
					'short_description_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'short_description_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .product-short-description',
				'condition' => [
					'short_description_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'short_description_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-short-description',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'short_description_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-short-description',
				'condition' => [
					'short_description_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'short_description_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-short-description' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
				'condition' => [
					'short_description_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'short_description_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .product-short-description',
				'condition' => [
					'short_description_status' => 'yes',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'short_description_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .product-short-description',
				'condition' => [
					'short_description_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'short_description_width',
			[
				'label' => __( 'عرض', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .product-short-description' => 'width: {{SIZE}}{{UNIT}};',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'condition' => [
					'short_description_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'short_description_height',
			[
				'label' => __( 'طول', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .product-short-description' => 'height: {{SIZE}}{{UNIT}};',
				],

				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'condition' => [
					'short_description_status' => 'yes',
				],
			]
		);

		$this->add_control(
			'short_description_hover_animation',
			[
				'label' => __( 'انیمیشن هاور', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->add_responsive_control(
			'short_description_position_status',
			[
				'label' => __( 'جایگاه', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'static',
				'options' => [
					'static' => [
						'title' => __( 'STATIC', 'cybershop' ),
						'icon' => 'fas fa-map-marker',
					],
					'relative' => [
						'title' => __( 'RELATIVE', 'cybershop' ),
						'icon' => 'fas fa-map-marker-alt',
					],
					'absolute' => [
						'title' => __( 'ABSOLUTE', 'cybershop' ),
						'icon' => 'fas fa-arrows-alt',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .product-short-description' => 'position: {{VALUE}}',
				],
				'condition' => [
					'short_description_status' => 'yes',
				],
			]
		);	

		// Short Description Top Position
		$this->add_responsive_control(
			'short_description_top_position',
			[
				'label' => __( 'پوزیشین: (بالا)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-short-description' => 'top: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'short_description_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'short_description_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		// Short Description Right Position
		$this->add_responsive_control(
			'short_description_right_position',
			[
				'label' => __( 'پوزیشین: (راست)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-short-description' => 'right: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'short_description_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'short_description_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		// Short Description Bottom Position
		$this->add_responsive_control(
			'short_description_bottom_position',
			[
				'label' => __( 'پوزیشین: (پایین)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-short-description' => 'bottom: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'short_description_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'short_description_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		// Short Description Left Position
		$this->add_responsive_control(
			'short_description_left_position',
			[
				'label' => __( 'پوزیشین: (چپ)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-short-description' => 'left: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'short_description_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'short_description_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);


		$this->add_control(
			'short_description_zindex',
			[
				'label' => __( 'Z-INDEX', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => -1,
				'max' => 99999,
				'step' => 1,
				'default' => 1,
				'selectors' => [
					'{{WRAPPER}} .product-short-description' => 'z-index: {{VALUE}}',
				],
				'condition' => [
					'short_description_status' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'short_description_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-short-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'short_description_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .product-short-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section(); // End "Short Description"


		// Pagination
		$this->start_controls_section(
			'pagination_style',
			[
				'label' => __( 'صفحه بندی', 'cybershop' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		// Wrapper Heading
		$this->add_control(
			'pagination_wrapper_heading',
			[
				'label' => __( 'پوسته', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'pagination_wrapper_display',
			[
				'label' => __( 'حالت نمایش جزعیات', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'inline-block',
				'options' => [
					'inline-block' => __( 'خطی', 'cybershop' ),
					'block' => __( 'بلوکی', 'cybershop' ),
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-pagination ul.page-numbers' => 'display: {{VALUE}}',
				],
			]
		);

		// Wrapper Background
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'wrapper_pagination_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .woocommerce-pagination ul.page-numbers',
			]
		);

		// Wrapper Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wrapper_pagination_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-pagination ul.page-numbers',
			]
		);

		// Wrapper Align
		$this->add_responsive_control(
			'wrapper_pagination_align',
			[
				'label' => __( 'تراز', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'right',
				'options' => [
					'flex-end' => [
						'title' => __( 'چپ', 'cybershop' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'وسط', 'cybershop' ),
						'icon' => 'eicon-text-align-center',
					],
					'space-around' => [
						'title' => __( 'کنار', 'cybershop' ),
						'icon' => 'fas fa-align-justify',
					],
					'space-evenly' => [
						'title' => __( 'کنار نزدیک', 'cybershop' ),
						'icon' => 'fas fa-align-justify',
					],
					'space-between' => [
						'title' => __( 'میان', 'cybershop' ),
						'icon' => 'fas fa-align-justify',
					],
					'flex-start' => [
						'title' => __( 'راست', 'cybershop' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-pagination ul.page-numbers' => 'display: flex;place-content: {{VALUE}}',
				],
			]
		);

		// Wrapper Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'wrapper_pagination_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-pagination ul.page-numbers',
			]
		);

		// Wrapper Border Radius
		$this->add_responsive_control(
			'wrapper_pagination_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-pagination ul.page-numbers' => 'border-radius: {{SIZE}}{{UNIT}}',
				],
			]
		);


		// Pagination Position Status
		$this->add_responsive_control(
			'pagination_position_status',
			[
				'label' => __( 'جایگاه', 'cybershop' ),
				'type' => Controls_Manager::CHOOSE,
				'default' => 'static',
				'options' => [
					'static' => [
						'title' => __( 'STATIC', 'cybershop' ),
						'icon' => 'fas fa-map-marker',
					],
					'relative' => [
						'title' => __( 'RELATIVE', 'cybershop' ),
						'icon' => 'fas fa-map-marker-alt',
					],
					'absolute' => [
						'title' => __( 'ABSOLUTE', 'cybershop' ),
						'icon' => 'fas fa-arrows-alt',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-pagination' => 'position: {{VALUE}}',
				],
			]
		);	

		// Pagination Top Position
		$this->add_responsive_control(
			'pagination_top_position',
			[
				'label' => __( 'پوزیشین: (بالا)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-pagination' => 'top: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'pagination_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'pagination_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		// Pagination Right Position
		$this->add_responsive_control(
			'pagination_right_position',
			[
				'label' => __( 'پوزیشین: (راست)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-pagination' => 'right: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'pagination_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'pagination_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		// Pagination Bottom Position
		$this->add_responsive_control(
			'pagination_bottom_position',
			[
				'label' => __( 'پوزیشین: (پایین)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-pagination' => 'bottom: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'pagination_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'pagination_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		// Pagination Left Position
		$this->add_responsive_control(
			'pagination_left_position',
			[
				'label' => __( 'پوزیشین: (چپ)', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-pagination' => 'left: {{SIZE}}{{UNIT}}',
				],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'em' => [
						'min' => -500,
						'max' => 500,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'conditions' => [
					'relation' => 'or',
					'terms' => [
						[
							'name' => 'pagination_position_status',
							'operator' => '==',
							'value' => 'relative',
						],
						[
							'name' => 'pagination_position_status',
							'operator' => '==',
							'value' => 'absolute',
						],
					],
				],
			]
		);

		// Z-INDEX
		$this->add_control(
			'pagination_zindex',
			[
				'label' => __( 'Z-INDEX', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => -1,
				'max' => 99999,
				'step' => 1,
				'default' => 1,
				'selectors' => [
					'{{WRAPPER}} .woocommerce-pagination' => 'z-index: {{VALUE}}',
				],
			]
		);

		// Margin
		$this->add_responsive_control(
			'pagination_margin',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-pagination' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Padding
		$this->add_responsive_control(
			'pagination_padding',
			[
				'label' => __( 'پدینگ', 'cybershop' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-pagination' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);






		// Links Heading
		$this->add_control(
			'pagination_links_heading',
			[
				'label' => __( 'لینک ها', 'cybershop' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Pagination Tabs
		$this->start_controls_tabs( 'tabs_pagination_style' );
		// "Pagination" Tab
		$this->start_controls_tab(
			'tab_pagination_normal',
			[
				'label' => __( 'عادی', 'cybershop' ),
			]
		);

		$this->add_control(
			'pagination_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-pagination li a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .woocommerce-pagination li span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'pagination_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .woocommerce-pagination li a,{{WRAPPER}} .woocommerce-pagination li span',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pagination_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-pagination li a,{{WRAPPER}} .woocommerce-pagination li span',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'pagination_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-pagination li a,{{WRAPPER}} .woocommerce-pagination li span',
			]
		);

		$this->add_responsive_control(
			'pagination_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-pagination li a' => 'border-radius: {{VALUE}}',
					'{{WRAPPER}} .woocommerce-pagination li span' => 'border-radius: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pagination_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .woocommerce-pagination li a,{{WRAPPER}} .woocommerce-pagination li span',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'pagination_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-pagination li a,{{WRAPPER}} .woocommerce-pagination li span',
			]
		);

		$this->end_controls_tab(); // End "Pagination" Tab

		// "Pagination (Hover)" Tab
		$this->start_controls_tab(
			'tab_pagination_hover',
			[
				'label' => __( 'هاور', 'cybershop' ),
			]
		);

		$this->add_control(
			'pagination_hover_color',
			[
				'label' => __( 'رنگ', 'cybershop' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Schemes\Color::get_type(),
					'value' => Schemes\Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-pagination li a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .woocommerce-pagination li span:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'pagination_hover_background',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .woocommerce-pagination li a:hover,{{WRAPPER}} .woocommerce-pagination li span:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'pagination_hover_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-pagination li a:hover,{{WRAPPER}} .woocommerce-pagination li span:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'pagination_hover_border',
				'label' => __( 'حاشیه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-pagination li a:hover,{{WRAPPER}} .woocommerce-pagination li span:hover',
			]
		);

		$this->add_responsive_control(
			'pagination_hover_border_radius',
			[
				'label' => __( 'شعاع حاشیه', 'cybershop' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .woocommerce-pagination li a:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .woocommerce-pagination li span:hover' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pagination_hover_typography',
				'scheme' => Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .woocommerce-pagination li a:hover,{{WRAPPER}} .woocommerce-pagination li span:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'pagination_hover_text_shadow',
				'label' => __( 'سایه متن', 'cybershop' ),
				'selector' => '{{WRAPPER}} .woocommerce-pagination li a:hover,{{WRAPPER}} .woocommerce-pagination li span:hover',
			]
		);
		$this->end_controls_tab(); // End "Pagination (Hover)" Tab
		$this->end_controls_tabs(); // End "Pagination Tabs"


		$this->end_controls_section(); // End "Pagination"

	}
}
