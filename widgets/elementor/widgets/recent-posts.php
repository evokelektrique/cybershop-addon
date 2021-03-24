<?php

namespace CybershopElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;


if(!defined('ABSPATH')) exit; // No Direct Access

class CybershopRecentPosts extends Widget_Base {

    // Slug
    public function get_name() {
        return 'cybershop-recent-posts';
    }

    // Title
    public function get_title() {
        return __('پست های اخیر', 'cybershop');
    }

    // Icon
    public function get_icon() {
        return 'fab fa-amilia fa-spin';
    }

    // Category
    public function get_categories() {
        return ['cybershop-archive'];
    }

    // Controls/Options Registration
    public function _register_controls() {

        // ========================================================
        // Heading
        // 

        $this->start_controls_section(
            'section_heading', [
                'label' => __('سربرگ', 'cybershop')
            ]
        );

        $this->add_control(
            'heading_status',
            [
                'label' => __( 'نمایش سربرگ', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'نمایش', 'cybershop' ),
                'label_off' => __( 'پنهان', 'cybershop' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );  

        // Heading Divider
        $this->add_control(
            'heading_heading_divider',
            [
                'label' => __( 'ساختار', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'heading_status' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'limit',
            [
                'label' => __( 'تعداد نمایش', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 100,
                'step' => 1,
                'default' => 5,
                'condition' => [
                    'heading_status' => 'yes'
                ]                
            ]
        );

        // Heading Heading Text
        $this->add_control(
            'heading_text',
            [
                'label' => __( 'متن سربرگ', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'آخرین پست ها', 'cybershop' ),
                'placeholder' => __( 'سربرگ دلخواه خود را وارد کنید', 'cybershop' ),
                'condition' => [
                    'heading_status' => 'yes'
                ]
            ]
        );

        // Heading TAG
        $this->add_control(
            'heading_tag',
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
                'condition' => [
                    'heading_status' => 'yes'
                ]
            ]
        );

        // Heading Styles
        $this->add_control(
            'heading_styles_heading_divider',
            [
                'label' => __( 'استایل', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'heading_status' => 'yes'
                ]
            ]
        );

        // Heading Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'heading_typography',
                'label' => __( 'تایپوگرافی', 'cybershop' ),
                'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .blog-single-widget-title',
                'condition' => [
                    'heading_status' => 'yes'
                ]
            ]
        );

        // Heading Text Shadow
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'heading_text_shadow',
                'label' => __( 'سایه', 'cybershop' ),
                'selector' => '{{WRAPPER}} .blog-single-widget-title',
                'condition' => [
                    'heading_status' => 'yes'
                ]
            ]
        );

        // Heading Background Color
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'heading_background_color',
                'label' => __( 'پس زمینه', 'cybershop' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .blog-single-widget-heading',
                'condition' => [
                    'heading_status' => 'yes'
                ]
            ]
        );

        // Heading Text Background Color
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'heading_text_background_color',
                'label' => __( 'پس زمیه متن', 'cybershop' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .blog-single-widget-title',
                'condition' => [
                    'heading_status' => 'yes'
                ]
            ]
        );

        // Heading Text Color
        $this->add_control(
            'heading_color',
            [
                'label' => __( 'رنگ متن', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .blog-single-widget-title' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'heading_status' => 'yes'
                ]
            ]
        );

        // Heading Text Border Color
        $this->add_control(
            'heading_text_border_color',
            [
                'label' => __( 'حاشیه', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .blog-single-widget-title' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'heading_status' => 'yes'
                ]
            ]
        );  

        // Heading Border Color
        $this->add_control(
            'heading_border_color',
            [
                'label' => __( 'حاشیه 2', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .blog-single-widget-heading' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'heading_status' => 'yes'
                ]
            ]
        );  


        // Heading Border Radius
        $this->add_control(
            'heading_border_radius',
            [
                'label' => __( 'حاشیه', 'cybershop' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .blog-single-widget-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Heading Margin
        $this->add_control(
            'heading_margin',
            [
                'label' => __( 'فاصله', 'cybershop' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .blog-single-widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Heading Padding
        $this->add_control(
            'heading_padding',
            [
                'label' => __( 'پدینگ', 'cybershop' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .blog-single-widget-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();  // End "Heading" Section

        // ========================================================
        // Title
        // 

        $this->start_controls_section(
            'section_title', [
                'label' => __('عنوان', 'cybershop')
            ]
        );

        $this->add_control(
            'title_status',
            [
                'label' => __( 'نمایش عنوان', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'نمایش', 'cybershop' ),
                'label_off' => __( 'پنهان', 'cybershop' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );  

        // Title Heading
        $this->add_control(
            'title_heading_divider',
            [
                'label' => __( 'ساختار', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'title_status' => 'yes'
                ]
            ]
        );

        // Heading TAG
        $this->add_control(
            'title_tag',
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
                'condition' => [
                    'title_status' => 'yes'
                ]
            ]
        );

        // Details Margin
        $this->add_control(
            'title_margin',
            [
                'label' => __( 'فاصله', 'cybershop' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .cybershop-recent-posts-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'title_status' => 'yes'
                ]
            ]
        );

        // Details Padding
        $this->add_control(
            'title_padding',
            [
                'label' => __( 'پدینگ', 'cybershop' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .cybershop-recent-posts-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'title_status' => 'yes'
                ]
            ]
        );

        // Styles Heading
        $this->add_control(
            'title_styles_heading_divider',
            [
                'label' => __( 'استایل', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'title_status' => 'yes'
                ]
            ]
        );

        // Title Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'تایپوگرافی', 'cybershop' ),
                'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .cybershop-recent-posts-title',
                'condition' => [
                    'title_status' => 'yes'
                ]
            ]
        );

        // Title Text Shadow
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_text_shadow',
                'label' => __( 'سایه', 'cybershop' ),
                'selector' => '{{WRAPPER}} .cybershop-recent-posts-title',
                'condition' => [
                    'title_status' => 'yes'
                ]
            ]
        );

        // Title Background Color
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'title_background_color',
                'label' => __( 'پس زمینه', 'cybershop' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .cybershop-recent-posts-title',
                'condition' => [
                    'title_status' => 'yes'
                ]
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
                    '{{WRAPPER}} .cybershop-recent-posts-title' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'title_status' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();  // End "Title" Section



        // ========================================================
        // Thumbnail
        // 

        $this->start_controls_section(
            'section_thumbnail', [
                'label' => __('عکس', 'cybershop')
            ]
        );

        $this->add_control(
            'thumbnail_status',
            [
                'label' => __( 'نمایش عکس', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'نمایش', 'cybershop' ),
                'label_off' => __( 'پنهان', 'cybershop' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );  

        // Thumbnail Heading
        $this->add_control(
            'thumbnail_heading_divider',
            [
                'label' => __( 'ساختار', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'thumbnail_status' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'thumbnail_size',
            [
                'label' => __( 'اندازه عکس', 'cybershop' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'default' => 'medium',
                'options' => [
                    'thumbnail' => 'بند انگشت',
                    'medium' => 'متوسط',
                    'large' => 'بزرگ',
                    'full' => 'کامل',
                ],
                'condition' => [
                    'thumbnail_status' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();  // End "Thumbnail" Section

        // ========================================================
        // Details
        // 

        $this->start_controls_section(
            'section_details', [
                'label' => __('جزعیات', 'cybershop')
            ]
        );

        // Details Heading
        $this->add_control(
            'details_heading_divider',
            [
                'label' => __( 'ساختار', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'details_status' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'details_status',
            [
                'label' => __( 'نمایش جزعیات', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'نمایش', 'cybershop' ),
                'label_off' => __( 'پنهان', 'cybershop' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );  
   
        // Details Margin
        $this->add_control(
            'details_margin',
            [
                'label' => __( 'فاصله', 'cybershop' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} small' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'details_status' => 'yes'
                ]
            ]
        );

        // Details Padding
        $this->add_control(
            'details_padding',
            [
                'label' => __( 'پدینگ', 'cybershop' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} small' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'details_status' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'details_date_human_redable',
            [
                'label' => __( 'نمایش تاریخ جزعیات در حالت خوانا', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'فعال', 'cybershop' ),
                'label_off' => __( 'غیر فعال', 'cybershop' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'details_status' => 'yes'
                ]
            ]
        );  

        // Details Heading
        $this->add_control(
            'details_styles_heading_divider',
            [
                'label' => __( 'استایل', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'details_status' => 'yes'
                ]
            ]
        );

        // Details Text Color
        $this->add_control(
            'details_color',
            [
                'label' => __( 'رنگ متن', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} small' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'details_status' => 'yes'
                ]
            ]
        );

        // Details Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'details_typography',
                'label' => __( 'تایپوگرافی', 'cybershop' ),
                'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} small',
                'condition' => [
                    'details_status' => 'yes'
                ]
            ]
        );

        // Details Text Shadow
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'details_text_shadow',
                'label' => __( 'سایه', 'cybershop' ),
                'selector' => '{{WRAPPER}} small',
                'condition' => [
                    'details_status' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();  // End "Details" Section

        // ========================================================
        // Styles
        // 

        $this->start_controls_section(
            'section_styles', [
                'label' => __('استایل', 'cybershop')
            ]
        );

        $this->add_control(
            'list_items_structure_heading',
            [
                'label' => __( 'ساختار', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        
        // List Items Margin
        $this->add_control(
            'list_items_margin',
            [
                'label' => __( 'فاصله', 'cybershop' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .media' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'list_items_background_color_heading',
            [
                'label' => __( 'پس زمینه', 'cybershop' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        // List Items Background Color
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'list_items_background_color',
                'label' => __( 'رنگ پس زمینه', 'cybershop' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .media',
            ]
        );

        // List Items (Hover) Background Color
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'list_items_hover_background_color',
                'label' => __( 'رنگ پس زمینه (هاور)', 'cybershop' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .media:hover',
            ]
        );

        // $this->add_control(
        //     'list_items_border_heading',
        //     [
        //         'label' => __( 'حاشیه', 'cybershop' ),
        //         'type' => \Elementor\Controls_Manager::HEADING,
        //         'separator' => 'before',
        //     ]
        // );

        // // List Items Border (Default: 'black' color)
        // $this->add_control(
        //     'list_items_border',
        //     [
        //         'label' => __( 'فاصله', 'cybershop' ),
        //         'type' => Controls_Manager::DIMENSIONS,
        //         'size_units' => [ 'px', '%', 'em' ],
        //         'selectors' => [
        //             '{{WRAPPER}} .media' => 'border: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} #000;',
        //         ],
        //     ]
        // );

        // // List Items Border Color
        // $this->add_control(
        //     'list_items_border_color',
        //     [
        //         'label' => __( 'رنگ ', 'cybershop' ),
        //         'type' => \Elementor\Controls_Manager::COLOR,
        //         'scheme' => [
        //             'type' => \Elementor\Scheme_Color::get_type(),
        //             'value' => \Elementor\Scheme_Color::COLOR_1,
        //         ],
        //         'selectors' => [
        //             '{{WRAPPER}} .media' => 'border-color: {{VALUE}};',
        //         ],
        //     ]
        // );

        // // List Items Hover Border Color
        // $this->add_control(
        //     'list_items_hover_border_color',
        //     [
        //         'label' => __( 'رنگ (هاور)', 'cybershop' ),
        //         'type' => \Elementor\Controls_Manager::COLOR,
        //         'scheme' => [
        //             'type' => \Elementor\Scheme_Color::get_type(),
        //             'value' => \Elementor\Scheme_Color::COLOR_1,
        //         ],
        //         'selectors' => [
        //             '{{WRAPPER}} .media:hover' => 'border-color: {{VALUE}};',
        //         ],
        //     ]
        // );

        $this->end_controls_section();  // End "Styles" Section

    }

    // PHP-RENDER
    public function render() {

        // 
        // Settings
        // 

        // Get Settings
        $settings  = $this->get_settings_for_display();
        // Posts Limit
        $limit = $settings['limit'];
        // Get "recent posts" & Define WP Query Parameters
        $posts = new \WP_Query( "posts_per_page=$limit" ); 


        // 
        // Heading
        // 

        // Heading HTML Tag (Default: H3)
        $heading_tag = !empty($settings['heading_status']) ? $settings['heading_tag'] : 'h3';
        // Heading Text
        $heading_text = $settings['heading_text'];


        // 
        // Title
        // 

        // Thumbnail Output Condition/Status
        $title_status = !empty($settings['title_status']) ? true : false;
        // Title HTML Tag (Default: STRONG)
        $title_tag = !empty($settings['title_status']) ? $settings['title_tag'] : 'strong';


        // 
        // Thumbnail
        // 

        // Thumbnail Output Condition/Status
        $thumbnail_status = !empty($settings['thumbnail_status']) ? true : false;
        // Thumbnail Size
        $thumbnail_size = $settings['thumbnail_size'];


        // 
        // Details
        // 

        // Details Output Condition/Status
        $details_status = !empty($settings['details_status']) ? true : false;
        // Details Date Output In Human Redable Status
        $details_date_human_redable = !empty($settings['details_date_human_redable']) ? true : false;

        ?>
        <section class="blog-single-widget-section">
            <<?= $heading_tag ?> class="blog-single-widget-heading">
                <span class="blog-single-widget-title">
                    <?= $heading_text ?>
                <span/>
            </<?= $heading_tag ?>>

            <ul class="cybershop-recent-posts">
                <?php while ($posts -> have_posts()) : $posts -> the_post(); ?>
                    <li>
                        <article class="media">
                            <?php if($thumbnail_status): ?>
                            <figure class="media-left ml-3 mb-3">
                                <p class="image is-64x64">
                                    <?php the_post_thumbnail( $thumbnail_size ); ?>
                                </p>
                            </figure>
                            <?php endif; ?>
                            <div class="media-content">
                                <div class="content">
                                    <?php if($title_status || $details_status): ?>
                                    <a class="is-block" href="<?php the_permalink() ?>">
                                        <?php if($title_status) ?>
                                        <<?= $title_tag ?> class="is-block pb-1 cybershop-recent-posts-title">
                                            <?= get_the_title(); ?>
                                        </<?= $title_tag ?>>
                                        <?php if($details_status): ?>
                                        <small class="ml-2">
                                            <time datetime="<?= get_the_date('c'); ?>" itemprop="datePublished">
                                                <i class="fa fa-calendar ml-1"></i>
                                                <?php 
                                                if($details_date_human_redable){
                                                    printf(
                                                        esc_html__('%s پیش', 'cybershop'),
                                                        human_time_diff(get_the_modified_time('U'), current_time('U') )
                                                    ); 
                                                } else {
                                                    echo get_the_date();
                                                }
                                                ?>
                                            </time>
                                        </small>
                                        <small class="ml-2">
                                            <i class="fa fa-comments ml-1"></i>
                                            <?php echo get_comments_number(); ?>
                                            <?php echo __('نظر', 'cybershop') ?>
                                        </small>
                                        <?php endif ?>
                                    </a>
                                    <?php endif ?>
                                </div>
                            </div>
                        </article>
                    </li>
                    <?php endwhile; wp_reset_postdata(); ?>
            </ul>        
        </section>
        <?php
    }

}

