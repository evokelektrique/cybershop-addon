<?php

namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopSinglePostTitle extends Widget_Base {

	// Slug
	public function get_name() {
		return 'cybershop-single-post-title';
	}

	// Title
	public function get_title() {
		return __('عنوان پست', 'cybershop');
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


		// Title Heading
		$this->add_control(
			'title_heading',
			[
				'label' => __( 'ساختار', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Title TAG
		$this->add_control(
			'tag',
			[
				'label' => __( 'تگ HTML', 'cybershop' ),
				'type' => Controls_Manager::SELECT,
				'label_block' => true,
				'default' => 'h1',
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
			'tite_heading',
			[
				'label' => __( 'ساختار', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .post-title',
			]
		);

		// Title Background Color
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'title_background_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .post-title',
			]
		);

		// Title Text Color
		$this->add_control(
			'title_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .post-title' => 'color: {{VALUE}};',
				],
			]
		);	

		// Title Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .post-title',
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

		// Get H tag
		$tag = $settings['tag'];

		// Get "post" title
		$title = get_the_title( $post );

		// Output "post" title with given H tag
		echo "<$tag class='post-title'>$title</$tag>";

	}

}