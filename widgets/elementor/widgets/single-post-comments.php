<?php

namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopSinglePostComments extends Widget_Base {

	// Slug
	public function get_name() {
		return 'cybershop-single-post-comments';
	}

	// Title
	public function get_title() {
		return __('کامنت های پست', 'cybershop');
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

		// Start Comment Controls 
		$this->start_controls_section(
			'section_comment_comment', [
				'label' => __('ساختار', 'cybershop')
			]
		);

		// Text Color
		$this->add_control(
			'text_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}}, {{WRAPPER}} a, {{WRAPPER}} .reply-title, {{WRAPPER}} a:hover' => 'color: {{VALUE}};',
				],
			]
		);	

		// Comment Structure Heading Divider
		$this->add_control(
			'comment_structure_heading_divider',
			[
				'label' => __( 'استایل', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Comment Background Color
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'comment_background_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .comment',
			]
		);

		// Comment (Hover) Background Color
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'comment_hover_background_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .comment:hover',
			]
		);

		// Comment Border Color
		$this->add_control(
			'comment_border_color',
			[
				'label' => __( 'رنگ حاشیه', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .comment' => 'border-color: {{VALUE}};',
				],
			]
		);

		// Comment Hover Border Color
		$this->add_control(
			'comment_hover_border_color',
			[
				'label' => __( 'رنگ حاشیه (هاور)', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .comment:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

        // Comment Border Radius
        $this->add_control(
            'comment_border_radius',
            [
                'label' => __( 'حاشیه', 'cybershop' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .comment' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		// End Comment Controls
		$this->end_controls_section();	


		// Start Navigation Controls 
		$this->start_controls_section(
			'section_navigation', [
				'label' => __('ناوبری', 'cybershop')
			]
		);

		// Navigation Structure Heading Divider
		$this->add_control(
			'navigation_structure_heading_divider',
			[
				'label' => __( 'استایل', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);


		// Navigation Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'navigation_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} #comments .nav-links .nav-next a, #comments .nav-links .nav-previous a',
			]
		);

		// Navigation Background Color
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'navigation_background_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} #comments .nav-links .nav-next a, #comments .nav-links .nav-previous a',
			]
		);

		// Navigation (Hover) Background Color
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'navigation_hover_background_color',
				'label' => __( 'پس زمینه (هاور)', 'cybershop' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} #comments .nav-links .nav-next a, #comments .nav-links .nav-previous a:hover',
			]
		);

		// Navigation Text Color
		$this->add_control(
			'navigation_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} #comments .nav-links .nav-next a, #comments .nav-links .nav-previous a' => 'color: {{VALUE}};',
				],
			]
		);	

		// Navigation Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'navigation_text_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} #comments .nav-links .nav-next a, #comments .nav-links .nav-previous a',
			]
		);

		// End Navigation Controls
		$this->end_controls_section();	



		// Start Comment Date Controls 
		$this->start_controls_section(
			'section_comment_date', [
				'label' => __('تاریخ', 'cybershop')
			]
		);

		// Comment Date Structure Heading Divider
		$this->add_control(
			'comment_date_structure_heading_divider',
			[
				'label' => __( 'استایل', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Comment Date Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'comment_date_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} a.comment-date',
			]
		);

		// Comment Date Background Color
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'comment_date_background_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} a.comment-date',
			]
		);

		// Comment Date (Hover) Background Color
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'comment_date_hover_background_color',
				'label' => __( 'پس زمینه (هاور)', 'cybershop' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} a.comment-date:hover',
			]
		);

		// Comment Date Text Color
		$this->add_control(
			'comment_date_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} a.comment-date' => 'color: {{VALUE}};',
				],
			]
		);	

		// Comment Date Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'comment_date_text_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} a.comment-date',
			]
		);

		// End Comment Date Controls
		$this->end_controls_section();	




		// Start Comment Author Controls 
		$this->start_controls_section(
			'section_comment_author', [
				'label' => __('نویسنده', 'cybershop')
			]
		);

		// Comment Author Structure Heading Divider
		$this->add_control(
			'comment_author_structure_heading_divider',
			[
				'label' => __( 'استایل', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Comment Author Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'comment_author_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .comment-author, .comment-author *',
			]
		);

		// Comment Author Text Color
		$this->add_control(
			'comment_author_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .comment-author, .comment-author *' => 'color: {{VALUE}};',
				],
			]
		);	

		// Comment Author Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'comment_author_text_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .comment-author, .comment-author *',
			]
		);

		// End Comment Author Controls
		$this->end_controls_section();	




		// Start Comment Content Controls 
		$this->start_controls_section(
			'section_comment_content', [
				'label' => __('محتوا', 'cybershop')
			]
		);

		// Comment Content Structure Heading Divider
		$this->add_control(
			'comment_content_styles_heading_divider',
			[
				'label' => __( 'استایل', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Comment Content Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'comment_content_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .comment-content',
			]
		);

		// Comment Content Text Color
		$this->add_control(
			'comment_content_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .comment-content' => 'color: {{VALUE}};',
				],
			]
		);	

		// Comment Content Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'comment_content_text_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .comment-content',
			]
		);

		// End Comment Content Controls
		$this->end_controls_section();	





		// Start Comment Reply Controls 
		$this->start_controls_section(
			'section_comment_reply', [
				'label' => __('جواب', 'cybershop')
			]
		);

		// Comment Reply Structure Heading Divider
		$this->add_control(
			'comment_reply_styles_heading_divider',
			[
				'label' => __( 'استایل', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Comment Reply Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'comment_reply_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .reply a',
			]
		);

		// Comment Reply Text Color
		$this->add_control(
			'comment_reply_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .reply a' => 'color: {{VALUE}};',
				],
			]
		);	

		// Comment Reply Hover Text Color
		$this->add_control(
			'comment_reply_hover_color',
			[
				'label' => __( 'رنگ متن (هاور)', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .reply a:hover' => 'color: {{VALUE}};',
				],
			]
		);	

		// Comment Reply Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'comment_reply_text_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} .reply a',
			]
		);


		// Comment Reply Background Color
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'comment_reply_background_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .reply a',
			]
		);

		// Comment Reply (Hover) Background Color
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'comment_reply_hover_background_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .reply a:hover',
			]
		);

		// Comment Reply Border Color
		$this->add_control(
			'comment_reply_border_color',
			[
				'label' => __( 'رنگ حاشیه', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .reply a' => 'border-color: {{VALUE}};',
				],
			]
		);

		// Comment Reply Hover Border Color
		$this->add_control(
			'comment_reply_hover_border_color',
			[
				'label' => __( 'رنگ حاشیه (هاور)', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .reply a:hover' => 'border-color: {{VALUE}};',
				],
			]
		);

        // Comment Reply Border Radius
        $this->add_control(
            'comment_reply_border_radius',
            [
                'label' => __( 'حاشیه', 'cybershop' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .reply a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		// End Comment Reply Controls
		$this->end_controls_section();	



		// Start Inputs Controls 
		$this->start_controls_section(
			'section_inputs', [
				'label' => __('فیلد ها', 'cybershop')
			]
		);

		// Inputs Structure Heading Divider
		$this->add_control(
			'inputs_styles_heading_divider',
			[
				'label' => __( 'استایل', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Inputs Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'inputs_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} input:not(.button):not(.checkbox), {{WRAPPER}} textarea',
			]
		);

		// Inputs Text Color
		$this->add_control(
			'inputs_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input:not(.button):not(.checkbox), {{WRAPPER}} textarea, {{WRAPPER}} input:not(.button):not(.checkbox)::placeholder, {{WRAPPER}} textarea::placeholder' => 'color: {{VALUE}};',
				],
			]
		);	

		// Inputs Hover Text Color
		$this->add_control(
			'inputs_hover_color',
			[
				'label' => __( 'رنگ متن (هاور)', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input:not(.button):not(.checkbox):hover, {{WRAPPER}} input:not(.button):not(.checkbox):focus, {{WRAPPER}} textarea:hover, {{WRAPPER}} textarea:focus' => 'color: {{VALUE}};',
				],
			]
		);	

		// Inputs Background Color
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'inputs_background_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} input:not(.button):not(.checkbox), {{WRAPPER}} textarea',
			]
		);

		// Inputs (Hover) Background Color
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'inputs_hover_background_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} input:not(.button):not(.checkbox):hover, {{WRAPPER}} input:not(.button):not(.checkbox):focus, {{WRAPPER}} textarea:hover, {{WRAPPER}} textarea:focus',
			]
		);

		// Inputs Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'inputs_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} input:not(.button):not(.checkbox), {{WRAPPER}} textarea',
			]
		);

		// Inputs (Hover) Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'inputs_hover_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} input:not(.button):not(.checkbox):focus, {{WRAPPER}} textarea:focus',
			]
		);	
		// Inputs Border Color
		$this->add_control(
			'inputs_border_color',
			[
				'label' => __( 'رنگ حاشیه', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input:not(.button):not(.checkbox), {{WRAPPER}} textarea' => 'border-color: {{VALUE}};',
				],
			]
		);

		// Inputs Hover Border Color
		$this->add_control(
			'inputs_hover_border_color',
			[
				'label' => __( 'رنگ حاشیه (هاور)', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input:not(.button):not(.checkbox):hover, {{WRAPPER}} input:not(.button):not(.checkbox):focus, {{WRAPPER}} textarea:hover, {{WRAPPER}} textarea:focus' => 'border-color: {{VALUE}};',
				],
			]
		);

        // Inputs Border Radius
        $this->add_control(
            'inputs_border_radius',
            [
                'label' => __( 'حاشیه', 'cybershop' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} input:not(.button):not(.checkbox), {{WRAPPER}} textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

      	// Inputs Margin
        $this->add_control(
            'inputs_margin',
            [
                'label' => __( 'فاصله', 'cybershop' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} input:not(.button):not(.checkbox), {{WRAPPER}} textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

      	// Inputs Padding
        $this->add_control(
            'inputs_padding',
            [
                'label' => __( 'پدینگ', 'cybershop' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} input:not(.button):not(.checkbox), {{WRAPPER}} textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


		// Send Button Structure Heading Divider
		$this->add_control(
			'send_button_styles_heading_divider',
			[
				'label' => __( 'دکمه ارسال', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		// Send Button Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'send_button_typography',
				'label' => __( 'تایپوگرافی', 'cybershop' ),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} input.button',
			]
		);

		// Send Button Text Color
		$this->add_control(
			'send_button_color',
			[
				'label' => __( 'رنگ متن', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input.button' => 'color: {{VALUE}};',
				],
			]
		);	

		// Send Button Hover Text Color
		$this->add_control(
			'send_button_hover_color',
			[
				'label' => __( 'رنگ متن (هاور)', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input.button:hover, {{WRAPPER}} input.button:focus' => 'color: {{VALUE}};',
				],
			]
		);	


		// Send Button Text Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'send_button_text_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} input.button',
			]
		);


		// Send Button Background Color
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'send_button_background_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} input.button',
			]
		);

		// Send Button (Hover) Background Color
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'send_button_hover_background_color',
				'label' => __( 'پس زمینه', 'cybershop' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} input.button:hover, {{WRAPPER}} input.button:focus',
			]
		);

		// Send Button Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'send_button_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} input.button',
			]
		);

		// Send Button (Hover) Box Shadow
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'send_button_hover_box_shadow',
				'label' => __( 'سایه', 'cybershop' ),
				'selector' => '{{WRAPPER}} input.button:hover, {{WRAPPER}} input.button:focus',
			]
		);	

		// Send Button Border Color
		$this->add_control(
			'send_button_border_color',
			[
				'label' => __( 'رنگ حاشیه', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input.button' => 'border-color: {{VALUE}};',
				],
			]
		);

		// Send Button Hover Border Color
		$this->add_control(
			'send_button_hover_border_color',
			[
				'label' => __( 'رنگ حاشیه (هاور)', 'cybershop' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'scheme' => [
					'type' => \Elementor\Scheme_Color::get_type(),
					'value' => \Elementor\Scheme_Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} input.button:hover, {{WRAPPER}} input.button:focus' => 'border-color: {{VALUE}};',
				],
			]
		);

        // Send Button Border Radius
        $this->add_control(
            'send_button_border_radius',
            [
                'label' => __( 'حاشیه', 'cybershop' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} input.button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

      	// Send Button Margin
        $this->add_control(
            'send_button_margin',
            [
                'label' => __( 'فاصله', 'cybershop' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} input.button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

      	// Send Button Padding
        $this->add_control(
            'send_button_padding',
            [
                'label' => __( 'پدینگ', 'cybershop' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} input.button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

		// End Inputs Controls
		$this->end_controls_section();	
	}

	// PHP-RENDER
	public function render() {

		// Get Settings
		$settings  = $this->get_settings_for_display();

		// Display Comments Form & List (Default: comments.php)
		comments_template();
	}

}