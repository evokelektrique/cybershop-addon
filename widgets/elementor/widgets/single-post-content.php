<?php

namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopSinglePostContent extends Widget_Base {

	// Slug
	public function get_name() {
		return 'cybershop-single-post-content';
	}

	// Title
	public function get_title() {
		return __('محتوا پست', 'cybershop');
	}

	// Icon
	public function get_icon() {
		return 'fab fa-amilia fa-spin';
	}

	// Category
	public function get_categories() {
		return ['cybershop-single'];
	}

	// Controls/Options Registration
	public function _register_controls() {

		// Start Controls
		$this->start_controls_section(
			'section_content', [
				'label' => __('Content', 'elementor')
			]
		);


		// Content Heading
		$this->add_control(
			'content_heading',
			[
				'label' => __( 'ساختار', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Content TAG
		$this->add_control(
			'tag',
			[
				'label' => __( 'تگ HTML', 'cybershop' ),
				'type' => Controls_Manager::SELECT,
				'label_block' => true,
				'default' => 'div',
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'DIV',
					'span' => 'SPAN',
					'p' => 'P',
				],
			]
		);




		// Styles Heading
		$this->add_control(
			'styles_heading',
			[
				'label' => __( 'ساختار', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Content Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .content',
			]
		);

		// Content Background Color
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'content_background_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .content',
			]
		);

		// Content Text Color
		$this->add_control(
			'content_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .content *' => 'color: {{VALUE}};',
				],
			]
		);	

		// Content Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'content_text_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .content *',
			]
		);

		// Blockquote Heading
		$this->add_control(
			'blockquote_heading',
			[
				'label' => __( 'نقل قول', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Blockquote Background Color
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'blockquote_background_color',
				'label' => __( 'پس زمینه نقل قول', 'cybershop' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .content blockquote',
			]
		);

		// Blockquote Text Color
		$this->add_control(
			'blockquote_text_color',
			[
				'label' => __( 'رنگ ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .content blockquote' => 'color: {{VALUE}};',
				],
			]
		);	

		// Blockquote Border Color
		$this->add_control(
			'blockquote_color',
			[
				'label' => __( 'رنگ حاشیه نقل قول', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .content blockquote' => 'border-color: {{VALUE}};',
				],
			]
		);	

		// Content Links Heading
		$this->add_control(
			'links_heading',
			[
				'label' => __( 'لینک ها', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);


		// Links Color
		$this->add_control(
			'links_color',
			[
				'label' => __( 'رنگ ', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .content a' => 'color: {{VALUE}};',
				],
			]
		);	

		// Links (Hover) Color
		$this->add_control(
			'links_hover_color',
			[
				'label' => __( 'رنگ  (هاور)', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .content a:hover' => 'color: {{VALUE}};',
				],
			]
		);	

     	// Links Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'links_typography',
                'label' => __( 'تایپوگرافی', 'cybershop' ),
                'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .content a',
            ]
        );

		// Spacing Heading
		$this->add_control(
			'spacing_heading',
			[
				'label' => __( 'فاصله', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        // Content Margin
        $this->add_control(
            'content_margin',
            [
                'label' => __( 'فاصله', 'cybershop' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Content Padding
        $this->add_control(
            'content_padding',
            [
                'label' => __( 'پدینگ', 'cybershop' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		// End Controls
		$this->end_controls_section();	

	}

	// PHP-RENDER
	public function render() {

		// Get current "post"
	  	global $post;

		// Get Settings
		$settings  = $this->get_settings_for_display();

		// Get HTML tag
		$tag = $settings['tag'];

		// Get "post" title
		$title = get_the_title( $post );

		// Output "post" content with given HTML tag
		echo "<$tag class='content'>";
		the_content();
		echo "</$tag>";
	}

}